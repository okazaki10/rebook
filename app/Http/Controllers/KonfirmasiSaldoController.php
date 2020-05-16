<?php

namespace App\Http\Controllers;

use App\KonfirmasiSaldo;
use Illuminate\Http\Request;
use Session;
use App\Helper\Helper;
use DB;
use App\Daftar;


class KonfirmasiSaldoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Helper::auth(Session::get('email'), Session::get('password'));
        $data = DB::table('transaksi_saldo')->join('user', 'user.id', '=', 'transaksi_saldo.id_user')
            ->select('transaksi_saldo.id', 'user.nama_lengkap', 'transaksi_saldo.tanggal', 'transaksi_saldo.saldo', 'transaksi_saldo.status', 'transaksi_saldo.gambar')
            ->get();
        $konfirmasis = json_decode($data, true);
        return view('penjual.konfirmasisaldo', compact('user', 'konfirmasis'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    { }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate(request(), [
            'id' => 'required',
            'status' => 'required'
        ]);
        $konfirmasi = KonfirmasiSaldo::find($request->id);
        if ($request->status == '1'){
        $konfirmasi->status = '1';
        $konfirmasi->save();
        $user = Daftar::find($konfirmasi->id_user);
        $user->saldo = $user->saldo + $konfirmasi->saldo;
        $user->save();
        }else if($request->status == '2'){
        $konfirmasi->status = '2';
        $konfirmasi->save();
        }
        return redirect('penjual/konfirmasisaldo')->with('success','Data has been updated');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\KonfirmasiSaldo  $konfirmasiSaldo
     * @return \Illuminate\Http\Response
     */
    public function show(KonfirmasiSaldo $konfirmasiSaldo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\KonfirmasiSaldo  $konfirmasiSaldo
     * @return \Illuminate\Http\Response
     */
    public function edit(KonfirmasiSaldo $konfirmasiSaldo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\KonfirmasiSaldo  $konfirmasiSaldo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, KonfirmasiSaldo $konfirmasiSaldo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\KonfirmasiSaldo  $konfirmasiSaldo
     * @return \Illuminate\Http\Response
     */
    public function destroy(KonfirmasiSaldo $konfirmasiSaldo)
    {
        //
    }
}
