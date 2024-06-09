<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BulletinController extends Controller
{
    public function index()
    {
        return view('profile.index');
    }

    // Other methods for creating, updating, and deleting bulletins
}