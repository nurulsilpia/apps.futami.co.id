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
                <th>id produk</th>
                <th>no batch</th>
                <th width="100px">start filling</th>
                <th width="100px">stop filling</th>
                <th>time</th>
                <th>counter filling</th>
                <th>Standar BPH</th>
                <th width="100px">Standar Time Production</th>
                <th width="100px">Perfomance Rate filling</th>
                <th colspan="2">Action</th>
            </tr>
        </thead>
            <tbody>
                @foreach ($data_index as $no => $data_index)
                <tr>
                    <th scope="row">{{ $no + 1 }}</th>
                    <td>{{$data_index->id_product}}</td>
                    <td>{{$data_index->no_batch}}</td>
                    <td>{{$data_index->start_filling}}</td>
                    <td>{{$data_index->stop_filling}}</td>
                    <td>{{ $time = \Carbon\Carbon::parse($data_index->start_filling)->diffinMinutes($data_index->stop_filling)  }}

                    </td>
                    <td>{{$data_index->counter_filling}}</td>
                    <td>{{number_format(22800,0,'','.')}}</td>
                    <td>{{number_format($data_index->counter_filling/(22800/60),0,'','.')}}</td>
                    <td>{{number_format((($data_index->counter_filling / ($time/60))/22800)*100,2,',','')}}% </td>
                    
                    <td>
                        <a class="btn btn-warning" href="{{route('FillingPerfomance.edit',$data_index->id_filling_perfomance)}}">Show</a> 
                    </td>
                    <td>
                     <form action="{{ route('FillingPerfomance.destroy',$data_index->id_filling_perfomance) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger" type="submit" onclick="return confirm('Hapus Data?')">Delete</button>
                    </form>
                    </td>
               <tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection