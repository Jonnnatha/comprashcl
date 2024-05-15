@extends('dashboard-adm.template.main')
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
                    <h6 class="font-weight-bolder text-white mb-0">Cadastrar Solicitante - {{ $user->nome }}</h6>
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

        <div style="margin-top: 100px;" >

            <div class="col-10 col-lg-11 m-auto" >
                @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @elseif(session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif
                <form action="{{ route('solicitante.store') }}" method="POST">
                    @csrf
            <div class="card multisteps-form__panel p-3 border-radius-xl bg-white js-active" data-animation="FadeIn">
            <h5 class="font-weight-bolder">Cadastro</h5>

            <div class="multisteps-form__content">
            <div class="row mt-3">
                                 <div class="col-md-4 mb-3">
                                   <label class="form-control-label" for="validationCustom02">Nome:</label>
                                   <input type="text" class="form-control" id="validationCustom02"id="nome" name="nome" required>
                                 </div>
                                 <div class="col-md-4 mb-3">
                                    <label class="form-control-label" for="validationCustom02">Cargo:</label>
                                    <input type="text" class="form-control" id="validationCustom02"id="cargo" name="cargo" required>
                                  </div>
                                 <div class="col-md-4 mb-3">
                                    <label class="form-control-label" for="validationCustom02">Senha:</label>
                                    <input type="password" class="form-control" id="validationCustom02" id="senha" name="senha" required>
                                  </div>
                                  <div class="button-row d-flex mt-4">
                                    <button class="btn bg-gradient-dark ms-auto mb-0" type="submit">Salvar</button>
                                </div>

            </div>
            </div>
            </div>
                </form>
            </div>
        </div>

        <div class="container-fluid py-4">
            <div class="row" style="margin-top: 20px;">
                <div class="col-lg-12 mb-2 mb-lg-0">
                    <div class="card z-index-2 h-100">
                        <div class="card-header d-flex align-items-center border-bottom py-3">
                            <h4 class="text-capitalize">Solicitante cadastrados</h4>
                        </div>


                        <div class="card-body">
                            <div class="table-responsive py-4">
                                <table class="table table-flush" id="datatable-buttons">
                                    <thead class="thead-light">
                                        <tr>
                                            <td style="font-weight: bold;">AÇÃO</td>
                                            <td style="font-weight: bold;">NOME</td>
                                            <td style="font-weight: bold;">CARGO</td>
                                            <td style="font-weight: bold;">SENHA</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($solicitante as $li)
                                                <tr id="{{ $li->id }}">
                                                    <!-- Adiciona a tag <tr> para iniciar uma nova linha da tabela -->

                                                    <td><button class="btn btn-youtube btn-icon-only rounded-sm apague"><i
                                                                class="fas fa-trash-alt"></i></button>
                                                                <button class="btn btn-warning btn-icon-only rounded-sm" data-bs-toggle="modal" data-bs-target="#modal-default{{$li->id}}"><i class="fas fa-pen"></i></button>

                                                    </td>

                                                    <td>{{ $li->nome }}</td>
                                                    <td>{{ $li->cargo }}</td>
                                                    <td>*****</td>
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
    @foreach ($solicitante as $li)
    <div class="modal fade" id="modal-default{{$li->id}}" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-md" role="document">
          <div class="modal-content">
            <div class="modal-body p-0">
              <div class="card card-plain">
                <div class="card-header pb-0 text-left">
                  <h3 class="font-weight-bolder text-warning text-gradient">ATUALIZAÇÃO</h3>
                </div>
                <div class="card-body">
                    <form class="needs-validation" action="{{ route('solicitante.update', ['id' => $li->id]) }}" method="POST" novalidate>
                        @csrf
                        @method('PUT')
                        <div class="card multisteps-form__panel p-3 border-radius-xl bg-white js-active"
                            data-animation="FadeIn">
                            <div class="multisteps-form__content">
                                <div class="row mt-3">
                                    <div class="col-md-12 mb-3">
                                      <label class="form-control-label" for="validationCustom02">Nome:</label>
                                      <input type="text" class="form-control"  id="validationCustom02" id="nome" name="nome" placeholder="" value="{{$li->nome}}">
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label class="form-control-label" for="validationCustom02">Cargo:</label>
                                        <input type="text" class="form-control" id="validationCustom02"id="cargo" name="cargo" value="{{$li->cargo}}">
                                      </div>
                                      <div class="col-md-12 mb-3">
                                        <label class="form-control-label" for="senha">Senha:</label>
                                        <input type="password" class="form-control" id="senha" name="senha" placeholder="">
                                        <small class="form-text text-muted">Deixe em branco para manter a senha atual.</small>
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
         function maiuscula(string) {
            res = string.value.toUpperCase();
            string.value = res;
        }
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
        axios.delete(`/solicitante/${id}`)
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
            pageLength: 3,


        });
    });

    </script>
@endsection
