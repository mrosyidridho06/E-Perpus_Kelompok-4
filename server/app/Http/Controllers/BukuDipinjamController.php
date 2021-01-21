<?php

namespace App\Http\Controllers;

use App\BukuDipinjam;
use App\Buku;
use App\Anggota;

use Illuminate\Http\Request;

class BukuDipinjamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bukuDipinjam['bukuDipinjam'] = BukuDipinjam::get();
        return view('pages.buku.bukuDipinjam', $bukuDipinjam);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $databuku = Buku::findOrFail(request('bukuid'));
        if ($databuku->stok>0){
            BukuDipinjam::create([
                'anggota_id' => request('anggotaid'),
                'buku_id' => request('bukuid')
                // 'create_at' => date('Y-m-d H:m:s'),
                
            ]);
            $peminjam = Anggota::findOrFail(request('anggotaid'));
            $peminjam->update(['jumlahpinjam' => $peminjam->jumlahpinjam+1]);
            $databuku->update(['stok' => $databuku->stok-1]);
            
            return redirect()->back()->with("OK", "Berhasil Pinjam");
        }else{
            return redirect()->back()->with("ERR", "Maaf, buku habis");

        }


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\BukuDipinjam  $bukuDipinjam
     * @return \Illuminate\Http\Response
     */
    public function show(BukuDipinjam $bukuDipinjam)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\BukuDipinjam  $bukuDipinjam
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $databuku = BukuDipinjam::findOrFail($id);
 
        return $databuku;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\BukuDipinjam  $bukuDipinjam
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        // $databuku->update(['stok' => $databuku->stok-1]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\BukuDipinjam  $bukuDipinjam
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $bukuDipinjam = BukuDipinjam::findOrFail($id);

        $databuku = Buku::findOrFail($bukuDipinjam->buku_id);
        $peminjam = Anggota::findOrfail($bukuDipinjam->anggota_id);
        $databuku->update([
           'stok' => $databuku->stok+1
        ]);
        $peminjam->update([
            'jumlahpinjam' => $peminjam->jumlahpinjam-1
         ]);
        $bukuDipinjam->delete();

        return redirect()->back()->with("OK", "Berhasil kembalikan buku");
        
    }
    public function showBuku(Request $request)
    {
        // $buku = Buku::findOrFail($request->get('id'));
        $buku = Buku::where('kodeBuku',$request->get('id'))->first();
        return $buku;
    }
    public function showAnggota(Request $request)
    {
        $anggota = Anggota::where('nim',$request->get('nim'))->first();
        return $anggota;
    }
    public function perpanjang(Request $request){
        // \Carbon\Carbon::parse($item->updated_at)->addDays(7)
        $bukuDipinjam = BukuDipinjam::where('id',$request->get('id'));
        $bukuDipinjam->update(['updated_at' => date('Y-m-d H:m:s',strtotime('+ 7 days'))]);
        return redirect()->back()->with("OK", "Berhasil memperpanjang peminjaman");
    }
}
