@extends('layouts.admin_new')

@section('css')

@endsection

@section('content')
    <div class='container'> 
        <h2 class="text-center my-5">Lista de vagas</h2>
        <a title='AnchorParaCadastrarVagaAdmin' class="botaoadmin my-2" href="{{ route('admin.vaga.cadastrar.form') }}">Cadastrar Vaga</a>
        <div class="table-responsive mt-3">
            <table class="table table-hover table-bordered">
                <thead>
                    <tr>
                        <th scope="col">Título</th>
                        <th scope="col">Nome da empresa</th> 
                        <th scope="col">Ações</th>
                    </tr>
                </thead>
                <div> @include('flash::message') </div>

                <tbody>
                    @foreach($vagas as $vaga)
                        <tr>
                            <td>{{$vaga->titulo}}</td>
                            <td>{{$vaga->empresa->nome}}</td>
                            <td>
                                <div class="spread-flex-container px-3">
                                    <a title='AnchorParaEditarVagaAdmin' title="editar_vaga" href="{{ route('admin.vaga.editar.form', [ $vaga->id ]) }}">
                                        <i class="fas fa-edit"></i>
                                    </a>

                                    <div class="text-danger">
                                        <form action="{{route('admin.vaga.deletar.callback')}}" method="POST">
                                            @csrf
                                            <div>
                                                <input name="id" type="hidden" class="form-control" id="id" value="{{$vaga->id}}">
                                            </div>
                                            
                                            <button title='botaoDeletarVagaAdmin' title="deletar_vaga" style='border: none; background-color: transparent' type="submit"><i class="fa fa-trash" style="color: red"></i></button>
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
        // escrever todo o código js aqui dentro

        $('#cadastrar-empresa-form').on('submit', async (e) => {
            e.preventDefault();
            
            const form = $(e.currentTarget);

            const nome = form.find('input[name="nome"]').val();
            const nome_fantasia = form.find('input[name="nome_fantasia"]').val();
            const cnpj = form.find('input[name="cnpj"]').val();
            const _token = form.find('input[name="_token"]').val();

            try{ 
              const response = await $.ajax({
                url: form.attr('action'),
                method: form.attr('method'),
                headers: {
                  'accept': 'application/json',
              },
                data: {
                  nome, nome_fantasia, cnpj, _token
                }
              });
              
              if(response=="success"){
              $('#exampleModalCenter').modal('hide');

              await Swal.fire({
                icon: 'success',
                title: 'Sucesso!',
                text: 'Sua empresa foi cadastrada com sucesso',
              });

              }
            
            }
            catch(error){
              $('#exampleModalCenter').modal('hide');

              await Swal.fire({
                icon: 'error',
                title: 'Erro!',
                text: 'Houve um erro ao cadastrar empresa',
              });
            }
            
            const option = $('<option>');
            option.text('testando');
            $('#contrato').append(option);
            
        });

        $('')
    });
</script>
@endsection