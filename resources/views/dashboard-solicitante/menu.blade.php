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
                <div class="col-xl-2 col-sm-6 mb-xl-0 mb-4">
                    <div class="card">
                        <div class="card-body p-3">
                            <div class="row">
                                <div class="col-6">
                                    <div class="numbers">
                                        <p class="text-sm mb-0 text-uppercase font-weight-bold">ABERTA</p>
                                        <h5 class="font-weight-bolder">
                                            {{ $solicitacoes['aguardando_aberta'] }}
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
                                            {{ $solicitacoes['cotacao'] }}
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
                                            {{ $solicitacoes['aprovacao'] }}
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
                                            {{ $solicitacoes['concluida'] }}
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
                                            {{ $solicitacoes['almox'] }}
                                        </h5>
                                    </div>
                                </div>
                                <div class="col-4 text-end">
                                    <div
                                        class="icon icon-shape bg-gradient-secondary shadow-success text-center rounded-circle">
                                        <i class="fas fa-pause text-lg opacity-10" aria-hidden="true"></i>
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
                                            {{ $solicitacoes['almox2'] }}
                                        </h5>
                                    </div>
                                </div>
                                <div class="col-4 text-end">
                                    <div
                                        class="icon icon-shape bg-gradient-success shadow-success text-center rounded-circle">
                                        <i class="fas fa-truck-loading text-lg opacity-10" aria-hidden="true"></i>
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
                <form class="needs-validation" action="{{ route('solicitacoes.store') }}" method="POST" novalidate>
                    @csrf
                    <div class="card multisteps-form__panel p-3 border-radius-xl bg-white js-active" data-animation="FadeIn">
                      <h5 class="font-weight-bolder">CADASTRO DE SOLICITAÇÃO</h5>
                      
                      <!-- Sessões de feedback -->
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
                      
                      <!-- Campos de seleção e justificativa -->
                      <div class="multisteps-form__content">
                        <div class="row mt-3">
                          <!-- Setor -->
                          <div class="col-md-4 mb-3">
                            <label class="form-control-label">Setor:</label>
                            <select class="form-control" name="setor_requerente">
                              @foreach ($setores as $setor)
                                <option value="{{ $setor->setor }}-{{$setor->cdc}}">{{ $setor->setor }}-{{$setor->cdc}}</option>
                              @endforeach
                            </select>
                          </div>
                          <!-- Tipo -->
                          <div class="col-md-2 mb-3">
                            <label class="form-control-label">Tipo:</label>
                            <select class="form-control" name="tipo">
                              <option value="COTAÇÃO">COTAÇÃO</option>
                              <option value="COMPRA">COMPRA</option>
                            </select>
                          </div>
                          <!-- Prioridade -->
                          <div class="col-md-2 mb-3">
                            <label class="form-control-label">Prioridade:</label>
                            <select class="form-control" name="prioridade">
                              <option value="BAIXA">BAIXA</option>
                              <option value="MÉDIA">MÉDIA</option>
                              <option value="ALTA">ALTA</option>
                              <option value="MUITO ALTA">MUITO ALTA</option>
                            </select>
                          </div>
                          <!-- Referência -->
                          <div class="col-md-4 mb-3">
                            <label class="form-control-label">Referencia:</label>
                            <select class="form-control" name="referencia">
                              @foreach ($refer as $re)
                                <option value="{{$re->codigo}}">{{ $re->referencia }}</option>
                              @endforeach
                            </select>
                          </div>
                        </div>
              
                        <!-- Justificativa -->
                        <div class="row mt-3">
                          <div class="col-md-12 mb-3">
                            <label class="form-control-label">Justificativa:</label>
                            <textarea class="form-control" name="justificativa" required></textarea>
                          </div>
                        </div>
              
                        <!-- Serviços (inicialmente mostrando a primeira linha) -->
                        <h5 class="font-weight-bolder">- SERVIÇO</h5>
                        <div class="multisteps-form__content">
                          <!-- Primeira linha visível -->
                          <div class="row mt-3">
                            <div class="col-md-1 mb-3">
                              <label class="form-control-label">1.Quant.:</label>
                              <input type="number" class="form-control" name="quantidade1" required>
                            </div>
                            <div class="col-md-1 mb-3">
                              <label class="form-control-label">1.Und.:</label>
                              <input type="text" class="form-control" name="unidade1" required>
                            </div>
                            <div class="col-md-10 mb-3">
                              <label class="form-control-label">1.Descrição:</label>
                              <input type="text" class="form-control" name="descricao1" required>
                            </div>
                          </div>
              
                          <!-- Linhas ocultas inicialmente -->
                          <div class="row mt-3 hidden">
                            <div class="col-md-1 mb-3">
                              <label class="form-control-label">2.Quant.:</label>
                              <input type="number" class="form-control" name="quantidade2">
                            </div>
                            <div class="col-md-1 mb-3">
                              <label class="form-control-label">2.Und.:</label>
                              <input type="text" class="form-control" name="unidade2">
                            </div>
                            <div class="col-md-10 mb-3">
                              <label class="form-control-label">2.Descrição:</label>
                              <input type="text" class="form-control" name="descricao2">
                            </div>
                          </div>
              
                          <!-- Repetir para todas as 6 linhas -->
                          <div class="row mt-3 hidden">
                            <div class="col-md-1 mb-3">
                              <label class="form-control-label">3.Quant.:</label>
                              <input type="number" class="form-control" name="quantidade3">
                            </div>
                            <div class="col-md-1 mb-3">
                              <label class="form-control-label">3.Und.:</label>
                              <input type="text" class="form-control" name="unidade3">
                            </div>
                            <div class="col-md-10 mb-3">
                              <label class="form-control-label">3.Descrição:</label>
                              <input type="text" class="form-control" name="descricao3">
                            </div>
                          </div>
                          <div class="row mt-3 hidden">
                            <div class="col-md-1 mb-3">
                              <label class="form-control-label">4.Quant.:</label>
                              <input type="number" class="form-control" name="quantidade4">
                            </div>
                            <div class="col-md-1 mb-3">
                              <label class="form-control-label">4.Und.:</label>
                              <input type="text" class="form-control" name="unidade4">
                            </div>
                            <div class="col-md-10 mb-3">
                              <label class="form-control-label">4.Descrição:</label>
                              <input type="text" class="form-control" name="descricao4">
                            </div>
                          </div>
                          <div class="row mt-3 hidden">
                            <div class="col-md-1 mb-3">
                              <label class="form-control-label">5.Quant.:</label>
                              <input type="number" class="form-control" name="quantidade5">
                            </div>
                            <div class="col-md-1 mb-3">
                              <label class="form-control-label">5.Und.:</label>
                              <input type="text" class="form-control" name="unidade5">
                            </div>
                            <div class="col-md-10 mb-3">
                              <label class="form-control-label">5.Descrição:</label>
                              <input type="text" class="form-control" name="descricao5">
                            </div>
                          </div>
                          <div class="row mt-3 hidden">
                            <div class="col-md-1 mb-3">
                              <label class="form-control-label">6.Quant.:</label>
                              <input type="number" class="form-control" name="quantidade6">
                            </div>
                            <div class="col-md-1 mb-3">
                              <label class="form-control-label">6.Und.:</label>
                              <input type="text" class="form-control" name="unidade6">
                            </div>
                            <div class="col-md-10 mb-3">
                              <label class="form-control-label">6.Descrição:</label>
                              <input type="text" class="form-control" name="descricao6">
                            </div>
                          </div>
              
              
                          <!-- Adicionar botão para exibir linhas -->
                          <button id="addRowBtn" class="btn btn-primary mt-3" type="button">Adicionar Linha</button>
                        </div>
              
                        <!-- Informações adicionais -->
                        <div class="row mt-3">
                          <div class="col-md-6 mb-3">
                            <label class="form-control-label">Fornecedor:</label>
                            <input type="text" class="form-control" name="fornecedor1" required>
                          </div>
                          <div class="col-md-6">
                            <label class="form-control-label">Data Esperada:</label>
                            <input class="form-control datepicker" name="data_esperada" type="date" required>
                          </div>
                        </div>
              
                        <!-- Botão de enviar -->
                        <div class="button-row d-flex mt-4">
                          <button class="btn bg-gradient-success ms-auto mb-0" type="submit">Salvar</button>
                        </div>
                      </div>
                    </div>
                  </form>
            </div>
        </div>
    </main>
    <script>
        let currentRow = 1;
        const maxRows = 6;
        const rows = document.querySelectorAll('.multisteps-form__content .row.hidden'); // Seleciona apenas as linhas ocultas
    
        // Adicionando o evento para o botão "Adicionar Linha"
        document.getElementById('addRowBtn').addEventListener('click', function() {
          if (currentRow < maxRows && currentRow <= rows.length) {
            rows[currentRow - 1].classList.remove('hidden'); // Mostra a próxima div
            currentRow++;
          } else {
            alert('Você já atingiu o máximo de 6 linhas.');
          }
        });
      </script>
@endsection
