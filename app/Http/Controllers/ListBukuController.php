<?php

namespace App\Http\Controllers;

use App\List_buku;
use App\Detail_buku;
use DB;
use Illuminate\Http\Request;
use Session;
use App\Helper\Helper;
class ListBukuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Helper::auth(Session::get('email'),Session::get('password'));
        $data = DB::table('list_buku')->join('detail_buku','list_buku.id_buku','=','detail_buku.id')->select('list_buku.id','list_buku.id_penjual','detail_buku.judul','list_buku.stok','detail_buku.gambar','detail_buku.kategori','detail_buku.bisa_disewa')->where('detail_buku.id_penjual',$user->id)->get();  
        $list_bukus = json_decode($data, true);
        return view('penjual.lihatbuku',compact('list_bukus','user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Helper::auth(Session::get('email'),Session::get('password'));
        $detail_bukus = Detail_buku::where('id_penjual',$user->id)->get();
        return view('penjual.listbuku',compact('detail_bukus','user'));
            
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
            'id_buku' => 'required',
            'stok' => 'required|numeric'
            ]);
        $list_buku = new List_buku;
        $user = Helper::auth(Session::get('email'),Session::get('password'));
        $list_buku->id_penjual = $user->id;
        $list_buku->id_buku = $request->get('id_buku');
        $list_buku->stok = $request->get('stok');
        $list_buku->save();
        return redirect('penjual/')->with('success','Data has been updated');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\List_buku  $list_buku
     * @return \Illuminate\Http\Response
     */
    public function show(List_buku $list_buku)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\List_buku  $list_buku
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\List_buku  $list_buku
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $list_buku = List_buku::find($id);
        $this->validate(request(), [
            'stok' => 'required|numeric'
            ]);
        $list_buku->stok = $request->get('stok');
        $list_buku->save();
        return redirect('penjual/listbuku')->with('success','Data has been updated');
    }

  

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\List_buku  $list_buku
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    $list_buku = List_buku::find($id);
    $list_buku->delete();
    return redirect('penjual/listbuku')->with('success','Data has been updated');
    }
}
