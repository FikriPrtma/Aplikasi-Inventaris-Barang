<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;
use Exception;

class BarangController extends Controller
{
    public function index(){
        $data = [
            'barang' => Barang::all(),
        ];

        return view('barang', $data);
    }

    public function indexCreateBarang(){
        return view('barang-create');
    }

    public function postCreateBarang(Request $request){
        $validate = $request->validate([
            'nama_barang'      => 'required|max:64|unique:barang',
        ]);
                
        Barang::create([
            'nama_barang'      => $validate['nama_barang'],
        ]);

        return redirect('/barang')->with('asuccess', 'Berhasil menambahkan data barang.');
    }

    public function indexUpdateBarang($id){
        $data = [
            'barang'   => Barang::find($id),
        ];

        return view('barang-update', $data);
    }

    public function postUpdateBarang(Request $request, $id){
        $barang = Barang::find($id);

        if($request->nama_barang == $barang->nama_barang)
            $rules['nama_barang'] = 'required|max:64';
        else
            $rules['nama_barang'] = 'required|max:64|unique:barang';

        $validate = $request->validate($rules);

        Barang::where('id', $id)
            ->update([
                'nama_barang'      => $validate['nama_barang'],
        ]);

        return redirect('/barang')->with('asuccess', 'Berhasil mengubah data barang.');
    }

    public function postDeleteBarang($id){
        try{ 
            Barang::find($id);
            Barang::destroy($id);
            return redirect('/barang')->with('asuccess', 'Berhasil menghapus data barang.');
        }
        catch(Exception $e){
            return redirect('/barang')->with('aerror', 'Tidak bisa menghapus. Barang sudah digunakan pada tabel lain.');
        }

    }

}
