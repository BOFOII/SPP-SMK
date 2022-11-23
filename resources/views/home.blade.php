@extends('layouts.page-layout')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>{{ $count_siswa }}</h3>
                        <p>Siswa</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-user"></i>
                    </div>
                    @if (auth()->user()->level == 'admin'|| auth()->user()->level == 'petugas')
                    <a href="{{ route('view.siswa') }}" class="small-box-footer">
                        More info <i class="fas fa-arrow-circle-right"></i>
                    </a>
                    @endif
                </div>
                <div class="small-box bg-danger">
                    <div class="inner">
                        <h3>{{ $count_pembayaran }}</h3>

                        <p>Pembayaran</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-shopping-cart"></i>
                    </div>
                    {{-- if user redirect to history --}}
                    <a href="{{ route('view.pembayaran') }}" class="small-box-footer">
                        More info <i class="fas fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>
            <!-- /.col-md-6 -->
            <div class="col-lg-6">
                <div class="small-box bg-danger">
                    <div class="inner">
                        <h3>{{ $count_kelas }}</h3>

                        <p>Kelas</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-object-group"></i>
                    </div>
                    @if (auth()->user()->level == 'admin')
                    <a href="{{ route('view.kelas') }}" class="small-box-footer">
                        More info <i class="fas fa-arrow-circle-right"></i>
                    </a>
                    @endif
                </div>

                <div class="small-box bg-primary">
                    <div class="inner">
                        <h3>{{ $count_spp }}</h3>

                        <p>SPP</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-money-bill-alt"></i>
                    </div>
                    @if (auth()->user()->level == 'admin')
                    <a href="{{ route('view.spp') }}" class="small-box-footer">
                        More info <i class="fas fa-arrow-circle-right"></i>
                    </a>
                    @endif
                </div>
            </div>
            <!-- /.col-md-6 -->
            <div class="col-lg-6">
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3>{{ $count_petugas }}</h3>

                        <p>Petugas</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-user-plus"></i>
                    </div>
                    @if (auth()->user()->level == 'admin')
                    <a href="{{ route('view.petugas') }}" class="small-box-footer">
                        More info <i class="fas fa-arrow-circle-right"></i>
                    </a>
                    @endif
                </div>
            </div>
            <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
@endsection
