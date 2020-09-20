<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        /* administrativo */
        $this->call(UsuarioSeeder::class);

        /* entidades base */
        $this->call(RegimeContratacaoSeeder::class);
        $this->call(BeneficioSeeder::class);
    }
}
