<?php

use Illuminate\Database\Seeder;

use App\Models\RegimeContratacao;

class RegimeContratacaoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        RegimeContratacao::insert([
            [
                'nome' => 'CLT'
            ],
            [
                'nome' => 'PJ'
            ]
        ]);
    }
}
