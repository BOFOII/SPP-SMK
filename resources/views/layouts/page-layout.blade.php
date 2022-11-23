@extends('layouts.main-layout')
@section('body')
    <body class="hold-transition layout-top-nav">
        <div class="wrapper">
            <!-- Navbar -->
            @include('components.navbar')
            <!-- /.navbar -->

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                @include('components.header')
                <!-- /.content-header -->

                <!-- Main content -->
                <div class="content">
                    @yield('content')
                </div>
                <!-- /.content -->
            </div>
            <!-- /.content-wrapper -->

            <!-- Control Sidebar -->
            <aside class="control-sidebar control-sidebar-dark">
                <!-- Control sidebar content goes here -->
            </aside>
            <!-- /.control-sidebar -->

            <!-- Main Footer -->
            @include('components.footer')
        </div>
        <!-- ./wrapper -->
        <!-- REQUIRED SCRIPTS -->

        <!-- jQuery -->
        <script src="{{ asset('../plugins/jquery/jquery.min.js') }}"></script>
        <!-- Bootstrap 4 -->
        <script src="{{ asset('../plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <!-- AdminLTE App -->
        <script src="{{ asset('../dist/js/adminlte.min.js') }}"></script>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        @include('components.atoms.alert')
        @yield('optional-js')
    </body>
@endsection
