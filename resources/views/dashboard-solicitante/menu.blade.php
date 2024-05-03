@extends('dashboard-solicitante.template.main')
@section('title', 'Solicitante')
@section('codigo')
    <main class="main-content position-relative border-radius-lg ">
        <!-- Topnav -->
        <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl " id="navbarBlur"
            data-scroll="false">
            <div class="container-fluid py-1 px-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                        <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="javascript:;"></a></li>
                        <li class="breadcrumb-item text-sm text-white active" aria-current="page">{{ $user->cargo }}</li>
                    </ol>
                    <h6 class="font-weight-bolder text-white mb-0">Painel de Solicitante - {{ $user->nome }}</h6>
                </nav>
                <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
                    <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                        <div class="input-group">

                        </div>
                    </div>
                    <ul class="navbar-nav  justify-content-end">
                        <li class="nav-item d-flex align-items-center">
                            <a href="#" class="nav-link text-white font-weight-bold px-0"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="fas fa-power-off"></i>
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>

                        </li>
                        <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
                            <a href="javascript:;" class="nav-link text-white p-0" id="iconNavbarSidenav">
                                <div class="sidenav-toggler-inner">
                                    <i class="sidenav-toggler-line bg-white"></i>
                                    <i class="sidenav-toggler-line bg-white"></i>
                                    <i class="sidenav-toggler-line bg-white"></i>
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                  <div class="card">
                    <div class="card-body p-3">
                      <div class="row">
                        <div class="col-8">
                          <div class="numbers">
                            <p class="text-sm mb-0 text-uppercase font-weight-bold">ABERTA</p>
                            <h5 class="font-weight-bolder">

                            </h5>

                          </div>
                        </div>
                        <div class="col-4 text-end">
                                        <div class="icon icon-shape bg-gradient-danger shadow-danger text-center rounded-circle">
                            <i class="fas fa-share text-lg opacity-10" aria-hidden="true"></i>
                        </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                  <div class="card">
                    <div class="card-body p-3">
                      <div class="row">
                        <div class="col-8">
                          <div class="numbers">
                            <p class="text-sm mb-0 text-uppercase font-weight-bold">COTAÇÃO</p>
                            <h5 class="font-weight-bolder">

                            </h5>
                          </div>
                        </div>
                        <div class="col-4 text-end">
                                        <div class="icon icon-shape bg-gradient-warning shadow-warning text-center rounded-circle">
                            <i class="fas fa-tags text-lg opacity-10" aria-hidden="true"></i>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                  <div class="card">
                    <div class="card-body p-3">
                      <div class="row">
                        <div class="col-8">
                          <div class="numbers">
                            <p class="text-sm mb-0 text-uppercase font-weight-bold">APROVAÇÃO</p>
                            <h5 class="font-weight-bolder">

                            </h5>
                          </div>
                        </div>
                        <div class="col-4 text-end">

                          <div class="icon icon-shape bg-gradient-primary shadow-primary text-center rounded-circle">

                            <i class=" fas fa-paste  text-lg opacity-10" aria-hidden="true"></i>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-xl-3 col-sm-6">
                  <div class="card">
                    <div class="card-body p-3">
                      <div class="row">
                        <div class="col-8">
                          <div class="numbers">
                            <p class="text-sm mb-0 text-uppercase font-weight-bold">CONCLUIDAS</p>
                            <h5 class="font-weight-bolder">

                            </h5>
                          </div>
                        </div>
                        <div class="col-4 text-end">
                                        <div class="icon icon-shape bg-gradient-success shadow-success text-center rounded-circle">
                            <i class="fas fa-check text-lg opacity-10" aria-hidden="true"></i>
                          </div>

                      </div>
                    </div>
                  </div>
                </div>
              </div>

                </div>
        </div>
        <div style="margin-top: 20px;">
            <div class="col-10 col-lg-20 m-auto">
                <form class="needs-validation" action="" method="POST" novalidate>
                    @csrf
                    <div class="card multisteps-form__panel p-3 border-radius-xl bg-white js-active"
                        data-animation="FadeIn">
                        <h5 class="font-weight-bolder">Cadastro de Solicitação</h5>
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                        @if (session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif
                        <div class="multisteps-form__content">
                            <div class="row mt-3">
                                <div class="col-md-4 mb-3">
                                    <label class="form-control-label">Setor:</label>
                                    <select class="form-control" id="exampleFormControlSelect1" name="hie">

                                    </select>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label class="form-control-label">Nome do Técnico:</label>
                                    <input type="text" class="form-control" name="nome" id="validationCustomUsername"
                                        placeholder="" aria-describedby="inputGroupPrepend" required>
                                    <div class="invalid-feedback">
                                        Informe o Técnico.
                                    </div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label class="form-control-label" for="validationCustom04">Senha:</label>
                                    <input type="text" class="form-control" name="senha" id="validationCustom05"
                                        placeholder="" required>
                                    <div class="invalid-feedback">
                                        Informe a senha.
                                    </div>
                                </div>
                            </div>
                            <div class="button-row d-flex mt-4">
                                <button class="btn bg-gradient-dark ms-auto mb-0" type="submit">Salvar</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </main>


    <script>
        $(document).ready(function() {
            $('#example').DataTable({
                renderer: {
                    "pageButton": "bootstrap"
                },
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Portuguese-Brasil.json"
                },
                dom: 'Bfrtip',
                buttons: [{
                    extend: 'excel',
                    title: 'Segurança'
                }],
                pageLength: 4,
                responsive: true,

            });
        });

        $(document).ready(function() {
            $('#datatable-buttons2').DataTable({
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Portuguese-Brasil.json"
                },
                dom: 'Bfrtip',
                buttons: [{
                    extend: 'excel',
                    title: 'Emprestimo'
                }],
                pageLength: 4,
                responsive: true,

            });
        });
    </script>
@endsection
