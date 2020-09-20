@extends('layouts.admin_new')

@section('css')

@endsection

@section('content')
    <div class='container'> 
        <h2 class="text-center my-5">Caixa de entrada</h2>
        <div class="table-responsive mt-3">
            <table class="table table-hover table-bordered">
                <thead>
                    <tr>
                        <th scope="col">Nome</th>
                        <th scope="col">Assunto</th> 
                        <th scope="col">Telefone</th>
                        <th scope="col">Email</th>
                        <th scope="col">Mensagem</th>
                        <th scope="col">Lido</th>
                        <th scope="col">Ações</th>
                    </tr>
                </thead>
                <div> @include('flash::message') </div>
                <tbody>
                    @foreach($allContatos as $contato)
                        <tr>
                            <td>{{$contato->nome}}</td>
                            <td>{{$contato->assunto}}</td>
                            <td>{{$contato->telefone}}</td>
                            <td>{{$contato->email}}</td>
                            <td>
                                <p>
                                    {{$contato->mensagem}}
                                </p>
                            </td>
                            
                            @if($contato->lido)
                                <td>Lido</td>
                            @else
                                <td>Nao lido</td>
                            @endif


                            <td>
                                <div class="spread-flex-container px-3">
                                    <div>
                                        <a title='AnchorParaLerContatoAdmin' href="{{ route('ler.contato', [ $contato->id ]) }}">
                                            <i class="fas fa-search"></i>
                                        </a>
                                    </div>
                                    <div>
                                        <form action="{{route('deletar.contato')}}" method="POST">
                                            @method("DELETE")
                                            @csrf
                                            <input type="hidden" name="id" value="{{$contato->id}}">
                                            <button title='deletarContatoAdmin' style='border: none; background-color: transparent' type="submit">
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

@endsection