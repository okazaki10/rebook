<?php

namespace App\Http\Controllers;

use App\TransaksiSaldo;
use Illuminate\Http\Request;
use Session;
use App\Helper\Helper;

class TransaksiSaldoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Helper::auth(Session::get('email'),Session::get('password'));
        return view('pembeli.isisaldo',compact('user'));
 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $transaksi = new TransaksiSaldo;
        $this->validate(request(), [
            'saldo' => 'required|numeric',
            'gambar' => 'required'
        ]);
        $user = Helper::auth(Session::get('email'),Session::get('password'));
        $transaksi->id_user = $user->id;
        $transaksi->saldo = $request->get('saldo');
        $transaksi->status = '0';
        $transaksi->tanggal = date('Y-m-d');
        $path = $request->file('gambar')->store('public/transaksi');
        $path2 = str_replace("public","storage",$path);
        $transaksi->gambar = $path2;
        $transaksi->save();
        return redirect('pembeli/')->with('success','Data has been updated');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\TransaksiSaldo  $transaksiSaldo
     * @return \Illuminate\Http\Response
     */
    public function show(TransaksiSaldo $transaksiSaldo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TransaksiSaldo  $transaksiSaldo
     * @return \Illuminate\Http\Response
     */
    public function edit(TransaksiSaldo $transaksiSaldo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TransaksiSaldo  $transaksiSaldo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TransaksiSaldo $transaksiSaldo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TransaksiSaldo  $transaksiSaldo
     * @return \Illuminate\Http\Response
     */
    public function destroy(TransaksiSaldo $transaksiSaldo)
    {
        //
    }
}
