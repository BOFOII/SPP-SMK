@extends('layouts.page-layout')
@section('optional-css')
    <link rel="stylesheet" href="{{ asset('../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('../plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('../plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
@endsection
@section('content')
    <div class="container">
        <form action="{{ route('store.spp') }}" method="POST" class="modal fade" id="form-add" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-danger">
                        <h5 class="modal-title" id="exampleModalLongTitle">TAMBAHKAN SPP</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        @csrf
                        <div class="form-group">
                            <label for="">Tahun SPP</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                </div>
                                <input name="tahun" type="text" class="form-control" placeholder="Tahun">
                            </div>
                        </div>
                        <div class="from-group">
                            <label for="">Nominal</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                  <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                </div>
                                <input name="nominal" type="text" class="form-control" placeholder="Nominal">
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
                        <h3 class="card-title">Daftar SPP</h3>
                        <button class="btn btn-success float-right" data-toggle="modal"
                            data-target="#form-add">TAMBAH</button>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>TAHUN</th>
                                    <th>NOMINAL</th>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($spps as $spp)
                                    <tr>
                                        <td>{{ $spp->tahun }}</td>
                                        <td>{{ $spp->nominal }}</td>
                                        <td>
                                            <a href="#" class="btn btn-warning">EDIT</a>
                                        </td>
                                        <td>
                                            <form id="delete-form"
                                                action="{{ route('delete.spp', ['id_spp' => $spp->id_spp]) }}"
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
                                    <th>TAHUN</th>
                                    <th>NOMINAL</th>
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
