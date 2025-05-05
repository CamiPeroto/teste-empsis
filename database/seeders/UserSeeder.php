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
                'cpf' => '14345977924',
                'name' => 'Camila Peroto',
                'email' => 'camila@empsis.com.br',
                'phone_number' => '42988322338',
                'street' => 'Rua Palmares',
                'number' => '36',
                'district' => 'Jardim Brasília',
                'city' => 'Irati',
                'state' => 'PR',
                'zip_code' => '84500000', 
            ]);
        }
        if (!User::where('email', 'rafael@empsis.com.br')->first()) {
            User::create([
                'cpf' => '03840258420',
                'name' => 'Rafael Souza',
                'email' => 'rafael@empsis.com.br',
                'phone_number' => '42998322337',
                'street' => 'Rua Cuiabá',
                'number' => '202',
                'district' => 'Jardim Brasília',
                'city' => 'Carambeí',
                'state' => 'PR',
                'zip_code' => '84145000', 
            ]);
        }
        if (!User::where('email', 'ana@empsis.com.br')->first()) {
            User::create([
                'cpf' => '032401018425',
                'name' => 'Ana Maria',
                'email' => 'ana@empsis.com.br',
                'phone_number' => '42991722331',
                'street' => 'Rua Ricardo Wagner',
                'number' => '36',
                'district' => 'Oficinas',
                'city' => 'Ponta Grossa',
                'state' => 'PR',
                'zip_code' => '84025220', 
            ]);
        }
    }
}
