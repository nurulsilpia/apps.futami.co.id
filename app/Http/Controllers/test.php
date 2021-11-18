<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//tambahkan class untuk koneksi ke database
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class test extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function coincalc(){
        return Http::get('https://api.rekeningku.com/v2/price/4')->body();
    }

    public function index()
    {
        $data_test = DB::table('tbl_test')->get();
        // grafik
        $filling_perfomance = DB::table('tbl_filling_perfomance')->get();
        $quantity_release = DB::table('tbl_quantity_release_qc')->get();
        $poproduksi=DB::table('tbl_po_produksi')->orderBy('tanggal_dibuat','Desc')->get();
        $varian = DB::table('tbl_varian')->get();
        $data_filling = [];
        $data_qc = []; 
        $data_quantity = []; 

        foreach ($filling_perfomance as $filling) {
            $data_filling[] = $filling->counter_filling;
            $data_qc = $filling;
        }
        // foreach ($quantity_release as $quantity) {
        //     $data_quantity[] = $quantity->id_product;
        // }
        // foreach ($varian as $varian) {
        //     $data_varian[] = $varian->id_product;
        // }
       
        foreach ($quantity_release as $release) {
            foreach ($poproduksi->where('id',$release->id_product) as $poproduksinya) {
                foreach ($varian->where('id',$poproduksinya->id_varian) as $item) {
                    $data_quantity[] = $item->kode_variant;
                }
            }
        }
        dd($data_quantity);
        // dd(json_encode($categories));
        return view ('test.home',[
            'data_test'=> $data_test,
            'data_filling'=>$data_filling,
            'data_quantity'=>$data_quantity,
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
        return view('test.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        DB::insert('insert into tbl_test (
            name,
            alamat) 
            values (?,?)', [
            $request->name,
            $request->alamat
            ]);
        return redirect()->route('test.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tampil = DB::table('tbl_test')->where('id',$id)->get();
        // dd($tampil);
        return view('test.tampil',['tampil'=> $tampil]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $edit = DB::table('tbl_test')->where('id',$id)->get();
        // dd($edit);
        return view('test.edit',['edit'=> $edit]);
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
        DB::table('tbl_test')
            ->where('id', $id) 
            ->update([
                'name' => $request->name,
                'alamat' => $request->alamat
            ]);
        return redirect()->route('test.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('tbl_test')->where('id',$id)->delete();
        return redirect()->route('test.index');
    }
}
