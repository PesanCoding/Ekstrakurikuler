<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = User::create([
            'name' => 'Admin',
            'email' => 'sadmin@gmail.com',
            'password' => bcrypt('12345678'),
        ]);
        $admin->assignRole('admin');

        $pembina = User::create([
            'name' => 'pembina',
            'email' => 'pembina@gmail.com',
            'password' => bcrypt('12345678'),
        ]);

        $pembina->assignRole('pembina');

        $siswa = User::create([
            'name' => 'siswa',
            'email' => 'user@gmail.com',
            'password' => bcrypt('12345678'),
        ]);

        $siswa->assignRole('siswa');
    }
}
