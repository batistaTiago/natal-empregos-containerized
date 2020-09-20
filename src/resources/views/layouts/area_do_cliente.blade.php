<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
   
    {{-- Bootstrap --}}
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    {{-- FontAwesome --}}
    <script src="https://kit.fontawesome.com/7725e2dc25.js" crossorigin="anonymous"></script>

    {{-- Google Fonts --}}
    <link href="https://fonts.googleapis.com/css2?family=Parisienne&display=swap" rel="stylesheet">
    
    <link href="{{ asset('css/system.css') }}" rel="stylesheet">


    @yield('css')

    <title>Bem vindo a Natal Empregos</title>
</head>
<body>
    <div class="containerlayout">
        <nav class="navbar navbar-expand-lg navbar-dark fixed-top d-f center-items">
            <a title='navbarLogoAnchor' class="navbar-brand logolayout" href="/">Natal<strong>Empregos</strong></a>
            <button title='navbarBootstrapToggle' class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggler" aria-controls="navbarToggler" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
                      
            <div class="collapse navbar-collapse justify-content-center" id="navbarToggler">
              <ul class="navbar-nav" >
                <li class="nav-item mx-4">
                  <a title='AnchorParaServicos' class="nav-link" href="/servicos">Serviços</a>
                </li>
               <li class="nav-item mx-4">
                    <a title='AnchorParaSobrenos' class="nav-link" href="/sobrenos">Sobre nós</a>
                </li>
                <li class="nav-item mx-4">
                <a title='AnchorParaContato' class="botaocontato nav-link" href="">Contato</a>
                </li>
              </ul>
            </div>
          </nav>
        
        <div class="abraco">
            @yield('content')
        </div>
        
        <footer class="clientefooter">
            <div class="linksfooter">
                <div class="linksuteis">
                    <p style="font-size: 1.1em">Links úteis</p>
                    <ul>
                        <li><a href="">Sobre a Natal Empregos</a></li>
                        <li><a class="botaocontato" href="">Fale conosco</a></li>
                        <li><a href="https://www.instagram.com/natal.empregos/"><i class="fab fa-instagram"></i> natal.empregos</a></li>
                        <li><a href="https://www.facebook.com/groups/433243110094657/learning_content/"><i class="fab fa-facebook-square"></i> Natal Empregos</a></li>
                        <br>
                        <li>natal.empregos2020@gmail.com</li>
                    </ul>
                </div>
                <div class="parceiros">
                    <p style="font-size: 1.1em">Parceiros: </p>
                    <ul>
                        <li>Garantistas Coding LTDA 2020</li>
                    </ul>
                </div>
            </div>
            <div class="logofooter">
            <p class="logolayout" href="/">Natal<strong>Empregos</strong> - {{ date('Y') }}</p>
            </div>
        </footer>
    </div>


    <!-- jquery -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

    <!-- popper (dependencia do boostrap) -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>

    <!-- bootstrap -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    
    <!-- sweet alert 2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

    <script src="{{ asset('js/system.js') }}"></script>


    @yield('modal')
    @yield('js')

    <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
                <div class="form-container contato-form" style="display: none;">
                    <h5 class="modaltitulo">Fale com a gente</h5>
                    @include('componentes.contato_form')
                </div>
            </div>
        </div>
        </div>
    </div>



    <form id="tracker-token" class="d-none">
        @csrf
    </form>

    <script>
        $(() => {
            const _token = $('form#tracker-token input[name="_token"]').val();

            const storageTrackerKey = 'gcc-tracker-ok';
            const isTrackerOk = sessionStorage.getItem(storageTrackerKey);

            if (!isTrackerOk) {
                $.ajax({
                    url: '{{ route("gcc-tracker") }}',
                    method: 'post',
                    data: {
                        _token
                    },
                    success: (res) => {
                        sessionStorage.setItem(storageTrackerKey, true);
                    }
                });
            }
        });
    </script>

    <script>
        $(() => {
            $(".botaocontato").on('click', function(event) {
                event.preventDefault();
                $('.form-container').hide();
                $('.contato-form').show();
                $('#modal').modal('show');
            })

            $(".botaosobrenos").on('click', function(event) {
                
            })
        })
    </script>
</body>
</html>
