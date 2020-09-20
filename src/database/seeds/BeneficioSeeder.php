<?php

use Illuminate\Database\Seeder;

use App\Models\Beneficio;

class BeneficioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Beneficio::insert([
            [
                'nome' => 'Vale Alimentação'
            ],
            [
                'nome' => 'Vale Refeição'
            ],
            [
                'nome' => 'Vale Transporte'
            ],
        ]);
    }
}
