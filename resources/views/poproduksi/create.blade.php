@extends('layouts.master')
@section('title', 'Input PO Produksi')

@section('content')

    <div class="section-body">
        <div class="row">
            <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                    <form action="{{ route('poproduksi.store') }}" method="POST">
                        @csrf
                        <div class="card-body">
                            <div class="row">
                               
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>* Varian</label><br>
                                        <select class="form-control" name="id_varian" id="id_varian" required>
                                            <option value="">--Pilih Varian--</option> 
                                            @foreach ($varian as $item)
                                            <option value="{{$item->id}}">{{$item->kode_variant}} {{$item->ukuran}}ML</option> 
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>* Status Produksi</label><br>
                                        <select class="form-control" name="status" id="status" required>
                                            <option value="">--Pilih Status--</option> 
                                            <option value="PRODUKSI">PRODUKSI</option> 
                                            <option value="TRIAL">TRIAL</option> 
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>* Jumlah PO Produksi</label>
                                        <input type="number"  name="jumlah_po" class="form-control" required>
                                    </div>
                                </div> 
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>* Standar BPH</label>
                                        <input type="number" value="22800"  name="standar_bph" class="form-control" required>
                                    </div>
                                </div>  
                                <div class="mb-3 col-md-3">
                                    <label class="form-label fw-bold">Tgl dibuat</label>
                                    <input type="datetime-local" name="tgl_dibuat" class="form-control" required>
                                </div>
                                <div class="mb-3 col-md-3">
                                    <label class="form-label fw-bold">Start Produksi</label>
                                    <input type="datetime-local" name="mulai_produksi" class="form-control" required>
                                </div>
                                <div class="mb-3 col-md-3">
                                    <label class="form-label fw-bold">Selesai Produksi</label>
                                    <input type="datetime-local" name="selesai_produksi" class="form-control" required>
                                </div>
                                <div class="col-md-12">
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
