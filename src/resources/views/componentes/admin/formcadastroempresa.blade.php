


<form action="{{ route('admin.empresa.cadastrar.callback') }}" method="POST" id="cadastrar-empresa-form">
    <div class="containercadastro mx-4">
        @csrf
        <label for="nome_empresa">Nome da empresa</label>
        <input class="inputs form-control" type="text" name="nome" placeholder="Nome da empresa" required id="nome_empresa">
        <label for="nome_fantasia">Nome Fantasia</label>
        <input class="inputs form-control" required type="text" name="nome_fantasia" placeholder="Nome fantasia">
        <label for="cnpj">CNPJ da empresa</label>
        <input class="inputs form-control" required type="number" name="cnpj" placeholder="CNPJ">
            
        <div class="d-none" style="display: flex; justify-content: center; margin-top: 2vh;">
            <a title='voltarCadastroEmpresaAdmin' id="backtolistagem" class="botao my-2" href="{{route('admin.empresa.listar')}}">
              Voltar  
            </a>
            <button title='enviarCadastroEmpresaAdmin' id="novaEmpresaFormSubmitButton" type="submit" class="botao ml-3">
                Enviar!!!
            </button>
        </div>
    </div>
</form>