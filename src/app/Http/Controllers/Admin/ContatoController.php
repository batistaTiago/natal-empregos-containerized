<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Contato;
use Illuminate\Http\Request;

class ContatoController extends Controller
{

    public function listarContatos(Request $request)
    {

        $allContatos = Contato::all();
        return view('admin.listar_contatos' , compact('allContatos'));

    }

    public function lerContato(Request $request , $id)
    {
        // $id = $request->id;
        $contato = Contato::find($id);

        if($contato){
            $contato->lido = true;
        }else{
            flash('contato nao encontrado, tente novamente')->error();
            return redirect()->back();
        }
        return view ('admin.ler_contato' , compact('contato'));

    }

    public function deletarContato(Request $request)
    {

        $id = $request->id;
        $contato = Contato::find($id);
        if ($contato->id == $id) {
            $destroyed = Contato::destroy($id);
            if ($destroyed) {
                flash('Contato deletado com sucesso')->success();
                return redirect()->back();
            }
        } else {
            flash('Contato nao encontrato, tente novamente')->error();
            return redirect()->back();
        }
    }
}
