@extends('layouts.area_do_cliente')

@section('css')
<style>

</style>
@endsection

@section('content')


<div class="containersobre"> 
    <h2 style="text-decoration: underline">Sobre a Natal Empregos</h2>   
    <div class="missao ml-5">
        <p class="pmissao">Missão</p>
        <p class='ml-4'>Atender e melhorar a performance das pessoas e das empresas.</p>
    </div>
    <div class="visao ml-5">
        <p class="pvisao">Visão</p>
        <p class='ml-4'>Vender inteligência empresarial e pessoal.</p>
    </div>
    <div class="valores ml-5">
        <p class="pvalores">Valores</p>
        <p class='ml-4'>Foco no Cliente, responsabilidade pessoal e profissional, 
            gostar de servir, gostar de aprender, resolutividade, respeito
            e gratidão.            
        </p>
    </div>
    <div class="profissionais pb-3">
        <img class='coachdecarreira' src="{{asset('img/coachdecarreira.JPG')}}">
    </div>
</div>


@endsection

@section('js')
<script>

    $(() => {
        // escrever todo o código js aqui dentro

        

    });

</script>
@endsection

