@extends('layouts.master')
@section('title', 'Varian Produk')

@section('content')
    
    <div class="section-body">
        <div class="row">
            <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                    <div class="card-body">
                    <div class="table-responsive">
                        <a href="" class="btn btn-success">Tambah Data</a><br><br>
                        <table  class="table table-bordered table-sm table-hover  text-center">
                            <tr class="bg-info text-white">
                                <th width="10px">NO.</th>
                                <th>varian</th>
                                <th>Kode</th>
                                <th>Ukuran</th>
                                <th width="150px">Action</th>
                            </tr>
                            @foreach ($data_varian as $no =>  $item)
                            
                                <tr>
                                    <td>{{ $no+1}}</td>
                                    <td>{{ $item->nama_variant}}</td>
                                    <td>{{ $item->kode_variant}}</td>
                                    <td>{{ $item->ukuran}}</td>
                                    <td> <form action="{{-- route('ketentuanklaim.destroy',$item->id) --}}" method="POST">
                                        <a class="btn btn-primary" href="{{-- route('ketentuanklaim.edit',$item->id) --}}">Edit</a>
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
