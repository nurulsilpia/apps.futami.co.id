@extends('layouts.master')
@section('title', 'Downtime')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Data Downtime</h1>
        </div>
    </section>
    <div class="section-body">
        <div class="row">
            <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                    <div class="card-body">
                    <div class="table-responsive">
                        <a href="" class="btn btn-success">Tambah Data</a><br><br>
                        <table bor class="table table-bordered table-md ">
                            <tr>
                                <th width="50px">NO.</th>
                                <th>Produksi</th>
                                <th>Jenis Downtime</th>
                                <th >Unit Downtime</th>
                                <th>Root Cause</th>
                                <th >Total Waktu</th>
                                
                            </tr>
                            @foreach ($data_downtime as $no =>  $item)
                            
                                <tr>
                                    <td>{{ $no+1}}</td>
                                    <td>
                                        {{$item->id_produksi}}
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
