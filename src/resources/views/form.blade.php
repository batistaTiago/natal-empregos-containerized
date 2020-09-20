@extends('layouts.area_do_cliente')

@section('css')
<style>

</style>
@endsection

@section('content')

<h1>Cadastrar vaga</h1>
<form action="{{route('admin.vaga.editar')}}" method="POST">
    @csrf
    <input type="text" name="empresa">
    <input type="text" name="titulo">
    <input type="text" name="subtitulo">
    <input type="text" name="local">
    <input type="text" name="descricao">
    <input type="text" name="observacoes">


    <select name="regime_contratacao_id" id="">
        <option value="1">CLT</option>
        <option value="2">PJ</option>
    </select>
    <input type="text" name="remuneracao">
    <button title='botaoEditarVaga' type="submit" class="btn btn-primary">

    </button>
</form>
@endsection

@section('js')
<script>

    $(() => {
        // escrever todo o código js aqui dentro

        

    });

</script>
@endsection