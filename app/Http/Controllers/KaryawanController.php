<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\karyawan;

class KaryawanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = karyawan::paginate(10);
        return view("karyawan.list",compact("data"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("karyawan.form");
    
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
            "telepon" => 'required|digits_between:5,15|numeric'
        ]);

        karyawan::create($request->except("_token"));

        $request->session()->flash("info","Berhasil Tambah Data Karyawan");

        return redirect()->route('karyawan.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = karyawan::find($id);
        return view("karyawan.form",compact("data"));
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
        karyawan::where('id',$id)
        ->update($request->except(["_token","_method"]));

    $request->session()->flash("info","Berhasil Ubah Data Karyawan");
    return redirect()->route("karyawan.index");

    $request->validate([
        "nama" => 'required|max:50',
        "alamat" => 'required|max:50',
        "telepon" => 'required|digits_between:5,15|numeric'
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
        karyawan::destroy($id);

        return redirect()->route("karyawan.index")
        ->with("info","Berhasil Hapus Data karyawan");
    }
}
