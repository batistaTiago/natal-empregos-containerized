<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
   
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <script src="https://kit.fontawesome.com/7725e2dc25.js" crossorigin="anonymous"></script>

    <link href="{{ asset('css/system.css') }}" rel="stylesheet">


    @yield('css')

    <title>Bem vindo a Natal Empregos</title>
	
</head>
<body>
	<div class='header'>
		<div class="sideMenu">
			<div class="administracao">Administração</div>
			<div class="linha"></div>
			<div class='userContent'>
				<div>
					<img class="foto" src="{{ asset('img/admin.jpg') }}" alt="">
				</div>
				<div class="nomeEmail">
					<div class="nome">Admin</div>
				</div>
			</div>

			<div class="botoes">
				<img src="{{ asset('img/vagas.svg') }}" alt="">
				<div class="texto">Vagas</div>
			</div>

			<div class="botoes">
				<img src="{{ asset('img/contatos.svg') }}" alt="">
				<div class="texto">Empresas</div>
			</div>
			<div class="botoes">
				<img src="{{ asset('img/blog.svg') }}" alt="">
				<div class="texto">Serviços</div>
			</div>
			<div class="linha2"></div>
			<div class="botoes">
				<img src="{{ asset('img/sair.svg') }}" alt="">
				<div class="texto">Sair</div>
			</div>
		</div>
		<div class="topo"></div>
	</div>
	<div class="wrapper">
		<div class="container">
		@yield('content')
	</div>
	</div>


    <!-- jquery -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

    <!-- popper (dependencia do boostrap) -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>

    <!-- bootstrap -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    
    <!-- sweet alert 2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    
    @yield('modal')

    @yield('js')

</body>
</html>
