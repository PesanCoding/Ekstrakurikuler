<?php

namespace App\Http\Controllers;

use App\Models\Ekskul;
use App\Models\Pendaftaran;
use Illuminate\Http\Request;

class ekskulSiswaController extends Controller
{
    public function index()
    {
        $data = Pendaftaran::with('ekskul')
            ->where('id_siswa', '=', auth()->user()->id)
            ->where('status_pendaftran', '=', 'setuju')
            ->get();
        return view('siswa.ekskul.index', compact('data'));
    }
    public function show($id)
    {
        $data = Ekskul::with('detailEkskul')->findOrFail($id);
        return view('siswa.ekskul.detail_jadwal', compact('data'));
    }
    public function jadwal()
    {
        $Datakskul = Pendaftaran::where('status_pendaftran', '=', 'setuju')
            ->where('id_siswa', auth()->user()->id)
            ->with('ekskul')->get();
        $dataId = $Datakskul->pluck('id_ekskul')->toArray();
        $data = Ekskul::with('detailEkskul')
            ->whereIn('id', $dataId)
            ->get();
        return view('siswa.jadwal.index', compact('data'));
    }
}
