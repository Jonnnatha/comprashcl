<!doctype html>
<html class="no-js" lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="author" content="Jonnatha Gustavo">
    <title>
        @yield('title')
    </title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" href="{{ asset('img/gtos.ico') }}" />




    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <!-- Nucleo Icons -->
    <link href="{{ asset('css/dashboard/nucleo-icons.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/dashboard/nucleo-svg.css') }}" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <link href="{{ asset('css/dashboard/nucleo-svg.css') }}" rel="stylesheet" />
    <!-- CSS Files -->
    <link id="pagestyle" href="{{ asset('css/argon-dashboard.css?v=2.0.4') }}" rel="stylesheet" />
    <script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM="
        crossorigin="anonymous"></script>

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.2/css/jquery.dataTables.min.css" />
    <link rel="stylesheet" type="text/css"
        href="https://cdn.datatables.net/autofill/2.5.2/css/autoFill.dataTables.css" />
    <link rel="stylesheet" type="text/css"
        href="https://cdn.datatables.net/buttons/2.3.4/css/buttons.dataTables.min.css" />
    <link rel="stylesheet" type="text/css"
        href="https://cdn.datatables.net/colreorder/1.6.1/css/colReorder.dataTables.min.css" />
    <link rel="stylesheet" type="text/css"
        href="https://cdn.datatables.net/datetime/1.3.0/css/dataTables.dateTime.min.css" />
    <link rel="stylesheet" type="text/css"
        href="https://cdn.datatables.net/fixedcolumns/4.2.1/css/fixedColumns.dataTables.min.css" />
    <link rel="stylesheet" type="text/css"
        href="https://cdn.datatables.net/fixedheader/3.3.1/css/fixedHeader.dataTables.min.css" />
    <link rel="stylesheet" type="text/css"
        href="https://cdn.datatables.net/keytable/2.8.1/css/keyTable.dataTables.min.css" />
    <link rel="stylesheet" type="text/css"
        href="https://cdn.datatables.net/responsive/2.4.0/css/responsive.dataTables.min.css" />
    <link rel="stylesheet" type="text/css"
        href="https://cdn.datatables.net/rowgroup/1.3.0/css/rowGroup.dataTables.min.css" />
    <link rel="stylesheet" type="text/css"
        href="https://cdn.datatables.net/rowreorder/1.3.2/css/rowReorder.dataTables.min.css" />
    <link rel="stylesheet" type="text/css"
        href="https://cdn.datatables.net/scroller/2.1.0/css/scroller.dataTables.min.css" />
    <link rel="stylesheet" type="text/css"
        href="https://cdn.datatables.net/searchbuilder/1.4.0/css/searchBuilder.dataTables.min.css" />
    <link rel="stylesheet" type="text/css"
        href="https://cdn.datatables.net/searchpanes/2.1.1/css/searchPanes.dataTables.min.css" />
    <link rel="stylesheet" type="text/css"
        href="https://cdn.datatables.net/select/1.6.0/css/select.dataTables.min.css" />
    <link rel="stylesheet" type="text/css"
        href="https://cdn.datatables.net/staterestore/1.2.1/css/stateRestore.dataTables.min.css" />

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/autofill/2.5.2/js/dataTables.autoFill.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.3.4/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.3.4/js/buttons.colVis.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.3.4/js/buttons.html5.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.3.4/js/buttons.print.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/colreorder/1.6.1/js/dataTables.colReorder.min.js">
    </script>
    <script type="text/javascript" src="https://cdn.datatables.net/datetime/1.3.0/js/dataTables.dateTime.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/fixedcolumns/4.2.1/js/dataTables.fixedColumns.min.js">
    </script>
    <script type="text/javascript" src="https://cdn.datatables.net/fixedheader/3.3.1/js/dataTables.fixedHeader.min.js">
    </script>
    <script type="text/javascript" src="https://cdn.datatables.net/keytable/2.8.1/js/dataTables.keyTable.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/responsive/2.4.0/js/dataTables.responsive.min.js">
    </script>
    <script type="text/javascript" src="https://cdn.datatables.net/rowgroup/1.3.0/js/dataTables.rowGroup.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/rowreorder/1.3.2/js/dataTables.rowReorder.min.js">
    </script>
    <script type="text/javascript" src="https://cdn.datatables.net/scroller/2.1.0/js/dataTables.scroller.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/searchbuilder/1.4.0/js/dataTables.searchBuilder.min.js">
    </script>
    <script type="text/javascript" src="https://cdn.datatables.net/searchpanes/2.1.1/js/dataTables.searchPanes.min.js">
    </script>
    <script type="text/javascript" src="https://cdn.datatables.net/select/1.6.0/js/dataTables.select.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/staterestore/1.2.1/js/dataTables.stateRestore.min.js">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="//cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>



</head>

<body class="g-sidenav-show   bg-gray-300">

        @include('dashboard-solicitante.template.lista')


    @yield('codigo')

    <script src="{{ asset('js/dashboard/core/popper.min.js') }}"></script>
    <script src="{{ asset('js/dashboard/core/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/dashboard/plugins/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('js/dashboard/plugins/smooth-scrollbar.min.js') }}"></script>
    <script src="{{ asset('js/dashboard/plugins/chartjs.min.js') }}"></script>

    <script>
        var win = navigator.platform.indexOf('Win') > -1;
        if (win && document.querySelector('#sidenav-scrollbar')) {
            var options = {
                damping: '0.5'
            }
            Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
        }
    </script>
    <!-- Github buttons -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="{{ asset('js/argon-dashboard.min.js?v=2.0.4') }}"></script>
</body>
