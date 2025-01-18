<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ParentProfileController extends Controller
{
    public function index()
    {
        $parent = Auth::user(); // Get currently logged-in parent
        return view('parent.profile', compact('parent'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|min:8|confirmed',
        ]);

        $parent = Auth::user();

        // Check if the old password matches
        if (!Hash::check($request->old_password, $parent->password)) {
            return redirect()->back()->withErrors(['old_password' => 'Incorrect old password']);
        }

        // Update password
        $parent->password = Hash::make($request->new_password);
        $parent->save();

        return redirect()->route('profile.parent')->with('success', 'Password updated successfully!');
    }
}