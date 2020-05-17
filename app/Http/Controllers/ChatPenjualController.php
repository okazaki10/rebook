<?php

namespace App\Http\Controllers;

use App\Chat;
use Illuminate\Http\Request;
use Session;
use App\Helper\Helper;
use App\Daftar;
use DB;

class ChatPenjualController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Helper::auth(Session::get('email'), Session::get('password'));
        $chat_users  = DB::table('chat as t')
            ->select(DB::raw('t.id,t.id_user, t.id_penjual,t1.nama_lengkap as nama_pembeli, t2.nama_lengkap as nama_penjual,t.chat,t.tanggal'))
            ->join('user as t1', 't1.id', '=', 't.id_user')
            ->join('user as t2', 't2.id', '=', 't.id_penjual')
            ->where('t.id_user', $user->id)
            ->orWhere('t.id_penjual', $user->id)
            ->orderBy('id', 'asc')
            ->groupBy('id_user','id_penjual')
            ->get();
        $datas = json_decode($chat_users, true);
        $pesans = array();
        $total = 0;
        foreach($datas as $data){
           
            if($data['id_penjual'] != $user->id){
                $pesans[$total]['nama_pembeli'] = $data['nama_penjual'];
                $pesans[$total]['id_penjual'] = $data['id_penjual'];
            }else{
                $pesans[$total]['nama_pembeli'] = $data['nama_pembeli'];
                $pesans[$total]['id_penjual'] = $data['id_user'];
            }
            $total++;
        }
        $pesans = array_unique($pesans, SORT_REGULAR);
        return view('penjual.chatpage', compact('user', 'pesans'));
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
    { }
    public function kirim($id_penjual, $chats)
    {
        $user = Helper::auth(Session::get('email'), Session::get('password'));
        $chat = new Chat;
        $chat->id_user = $user->id;
        $chat->id_penjual = $id_penjual;
        $chat->chat = $chats;
        $chat->tanggal = date('Y-m-d H:i:s');
        $chat->save();
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Chat  $chat
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        /*
        $user = Helper::auth(Session::get('email'), Session::get('password'));
        $chat_users  = Chat::where('id_user',$user->id)->where('id_penjual',$id)->orWhere('id_user',$id)->where('id_penjual',$user->id)->get();
        $pesans = array();
        $total = 0;
        if($chat_users[0]['id_user'] != $user->id){
            $id_penjual = $chat_users[0]['id_user'];
        }else{
            $id_penjual = $chat_users[0]['id_penjual'];
        }
        foreach($chat_users as $chat_user){
            $pembeli = Daftar::find($chat_user['id_user']);
            $penjual = Daftar::find($chat_user['id_penjual']);
            $pesans[$total]['id'] = $chat_user['id'];
            $pesans[$total]['nama_pembeli'] = $pembeli->nama_lengkap;
            $pesans[$total]['nama_penjual'] = $penjual->nama_lengkap;
            $pesans[$total]['chat'] = $chat_user['chat'];
            $pesans[$total]['tanggal'] = $chat_user['tanggal'];
            $total++;
        }
        return view('pembeli.chat', compact('user', 'pesans','id_penjual'));
        */
        $user = Helper::auth(Session::get('email'), Session::get('password'));
        $chat_users  = DB::table('chat as t')
            ->select(DB::raw('t.id,t.id_user, t.id_penjual,t1.nama_lengkap as nama_pembeli, t2.nama_lengkap as nama_penjual,t.chat,t.tanggal'))
            ->join('user as t1', 't1.id', '=', 't.id_user')
            ->join('user as t2', 't2.id', '=', 't.id_penjual')
            ->where('t.id_user', $user->id)
            ->where('t.id_penjual', $id)
            ->orWhere('t.id_penjual', $user->id)
            ->Where('t.id_user', $id)
            ->orderBy('id', 'asc')
            ->get();
        $pesans = json_decode($chat_users, true);
        $id_penjual = $id;
        return view('penjual.chat', compact('user', 'pesans', 'id_penjual'));
    }

    public function handle($id)
    {
        $user = Helper::auth(Session::get('email'), Session::get('password'));
        $chat_users  = DB::table('chat as t')
            ->select(DB::raw('t.id,t.id_user, t.id_penjual,t1.nama_lengkap as nama_pembeli, t2.nama_lengkap as nama_penjual,t.chat,t.tanggal'))
            ->join('user as t1', 't1.id', '=', 't.id_user')
            ->join('user as t2', 't2.id', '=', 't.id_penjual')
            ->where('t.id_user', $user->id)
            ->where('t.id_penjual', $id)
            ->orWhere('t.id_penjual', $user->id)
            ->Where('t.id_user', $id)
            ->orderBy('id', 'asc')
            ->get();
        $pesans = json_decode($chat_users, true);
        $id_penjual = $id;
        return view('penjual.handlechat', compact('user', 'pesans', 'id_penjual'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Chat  $chat
     * @return \Illuminate\Http\Response
     */
    public function edit(Chat $chat)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Chat  $chat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Chat $chat)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Chat  $chat
     * @return \Illuminate\Http\Response
     */
    public function destroy(Chat $chat)
    {
        //
    }
}
