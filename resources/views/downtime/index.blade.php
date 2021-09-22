@extends('layouts.master')
@section('title', 'Downtime')

@section('content')
    <div class="section-body">
        <div class="row">
            <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                    <div class="card-body">
                    <div class="table-responsive">
                    <a href="{{route('downtime.create')}}" class="btn btn-success">Tambah Data</a><br><br>
                        <table class="table table-bordered table-sm table-hover  text-center">
                            <tr class="bg-info text-white">
                                <th width="10px">NO.</th>
                                <th>Produksi</th>
                                <th>Jenis Downtime</th>
                                <th>Unit Downtime</th>
                                <th>Root Cause</th>
                                <th>Total Waktu</th>
                                <th>Mulai</th>
                                <th>Selesai</th>
                                <th width="150px">Action</th>
                            </tr>
                            @foreach ($data_downtime as $no =>  $item ) 
                            
                                <tr>
                                    <td>{{ $no+1}}</td>
                                    <td>
                                        @foreach ($poproduksi->where('id',$item->id_produksi) as $poproduksinya)
                                            @foreach ($varian->where('id',$poproduksinya->id_varian) as $data_variannya)
                                                <a href="{{route('poproduksi.edit',$item->id_produksi)}}">{{$data_variannya->kode_variant}} {{$data_variannya->ukuran}}</a>
                                            @endforeach
                                        @endforeach
                                    </td>
                                    <td>@foreach ($data_jenis_downtime->where('id',$item->id_jenis_downtime) as $item_jenis_downtime)
                                        {{$item_jenis_downtime->nama_jenis_downtime}}
                                    @endforeach
                                        </td>
                                    <td>@foreach ($data_unit_downtime->where('id',$item->id_unit_downtime) as $item_unit_downtime)
                                        {{$item_unit_downtime->nama_unit_downtime}}
                                    @endforeach</td>
                                    <td>{{$item->root_cause}}</td>
                                    <td>
                                        {{ \Carbon\Carbon::parse( $item->mulai_downtime )->diffInMinutes( $item->selesai_downtime ) }} Menit
                                    </td>
                                    <td>{{$item->mulai_downtime}}</td>
                                    <td>{{$item->selesai_downtime}}</td>
                                    <td> <form action="{{ route('downtime.destroy',$item->id) }}" method="POST">
                                        <a class="btn btn-primary" href="{{ route('downtime.edit',$item->id) }}">Edit</a>
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button></td>
                                </tr>
                                @endforeach
                        </table>
                    </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
@endsection

@push('page-script')

@endpush
