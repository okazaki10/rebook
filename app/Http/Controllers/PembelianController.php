<?php

namespace App\Http\Controllers;

use App\Pembelian;
use Illuminate\Http\Request;
use Session;
use App\Helper\Helper;
use DB;
use App\Detail_buku;
use App\List_buku;
use App\Keranjang_belanja;

class PembelianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Helper::auth(Session::get('email'), Session::get('password'));
        $list_bukus = DB::table('list_buku')->join('detail_buku', 'list_buku.id_buku', '=', 'detail_buku.id')->select('list_buku.id', 'list_buku.id_penjual', 'detail_buku.judul', 'list_buku.stok', 'detail_buku.gambar', 'detail_buku.harga', 'detail_buku.kategori')->paginate(2);
        return view('pembeli.pembelian', compact('user', 'list_bukus'));
    }

    public function cari(Request $request)
    {
        if($request->type != null){
        Session::put('type',$request->type);
        }
        $user = Helper::auth(Session::get('email'), Session::get('password'));
        $detail_buku = '';
        if(Session::get('type') == "judul"){
            $detail_buku = 'detail_buku.judul';
        }else if(Session::get('type') == "kategori"){
            $detail_buku = 'detail_buku.kategori';
        }else if(Session::get('type') == "penulis"){
            $detail_buku = 'detail_buku.penulis';
        }
        $list_bukus = DB::table('list_buku')->join('detail_buku', 'list_buku.id_buku', '=', 'detail_buku.id')->select('list_buku.id', 'list_buku.id_penjual', 'detail_buku.judul', 'list_buku.stok', 'detail_buku.gambar', 'detail_buku.harga', 'detail_buku.kategori')->where($detail_buku, 'like', '%' . $request->pencarian . '%')->paginate(2);
        return view('pembeli.pembelian', compact('user', 'list_bukus'));
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
        $this->validate(request(), [
            'id_penjual' => 'required',
            'id_list_buku' => 'required',
            'jumlah' => 'required|numeric|min:1'
        ]);
        $id_list_buku = $request->get('id_list_buku');
        $list_buku = List_buku::find($id_list_buku);
        $harga_buku = Detail_buku::find($list_buku->id_buku);
        $jumlah = $request->get('jumlah');
        $harga = $jumlah * $harga_buku->harga;
        if ($list_buku->stok >= $jumlah) {
            $list_buku->stok = $list_buku->stok - $jumlah;
            $list_buku->save();
            $keranjang = new Keranjang_belanja;
            $user = Helper::auth(Session::get('email'), Session::get('password'));
            $keranjang->id_user = $user->id;
            $keranjang->id_penjual = $request->get('id_penjual');
            $keranjang->id_list_buku = $id_list_buku;
            $keranjang->jumlah = $jumlah;
            $keranjang->harga = $harga;
            $keranjang->id_status = '0';
            $keranjang->save();
            return redirect('pembeli/pembelian')->with('success', 'Data has been updated');
        } else {
            return redirect('pembeli/pembelian')->with('success', 'jumlah melebihi stok');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\PembeliPage  $pembeliPage
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $list_buku = DB::table('list_buku')->join('detail_buku', 'list_buku.id_buku', '=', 'detail_buku.id')->join('user', 'list_buku.id_penjual', '=', 'user.id')->select('list_buku.id', 'list_buku.id_penjual', 'detail_buku.judul', 'list_buku.stok', 'detail_buku.gambar', 'user.nama_lengkap', 'user.alamat', 'detail_buku.harga', 'detail_buku.kategori')->where('list_buku.id', $id)->first();
        $user = Helper::auth(Session::get('email'), Session::get('password'));
        return view('pembeli.beli', compact('user', 'id', 'list_buku'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\PembeliPage  $pembeliPage
     * @return \Illuminate\Http\Response
     */
    public function edit(PembeliPage $pembeliPage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PembeliPage  $pembeliPage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    { }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PembeliPage  $pembeliPage
     * @return \Illuminate\Http\Response
     */
    public function destroy(PembeliPage $pembeliPage)
    {
        //
    }
}
