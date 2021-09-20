<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class QuantityReleaseQcController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data_table = DB::table('tbl_quantity_release_qc')->get();
        return view ('QuantityRelease.index', ['data_table'=> $data_table]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('QuantityRelease.Create');
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
            'id_product'=>'required',
            'reject_defect_inspeksi'=>'required',
            'reject_defect_inspeksi_hci'=>'required',
        ]);
        
        DB::insert('insert into tbl_quantity_release_qc (
            id_product,
            reject_defect_inspeksi,
            reject_defect_inspeksi_hci) 
            values (?,?,?)', [
            $request->id_product,
            $request->reject_defect_inspeksi,
            $request->reject_defect_inspeksi_hci
            ]);
        return redirect()->route('QuantityRelease.index')
                         ->with('success','Data Berhasil Disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tampil = DB::table('tbl_quantity_release_qc')->where('id_quantity_release_qc',$id)->get();
        // dd($tampil);
        return view('QuantityRelease.tampil',['tampil'=> $tampil]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $edit = DB::table('tbl_quantity_release_qc')->where('id_quantity_release_qc',$id)->get();
        // dd($edit);
        return view('QuantityRelease.edit',['edit'=> $edit]);
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
        // dd($request);
        DB::table('tbl_quantity_release_qc')
            ->where('id_quantity_release_qc', $id) 
            ->update([
                'id_product' => $request->id_product,
                'reject_defect_inspeksi' => $request->reject_defect_inspeksi,
                'reject_defect_inspeksi_hci' => $request->reject_defect_inspeksi_hci
            ]);
        return redirect()->route('QuantityRelease.index')
                         ->with('update','Berhasil Diedit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('tbl_quantity_release_qc')->where('id_quantity_release_qc',$id)->delete();
        return redirect()->route('QuantityRelease.index')
                         ->with('delete','Berhasil dihapus');
    }
}
