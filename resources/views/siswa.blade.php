@extends('layouts.page-layout')
@section('optional-css')
    <link rel="stylesheet" href="{{ asset('../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('../plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('../plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
@endsection
@section('content')
    <div class="container">
        <form action="{{ route('store.siswa') }}" method="POST" class="modal fade" id="form-add" tabindex="-1"
            role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-danger">
                        <h5 class="modal-title" id="exampleModalLongTitle">TAMBAHKAN SISWA</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        @csrf
                        <div class="row">
                            <div class="form-group col">
                                <label>NISN</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                    </div>
                                    <input name="nisn" type="text" class="form-control" placeholder="NISN">
                                </div>
                            </div>
                            <div class="form-group col">
                                <label>NIS</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                    </div>
                                    <input name="nis" type="text" class="form-control" placeholder="NISN">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col">
                                <label>Nama Siswa</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                    </div>
                                    <input name="nama" type="text" class="form-control" placeholder="Nama Siswa">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col">
                                <label>Kelas</label>
                                <div class="input-group mb-3">
                                    <select name="kelas_id" class="custom-select form-control-border" id="exampleSelectBorder">
                                        <option>Kelas</option>
                                        @foreach ($classes as $class)
                                            <option value="{{ $class->id_kelas }}">{{ $class->nama_kelas }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <!-- textarea -->
                                <div class="form-group">
                                    <label>Alamat</label>
                                    <textarea name="alamat" class="form-control" rows="3" placeholder="Enter ..."></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-sm-6">
                                <label>Number Phone</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                    </div>
                                    <input name="no_telp" type="text" class="form-control">
                                </div>
                            </div>
                            <div class="form-group col-sm-6">
                                <label>Tahun SPP</label>
                                <div class="input-group mb-3">
                                    <select name="spp_id" class="custom-select form-control-border" id="exampleSelectBorder">
                                        {{-- <option>Tahun SPP</option> --}}
                                        @foreach ($spps as $spp)
                                            <option value="{{ $spp->id_spp }}">{{ $spp->tahun }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </form>
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Daftar Siswa</h3>
                        <button class="btn btn-success float-right" data-toggle="modal"
                            data-target="#form-add">TAMBAH</button>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>NISN</th>
                                    <th>NIS</th>
                                    <th>NAMA</th>
                                    <th>NAMA KELAS</th>
                                    <th>ALAMAT</th>
                                    <th>NOMOR HP</th>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($students as $siswa)
                                    <tr>
                                        <td>{{ $siswa->nisn }}</td>
                                        <td>{{ $siswa->nis }}</td>
                                        <td>{{ $siswa->nama }}</td>
                                        <td>{{ $siswa->nama_kelas }}</td>
                                        <td>{{ $siswa->alamat }}</td>
                                        <td>{{ $siswa->no_telp }}</td>
                                        <td>
                                            <a href="#" class="btn btn-warning">EDIT</a>
                                        </td>
                                        <td>
                                            <form id="delete-form"
                                                action="{{ route('delete.siswa', ['nisn' => $siswa->nisn]) }}"
                                                method="POST" class="">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">HAPUS</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>NISN</th>
                                    <th>NIS</th>
                                    <th>NAMA</th>
                                    <th>NAMA KELAS</th>
                                    <th>ALAMAT</th>
                                    <th>NOMOR HP</th>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
            <!-- /.card -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
@endsection
@section('optional-js')
    <script src="{{ asset('../plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('../plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('../plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('../plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('../plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('../plugins/jszip/jszip.min.js') }}"></script>
    <script src="{{ asset('../plugins/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ asset('../plugins/pdfmake/vfs_fonts.js') }}"></script>
    <script src="{{ asset('../plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('../plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('../plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
    <script>
        $(function() {
            @if (count($errors->all()) > 0)
            $('#form-add').modal('show');

            @endif
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
    </script>
@endsection
