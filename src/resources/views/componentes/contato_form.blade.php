<form action="{{route('contato.form.callback')}}" method="POST" class="container formcontato mt-4 pb-2">
    @csrf

    <div class="row">
        <div class="form-group col-md-6 col-12">
            <label for="nome">Seu nome</label>
            <input type="text" name="nome" class="form-control" placeholder="Seu nome">
        </div>

        <div class="form-group col-md-6 col-12">
            <label for="assunto">Assunto</label>
            <input type="text" name="assunto" class="form-control" placeholder="Qual o assunto?">
        </div>
        <div class="form-group col-md-6 col-12">
            <label for="telefone">Telefone</label>
            <input type="number" name="telefone" class="form-control" placeholder="Telefone para contato (opcional)">
        </div>
        <div class="form-group col-md-6 col-12">
            <label for="email">Email para contato</label>
            <input type="email" name="email" class="form-control" placeholder="Email para contato">
        </div>
        <div class="form-group col-12">
            <label for="mensagem">Mensagem</label>
            <textarea name="mensagem" id="mensagem" rows="10" placeholder="Sua mensagem"  class="form-control"></textarea>
        </div>
       
        <button title='botaoEnviarContatoForm' type="submit" class="botao">
            Enviar
        </button>
    </div>
</form>