@extends('layouts.master')
@section('title','Quantity Production')

@section('content')
<div class="card mt-3 p-4 shadow-sm">
    <div class="table-responsive">
        <a href="{{ url('/quantity-production') }}" class="btn btn-success mb-3">Kembali</a>
        <table border="1" class="table table-striped table-hover text-center">
            <tr>
                <th>No</th>
                <th>ID Product</th>
                <th>Reject + Defect</th>
                <th>Sample</th>
                <th>Reject + Defect HCI</th>
                <th>Production Finish Good</th>
            </tr>
            
            
            @foreach ($tampil as $no => $data_test)

            <tr>
                <td>1</td>
                <td>{{$data_test->id_product}}</td>
                <td>{{$data_test->reject_defect}}</td>
                <td>{{$data_test->sample}}</td>
                <td>{{$data_test->reject_defect_hci}}</td>
                <td>-</td>
            <tr>
            @endforeach
        </table>
    </div>
</div>
@endsection
