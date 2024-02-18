<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>BJMP-CI Admin {{ isset($title)?'| '.$title:''}}</title>

    <link rel="icon" type="image/x-icon" href="{{ asset('assets\img\ci_icon.png') }}">

    <!-- Custom icon fonts for this template-->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Custom fonts for this template-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700;800;900&display=swap" rel="stylesheet">

<style>
   html, body{
        font-family: "Poppins", sans-serif !important;
    }

    .sidebar-brand-text :nth-child(1){
        font-weight: normal !important;
    }

    .sidebar-brand-text :nth-child(2){
        font-weight: 700 !important;
        color: #BEBEBE !important;
    }

    .nav-item, .active a{
        font-weight: normal !important;
    }
    
    .table-responsive, .table{
        font-size: 0.95em !important;
    }

    .table th{
        font-weight: 500 !important;
    }

    .table td{
        font-weight: 400 !important;
        color: #5e5e5e;
    }

    .table td.fit, 
    .table th.fit {
        white-space: nowrap;
        width: 1%;
    }
</style>

    <!-- Custom styles for this template-->
    <link href="{{ asset('assets\sbadmin2\css\sb-admin-2.css') }}" rel="stylesheet">
    <link href="{{ asset('assets\sbadmin2\vendor\datatables\dataTables.bootstrap4.min.css') }}" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Include Side Bar -->
        @include('admin.partials.layout-sidebar')

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Include Top Bar -->
            <div id="content">
                @include('admin.partials.layout-topbar')
            
                <!-- Main Content -->
                @yield('content-header')

                @yield('body')
            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; BJMP Crime Index 2024</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Are you sure you want to Logout?</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="{{ route('logout') }}">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('assets\sbadmin2\vendor\jquery\jquery.min.js') }}"></script>
    <script src="{{ asset('assets\sbadmin2\vendor\bootstrap\js\bootstrap.bundle.min.js') }}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('assets\sbadmin2\vendor\jquery-easing\jquery.easing.min.js') }}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('assets\sbadmin2\js\sb-admin-2.min.js') }}"></script>


    <!-- Page level plugins -->
    <script src="{{ asset('assets\sbadmin2\vendor\datatables\jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets\sbadmin2\vendor\datatables\dataTables.bootstrap4.min.js') }}"></script>

    <!-- Page level custom scripts -->
    <script src="{{ asset('assets\sbadmin2\js\demo\datatables-demo.js') }}"></script>

</body>

</html>