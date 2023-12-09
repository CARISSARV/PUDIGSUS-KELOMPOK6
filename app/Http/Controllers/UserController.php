<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class UserController extends Controller{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $data=DB::select(DB::raw("select * from user"));
        return view('user.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        return view('user.create');
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
        $this->validate($request, [
            'id_user',
            'username',   
            'password',
            'level', 
        ]);
        DB::insert("INSERT INTO `user` (`id_user`, `username`, `password`,`level` ) VALUES (?, ?, ?, ?)",
        [$request->id_user, $request->username, $request->password, $request->level]);
        return redirect()->route('user.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }
    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = DB::table('user')->where('id_user', $id)->first();
        return view('user.edit', compact('data'));
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, $id) {
        $this->validate($request, [
            'id_user' => 'required',
            'username' => 'required',
            'password' => 'required',
            'level'  => 'required',
        ]);

        DB::table('user')->where('id_user', $id)->update([
            'id_user' => $request-> user,
            'username' => $request-> username,
            'password' => $request -> password,
            'level' => $request -> level,
        ]);

        return redirect()->route('user.index')->with(['success' => 'Data Berhasil Diupdate!']);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('user')->where('id_user', $id)->delete();
        return redirect()->route('user.index')->with(['success' => 'Data berhasil dihapus!']);
        //
    }
}