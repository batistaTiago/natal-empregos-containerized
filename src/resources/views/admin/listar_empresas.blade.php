@extends('layouts.admin_new')

@section('css')

@endsection

@section('content')
    <div class='container'> 
        <h2 class="text-center my-5">Lista de Empresas</h2>
        <a title='AnchorParaCadastrarEmpresaAdmin' class="botaoadmin my-2" href="{{ route('admin.empresa.cadastrar.form')}}">Cadastrar Empresa</a>
        <div class="table-responsive mt-3">
            <table class="table table-hover table-bordered">
                <thead>
                    <tr>
                        <th scope="col">Nome da empresa</th>
                        <th scope="col">Cnpj</th> 
                        <th scope="col">Ações</th>
                    </tr>
                </thead>
                <div> @include('flash::message') </div>

                <tbody>
                    @foreach($empresas as $empresa)
                        <tr>
                            <td>{{$empresa->nome}}</td>
                            <td>{{$empresa->cnpj}}</td>
                            <td>
                                <div class="spread-flex-container px-3">
                                    <div>
                                        <a title='AnchorParaEditarEmpresaAdmin' title="editar_empresa" href="{{ route('admin.empresa.editar.form', [ $empresa->id ]) }}">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                    </div>
                                    <div>
                                        <form action="{{route('deletar.empresa')}}" method="DELETE">
                                            @csrf
                                            <input type="hidden" name="id" value="{{$empresa->id}}">
                                            <button title="deletar_empresa" style='border: none; background-color: transparent' type="submit" id="delete-submit">
                                                <i class="fa fa-trash" style="color: red"></i>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

@section('js')
<script>
    $(() => {
        $('#delete-submit').on('click', (e)=>{
            console.log('aqui');

            confirm = confirm('Tem certeza? ao deletar empresa perdera todas as vagas relacionadas a ela');
            if(confirm){
            }else{
                e.preventDefault();
            }
        });
});
</script>

@endsection