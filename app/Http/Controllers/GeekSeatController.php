<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GeekSeatController extends Controller
{
    public function index()
    {
        return view('geekseat.index');
    }
}
