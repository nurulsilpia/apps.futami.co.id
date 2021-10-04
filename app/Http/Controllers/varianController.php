<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class varianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data_varian = DB::table('tbl_varian')->where('tampilkan',1)->get();
        return view('varian.index',['data_varian'=>$data_varian]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('varian.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::insert('insert into tbl_varian (
            id_customer,
            nama_variant,
            kode_variant,
            ukuran)
            values (?,?,?,?)', [
            $request->id_customer,
            $request->nama_variant,
            $request->kode_variant,
            $request->ukuran]);
        return redirect()->route('varian.index')
                         ->with('success','Berhasil Disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data_varian = DB::table('tbl_varian')->where('id',$id)->first();
        // dd($data_varian);
        return view('varian.show',['item'=>$data_varian]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
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
        DB::table('tbl_varian')
        ->where('id', $id)
        ->update([
            'nama_variant' => $request->nama_variant,
            'kode_variant' => $request->kode_variant,
            'ukuran' => $request->ukuran,
            ]);
        return  redirect()->route('varian.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('tbl_varian')->where('id',$id)->delete();
        return redirect()->route('varian.index')
                         ->with('delete','Berhasil dihapus');
    }
}
