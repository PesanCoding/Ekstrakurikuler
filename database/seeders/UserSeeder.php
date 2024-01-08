<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');
        for ($i = 1; $i <= 1; $i++) {

            $siswa = User::create([
                'name' => $faker->name(),
                'email' => $faker->unique()->email(),
                'email_verified_at' => now(),
                'nisn' => fake()->numberBetween(1000000000, 9999999999),
                'password' => bcrypt('12345678'),
                'hobi' => fake()->randomElement([
                    'Sepak Bola',
                    'Badminton',
                    'Berrenang',
                    'Membaca',
                    'Tidur Seharian'
                ]),
                'jenis_kelamin' => fake()->randomElement(['laki-laki', 'perempuan']),
                'kelas' => fake()->randomElement(['X', 'XI', 'XII']),
                'alamat' => $faker->address,
                'nohp' => $faker->phoneNumber,
            ]);

            $siswa->assignRole('siswa');
        }
    }
}
