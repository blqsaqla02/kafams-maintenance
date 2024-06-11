<?php

namespace App\Http\Controllers;

use App\Models\activityModel;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;


class ActivityController extends Controller
{
    public function index()
    {
        return view('bulletin.indexBulletin');
    }
}