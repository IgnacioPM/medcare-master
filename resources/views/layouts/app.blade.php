<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <title>MedCare - @yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description">
    <meta content="Themesbrand" name="author">
    <!-- App favicon -->
    <link rel="shortcut icon" href="/assets/images/favicon.ico">

    <!-- Responsive Table css -->
    <link href="/assets/libs/admin-resources/rwd-table/rwd-table.min.css" rel="stylesheet" type="text/css">
    <link href="assets/libs/sweetalert2/sweetalert2.min.css" rel="stylesheet" type="text/css" />
    <!-- Bootstr/ap Css -->
    <link href="/assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css">
    <!-- Icons C/ss -->
    <link href="/assets/css/icons.min.css" rel="stylesheet" type="text/css">
    <!-- App Css/-->
    <link href="/assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css">

    <link href="/assets/libs/select2/css/select2.min.css" rel="stylesheet" type="text/css">
    <link href="/assets/libs/bootstrap-datepicker/css/bootstrap-datepicker.min.css" rel="stylesheet">
    <link href="/assets/libs/spectrum-colorpicker2/spectrum.min.css" rel="stylesheet" type="text/css">
    <link href="/assets/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css" rel="stylesheet">

    <style>
        .prueba {/* 
            color: white;
            font-size: 40px;
            text-shadow: 1px 1px 2px black, 0 0 25px rgb(32, 115, 121), 0 0 5px rgb(9, 76, 97); */
            color: rgb(42, 54, 61);
            font-size: 40px;
        }

        div.card-b {
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
            text-align: center;
        }
        div.card-c {
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
            text-align: center;
            font-size: 20px;
        }

    </style>
</head>

<body data-sidebar="dark">

    <!-- Begin page -->
    <div id="layout-wrapper">

        @include('includes.header')

        <!-- ========== Left Sidebar Start ========== -->

        @include('includes.sidebar')

        <!-- Left Sidebar End -->

        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">

            <div class="page-content">
                <div class="container-fluid">

                    @yield('content')

                    <!-- end row -->

                </div> <!-- container-fluid -->
            </div>
            <!-- End Page-content -->


            @include('includes.footer')


        </div>
        <!-- end main content-->

    </div>
    <!-- END layout-wrapper -->

    <!-- Right Sidebar -->

    @include('includes.theme')

    <!-- /Right-bar -->

    <!-- Right bar overlay-->
    <div class="rightbar-overlay"></div>

    <!-- JAVASCRIPT -->
    <script src="/assets/libs/jquery/jquery.min.js"></script>
    <script src="/assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="/assets/libs/metismenu/metisMenu.min.js"></script>
    <script src="/assets/libs/simplebar/simplebar.min.js"></script>
    <script src="/assets/libs/node-waves/waves.min.js"></script>

    <!-- Responsive Table js -->
    <script src="/assets/libs/admin-resources/rwd-table/rwd-table.min.js"></script>
    <!-- Init js /-->
    <script src="assets/js/pages/table-responsive.init.js"></script>
    <!-- fontawesome icons init -->
    <script src="assets/js/pages/fontawesome.init.js"></script>
    <!-- Sweet Alerts js -->
    <script src="assets/libs/sweetalert2/sweetalert2.min.js"></script>
    <!-- Sweet alert init js-->
    <script src="assets/js/pages/sweet-alerts.init.js"></script>

    <script src="assets/js/app.js"></script>
    <script src="/assets/libs/select2/js/select2.min.js"></script>
    <script src="/assets/libs/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
    <script src="/assets/libs/spectrum-colorpicker2/spectrum.min.js"></script>
    <script src="/assets/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js"></script>
    <script src="/assets/libs/admin-resources/bootstrap-filestyle/bootstrap-filestyle.min.js"></script>
    <script src="/assets/libs/bootstrap-maxlength/bootstrap-maxlength.min.js"></script>
    @if (Session::has('message'))
    <script>
        swal.fire("Excelente", "{!!  Session::get('message') !!}", "success", {
            botton: "OK"
        , });

    </script>
    @endif
    @if (Session::has('messageError'))
    <script>
        swal.fire("Error...", "{!!  Session::get('messageError') !!}", "error", {
            botton: "OK"
        })

    </script>
    @endif
    @if (Session::has('bienvenida'))
    <script>
        Swal.fire(
            "{!!  Session::get('bienvenida') !!}"
            , "{{ Auth::user()->name }}"
            , "success"
        )

    </script>
    @endif
    @if (Session::has('eliminar') == 'ok')
    <script>
        Swal.fire(
            'Eliminado!'
            , 'Registro Eliminado.'
            , 'success'
        )

    </script>
    @endif
    <script>
        $('.formulario-eliminar').submit(function(e) {
            e.preventDefault();

            Swal.fire({
                title: '¿Está seguro?'
                , text: "No podrá revertir estos cambios!"
                , icon: 'warning'
                , showCancelButton: true
                , confirmButtonColor: '#3085d6'
                , cancelButtonColor: '#d33'
                , confirmButtonText: 'Si, eliminar!'
                , cancelButtonText: 'Cancelar!'
            }).then((result) => {
                if (result.value) {
                    this.submit();
                }
            })
        })

    </script>
</body>
</html>
