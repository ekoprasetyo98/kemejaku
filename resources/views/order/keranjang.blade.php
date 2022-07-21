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

            <?php
                if ($pesanan->status ==0) : ?>
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
                    <tr>
                        <td colspan="4" align="right"><b>Total Harga :</b></td>
                        <td><b>Rp.{{number_format($pesanan->jumlah_harga)}}</b></td>
                        
                        <?php if($pesanan->jumlah_harga >1):?>
                        <td><a href="/checkout" class="btn btn-success">Bayar Sekarang</a></td>
                        <?php else :?>
                        <td><a href="/checkout" class="btn disabled btn-success">Bayar Sekarang</a></td>
                        <?php endif;?>

                    </tr>
                    <?php elseif($pesanan->status == 1) :?>
                    <h2>Ayo pesan kemaja lagi yuk!</h2>
                    <?php endif?>
                </tbody>
                
            </table>
        </div>
    </div>
</div>
@endsection


