<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\pelanggan;

class PelangganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = pelanggan::paginate(10);
        return view("pelanggan.list",compact("data"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("pelanggan.form");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            "nama" => 'required|max:50',
            "alamat" => 'required|max:50',
            "telepon" => 'required|digits_between:5,15|numeric',
            "email" => 'required|max:50'
        ]);

        pelanggan::create($request->except("_token"));

        $request->session()->flash("info","Berhasil Tambah Data Pelanggan");

        return redirect()->route('pelanggan.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = pelanggan::find($id);
        return view("pelanggan.form",compact("data"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
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
        pelanggan::where('id',$id)
        ->update($request->except(["_token","_method"]));

    $request->session()->flash("info","Berhasil Ubah Data Pelanggan");
    return redirect()->route("pelanggan.index");

    $request->validate([
        "nama" => 'required|max:50',
        "alamat" => 'required|max:50',
        "telepon" => 'required|digits_between:5,15|numeric',
        "email" => 'required|max:50'
    ]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        pelanggan::destroy($id);

        return redirect()->route("pelanggan.index")
        ->with("info","Berhasil Hapus Data pelanggan");
    }
}
