@extends('layouts.master')
@section('title','Quantity Release')

@section('content')
    <div class="card shadow-sm">
        <div class="card-header fs-5 bg-light">
            <b>Tambah Data</b> 
        </div>
        <div class="card-body">
            <form action="{{ route('QuantityRelease.store') }}" method="POST" class="mx-3">
                @csrf
                <div class="mb-3">
                    <label class="form-label fw-bold">ID Product</label>
                    <input type="number" name="id_product" class="form-control" placeholder="Masukan ID Product" required>
                </div>
                <div class="mb-3">
                    <label class="form-label fw-bold">Reject + Defect Inspeksi</label>
                    <input type="number" name="reject_defect_inspeksi" class="form-control" placeholder="Masukan Reject + Defect Inspeksi" required>
                </div>
                <div class="mb-3">
                    <label class="form-label fw-bold">Reject + Defect Inspeksi HCI</label>
                    <input type="number" name="reject_defect_inspeksi_hci" class="form-control" placeholder="Masukan Reject + Defect Inspeksi HCI" required>
                </div>
                <button type="submit" class="btn btn-primary" onclick="return confirm('Yakin Simpan Data?')">Simpan Data</button>
            </form>
        </div>
    </div>
@endsection