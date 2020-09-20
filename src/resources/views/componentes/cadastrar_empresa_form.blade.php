<form action="{{ route('admin.empresa.cadastrar.callback') }}" method="POST" id="cadastrar-empresa-form">
    <div class="cadastrarempresaconta">
        @csrf
        <label>Nome da empresa</label>
        <input type="text" name="nome" placeholder="Nome da empresa">
        <label for="nome_fantasia">Nome da empresa</label>
        <input type="text" name="nome_fantasia" placeholder="Nome fantasia">
        <label for="cnpj">CNPJ da empresa</label>
        <input type="number" name="cnpj" placeholder="CNPJ">
            
        <div style="display: flex; justify-content: center; margin-top: 2vh">
            <button title='botaoVoltarCadastrarEmpresa' type="submit" class="botao">
            Voltar
            </button>    
            <button title='botaoEnviarCadastrarEmpresa' type="submit" class="botao">
                Enviar
            </button>
        </div>
    </div>
</form>