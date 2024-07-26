@extends('dashboard-adm.template.main')
@section('title', 'Gerenciar Solicitações')
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
                    <h6 class="font-weight-bolder text-white mb-0">Gerenciar Solicitações - {{ $user->nome }}</h6>
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
      <div class="card-header d-flex align-items-center border-bottom py-3">
      <h4 class="text-capitalize"><i class="fas fa-share text-lg opacity-10" aria-hidden="true"></i> ABERTA</h4>

              </div>


              <div class="card-body">
                <div class="table-responsive py-4">
                    <table class="table table-flush" id="datatable-buttons">
                        <thead class="thead-light">
                            <tr>
                                <td style="font-weight: bold;">AÇÃO</td>
                                <td style="font-weight: bold;">CODIGO</td>
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
                            @if ($li->estado == 'aberta')
                            <tr> <!-- Adiciona a tag <tr> para iniciar uma nova linha da tabela -->
                                <td>

                                    <button class="btn btn-warning btn-icon-only rounded-sm" data-bs-toggle="modal" data-bs-target="#modal-default{{$li->id}}"><i class="fas fa-clipboard-check"></i></button>
                                    <a class="btn btn-slack btn-icon-only rounded-sm" href="{{ route('adm.cotacao', $li->id) }}"><i class="fas fa-share"></i></a>

                                </td>
                                <td>{{ $li->id }}</td>
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
            <div class="container-fluid py-4">
                <div class="row" style="margin-top: 20px;">
          <div class="col-lg-12 mb-2 mb-lg-0">
          <div class="card z-index-2 h-100">
          <div class="card-header d-flex align-items-center border-bottom py-3">
          <h4 class="text-capitalize"> <i class="fas fa-tags text-lg opacity-10" aria-hidden="true"></i> COTAÇÃO</h4>

                  </div>


                  <div class="card-body">
                    <div class="table-responsive py-4">
                        <table class="table table-flush" id="datatable-buttons2">
                            <thead class="thead-light">
                                <tr>
                                    <td style="font-weight: bold;">AÇÃO</td>
                                    <td style="font-weight: bold;">CODIGO</td>
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
                                @if ($li->estado == 'cotacao')
                                <tr> <!-- Adiciona a tag <tr> para iniciar uma nova linha da tabela -->
                                    <td>

                                        <button class="btn btn-warning btn-icon-only rounded-sm" data-bs-toggle="modal" data-bs-target="#modal-default{{$li->id}}"><i class="fas fa-clipboard-check"></i></button>
                                        <a class="btn btn-slack btn-icon-only rounded-sm" href="{{ route('adm.aprovacao', $li->id) }}"><i class="fas fa-share"></i></a>

                                    </td>
                                    <td>{{ $li->id }}</td>
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
                <div class="container-fluid py-4">
                    <div class="row" style="margin-top: 20px;">
              <div class="col-lg-12 mb-2 mb-lg-0">
              <div class="card z-index-2 h-100">
              <div class="card-header d-flex align-items-center border-bottom py-3">
              <h4 class="text-capitalize"> <i class=" fas fa-paste  text-lg opacity-10" aria-hidden="true"></i> APROVAÇÃO</h4>

                      </div>


                      <div class="card-body">
                        <div class="table-responsive py-4">
                            <table class="table table-flush" id="datatable-buttons3">
                                <thead class="thead-light">
                                    <tr>
                                        <td style="font-weight: bold;">AÇÃO</td>
                                        <td style="font-weight: bold;">CODIGO</td>
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
                                    @if ($li->estado == 'aprovacao')
                                    <tr"> <!-- Adiciona a tag <tr> para iniciar uma nova linha da tabela -->
                                        <td>

                                            <button class="btn btn-warning btn-icon-only rounded-sm" data-bs-toggle="modal" data-bs-target="#modal-default{{$li->id}}"><i class="fas fa-clipboard-check"></i></button>
                                            <a class="btn btn-slack btn-icon-only rounded-sm" href="{{ route('adm.concluida', $li->id) }}"><i class="fas fa-share"></i></a>

                                        </td>
                                        <td>{{ $li->id }}</td>
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
                    <div class="container-fluid py-4">
                        <div class="row" style="margin-top: 20px;">
                  <div class="col-lg-12 mb-2 mb-lg-0">
                  <div class="card z-index-2 h-100">
                  <div class="card-header d-flex align-items-center border-bottom py-3">
                  <h4 class="text-capitalize"> <i class="fas fa-stamp text-lg opacity-10" aria-hidden="true"></i> AUTORIZADO</h4>

                          </div>


                          <div class="card-body">
                            <div class="table-responsive py-4">
                                <table class="table table-flush" id="datatable-buttons4">
                                    <thead class="thead-light">
                                        <tr>
                                            <td style="font-weight: bold;">AÇÃO</td>
                                            <td style="font-weight: bold;">CODIGO</td>
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
                                        @if ($li->estado == 'concluida')
                                        <tr> <!-- Adiciona a tag <tr> para iniciar uma nova linha da tabela -->
                                            <td>

                                                <a href="{{ route('admgerarpdf', ['id' => $li->id]) }}" target="_blank" class="btn btn-youtube btn-icon-only rounded-sm">
                                                    <i class="fas fa-file-pdf"></i>
                                                </a>
                                                <a class="btn btn-slack btn-icon-only rounded-sm" href="{{ route('adm.almox', $li->id) }}"><i class="fas fa-share"></i></a>


                                            </td>
                                            <td>{{ $li->id }}</td>
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
                        <div class="container-fluid py-4">
                            <div class="row" style="margin-top: 20px;">
                      <div class="col-lg-12 mb-2 mb-lg-0">
                      <div class="card z-index-2 h-100">
                      <div class="card-header d-flex align-items-center border-bottom py-3">
                      <h4 class="text-capitalize"> <i class="fas fa-truck-loading text-lg opacity-10" aria-hidden="true"></i> ALMOXARIFADO</h4>

                              </div>


                              <div class="card-body">
                                <div class="table-responsive py-4">
                                    <table class="table table-flush" id="datatable-buttons5">
                                        <thead class="thead-light">
                                            <tr>
                                                <td style="font-weight: bold;">AÇÃO</td>
                                                <td style="font-weight: bold;">CODIGO</td>
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
                                            <tr> <!-- Adiciona a tag <tr> para iniciar uma nova linha da tabela -->
                                                <td>

                                                    <a href="{{ route('admgerarpdf', ['id' => $li->id]) }}" target="_blank" class="btn btn-youtube btn-icon-only rounded-sm">
                                                        <i class="fas fa-file-pdf"></i>
                                                    </a>


                                                </td>
                                                <td>{{ $li->id }}</td>
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
                            <div class="container-fluid py-4">
                                <div class="row" style="margin-top: 20px;">
                          <div class="col-lg-12 mb-2 mb-lg-0">
                          <div class="card z-index-2 h-100">
                          <div class="card-header d-flex align-items-center border-bottom py-3">
                          <h4 class="text-capitalize"> <i class="fas fa-check text-lg opacity-10" aria-hidden="true"></i> FINALIZADO</h4>

                                  </div>


                                  <div class="card-body">
                                    <div class="table-responsive py-4">
                                        <table class="table table-flush" id="datatable-buttons6">
                                            <thead class="thead-light">
                                                <tr>
                                                    <td style="font-weight: bold;">AÇÃO</td>
                                                    <td style="font-weight: bold;">CODIGO</td>
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
                                                @if ($li->estado == 'almox2')
                                                <tr> <!-- Adiciona a tag <tr> para iniciar uma nova linha da tabela -->
                                                    <td>

                                                        <a href="{{ route('admgerarpdf', ['id' => $li->id]) }}" target="_blank" class="btn btn-youtube btn-icon-only rounded-sm">
                                                            <i class="fas fa-file-pdf"></i>
                                                        </a>


                                                    </td>
                                                    <td>{{ $li->id }}</td>
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
                            <div class="container-fluid py-4">
                                <div class="row" style="margin-top: 20px;">
                          <div class="col-lg-12 mb-2 mb-lg-0">
                          <div class="card z-index-2 h-100">
                          <div class="card-header d-flex align-items-center border-bottom py-3">
                          <h4 class="text-capitalize"> <i class="fas fa-window-close text-lg opacity-10" aria-hidden="true"></i> CANCELADO</h4>
                                  </div>


                                  <div class="card-body">
                                    <div class="table-responsive py-4">
                                        <table class="table table-flush" id="datatable-buttons7">
                                            <thead class="thead-light">
                                                <tr>
                                                    <td style="font-weight: bold;">AÇÃO</td>
                                                    <td style="font-weight: bold;">CODIGO</td>
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
                                                @if ($li->estado == 'cancelado')
                                                <tr> <!-- Adiciona a tag <tr> para iniciar uma nova linha da tabela -->
                                                    <td>

                                                        <button class="btn btn-warning btn-icon-only rounded-sm" data-bs-toggle="modal" data-bs-target="#modal-default{{$li->id}}"><i class="fas fa-clipboard-check"></i></button>

                                                    </td>
                                                    <td>{{ $li->id }}</td>
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

    @foreach ($solicitacoes as $li)
    <div class="modal fade" id="modal-default{{$li->id}}" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-md" role="document">
          <div class="modal-content">
            <div class="modal-body p-0">
              <div class="card card-plain">
                <div class="card-header pb-0 text-left">
                  <h3 class="font-weight-bolder text-warning text-gradient">SOLICITAÇÃO - {{$li->id}}</h3>
                </div>
                <div class="card-body">
                    <form class="needs-validation" action="{{ route('solicitacoes.desc', ['id' => $li->id]) }}" method="POST" novalidate>
                        @csrf
                        @method('PUT')
                        <div class="card multisteps-form__panel p-3 border-radius-xl bg-white js-active"
                            data-animation="FadeIn">
                            <div class="multisteps-form__content">
                                <div class="row mt-3">
                                    <div class="col-md-6 mb-3">
                                        <label class="form-control-label">Setor:</label>
                                        <input type="text" class="form-control" name="quantidade1" value="{{$li->setor_requerente}}" id="validationCustomUsername" placeholder="" aria-describedby="inputGroupPrepend" readonly>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-control-label">Tipo:</label>
                                        <input type="text" class="form-control" name="quantidade1" value="{{$li->tipo}}" id="validationCustomUsername" placeholder="" aria-describedby="inputGroupPrepend" readonly>
                                    </div>
                                    <div class="col-md-8 mb-3">
                                        <label class="form-control-label">Solicitante:</label>
                                        <input type="text" class="form-control" name="quantidade1" value="{{$li->solicitante}} -{{$li->solicita_cargo}} " id="validationCustomUsername" placeholder="" aria-describedby="inputGroupPrepend" readonly>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label class="form-control-label">Prioridade:</label>
                                        <input type="text" class="form-control" name="quantidade1" value="{{$li->prioridade}}" id="validationCustomUsername" placeholder="" aria-describedby="inputGroupPrepend" readonly>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-16 mb-3">
                                        <label class="form-control-label">Justificativa:</label>
                                        <textarea type="text" class="form-control" name="justificativa" id="validationCustomUsername" placeholder="" aria-describedby="inputGroupPrepend" readonly>
                                            {{$li->justificativa}}
                                        </textarea>
                                    </div>
                                </div>
                                <h5 class="font-weight-bolder">-SERVICO</h5>
                                    <div class="multisteps-form__content">
                                        <div class="row mt-3">
                                            <div class="col-md-12 mb-3">
                                                <label class="form-control-label">1.item:</label>
                                                <textarea type="text" class="form-control" name="justificativa" id="validationCustomUsername" placeholder="" aria-describedby="inputGroupPrepend" readonly>
                                                    {{$li->item1}} -  {{$li->quantidade1}} - {{$li->unidade1}} - {{$li->descricao1}}
                                                </textarea>
                                            </div>

                                        </div>
                                        <div class="row mt-3">
                                            <div class="col-md-12 mb-3">
                                                <label class="form-control-label">2.item:</label>
                                                <textarea type="text" class="form-control" name="justificativa" id="validationCustomUsername" placeholder="" aria-describedby="inputGroupPrepend" readonly>
                                                    {{$li->item2}} -  {{$li->quantidade2}} - {{$li->unidade2}} - {{$li->descricao2}}
                                                </textarea>
                                            </div>
                                        </div>
                                        <div class="row mt-3">
                                            <div class="col-md-12 mb-3">
                                                <label class="form-control-label">3.item:</label>
                                                <textarea type="text" class="form-control" name="justificativa" id="validationCustomUsername" placeholder="" aria-describedby="inputGroupPrepend" readonly>
                                                    {{$li->item3}} -  {{$li->quantidade3}} - {{$li->unidade3}} - {{$li->descricao3}}
                                                </textarea>
                                            </div>
                                        </div>
                                        <div class="row mt-3">
                                            <div class="col-md-12 mb-3">
                                                <label class="form-control-label">4.item:</label>
                                                <textarea type="text" class="form-control" name="justificativa" id="validationCustomUsername" placeholder="" aria-describedby="inputGroupPrepend" readonly>
                                                    {{$li->item4}} -  {{$li->quantidade4}} - {{$li->unidade4}} - {{$li->descricao4}}
                                                </textarea>
                                            </div>
                                        </div>
                                        <div class="row mt-3">
                                            <div class="col-md-12 mb-3">
                                                <label class="form-control-label">5.item:</label>
                                                <textarea type="text" class="form-control" name="justificativa" id="validationCustomUsername" placeholder="" aria-describedby="inputGroupPrepend" readonly>
                                                    {{$li->item5}} -  {{$li->quantidade5}} - {{$li->unidade5}} - {{$li->descricao5}}
                                                </textarea>
                                            </div>
                                        </div>
                                        <div class="row mt-3">
                                            <div class="col-md-12 mb-3">
                                                <label class="form-control-label">6.item:</label>
                                                <textarea type="text" class="form-control" name="justificativa" id="validationCustomUsername" placeholder="" aria-describedby="inputGroupPrepend" readonly>
                                                    {{$li->item6}} -  {{$li->quantidade6}} - {{$li->unidade6}} - {{$li->descricao6}}
                                                </textarea>
                                            </div>
                                        </div>
                                        <div class="row mt-3">
                                            <div class="col-md-6 mb-3">
                                                <label class="form-control-label">Fornecedor:</label>
                                                <input type="text" class="form-control" name="fornecedor1" value="{{$li->fornecedor1}}" id="validationCustomUsername" placeholder="" aria-describedby="inputGroupPrepend" readonly>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="form-control-label" for="exampleDatepicker">Data Esperada:</label>
                                                    <input type="text" class="form-control" name="fornecedor1" value="{{$li->data_esperada}}" id="validationCustomUsername" placeholder="" aria-describedby="inputGroupPrepend" readonly>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mt-3">
                                            <div class="col-md-12 mb-3">
                                                <label class="form-control-label">Observação:</label>
                                                <input type="text" class="form-control" name="observacoescompras" value="{{$li->observacoescompras}}" id="validationCustomUsername" placeholder="" aria-describedby="inputGroupPrepend" >
                                            </div>
                                        </div>

                                    </div>

                                <div class="button-row d-flex mt-4">
                                    <button class="btn bg-gradient-success ms-auto mb-0" type="submit">Salvar</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    @endforeach
    <script>
 $(document).ready(function () {
  $('#datatable-buttons').DataTable({
          renderer: {
      "pageButton": "bootstrap"
  },
          "language": {
          "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Portuguese-Brasil.json"
      },
          dom: 'Bfrtip',
  buttons: [
    {
              extend: 'excel',
              title: 'Solicitações'
          }
  ],
          pageLength: 5,


      });
});
$(document).ready(function () {
  $('#datatable-buttons2').DataTable({
          renderer: {
      "pageButton": "bootstrap"
  },
          "language": {
          "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Portuguese-Brasil.json"
      },
          dom: 'Bfrtip',
  buttons: [
    {
              extend: 'excel',
              title: 'Solicitações'
          }
  ],
          pageLength: 5,


      });
});
$(document).ready(function () {
  $('#datatable-buttons3').DataTable({
          renderer: {
      "pageButton": "bootstrap"
  },
          "language": {
          "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Portuguese-Brasil.json"
      },
          dom: 'Bfrtip',
  buttons: [
    {
              extend: 'excel',
              title: 'Solicitações'
          }
  ],
          pageLength: 5,


      });
});
$(document).ready(function () {
  $('#datatable-buttons4').DataTable({
          renderer: {
      "pageButton": "bootstrap"
  },
          "language": {
          "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Portuguese-Brasil.json"
      },
          dom: 'Bfrtip',
  buttons: [
    {
              extend: 'excel',
              title: 'Solicitações'
          }
  ],
          pageLength: 5,


      });
});
$(document).ready(function () {
  $('#datatable-buttons5').DataTable({
          renderer: {
      "pageButton": "bootstrap"
  },
          "language": {
          "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Portuguese-Brasil.json"
      },
          dom: 'Bfrtip',
  buttons: [
    {
              extend: 'excel',
              title: 'Solicitações'
          }
  ],
          pageLength: 5,


      });
});
$(document).ready(function () {
  $('#datatable-buttons6').DataTable({
          renderer: {
      "pageButton": "bootstrap"
  },
          "language": {
          "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Portuguese-Brasil.json"
      },
          dom: 'Bfrtip',
  buttons: [
    {
              extend: 'excel',
              title: 'Solicitações'
          }
  ],
          pageLength: 5,


      });
});
$(document).ready(function () {
  $('#datatable-buttons7').DataTable({
          renderer: {
      "pageButton": "bootstrap"
  },
          "language": {
          "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Portuguese-Brasil.json"
      },
          dom: 'Bfrtip',
  buttons: [
    {
              extend: 'excel',
              title: 'Solicitações'
          }
  ],
          pageLength: 5,


      });
});

    </script>

@endsection
