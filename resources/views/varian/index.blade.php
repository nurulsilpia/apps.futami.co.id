@extends('layouts.master')
@section('title', 'Varian Produk')

@section('content')
    
    <div class="section-body">
        <div class="row">
            <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                    <div class="card-body">
                    <div class="table-responsive">
                        <a href="{{route('varian.create')}}" class="btn btn-success">Tambah Data</a><br><br>
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
                                    <td>{{ $item->ukuran}} ML</td>
                                    <td>
                                        <form action="{{ route('varian.destroy',$item->id) }}" method="POST">
                                    @method('DELETE')
                                    <button class="btn btn-danger" type="submit" onclick="return confirm('Hapus Data?')">Delete</button>
                                </form>
                                    </td>
                                    
                                </tr>
                                @endforeach
                        </table>
                    </div>

                </div>

            </div>
        </div>
    </div>
@endsection

@push('page-script')

@endpush
