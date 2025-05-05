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
        if (!User::where('email', 'camila@empsis.com.br')->first()) {
            User::create([
                'name' => 'Camila Peroto',
                'email' => 'camila@empsis.com.br',
            ]);
        }
        if (!User::where('email', 'rafael@empsis.com.br')->first()) {
            User::create([
                'name' => 'Rafael Souza',
                'email' => 'rafael@empsis.com.br',
            ]);
        }
        if (!User::where('email', 'ana@empsis.com.br')->first()) {
            User::create([
                'name' => 'Ana Maria',
                'email' => 'ana@empsis.com.br',
            ]);
        }
    }
}
