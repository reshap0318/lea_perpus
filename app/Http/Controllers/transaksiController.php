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
          $bukus = $bukus->Whereyear('tanggal',$request->tanggal);
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
          $bukus = buku::all();
        }
        // dd([$bukus,$request->all()]);
        $tahun = buku::select(DB::RAW('year(tanggal) as tahun'))->distinct()->orderby('tahun','asc')->pluck('tahun','tahun');
        $dosen = DB::table('dosen')->get();
        $jenis = DB::table('inventaris_jenis')->where('kelompok_id',1)->get();
        return view('list',compact('bukus','tahun','dosen','jenis'));

    }

    public function list()
    {
        $bukus = buku::orderby('tanggal','desc')->get();
        $tahun = buku::select(DB::RAW('year(tanggal) as tahun'))->distinct()->orderby('tahun','asc')->pluck('tahun','tahun');
        $dosen = DB::table('dosen')->get();
        $jenis = DB::table('inventaris_jenis')->where('kelompok_id',1)->get();
        return view('list',compact('bukus','tahun','dosen','jenis'));
    }

    // public function data($id)
    // {
    //     $bukus = buku::select('buku.*','users.nama')->join('users','buku.mahasiswa_nim','users.nim')->where('buku.id',$id)->first();
    //     return [$bukus];
    // }

    public function cek($nim, $id)
    {
        try {
          $user = user::where('nim',$nim)->first();
          if(!$user){
            return [
              [
                'status' => 'Info',
                'pesan' => 'Silakan Hubungi Asisten LEA Jika Aplikasi Ini Anda Rasa Bermasalah',
              ],
              [
                'status' => 'Warning',
                'pesan' => 'NIM Anda tidak Ditemukan, Silakan Coba Kembali',
              ]
            ];
          }

          $buku = buku::find($id);
          if(!$buku){
            return [
              [
                'status' => 'Warning',
                'pesan' => 'Buku yang anda Cari Tidak diTemukan',
              ]
            ];
          }

          $baca = new transaksi;
          $baca->nim = $nim;
          $baca->buku_id = $id;
          $baca->status = 1;
          $baca->save();
          return [
            [
              'status' => 'Berhasil',
              'pesan' => 'Berhasil Membaca Buku di Perpustakaan LEA',
            ]
          ];
        } catch (\Exception $e) {
          return [
            [
              'status' => 'Error',
              'pesan' => 'Terjadi Error Saat Menyimpan Data',
            ],
            [
              'status' => 'Error',
              'pesan' => $e,
            ],
          ];
        }

    }

}
