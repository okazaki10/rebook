<?php

namespace App\Http\Controllers;

use App\HomePage;
use Illuminate\Http\Request;
use Session;
use App\Helper\Helper;
use DB;

class HomePageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Session::has('email')) {
            $auth = Helper::auth(Session::get('email'), Session::get('password'));
            if ($auth != null) {
                if ($auth->status == 1) {
                    return redirect('pembeli/');
                } else if ($auth->status == 2 || $auth->status == 3) {
                    return redirect('penjual/');
                }
            } else {
                Session::destroy();
                return redirect('/');
            }
        } else {
            $list_bukus = DB::table('list_buku')->join('detail_buku', 'list_buku.id_buku', '=', 'detail_buku.id')->select('list_buku.id', 'list_buku.id_penjual', 'detail_buku.judul', 'list_buku.stok', 'detail_buku.gambar', 'detail_buku.harga', 'detail_buku.kategori', 'detail_buku.bisa_disewa', 'detail_buku.penulis', 'detail_buku.deskripsi', 'detail_buku.tanggal_terbit')->paginate(5);
            return view('welcome', compact('list_bukus'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function cari(Request $request)
    {
        if ($request->type != null) {
            Session::put('type', $request->type);
            Session::put('sewa', $request->sewa);
        }
        $detail_buku = '';
        if (Session::get('type') == "judul") {
            $detail_buku = 'detail_buku.judul';
        } else if (Session::get('type') == "kategori") {
            $detail_buku = 'detail_buku.kategori';
        } else if (Session::get('type') == "penulis") {
            $detail_buku = 'detail_buku.penulis';
        }
        if (Session::get('sewa') == "1") {
            $list_bukus = DB::table('list_buku')->join('detail_buku', 'list_buku.id_buku', '=', 'detail_buku.id')->select('list_buku.id', 'list_buku.id_penjual', 'detail_buku.judul', 'list_buku.stok', 'detail_buku.gambar', 'detail_buku.harga', 'detail_buku.kategori', 'detail_buku.bisa_disewa','detail_buku.penulis','detail_buku.deskripsi','detail_buku.tanggal_terbit')
                ->where($detail_buku, 'like', '%' . $request->pencarian . '%')
                ->where('detail_buku.bisa_disewa','1')
                ->paginate(5);
        } else {
            $list_bukus = DB::table('list_buku')->join('detail_buku', 'list_buku.id_buku', '=', 'detail_buku.id')->select('list_buku.id', 'list_buku.id_penjual', 'detail_buku.judul', 'list_buku.stok', 'detail_buku.gambar', 'detail_buku.harga', 'detail_buku.kategori', 'detail_buku.bisa_disewa','detail_buku.penulis','detail_buku.deskripsi','detail_buku.tanggal_terbit')
                ->where($detail_buku, 'like', '%' . $request->pencarian . '%')
                ->paginate(5);
        }
        return view('welcome', compact('list_bukus'));
    }

    
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\HomePage  $homePage
     * @return \Illuminate\Http\Response
     */
    public function show(HomePage $homePage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\HomePage  $homePage
     * @return \Illuminate\Http\Response
     */
    public function edit(HomePage $homePage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\HomePage  $homePage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, HomePage $homePage)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\HomePage  $homePage
     * @return \Illuminate\Http\Response
     */
    public function destroy(HomePage $homePage)
    {
        //
    }
}
