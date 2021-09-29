@extends('layouts.master')
@section('title','Quantity Release')

@section('content')
    <div class="card mt-3 p-4 shadow-sm">
        <div class="table-responsive">
        <a href="{{ route('QuantityRelease.index') }}" class="btn btn-success">Kembali</a>
        <table class="mt-4 table table-bordered table-md table-hover bg-white text-center">
                <thead>
                <tr>
                    <th>No</th>
                    <th>ID Quantity Release</th>
                    <th>ID Product</th>
                    <th>Reject + Defect Inspeksi</th>
                    <th>Reject + Defect Inspeksi HCI</th>
                    <th>QC Finish Good</th>
                </tr>
                </thead>
                <tbody>

                @foreach($tampil as $no => $data_table)
                        <tr>
                            <th scope="row">{{ $no + 1 }}</th>
                            <td>{{$data_table->id_quantity_release_qc}}</td>
                            <td>{{$data_table->id_product}}</td>
                            <td>{{$data_table->reject_defect_inspeksi}}</td>
                            <td>{{$data_table->reject_defect_inspeksi_hci}}</td>
                            <td>{{$data_table->qc_finish_good}}</td>
                        </tr>
                @endforeach
                
                </tbody>
            </table>
        </div>
    </div>

@endsection

