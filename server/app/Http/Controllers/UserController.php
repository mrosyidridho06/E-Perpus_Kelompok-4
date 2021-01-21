<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $User['User'] = User::get();
        return view('pages.user.user', $User);
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
        if (request('password')==request('password2')){
            $checkUsername = User::where('username', request('username'))->first();
                if ($checkUsername != null){
                    return redirect()->back()->with('ERR','Username Telah Digunakan !');
                } else {
                    User::create([
                        'name'=>request('name'),
                        'username'=>request('username'),
                        'password'=>request('password'),
                    ]);
                    return redirect()->back()->with('OK','username berhasil ditambahkan !');
            }
        }else{
            return redirect()->back()->with('ERR','Konfirmasi password salah !');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $dataUser
     * @return \Illuminate\Http\Response
     */
    public function show(User $User)
    {
        //
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        
        return $user;
    }

    public function update(Request $request, $id)
    {
        $dataUser = User::findOrFail($id);
        if (request('passwordbaru') == request('passwordbaru2')){
            $dataUser->update([
                'password' => request('passwordbaru')
            ]);
            return redirect()->back()->with("OK", "Berhasil reset password");
        }else{
            return redirect()->back()->with("ERR", "Konfirmasi password salah !");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $dataUser
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dataUser = User::findOrFail($id);
        $dataUser->delete();
 
        return redirect()->back()->with("OK", "Berhasil menghapus data");
    }

    public function gantiPassword($id)
    {
        $user = User::findOrFail($id);
        $user->update([
           'password' => request('password')
        ]);
        return redirect()->back()->with("OK", "Berhasil mengubah password");
    }
}
