<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
class LoginRegisterController extends Controller
{
    /**
     * Instantiate a new LoginRegisterController instance.
     */
    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            // Redirect based on account type
            return redirect($this->redirectTo())->withSuccess('You have successfully logged in!');
        }

        return back()->withErrors([
            'email' => 'Your provided credentials do not match in our records.',
        ])->onlyInput('email');
    }

    /**
     * Redirect authenticated users based on their account type.
     *
     * @return string
     */
    protected function redirectTo()
    {
        $type = Auth::user()->acctyp;

        switch ($type) {
            case 'type1':
                return '/fart';
            case 'type2':
                return '/YOUR PATH';
            default:
                return '/YOUR PATH';
        }
    }
}
