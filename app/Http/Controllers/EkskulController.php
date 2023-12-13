<?php

namespace App\Http\Controllers;

use App\Models\Ekskul;
use App\Http\Requests\StoreEkskulRequest;
use App\Http\Requests\UpdateEkskulRequest;
use App\Models\User;
use Illuminate\Support\Facades\DB;
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
        $dataEkskul = Ekskul::insertGetId([
            'nama_ekskul' => $request->nama_ekskul,
            'penanggung_jawab' => $request->penanggung_jawab,
        ]);
        $dataJadwal = [
            'id_ekskul' => $dataEkskul,
            'lokasi'    => $request->lokasi,
            'hari'      => $request->hari,
            'jam_mulai' => $request->jam_mulai,
            'jam_selesai' => $request->jam_selesai
        ];
        DB::table('detail_ekskuls')->insert($dataJadwal);
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
    public function edit(Ekskul $ekskul)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEkskulRequest $request, Ekskul $ekskul)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ekskul $ekskul)
    {
        //
    }
}
