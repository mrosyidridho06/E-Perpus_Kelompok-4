<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddExistedBook extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // 'judulBuku' => request('judulbuku'),
        //     'penerbit' => request('penerbit'),
        //     'tahunTerbit' => request('tahunterbit'),
        //     'penulis' => request('penulis'),
        //     'kodeBuku' => request('kodebuku'),
        //     'stok' => request('jumlah'),
        //     'deskripsi' => request('deskripsi')
        DB::table('bukus')->insert(array(
            'judulBuku' => "Buku Sakti Laravel",
            'penerbit' => "ITK",
            'tahunTerbit' => "2012",
            'penulis' => "Azan Suwandi",
            'kodeBuku' => "BUKU001",
            'stok' => 5,
            'deskripsi' => "Buku Mantab untuk yang sudah jago",
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
        ));
        DB::table('bukus')->insert(array(
            'judulBuku' => "Buku Sakti Laravel Pemula",
            'penerbit' => "ITK",
            'tahunTerbit' => "2011",
            'penulis' => "Azan Suwandi",
            'kodeBuku' => "BUKU002",
            'stok' => 5,
            'deskripsi' => "Buku Mantab untuk Pemula",
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
        ));
        DB::table('bukus')->insert(array(
            'judulBuku' => "Buku Pemrograman Laravel",
            'penerbit' => "Sinar Dunia",
            'tahunTerbit' => "2012",
            'penulis' => "Wandi",
            'kodeBuku' => "BUKU003",
            'stok' => 2,
            'deskripsi' => "Buku Mantab untuk yang sudah jago",
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s'),
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
        ));
        DB::table('bukus')->insert(array(
            'judulBuku' => "Buku Mantab",
            'penerbit' => "Unilever",
            'tahunTerbit' => "2022",
            'penulis' => "Tegar Yasindra",
            'kodeBuku' => "BUKU004",
            'stok' => 1,
            'deskripsi' => "Mantab pokoknya",
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
        ));
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
