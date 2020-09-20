@extends('layouts.area_do_cliente')

@section('css')
<style>

</style>
@endsection

@section('content')
<div class="container divservico">    
    <h1 class="p-2">Nossos serviços</h1>
    <div class="row">
        <div class="col-lg-3 col-md-5 my-3 cartaoservico">
            <div class="row">
                <img class='imagemcartaoservico mt-4' src="{{asset('img/imagemservico1.jpg')}}">
            </div>
            <div class="textoscartaoservico">
                <h3 class="tituloservico">
                    Currículo criativo
                </h3>
                <div class="descricaozinha">
                    <p>*Texto dela aqui*</p>
                </div>
            </div>
            <div class="rodapeservico">
                <p>Valor: <strong>R$ 40,00</strong></p>
                <button title='botaoAgendarServico1' class="botao" data-target="#modal">Agende já</button>
            </div>
        </div>

        <div class="col-lg-3 col-md-5 my-3 cartaoservico">
            <div class="row">
                <img class='imagemcartaoservico mt-4' src="{{asset('img/imagemservico2.jpg')}}">
            </div>
            <div class="textoscartaoservico row">
                <h3 class="tituloservico">
                    Currículo criativo com consultoria
                </h3>
                <div class="descricaozinha">
                    <p>*Texto dela aqui*</p>
                </div>
            </div>
            <div class="rodapeservico">
                <p>Valor: <strong>R$ 60,00</strong></p>
                <button title='botaoAgendarServico2' class="botao" data-target="#modal">Agende já</button>
            </div>
        </div>

        <div class="col-lg-3 col-md-5 my-3 cartaoservico">
            <div class="row">
                <img class='imagemcartaoservico mt-4' src="{{asset('img/imagemservico3.jpg')}}">
            </div>
            <div class="textoscartaoservico row">
                <h3 class="tituloservico">
                    Pacote master
                </h3>
            <div class="descricaozinha">
                <p>Instrução e aprimoramento de currículo</p>
            </div>
        </div>
        <div class="rodapeservico">
            <p>Valor: <strong>R$ 150,00</strong></p>
            <button title='botaoAgendarServico3' class="botao" data-target="#modal">Agende já</button>
        </div>
    </div>
</div> 
<hr class="separador">


@endsection

@section('js')
<script>
    $(() => {
        $(".botao").on('click', function(event) {
            event.preventDefault();
            $('.form-container').hide();
            $('.contato-form').show();
            $('#modal').modal('show');
        })
    })
</script>
@endsection