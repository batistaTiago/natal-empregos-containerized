<form action="{{route('admin.vaga.editar.callback')}}" method="POST">
    @method('PUT')
    @csrf
        <div class="row">

          <input type="hidden" name="id" value="{{ $vaga->id }}">

          <div class="col-6">
            <label for="titulo">Título da vaga</label>
            <input class="inputs form-control" type="text" name="titulo" id="titulo" placeholder="Título da vaga" value="{{ $vaga->titulo }}">
          </div>

          <div class="col-6">
            <label for="subtitulo">Subtítulo</label>
            <input class="inputs form-control" type="text" name="subtitulo" id="subtitulo" placeholder="Ex: Descrição resumida da vaga" value="{{ $vaga->sub_titulo }}">
          </div>

          <div class="col-12">
            <label for="requisitos">Requisitos</label>
            <input class="inputs form-control" type="text" name="requisitos" id="requisitos" placeholder="Ex: 2º Grau completo, Bacharelado..." value="{{ $vaga->requisitos }}">
          </div>
          <div class="col-12 d-none">
            <input class="d-none" type="text" name="empresa_id" value="{{$vaga->empresa_id}}">            
          </div>
        </div>

        <label for="descricao">Descrição da vaga</label>
        <textarea type="textarea" class="form-control" name="descricao" id="descricao" rows="10" placeholder="Descrição detalhada da sua vaga">{{ $vaga->descricao }}</textarea>

        <label for="contrato">Benefícios</label>
        <div class="row justify-content-around d-flex">
          @foreach ($beneficios as $beneficio)
            <div class="align-items-center">
              <input {{ $vaga->beneficios->pluck('id')->contains($beneficio->id) ? 'checked' : '' }} id="beneficio_{{$beneficio->id}}" type="checkbox" name="beneficios[{{$beneficio->id}}]">
              <label for="beneficio_{{$beneficio->id}}">{{$beneficio->nome}}</label>
            </div>
          @endforeach
        </div>
        <div class="row">
          <div class="col">
            <label for="remuneracao">Remuneração</label>
            <input class="inputs form-control" type="number" name="remuneracao" id="remunerecao" placeholder="Remuneração (somente números)" value="{{ $vaga->remuneracao}}">
          </div>
          <div class="col"> 
            <label for="contato">Contato</label>
            <input class="inputs form-control" type="text" name="contato" id="contato" placeholder="Ex: Dados para contato" value="{{ $vaga->contato }}">
          </div>
        </div>
        <label for="contrato">Tipo de contratação</label>
        <div class="remoto">
            <select class="inputs form-control" name="regime_contratacao_id" id="contrato" placeholder="Selecione um">
                <option value="">Selecione um</option>
                @foreach ($regime as $reg)
                  <option {{ ($vaga->regime_contratacao_id == $reg->id) ? 'selected' : '' }} value="{{$reg->id}}">{{$reg->nome}}</option>
                @endforeach
            </select>
            <input {{ !!$vaga->aceita_remoto ? 'checked' : '' }} type="checkbox" id="remoto" name="remoto" style="margin-left: 1em">
            <label for="remoto">Remoto?</label>
            <input {{ !!$vaga->ativa ? 'checked' : '' }} type="checkbox" id="ativa" name="ativa" style="margin-left: 1em">
            <label for="ativa">Ativa?</label>
        </div>
        <div style="display: flex; justify-content: center; margin-top: 2vh;">
            <a title='voltarEditarVagaAdmin' class="botaoadmin" href="{{route('admin.vaga.cadastrar.form')}}">
              Voltar  
            </a>
            <button title='enviarEditarVagaAdmin' type="submit" class="botao ml-3">
                Enviar
            </button>
        </div>
    </div>
</form>