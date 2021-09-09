@extends('layouts.master')
@section('title', 'PO Produksi')

@section('content')

    <div class="section-body">
        <div class="row">
            <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                    <div class="card-body">
                    <div class="table-responsive">
                    <a href="{{route('poproduksi.create')}}" class="btn btn-success">Tambah Data</a><br><br>
                        <table  class="table table-bordered table-sm table-hover  text-center">
                            <tr  class="bg-info text-white">
                                <th width="20px">NO.</th>
                                <th width="180px">Varian</th>
                                <th width="50px">Ukuran</th>
                                <th width="120px">Jumlah PO</th>
                                <th width="70px">Standar BPH</th>
                                <th>Status</th>
                                <th width="100px">Tgl Dibuat</th>
                                <th>Catatan</th>
                                <th width="150px">Action</th>
                            </tr>
                            @foreach ($poproduksi as $no =>  $item)
                            
                                <tr>
                                    <td>{{ $no+1}}</td>
                                    @foreach ($varian->where('id',$item->id_varian) as $variannya)
                                        <td>{{$variannya->nama_variant}}</td>
                                        <td>{{$variannya->ukuran}}</td>
                                    @endforeach
                                    <td>{{ number_format($item->jumlah_po,0,'','.')}} Botol</td>
                                    <td>{{ number_format($item->standar_bph,0,'','.')}} Botol</td>
                                    <td>{{ $item->status_po}}</td>
                                    <td>{{ $item->tanggal_dibuat}}</td>
                                    <td>{{ $item->note}}</td>
                                    <td> <form action="{{ route('poproduksi.destroy',$item->id) }}" method="POST">
                                        <a class="btn btn-primary" href="{{route('poproduksi.show',$item->id)}}">Show</a>
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Hapus Data?')">Delete</button>
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
