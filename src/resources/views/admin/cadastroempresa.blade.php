@extends('layouts.admin_new')

@section('css')
<style>

</style>
@endsection

@section('content')
<div> @include('flash::message') </div>
<div class="containercadastro">
    <h1 class='p-2'>Cadastrar Empresa</h1>
    @include('componentes.admin.formcadastroempresa')
    <div class='d-flex justify-content-center mt-3'>
      <a title='AnchorParaListagemEmpresas' id="backtolistagem" class="botaoadmin mx-1" href="{{route('admin.empresa.listar')}}">
          Voltar  
      </a>
      <a title='AnchorParaCadastrarEmpresaAdmin' id="enviar-button" class="botaoadmin mx-1">
        Enviar  
      </a>
  </div>
</div>
@endsection

@section('js')
<script>
    $(() => {
      // escrever todo o código js aqui dentro
      $('#enviar-button').on('click', ()=>{
        $('#cadastrar-empresa-form').submit();
      });
    });
</script>
@endsection