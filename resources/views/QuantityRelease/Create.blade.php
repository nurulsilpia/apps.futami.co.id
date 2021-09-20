@extends('layouts.master')
@section('title','Quantity Release')

@section('content')
    <div class="card shadow-sm">
        
        <div class="card-body">
            <form action="{{ route('QuantityRelease.store') }}" method="POST" class="mx-3">
                @csrf
                <div class="mb-3">
                    <label class="form-label fw-bold">ID Product</label>
                    <input type="number" name="id_product" class="form-control @error('id_product') is invalid @enderror" placeholder="Masukan ID Product">
                    @error('id_product')
                        <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label fw-bold">Reject + Defect Inspeksi</label>
                    <input type="number" name="reject_defect_inspeksi" class="form-control @error('reject_defect_inspeksi') is invalid @enderror" placeholder="Masukan Reject + Defect Inspeksi">
                    @error('reject_defect_inspeksi')
                        <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label fw-bold">Reject + Defect Inspeksi HCI</label>
                    <input type="number" name="reject_defect_inspeksi_hci" class="form-control @error('reject_defect_inspeksi_hci') is invalid @enderror" placeholder="Masukan Reject + Defect Inspeksi HCI">
                    @error('reject_defect_inspeksi_hci')
                        <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary" onclick="return confirm('Yakin Simpan Data?')">Simpan Data</button>
            </form>
        </div>
    </div>
@endsection