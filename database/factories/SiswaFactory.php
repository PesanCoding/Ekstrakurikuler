<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Siswa>
 */
class SiswaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $faker = Faker::create('id_ID');
        return $factoryData = [
            'name' => $faker->name(),
            'email' => $faker->email(),
            'email_verified_at' => now(),
            'nisn' => fake()->numberBetween(1000000000, 9999999999),
            'password' => Hash::make('password'),
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
            'nohp' => fake()->numberBetween(1000000000, 9999999999),
        ]; // Buat peran 'siswa' jika belum ada
        $user = User::create($factoryData);
        $user->assignRole('siswa');
    }
}
