<?php

namespace Database\Factories;

use App\Models\Siswa;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Siswa>
 */
class SiswaFactory extends Factory
{
    protected $model = Siswa::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            //
            'nisn' => fake()->numberBetween(1000000000, 2000000000),
            'nis' => fake()->numberBetween(1000000000, 2000000000),
            'nama' => fake()->name(),
            'kelas_id' => rand(1, 8),
            'alamat' => fake()->address(),
            'no_telp' => fake()->numberBetween(800000000000, 900000000000),
            'spp_id' => rand(1, 3)
        ];
    }
}
