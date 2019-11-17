<?php

namespace App\Http\Controllers;

use App\Simpanan;
use App\Anggota;
use Illuminate\Http\Request;
use DB;

class SimpananController extends Controller
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
    public function index()
    {
        // $dataSimpanan = Simpanan::select('tb_simpanan.*','tb_users.nama as nama_user','tb_anggota.nama as nama_anggota','tb_anggota.no_anggota as no_anggota','tb_jenis_transaksi.transaksi as transaksi','tb_jenis_transaksi.id as id_transaksi')
        // ->join('tb_anggota', 'tb_simpanan.anggota_id', '=', 'tb_anggota.id')
        // ->join('tb_users', 'tb_simpanan.id_user', '=', 'tb_users.id')
        // ->join('tb_jenis_transaksi', 'tb_simpanan.jenis_transaksi', '=', 'tb_jenis_transaksi.id')
        // ->get();
        // $jenisTransaksi = DB::table('tb_jenis_transaksi')->get();
        // $dataAnggota = Anggota::all();
        return view('indexSimpanan');
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
        Simpanan::create($request->all());
        return redirect('simpanan')->with('alert-success','Berhasil Menambahkan Data!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Simpanan  $simpanan
     * @return \Illuminate\Http\Response
     */
    public function show(Simpanan $simpanan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Simpanan  $simpanan
     * @return \Illuminate\Http\Response
     */
    public function edit(Simpanan $simpanan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Simpanan  $simpanan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Simpanan $simpanan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Simpanan  $simpanan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Simpanan $simpanan)
    {
        //
    }

    public function indexAS(Request $request){
        // $simpananAnggota = Simpanan::where('anggota_id', $request->idanggota)
        // ->where('jenis_transaksi', 1)
        // ->get();

        // $total_simpanan = Simpanan::where('anggota_id', $request->idanggota)
        // ->where('jenis_transaksi', 1)
        // ->select('nominal_transaksi')->sum('nominal_transaksi');

        // $penarikanAnggota = Simpanan::where('anggota_id', $request->idanggota)
        // ->where('jenis_transaksi', 2)
        // ->get();

        // $total_penarikan = Simpanan::where('anggota_id', $request->idanggota)
        // ->where('jenis_transaksi', 2)
        // ->select('nominal_transaksi')->sum('nominal_transaksi');

        // $sisa = $total_simpanan-$total_penarikan;

        // $anggotas = Anggota::all();
        $anggotaAktif = Anggota::join('tb_users', 'tb_users.id', '=', 'tb_anggota.user_id')
        ->where('tb_anggota.no_anggota', $request->idanggota)
        ->select('tb_anggota.id','tb_anggota.no_anggota', 'tb_anggota.nama', 'tb_users.nama as nama_user')
        ->first();

        // $totalSaldo = Simpanan::join('tb_jenis_transaksi', 'tb_jenis_transaksi.id', '=', 'tb_simpanan.jenis_transaksi')
        // ->join('tb_anggota', 'tb_anggota.id', '=', 'tb_simpanan.anggota_id')
        // ->where('anggota_id', $request->idanggota)
        // ->select('tb_simpanan.*', 'tb_jenis_transaksi.transaksi')
        // ->get();

        $dataSimpanan = Simpanan::select('tb_simpanan.*','tb_users.nama as nama_user','tb_anggota.nama as nama_anggota','tb_anggota.no_anggota as no_anggota','tb_jenis_transaksi.transaksi as transaksi','tb_jenis_transaksi.id as id_transaksi')
        ->join('tb_anggota', 'tb_simpanan.anggota_id', '=', 'tb_anggota.id')
        ->join('tb_users', 'tb_simpanan.id_user', '=', 'tb_users.id')
        ->join('tb_jenis_transaksi', 'tb_simpanan.jenis_transaksi', '=', 'tb_jenis_transaksi.id')
        ->where('tb_anggota.no_anggota', $request->idanggota)
        ->get();
        
        // if (empty($anggotaAktif)) {
        //     echo "<script>alert('Data Tidak Ditemukan')</script>";
        // }else{
        //     echo "<script>alert('Data Ditemukan')</script>";
        // }
        return view('indexSimpanan', compact('simpananAnggota', 'penarikanAnggota', 'anggotas', 'anggotaAktif', 'total_simpanan', 'anggota', 'total_penarikan', 'sisa', 'totalSaldo', 'dataSimpanan'));
    
    }
}
