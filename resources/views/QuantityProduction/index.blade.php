@extends('layouts.master')
@section('title','Quantity Production')

@section('content')
    <div class="card mt-3 p-4 shadow-sm">
        <div class="table-responsive">
            <a href="{{ route('QuantityProduction.create') }}" class="btn btn-success">Tambah Data</a>
            <table align="center" border="1" class="mt-4 table table-striped table-hover bg-white text-center" id="tableAll">
                <thead>
                <tr>
                    <th>No</th>
                    <th>ID Product</th>
                    <th>Reject + Defect</th>
                    <th>Sample</th>
                    <th>Reject + Defect HCI</th>
                    <th>Production Finish Good</th>
                    <th colspan="3">Aksi</th>
                </tr>
                </thead>
                <tbody>

                    @foreach($data_quantityProduction as $no => $data_quantityProduction)
                        <tr>
                            <th scope="row">{{ $no + 1 }}</th>
                            <td>{{ $data_quantityProduction->id_product }}</td>
                            <td>{{ $data_quantityProduction->reject_defect }}</td>
                            <td>{{ $data_quantityProduction->sample }}</td>
                            <td>{{ $data_quantityProduction->reject_defect_hci }}</td>
                            <td>-</td>
                            <td>
                                <a class="btn btn-dark" href="{{ route('QuantityProduction.show',$data_quantityProduction->id_quantity_production) }}">Show</a> 
                            </td>
                            <td>
                                <a class="btn btn-primary" href="{{route('QuantityProduction.edit',$data_quantityProduction->id_quantity_production)}}">Edit</a> 
                            </td>
                            <td>
                                <form action="{{ route('QuantityProduction.destroy',$data_quantityProduction->id_quantity_production) }}" method="POST">
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