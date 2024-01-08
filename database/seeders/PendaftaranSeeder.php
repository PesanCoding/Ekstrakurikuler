<?php

namespace Database\Seeders;

use App\Models\Ekskul;
use App\Models\Pendaftaran;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PendaftaranSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 1000; $i++) {
            $pendaftaran = Pendaftaran::create([
                'id_siswa' => fake()->randomElement(User::pluck('id')->toArray()),
                'id_ekskul' => fake()->randomElement(Ekskul::pluck('id')->toArray()),
                'alasan' => fake()->randomElement([
                    'Suka dengan ekskulnya',
                    'meningkatkan pengetahuan',
                    'ada yang saya suka'
                ]),
                'status_pendaftran' => 'setuju',
            ]);
        }
    }
}
