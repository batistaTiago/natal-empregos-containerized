@extends('layouts.admin_new')

@section('css')
<style>

</style>
@endsection

@section('content')
<div> @include('flash::message') </div>
<div class="containercadastro p-4">
    <h1>Cadastrar Vaga</h1>
        @include('componentes.admin.formcadastrovaga')
</div>
@endsection

@section('js')
<script>
    $(() => {
      // escrever todo o código js aqui dentro
      $('#enviar-button').on('click', ()=>{
        $('#cadastrar-empresa-form').submit();
      });

      $('#cadastrar-empresa-form').on('submit', async(e) => {
          e.preventDefault();

          const form = $(e.currentTarget);

          const nome = form.find('input[name="nome"]').val();
          const nome_fantasia = form.find('input[name="nome_fantasia"]').val();
          const cnpj = form.find('input[name="cnpj"]').val();
          const _token = form.find('input[name="_token"]').val();

          try {
              const response = await $.ajax({
                  url: form.attr('action'),
                  method: form.attr('method'),
                  headers: {
                      'accept': 'application/json',
                  },
                  data: {
                      nome,
                      nome_fantasia,
                      cnpj,
                      _token
                  }
              });

              if (!!response.success) {
                  $('#exampleModalCenter').modal('hide');
                  $('#exampleModalCenter input').removeClass('is-invalid');

                  await Swal.fire({
                    icon: 'success',
                    title: 'Sucesso!',
                    text: 'Sua empresa foi cadastrada com sucesso',
                  });

                  $('#exampleModalCenter input').val('');
                  $('#empresa').val(nome);
                  $('#empresa').attr('readonly', true);
                  $('#empresa').addClass('is-valid');
                  $('#titulo').focus();
                  $('.add-empresa-modal-trigger').hide();
              } else {
                throw 'erro';
              }
          } catch (error) {
            $('#exampleModalCenter input').addClass('is-invalid');

            await Swal.fire({
              icon: 'error',
              title: 'Erro!',
              text: 'Houve um erro, tente novamente',
            });
          }

      });
  });

  $('.add-empresa-modal-trigger').on('click', e => {
    const nome = $('#empresa').val();
    if (!!nome) {
      $('#nome_empresa').val(nome);
    }
  });
</script>
@endsection



@section('modal')

<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Cadastrar nova empresa</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">
        @include('componentes.admin.formcadastroempresa')
      </div>

      <div class="modal-footer">
        <button type="button" class="botao" data-dismiss="modal">Voltar</button>
        <button type="submit" id="enviar-button" class="botao">Enviar</button>
      </div>
    </div>
  </div>
</div>

@endsection
