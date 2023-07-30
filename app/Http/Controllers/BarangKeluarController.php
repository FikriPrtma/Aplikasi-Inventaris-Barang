<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\BarangMasuk;
use App\Models\BarangKeluar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BarangKeluarController extends Controller
{
    public function index(){
        $data = [
            'barang_keluar' => BarangKeluar::with(['barang'])->latest()->get(),
        ];
        
        return view('barang-keluar', $data);
    }

    public function indexCreateBarangKeluar(){
        $data = [
            'barang' => Barang::all()
        ];

        return view('barang-keluar-create', $data);
    }

    public function postCreateBarangKeluar(Request $request){
        $validate = $request->validate([
            'id_barang'        => 'required|numeric',
            'tanggal_keluar'    => 'required|date',
            'jumlah_keluar'     => 'required|digits_between:1,6|numeric',
        ]);

        $barang_masuk = DB::select('
            SELECT * FROM barang_masuk where id_barang = '.$validate['id_barang'].' GROUP by id_barang
        ');
        
        if(empty($barang_masuk)){
        return redirect('/barang-keluar')->with('aerror', 'Tidak bisa menambah data barang keluar. Stok barang kosong.');
        }
        
        BarangKeluar::create([
            'id_barang' => $validate['id_barang'],
            'tanggal_keluar' => $validate['tanggal_keluar'],
            'jumlah_keluar' => $validate['jumlah_keluar'],
        ]);

        return redirect('/barang-keluar')->with('asuccess', 'Berhasil menambahkan data barang keluar.');
    }

    public function indexUpdateBarangKeluar($id){
        $data = [
            'barang'       => Barang::all(),
            'barang_keluar' => BarangKeluar::find($id)
        ];

        return view('barang-keluar-update', $data);
    }

    public function postUpdateBarangKeluar(Request $request, $id){
        $validate = $request->validate([
            'id_barang'        => 'required|numeric',
            'tanggal_keluar'    => 'required|date',
            'jumlah_keluar'     => 'required|digits_between:1,6|numeric',
        ]);
                
        BarangKeluar::where('id', $id)
            ->update([
            'id_barang'        => $validate['id_barang'],
            'tanggal_keluar'    => $validate['tanggal_keluar'],
            'jumlah_keluar'     => $validate['jumlah_keluar'],
        ]);

        return redirect('/barang-keluar')->with('asuccess', 'Berhasil mengubah data barang keluar.');
    }

    public function postDeleteBarangkeluar($id){
        Barangkeluar::find($id);
        Barangkeluar::destroy($id);
        return redirect('/barang-keluar')->with('asuccess', 'Berhasil menghapus data barang keluar.');
    }
}
