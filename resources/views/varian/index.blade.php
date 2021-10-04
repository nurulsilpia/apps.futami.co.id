@extends('layouts.master')
@section('title', 'Varian Produk')

@section('content')
    
    <div class="section-body">
        <div class="row">
            <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                    <div class="card-body">
                    <div class="table-responsive">
<<<<<<< HEAD
                        <a href=" {{route('varian.create')}} " class="btn btn-success">Tambah Data</a><br><br>
=======
                        <a href="{{route('varian.create')}}" class="btn btn-success">Tambah Data</a><br><br>
>>>>>>> e8cbe477fd6df2888c32fbcc804dd46c12369821
                        <table  class="table table-bordered table-sm table-hover  text-center">
                            <tr class="bg-info text-white">
                                <th width="10px">NO.</th>
                                <th>varian</th>
                                <th>Kode</th>
                                <th>Ukuran</th>
                                <th width="140px">Action</th>
                            </tr>
                            @foreach ($data_varian as $no =>  $item)
                            
                                <tr>
                                    <td>{{ $no+1}}</td>
                                    <td>{{ $item->nama_variant}}</td>
                                    <td>{{ $item->kode_variant}}</td>
<<<<<<< HEAD
                                    <td>{{ $item->ukuran}} ML</td>
                                    <td>
                                        <form action="{{ route('varian.destroy',$item->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <a class="btn btn-primary" href="{{ route('varian.show',$item->id) }}">Edit</a>
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Hapus Data?')">Delete</button>
                                        </form>
                                    </td>
=======
                                    <td>{{ $item->ukuran}}</td>
                                    <td> 
                                        <form action="{{ route('varian.destroy',$item->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger" type="submit" onclick="return confirm('Hapus Data?')">Delete</button>
                                </form>
                                    </td>
                                    
>>>>>>> e8cbe477fd6df2888c32fbcc804dd46c12369821
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
