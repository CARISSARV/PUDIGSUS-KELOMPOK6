<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class MembacaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=DB::select(DB::raw("select * from membaca"));
        return view('Membaca.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Membaca.create');
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
            'Tanggal_baca' => 'required',
            'id_eBook'=> 'required',
            ]);
            
            
            
            DB::insert("INSERT INTO `membaca` (`id_Baca`, `Tanggal_baca`, `id_eBook`) VALUES (uuid(), ?, ?)",
            [$request->Tanggal_baca,$request->id_eBook]);
            return redirect()->route('membaca.index')->with(['success' => 'Data berhasil Disimpan!']);
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id_Baca
     * @return \Illuminate\Http\Response
     */
    public function show($id_Baca)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id_Baca
     * @return \Illuminate\Http\Response
     */
    public function edit($id_Baca)
    {
        $data=DB::table('membaca')->where('id_Baca', $id_Baca)->first();
        return view('Membaca.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id_Baca
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_Baca)
    {
        $this->validate($request, [
            'Tanggal_baca'=> 'required',
            'id_eBook'=> 'required'
            ]);

            DB::update("UPDATE membaca SET 'Tanggal_baca'=?,'id_eBook'=? WHERE 'id_Baca'=?",
            [$request->Tanggal_baca,$request->id_eBook,$id_Baca]);
        
        return redirect()->route('membaca.index')->with(['success' => 'Data Berhasil Diupdate']);
        }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id_Baca
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_Baca)
    {
        DB::table('membaca')->where('id_Baca', $id_Baca)->delete();

        //redirect to index
        return redirect()->route('membaca.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}