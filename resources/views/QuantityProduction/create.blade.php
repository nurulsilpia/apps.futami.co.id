@extends('layouts.master')
@section('title','Input Quantity Production')

@section('content')
    <div class="card shadow-sm">
        
        <div class="card-body">
            <form action="{{ route('QuantityProduction.store') }}" method="POST" class="mx-3">
                @csrf
                <div class="mb-3">
                    <label class="form-label fw-bold">ID Product</label>
                    <input type="number" name="id_product" class="form-control" placeholder="Masukan ID Product" value="{{old('id_product')}}">
                    @error('id_product')
                        <div class="alert alert-danger">{{$message="ID Product harus di isi"}}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label fw-bold">Reject + Defect</label>
                    <input type="number" name="reject_defect" class="form-control" placeholder="Masukan Jumlah Reject + Defect" value="{{old('reject_defect')}}">
                    @error('reject_defect')
                        <div class="alert alert-danger">{{$message="Reject + Defect harus di isi"}}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label fw-bold">Sample</label>
                    <input type="number" name="sample" class="form-control" placeholder="Masukan Jumlah Sample" value="{{old('sample')}}">
                    @error('sample')
                        <div class="alert alert-danger">{{$message="Sample harus di isi"}}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label fw-bold">Reject + Defect HCI</label>
                    <input type="number" name="reject_defect_hci" class="form-control" placeholder="Masukan Jumlah Reject + Defect HCI" value="{{old('reject_defect_hci')}}">
                    @error('reject_defect_hci')
                        <div class="alert alert-danger">{{$message="Reject + Defect HCI harus di isi"}}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Simpan Data</button>
            </form>
        </div>
    </div>
@endsection