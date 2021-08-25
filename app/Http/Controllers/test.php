<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//tambahkan class untuk koneksi ke database
use Illuminate\Support\Facades\DB;

class test extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data_test = DB::table('tbl_test')->get();
        return view ('test.home',['data_test'=> $data_test]);
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
