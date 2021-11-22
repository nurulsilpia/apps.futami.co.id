@extends('layouts.master')
@section('title','Quantity Release')

@section('content')

    @foreach ($edit as $data_table)
        <form action="{{route('QuantityRelease.update',$data_table->id_quantity_release_qc)}}" method="POST">
            @method('PUT')
            <div class="card shadow-sm">
                <div class="card-header fs-5 bg-light text-uppercase">
                    <b>Edit Data</b> 
                </div>
            <div class="card-body">
                @csrf
                <div class="mb-3">
                        <div class="form-group">
                            <label class="text-uppercase">Jenis Downtime</label>
                            <select class="form-control" name="id_product" required>
                                @foreach ($varian->where('id', $data_table->id_product) as $variannya)
                                    <option value="{{ $variannya->id }}">{{ $variannya->kode_variant }} {{ $variannya->ukuran }}ML</option> 
                                @endforeach
                                <option disabled>--Silahkan ganti jenis downtime--</option> 
                                @foreach ($varian as $variannya)
                                    <option value="{{ $variannya->id }}">{{ $variannya->kode_variant }} {{ $variannya->ukuran }}ML</option> 
                                @endforeach
                            </select>
                        </div>
                </div>
                <div class="mb-3">
                    <label class="form-label fw-bold">Reject + Defect Inspeksi</label>
                    <input type="number" name="reject_defect_inspeksi" class="form-control @error('reject_defect_inspeksi') is invalid @enderror" placeholder="Masukan Reject + Defect Inspeksi" value="{{ $data_table->reject_defect_inspeksi }}" value="{{old('reject_defect_inspeksi')}}">
                    @error('reject_defect_inspeksi')
                        <div class="alert alert-danger">{{$message="Reject + Defect Inspeksi harus di isi"}}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label fw-bold">Reject + Defect Inspeksi HCI</label>
                    <input type="number" name="reject_defect_inspeksi_hci" class="form-control @error('reject_defect_inspeksi_hci') is invalid @enderror" placeholder="Masukan Reject + Defect Inspeksi HCI" value="{{ $data_table->reject_defect_inspeksi_hci }}" value="{{old('reject_defect_inspeksi_hci')}}">
                    @error('reject_defect_inspeksi_hci')
                        <div class="alert alert-danger">{{$message="Reject + Defect Inspeksi HCI harus di isi"}}</div>
                    @enderror
                </div>
                    <button type="submit" class="btn btn-primary" onclick="return confirm('Yakin Simpan Data?')">Simpan Data</button>
                </div>
            </div>
        </form>
    @endforeach

@endsection