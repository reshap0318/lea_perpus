<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\user;
use App\buku;
use App\transaksi;
use App\asisten;
use DB;

class transaksiController extends Controller
{
    public function home()
    {
        $asisten = asisten::all();
        $buku6 = buku::orderby('tanggal','desc')->limit(6)->get();
        $jenis = DB::table('inventaris_jenis')->where('kelompok_id',1)->get();
        $tahun = buku::select(DB::RAW('year(tanggal) as tahun'))->distinct()->orderby('tahun','asc')->pluck('tahun','tahun');
        $dosen = DB::table('dosen')->get();
        return view('home',compact('buku6','tahun','dosen','asisten','jenis'));
    }

    public function carihome(Request $request)
    {
        // dd($request->all());
        if(!$request->judul && !$request->nim && !$request->tanggal && !$request->dosen && !$request->jenis){
          toast()->warning('Data Pencarian Kosong', 'Missing Data');
          return redirect()->back();
        }
        $bukus = buku::select('*');

        if($request->judul){
          $bukus = $bukus->Where('judul','like',"%$request->judul%");
        }

        if($request->nim){
          $bukus = $bukus->Where('mahasiswa_nim','like',"%$request->nim%");
        }

        if($request->tanggal){
          $bukus = $bukus->Where('tanggal',$request->tanggal);
        }

        if($request->dosen){
          $bukus = $bukus->Where('pembimbing_id_1',$request->dosen)->OrWhere('pembimbing_id_2',$request->dosen);
        }

        if($request->jenis){
          $bukus = $bukus->Where('jenis_id',$request->jenis);
        }

        $bukus = $bukus->get();
        // dd($bukus);
        if($bukus->isEmpty()){
          toast()->warning('Buku yang di cari Kosong', 'Buku Tidak Ketemu');
          return redirect()->back();
        }
        // dd([$bukus,$request->all()]);
        $tahun = buku::select(DB::RAW('year(tanggal) as tahun'))->distinct()->orderby('tahun','asc')->pluck('tahun','tahun');
        $dosen = DB::table('dosen')->get();
        $jenis = DB::table('inventaris_jenis')->where('kelompok_id',1)->get();
        return view('list',compact('bukus','tahun','dosen','jenis'));

    }

    public function list()
    {
        $bukus = buku::orderby('judul','asc')->get();
        $tahun = buku::select(DB::RAW('year(tanggal) as tahun'))->distinct()->orderby('tahun','asc')->pluck('tahun','tahun');
        $dosen = DB::table('dosen')->get();
        $jenis = DB::table('inventaris_jenis')->where('kelompok_id',1)->get();
        return view('list',compact('bukus','tahun','dosen','jenis'));
    }

    public function data($id)
    {
        $bukus = buku::select('buku.*','users.nama')->join('users','buku.mahasiswa_nim','users.nim')->where('buku.id',$id)->first();
        return [$bukus];
    }

    public function cek(Request $request)
    {
      try {
        if($request->nim){
          $asisten = asisten::where('nim',"$request->nim")->first();
          if($asisten){
            if($request->status == '0'){
              return $this->pinjam($request->nim, $request->id,$request->status,'Membaca');
            }elseif($request->status == 1){
              return $this->pinjam($request->nim, $request->id,$request->status,'Meminjam');
            }else{
              return 1; //berhasil
            }

          }else{
            return $this->pinjam($request->nim, $request->id,0,'Membaca');
          }
        }
        return 2; //gagal karna data kosong
      } catch (\Exception $e) {
        return 5; //eror
      }
    }

    public function pinjam($nim, $id, $status, $pesan)
    {
        $cekbuku = transaksi::where('buku_id',$id)->where('status',1)->first();
        if($cekbuku){
          toast()->warning('Buku Sudah dipinjam, Silakan Cari Buku Lain', 'warning');
          return 4;
        }else{
          try {
            $pinjam = new transaksi;
            $pinjam->nim = $nim;
            $pinjam->buku_id = $id;
            $pinjam->status = $status;
            $pinjam->save();
            toast()->success('Berhasil '.$pesan.' Buku', 'Berhasil');
            return 0; //gagal dikarenakan bukan Asisten, dan berhasil meminjam buku
          } catch (\Exception $e) {
            return 3;
          }
        }
    }
}
