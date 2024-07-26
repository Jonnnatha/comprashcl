@extends('dashboard-compras.template.main')
@section('title', 'Compras')
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
                                            {{ $solici['almox2'] }}
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
        <div class="container-fluid py-4">
            <div class="row" style="margin-top: 20px;">
                <div class="col-lg-12 mb-2 mb-lg-0">
                    <div class="card z-index-2 h-100">
                        <div class="card-header d-flex align-items-center border-bottom py-3">
                            <h4 class="text-capitalize">Solicitações Novas</h4>
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
                                            @if ($li->estado == 'aguardando')
                                                <tr id="{{ $li->id }}">
                                                    <td>
                                                    <!-- Adiciona a tag <tr> para iniciar uma nova linha da tabela -->
                                                                <button class="btn btn-youtube btn-icon-only rounded-s" data-bs-toggle="modal" data-bs-target="#modal-default{{$li->id}}"><i class="fas fa-trash-alt"></i></button>
                                                        <a class="btn btn-slack btn-icon-only rounded-sm"
                                                            href="{{ route('solicitacoes.abrir', $li->id) }}"><i
                                                                class="fas fa-edit"></i></a>
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
    @foreach ($solicitacoes as $li)
    <div class="modal fade" id="modal-default{{$li->id}}" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-md" role="document">
          <div class="modal-content">
            <div class="modal-body p-0">
              <div class="card card-plain">
                <div class="card-header pb-0 text-left">
                  <h3 class="font-weight-bolder text-warning text-gradient">CANCELAMENTO</h3>
                </div>
                <div class="card-body">
                    <form class="needs-validation" action="{{ route('deletesoli', ['id' => $li->id]) }}" method="POST" novalidate>
                        @csrf
                        @method('PUT')
                        <div class="card multisteps-form__panel p-3 border-radius-xl bg-white js-active"
                            data-animation="FadeIn">
                            <div class="multisteps-form__content">
                                <div class="row mt-3">
                                    <div class="col-md-12 mb-3">
                                      <label class="form-control-label" for="validationCustom02">Observação:</label>
                                      <input type="text" class="form-control"  id="validationCustom02" id="observacoes" name="observacoes" placeholder="">
                                    </div>

               </div>

                                <div class="button-row d-flex mt-4">
                                    <button class="btn bg-gradient-danger ms-auto mb-0" type="submit">Cancelar</button>
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
        $(".apague").click(function() {

            var id = $(this).parents("tr").attr("id");
            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: 'btn btn-success',
                    cancelButton: 'btn btn-danger'
                },
                buttonsStyling: false
            })

            swalWithBootstrapButtons.fire({
                title: "Você tem certeza?",
                text: "Caso apague voce nao ira consegui recuperar esse arquivo!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: "Sim",
                cancelButtonText: "Não",
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    axios.delete(`/deletesoli/${id}`)
                        .then(response => {
                            document.getElementById(id).remove();
                            swalWithBootstrapButtons.fire(
                                'Deletado!',
                                'Usuario foi excluido',
                                'success'
                            ).then((result) => {
                                // Após o usuário clicar em 'OK' no alerta de sucesso, recarrega a página
                            });
                        })
                        .catch(error => {
                            window.location.reload();
                        });
                }
            });

        });
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
