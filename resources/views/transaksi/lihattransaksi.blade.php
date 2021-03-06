@extends('voyager::master')


@section('content')

    <div class="container-fluid">
        <h1 class="page-title">
            <i class="voyager-window-list"></i> Lihat Nasabah {{ $data->nama }}
        </h1>


        <div class="page-content edit-add container-fluid">
            <div class="row">
                <div class="col-md-12">

                    <div class="panel panel-bordered">

                        <table class="table table-bordered">
                            <tr>
                                <td>Nama</td>
                                <td>:</td>
                                <td>{{ $data->nama }}</td>
                            </tr>
                            <tr>
                                <td>NIK</td>
                                <td>:</td>
                                <td>{{ $data->nik }}</td>
                            </tr>

                            <tr>
                                <td>No Rekening</td>
                                <td>:</td>
                                <td>{{ $data->no_rek }}</td>
                            </tr>

                            <tr>
                                <td>Koperasi Terkait</td>
                                <td>:</td>
                                <td>{{ $koperasi->nama_koperasi }}</td>
                            </tr>

                            <tr>
                                <td>Pekerjaan</td>
                                <td>:</td>
                                <td>{{ $data->perkerjaan }}</td>
                            </tr>

                            <tr>
                                <td>Alamat</td>
                                <td>:</td>
                                <td>{{ $data->alamat }}</td>
                            </tr>

                            <tr>
                                <td>Nama Pinjaman</td>
                                <td>:</td>
                                <td>{{ $data->nama_pinjaman }}</td>
                            </tr>

                            <tr>
                                <td>Jumlah Pinjaman</td>
                                <td>:</td>
                                <td>Rp {{ $data->jumlah_pinjaman }}</td>
                            </tr>

                            <tr>
                                <td>Jatuh Tempo</td>
                                <td>:</td>
                                <td>{{ $data->jatuh_tempo }}</td>
                            </tr>

                            <tr>
                                <td>Cicilan Bulanan</td>
                                <td>:</td>
                                <td>Rp {{ $data->cicilan_bulanan }}</td>
                            </tr>


                        </table>
                    </div>
                    <br>

                    <h1 class="page-title">
                        <i class="voyager-window-list"></i> Histori Transaksi
                    </h1>

                    <a href="{{url('admin/trans/create/')}}/{{$kid}}/{{{$id}}}" class="btn btn-success btn-add-new">
                        <i class="voyager-plus"></i> <span>Tambah Histori</span>
                    </a>
                    <br>
                    <div class="panel panel-bordered">

                        <br>
                        <table class="table table-bordered" id="nasabah-table">
                            <thead>
                            <tr>
                                <th>Nama</th>
                                <th>Nominal</th>
                                <th>Status</th>

                                <th>Dibuat</th>
                            </tr>
                            </thead>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
    </div>

@endsection


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
    $(function () {
        $('#nasabah-table').DataTable({

            processing: true,
            serverSide: false,
            paging: true,
            searching: true,

            ajax: '{!! url('admin/trans/getTransaksiPinjam/'). "/" . $koperasi->id . "/" . $data->id !!}',
            columns: [
                {data: 'nama_transaksi', name: 'nama_transaksi'},
                {data: 'nominal', name: 'nominal'},
                {data: 'status_pinjaman', name: 'status_pinjaman'},
                {data: 'created_at', name: 'created_at'},

            ],
            destroy: true,
        });
    });
</script>

