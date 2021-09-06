@extends('layouts.master')
@section('title','Quantity Production')

@section('content')
    <div class="card shadow-sm">
        <div class="card-header fs-5 bg-light text-uppercase">
            <b>Tambah Data</b> 
        </div>
        <div class="card-body">
            <form action="{{ route('quantity-production.store') }}" method="POST" class="mx-3">
                @csrf
                <div class="mb-3">
                    <label class="form-label fw-bold">ID Product</label>
                    <input type="number" name="id_product" class="form-control" placeholder="Masukan ID Product" required>
                </div>
                <div class="mb-3">
                    <label class="form-label fw-bold">Reject + Defect</label>
                    <input type="number" name="reject_defect" class="form-control" placeholder="Masukan Jumlah Data" required>
                </div>
                <div class="mb-3">
                    <label class="form-label fw-bold">Sample</label>
                    <input type="number" name="sample" class="form-control" placeholder="Masukan Jumlah Sample" required>
                </div>
                <div class="mb-3">
                    <label class="form-label fw-bold">Reject + Defect HCI</label>
                    <input type="number" name="reject_defect_hci" class="form-control" placeholder="Masukan Jumlah Data" required>
                </div>
                <div class="mb-3">
                    <label class="form-label fw-bold">Production Finish Good</label>
                    <input type="number" name="" class="form-control" placeholder="-" value="" disabled readonly>
                </div>
                <button type="submit" class="btn btn-primary" onclick="return confirm('Simpan Data?')">Simpan Data</button>
            </form>
        </div>
    </div>
@endsection