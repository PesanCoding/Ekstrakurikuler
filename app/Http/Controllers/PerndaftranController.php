<?php

namespace App\Http\Controllers;

use App\Models\Ekskul;
use App\Models\Pendaftaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PerndaftranController extends Controller
{
    public function index()
    {
        $list = Ekskul::with('detailEkskul')
            ->orderBy('id', 'DESC')
            ->get();
        return view('siswa.ekskul.list_ekskul', compact('list'));
    }

    public function show($id)
    {
        $post = Ekskul::findOrfail($id);
        return view('siswa.pendaftaran.index', compact('post'));
    }
    public function store(Request $request)
    {
        $jumlahEkskulSiswa = Pendaftaran::where('id_siswa', $request->id_siswa)->count();
        $isAlreadyRegistered = Pendaftaran::where('id_siswa', $request->id_siswa)
            ->where('id_ekskul', $request->id_ekskul)
            ->exists();
        if ($isAlreadyRegistered) {
            return redirect()->back()->with('error', 'Siswa sudah terdaftar dalam ekskul ini.');
        }
        if ($jumlahEkskulSiswa >= 2) {
            return redirect()->back()->with('error', 'Siswa hanya diperbolehkan mendaftar maksimal 2 ekskul.');
        }
        $data = $request->all();
        $data['status_pendaftran'] = 'belum disetujui';
        $saveData = Pendaftaran::create($data);

        toastr()->success('Data has been saved successfully!');
        return redirect()->route('siswaekskul.index');
    }
    public function pendaftaran()
    {
    }
}
