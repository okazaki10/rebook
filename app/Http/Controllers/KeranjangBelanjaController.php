<?php

namespace App\Http\Controllers;

use App\Keranjang_belanja;
use Illuminate\Http\Request;
use Session;
use App\Helper\Helper;
use DB;
use App\Detail_buku;
use App\List_buku;
use App\Status_konfirmasi;
class KeranjangBelanjaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Helper::auth(Session::get('email'),Session::get('password'));
        $data = DB::table('keranjang_belanja')->join('list_buku','list_buku.id','=','keranjang_belanja.id_list_buku')->join('detail_buku','list_buku.id_buku','=','detail_buku.id')->select('keranjang_belanja.id','keranjang_belanja.jumlah','keranjang_belanja.harga','detail_buku.judul','detail_buku.gambar','keranjang_belanja.harga')->where('id_user',$user->id)->where('id_status','0')->get();  
        $keranjangs = json_decode($data, true);
        $total = 0;
        foreach($keranjangs as $keranjang){
            $total = $total + $keranjang['harga'];
        }
        return view('pembeli.keranjang',compact('user','keranjangs','total'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = Helper::auth(Session::get('email'),Session::get('password'));
        $keranjangs = Keranjang_belanja::where('id_user',$user->id)->where('id_status','0')->get();
        $total = 0;
        foreach($keranjangs as $keranjang){
            $total = $total + $keranjang['harga'];
        }
        if($user->saldo >= $total){
        $konfirmasi = new Status_konfirmasi;
        $konfirmasi->id_penjual = $keranjangs[0]['id_penjual'];
        $konfirmasi->id_user = $user->id;
        $konfirmasi->tanggal_mulai = date('y-m-d');
        $konfirmasi->tanggal_selesai = '01-01-01';
        $konfirmasi->status = '0';
        $konfirmasi->save();
        Keranjang_belanja::where('id_user',$user->id)->where('id_status','0')->update(['id_status'=>$konfirmasi->id]);
        $user->saldo = $user->saldo - $total;
        $user->save();
        return redirect('pembeli/')->with('success','Data has been updated');
        }else{
            return redirect('pembeli/')->with('success','saldo tidak cukup');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Keranjang_belanja  $keranjang_belanja
     * @return \Illuminate\Http\Response
     */
    public function show(Keranjang_belanja $keranjang_belanja)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Keranjang_belanja  $keranjang_belanja
     * @return \Illuminate\Http\Response
     */
    public function edit(Keranjang_belanja $keranjang_belanja)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Keranjang_belanja  $keranjang_belanja
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Keranjang_belanja $keranjang_belanja)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Keranjang_belanja  $keranjang_belanja
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $keranjang = Keranjang_belanja::find($id);
        $list_buku = List_buku::find($keranjang->id_list_buku);
        $list_buku->stok = $list_buku->stok + $keranjang->jumlah;
        $list_buku->save();
        $keranjang->delete();
        return redirect('pembeli/keranjang')->with('success','Data has been updated');
    }
}
