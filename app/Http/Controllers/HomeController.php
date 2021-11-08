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
        $data_test = DB::table('tbl_test')->get();
        // grafik
        $filling_perfomance = DB::table('tbl_filling_perfomance')->get();
        $quantity_release = DB::table('tbl_quantity_release_qc')->get();
        $data_filling = [];
        $data_qc = [];

        foreach ($filling_perfomance as $filling) {
            $data_filling[] = $filling->counter_filling;
            $data_qc = $filling;
        }

        // dd(json_encode($categories));
        return view ('home',[
            'data_test'=> $data_test,
            'data_filling'=>$data_filling
        ]);
    }
}
