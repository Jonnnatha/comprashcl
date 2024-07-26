@extends('dashboard-adm.template.main')
@section('title', 'Indicadores')
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
                    <h6 class="font-weight-bolder text-white mb-0">Painel de Adm - {{ $user->nome }}</h6>
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
                <div class="col-xl-2 col-sm-6 mb-xl-0 mb-4">
                    <div class="card">
                        <div class="card-body p-3">
                            <div class="row">
                                <div class="col-6">
                                    <div class="numbers">
                                        <p class="text-sm mb-0 text-uppercase font-weight-bold">ABERTA</p>
                                        <h5 class="font-weight-bolder">
                                            {{ $solici['aguardando_aberta'] }}
                                        </h5>

                                    </div>
                                </div>
                                <div class="col-4 text-end">
                                    <div
                                        class="icon icon-shape bg-gradient-danger shadow-danger text-center rounded-circle">
                                        <i class="fas fa-share text-lg opacity-10" aria-hidden="true"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-2 col-sm-6 mb-xl-0 mb-4">
                    <div class="card">
                        <div class="card-body p-3">
                            <div class="row">
                                <div class="col-6">
                                    <div class="numbers">
                                        <p class="text-sm mb-0 text-uppercase font-weight-bold">ORÇA.</p>
                                        <h5 class="font-weight-bolder">
                                            {{ $solici['cotacao'] }}
                                        </h5>
                                    </div>
                                </div>
                                <div class="col-2 text-end">
                                    <div
                                        class="icon icon-shape bg-gradient-warning shadow-warning text-center rounded-circle">
                                        <i class="fas fa-tags text-lg opacity-10" aria-hidden="true"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-2 col-sm-6 mb-xl-0 mb-4">
                    <div class="card">
                        <div class="card-body p-3">
                            <div class="row">
                                <div class="col-6">
                                    <div class="numbers">
                                        <p class="text-sm mb-0 text-uppercase font-weight-bold">APROV.</p>
                                        <h5 class="font-weight-bolder">
                                            {{ $solici['aprovacao'] }}
                                        </h5>
                                    </div>
                                </div>
                                <div class="col-4 text-end">

                                    <div
                                        class="icon icon-shape bg-gradient-primary shadow-primary text-center rounded-circle">

                                        <i class=" fas fa-paste  text-lg opacity-10" aria-hidden="true"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-2 col-sm-6">
                    <div class="card">
                        <div class="card-body p-3">
                            <div class="row">
                                <div class="col-6">
                                    <div class="numbers">
                                        <p class="text-sm mb-0 text-uppercase font-weight-bold">AUTORI.</p>
                                        <h5 class="font-weight-bolder">
                                            {{ $solici['concluida'] }}
                                        </h5>
                                    </div>
                                </div>
                                <div class="col-4 text-end">
                                    <div
                                        class="icon icon-shape bg-gradient-info shadow-success text-center rounded-circle">
                                        <i class="fas fa-check text-lg opacity-10" aria-hidden="true"></i>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                 <div class="col-xl-2 col-sm-6">
                    <div class="card">
                        <div class="card-body p-3">
                            <div class="row">
                                <div class="col-6">
                                    <div class="numbers">
                                        <p class="text-sm mb-0 text-uppercase font-weight-bold">ESPERA</p>
                                        <h5 class="font-weight-bolder">
                                            {{ $solici['almox'] }}
                                        </h5>
                                    </div>
                                </div>
                                <div class="col-4 text-end">
                                    <div
                                        class="icon icon-shape bg-gradient-secondary shadow-success text-center rounded-circle">
                                        <i class="fas fa-pause  text-lg opacity-10" aria-hidden="true"></i>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-2 col-sm-6">
                    <div class="card">
                        <div class="card-body p-3">
                            <div class="row">
                                <div class="col-6">
                                    <div class="numbers">
                                        <p class="text-sm mb-0 text-uppercase font-weight-bold">ENTREG.</p>
                                        <h5 class="font-weight-bolder">
                                            {{ $solici['almox2'] }}
                                        </h5>
                                    </div>
                                </div>
                                <div class="col-4 text-end">
                                    <div
                                        class="icon icon-shape bg-gradient-success shadow-success text-center rounded-circle">
                                        <i class="fas fa-truck-loading  text-lg opacity-10" aria-hidden="true"></i>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>



        <div class="container-fluid py-4">
            <div class="row" style="margin-top: 20px;">
                <div class="col-lg-12 mb-2 mb-lg-0">
                    <div class="card z-index-2 h-100">
                        <div class="card-header d-flex align-items-center border-bottom py-3">
                            <h4 class="text-capitalize">Quantidade de solicitação por referencia</h4>
                        </div>


                        <div class="card-body">
                            <div class="table-responsive py-4">
                                <canvas id="myChart" width="400" height="200"></canvas>
                            </div>


                            <div class="mb-1">

                                <hr />

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container-fluid py-4">
            <div class="row" style="margin-top: 20px;">
                <div class="col-lg-6 mb-2 mb-lg-0">
                    <div class="card z-index-2 h-100">
                        <div class="card-header d-flex align-items-center border-bottom py-3">
                            <h4 class="text-capitalize">Solicitação por solicitante</h4>
                        </div>


                        <div class="card-body">
                            <div class="table-responsive py-4">
                                <canvas id="myRadarChart" width="400" height="400"></canvas>

                            </div>


                            <div class="mb-1">

                                <hr />

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 mb-2 mb-lg-0">
                    <div class="card z-index-2 h-100">
                        <div class="card-header d-flex align-items-center border-bottom py-3">
                            <h4 class="text-capitalize">Solicitação por comprador</h4>
                        </div>


                        <div class="card-body">
                            <div class="table-responsive py-4">
                                <canvas id="myRadarChart2" width="400" height="400"></canvas>

                            </div>


                            <div class="mb-1">

                                <hr />

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container-fluid py-4">
            <div class="row" style="margin-top: 20px;">
                <div class="col-lg-12 mb-2 mb-lg-0">
                    <div class="card z-index-2 h-100">
                        <div class="card-header d-flex align-items-center border-bottom py-3">
                            <h4 class="text-capitalize">Quantidade de solicitação por Mês</h4>
                        </div>


                        <div class="card-body">
                            <div class="table-responsive py-4">
                                <canvas id="myLineChart" width="400" height="200"></canvas>
                            </div>


                            <div class="mb-1">

                                <hr />

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container-fluid py-4">
            <div class="row" style="margin-top: 20px;">
                <div class="col-lg-12 mb-2 mb-lg-0">
                    <div class="card z-index-2 h-100">
                        <div class="card-header d-flex align-items-center border-bottom py-3">
                            <h4 class="text-capitalize">Perfomace do comprador</h4>
                        </div>


                        <div class="card-body">
                            <div class="table-responsive py-4">
                                <canvas id="myLineChart2" width="400" height="200"></canvas>
                            </div>


                            <div class="mb-1">

                                <hr />

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container-fluid py-4">
            <div class="row" style="margin-top: 20px;">
                <div class="col-lg-12 mb-2 mb-lg-0">
                    <div class="card z-index-2 h-100">
                        <div class="card-header d-flex align-items-center border-bottom py-3">
                            <h4 class="text-capitalize">Media de conclusão solicitação por data esperada</h4>
                        </div>


                        <div class="card-body">
                            <div class="table-responsive py-4">
                                <canvas id="myLineChart3" width="400" height="200"></canvas>
                            </div>


                            <div class="mb-1">

                                <hr />

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid py-4">
            <div class="row" style="margin-top: 20px;">
                <div class="col-lg-12 mb-2 mb-lg-0">
                    <div class="card z-index-2 h-100">
                        <div class="card-header d-flex align-items-center border-bottom py-3">
                            <h4 class="text-capitalize">Perfomace Tempo de entrega</h4>
                        </div>


                        <div class="card-body">
                            <div class="table-responsive py-4">
                                <canvas id="myLineChart4" width="400" height="200"></canvas>
                            </div>


                            <div class="mb-1">

                                <hr />

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container-fluid py-4">
            <div class="row" style="margin-top: 20px;">
                <div class="col-lg-12 mb-2 mb-lg-0">
                    <div class="card z-index-2 h-100">
                        <div class="card-header d-flex align-items-center border-bottom py-3">
                            <h4 class="text-capitalize">Média por etapa por comprador</h4>
                        </div>


                        <div class="card-body">
                            <div class="table-responsive py-4">
                                <canvas id="myStackedBarChart" width="400" height="200"></canvas>
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
document.addEventListener('DOMContentLoaded', function () {
    var ctx = document.getElementById('myChart').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'radar', // tipo de gráfico de radar
        data: {
            labels: [
                @foreach($referencias as $referencia)
                    '{{ $referencia->referencia }}',
                @endforeach
            ],
            datasets: [{
                label: 'Quantidade',
                data: [
                    @foreach($referencias as $referencia)
                        {{ $solicitacoes->get($referencia->codigo, 0) }},
                    @endforeach
                ],
                backgroundColor: 'rgba(54, 162, 235, 0.2)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                r: {
                    angleLines: {
                        display: false
                    },
                    suggestedMin: 0,
                    suggestedMax: 10
                }
            }
        }
    });
});

document.addEventListener('DOMContentLoaded', function () {
    var ctx = document.getElementById('myRadarChart').getContext('2d');
    var myRadarChart = new Chart(ctx, {
        type: 'radar',
        data: {
            labels: [
                @foreach($solicitantes as $solicitante)
                    '{{ $solicitante->nome }} - {{ $solicitante->cargo }}',
                @endforeach
            ],
            datasets: [{
                label: 'Quantidade de Solicitações',
                data: [
                    @foreach($solicitantes as $solicitante)
                        {{ $solicitacoes2->get($solicitante->nome, 0) }},
                    @endforeach
                ],
                backgroundColor: 'rgba(54, 162, 235, 0.2)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                r: {
                    angleLines: {
                        display: false
                    },
                    suggestedMin: 0,
                    suggestedMax: 10
                }
            }
        }
    });
});
document.addEventListener('DOMContentLoaded', function () {
    var ctx = document.getElementById('myRadarChart2').getContext('2d');
    var myRadarChart = new Chart(ctx, {
        type: 'radar',
        data: {
            labels: [
                @foreach($compradores as $comprador)
                    '{{ $comprador->nome }} - {{ $comprador->cargo }}',
                @endforeach
            ],
            datasets: [{
                label: 'Quantidade de Solicitações',
                data: [
                    @foreach($compradores as $comprador)
                        {{ $solicitacoes3->get($comprador->nome, 0) }},
                    @endforeach
                ],
                backgroundColor: 'rgba(54, 162, 235, 0.2)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                r: {
                    angleLines: {
                        display: false
                    },
                    suggestedMin: 0,
                    suggestedMax: 10
                }
            }
        }
    });
});

document.addEventListener('DOMContentLoaded', function () {
    var ctx = document.getElementById('myLineChart').getContext('2d');
    var myLineChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: [
                @foreach($solicitacoesPorMes as $solicitacao)
                    '{{ $solicitacao->mes }}/{{ $solicitacao->ano }}',
                @endforeach
            ],
            datasets: [{
                label: 'Quantidade de Solicitações',
                data: [
                    @foreach($solicitacoesPorMes as $solicitacao)
                        {{ $solicitacao->quantidade }},
                    @endforeach
                ],
                fill: false,
                borderColor: 'rgba(75, 192, 192, 1)',
                tension: 0.1
            }]
        },
        options: {
            scales: {
                x: {
                    beginAtZero: true
                },
                y: {
                    beginAtZero: true
                }
            }
        }
    });
});

document.addEventListener('DOMContentLoaded', function () {
    var ctx = document.getElementById('myLineChart2').getContext('2d');
    var myLineChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: [
                @foreach($compradores as $comprador)
                    '{{ $comprador->nome }} - {{ $comprador->cargo }}',
                @endforeach
            ],
            datasets: [{
                label: 'Média de Dias para Concluir Solicitações',
                data: [
                    @foreach($compradores as $comprador)
                        {{ $mediasPorComprador->get($comprador->nome, 0) }},
                    @endforeach
                ],
                fill: false,
                borderColor: 'rgba(75, 192, 192, 1)',
                tension: 0.1
            }]
        },
        options: {
            scales: {
                x: {
                    beginAtZero: true
                },
                y: {
                    beginAtZero: true
                }
            }
        }
    });
});

document.addEventListener('DOMContentLoaded', function () {
    var ctx = document.getElementById('myLineChart3').getContext('2d');
    var myLineChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: [
                @foreach($compradores as $comprador)
                    '{{ $comprador->nome }} - {{ $comprador->cargo }}',
                @endforeach
            ],
            datasets: [{
                label: 'Média de dias para solicitações serem autorizados',
                data: [
                    @foreach($compradores as $comprador)
                        {{ $mediasPorComprador2->get($comprador->nome, 0) }},
                    @endforeach
                ],
                fill: false,
                borderColor: 'rgba(75, 192, 192, 1)',
                tension: 0.1
            }]
        },
        options: {
            scales: {
                x: {
                    beginAtZero: true
                },
                y: {
                    beginAtZero: true
                }
            }
        }
    });
});

document.addEventListener('DOMContentLoaded', function () {
    var ctx = document.getElementById('myLineChart4').getContext('2d');
    var myLineChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: [
                @foreach($compradores as $comprador)
                    '{{ $comprador->nome }} - {{ $comprador->cargo }}',
                @endforeach
            ],
            datasets: [{
                label: 'Média de dias para recebimento da mercadoria',
                data: [
                    @foreach($compradores as $comprador)
                        {{ $mediasPorComprador4->get($comprador->nome, 0) }},
                    @endforeach
                ],
                fill: false,
                borderColor: 'rgba(75, 192, 192, 1)',
                tension: 0.1
            }]
        },
        options: {
            scales: {
                x: {
                    beginAtZero: true
                },
                y: {
                    beginAtZero: true
                }
            }
        }
    });
});

document.addEventListener('DOMContentLoaded', function () {
    var ctx = document.getElementById('myStackedBarChart').getContext('2d');
    var myStackedBarChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: [
                @foreach($compradores as $comprador)
                    '{{ $comprador->nome }} - {{ $comprador->cargo }}',
                @endforeach
            ],
            datasets: [
                {
                    label: 'ACEITO',
                    data: [
                        @foreach($compradores as $comprador)
                            {{ $mediasPorComprador3->firstWhere('recebido_nome', $comprador->nome)->media_recebido ?? 0 }},
                        @endforeach
                    ],
                    backgroundColor: 'rgba(255, 99, 132, 0.2)',
                    borderColor: 'rgba(255, 99, 132, 1)',
                    borderWidth: 1
                },
                {
                    label: 'ORÇAMENTO',
                    data: [
                        @foreach($compradores as $comprador)
                            {{ $mediasPorComprador3->firstWhere('recebido_nome', $comprador->nome)->media_cotacao ?? 0 }},
                        @endforeach
                    ],
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                },
                {
                    label: 'APROVADO',
                    data: [
                        @foreach($compradores as $comprador)
                            {{ $mediasPorComprador3->firstWhere('recebido_nome', $comprador->nome)->media_aprovacao ?? 0 }},
                        @endforeach
                    ],
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                },
                {
                    label: 'AUTORIZADO',
                    data: [
                        @foreach($compradores as $comprador)
                            {{ $mediasPorComprador3->firstWhere('recebido_nome', $comprador->nome)->media_concluida ?? 0 }},
                        @endforeach
                    ],
                    backgroundColor: 'rgba(153, 102, 255, 0.2)',
                    borderColor: 'rgba(153, 102, 255, 1)',
                    borderWidth: 1
                },
                {
                    label: 'ENTREGA',
                    data: [
                        @foreach($compradores as $comprador)
                            {{ $mediasPorComprador3->firstWhere('recebido_nome', $comprador->nome)->media_entrega ?? 0 }},
                        @endforeach
                    ],
                    backgroundColor: 'rgba(255, 159, 64, 0.2)', /* Cor de fundo com transparência (laranja claro) */
                    borderColor: 'rgba(255, 159, 64, 1)',
                    borderWidth: 1
                }
            ]
        },
        options: {
            scales: {
                x: {
                    stacked: true
                },
                y: {
                    beginAtZero: true,
                    stacked: true
                }
            }
        }
    });
});
    </script>
@endsection
