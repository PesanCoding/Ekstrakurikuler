<?php

namespace App\Http\Controllers;

use App\DataTables\PendaftaranDataTable;
use App\Models\Ekskul;
use App\Models\Pendaftaran;
use App\Models\User;
use PDF;
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
        $id = $request->id_siswa;
        $ekskul = $request->id_ekskul;
        $isAlreadyRegistered = Pendaftaran::isAlreadyRegistered($id, $ekskul);
        if ($isAlreadyRegistered) {
            return redirect()
                ->back()
                ->with('error', 'Siswa sudah terdaftar dalam ekskul ini.');
        }
        $jumlahEkskulSiswa = Pendaftaran::jumlahEkskulSiswa($id);
        if ($jumlahEkskulSiswa >= 2) {
            return redirect()
                ->back()
                ->with('error', 'Siswa hanya diperbolehkan mendaftar maksimal 2 ekskul.');
        }
        $data = $request->all();
        $data['status_pendaftran'] = 'belum disetujui';
        $saveData = Pendaftaran::create($data);

        toastr()->success('Data has been saved successfully!');
        return redirect()->route('siswaekskul.index');
    }
    public function pendaftaran(PendaftaranDataTable $dataTable)
    {
        return $dataTable->render('pembina.pendaftaran.index');
    }
    public function update($id)
    {

        $data = pendaftaran::findOrFail($id);
        $ekskul = Ekskul::find($data->id_ekskul);
        $data->status_pendaftran = "setuju";
        $data->update();
        $ekskul->kuota -= 1;
        $ekskul->save();
        toastr()->success('pendaftaran berhasil disetujui !');
        return back();
    }
    public function cetak()
    {
        $data = Ekskul::all();
        return view('admin.cetak.index', compact('data'));
    }
    public function cetakpost(Request $request)
    {
        $id = $request->ekskul;
        $kelas = $request->kelas;
        $data = Pendaftaran::filterByEkskulAndKelas($id, $kelas)->get();
        $pdf = PDF::loadview('admin.cetak.pdf', compact('data'));
        return $pdf->stream("daftar_anggota" . ".pdf");
    }
}
