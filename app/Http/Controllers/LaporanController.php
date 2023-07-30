<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LaporanController extends Controller
{
    public function index(){
        $data = [
            'laporan' => DB::select('
                SELECT 
                    a.id_barang, a.nama_barang, 
                    if(x is null, 0, x) as bm, if(y is null , 0, y) as bk, 
                    if(x is null, 0, x) - if(y is null , 0, y) AS sisa 
                FROM(
                    SELECT id_barang, nama_barang, sum(jumlah_masuk) x 
                    FROM barang_masuk 
                    LEFT JOIN barang 
                    ON barang_masuk.id_barang = barang.id 
                    GROUP BY id_barang
                ) a
                LEFT JOIN(
                    SELECT id_barang, nama_barang, sum(jumlah_keluar) y 
                    FROM barang_keluar
                    LEFT JOIN barang 
                    ON barang_keluar.id_barang = barang.id 
                    GROUP BY id_barang
                ) b
                ON a.id_barang = b.id_barang
            ')
        ];
        
        return view('laporan', $data);
    }
}
