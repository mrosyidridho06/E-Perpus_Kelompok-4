<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BukuDipinjam extends Model
{
    protected $guarded = [
        'id'
    ];

    public function buku(){
        return $this->belongsTo('App\Buku');
    }
    public function anggota(){
        return $this->belongsTo('App\Anggota');
    }
}
