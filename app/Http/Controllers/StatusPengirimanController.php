<?php

namespace App\Http\Controllers;

use App\StatusPengiriman;
use Illuminate\Http\Request;
use Session;
use App\Helper\Helper;
use DB;
use App\Detail_buku;
use App\List_buku;
use App\Keranjang_belanja;
use App\Daftar;
use App\Transaction_log;
use App\Status_konfirmasi;

class StatusPengirimanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Helper::auth(Session::get('email'),Session::get('password'));
        $data = DB::table('status_konfirmasi')->join('user','user.id','=','status_konfirmasi.id_penjual')
        ->select('status_konfirmasi.id','user.nama_lengkap','user.alamat','user.no_hp','status_konfirmasi.tanggal_mulai','status_konfirmasi.tanggal_selesai','status_konfirmasi.status')
        ->where('status_konfirmasi.id_user',$user->id)
        ->get();
        $konfirmasis = json_decode($data, true);
        return view('pembeli.konfirmasi',compact('user','konfirmasis'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\StatusPengiriman  $statusPengiriman
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\StatusPengiriman  $statusPengiriman
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = Helper::auth(Session::get('email'),Session::get('password'));
        $data = DB::table('status_konfirmasi')->join('user','user.id','=','status_konfirmasi.id_penjual')
        ->join('keranjang_belanja','keranjang_belanja.id_status','=','status_konfirmasi.id')
        ->join('list_buku','list_buku.id','=','keranjang_belanja.id_list_buku')
        ->join('detail_buku','list_buku.id_buku','=','detail_buku.id')
        ->select('keranjang_belanja.id','keranjang_belanja.jumlah','keranjang_belanja.harga','detail_buku.judul','detail_buku.gambar','user.nama_lengkap','user.alamat','user.no_hp','status_konfirmasi.tanggal_mulai','status_konfirmasi.tanggal_selesai','status_konfirmasi.status')
        ->where('status_konfirmasi.id',$id)
        ->get();
        $konfirmasis = json_decode($data, true);
        return view('pembeli.konfirmasipage',compact('konfirmasis','id','user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\StatusPengiriman  $statusPengiriman
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $konfirmasi = Status_konfirmasi::find($id);
        $this->validate(request(), [
            'status' => 'required'
            ]);
        $konfirmasi->tanggal_selesai = date('Y-m-d');    
        $konfirmasi->status = $request->get('status');
        $konfirmasi->save();
        if($request->get('status') == '2'){
            $transaksi = new Transaction_log;
            $transaksi->id_status_konfirmasi = $konfirmasi->id;
            $transaksi->tanggal_selesai = date('Y-m-d');
            $transaksi->save();
        }
        return redirect('pembeli/konfirmasi')->with('success','Data has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\StatusPengiriman  $statusPengiriman
     * @return \Illuminate\Http\Response
     */
    public function destroy(StatusPengiriman $statusPengiriman)
    {
        //
    }
}
