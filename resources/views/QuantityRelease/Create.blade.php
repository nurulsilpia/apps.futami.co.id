@extends('layouts.master')
@section('title','Quantity Release')

@section('content')
    <div class="card shadow-sm">
        
        <div class="card-body">
            <form action="{{ route('QuantityRelease.store') }}" method="POST" class="mx-3">
                @csrf
                <div class="mb-3">
                    <label class="form-label fw-bold">ID Product</label>
                    <input type="number" name="id_product" class="form-control @error('id_product') is invalid @enderror" placeholder="Masukan ID Product" value="{{old('id_product')}}">
                    @error('id_product')
                        <div class="alert alert-danger">{{$message="ID Product harus di isi"}}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label fw-bold">Reject + Defect Inspeksi</label>
                    <input type="number" name="reject_defect_inspeksi" class="form-control @error('reject_defect_inspeksi') is invalid @enderror" placeholder="Masukan Reject + Defect Inspeksi" value="{{old('reject_defect_inspeksi')}}">
                    @error('reject_defect_inspeksi')
                        <div class="alert alert-danger">{{$message="Reject + Defect Inspeksi harus di isi"}}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label fw-bold">Reject + Defect Inspeksi HCI</label>
                    <input type="number" name="reject_defect_inspeksi_hci" class="form-control @error('reject_defect_inspeksi_hci') is invalid @enderror" placeholder="Masukan Reject + Defect Inspeksi HCI" value="{{old('reject_defect_inspeksi_hci')}}">
                    @error('reject_defect_inspeksi_hci')
                        <div class="alert alert-danger">{{$message="Reject + Defect Inspeksi HCI harus di isi"}}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label fw-bold">QC Finish Good</label>
                    <input type="number" name="qc_finish_good" class="form-control @error('qc_finish_good') is invalid @enderror" placeholder="Masukan QC Finish Good" value="{{old('qc_finish_good')}}">
                    @error('qc_finish_good')
                        <div class="alert alert-danger">{{$message="QC Finish Good harus di isi"}}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary" onclick="return confirm('Yakin Simpan Data?')">Simpan Data</button>
            </form>
        </div>
    </div>
@endsection