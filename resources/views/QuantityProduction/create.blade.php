@extends('layouts.master')
@section('title','Input Quantity Production')

@section('content')
    <div class="card shadow-sm">
        
        <div class="card-body">
            <form action="{{ route('QuantityProduction.store') }}" method="POST" class="mx-3">
                @csrf
                <div class="mb-3">
                    <label class="form-label fw-bold">ID Product</label>
                    <input type="number" name="id_product" class="form-control" placeholder="Masukan ID Product" required>
                </div>
                <div class="mb-3">
                    <label class="form-label fw-bold">Reject + Defect</label>
                    <input type="number" name="reject_defect" class="form-control" placeholder="Masukan Jumlah Reject + Defect" required>
                </div>
                <div class="mb-3">
                    <label class="form-label fw-bold">Sample</label>
                    <input type="number" name="sample" class="form-control" placeholder="Masukan Jumlah Sample" required>
                </div>
                <div class="mb-3">
                    <label class="form-label fw-bold">Reject + Defect HCI</label>
                    <input type="number" name="reject_defect_hci" class="form-control" placeholder="Masukan Jumlah Reject + Defect HCI" required>
                </div>
                <button type="submit" class="btn btn-primary">Simpan Data</button>
            </form>
        </div>
    </div>
@endsection