<?php

namespace App\Http\Controllers;

use App\Models\Ekskul;
use Illuminate\Http\Request;

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
        return response()->json([
            'success' => true,
            'message' => 'Detail Data Post',
            'data'    => $post
        ]);
    }
}
