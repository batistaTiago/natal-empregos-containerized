<?php

namespace App\Http\Controllers\Admin;

use App\Models\Empresa;
use App\Models\VagaEmprego;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Beneficio;
use App\Models\RegimeContratacao;
use App\Models\VagaEmpregoBeneficio;
use DB;

class VagaController extends Controller
{


    public function listarVagas(Request $request)
    {
        $vagas = VagaEmprego::with(['regime', 'empresa'])->get();
        $beneficios = Beneficio::all();
        $regime = RegimeContratacao::all();
        return view('admin.listar_vagas', compact('vagas', 'beneficios', 'regime'));
    }

    public function cadastroForm(Request $request)
    {
        $empresas = Empresa::all();
        $regime = RegimeContratacao::all();
        $beneficios = Beneficio::all();
        return view('admin.cadastrovaga', compact('empresas', 'regime', 'beneficios'));
    }


    // Salva nova vaga via formulario
    public function cadastroNovaVaga(Request $request)
    {
        $novaVaga = new  VagaEmprego();
        $slugname = \slugify($request->empresa);
        DB::beginTransaction();

        $empresa = Empresa::procurarPorNomeOuCriar($request->empresa);

        $novaVaga->titulo  = $request->titulo;
        $novaVaga->sub_titulo = $request->subtitulo;
        $novaVaga->descricao = $request->descricao;
        $novaVaga->regime_contratacao_id = $request->regime_contratacao_id;
        $novaVaga->remuneracao = $request->remuneracao;
        $novaVaga->aceita_remoto = $request->aceita_remoto;
        $novaVaga->requisitos = $request->requisitos;
        $novaVaga->contato = $request->contato;
        $novaVaga->regime_contratacao_id = $request->regime_contratacao_id;

        if (isset($empresa)) {
            $novaVaga->empresa_id = $empresa->id;
            $empresaSuccess = true;
        }

        $data = $request->all();

        if (array_key_exists('ativa', $data) and $data['ativa'] == 'on') {
            $data['ativa'] = 1;
            $novaVaga->ativa = $data['ativa'];
        }

        if (array_key_exists('aceita_remoto', $data) and $data['aceita_remoto'] == 'on') {
            $data['aceita_remoto'] = 1;
            $novaVaga->aceita_remoto = $data['aceita_remoto'];
        }
        
        if (isset($data['beneficios'])) {
            $beneficiosInput = $data['beneficios'];
        } else {
            $beneficiosInput = [];
        }

        $novaVagaSuccess  = $novaVaga->save();

        if ($novaVagaSuccess) {

            $beneficios = Beneficio::all();
            $beneficiosVaga = [];
            foreach ($beneficios as $beneficio) {
                if (array_key_exists($beneficio->id, $beneficiosInput)) {
                    if ($beneficiosInput[$beneficio->id] == "on") {

                        $vagaBeneficio = new VagaEmpregoBeneficio();

                        $vagaBeneficio->vaga_emprego_id = $novaVaga->id;
                        $vagaBeneficio->beneficio_id = $beneficio->id;

                        $beneficiosVaga[] =  $vagaBeneficio->toArray();
                    }
                }
            }
            $vagaEmpregoBeneficioSucess =  VagaEmpregoBeneficio::insert($beneficiosVaga);

            if ($vagaEmpregoBeneficioSucess && $novaVagaSuccess && $empresaSuccess) {
                DB::commit();
                flash('Vaga de trabalho registrata com sucesso')->success();
                return redirect()->back();
            }
        }
        DB::rollBack();

        if (!$vagaEmpregoBeneficioSucess) {
            flash('Registro nao concluido , erro ao informar beneficios.')->error();
            return redirect()->back();
        }
        if (!$novaVagaSuccess) {
            flash('Registro nao concluido , erro nos dados da nova vaga')->error();
            return redirect()->back();
        }
        if (!$empresaSuccess) {
            flash('Registro nao concluido , erro nos dados da empresa')->error();
            return redirect()->back();
        }
    }


    public function editarVagaEmpregoForm(Request $request)
    {
        $vaga = VagaEmprego::with('regime', 'empresa', 'beneficios')->find($request->id);
        $beneficios = Beneficio::all();
        $regime = RegimeContratacao::all();

        // // return response()->json([
        // //     'vaga_beneficios_id' => $vaga->beneficios->pluck('id'),
        // //     'all_beneficios_id' => $beneficios->pluck('id')
        // // ]);

        // $all = collect([1, 2, 3]);
        // $meus = collect([1, 3]);

        // $checked = $all->map(function ($beneficio) use ($meus) {
        //     return $meus->contains($beneficio);
        // });

        // dd($checked);

        // foreach ($meus as $meu_beneficio) {
        //     $tenho = $all->contains($meu_beneficio);
        // }

        // dd($all->contains(10));

        return view('admin.editarvaga', compact('vaga', 'beneficios', 'regime'));
    }


    public function editarVagaEmpregoCallback(Request $request)
    {
        $id = $request->id;

        $data = $request->all();
        DB::beginTransaction();

        $vaga = VagaEmprego::with('beneficios')->find($id);

        $vagaBeneficios = VagaEmpregoBeneficio::where('vaga_emprego_id', $id)->get();
        $data = $request->all();

        // dd($data);
      
        if (array_key_exists('beneficios', $data)) {
            $data['beneficios'] = collect($data['beneficios']);
        } else {
            $data['beneficios'] = [];
        }
 
        $keys = [];

        foreach ($data['beneficios'] as $key=>$beneficio) {
            $keys[] = $key;
            if ($beneficio  === "on") {
                $data['beneficios'][$key] = true;
            }
        }
        if(isset($request->remoto)){
            $request->remoto = true;
        }else{
            $request->remoto = false;
        }
    
        if (isset($request['ativa'])) {
            $request->ativa = true;
        } else {
            $request->ativa = false;
        }



        if ($vaga) {
            
            $vaga->titulo = $request->titulo;
            $vaga->sub_titulo = $request->subtitulo;
            $vaga->descricao = $request->descricao;
            $vaga->remuneracao = $request->remuneracao;
            $vaga->aceita_remoto = $request->aceita_remoto;
            $vaga->requisitos  = $request->requisitos;
            $vaga->contato = $request->contato;
            $vaga->ativa = $request->ativa;
            $vaga->regime_contratacao_id = $request->regime_contratacao_id;
            $vaga->empresa_id = $request->empresa_id;


            $deletedBeneficioList = [];
            foreach($vaga->beneficios as $key=>$beneficio){

                $deletedBeneficioList[] = $beneficio;
            }

            $deletedBeneficios = VagaEmpregoBeneficio::clearVagaBeneficios($vaga->id);
    
            
            $createdNewBeneficios = VagaEmpregoBeneficio::createNewVagaBeneficios($vaga->id, $keys);
            

        } else {
            flash('Vaga nao encontrada')->error();
            return redirect()->back();
        }

        $updated = $vaga->update();

        if ($updated && $deletedBeneficios && $createdNewBeneficios) {
            DB::commit();
            flash('Vaga editada com sucesso')->success();
            return redirect()->back();
        } else {
            DB::rollBack();
            flash('Vaga nao editada, algum erro ocorreu.')->error();
            return redirect()->back();
        }
    }

    public function deletarVaga(Request $request)
    {

        $id = $request->id;
        $vaga = VagaEmprego::find($id);
        if($vaga){
            $deleted = $vaga->delete();
            if ($deleted) {
                flash('Vaga deletada com sucesso')->success();
                return redirect()->back();
            } else {
                flash('Vaga deletada com sucesso')->success();
                return redirect()->back();
            }
        }else {
            flash('Vaga nao encontrada, tente novamente')->error();
            return redirect()->back();
        }
     
    }
}
