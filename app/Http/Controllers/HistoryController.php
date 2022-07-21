<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Barang;
use App\Pesanan;
use Auth;
use Carbon\Carbon;
use App\PesananDetail;

class HistoryController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $pesanan = Pesanan::where('user_id',Auth::user()->id)->where('status','!=',0)->get();

        return view('history/index',['data'=>$pesanan]);
    }

    public function detail($id){
        $pesanan = Pesanan::where('id',$id)->first();
        $pesananDetail = PesananDetail::where('pesanan_id',$pesanan->id)->get();
        return view('history/detail',['pesanan'=>$pesanan,'pesananDetail'=>$pesananDetail]);
    }
}
