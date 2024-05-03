<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="{{ asset('img/gtos.ico') }}" />
        <title>COMPRASHCL</title>

        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
        <!-- Nucleo Icons -->
        <link href="{{ asset('css/nucleo-icons.css') }}" rel="stylesheet" /> <!-- Corrigido o caminho e a extensão de .ccs para .css -->
        <link href="{{ asset('css/nucleo-svg.css') }}" rel="stylesheet" />
        <!-- Font Awesome Icons -->
        <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
        <!-- CSS Files -->
        <link id="pagestyle" href="{{ asset('css/soft-ui-dashboard.css?v=1.0.7') }}" rel="stylesheet" />
    </head>
    <body class="">
        <!-- Navbar -->
        {{-- <nav class="navbar navbar-expand-lg position-absolute top-0 z-index-3 w-100 shadow-none my-3 navbar-transparent mt-4">
          <div class="container">
              <a class="navbar-brand font-weight-bolder ms-lg-0 ms-3 text-white" href="">
                <img src="{{ asset('img/logo.png') }}" alt="" style="width: 75px; height: 30px;">
              </a>
          </div>
        </nav> --}}
        <!-- End Navbar -->
        <main class="main-content mt-0">
          <section class="min-vh-10 mb-1">
            <div class="page-header align-items-start min-vh-50 pt-5 pb-11 m-3 border-radius-lg"
            style="background-image: url('{{ asset('img/home.png') }}');">
              <span class="mask bg-gradient-dark opacity-6"></span>
              <div class="container">
                <div class="row justify-content-center">
                  <div class="col-lg-5 text-center mx-auto">
                    <h1 class="mb-2 mt-5"  style="color:#79C8EF">Bem Vindo!</h1>
                    <p class="text-lead text-white">Software de Gerenciamento de Compras.</p>
                  </div>
                </div>
              </div>
            </div>
            <div class="container">
                <div class="row mt-lg-n10 mt-md-n11 mt-n10">
                  <div class="col-xl-4 col-lg-5 col-md-7 mx-auto">
                    <div class="card z-index-0" >
                      <div class="card-header text-center pt-4">
                                    <img src="{{ asset('img/hosp.png') }}">
                      </div>
                      <div class="card-body">
                        <form role="form text-left" method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="mb-3">
                                <input type="text" class="form-control" name="nome" placeholder="Usuário" required>
                            </div>
                            <div class="mb-3">
                                <input type="password" class="form-control" name="senha" placeholder="Senha" required>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn bg-gradient-info w-100 my-4 mb-2">Autenticar</button>
                            </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </section>
            <footer class="footer py-5">
                <div class="container">
                    <div class="row">
                        <div class="col-8 mx-auto text-center mt-1">
                            <p class="mb-0 text-secondary">
                                Direitos Reservados de <a href="https://www.linkedin.com/in/jonnatha-gustavo-040b1210a/" target="_blank" style="color:#79C8EF;">Jonnatha Gustavo Carvalho Borges</a>
                            </p>
                        </div>
                    </div>
                </div>
            </footer>
            <!-- Conteúdo adicional omitido para brevidade -->
        </main>
        <!--   Core JS Files   -->
        <script src="{{ asset('js/core/popper.min.js') }}"></script>
        <script src="{{ asset('js/core/bootstrap.min.js') }}"></script>
        <script src="{{ asset('js/plugins/perfect-scrollbar.min.js') }}"></script>
        <script src="{{ asset('js/plugins/smooth-scrollbar.min.js') }}"></script>
        <script src="{{ asset('js/soft-ui-dashboard.min.js?v=1.0.7') }}"></script>
    </body>
</html>
