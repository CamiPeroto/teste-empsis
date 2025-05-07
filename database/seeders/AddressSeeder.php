<?php
namespace Database\Seeders;

use App\Models\Address;
use App\Models\State;
use Illuminate\Database\Seeder;

class AddressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $prUf = State::where('uf', 'PR')->value('uf');

        if ($prUf) {
            if (! Address::where('user_cpf', '14345977924')->first()) {
                Address::create([
                    'street'   => 'Rua Palmares',
                    'number'   => '36',
                    'district' => 'Jardim Brasília',
                    'city'     => 'Irati',
                    'state'    => $prUf,
                    'zip_code' => '84500000',
                    'user_cpf' => '14345977924',
                ]);
            }

            if (! Address::where('user_cpf', '03840258420')->first()) {
                Address::create([
                    'street'   => 'Rua Cuiabá',
                    'number'   => '202',
                    'district' => 'Jardim Brasília',
                    'city'     => 'Carambeí',
                    'state'    => $prUf,
                    'zip_code' => '84145000',
                    'user_cpf' => '03840258420',
                ]);
            }

            if (! Address::where('user_cpf', '032401018425')->first()) {
                Address::create([
                    'street'   => 'Rua Ricardo Wagner',
                    'number'   => '36',
                    'district' => 'Oficinas',
                    'city'     => 'Ponta Grossa',
                    'state'    => $prUf,
                    'zip_code' => '84025220',
                    'user_cpf' => '032401018425',
                ]);
            }
        }
    }
}
