@extends('layouts.main-layout')
@section('body')

    <body class="hold-transition login-page">
        <div class="login-box">
            <div class="card card-outline card-primary">
                <div class="card-header text-center">
                    <a href="/" class="h1"><b>SPP</b> SMK</a>
                </div>
                <div class="card-body">
                    <p class="login-box-msg">Sign in to start your session</p>

                    <form action="{{ route('post.login') }}" method="post">
                        @csrf
                        <div class="input-group mb-3">
                            <input name="username" type="text"
                                class="form-control @error('username')
                      is-invalid
                  @enderror"
                                placeholder="Email">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-user"></span>
                                </div>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <input name="password" type="password"
                                class="form-control @error('password')
                      is-invalid
                  @enderror"
                                placeholder="Password">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4">
                                <div class="icheck-primary">
                                    <input type="checkbox" name="remember" value="true">
                                    <label for="remember">
                                        Ingat Saya
                                    </label>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="icheck-primary">
                                    <input type="checkbox" name="login_type" value="true">
                                    <label for="remember">
                                        Saya siswa
                                    </label>
                                </div>
                            </div>
                            <!-- /.col -->
                            <div class="col-4">
                                <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                            </div>
                            <!-- /.col -->
                        </div>
                    </form>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.login-box -->
        <!-- REQUIRED SCRIPTS -->

        <!-- jQuery -->
        <script src="{{ asset('../plugins/jquery/jquery.min.js') }}"></script>
        <!-- Bootstrap 4 -->
        <script src="{{ asset('../plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <!-- AdminLTE App -->
        <script src="{{ asset('../dist/js/adminlte.min.js') }}"></script>
    </body>
@endsection
