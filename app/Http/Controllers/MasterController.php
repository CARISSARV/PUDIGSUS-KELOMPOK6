<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\book;
use App\Models\relawan;
use Illuminate\Support\Facades\DB;

class MasterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
        $data=book::all();
        $data2=relawan::all();
        return view('master',compact('data','data2'));
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pesan.create');
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
            'id_pesan',
            'tanggal_pengiriman',   
            'id_user' 
        ]);
            DB::insert("INSERT INTO `pesan` (`id_pesan`, `tanggal_pengiriman`, `id_user`) VALUES (?, ?, ?)",
            [$request->id_pesan, $request->tanggal_pengiriman, $request->id_user]);
            return redirect()->route('pesan.index')->with(['success' => 'Data Berhasil Disimpan!']);
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
        $data = DB::table('pesan')->where('id_pesan', $id)->first();
        return view('pesan.edit', compact('data'));
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
{
    $this->validate($request, [
        'id_pesan' => 'required',
        'tanggal_pengiriman' => 'required',
        'id_user' => 'required',
    ]);

    DB::table('pesan')->where('id_pesan', $id)->update([
        'id_pesan' => $request->pesan,
        'tanggal_pengiriman' => $request->tanggal_pengiriman,
        'id_user' => $request->id_user,
    ]);

    return redirect()->route('pesan.index')->with(['success' => 'Data Berhasil Diupdate!']);
}

        
        //

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('pesan')->where('id_pesan', $id)->delete();
        return redirect()->route('pesan.index')->with(['success' => 'Data berhasil dihapus!']);
        //
    }
}