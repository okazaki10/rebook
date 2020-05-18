<?php

namespace App\Http\Controllers;

use App\Status_konfirmasi;
use Illuminate\Http\Request;
use Session;
use App\Helper\Helper;
use DB;
use App\Detail_buku;
use App\List_buku;
use App\Keranjang_belanja;
use App\Daftar;
use App\Transaction_log;
use App\KeranjangSewa;

class StatusKonfirmasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Helper::auth(Session::get('email'), Session::get('password'));
        $data = DB::table('status_konfirmasi')->join('user', 'user.id', '=', 'status_konfirmasi.id_user')
            ->select('status_konfirmasi.id', 'user.nama_lengkap', 'user.alamat', 'user.no_hp', 'status_konfirmasi.tanggal_mulai', 'status_konfirmasi.tanggal_selesai', 'status_konfirmasi.status', 'status_konfirmasi.bisa_disewa')
            ->where('status_konfirmasi.id_penjual', $user->id)
            ->get();
        $konfirmasis = json_decode($data, true);
        return view('penjual.konfirmasi', compact('user', 'konfirmasis'));
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
     * @param  \App\Status_konfirmasi  $status_konfirmasi
     * @return \Illuminate\Http\Response
     */
    public function show(Status_konfirmasi $status_konfirmasi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Status_konfirmasi  $status_konfirmasi
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = Helper::auth(Session::get('email'), Session::get('password'));
        if (strpos($id, "sewa-") === 0) {
            $id = substr($id, 5);
            $sewa = '1';
            $data = DB::table('status_konfirmasi')->join('user', 'user.id', '=', 'status_konfirmasi.id_user')
                ->join('keranjang_sewa', 'keranjang_sewa.id_status', '=', 'status_konfirmasi.id')
                ->join('list_buku', 'list_buku.id', '=', 'keranjang_sewa.id_list_buku')
                ->join('detail_buku', 'list_buku.id_buku', '=', 'detail_buku.id')
                ->select('keranjang_sewa.id', 'keranjang_sewa.jumlah', 'keranjang_sewa.harga', 'detail_buku.judul', 'detail_buku.gambar', 'user.nama_lengkap', 'user.alamat', 'user.no_hp', 'status_konfirmasi.tanggal_mulai', 'status_konfirmasi.tanggal_selesai')
                ->where('status_konfirmasi.id', $id)
                ->get();
        } else {
            $sewa = '0';
            $data = DB::table('status_konfirmasi')->join('user', 'user.id', '=', 'status_konfirmasi.id_user')
                ->join('keranjang_belanja', 'keranjang_belanja.id_status', '=', 'status_konfirmasi.id')
                ->join('list_buku', 'list_buku.id', '=', 'keranjang_belanja.id_list_buku')
                ->join('detail_buku', 'list_buku.id_buku', '=', 'detail_buku.id')
                ->select('keranjang_belanja.id', 'keranjang_belanja.jumlah', 'keranjang_belanja.harga', 'detail_buku.judul', 'detail_buku.gambar', 'user.nama_lengkap', 'user.alamat', 'user.no_hp', 'status_konfirmasi.tanggal_mulai', 'status_konfirmasi.tanggal_selesai')
                ->where('status_konfirmasi.id', $id)
                ->get();
        }
        $konfirmasis = json_decode($data, true);
        return view('penjual.konfirmasipage', compact('konfirmasis', 'id', 'user', 'sewa'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Status_konfirmasi  $status_konfirmasi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $konfirmasi = Status_konfirmasi::find($id);
        $this->validate(request(), [
            'status' => 'required',
            'sewa' => 'required'
        ]);
        if ($request->sewa == '0') {
            $konfirmasi->tanggal_selesai = date('Y-m-d');
            $konfirmasi->status = $request->get('status');
            $konfirmasi->save();
            if ($request->get('status') == '3') {
                $keranjangs = Keranjang_belanja::where('id_status', $konfirmasi->id)->get();
                $total = 0;
                foreach ($keranjangs as $keranjang) {
                    $total = $total + $keranjang['harga'];
                    $list_buku = List_buku::find($keranjang['id_list_buku']);
                    $list_buku->stok = $list_buku->stok + $keranjang['jumlah'];
                    $list_buku->save();
                }

                $pembeli = Daftar::find($konfirmasi->id_user);
                $pembeli->saldo = $pembeli->saldo + $total;
                $pembeli->save();
            }
        } else { 
            if($request->get('status') == '1'){
                $konfirmasi->status = $request->get('status');
                $konfirmasi->save();
            }else if ($request->get('status') == '3') {
                $konfirmasi->tanggal_selesai = date('Y-m-d');
                $konfirmasi->status = $request->get('status');
                $konfirmasi->save();
                $keranjangs = KeranjangSewa::where('id_status', $konfirmasi->id)->get();
                $total = 0;
                foreach ($keranjangs as $keranjang) {
                    $total = $total + $keranjang['harga'];
                    $list_buku = List_buku::find($keranjang['id_list_buku']);
                    $list_buku->stok = $list_buku->stok + $keranjang['jumlah'];
                    $list_buku->save();
                }

                $pembeli = Daftar::find($konfirmasi->id_user);
                $pembeli->saldo = $pembeli->saldo + $total;
                $pembeli->save();
            }
        }
        return redirect('penjual/konfirmasi')->with('success', 'Data has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Status_konfirmasi  $status_konfirmasi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Status_konfirmasi $status_konfirmasi)
    {
        //
    }
}
