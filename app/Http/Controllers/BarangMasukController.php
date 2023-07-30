<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\BarangMasuk;
use Illuminate\Http\Request;

class BarangMasukController extends Controller
{
    public function index(){
        $data = [
            'barang_masuk' => BarangMasuk::with(['barang'])->latest()->get(),
        ];
        
        return view('barang-masuk', $data);
    }

    public function indexCreateBarangMasuk(){
        $data = [
            'barang' => Barang::all()
        ];

        return view('barang-masuk-create', $data);
    }

    public function postCreateBarangMasuk(Request $request){
        $validate = $request->validate([
            'id_barang'        => 'required|numeric',
            'tanggal_masuk'    => 'required|date',
            'jumlah_masuk'     => 'required|digits_between:1,6|numeric',
        ]);
                
        BarangMasuk::create([
            'id_barang'        => $validate['id_barang'],
            'tanggal_masuk'    => $validate['tanggal_masuk'],
            'jumlah_masuk'     => $validate['jumlah_masuk'],
        ]);

        return redirect('/barang-masuk')->with('asuccess', 'Berhasil menambahkan data barang masuk.');
    }

    public function indexUpdateBarangMasuk($id){
        $data = [
            'barang'       => Barang::all(),
            'barang_masuk' => BarangMasuk::find($id)
        ];

        return view('barang-masuk-update', $data);
    }

    public function postUpdateBarangMasuk(Request $request, $id){
        $validate = $request->validate([
            'id_barang'        => 'required|numeric',
            'tanggal_masuk'    => 'required|date',
            'jumlah_masuk'     => 'required|digits_between:1,6|numeric',
        ]);
                
        BarangMasuk::where('id', $id)
            ->update([
            'id_barang'        => $validate['id_barang'],
            'tanggal_masuk'    => $validate['tanggal_masuk'],
            'jumlah_masuk'     => $validate['jumlah_masuk'],
        ]);

        return redirect('/barang-masuk')->with('asuccess', 'Berhasil mengubah data barang masuk.');
    }

    public function postDeleteBarangMasuk($id){
        BarangMasuk::find($id);
        BarangMasuk::destroy($id);
        return redirect('/barang-masuk')->with('asuccess', 'Berhasil menghapus data barang masuk.');
    }
}
