<?php

namespace App\Http\Controllers;

use App\DataTables\SiswaDataTable;
use App\Models\Siswa;
use App\Http\Requests\StoreSiswaRequest;
use App\Http\Requests\UpdateSiswaRequest;
use App\Models\Pendaftaran;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\Datatables;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(SiswaDataTable $dataTable)
    {
        return $dataTable->render('admin.siswa.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.siswa.create');
    }

    public function store(StoreSiswaRequest $request)
    {
        $data = $request->all();
        if ($request->hasFile('photo_profile')) {
            $data['photo_profile'] = $request->file('photo_profile')->store('public/photo_profile');
        }
        $user = User::create($data);
        $data['password'] = bcrypt($data['password']);
        $user->assignRole('siswa');
        toastr()->success('Data Siswa berhasil ditambahkan!');
        return redirect()->route('siswa.index');
    }
    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $siswa = User::findOrFail($id);
        $ekskul = Pendaftaran::ekskulSetujuByIdSiswa($id)->get();
        return view('admin.siswa.show', compact('siswa', 'ekskul'));
    }

    public function edit($id)
    {
        $siswa = User::findOrFail($id);
        return view('admin.siswa.edit', compact('siswa'));
    }

    public function update(UpdateSiswaRequest $request, $id)
    {
        $data = $request->all();
        $siswa = User::findOrFail($id);
        if ($request->hasFile('photo_profile')) {
            if ($siswa->photo_profile != null && Storage::exists($siswa->photo_profile)) {
                Storage::delete($siswa->photo_profile);
            }
            $data['photo_profile'] = $request->file('photo_profile')->store('public/photo_profile');
        }
        $siswa->fill($data);
        $siswa->update();
        toastr()->info('Data user berhasil diubah!');
        return redirect()->route('siswa.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $data = User::findOrFail($id);
        if ($data->photo_profile != null) {
            Storage::delete($data->photo_profile);
        }
        $data->delete();
        toastr()->success('Data Siswa berhasil dihapus!');
        return back();
    }
}
