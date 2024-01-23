<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\relawan;
use Illuminate\Support\Facades\DB;


class RelawanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=relawan::all();
        return view('admin.relawan',compact('data'));
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
        $this->validate($request, [
            'foto' => 'required|image|mimes:jpg,png',
        ]);

        $fotoPath = $request->file('foto')->store('', 'public');

        $relawan = relawan::create([
            'foto' => $fotoPath,
            'nama' => $request->nama,
            'generasi' => $request->generasi,
            'program_studi' => $request->program_studi,
        ]);
        return redirect()->route('relawan.index')->with('success','Relawan Berhasil Disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = relawan::where('id', $id)->get(); 

        return view('detail',compact('data'));
    }

    public function showRead($id)
    {
        $data = relawan::where('id', $id)->get(); 

        return view('admin.show',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data=DB::table('relawan')->where('id_relawan', $id)->first();
        return view('relawan.edit', compact('data'));
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
            'nama'  =>'required',
            'generasi'=>'required',
            'program_studi'=>'required',
            'foto'=>'required'
             ]);
            
           
            {
                DB::UPDATE("UPDATE Relawan SET
                nama = ?,
                generasi = ?,
                program_studi= ?,
                foto= ?
                WHERE id_relawan = ?",[
                    $request->nama, 
                    $request->generasi, 
                    $request->program_studi,
                    $request->foto,
                    $id
                ]
            );
            }
            return redirect()->route('relawan.index')->with(['success'=>'Data Berhasil Diupdate!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        relawan::destroy($id);
        return redirect('/relawan');
    }
}



