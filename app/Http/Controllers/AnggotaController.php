<?php

namespace App\Http\Controllers;

use App\DataTables\anggotasDataTable;
use App\Models\Anggota;
use App\Http\Requests\StoreAnggotaRequest;
use App\Http\Requests\UpdateAnggotaRequest;
use App\Models\Pendaftaran;
use App\Models\User;
use Illuminate\Http\Request;
use PDF;

class AnggotaController extends Controller
{
    public function index(anggotasDataTable $dataTable)
    {
        return $dataTable->render('pembina.anggota.index');
    }

    public function angotacetak(Request $request)
    {
        $pembina = User::Role('pembina')
            ->with('pembina')
            ->where('id', '=', auth()->user()->id)
            ->first();
        $dataPembina = $pembina->pembina->id;
        $kelas = $request->kelas;
        $query = Pendaftaran::where('id_ekskul', $dataPembina)
            ->where('status_pendaftran', 'setuju');
        if ($kelas !== 'semua') {
            $query->whereHas('user', function ($q) use ($kelas) {
                $q->where('kelas', $kelas);
            });
        }
        $data = $query->get();
        $pdf = PDF::loadview('cetak', compact('data'));
        return $pdf->stream("daftar_anggota" . ".pdf");
    }

    public function create()
    {
        //
    }

    public function store(StoreAnggotaRequest $request)
    {
        //
    }

    public function show(Anggota $anggota)
    {
        //
    }

    public function edit(Anggota $anggota)
    {
        //
    }

    public function update(UpdateAnggotaRequest $request, Anggota $anggota)
    {
        //
    }

    public function destroy(Anggota $anggota)
    {
        //
    }
}
