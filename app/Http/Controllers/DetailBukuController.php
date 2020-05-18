<?php

namespace App\Http\Controllers;

use App\List_buku;
use App\Detail_buku;
use DB;
use Illuminate\Http\Request;
use Session;
use App\Helper\Helper;

class DetailBukuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Helper::auth(Session::get('email'), Session::get('password'));
        $detail_bukus = Detail_buku::where('id_penjual', $user->id)->paginate(5);
        return view('penjual.lihatbukubaru', compact('detail_bukus', 'user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Helper::auth(Session::get('email'), Session::get('password'));
        return view('penjual.buku', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $detail_buku = new Detail_buku;
        $this->validate(request(), [
            'judul' => 'required',
            'kategori' => 'required',
            'tanggal_terbit' => 'required',
            'penulis' => 'required',
            'harga' => 'required|numeric',
            'gambar' => 'nullable',
            'bisa_disewa' => 'nullable'
        ]);
        $user = Helper::auth(Session::get('email'), Session::get('password'));
        $detail_buku->id_penjual = $user->id;
        $detail_buku->judul = $request->get('judul');
        $detail_buku->kategori = $request->get('kategori');
        $detail_buku->tanggal_terbit = $request->get('tanggal_terbit');
        $detail_buku->penulis = $request->get('penulis');
        $detail_buku->harga = $request->get('harga');
        $detail_buku->bisa_disewa = $request->get('bisa_disewa');
        if ($request->hasFile('gambar')) {
            $path = $request->file('gambar')->store('public/detail_buku');
            $path2 = str_replace("public", "storage", $path);
            $detail_buku->gambar = $path2;
        } else {
            $detail_buku->gambar = "storage/no_image.jpg";
        }
        if ($request->hasFile('pdf_preview')) {
            $path = $request->file('pdf_preview')->store('public/pdf_preview');
            $path2 = str_replace("public", "storage", $path);
            $detail_buku->pdf_preview = $path2;
        } else {
            $detail_buku->pdf_preview = "";
        }
        $detail_buku->save();
        return redirect('penjual/')->with('success', 'Data has been updated');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Detail_buku  $detail_buku
     * @return \Illuminate\Http\Response
     */
    public function show(Detail_buku $detail_buku)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Detail_buku  $detail_buku
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = Helper::auth(Session::get('email'), Session::get('password'));
        $detail_buku = Detail_buku::find($id);
        return view('penjual.ubahbukubaru', compact('detail_buku', 'id', 'user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Detail_buku  $detail_buku
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $detail_buku = Detail_buku::find($id);
        $this->validate(request(), [
            'judul' => 'required',
            'kategori' => 'required',
            'tanggal_terbit' => 'required',
            'penulis' => 'required',
            'harga' => 'required|numeric',
            'gambar' => 'nullable',
            'bisa_disewa' => 'nullable'
        ]);
        $user = Helper::auth(Session::get('email'), Session::get('password'));
        $detail_buku->id_penjual = $user->id;
        $detail_buku->judul = $request->get('judul');
        $detail_buku->kategori = $request->get('kategori');
        $detail_buku->tanggal_terbit = $request->get('tanggal_terbit');
        $detail_buku->penulis = $request->get('penulis');
        $detail_buku->harga = $request->get('harga');
        $detail_buku->bisa_disewa = $request->get('bisa_disewa');
        if ($request->hasFile('gambar')) {
            $path = $request->file('gambar')->store('public/detail_buku');
            $path2 = str_replace("public", "storage", $path);
            $detail_buku->gambar = $path2;
        }
        if ($request->hasFile('pdf_preview')) {
            $path = $request->file('pdf_preview')->store('public/pdf_preview');
            $path2 = str_replace("public", "storage", $path);
            $detail_buku->pdf_preview = $path2;
        }
        $detail_buku->save();
        return redirect('penjual/')->with('success', 'Data has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Detail_buku  $detail_buku
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $detail_buku = Detail_buku::find($id);
        $detail_buku->delete();
        return redirect('penjual/penjualan')->with('success', 'Data has been updated');
    }
}
