<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Siswa;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Siswa::factory(80)->create();
        $this->call([
            // PermissionSeeder::class,
            // RoleSeeder::class,
            PendaftaranSeeder::class,
        ]);
    }
}
