<form action="{{route('admin.vaga.cadastrar.callback')}}" method="POST">
    @csrf
    <div class="divinputs">
      <label for="empresa">Nome da empresa</label>
      <div class="input-group">
        <input required type="text" class="form-control" name="empresa" id="empresa" placeholder="Nome da empresa" aria-label="Input group example" aria-describedby="btnGroupAddon">
        <div class="input-group-append">
          <button title='adicionarEmpresaAdmin' type="button" class="btn btn-success add-empresa-modal-trigger" data-toggle="modal" data-target="#exampleModalCenter">
            Adicionar uma nova empresa
          </button>
          {{-- <div class="input-group-text" id="btnGroupAddon">@</div> --}}
        </div>
    </div>
        <div class="row">
          <div class="col-6">
            <label for="titulo">Título da vaga</label>
            <input required class="inputs form-control" type="text" name="titulo" id="titulo" placeholder="Título da vaga">
          </div>

          <div class="col-6">
            <label for="subtitulo">Subtítulo</label>
            <input required class="inputs form-control" type="text" name="subtitulo" id="subtitulo" placeholder="Ex: Descrição resumida da vaga">
          </div>

          <div class="col-12">
            <label for="requisitos">Requisitos</label>
            <input required class="inputs form-control" type="text" name="requisitos" id="requisitos" placeholder="Ex: 2º Grau completo, Bacharelado...">
          </div>
        </div>

        <label for="descricao">Descrição da vaga</label>
        <textarea required type="textarea" class="form-control" name="descricao" id="descricao" rows="10" placeholder="Descrição detalhada da sua vaga"></textarea>

        <label for="contrato">Benefícios</label>
        <div class="row justify-content-around d-flex">
          @foreach ($beneficios as $beneficio)
            <div class="align-items-center">
            <input id="beneficio_{{$beneficio->id}}" type="checkbox" name="beneficios[{{$beneficio->id}}]">
              <label for="beneficio_{{$beneficio->id}}">{{$beneficio->nome}}</label>
            </div>
          @endforeach
        </div>
        <div class="row">
          <div class="col">
            <label for="remuneracao">Remuneração</label>
            <input required class="inputs form-control" type="number" name="remuneracao" id="remunerecao" placeholder="Remuneração (somente números)">
          </div>
          <div class="col"> 
            <label for="contato">Contato</label>
            <input required class="inputs form-control" type="text" name="contato" id="contato" placeholder="Ex: Dados para contato">
          </div>
        </div>
        <label for="contrato">Tipo de contratação</label>
        <div class="remoto">
            <select required class="inputs form-control" name="regime_contratacao_id" id="contrato" placeholder="Selecione um">
                <option value="">Selecione um</option>
                @foreach ($regime as $reg)
                  <option value="{{$reg->id}}">{{$reg->nome}}</option>
                @endforeach
            </select>
            <input type="checkbox" id="remoto" name="aceita_remoto" style="margin-left: 1em">
            <label for="remoto">Remoto?</label>
            <input type="checkbox" id="ativa" name="ativa" style="margin-left: 1em">
            <label for="ativa">Ativa?</label>
        </div>
        <div style="display: flex; justify-content: center; margin-top: 2vh;">
            <a title='voltarCadastroVagaAdmin' class="botaoadmin" href="{{route('admin.vagas.listar')}}">
              Voltar  
            </a>
            <button title='enviarCadastroVagaAdmin' class="botao ml-3" type="submit">
                Enviar
            </button>
        </div>
    </div>
</form>