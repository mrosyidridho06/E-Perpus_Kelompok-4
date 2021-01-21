<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Tymon\JWTAuth\Contracts\JWTSubject;


class AddFirstSuperadmin extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::table('users')->insert(array(
            'name' => "Kepala Perpus",
            'username' => "superadminperpus",
            'password' => bcrypt("superadminperpus"),
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
        ));
        DB::table('users')->insert(array(
            'name' => "dosenperpus",
            'username' => "dosenperpus",
            'password' => bcrypt("dosenperpus"),
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
        ));

        DB::table('super_admins')->insert(array(
            'user_id' => 1,
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
