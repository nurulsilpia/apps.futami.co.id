@extends('layouts.master')
@section('title','Quantity Release')

@section('content')
    <div class="card mt-3 p-4 shadow-sm">
        <div class="table-responsive">
            <a href="{{ route('QuantityRelease.create') }}" class="btn btn-success">Tambah Data</a>
            <table class="mt-4 table table-bordered table-md table-hover bg-white text-center">
                <thead>
                <tr>
                    <th>No</th>
                    <th>ID Quantity Release</th>
                    <th>ID Product</th>
                    <th>Reject + Defect Inspeksi</th>
                    <th>Reject + Defect Inspeksi HCI</th>
                    <th colspan="4">Aksi</th>
                </tr>
                </thead>
                <tbody>

                @foreach($data_table as $no => $data_table)
                        <tr>
                            <th scope="row">{{ $no + 1 }}</th>
                            <td>{{$data_table->id_quantity_release_qc}}</td>
                            <td>{{$data_table->id_product}}</td>
                            <td>{{$data_table->reject_defect_inspeksi}}</td>
                            <td>{{$data_table->reject_defect_inspeksi_hci}}</td>
                            <td><a href="{{route('QuantityRelease.show',$data_table->id_quantity_release_qc)}}" class="btn btn-info">Show</a></td>
                            <td><a href="{{route('QuantityRelease.edit',$data_table->id_quantity_release_qc)}}"  class="btn btn-warning">Edit</a></td>  
                            <td>
                                <form action="{{ route('QuantityRelease.destroy',$data_table->id_quantity_release_qc) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger" type="submit" onclick="return confirm('Hapus Data?')">Delete</button>
                                </form>
                            </td>    
                        </tr>
                @endforeach
                
                </tbody>
            </table>
        </div>
    </div>

@endsection