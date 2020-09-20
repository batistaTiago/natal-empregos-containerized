<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Natal Empregos - Login</title>

    {{-- Bootstrap --}}
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    {{-- FontAwesome --}}
    <script src="https://kit.fontawesome.com/7725e2dc25.js" crossorigin="anonymous"></script>

    {{-- Google Fonts --}}
    <link href="https://fonts.googleapis.com/css2?family=Parisienne&display=swap" rel="stylesheet">
    

    <link href="{{ asset('css/system.css') }}" rel="stylesheet">
</head>
<body>
    <div class="divlogin">
    <form method="POST" action="{{ route('admin.login.callback') }}">
        @csrf
        <div class="gradient-border">
            <p class="navbar-brand logolayout logologin">Natal<strong>Empregos</strong></p>
            <h1 class='pb-4'>Faça login para entrar</h1>
                <hr>
            <div class="divinput mt-3">
                <p>Email</p>
                <input type="email" name="email">
                
                <p class='mt-2'>Senha</p>
                <input type="password" name="password">
                <div class="divbutton">
                    <button title='botaoEntrarFormLoginAdmin' class='botao mt-2'>Entrar</button>
                </div>
            </div>
        </div>
    </form>
   </div>
    
</body>
</html>
