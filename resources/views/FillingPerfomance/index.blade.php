@extends('layouts.master')
@section('title','Filling Perfomance')

@section('content')

<div class="card mt-3 p-4 shadow-sm">
    <div class="table-responsive">
        <a href="{{route('FillingPerfomance.create')}}" class="btn btn-success">Tambah Data</a><br><br>
        <table class="table table-bordered table-sm table-hover  text-center">
        <thead class="bg-info text-white">
            <tr >
                <th width="10px" >no</th>
                <th>varian</th>
                <th>Jumlah Batch</th>
                <th>Jumlah Waktu</th>
                <th>Performance Rate Filling</th>
                <th>Production Order</th>
                <th >Action</th>
            </tr>
        </thead>
            <tbody>
                @foreach ($data_index as $no => $data)
                <tr>
                    <td scope="row">{{ $loop->iteration }}</td> 
                    <td>
                        @foreach ($poproduksi->where('id',$no) as $poproduksinya)
                            @foreach ($varian->where('id',$poproduksinya->id_varian) as $item)
                                {{$item->kode_variant }} {{$item->ukuran}}
                            @endforeach    
                        @endforeach
                    </td>
                    
                    <td>{{$data["total_batch"]}}</td>
                    <td>{{$data["minutes"]}}menit</td>
                    <td>{{$data["pfr"]}}%</td>
                    <td>
                        @foreach ($poproduksi->where('id',$no) as $poproduksinya)
                            {{number_format($poproduksinya->jumlah_po,0,'','.')}} 
                        @endforeach
                    </td>
                    <td>
                        <a class="btn btn-warning" href="{{route('filling_detail',$no)}}">Show</a>  
                    </td>
               <tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection