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
        $quantity_production = DB::table('tbl_quantity_production')->get();
        $finish_good = collect( DB::table('tbl_filling_perfomance')->get())
        ->mapToGroups(function ($item, $key) {
            return [$item->id_product => $item->counter_filling];
        });
        $data_filling = [];
        $data_qc = [];
        $data_production = [];
        
        // ---------------------
        foreach ($filling_perfomance as $filling) {
            $data_filling[] = $filling->counter_filling;
        }
        
        foreach ($quantity_production as $production) {
            if (isset($finish_good[$production->id_product])) {
                $finish_good[$production->id_product]->sum() ?? 0;
            } else {
                0;
            }
            
            if (isset($finish_good[$production->id_product])) {
                $finish_good_quantity = $finish_good[$production->id_product]->sum();
            } else {
                $finish_good_quantity = 0;
            }                      
            $data_production[] = $production->reject_defect + $production->sample + $production->reject_defect_hci + $finish_good_quantity;
        }
        // dd($data_production);

        foreach ($quantity_release as $release) {
            if (isset($finish_good[$release->id_product])) {
                $finish_good_quantity = $finish_good[$release->id_product]->sum();
            } else {
                $finish_good_quantity = 0;
            }

            $data_qc[] = $finish_good_quantity - $release->reject_defect_inspeksi - $release->reject_defect_inspeksi_hci;
        }
        // dd($data_qc);

        return view ('home',[
            'data_filling'=>$data_filling,
            'data_qc'=>$data_qc,
            'data_production' => $data_production
        ]);
    }
}
