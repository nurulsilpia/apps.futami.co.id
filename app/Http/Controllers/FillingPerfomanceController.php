<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class FillingPerfomanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data_index = collect( DB::table('tbl_filling_perfomance')->get())
        ->mapToGroups(function ($item, $key) {
            return [$item->id_product => $item];
        });
        $data = [];
        foreach($data_index as $key=>$varian){
            $minutes=0;
            foreach ($varian as $item) {
                $minutes+=Carbon::parse($item->start_filling)->diffinMinutes($item->stop_filling);
            }
            $data[$key]["total_batch"]=$varian->count();
            $data[$key]["minutes"]=$minutes;
            $data[$key]["pfr"]=number_format((($varian->sum("counter_filling") / ($minutes/60))/22800)*100,2,',','');
        };
        // dd($data);
        
    
        $poproduksi=DB::table('tbl_po_produksi')->orderBy('tanggal_dibuat','Desc')->get();
        $varian = DB::table('tbl_varian')->get(); 

        return view('FillingPerfomance.index',[
            'data_index'=>$data,
            'poproduksi'=>$poproduksi,
            'varian'=>$varian
            ]);
    }

    public function detail($id)
    {
        $data_index = DB::table('tbl_filling_perfomance')->where('id_product',$id)->get();
        $poproduksi=DB::table('tbl_po_produksi')->orderBy('tanggal_dibuat','Desc')->get();
        $varian = DB::table('tbl_varian')->get();

        return view('FillingPerfomance.detail',[
            'data_index'=>$data_index,
            'poproduksi'=>$poproduksi,
            "varian"=>$varian]);
    }
    
    public function create()
    {
        $varian = DB::table('tbl_varian')->get();
        return view('FillingPerfomance.create-data', [
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
        $varian = DB::table('tbl_varian')->get();
        $edit = DB::table('tbl_filling_perfomance')->where('id_filling_perfomance',$id)->get();
        // dd($edit);
        return view('FillingPerfomance.edit-data',[
            'edit'=> $edit,
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
        DB::table('tbl_filling_perfomance')
            ->where('id_filling_perfomance', $id) 
            ->update([
                'id_product' => $request->id_product,
                'no_batch' => $request->no_batch,
                'start_filling' => $request->start_filling,
                'stop_filling' => $request->stop_filling,
                'counter_filling'=> $request->counter_filling
            ]);
        return redirect()->route('FillingPerfomance.detail')
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
        return redirect()->route('FillingPerfomance.detail')
                        ->with('success','Deleted successfully');
    }
}
