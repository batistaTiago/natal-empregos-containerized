<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */

Route::get('/', 'VagaController@landing')->name('home');
Route::get('/listavagas', function () {
    return view('listavagas');
});

Route::get('/servicos', function () {
    $servicos = [
        '',
        '',
        '',
        '',
        '',
        '',
        '',
        '',
        '',
        '',
        '',
        '',
        '',
        '',
    ];

    return view('servico.servicos', compact('servicos'));
});

Route::get('/servicopost', function () {
    return view('servico.detalheservico');
});

Route::get('/sobrenos', function () {
    return view('sobrenos');
});


Route::get('login', 'LoginController@loginForm')->name('admin.login.form');
Route::post('login', 'LoginController@loginCallback')->name('admin.login.callback');
Route::post('logout', 'LoginController@logoutCallback')->name('admin.logout.callback');








/* AREA DO ADMIN */
Route::prefix('admin')->middleware(['admin-access-control'])->group(function () {

    Route::get('dashboard', 'AdminController@dashboard')->name('admin.dashboard');

    Route::prefix('vagas')->group(function () {
        Route::get('/', 'Admin\VagaController@listarVagas')->name('admin.vagas.listar');

        Route::get('cadastrar', 'Admin\VagaController@cadastroForm')->name('admin.vaga.cadastrar.form');
        Route::post('cadastrar', 'Admin\VagaController@cadastroNovaVaga')->name('admin.vaga.cadastrar.callback');

        Route::get('/editar/{id}', 'Admin\VagaController@editarVagaEmpregoForm')->name('admin.vaga.editar.form');
        Route::put('/editar', 'Admin\VagaController@editarVagaEmpregoCallback')->name('admin.vaga.editar.callback');
        Route::post('/deletar', 'Admin\VagaController@deletarVaga')->name('admin.vaga.deletar.callback');
    });

    Route::prefix('empresas')->group(function () {
        Route::get('/', 'Admin\EmpresaController@listarEmpresas')->name('admin.empresa.listar');
        Route::get('cadastrar', 'Admin\EmpresaController@cadastrarEmpresaForm')->name('admin.empresa.cadastrar.form');
        Route::post('cadastrar', 'Admin\EmpresaController@cadastrarEmpresaCallback')->name('admin.empresa.cadastrar.callback');
        
        Route::get('/editar/{id}', 'Admin\EmpresaController@editarEmpresaForm')->name('admin.empresa.editar.form');
        Route::put('/editar', 'Admin\EmpresaController@editarEmpresaSubmit')->name('admin.empresa.editar.callback');

        Route::get('/deletar', 'Admin\EmpresaController@deletarEmpresa')->name('deletar.empresa');
        Route::prefix('{slug}')->group(function () {
            Route::prefix('vagas')->group(function () {
                Route::post('editar', 'VagaController@editarVagaEmprego')->name('admin.vaga.editar');
                Route::post('/cadastrar', 'VagaController@cadastroNovaVaga')->name('nova.vaga.emprego.callback');
            });
        });
    });
    Route::prefix('contato')->group(function () {
        Route::delete('/deletar', 'Admin\ContatoController@deletarContato')->name('deletar.contato');
        Route::get('/' , 'Admin\ContatoController@listarContatos')->name('admin.contato.listar');
        Route::get('/ler/{id}' , 'Admin\ContatoController@lerContato')->name('ler.contato');
    });
});









Route::prefix('vagas')->group(function () {
    Route::get('/', 'VagaController@listarVagas')->name('cliente.vagas.listar');
    Route::get('/{id}', 'VagaController@vagaDetalhes')->name('cliente.vaga.detalhe');
});

Route::post('/contato', 'ContatoController@contatoCallback')->name('cliente.contato.form');

Route::post('gcc-tracker', 'TrackerController@registrarAcesso')->name('gcc-tracker');


Route::post('/contato', 'ContatoController@contatoCallback')->name('contato.form.callback');

Route::get('/detalhes', function () {
    return view("detalhesvaga");
});

Route::get('/buscarvaga' , 'VagaController@procurarVaga')->name('buscar.vaga');

Route::get('/teste', 'Admin\VagaController@deletarVaga')->name('teste');
Route::post('/cadastrovaga', 'Admin\VagaController@cadastroForm')->name('cadastro.vaga');
