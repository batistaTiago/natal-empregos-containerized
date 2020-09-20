@extends('layouts.area_do_cliente')

@section('css')
<style>

</style>
@endsection

@section('content')
<div class="container">
    <h2 class='p-2'>Lista de Empresas</h2>
    @include('componentes.tabelavagas')
</div>

@endsection

@section('js')
<script>

    $(() => {
        // escrever todo o código js aqui dentro

        

    });

</script>
@endsection