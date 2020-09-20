@extends('layouts.area_do_cliente')

@section('css')
<style>

</style>
@endsection

@section('content')
<div class="heroi">
    <img class='imagemheroi' src="{{asset('img/heroi.jpg')}}">
    <div class="searchbar">
        <p>Busque pela vaga de sua preferência</p>
        <form method="GET" action="{{route('buscar.vaga')}}" class="searchform mt-2">
                <input type="text" id="searchinput" name="searchinput" class="searchinput " placeholder="Ex: Cozinheiro, Soldador, Motorista">
                <button title='botaoPesquisa' class="botaosearch"><i class="fas fa-search"></i></button>
        </form>
    </div>
</div>

<div class="container">    
    
    <div class="mt-5 mb-2 containercartao row">
        @foreach ($vagas as $idx => $vaga)
        <div class="my-3 col-sm-12 col-md-6 col-lg-4">
            <a title='linkVagaDetalhe' class="cartao" href="{{ route('cliente.vaga.detalhe', [ $vaga->id ]) }}">
              {{--
              <p>{{ $idx + 1 }}</p>
              --}}
              <p class="titulo text-center">{{ $vaga->titulo }}</p>
            <div class="empresacidade">
                <p>
                  {{ $vaga->empresa->nome ?? 'Não informado' }}
                </p>
            </div>
              <p class="fontezinha">Regime de contratação: {{ $vaga->regime->nome }}</p>
              <p class="fontezinha">Salário: <strong>{{ isset($vaga->remuneracao) ? realMoney($vaga->remuneracao) : 'Não informado' }}</strong></p>
            </a>
        </div>
        @endforeach
    </div>
    <div style="display: flex; justify-content: center">
        <div class="paginacao">
            {{ $vagas->links() }} 
        </div>
    </div>
</div>

<hr class="separador">

{{-- <div class="container containersobre">    
    <div class="missao">
        <h2>Missão</h2>
        <p>Atender e melhorar a performance das pessoas e das empresas.</p>
    </div>
    <div class="visao">
        <h2>Visão</h2>
        <p>Vender inteligência empresarial e pessoal.</p>
    </div>
    <div class="valores">
        <h2>Valores</h2>
        <p>Foco no Cliente, responsabilidade pessoal e profissional, 
            gostar de servir, gostar de aprender, resolutividade, respeito
            e gratidão.            
        </p>
    </div>
</div> --}}

<div class="newsletter">
    <p>Receba as vagas em primeira mão</p>
    <div> @include('flash::message') </div>

    <form action="{{route('contato.form.callback')}}" method="POST">
        @csrf
        <div class="newsform">
            <p>Preencha os seus dados e iremos enviar novas vagas assim que surgirem</p>
            <input type="email" id="email" name="email" class="newsinput" placeholder="Digite seu email">
            <input style="display:none;" type="text" name="nome" class="form-control" placeholder="Seu nome" value="Email solicita vagas">
            <input style="display:none;" type="text" name="assunto" class="form-control" placeholder="Qual o assunto?" value="Email solicita vagas">
            <input style="display:none;" type="number" name="telefone" class="form-control" placeholder="Telefone para contato (opcional)" value="1">
            <input style="display:none;" type="text" name="mensagem" class="form-control" placeholder="Telefone para contato (opcional)" value="Email solicita vagas">


        </div>
        <button title='botaoReceberVagas' class="botao"><i class="fas fa-envelope" style="margin-left: 8px;"></i> Receber vagas</button>
        <p id="privacidade">Não iremos compartilhar suas informações com ninguém.</p>
    </form>
</div>

@endsection

@section('js')
<script>

    $(() => {
        // escrever todo o código js aqui dentro

        

    });

</script>
@endsection

