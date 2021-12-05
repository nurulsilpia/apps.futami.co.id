<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TimeReparationContoller extends Controller
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
        $varian = DB::table('tbl_varian')->get();
        $data_table = DB::table('tbl_time_reparation')->get();
        return view ('TimeReparation.index',[
            'data_table'=> $data_table,
            'poproduksi'=>$poproduksi,
            'data_varian'=>$data_varian,
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
        return view('TimeReparation.Create',[
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
            'start'=>'required',
            'stop'=>'required',
        ]);

        if (strtotime($request->stop)<=strtotime($request->start)) {
            return redirect()->back()->with('error','stop reparation tidak boleh kurang dari start reparation');
        }
        
            DB::insert('insert into tbl_time_reparation (
                id_product,
                start,
                stop) 
                values (?,?,?)', [
                $request->id_product,
                $request->start,
                $request->stop]);
            return redirect()->route('TimeReparation.index') 
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
        $tampil = DB::table('tbl_time_reparation')->where('id_time_reparation',$id)->get();
        $poproduksi=DB::table('tbl_po_produksi')->orderBy('tanggal_dibuat','Desc')->get();
        $data_varian = DB::table('tbl_varian')->get();
        // dd($tampil);
        return view('TimeReparation.tampil',['tampil'=> $tampil,'poproduksi'=>$poproduksi,'data_varian'=>$data_varian]);
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
        $edit = DB::table('tbl_time_reparation')->where('id_time_reparation',$id)->get();
        // dd($edit);
        return view('TimeReparation.edit',['edit'=> $edit,
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
            'start'=>'required',
            'stop'=>'required',
        ]);
        
        // dd($request);
        DB::table('tbl_time_reparation')
            ->where('id_time_reparation', $id) 
            ->update([
                'id_product' => $request->id_product,
                'start' => $request->start,
                'stop' => $request->stop
            ]);
        return redirect()->route('TimeReparation.index')
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
        DB::table('tbl_time_reparation')->where('id_time_reparation',$id)->delete();
        return redirect()->route('TimeReparation.index')
                         ->with('delete','Berhasil dihapus');
    }
}

