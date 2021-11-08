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
        $filling_Data = DB::table('tbl_filling_perfomance')->get();
        $categories = [];
        
        foreach ($filling_Data as $filling) {
            $categories[] = $filling->counter_filling;
        }

        dd($categories);

        return view('home', [
            'categories'=>$categories
        ]);
    }
}
