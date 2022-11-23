@extends('layouts.page-layout')
@section('optional-css')
    <link rel="stylesheet" href="{{ asset('../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('../plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('../plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
@endsection
@section('content')
    <div class="container">
        <form action="{{ route('store.pembayaran') }}" method="POST" class="modal fade" id="form-add" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-danger">
                        <h5 class="modal-title" id="exampleModalLongTitle">TAMBAHKAN PEMBAYARAN</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        @csrf
                        <div class="row">
                            <div class="form-group col">
                                <label>Siswa</label>
                                <div class="input-group">
                                    <select id="nisn" name="nisn" class="custom-select form-control-border" id="exampleSelectBorder">
                                        <option>Pilih salah satu</option>
                                        @foreach ($siswa as $swa)
                                        <option value="{{ $swa->nisn }}">{{ $swa->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col">
                                <label>Tanggal SPP</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                    </div>
                                    <input name="tgl_bayar" type="date" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col">
                                <label>Tahun Bayar</label>
                                <div class="input-group">
                                    @foreach ($tahun as $year)
                                    <div class="col">
                                        <div class="form-check col">
                                            <input class="form-check-input" type="radio" name="tahun_bayar" value="{{ $year }}">
                                            <label for="form-check-label">{{ $year }}</label>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col">
                                <label>Bulan Bayar</label>
                                <div class="input-group">
                                    @foreach ($bulan as $key => $bln)
                                        <div class="col">
                                            <div class="form-check col">
                                                <input class="form-check-input" type="checkbox" name="bulan_bayar[{{ $loop->index }}]" value="{{ $key }}">
                                                <label for="form-check-label">{{ $bln }}</label>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col">
                                <label>Jumlah Bayar: Rp <p id="total-bayar">xxxx</p></label>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button id="kalkulasi" type="button" class="btn btn-success">Kalkulasi</button>
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
                        <h3 class="card-title">Daftar Pembayaran</h3>
                        <button class="btn btn-success float-right" data-toggle="modal"
                            data-target="#form-add">TAMBAH</button>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>NAMA PETUGAS</th>
                                    <th>NAMA SISWA</th>
                                    <th>TANGGAL BAYAR</th>
                                    <th>BULAN</th>
                                    <th>TAHUN</th>
                                    <th>JUMLAH BAYAR</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($transactions as $trx)
                                <tr>
                                    <td>
                                        {{ $trx->petugas->nama_petugas }}
                                    </td>
                                    <td>
                                        {{ $trx->siswa->nama }}
                                    </td>
                                    <td>
                                        {{ date('Y-M-d', strtotime($trx->tgl_bayar)) }}
                                    </td>
                                    <td>
                                        {{ $trx->bulan_bayar }}
                                    </td>
                                    <td>
                                        {{ $trx->tahun_bayar }}
                                    </td>
                                    <td>
                                        Rp {{ $trx->jumlah_bayar }}
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>NAMA PETUGAS</th>
                                    <th>NAMA SISWA</th>
                                    <th>TANGGAL BAYAR</th>
                                    <th>BULAN</th>
                                    <th>TAHUN</th>
                                    <th>JUMLAH BAYAR</th>
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
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script>
        $(function() {
            @if (count($errors->all()) > 0)
                $('#form-add').modal('show');
            @endif
            $('#kalkulasi').click(function() {
                let nisn = $('#nisn').find(':selected').val();
                let count_bulan = 0;
                $('input[name^="bulan_bayar"]:checkbox:checked').map(input => {
                    count_bulan++;
                });
                axios.post('/api/hitung-pembayaran', {
                    nisn: nisn,
                    bulan_bayar: count_bulan,
                })
                .then(res => {
                    if(res.data.code == 0) {
                        $('#total-bayar').text(res.data.harga);
                    } else if(res.data.code == 1) {
                        console.log('field tidak boleh kosong');
                    } else if(res.data.code == 2) {
                        console.log('Data tidak ditemukan');
                    }
                })
                .catch(err => {
                    console.log(err);
                })
            });
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
