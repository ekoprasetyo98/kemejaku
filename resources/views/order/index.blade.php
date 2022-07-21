@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="card">
            <div class="card-header">
                
                <a style="text-decoration:none" href="/home">Home</a> <i class="bi bi-caret-right"></i> {{$data->nama_barang}}
            </div>
            <div class="card-body">
                <div class="row">

                    <div class="col-6">
                        <img style="object-fit: contain" class="card-img-top" src="{{url('assets')}}/{{$data->gambar}}" height="400" alt="">
                    </div>
                    
                    <div class="col-6">
                        <h2>{{$data->nama_barang}}</h2>
                        <b>Rp. {{number_format($data->harga)}}</b>
                        <p>Stok : <strong>{{$data['stok']}}</strong> Tersisa</p><hr>
                        <p><strong>Detail</strong></p>
                        <p>{{$data->keterangan}}</p>
                        <form action="/pesan/order/{{$data->id}}" method="post">
                            {{csrf_field()}}
                            <label for="">Jumlah pesanan</label>
                            <input required  type="number" name="jumlah_pesan" class="form-control">
                            <button type="submit"  class="btn btn-warning mt-3"><i class="bi bi-cart-plus"></i> Pesan Sekarang</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <img src="../assets/{{$data->gambar}}" width="500" alt="">            
</div>
@endsection


