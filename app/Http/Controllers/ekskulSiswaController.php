<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ekskulSiswaController extends Controller
{
    public function index()
    {
        return view('siswa.ekskul.index');
    }
}
