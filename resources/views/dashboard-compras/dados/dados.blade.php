@extends('dashboard-compras.template.main')
@section('title', 'Dados Usuário')
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
                    <h6 class="font-weight-bolder text-white mb-0">Dados do Usuário - {{ $user->nome }}</h6>
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

        <div style="margin-top: 100px;">

            <div class="col-10 col-lg-8 m-auto">
                <div class="card multisteps-form__panel p-3 border-radius-xl bg-white js-active" data-animation="FadeIn">
                    <h5 class="font-weight-bolder">Dados do Usuário</h5>

                    <div class="multisteps-form__content">
                        <div class="row mt-3">
                            <div class="col-md-4 mb-3">
                                <label class="form-control-label" for="validationCustom02">Nome:</label>
                                <input type="text" class="form-control" id="validationCustom02" name ="nome"
                                    placeholder="" value="{{ $user->nome }}"readonly>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-control-label" for="validationCustom02">Cargo:</label>
                                <input type="text" class="form-control" id="validationCustom02" name ="nome"
                                    placeholder="" value="{{ $user->cargo }}"readonly>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-control-label" for="validationCustom02">Função:</label>
                                <input type="text" class="form-control" id="validationCustom02" name ="nome"
                                    placeholder="" value="{{ $user->level }}"readonly>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-12 mb-3">
                                <label class="form-control-label">Referencia:</label>
                                <textarea type="text" class="form-control" name="justificativa" id="validationCustomUsername"
                                    aria-describedby="inputGroupPrepend" readonly>
                        @foreach ($referencias as $referencia)
{{ $referencia->referencia }} - Código: {{ $referencia->codigo }}&#13;&#10;
@endforeach
</textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

@endsection
