<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class FillingPerfomanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //SELECT kode_produksi, min(mulai), max(stop), timestampdiff(minute,min(mulai), max(stop)) menit, count(kode_produksi) total_batch FROM `tbl_filling_performance` group by kode_produksi
        $data_index = DB::select(
          'SELECT 
            id_product,
            SUM(counter_filling) counter_filling, 
            COUNT(counter_filling) total_batch,
            TIMESTAMPDIFF(MINUTE,MIN(start_filling),max(stop_filling)) pfr
           FROM 
            tbl_filling_perfomance
           GROUP BY
            id_product'
        );
    

        // dd($data_index);

        $poproduksi=DB::table('tbl_po_produksi')->orderBy('tanggal_dibuat','Desc')->get();
        $varian = DB::table('tbl_varian')->get();

        return view('FillingPerfomance.index',[
            'data_index'=>$data_index,
            'poproduksi'=>$poproduksi,
            "varian"=>$varian
            ]);
    }

    public function detail($id)
    {
        $data_index = DB::table('tbl_filling_perfomance')->where('id_product',$id)->get();
        return view('FillingPerfomance.detail',['data_index'=>$data_index]);
    }
    
    public function create()
    {
        return view('FillingPerfomance.create-data');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   $request->validate([
        'id_product'=>'required',
        'no_batch'=>'required',
        'start_filling'=>'required',
        'stop_filling'=>'required',
        'counter_filling'=>'required',
    ]);
   
    if (strtotime($request->stop_filling)<=strtotime($request->start_filling)) {
        return redirect()->back()->with('error','stop filling tidak boleh kurang dari start filiing');
    }
    
        DB::insert('insert into tbl_filling_perfomance (
            id_product, no_batch, start_filling, stop_filling, counter_filling)
            values (?,?,?,?,?)',[
                $request->id_product,
                $request->no_batch,
                $request->start_filling,
                $request->stop_filling,
                $request->counter_filling
            ]);
            return redirect()->route('FillingPerfomance.index')
                            ->with('success','Created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tampil = DB::table('tbl_filling_perfomance')->where('id_filling_perfomance',$id)->get();
        // dd($tampil);
        return view('FillingPerfomance.show-data',['tampil'=> $tampil]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $edit = DB::table('tbl_filling_perfomance')->where('id_filling_perfomance',$id)->get();
        // dd($edit);
        return view('FillingPerfomance.edit-data',['edit'=> $edit]);
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
        DB::table('tbl_filling_perfomance')
            ->where('id_filling_perfomance', $id) 
            ->update([
                'id_product' => $request->id_product,
                'no_batch' => $request->no_batch,
                'start_filling' => $request->start_filling,
                'stop_filling' => $request->stop_filling,
                'counter_filling'=> $request->counter_filling
            ]);
        return redirect()->route('FillingPerfomance.index')
                         ->with('success','Edited successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('tbl_filling_perfomance')->where('id_filling_perfomance',$id)->delete();
        return redirect()->route('FillingPerfomance.index')
                        ->with('success','Deleted successfully');
    }
}
