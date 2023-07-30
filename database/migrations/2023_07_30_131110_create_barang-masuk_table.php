<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('barang_masuk', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('id_barang');
            $table->date('tanggal_masuk');
            $table->smallInteger('jumlah_masuk');
            $table->timestamps();

            
            $table->foreign('id_barang')->references('id')->on('barang')
                ->onUpdate('CASCADE')
                ->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
