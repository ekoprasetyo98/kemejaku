@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="/home">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page"><a href="/history">History</a></li>
              <li class="breadcrumb-item active" aria-current="page">Detail Pemesanan</li>
            </ol>
        </nav>

        <div class="card">
            <div class="card-header">
               Detail History Pemesanan
            </div>
            <div class="card-body">
                <div class="alert alert-warning" role="alert">
                    Silahkan melakukan pembayaran dengan memasukan nominal sesuai dengan total harga! Transfer Ke Bank ABC dengan No. Rekening 1234567890 a/n kemejaku.
                </div>
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Barang</th>
                            <th>Tanggal Order</th>
                            <th>Status</th>
                            <th>Jumlah Harga</th>
                            <th>Total Harga</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php $no=1;?>
                    @foreach ($pesananDetail as $d)
                    <tr>
                        <td>{{$no++}}</td>
                        <td>{{$d->Barang->nama_barang}}</td>
                        <td>{{$d->pesanan->tgl_order}}</td>
                        <td>{{$d->jumlah_order}}</td>
                        <td>Rp.{{number_format($d->barang->harga)}}</td>
                        <td>Rp.{{number_format($d->jumlah_harga+$d->pesanan->kode)}}</td>
                    </tr>
                    @endforeach
                    <tr>
                        <td colspan="5" align="right"><b>Total Harga :</b></td>
                        <td><b>Rp.{{number_format($pesanan->jumlah_harga+$pesanan->kode)}}</b></td>
                    
                    </tbody>
                    
                </table>
            </div>
        </div>
    </div>
</div>
@endsection


