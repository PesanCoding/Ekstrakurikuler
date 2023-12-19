<?php

namespace App\Http\Controllers;

use App\Models\Pendaftaran;
use Illuminate\Http\Request;

class ekskulSiswaController extends Controller
{
    public function index()
    {

        $data = Pendaftaran::where('id_siswa', '=', auth()->user()->id)
            ->where('status_pendaftran', '=', 'disetujui')
            ->get();
        return view('siswa.ekskul.index', compact('data'));
    }
}
