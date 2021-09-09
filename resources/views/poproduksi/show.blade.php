@extends('layouts.master')
@section('title', 'PO Produksi')
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>PO Produksi</h1>
        </div>
    </section>
    <div class="section-body">
        <div class="row">
            <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                    @foreach ($poproduksi as $item)
                        
                    <form action="{{ route('poproduksi.update',$item->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Nama Varian</label>
                                    <select class="form-control"  name="id_varian" >
                                        @foreach ($varian->where('id',$item->id_varian) as $variannya)
                                        <option value="{{$variannya->id}}">{{$variannya->nama_variant}} {{$variannya->ukuran}}ML</option>
                                        @endforeach
                                        <option value="">----Silahkan ganti untuk mengganti varian----</option>
                                        @foreach ($varian as $variannya)
                                        <option value="{{$variannya->id}}">{{$variannya->nama_variant}} {{$variannya->ukuran}}ML</option>
                                        @endforeach
                                    </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Jumlah PO</label>
                                        <input value="{{$item->jumlah_po}}" type="number" name="jumlah_po" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Status Produksi</label>
                                        <select class="form-control"  name="status_po" >
                                            <option value="{{$item->status_po}}">{{$item->status_po}}</option>
                                            <option value="">----Silahkan ganti untuk mengganti status----</option>
                                            <option value="PRODUKSI">PRODUKSI</option>
                                            <option value="TRIAL">TRIAL</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Catatan</label>
                                        <input type="text" value="{{$item->note}} " name="note" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="card-footer text-right">
                                        <button class="btn btn-info mr-1" type="submit">Update</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    @endforeach
                </div>
                
            </div>
        </div>
    </div>
@endsection

@push('page-script')

@endpush
