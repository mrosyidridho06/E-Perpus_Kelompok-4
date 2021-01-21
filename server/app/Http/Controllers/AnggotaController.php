<?php

namespace App\Http\Controllers;

use App\Anggota;
use Illuminate\Http\Request;

class AnggotaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $anggota['anggota'] = Anggota::get();
        return view('pages.anggota.anggota', $anggota);
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
        // $checkUsername = User::where('username', request('username'))->first();
        $checknim = Anggota::where('nim',request('nim'))->first();
        if($checknim == null){
            Anggota::create([
                'nama' => request('nama'),
                'nim' => request('nim'),
                'prodi' => request('prodi')
            ]);
            return redirect()->back()->with("OK", "Berhasil menambahkan Anggota");
        }else{
            return redirect()->back()->with("ERR", "NIM telah terdaftar");
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Anggota  $anggota
     * @return \Illuminate\Http\Response
     */
    public function show(Anggota $anggota)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Anggota  $anggota
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $anggota = Anggota::findOrFail($id);
 
        return $anggota;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Anggota  $anggota
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $anggota = Anggota::findOrFail($id);
        $anggota->update([
            'nama' => request('nama'),
            'nim' => request('nim'),
            'prodi' => request('prodi')
        ]);
 
        return redirect()->back()->with("OK", "Berhasil mengubah anggota");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Anggota  $anggota
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $anggota = Anggota::findOrFail($id);
        $anggota->delete();
 
        return redirect()->back()->with("OK", "Berhasil menghapus data");
    }
}
