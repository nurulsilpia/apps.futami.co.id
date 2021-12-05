@extends('layouts.master')
@section('title','Time Reparation')

@section('content')
    <div class="card mt-3 p-4 shadow-sm">
        <div class="table-responsive">
        <a href="{{ route('TimeReparation.index') }}" class="btn btn-success">Kembali</a>
        <table class="mt-4 table table-bordered table-md table-hover bg-white text-center">
                <thead>
                <tr>
                    <th>No</th>
                    <th>Variant</th>
                    <th>Start</th>
                    <th>Stop</th>
                    <th>Total Waktu (menit)</th>
                </thead>
                <tbody>

                @foreach($tampil as $no => $data_table)
                        <tr>
                            <th scope="row">{{ $no + 1 }}</th>
                            <td> @foreach ($poproduksi->where('id',$data_table->id_product) as $poproduksinya)
                                    @foreach ($data_varian->where('id',$poproduksinya->id_varian) as $data_variannya)
                                        <a href="{{route('poproduksi.show',$data_table->id_product)}}">{{$data_variannya->kode_variant}} {{$data_variannya->ukuran}}</a>
                                    @endforeach
                                @endforeach</td>
                            <td>{{$data_table->start}}</td>
                            <td>{{$data_table->stop}}</td>
                            <td>{{ \Carbon\Carbon::parse($data_table->start)->diffinMinutes($data_table->stop) }}</td>
                        </tr>
                @endforeach
                
                </tbody>
            </table>
        </div>
    </div>

@endsection


