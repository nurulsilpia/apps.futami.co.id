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
        $poproduksi=DB::table('tbl_po_produksi')->orderBy('tanggal_dibuat','Desc')->get();
        $varian = DB::table('tbl_varian')->get(); 
        $finish_good = collect( DB::table('tbl_filling_perfomance')->get())
        ->mapToGroups(function ($item, $key) {
            return [$item->id_product => $item->counter_filling];
        });

        // dd($finish_good);
        return view('QuantityRelease.index',[
            'data_table'=> $data_table,
            'finish_good'=>$finish_good,
            'varian'=>$varian,
            'poproduksi'=>$poproduksi
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
        return view('QuantityRelease.Create', [
            'varian'=>$varian
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
        $poproduksi=DB::table('tbl_po_produksi')->orderBy('tanggal_dibuat','Desc')->get();
        $tampil = DB::table('tbl_quantity_release_qc')->where('id_quantity_release_qc',$id)->get();
        $varian = DB::table('tbl_varian')->get();
        $finish_good = collect( DB::table('tbl_filling_perfomance')->get())
        ->mapToGroups(function ($item, $key) {
            return [$item->id_product => $item->counter_filling];
        });

        // dd($tampil);
        return view('QuantityRelease.tampil',['tampil'=> $tampil,'poproduksi'=>$poproduksi,'varian'=>$varian,'finish_good'=>$finish_good]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $varian = DB::table('tbl_varian')->get();
        $edit = DB::table('tbl_quantity_release_qc')->where('id_quantity_release_qc',$id)->get();
        // dd($edit);
        return view('QuantityRelease.edit',[ 'edit'=> $edit,
        'varian'=> $varian,]);
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
        $request->validate([
            'id_product'=>'required',
            'reject_defect_inspeksi'=>'required',
            'reject_defect_inspeksi_hci'=>'required',
        ]); 

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
