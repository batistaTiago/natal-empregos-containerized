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

    <div id="carouselExampleIndicators" class="carousel slide my-4" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
            <!-- <li data-target="#carouselExampleIndicators" data-slide-to="4"></li> -->
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <div class="d-flex justify-content-center w-100">
                    <img class='coachdecarreira' src="{{asset('img/car1.jpeg')}}" style="width: 50%; height: auto;">
                </div>
            </div>
            <div class="carousel-item">
                <div class="d-flex justify-content-center w-100">
                    <img class='coachdecarreira' src="{{asset('img/car2.jpeg')}}" style="width: 50%; height: auto;">
                </div>
            </div>
            <div class="carousel-item">
                <div class="d-flex justify-content-center w-100">
                    <img class='coachdecarreira' src="{{asset('img/car3.jpeg')}}" style="width: 50%; height: auto;">
                </div>
            </div>
            <div class="carousel-item">
                <div class="d-flex justify-content-center w-100">
                    <img class='coachdecarreira' src="{{asset('img/car4.jpeg')}}" style="width: 50%; height: auto;">
                </div>
            </div>
            <!-- <div class="carousel-item">
                <div class="d-flex justify-content-center w-100">
                    <img class='coachdecarreira' src="{{asset('img/car5.jpeg')}}" style="width: 50%; height: auto;">
                </div>
            </div> -->
        </div>
        <!-- <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a> -->
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

