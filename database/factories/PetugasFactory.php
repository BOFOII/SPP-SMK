<?php

namespace Database\Factories;

use App\Models\Petugas;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Petugas>
 */
class PetugasFactory extends Factory
{
    protected $model = Petugas::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'username' => fake()->firstName(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            'nama_petugas' => fake()->name(),
        ];
    }
}
