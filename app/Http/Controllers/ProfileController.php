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
            
        ]);

        $user = Auth::user();
        $user->name = $request->name;
        $user->email = $request->email;

        $user->save();

        return redirect()->route('profile.edit')->with('status', 'Profile updated successfully!');
    }
}
