<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Admin; // <- Esto es lo que faltaba
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run()
    {
        Admin::create([
            'nombre' => 'Gabriel',
            'email' => 'gabriel100agpe@gmail.com',
            'password' => Hash::make('gabriel098'),
        ]);
    }
}
