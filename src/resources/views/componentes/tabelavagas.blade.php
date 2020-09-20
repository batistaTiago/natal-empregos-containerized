    <table style="width:100%">
        <tr>
          <th>Título</th>
          <th>Nome da empresa</th> 
          <th>Editar</th>
          <th>Apagar</th>
        </tr>
        <tr>
            <td>{{ $vaga->titulo }}</td>
            <td>{{ $vaga->empresa->nome ?? 'Não informado' }}</td>
            <td><a title='editarVagaAdmin' href=""><i class="fas fa-edit"></a></i></td>
            <td><a title='deletarVagaAdmin' href=""><i class="fas fa-trash-alt"></a></i></td>
        </tr>
        
    </table>    
