<?php

namespace App\Http\Controllers;

use App\Models\VagaEmprego;
use Illuminate\Http\Request;

class VagaController extends Controller
{
    // lista todas as vagas

    // Salva nova vaga via formulario

    // enviar todas as vagas para a requisicao
    public function listarVagas(Request $request)
    {
        $vagas = VagaEmprego::with('regime')->where('ativa', true)->paginate(12);
        return view('home', compact('vagas'));
    }

    public function landing(Request $request)
    {
        return redirect(route('cliente.vagas.listar'));
    }

    public function vagaDetalhes(Request $request)
    {
        $id = $request->id;
        $vaga = VagaEmprego::with('regime', 'beneficios', 'empresa')->find($id);
        return view('detalhesvaga', compact('vaga'));
    }

    public function procurarVaga(Request $request)
    {

        $searchString = $request['searchinput'];

        $vagas = VagaEmprego::with(['empresa', 'regime'])->select([
                'vaga_emprego.*'
            ])->join('empresa', 'empresa.id', 'vaga_emprego.empresa_id')
            ->where('vaga_emprego.titulo', 'like', '%' . $searchString . '%')
            ->orWhere('vaga_emprego.descricao', 'like', '%' . $searchString . '%')
            ->orWhere('empresa.nome', 'like', '%' . $searchString . '%')
            ->orWhere('empresa.nome_fantasia', 'like', '%' . $searchString . '%')
            ->paginate(24);

        return view('home', compact('vagas'));
    }
}
