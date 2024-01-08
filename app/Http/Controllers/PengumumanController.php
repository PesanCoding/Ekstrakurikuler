<?php

namespace App\Http\Controllers;

use App\DataTables\PengumumanDataTable;
use App\Models\Pengumuman;
use App\Http\Requests\StorePengumumanRequest;
use App\Http\Requests\UpdatePengumumanRequest;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

class PengumumanController extends Controller
{

    public function index(PengumumanDataTable $dataTable)
    {
        return $dataTable->render('pembina.pengumuman.index');
    }

    public function create()
    {
        return view('pembina.pengumuman.create');
    }

    public function store(StorePengumumanRequest $request)
    {
        $pembina = User::Role('pembina')->with('pembina')
            ->where('id', '=', auth()->user()->id)
            ->first();
        $dataPembina = $pembina->pembina->id ?? null;
        $data = ($request->all());
        if ($request->hasFile('gambar')) {
            $data['gambar'] = $request->file('gambar')->store('public/pengumuman');
        }
        $data['created_by'] = auth()->user()->name;
        $data['id_ekskul'] = $dataPembina;
        $data['read_at'] = 0;
        $dataSave = Pengumuman::create($data);
        toastr()->success('Pengumuman Berhasil dipublish !');
        return redirect()->route('pengumuman.index');
    }

    public function show($id)
    {
        $data = Pengumuman::findOrFail($id);
        return view('siswa.pengumuman.detail', compact('data'));
    }

    public function edit($id)
    {
        $data = Pengumuman::findOrFail($id);
        return view('pembina.pengumuman.edit', compact('data'));
    }

    public function update(UpdatePengumumanRequest $request, $id)
    {
        $data = $request->all();
        $pengumuman = Pengumuman::findOrFail($id);
        if ($request->hasFile('gambar')) {
            if ($pengumuman->gambar != null && Storage::exists($pengumuman->gambar)) {
                Storage::delete($pengumuman->gambar);
            }
            $data['gambar'] = $request->file('gambar')->store('public/pengumuman');
        }
        $pengumuman->fill($data);
        $pengumuman->update();
        toastr()->success('Data pengumuman berhasil diubah!');
        return redirect()->route('pengumuman.index');
    }

    public function destroy($id)
    {
        $data = Pengumuman::findOrFail($id);
        if ($data->gambar != null) {
            Storage::delete($data->gambar);
        }
        $data->delete();
        toastr()->success('Data Siswa berhasil dihapus!');
        return back();
    }
}
