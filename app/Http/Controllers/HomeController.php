<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = Auth::user();

        if ($user->type == 'admin') {
            return view('homeAdmin');
        } elseif ($user->type == 'student') {
            return view('homeStudent');
        } elseif ($user->type == 'parent') {
            return view('homeParent');
        }
    }
}
