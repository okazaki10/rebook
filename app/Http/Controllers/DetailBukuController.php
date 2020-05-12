<?php

namespace App\Http\Controllers;

use App\Detail_buku;
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
            $user = Helper::auth(Session::get('email'),Session::get('password'));
            return view('penjual.buku',compact('user'));
     
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
        $detail_buku = new Detail_buku;
        $this->validate(request(), [
            'judul' => 'required',
            'tanggal_terbit' => 'required',
            'penulis' => 'required',
            'harga' => 'required|numeric',
            'gambar' => 'nullable'
        ]);
        $user = Helper::auth(Session::get('email'),Session::get('password'));
        $detail_buku->id_penjual = $user->id;
        $detail_buku->judul = $request->get('judul');
        $detail_buku->tanggal_terbit = $request->get('tanggal_terbit');
        $detail_buku->penulis = $request->get('penulis');
        $detail_buku->harga = $request->get('harga');     
        if($request->hasFile('gambar')){
        $path = $request->file('gambar')->store('public/detail_buku');
        $path2 = str_replace("public","storage",$path);
        $detail_buku->gambar = $path2;
        }else{
            $detail_buku->gambar = "storage/no_image.jpg";
        }
        $detail_buku->save();
        return redirect('penjual/')->with('success','Data has been updated');
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
    public function edit(Detail_buku $detail_buku)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Detail_buku  $detail_buku
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Detail_buku $detail_buku)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Detail_buku  $detail_buku
     * @return \Illuminate\Http\Response
     */
    public function destroy(Detail_buku $detail_buku)
    {
        //
    }

    
}
