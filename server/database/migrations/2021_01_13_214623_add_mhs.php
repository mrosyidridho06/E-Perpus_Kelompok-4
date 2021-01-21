<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMhs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::table('anggotas')->insert(array(
            'nama' => "Azan Suwandi",
            'nim' => "11181014",
            'prodi' => "Informatika",
            'jumlahpinjam' => 0,
            'status' => 1,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
        ));
        DB::table('anggotas')->insert(array(
            'nama' => "Abdullah M H",
            'nim' => "11181001",
            'prodi' => "Informatika",
            'jumlahpinjam' => 0,
            'status' => 1,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
        ));
        DB::table('anggotas')->insert(array(
            'nama' => "Abi Ikhsan R",
            'nim' => "11181002",
            'prodi' => "Informatika",
            'jumlahpinjam' => 0,
            'status' => 1,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
        ));
        DB::table('anggotas')->insert(array(
            'nama' => "Ahmand Luthfi B",
            'nim' => "11181004",
            'prodi' => "Informatika",
            'jumlahpinjam' => 0,
            'status' => 1,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
        ));
        DB::table('anggotas')->insert(array(
            'nama' => "Alwi Wahyudi",
            'nim' => "11181007",
            'prodi' => "Informatika",
            'jumlahpinjam' => 0,
            'status' => 1,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
        ));

        DB::table('anggotas')->insert(array(
            'nama' => "Andi Sulthan R",
            'nim' => "11181010",
            'prodi' => "Informatika",
            'jumlahpinjam' => 0,
            'status' => 1,
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
