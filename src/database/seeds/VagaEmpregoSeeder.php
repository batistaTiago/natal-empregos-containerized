<?php

use App\Models\VagaEmprego;
use App\Models\VagaEmpregoBeneficio;
use Illuminate\Database\Seeder;

class VagaEmpregoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $d = [
            [
                'id' => 1,
                'empresa_id' => 1,
                'titulo' => 'Analista de Banco de Dados',
                'sub_titulo' => 'Garantistas CORPs',
                'descricao' => 'Analise de banco de dados e infraestrutura',
                'regime_contratacao_id' => 1, // CLT
                'remuneracao' => 16200,
                'aceita_remoto' => true,
                'requisitos' => 'Formacao em TI, Ciencia da Computacao ou Analise de sistemas',
                'contato' => 'gccoding@garantismo.com.br',
                'status' => true,
            ],
            [
                'id' => 2,
                'empresa_id' => 1,
                'titulo' => 'Web Designer',
                'sub_titulo' => 'Garantistas CORPs',
                'descricao' => 'AdobeXD e photoshop, se souber html e css eh um bonus',
                'regime_contratacao_id' => 2, // CLT
                'remuneracao' => 420,
                'requisitos' => 'Ensino Medio Completo, Nocoes de Design, TADS ou TI',
                'contato' => 'gccoding2@garantismo.com.br',
                'aceita_remoto' => true,

            ],
            [
                'id' => 3,
                'empresa_id' => 1,
                'titulo' => 'ASG',
                'sub_titulo' => 'Garantistas CORPs',
                'descricao' => 'Tia da limpeza',
                'regime_contratacao_id' => 1, // CLT
                'remuneracao' => 4.20,
                'requisitos' => 'Ensino fundamental completo.',
                'contato' => 'gccoding3@garantismo.com.br',
                'aceita_remoto' => false,

            ]
        ];

        $d = [];

        for ($i = 0; $i < 100; $i++) {

            if ($i % 2 == 0) {
                $requisito = 'Medio';
            } else {
                $requisito = 'Fundamental';
            }
            $d[] = [
                'id' => $i + 1,
                'empresa_id' => 1,
                'titulo' => 'Analista de Banco de Dados 54sa4 1r56sa46r 5s4a56r4as6 5r4as896r4as48',
                'sub_titulo' => 'Garantistas CORPs',
                'descricao' => 'Analise de banco de dados e infraestrutura',
                'regime_contratacao_id' => 1, // CLT
                'remuneracao' => 16200,
                'requisitos' => 'Ensino  ' . $requisito . '  completo.',
                'contato' => 'gccoding3@garantismo.com.br',
                'aceita_remoto' => true,
            ];
        }


        try {

            DB::beginTransaction();

            foreach ($d as $data) {

                $vaga = new VagaEmprego($data);

                $temVR = rand(0, 1);
                $temVT = rand(0, 1);

                $beneficios = [];

                if (rand(0, 1)) {
                    // tem VA
                    $beneficios[] = [
                        'beneficio_id' => 1, // VA
                        'vaga_emprego_id' => $vaga->id,
                        'valor' => rand(0, 420),
                    ];
                }

                if (rand(0, 1)) {
                    // tem VR
                    $beneficios[] = [
                        'beneficio_id' => 2, // VR
                        'vaga_emprego_id' => $vaga->id,
                        'valor' => rand(0, 420),
                    ];
                }

                if (rand(0, 1)) {
                    // tem VA
                    $beneficios[] = [
                        'beneficio_id' => 3, // VT
                        'vaga_emprego_id' => $vaga->id,
                        'valor' => rand(0, 420),
                    ];
                }

                $vaga->save();
                VagaEmpregoBeneficio::insert($beneficios);
            }

            DB::commit();
        } catch (\Throwable $e) {
            DB::rollBack();

            throw $e;
        }
    }
}
