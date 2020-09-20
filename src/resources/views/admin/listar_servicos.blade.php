@extends('layouts.admin_new')

@section('css')

@endsection

@section('content')

    <div class='container'> 
        <h2 class="text-center my-5">Lista de Serviços</h2>
        <div class="table-responsive">
            <table class="table table-hover table-bordered">
                <thead>
                    <tr>
                        <th scope="col">Serviço</th>
                        <th scope="col">qualquercoisa</th> 
                        <th scope="col">Ações</th>
                    </tr>
                </thead>
                <div> @include('flash::message') </div>
                <tbody>
                    @foreach($vagas as $vaga)
                        <tr>
                            <td>Analista de sistemas</td>
                            <td>1620.42000-01</td>
                            <td>
                                <div class="spread-flex-container px-3">
                                    <a title='AnchorParaEditarServicoAdmin' title='AnchorParaDashboardAdmin' href="/">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <a title='AnchorParaDeletarServicoAdmin' href="/" class="text-danger">
                                        <i class="fas fa-trash-alt"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

@section('js')

@endsection