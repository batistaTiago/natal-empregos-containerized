@extends('layouts.admin_new')

@section('css')

@endsection

@section('content')
    <div class='container'> 
    <h2 class="text-center my-5">{{$contato->assunto}}</h2>
    <div class="container divdetalhes">
        <div class="infoenvio">
            <p>Enviado em {{$contato->created_at}}</p>
        </div>
        <p class="titulocabeca py-2">
            {{$contato->nome}}
        </p>
        <div class="detalhado my-2">
            <p>{{ $contato->mensagem }}</p>        
        </div>
        <hr />
        <br />
    
        <h3>Contato</h3>
        <div class="divsessao">
            <a title='AnchorParaContatoAdmin' href="mailto:{{$contato->email}}">{{$contato->email}}</a>
        </div>
    </div>
    </div>
@endsection

@section('js')

@endsection