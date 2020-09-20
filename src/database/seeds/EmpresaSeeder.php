<?php

use Illuminate\Database\Seeder;

use App\Models\Empresa;

class EmpresaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Empresa::insert([
            [
                'nome' => 'Garantistas Coding Corp',
                'nome_fantasia' => 'GCC',
                'cnpj' => '420',
                'slug' => \slugify('Garantistas Coding Corp')
            ],
            [
                'nome' => 'Teleperformance',
                'nome_fantasia' => 'TP das bad',
                'cnpj' => '013013000180',
                'slug' => \slugify('Teleperformance')
            ],
            [
                'nome' => 'SeuCreysonReborn',
                'nome_fantasia' => 'Coach dota 2 das americas em atividade',
                'cnpj' => '420420420',
                'slug' => \slugify('SeuCreysonReborn')
            ],
            [
                'nome' => 'Miranda Computacao',
                'nome_fantasia' => 'Miranda Computacao',
                'cnpj' => '48065201236',
                'slug' => \slugify('Miranda Computacao')
            ],
            [
                'nome' => 'RTZ GOD',
                'nome_fantasia' => 'Farmador Profissonal',
                'cnpj' => '420420420620',
                'slug' => \slugify('RTZ GOD')
            ],
        ]);
    }
}
