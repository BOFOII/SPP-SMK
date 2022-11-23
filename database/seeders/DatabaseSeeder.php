<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Petugas;
use App\Models\Siswa;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\Siswa::factory(200)->create();
        // \App\Models\SPP::factory(4)->create();
        // Petugas::create([
        //     'nama_petugas' => 'Riski rahmand',
        //     'username' => 'admin',
        //     'password' => Hash::make(12345678),
        // ]);
        \App\Models\Petugas::factory(100)->create();
    }
}
