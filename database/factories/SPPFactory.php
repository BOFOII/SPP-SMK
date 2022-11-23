<?php

namespace Database\Factories;

use App\Models\SPP;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SPP>
 */
class SPPFactory extends Factory
{
    protected $model = SPP::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'tahun' => fake()->numberBetween(2019, 2022),
            'nominal' => 60000,
        ];
    }
}
