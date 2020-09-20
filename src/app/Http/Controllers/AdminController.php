<?php

namespace App\Http\Controllers;

use App\Models\Acesso;
use App\Models\Contato;
use App\Models\VagaEmprego;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard(Request $request)
    {
        $vagas = VagaEmprego::all();

        $contatos = Contato::all();

        $acessosUltimos30Dias = Acesso::where('created_at', '>=', now()->subDays(30))->get()
            ->map(function ($acesso) {
                $acesso->data_acesso = Carbon::parse($acesso->created_at)->format('m-d-Y');
                return $acesso;
            })->groupBy('data_acesso')
            ->map(function ($acessosPorDia, $dataAcesso) {
                return [
                    'dataAcesso' => $dataAcesso,
                    'qtd' => $acessosPorDia->count()
                ];
            })->values();

        // return response()->json($acessosUltimos30Dias);

        return view('admin.dashboard', compact('contatos', 'vagas', 'acessosUltimos30Dias'));
    }
}
