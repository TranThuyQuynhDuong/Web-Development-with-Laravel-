<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;

class DashBoardController extends Controller
{
    public function index()
    {
        return view("backend.dashboard.index");
    }
}
