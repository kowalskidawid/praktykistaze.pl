<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Student;
use App\Models\Company;
use App\Models\Role;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'role' => 'required',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|confirmed|min:8',
        ]);

        if ($request->role === 'Student') {
            $role = Role::find(2);
            $role->users()->create([
                'email' => $request->email, 
                'password' => Hash::make($request->password)
            ]);
            $user = User::where('email', $request->email)->firstOrFail();
            $user->student()->create([
                'first_name' => 'Name',
                'last_name' => 'Surname',
            ]);
            
            event(new Registered($user));
            Auth::login($user);
            return redirect(RouteServiceProvider::HOME);

        } else if ($request->role === 'Company') {
            $role = Role::find(3);
            $role->users()->create([
                'email' => $request->email, 
                'password' => Hash::make($request->password)
            ]);
            $user = User::where('email', $request->email)->firstOrFail();
            $user->company()->create([
                'company_name' => 'Company Name'
            ]);

            event(new Registered($user));
            Auth::login($user);
            return redirect(RouteServiceProvider::HOME);
        }
    }
}
