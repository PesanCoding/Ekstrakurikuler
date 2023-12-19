<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Http\Requests\StoreSiswaRequest;
use App\Http\Requests\UpdateSiswaRequest;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $siswa = User::role('siswa')
            ->get();
        return view('admin.siswa.index', compact(
            'siswa'
        ));
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
        return view('admin.siswa.show', compact('siswa'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $siswa = User::findOrFail($id);
        return view('admin.siswa.edit', compact('siswa'));
    }

    /**
     * Update the specified resource in storage.
     */
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
