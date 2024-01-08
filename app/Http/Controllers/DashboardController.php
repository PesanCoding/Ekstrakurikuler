<?php

namespace App\Http\Controllers;

use App\Charts\DashboardAdminChart;
use App\Models\Ekskul;
use App\Models\EkskulDetail;
use App\Models\Pendaftaran;
use App\Models\Pengumuman;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(DashboardAdminChart $dashboardAdminChart)
    {
        $user = Auth::user();
        if ($user->hasRole('siswa')) {

            $dataId = Pendaftaran::approvedEkskulIdsBySiswaId(auth()->user()->id);
            $data = Pengumuman::unreadByEkskulIds($dataId)->get();
            return view('dashboard', compact('data'));
        }

        if ($user->hasRole('pembina')) {
            $id = auth()->user()->id;
            $ekskul = Ekskul::where('penanggung_jawab', $id)->first();
            $anggota = Pendaftaran::approvedMembers($ekskul->id)->get();
            $siswa = $anggota->count();
            $daftar = Pendaftaran::pendingRegistrations($ekskul->id)->count();
            $jadwal = EkskulDetail::jadwal($ekskul->id)->get();
            $jadwal = EkskulDetail::where('id_ekskul', $ekskul->id)->get();
            return view('dashboard', compact(
                'ekskul',
                'jadwal',
                'siswa',
                'daftar'
            ));
        }

        $data = [
            'tanggal'       => now()->toDateTimeString(),
            'data_siswa'    => User::role('siswa')->count(),
            'data_pembina'  => User::role('pembina')->count(),
            'data_ekskul'   => Ekskul::count(),
        ];
        $chart = $dashboardAdminChart->build();
        return view('dashboard', compact('data', 'chart'));
    }
}
