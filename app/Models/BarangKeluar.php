<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BarangKeluar extends Model
{
    use HasFactory;

    protected $table = 'barang_keluar';
    public $timestamps = false;

    protected $fillable = [
        'id_barang',
        'tanggal_keluar',
        'jumlah_keluar',
    ];

    public function barang(){
        return $this->belongsTo(Barang::class, 'id_barang');
    }
}
