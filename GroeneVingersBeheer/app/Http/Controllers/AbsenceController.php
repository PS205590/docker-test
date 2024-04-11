<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Type;
use App\Models\Appointment;
use Illuminate\Support\Facades\Auth;

class AbsenceController extends Controller
{
    public function index()
    {
        $absenceTypes = Type::all();
        return view('employees.absence', compact('absenceTypes'));
    }

    public function store(Request $request)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'absence_type' => 'required|exists:type,id',
            'start_time' => 'required|date',
            'finish_time' => 'required|date|after:start_time',
        ]);

        // Create a new absence record associated with the authenticated user
        $absence = new Appointment();
        $absence->type_id = $validatedData['absence_type'];
        $absence->start_time = $validatedData['start_time'];
        $absence->finish_time = $validatedData['finish_time'];

        // Assign the authenticated user's ID to the appointment
        $absence->user_id = Auth::id();

        // Save the appointment to the database
        $absence->save();

        // Redirect back with success message or perform any other action
        return redirect()->back()->with('success', 'Absence declaration submitted successfully.');
    }

}
