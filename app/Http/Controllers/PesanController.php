<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Barang;
use App\Pesanan;
use Auth;
use Carbon\Carbon;
use App\PesananDetail;
use Alert;


class PesanController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index($id){
        $data = Barang::where('id',$id)->first();
        return view('order/index',['data'=>$data]);
    }

    public function pesan($id, Request $request){
        // get data barang by id yang dipesan
        $barang = Barang::where('id',$id)->first();
        $tanggal = Carbon::now();
        // cek jumlah yang dipesan dengan stok yang tersedia
        if ($request->jumlah_pesan > $barang->stok) {
            # code...
            return redirect('/pesan/barang/'.$id);
        }

        // simpan data barang dan jumlah pesanan ke tabel pesanan
        
        $cek_pesanan = Pesanan::where('user_id',Auth::user()->id)->where('status',0)->first();
        
        if (empty($cek_pesanan)) {
            # code...
            $pesanan = new Pesanan;
            $pesanan->user_id = Auth::user()->id;
            $pesanan->tgl_order = $tanggal;
            $pesanan->status = 0;
            $pesanan->kode = mt_rand(100,999);
            $pesanan->jumlah_harga = 0;
            $pesanan->save(); 
        }
        $pesananBaru = Pesanan::where('user_id',Auth::user()->id)->where('status',0)->first();

        $cek_pesanan_detail = PesananDetail::where('barang_id',$barang->id)->where('pesanan_id',$pesananBaru->id)->first();

        // cek pesanan baru dan tambah pesanan lagi pada produk yang sama
        // jika produk belum dipesan maka input pesanan baru
        if (empty($cek_pesanan_detail)) {
            # code...
            $pesananDetail = new PesananDetail;
            $pesananDetail->barang_id = $barang->id;
            $pesananDetail->pesanan_id = $pesananBaru->id;
            $pesananDetail->jumlah_order = $request->jumlah_pesan;
            $pesananDetail->jumlah_harga = $barang->harga*$request->jumlah_pesan;
            // dd($pesananDetail->jumlah_harga);
            $pesananDetail->save();

        }else{
            $pesananDetail = PesananDetail::where('barang_id',$barang->id)->where('pesanan_id',$pesananBaru->id)->first();
            // jika produk yang sama dipesan kembali, maka update jumlah harga dan jumlah order
            $pesananDetail->jumlah_order =$pesananDetail->jumlah_order+ $request->jumlah_pesan;
            $detail_harga_baru = $barang->harga*$request->jumlah_pesan;
            $pesananDetail->jumlah_harga = $pesananDetail->jumlah_harga+$detail_harga_baru;
            $pesananDetail->update();
        }
        $pesanan = Pesanan::where('user_id',Auth::user()->id)->where('status',0)->first();
        $pesanan->jumlah_harga = $pesanan->jumlah_harga + $barang->harga*$pesananDetail->jumlah_order;
        $pesanan->update();
            
        // simpan ke pesanan detail
        // Alert::success('Success Message', 'Optional Title');
        return redirect('/home');

    }


    public function keranjang(){
        
        if ($pesanan = Pesanan::where('user_id',Auth::user()->id)->where('status',0)->first()) {
            # code...
            $pesananDetail = PesananDetail::where('pesanan_id',$pesanan->id)->get();
        }elseif($pesanan = Pesanan::where('user_id',Auth::user()->id)->where('status',1)->first()) {
            # code...
            $pesananDetail = PesananDetail::where('pesanan_id',$pesanan->id)->get();
        }
        return view('order/keranjang',compact('pesanan','pesananDetail'));
    }

    public function delete($id){
        $pesananDetail = PesananDetail::where('id',$id)->first();
        
        $pesanan = Pesanan::where('id',$pesananDetail->pesanan_id)->first();
        $pesanan->jumlah_harga = $pesanan->jumlah_harga - $pesananDetail->jumlah_harga;
        $pesanan->update();

        $user = Pesanan::where('user_id',Auth::user()->id)->where('status',0)->first();
        // $pesanan->status = 2;
        $user->update();
        $pesananDetail->delete();
        return redirect('/keranjang');
    }

    public function checkout(){
        
        $pesanan = Pesanan::where('user_id',Auth::user()->id)->where('status',0)->first();
        $pesananId = $pesanan->id;
        $pesanan->status = 1;
        $pesanan->update();

        return redirect('/history/detail/'.$pesananId);
    }
}
