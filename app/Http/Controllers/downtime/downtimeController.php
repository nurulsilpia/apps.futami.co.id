<?php

namespace App\Http\Controllers\downtime;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class downtimeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $poproduksi=DB::table('tbl_po_produksi')->orderBy('tanggal_dibuat','Desc')->get();
        $data_varian = DB::table('tbl_varian')->get();
        $data_downtime = DB::table('tbl_downtime')->orderBy('selesai_downtime','Desc')->get();
        $data_jenis_downtime = DB::table('tbl_jenis_downtime')->get();
        $data_unit_downtime = DB::table('tbl_unit_downtime')->get();
        return view ('downtime.index',[
            'data_downtime'=> $data_downtime,
            'data_jenis_downtime'=> $data_jenis_downtime,
            'data_unit_downtime'=> $data_unit_downtime,
            'poproduksi'=>$poproduksi,
            'data_varian'=>$data_varian,
            ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data_jenis_downtime = DB::table('tbl_jenis_downtime')->get();
        $data_unit_downtime = DB::table('tbl_unit_downtime')->get();
        return view('downtime.create', [
            'jenis_downtime'=>$data_jenis_downtime,
            'unit_downtime'=>$data_unit_downtime
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
        // return redirect()->back()->withErrors($validator)->withInput();
        DB::insert('insert into tbl_downtime(
            id_produksi,
            id_jenis_downtime,
            id_unit_downtime,
            root_cause,
            mulai_downtime,
            selesai_downtime
            )
            values (?,?,?)',
            [
                $request->root_cause,
                $request->mulai_downtime,
                $request->selesai_downtime,
            ]);
            return redirect()->route('downtime.index');
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
