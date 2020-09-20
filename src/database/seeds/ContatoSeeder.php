<?php

use Illuminate\Database\Seeder;

class ContatoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('contatos')->insert([

            [
                'nome' => 'Joao',
                'assunto' => 'Candidato a UI UX',
                'telefone' => '96636969',
                'email' => 'cansado@garantista.com',
                'mensagem' => 'Gostaria de ser design!',
                'lido' => false,
            ],
            [
                'nome' => 'Maria',
                'assunto' => 'Tia do cafe',
                'telefone' => '84636969',
                'email' => 'diarista@garantista.com',
                'mensagem' => 'So uso brilhux',
                'lido' => false,
            ],
            [
                'nome' => 'Marilene',
                'assunto' => 'Costureira procura emprego',
                'telefone' => '84636969',
                'email' => 'diarista@costureira.com',
                'mensagem' => 'Nao sei o que dizer, so quero um trabalho.',
                'lido' => false,
            ],
        ]);
    }
}
