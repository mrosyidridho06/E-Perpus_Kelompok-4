<?php
 
namespace App\Http\Controllers;
 
use App\Buku;
use Illuminate\Http\Request;
 
class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $buku['buku'] = Buku::get();
        return view('pages.buku.daftarBuku', $buku);
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
        //     $table->string('judulBuku');
        //     $table->string('penerbit');
        //     $table->integer('tahunTerbit');
        //     $table->string('penulis');
        //     $table->string('kodeBuku')->unique();
        //     $table->integer('stok');
        
        Buku::create([
            'judulBuku' => request('judulbuku'),
            'penerbit' => request('penerbit'),
            'tahunTerbit' => request('tahunterbit'),
            'penulis' => request('penulis'),
            'kodeBuku' => request('kodebuku'),
            'stok' => request('jumlah')
            // 'deskripsi' => request('deskripsi')
        ]);
        return redirect()->back()->with("OK", "Berhasil menambahkan data");
    }
 
    /**
     * Display the specified resource.
     *
     * @param  \App\Buku  $dataBuku
     * @return \Illuminate\Http\Response
     */
    public function show(Buku $buku)
    {
        //
    }
 
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Buku  $dataBuku
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $databuku = Buku::findOrFail($id);
 
        return $databuku;
    }
 
    /** 
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Buku  $dataBuku
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $databuku = Buku::findOrFail($id);
        $databuku->update([
            'judulBuku' => request('judulbuku'),
            'penerbit' => request('penerbit'),
            'tahunTerbit' => request('tahunterbit'),
            'penulis' => request('penulis'),
            'kodeBuku' => request('kodebuku'),
            'stok' => request('jumlah')
        ]);
 
        return redirect()->back()->with("OK", "Berhasil mengubah data");
    }
 
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Buku  $dataBuku
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $databuku = Buku::findOrFail($id);
        $databuku->delete();
 
        return redirect()->back()->with("OK", "Berhasil menghapus data");
    }
}
 