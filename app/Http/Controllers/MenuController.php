<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\menu;
class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = menu::paginate(10);
        return view("menu.list",compact("data"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("menu.form");
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
            "harga" => 'required|digits_between:4,6|numeric'
        ]);

        menu::create($request->except("_token"));

        $request->session()->flash("info","Berhasil Tambah Data Menu");

        return redirect()->route('menu.index');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = menu::find($id);
        return view("menu.form",compact("data"));
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
        menu::where('id',$id)
                ->update($request->except(["_token","_method"]));

            $request->session()->flash("info","Berhasil Ubah Data Menu");
            return redirect()->route("menu.index");

            $request->validate([
                "nama" => 'required|max:50',
                "harga" => 'required|digits_between:4,6|numeric'
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
        menu::destroy($id);

        return redirect()->route("menu.index")
        ->with("info","Berhasil Hapus Data Menu");
    }
}
