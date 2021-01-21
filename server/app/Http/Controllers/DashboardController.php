<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Buku;
use App\Anggota;
use App\BukuDipinjam;

class DashboardController extends Controller
{
    public function index()
    {
        $data['anggota'] = Anggota::count();
        $data['bukuDipinjam'] = BukuDipinjam::count();
        $data['buku'] = Buku::sum('stok');

        return view('pages.index',$data);
    }
}
