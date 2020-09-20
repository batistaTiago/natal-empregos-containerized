<?php

use Illuminate\Database\Seeder;

use App\Models\Usuario;

class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Usuario::insert([
            'email' => 'admin@natalempregos.com',
            'password' => \Hash::make('123mudar')
        ]);
    }
}
