<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CalendarController extends Controller
{
    public function __invoke(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {

        $user = Auth::user();


        $appointments = $user->calendarEvents()->get();

        foreach ($appointments as $appointment) {
            $appointments[] = [
                'title' => $appointment->employee,
                'start' => $appointment->start_time,
                'end' => $appointment->finish_time,
            ];
        }

        return view('employees.shifts', compact('appointments'));


    }
}
