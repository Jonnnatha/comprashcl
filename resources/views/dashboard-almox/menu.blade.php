@extends('dashboard-almox.template.main')
@section('title', 'Almoxarifado')
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
                    <h6 class="font-weight-bolder text-white mb-0">Painel do Almoxarifado - {{ $user->nome }}</h6>
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
            <div class="row" style="margin-top: 20px;">
                <div class="col-lg-12 mb-2 mb-lg-0">
                    <div class="card z-index-2 h-100">
                        @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                        <div class="card-header d-flex align-items-center border-bottom py-3">
                            <h4 class="text-capitalize">Aguardando entrega</h4>

                        </div>


                        <div class="card-body">
                            <div class="table-responsive py-4">
                                <table class="table table-flush" id="datatable-buttons">
                                    <thead class="thead-light">
                                        <tr>
                                            <td style="font-weight: bold;">AÇÃO</td>
                                            <td style="font-weight: bold;">CODIGO</td>
                                            <td style="font-weight: bold;">SOLICITANTE</td>
                                            <td style="font-weight: bold;">SETOR REQUERENTE</td>
                                            <td style="font-weight: bold;">DATA DO PEDIDO</td>
                                            <td style="font-weight: bold;">DATA ESPERADA</td>
                                            <td style="font-weight: bold;">PRIORIDADE</td>
                                            <td style="font-weight: bold;">TIPO</td>
                                            <td style="font-weight: bold;">JUSTIFICATIVA</td>
                                            <td style="font-weight: bold;">DESCRIÇÃO</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($solicitacoes as $li)
                                            @if ($li->estado == 'almox')
                                                <tr id="{{ $li->id }}">
                                                    <td>
                                                        <a class="btn btn-slack btn-icon-only rounded-sm"
                                                            href="{{ route('almox.entregue', $li->id) }}"><i
                                                                class="fas fa-boxes"></i></a>
                                                    </td>
                                                    <td>{{ $li->id }}</td>
                                                    <td>{{ $li->solicitante }} - {{ $li->solicita_cargo }}</td>
                                                    <td>{{ $li->setor_requerente }}</td>
                                                    <td>{{ $li->data_pedido }}</td>
                                                    <td>{{ $li->data_esperada }}</td>
                                                    <td>{{ $li->prioridade }}</td>
                                                    <td>{{ $li->tipo }}</td>
                                                    <td>{{ $li->justificativa }}</td>
                                                    <td>{{ $li->descricao1 }}</td>
                                                </tr> <!-- Fecha a tag <tr> -->
                                            @endif
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>


                            <div class="mb-1">

                                <hr />

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </main>

    <script>
        $(document).ready(function() {
            $('#datatable-buttons').DataTable({
                renderer: {
                    "pageButton": "bootstrap"
                },
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Portuguese-Brasil.json"
                },
                dom: 'Bfrtip',
                buttons: [{
                    extend: 'excel',
                    title: 'Solicitações'
                }],
                pageLength: 5,


            });
        });
    </script>
@endsection
