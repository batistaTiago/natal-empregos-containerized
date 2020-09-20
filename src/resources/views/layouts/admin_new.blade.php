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

	<style>

		* {
			margin: 0;
			padding: 0;
			box-sizing: border-box;
		}

		html, body {
			height: 100%;
		}

		nav.gcc-navbar {
			display: flex;
			position: fixed;
			top: 0;
			left: 0;
			bottom: 0;
		}

		header.header {
			background: #0b4683;
			width: 100%;
			height: 60px;
		}

		footer.footer {
			/* background-color: yellow;
			height: 420px; */
		}

		section.section {
		}

		.border-teste {
			border: 3px solid pink;
		}

		.flex-grow {
			flex-grow: 1;
		}


		#vertical-container {
			margin-left: 256px;
		}


		.spread-flex-container {
			width: 100%;
			display: flex;
			justify-content: space-evenly;
			align-items: center;
		}
	</style>

    <title>NE - Administração</title>
	
</head>
<body>
	<div>
		<nav class="gcc-navbar" style="height: 100vh;">
			@include('componentes.admin.sidebar')
		</nav>

		<div class="d-flex flex-column justify-content-between flex-grow" id="vertical-container">
			<header class="header">
				@include('componentes.admin.header')
			</header>
			<section class="section flex-grow">
				@yield('content')
			</section>
			<footer class="footer">
				@include('componentes.admin.footer')
			</footer>
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
