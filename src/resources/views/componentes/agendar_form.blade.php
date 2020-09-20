<form action="{{route('contato.form.callback')}}" method="POST" class="container formcontato mt-4 pb-2">
    <div class="row">
        @csrf
        <div class="form-group col-md-6 col-12">
            <label for="nome">Seu nome</label>
            <input type="text" name="nome" class="form-control" placeholder="Seu nome">
        </div>

        <button title='botaoEnviarAgendamento' type="submit" class="botao">
            Enviar
        </button>
        
    </div>
</form>