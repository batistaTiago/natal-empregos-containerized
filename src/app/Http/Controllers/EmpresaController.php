<?php

namespace App\Http\Controllers;

use App\Models\Empresa;
use Illuminate\Http\Request;

class EmpresaController extends Controller
{

    public function cadastrarEmpresaForm()
    {
        return view('cadastroempresa');
    }
}
