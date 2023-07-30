<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;

    protected $table = 'barang';

    protected $fillable = [
        'nama_barang',
    ];

    public function barangMasuk(){
        return $this->hasMany(BarangMasuk::class, 'id_barang');
    }

    public function barangKeluar(){
        return $this->hasMany(BarangKeluar::class, 'id_barang');
    }
}
