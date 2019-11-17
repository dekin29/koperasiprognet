<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Anggota;
use App\User;
use App\Simpanan;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::where('tb_users.status_aktif', '=', 1)->get()->count();
        $simpanan = Simpanan::all()->count();
        $anggota = Anggota::select('tb_anggota.*','tb_users.nama as nama_user')
        ->join('tb_users', 'tb_anggota.user_id', '=', 'tb_users.id')
        ->where('tb_anggota.status_aktif', '=', 1)
        ->get()->count();
        return view('dashboard',compact('user','anggota','simpanan'));
    }
}
