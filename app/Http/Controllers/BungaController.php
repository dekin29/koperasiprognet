<?php

namespace App\Http\Controllers;

use App\Bunga;
use App\Anggota;
use App\Simpanan;
use App\MasterBunga;
use \DB;
use Illuminate\Http\Request;

class BungaController extends Controller
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
        date_default_timezone_set('Asia/Makassar');
        $bulanNow = date('m');
        $tahunNow = date('Y');

        $cekTransaksiBulan = Bunga::where([
            ['trx_bulan', '=', $bulanNow],
            ['trx_tahun', '=', $tahunNow]
        ])->select(DB::raw('count(*) as total'))
        ->get();

        $dataMasterBunga = MasterBunga::orderByRaw('tanggal_mulai_berlaku DESC')
        ->limit(1)
        ->get();

        return view('indexBungaTrx', compact('dataMasterBunga','cekTransaksiBulan','bulanNow','tahunNow'));
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
        date_default_timezone_set('Asia/Makassar');
        $bulanNow = date('m');
        $tahunNow = date('Y');
        $dateNow = date('Y-m-d H:i:s');

        $getAnggota = Anggota::get();

        $cekTransaksiBulan = Bunga::where([
            ['trx_bulan', '=', $bulanNow],
            ['trx_tahun', '=', $tahunNow]
        ])->select(DB::raw('count(*) as total'))
        ->get();

        $cekBunga = MasterBunga::select('tanggal_mulai_berlaku', 'persentase')
        ->orderByRaw('tanggal_mulai_berlaku DESC')
        ->limit(1)
        ->get();

        foreach ($cekTransaksiBulan as $row) {
                
            if ($row->total > 0) {
                return redirect('/bunga');
            }
            else{
                foreach ($cekBunga as $bunga) {

                    Bunga::create([
                        'trx_bulan' => $bulanNow,
                        'trx_tahun' => $tahunNow,
                        'tanggal_proses' => $dateNow,
                        'persentase_bunga' => $bunga->persentase,
                        'id_user' => $request->id_user
                    ]);

                    foreach ($getAnggota as $rowAnggota) {
                    
                        $cekTransaksiAnggota = Simpanan::where([
                            ['anggota_id', '=', $rowAnggota->id],
                            ['tanggal', '<=', DB::raw('DATE_SUB(NOW(), INTERVAL 1 MONTH)')]
                        ])
                        ->select('anggota_id','tanggal')
                        ->get();

                        foreach ($cekTransaksiAnggota as $rowAnggotaTransaksi) {
                            
                            if (!empty($rowAnggotaTransaksi->anggota_id)) {
                                
                                $cekSaldo = Simpanan::join('tb_jenis_transaksi', 'tb_jenis_transaksi.id', '=', 'tb_simpanan.jenis_transaksi')
                                    ->join('tb_anggota', 'tb_anggota.id', '=', 'tb_simpanan.anggota_id')
                                    ->where('anggota_id', $rowAnggotaTransaksi->anggota_id)
                                    ->select(DB::raw('sum(tb_simpanan.nominal_transaksi * tb_jenis_transaksi.tipe) as saldo'))
                                    ->get();

                                foreach ($cekSaldo as $saldo) {
                                    $nominal_transaksi = $saldo->saldo * $bunga->persentase/100;
                                    Simpanan::create([
                                        'anggota_id' => $rowAnggotaTransaksi->anggota_id,
                                        'tanggal' => $dateNow,
                                        'jenis_transaksi' => '3',
                                        'nominal_transaksi' => $nominal_transaksi,
                                        'id_user' => $request->id_user
                                    ]);
                                }
                            }

                        }
                    }
                    
                }
                return redirect('/bunga');
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Bunga  $bunga
     * @return \Illuminate\Http\Response
     */
    public function show(Bunga $bunga)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Bunga  $bunga
     * @return \Illuminate\Http\Response
     */
    public function edit(Bunga $bunga)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Bunga  $bunga
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Bunga $bunga)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Bunga  $bunga
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bunga $bunga)
    {
        //
    }
}
