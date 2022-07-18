@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="card">
            <div class="card-header">
                
                <a style="text-decoration:none" href="/home">Home</a> <i class="bi bi-caret-right"></i> Keranjang
            </div>
        </div>
    </div>

    <div class="card mt-3">
        <div class="card-header">
            Keranjang
        </div>
        <div class="card-body">

            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Barang</th>
                        <th>Jumlah Order</th>
                        <th>Harga</th>
                        <th>Total Harga</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        if (empty($pesananDetail)) : ?>
                        <h2>Data belum ada</h2>

                    
                    <?php else :?>
                        <?php $no=1;?>
                    @foreach ($pesananDetail as $d)
                    <tr>
                        <td>{{$no++}}</td>
                        <td>{{$d->Barang->nama_barang}}</td>
                        <td>{{$d->jumlah_order}}</td>
                        <td>Rp.{{number_format($d->barang->harga)}}</td>
                        <td>Rp.{{number_format($d->jumlah_harga)}}</td>
                        <td><a href="/delete/keranjang/{{$d->id}}" class="btn btn-danger"><i class="bi bi-trash-fill"></i></a></td>
                    </tr>
                    @endforeach
                    <?php endif?>
                    <tr>
                        <td colspan="4" align="right"><b>Total Harga :</b></td>
                        <td colspan="2"><b>Rp.{{number_format($pesanan->jumlah_harga)}}</b></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection


