<?php

namespace App\Http\Controllers;

use App\Models\Ekskul;
use App\Http\Requests\StoreEkskulRequest;
use App\Http\Requests\UpdateEkskulRequest;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Spatie\Permission\Models\Role;

class EkskulController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dataEkskul = Ekskul::orderBy('id', 'DESC')->get();
        return view('admin.ekskul', compact('dataEkskul'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $usersWithRole = User::role('pembina')->get();
        return view('admin.create_ekskul', compact(
            'usersWithRole'
        ));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEkskulRequest $request)
    {
        $data = $request->all();
        if ($request->hasFile('gambar')) {
            $data['gambar'] = $request->file('gambar')->store('public/banner_ekskul');
        }
        $ekskul = Ekskul::create($data);
        toastr()->info('Data Ekskul berhasil ditambahkan!');
        return redirect()->route('ekskul.index');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $data = Ekskul::findOrFail($id);
        return view('admin.jadwal_detail', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $usersWithRole = User::role('pembina')->get();
        $data = Ekskul::findOrFail($id);
        return view('admin.edit_ekskul', compact('data', 'usersWithRole'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEkskulRequest $request, $id)
    {
        $data = $request->all();
        $model = Ekskul::findOrFail($id);
        if ($request->hasFile('gambar')) {
            if ($model->gambar != null && Storage::exists($model->gambar)) {
                Storage::delete($model->gambar);
            }
            $data['gambar'] = $request->file('gambar')->store('public/banner_ekskul');
        }
        $model->fill($data);
        $model->update();
        toastr()->info('Data Ekskul berhasil diubah!');
        return redirect()->route('ekskul.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $data = Ekskul::findOrFail($id);
        Storage::delete($data->gambar);
        $data->delete();
        toastr()->success('Data Ekskul berhasil dihapus!');
        return back();
    }
}
