{{-- @extends('layouts.area_do_cliente')

@section('css')
<style>

</style>
@endsection

@section('content')

<h1>Entre em contato</h1>
<form action="" method="POST">
    <div class="empresacontainer">
        @csrf
        <label for="nome">Seu nome</label>
        <input type="text" name="nome">

        <label for="assunto">Assunto</label>
        <input type="text" name="assunto">

        <label for="telefone">Telefone</label>
        <input type="number" name="telefone">

        <label for="email">Email para contato</label>
        <input type="text" name="email">
        
        <label for="mensagem">Mensagem</label>
        <textarea name="mensagem" id="mensagem" rows="10" placeholder="Sua mensagem"></textarea>
       
        <button type="submit" class="botao">
            Enviar
        </button>
    </div>
</form>
@endsection

@section('js')
<script>

    $(() => {
        // escrever todo o código js aqui dentro

        

    });

</script>
@endsection --}}