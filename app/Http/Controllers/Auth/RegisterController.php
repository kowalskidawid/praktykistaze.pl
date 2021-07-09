<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Category;
use App\Models\User;
use App\Models\Student;
use App\Models\Company;
use App\Models\Role;

class RegisterController extends Controller
{
    public function index(Request $request)
    {
        $categories = Category::get();
        return view('auth.register', compact('request', 'categories'));
    }
    public function student(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|confirmed|min:8',
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'category' => 'required',
            'nip' => 'required'
        ]);

        $role = Role::find(2);
        $role->users()->create([
            'email' => $request->email, 
            'password' => Hash::make($request->password)
        ]);
        $user = User::where('email', $request->email)->firstOrFail();
        $user->student()->create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'category_id' => $request->category,
            'image' => '/images/student.jpg'
        ]);
        
        event(new Registered($user));
        Auth::login($user);
        return redirect()->route('verification.notice');
    }
    public function company(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|confirmed|min:8',
            'company_name' => 'required|string',
            'category' => 'required'
        ]);

        $role = Role::find(3);
        $role->users()->create([
            'email' => $request->email, 
            'password' => Hash::make($request->password)
        ]);
        $user = User::where('email', $request->email)->firstOrFail();
        $user->company()->create([
            'company_name' => $request->company_name,
            'category_id' => $request->category,
            'image' => '/images/company.jpg'
        ]);

        event(new Registered($user));
        Auth::login($user);
        return redirect()->route('verification.notice');
    }
}
