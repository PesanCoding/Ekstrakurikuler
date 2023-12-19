<?php

namespace App\Http\Controllers;

use App\Http\Requests\JadwalStore;
use App\Http\Requests\JadwalUpdate;
use App\Models\Ekskul;
use App\Models\EkskulDetail;
use Illuminate\Http\Request;

class Jadwalcontroller extends Controller
{
    public function show($id)
    {
        $data = Ekskul::findOrFail($id);
        return view('admin.jadwal.create', compact('data'));
    }

    public function store(JadwalStore $request)
    {
        $data = $request->all();
        $jadwal = EkskulDetail::create($data);
        toastr()->success('Data jadwal berhasil ditambahkan!');
        return redirect()->route('ekskul.show', $request->id_ekskul);
    }

    public function edit($id)
    {
        $data = EkskulDetail::findOrFail($id);
        return view('admin.jadwal.edit', compact(
            'data'
        ));
    }

    public function update(JadwalUpdate $request, $id)
    {
        $data = EkskulDetail::findOrFail($id);
        $data->update($request->all());
        toastr()->warning('Data jadwal berhasil diubah!');
        return back();
    }

    public function destroy($id)
    {
        $data = EkskulDetail::findOrFail($id);
        $data->delete();
        toastr()->success('Data jadwal berhasil dihapus!');
        return back();
    }
}
