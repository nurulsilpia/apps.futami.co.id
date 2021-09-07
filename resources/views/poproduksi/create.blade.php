@extends('layouts.master')
@section('title', 'PO Produksi')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Input User</h1>
        </div>
    </section>
    <div class="section-body">
        <div class="row">
            <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                    <form action="{{ route('poproduksi.store') }}" method="POST">
                        @csrf
                        <div class="card-body">
                            <div class="row">
                               
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>* Varian</label><br>
                                        <select class="form-control" name="id_varian" id="id_varian">
                                            <option value="">--Pilih Varian--</option> 
                                            @foreach ($varian as $item)
                                            <option value="{{$item->id}}">{{$item->kode_variant}} {{$item->ukuran}}ML</option> 
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>* Jumlah PO Produksi</label>
                                        <input type="number"  name="jumlah_po" class="form-control">
                                    </div>
                                </div> <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Catatan</label>
                                        <input type="text" name="note" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="card-footer text-right">
                                        <button class="btn btn-primary mr-1" type="submit">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                
                </form>
            </div>

        </div>
    </div>
    </div>
@endsection

@push('page-scripts')

@endpush
