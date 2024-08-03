<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    // Menampilkan profil pengguna
    public function show()
    {
        return view('profile', ['user' => Auth::user()]);
    }

    // Menampilkan formulir untuk mengedit profil
    public function edit()
    {
        return view('profile', ['user' => Auth::user()]);
    }

    // Memperbarui informasi profil
    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'phone' => 'nullable|string|max:15',
            'birthday' => 'nullable|date',
            'gender' => 'nullable|string|in:male,female',
        ]);

        $user = Auth::user();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->phone = $request->input('phone');
        $user->birthday = $request->input('birthday');
        $user->gender = $request->input('gender');

        $user->save();

        return redirect()->route('profile')->with('status', 'Profile updated successfully!');
    }
}
