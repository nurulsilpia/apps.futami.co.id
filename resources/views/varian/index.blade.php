@extends('layouts.master')
@section('title', 'Varian Produk')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Data Varian Produk</h1>
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
                                <th>varian</th>
                                <th>Kode</th>
                                <th>Ukuran</th>
                                
                            </tr>
                            @foreach ($data_varian as $no =>  $item)
                            
                                <tr>
                                    <td>{{ $no+1}}</td>
                                    <td>{{ $item->nama_variant}}</td>
                                    <td>{{ $item->kode_variant}}</td>
                                    <td>{{ $item->ukuran}}</td>
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
