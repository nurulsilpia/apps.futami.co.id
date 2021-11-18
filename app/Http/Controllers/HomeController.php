<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
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

        // foreach ($quantity_release as $release) {
        //         $data_quantity[] = $release->id_product;
        //     }
    

        // foreach ($poproduksi as $poproduksinya) {
        //     $release->id_product;
        //     foreach ($variable as $key => $value) {
        //         # code...
        //     }
        // }
        // dd($data_qc);
        //dd($data_quantity);

        return view ('home',[
            'data_filling'=>$data_filling,
            'data_quantity'=>$data_quantity
        ]);
    }
}
