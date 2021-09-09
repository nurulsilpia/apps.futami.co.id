<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class poProduksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $poproduksi=DB::table('tbl_po_produksi')->orderBy('tanggal_dibuat','Desc')->get();
        $varian = DB::table('tbl_varian')->get();

        return view('poproduksi.index',[
            'poproduksi'=>$poproduksi,
            'varian'=>$varian
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $varian = DB::table('tbl_varian')->get();
        return view('poproduksi.create',[
                "varian"=>$varian
            ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::insert('insert into tbl_po_produksi (
            id_varian, 
            jumlah_po, 
            status_po,
            standar_bph,
            note,
            mulai_produksi,
            selesai_produksi
            )
            values (?,?,?,?,?)',[
                $request->id_varian,
                $request->jumlah_po,
                $request->status,
                $request->standar_bph,
                $request->note,
                $request->mulai_produksi,
                $request->selesai_produksi,
            ]);
            return redirect()->route('poproduksi.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $varian = DB::table('tbl_varian')->get();
        $poproduksi=DB::table('tbl_po_produksi')->where('id',$id)->get();
        return view('poproduksi.show',[
            'poproduksi'=>$poproduksi,
            "varian"=>$varian
        ]);
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
        DB::table('tbl_po_produksi')
            ->where('id', $id) 
            ->update([
                'id_varian' => $request->id_varian,
                'status_po' => $request->status_po,
                'note' => $request->note,
                'jumlah_po' => $request->jumlah_po
            ]);
        return redirect(route('poproduksi.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('tbl_po_produksi')->where('id','=', $id)->delete();
        
        return redirect()->route('poproduksi.index') -> with('deleted','berhasil menghapus');
    }
}
