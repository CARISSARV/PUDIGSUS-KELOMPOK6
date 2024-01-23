<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\book;
use Illuminate\Support\Facades\DB;

class controller_book extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=book::all();
        return view('admin.book',compact('data'));
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
            'audio' => 'required|mimes:mp3',
            'cover' => 'required|image|mimes:jpg,png',
            'file' => 'required|mimes:pdf',
        ]);

        $audioPath = $request->file('audio')->store('audio', 'public');
        $coverPath = $request->file('cover')->store('covers', 'public');
        $filePath = $request->file('file')->store('files', 'public');

        $book = book::create([
            'judul' => $request->judul,
            'pengarang' => $request->pengarang,
            'tahun_terbit' => $request->tahun_terbit,
            'deskripsi' => $request->deskripsi,
            'jenis' => $request->jenis,
            'audio' => $audioPath,
            'cover' => $coverPath,
            'file' => $filePath,
        ]);
        return redirect()->route('book.index')->with('success','Buku Berhasil Disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = book::where('id', $id)->get(); 

        return view('detail',compact('data'));
    }

    public function showRead($id)
    {
        $data = book::where('id', $id)->get(); 

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
        $data=DB::table('book')->where('id_book', $id)->first();
        return view('book.edit', compact('data'));
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
        {
            $this->validate($request, [
                'judul'  =>'required',
                'pengarang'=>'required',
                'tahun_terbit'=>'required',
                'deskripsi'=>'required',
                'jenis' =>'required',
                'audio'=>'required',
                'cover'=>'required',
                'file' =>'required'

                 ]);
                {
                    DB::UPDATE("UPDATE Book SET
                    judul = ?,
                    pengarang = ?,
                    tahun_terbit= ?,
                    deskripsi= ?,
                    jenis= ?,
                    audio= ?,
                    cover= ?,
                    file= ?
                    WHERE id_relawan = ?",[
                        $request->judul,
                        $request->pengarang,
                        $request->tahun_terbit,
                        $request->deskripsi,
                        $request->jenis,
                        $request->audio,
                        $request->cover,
                        $id
                        ]
                    );
                    }
                    return redirect()->route('book.index')->with(['success'=>'Data Berhasil Diupdate!']);
            }
        }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        book::destroy($id);
        return redirect('/book');
    }
}
