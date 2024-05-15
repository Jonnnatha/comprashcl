<div class="min-height-300 bg-primary position-absolute w-100"></div>
 <aside class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4 " id="sidenav-main">
<div class="sidenav-header">
<i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
<a class="navbar-brand m-0" href="{{ route('admin.index') }}"  style="text-align: center;">
    <img src="{{ asset('img/hosp.png') }}" class="navbar-brand-img" alt="...">
    </a>
</div>
<hr class="horizontal dark mt-0">
<div class="collapse navbar-collapse  w-auto h-auto" id="sidenav-collapse-main">
<ul class="navbar-nav">
<li class="nav-item">
          <a class="nav-link" href="{{ route('admin.index') }}">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="fas fa-home text-primary text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Painel de Controle</span>
          </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.dados') }}">
                <div class="icon icon-shape icon-sm text-center d-flex align-items-center justify-content-center">
                <i class="fas fa-user text-info text-sm opacity-10"></i>
              </div>
              <span class="nav-link-text ms-1">Dados de Usuário</span>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.tabela') }}">
                <div class="icon icon-shape icon-sm text-center d-flex align-items-center justify-content-center">
                <i class="fas fa-bell text-warning text-sm opacity-10"></i>
              </div>
              <span class="nav-link-text ms-1">Solicitações</span>
            </a>
          </li>
          <li class="nav-item">
            <a data-bs-toggle="collapse" href="#ecommerceExamples" class="nav-link " aria-controls="ecommerceExamples" role="button" aria-expanded="false">
            <div class="icon icon-shape icon-sm text-center d-flex align-items-center justify-content-center">
            <i class="far fa-hospital text-success text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Cadastro</span>
            </a>
            <div class="collapse " id="ecommerceExamples">
            <ul class="nav ms-4">
            <li class="nav-item ">
            <a class="nav-link " href="{{ route('admin.referencia') }}">
            <span class="sidenav-mini-icon"> O </span>
            <span class="sidenav-normal"> Referência </span>
            </a>
            </li>
            <li class="nav-item ">
            <a class="nav-link " href="{{ route('admin.setor') }}">
            <span class="sidenav-mini-icon"> R </span>
            <span class="sidenav-normal"> Setor </span>
            </a>
            </li>
            <li class="nav-item ">
            <a class="nav-link " href="{{ route('admin.solicitante') }}">
            <span class="sidenav-mini-icon"> R </span>
            <span class="sidenav-normal"> Solicitante </span>
            </a>
            </li>
            <li class="nav-item ">
            <a class="nav-link " href="{{ route('admin.compras') }}">
            <span class="sidenav-mini-icon"> R </span>
            <span class="sidenav-normal"> Compras </span>
            </a>
            </li>
            </ul>
            </div>
            </li>
</ul>
</div>

 </aside>
