@extends('layouts.master')
@section('title','Quantity Production')

@section('content')

    @foreach ($edit as $no => $data_test)
        <form action="{{route('QuantityProduction.update',$data_test->id_quantity_production)}}" method="POST">
            @method('PUT')
            <div class="card shadow-sm">
                <div class="card-header fs-5 bg-light text-uppercase">
                    <b>Edit Data</b> 
                </div>
                <div class="card-body">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label fw-bold">ID Product</label>
                            <input type="number" name="id_product" class="form-control" placeholder="Masukan ID Product" value="{{ $data_test->id_product }}" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-bold">Reject + Defect</label>
                            <input type="number" name="reject_defect" class="form-control" placeholder="Masukan Jumlah Data" value="{{ $data_test->reject_defect }}" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-bold">Sample</label>
                            <input type="number" name="sample" class="form-control" placeholder="Masukan Jumlah Sample" value="{{ $data_test->sample }}" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-bold">Reject + Defect HCI</label>
                            <input type="number" name="reject_defect_hci" class="form-control" placeholder="Masukan Jumlah Data" value="{{ $data_test->reject_defect_hci }}" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-bold">Production Finish Good</label>
                            <input type="number" name="" class="form-control" placeholder="-" value="" disabled readonly>
                        </div>
                        <button type="submit" class="btn btn-primary" onclick="return confirm('Simpan Data?')">Simpan Data</button>
                </div>
            </div>
        </form>
    @endforeach

@endsection

