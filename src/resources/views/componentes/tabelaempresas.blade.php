<table style="width:100%"  class='tabelacadastro'>
    <tr>
        <th>Título</th>
        <th>Nome da empresa</th> 
        <th>Editar</th>
        <th>Apagar</th>
    </tr>
    <tr class="fundoheader">
        <th>{{ $vaga->titulo }}</th> 
        <th>{{ $vaga->empresa->nome }}</th> 
        <td><a title='editarEmpresaAdmin' href={{ route('admin.vaga.editar')}}><i class="fas fa-edit"></a></i></td>
        <td><a title='deletarEmpresaAdmin' href=""><i class="fas fa-trash-alt"></a></i></td>
    </tr>
</table>
