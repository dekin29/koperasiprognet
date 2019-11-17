<?php

namespace App\Http\Controllers;

use App\Anggota;
use App\User;
use App\Simpanan;
use Illuminate\Http\Request;

class AnggotaController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function home()
    {
        $user = User::all()->count();
        $simpanan = Simpanan::all()->count();
        $anggota = Anggota::all()->count();
        return view('dashboard',compact('user','anggota','simpanan'));
    }

    public function index()
    {
        $all = Anggota::raw('tb_anggota.id')->select('tb_anggota.id')->get();
        $dataAnggota = Anggota::select('tb_anggota.*','tb_users.nama as nama_user')
        ->join('tb_users', 'tb_anggota.user_id', '=', 'tb_users.id')
        ->where('tb_anggota.status_aktif', '=', 1)
        ->get();
        $dataAnggota2 = Anggota::select('tb_anggota.*','tb_users.nama as nama_user')
        ->join('tb_users', 'tb_anggota.user_id', '=', 'tb_users.id')
        ->where('tb_anggota.status_aktif', '=', 2)
        ->get();
        // if (empty($all)) {
        //     date_default_timezone_set('Asia/Makassar');
        //     $no = date('dmY');
        //     $d=0; 
        // } else {
        //     date_default_timezone_set('Asia/Makassar');
        //     $no = date('dmY');
        //     $d=$d->id; 
        //     }
        return view('indexAnggota',compact('dataAnggota','dataAnggota2','all'));
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Anggota::create($request->all());
        return redirect('anggota')->with('alert-success','Berhasil Menambahkan Data!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Anggota  $anggota
     * @return \Illuminate\Http\Response
     */
    public function show(Anggota $anggota)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Anggota  $anggota
     * @return \Illuminate\Http\Response
     */
    public function edit($anggota)
    {
        $dataAnggota = Anggota::find($anggota)->first();
        return view('editAnggota',compact('dataAnggota'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Anggota  $anggota
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$anggota)
    {
        Anggota::find($anggota)->update($request->all());
        return redirect('/anggota');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Anggota  $anggota
     * @return \Illuminate\Http\Response
     */
    public function destroy($anggota)
    {
        Anggota::find($anggota)->delete();
        return redirect('/anggota')->with('alert-success','Data berhasi dihapus!');
    }

    public function aktif($anggota)
    {
        $dataAnggota = Anggota::where('id', $anggota)
        ->update(['status_aktif' => 1]);
        return redirect('/anggota#nonaktif');
    }

    public function nonaktif($anggota)
    {
        $dataAnggota = Anggota::where('id', $anggota)
        ->update(['status_aktif' => 2]);
        return redirect('/anggota#profile');
    }

}