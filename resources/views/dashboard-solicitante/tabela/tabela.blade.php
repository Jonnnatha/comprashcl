@extends('dashboard-solicitante.template.main')
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
      <h4 class="text-capitalize">Solicitações</h4>
              </div>


              <div class="card-body">
                <div class="table-responsive py-4">
                    <table class="table table-flush" id="datatable-buttons">
                        <thead class="thead-light">
                            <tr>
                                <td style="font-weight: bold;">AÇÃO</td>
                                <td style="font-weight: bold;">SITUAÇÃO</td>
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
                            <tr> <!-- Adiciona a tag <tr> para iniciar uma nova linha da tabela -->
                                <td>
                                    <button class="btn btn-warning btn-icon-only rounded-sm" data-bs-toggle="modal" data-bs-target="#modal-default{{$li->id}}"><i class="fas fa-clipboard-check"></i></button>
                                </td>
                                <td>
                                    @if ($li->estado == 'aguardando')
                                        <p class="badge badge-sm bg-gradient-primary">{{ $li->estado }}</p>
                                    @elseif ($li->estado == 'aberta')
                                        <p class="badge badge-sm bg-gradient-info">{{ $li->estado }}</p>
                                    @elseif ($li->estado == 'cotacao')
                                        <p class="badge badge-sm bg-gradient-warning">{{ $li->estado }}</p>
                                    @elseif ($li->estado == 'aprovacao')
                                        <p class="badge badge-sm bg-gradient-danger">{{ $li->estado }}</p>
                                    @elseif ($li->estado == 'concluida')
                                        <p class="badge badge-sm bg-gradient-success">{{ $li->estado }}</p>
                                    @else
                                        <p class="badge badge-sm bg-gradient-secondary">{{ $li->estado }}</p>
                                    @endif
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
                            <form class="needs-validation" action="" method="POST" novalidate>
                                @csrf
                                @method('PUT')
                                <div class="card multisteps-form__panel p-3 border-radius-xl bg-white js-active" data-animation="FadeIn">
                                    <div class="multisteps-form__content">
                                        <div class="row mt-3">
                                            <div class="col-md-6 mb-3">
                                                <label class="form-control-label">Setor:</label>
                                                <input type="text" class="form-control" value="{{$li->setor_requerente}}" readonly>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label class="form-control-label">Tipo:</label>
                                                <input type="text" class="form-control" value="{{$li->tipo}}" readonly>
                                            </div>
                                            <div class="col-md-8 mb-3">
                                                <label class="form-control-label">Solicitante:</label>
                                                <input type="text" class="form-control" value="{{$li->solicitante}} -{{$li->solicita_cargo}}" readonly>
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <label class="form-control-label">Prioridade:</label>
                                                <input type="text" class="form-control" value="{{$li->prioridade}}" readonly>
                                            </div>
                                        </div>
                                        <div class="row mt-3">
                                            <div class="col-md-16 mb-3">
                                                <label class="form-control-label">Justificativa:</label>
                                                <textarea class="form-control" readonly>{{$li->justificativa}}</textarea>
                                            </div>
                                        </div>
                                        <h5 class="font-weight-bolder">-SERVIÇO</h5>
                                        <div class="multisteps-form__content">
                                            @for ($i = 1; $i <= 6; $i++)
                                                <div class="row mt-3">
                                                    <div class="col-md-12 mb-3">
                                                        <label class="form-control-label">{{$i}}. item:</label>
                                                        <textarea class="form-control" readonly>{{$li['item'.$i]}} -  {{$li['quantidade'.$i]}} - {{$li['unidade'.$i]}} - {{$li['descricao'.$i]}}</textarea>
                                                    </div>
                                                </div>
                                            @endfor
                                            <div class="row mt-3">
                                                <div class="col-md-6 mb-3">
                                                    <label class="form-control-label">Fornecedor:</label>
                                                    <input type="text" class="form-control" value="{{$li->fornecedor1}}" readonly>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-control-label" for="exampleDatepicker">Data Esperada:</label>
                                                        <input type="text" class="form-control" value="{{$li->data_esperada}}" readonly>
                                                    </div>
                                                </div>
                                            </div>
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

    </script>

@endsection
