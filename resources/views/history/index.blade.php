@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="/home">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">History</li>
            </ol>
        </nav>

        <div class="card">
            <div class="card-header">
                History Pemesanan
            </div>
            <div class="card-body">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Tanggal</th>
                            <th>Status</th>
                            <th>Jumlah Harga</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @php
                            $no = 1;
                        @endphp
                        @foreach ($data as $d)
                            
                        <tr>
                            <td>{{$no++}}</td>
                            <td>{{$d->tgl_order}}</td>
                            <td>

                                @if ($d->status == 1)
                                Silahkan melakukan pembayaran!
                                @else
                                Pesanan kamu sudah dibayar
                                
                                @endif
                            </td>
                            <td>Rp. {{number_format($d->jumlah_harga+$d->kode)}}</td>
                            <td><a href="/history/detail/{{$d->id}}" class="btn btn-primary">Detail</a></td>
                        </tr>
                        @endforeach
                    </tbody>
                    
                </table>
            </div>
        </div>
    </div>
</div>
@endsection


