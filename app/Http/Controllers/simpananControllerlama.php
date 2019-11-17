<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Simpanan;
use App\JenisTransaksi;
use App\Anggota;
use App\User1;

class simpananControllerlama extends Controller
{
    public function createTS(){
    	$simpananTambah = Simpanan::all();
    	$transaksiJenis = JenisTransaksi::where('id', '<', 3)->get();
    	$anggota = Anggota::all();

    	return view('tambahSimpanan', compact('simpananTambah', 'transaksiJenis', 'anggota'));
    }

    public function storeTS(Request $request){
    	$simpananTambah = new Simpanan;
    	$simpananTambah->anggota_id = $request->noanggota;
    	$simpananTambah->tanggal = $request->date;
    	$simpananTambah->jenis_transaksi = $request->jenisTransaksi;
    	$simpananTambah->nominal_transaksi = $request->nominal;
    	if($request->jenisTransaksi==2){
    		$total_simpanan = Simpanan::where('anggota_id', $request->noanggota)
			->where('jenis_transaksi', 1)
			->select('nominal_transaksi')->sum('nominal_transaksi');
			if($total_simpanan<$request->nominal){
				return redirect()->back()->withErrors(['Saldo Kurang!']);
			}
    	}
    	$simpananTambah->save();

    	return redirect('/dataSimpanan');
    }

	public function indexDS(){
		$simpananData = Simpanan::join('tb_jenis_transaksi', 'tb_jenis_transaksi.id', '=', 'tb_simpanan.jenis_transaksi')
		->join('tb_anggota', 'tb_anggota.id', '=', 'tb_simpanan.anggota_id')
		->join('tb_users', 'tb_users.id', '=', 'tb_anggota.user_id')
		->select('tb_simpanan.*', 'tb_jenis_transaksi.transaksi', 'tb_anggota.no_anggota', 'tb_anggota.nama', 'tb_users.nama as nama_user')
        ->get();

		return view('dataSimpanan', compact('simpananData'));
	}

	/*function deleteDS(Request $request){
		$dataSimpanans = Simpanan::find($request->simpananid);
		$dataSimpanans->delete();

		return redirect('/dataSimpanan');
	}

	function editDS($id){
		$dataSimpanans = Simpanan::find($id);
		$jenisTransaksis = JenisTransaksi::where('id', '<', 3)->get();
		$anggotas = Anggota::all();

		// return $dataSimpanans;

		return view('editTambahSimpanan', compact('dataSimpanans', 'jenisTransaksis', 'anggotas'));
	}

	function updateDS(Request $request,$id){
		$updateSimpanan = Simpanan::find($id);

		return $request->all();
		$updateSimpanan->anggota_id = $request->noanggota;
		$updateSimpanan->tanggal = $request->date;
		$updateSimpanan->jenis_transaksi = $request->jenisTransaksi;
		$updateSimpanan->nominal_transaksi = $request->nominal;
		$updateSimpanan->save();

		return redirect('dataSimpanan');
	}*/


	public function indexAS(Request $request){
		$simpananAnggota = Simpanan::where('anggota_id', $request->idanggota)
		->where('jenis_transaksi', 1)
		->get();

		$total_simpanan = Simpanan::where('anggota_id', $request->idanggota)
		->where('jenis_transaksi', 1)
		->select('nominal_transaksi')->sum('nominal_transaksi');

		$penarikanAnggota = Simpanan::where('anggota_id', $request->idanggota)
		->where('jenis_transaksi', 2)
		->get();

		$total_penarikan = Simpanan::where('anggota_id', $request->idanggota)
		->where('jenis_transaksi', 2)
		->select('nominal_transaksi')->sum('nominal_transaksi');

		$sisa = $total_simpanan-$total_penarikan;

		$anggotas = Anggota::all();
		$anggotaAktif = Anggota::join('tb_users', 'tb_users.id', '=', 'tb_anggota.user_id')
		->where('tb_anggota.id', $request->idanggota)
		->select('tb_anggota.no_anggota', 'tb_anggota.nama', 'tb_users.nama as nama_user')
		->first();


		$totalSaldo = Simpanan::join('tb_jenis_transaksi', 'tb_jenis_transaksi.id', '=', 'tb_simpanan.jenis_transaksi')
		->join('tb_anggota', 'tb_anggota.id', '=', 'tb_simpanan.anggota_id')
		->where('anggota_id', $request->idanggota)
		->select('tb_simpanan.*', 'tb_jenis_transaksi.transaksi')
        ->get();

        return $request;
		return view('anggotaSimpanan', compact('simpananAnggota', 'penarikanAnggota', 'anggotas', 'anggotaAktif', 'total_simpanan', 'anggota', 'total_penarikan', 'sisa', 'totalSaldo'));
	
	}



}
