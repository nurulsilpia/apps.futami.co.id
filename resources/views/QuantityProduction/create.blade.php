@extends('layouts.master')
@section('title','Input Quantity Production')

@section('content')
    <div class="card shadow-sm">
        
        <div class="card-body">
            <form action="{{ route('QuantityProduction.store') }}" method="POST" class="mx-3">
                @csrf
                <div class="mb-3">
                    <div class="form-group">
                        <label>Varian</label><br>
                            <select class="form-control" name="id_product" id="id_product" required>
                                <option value="" disabled selected>--Pilih Varian--</option> 
                                    @foreach ($varian as $item)
                                        <option value="{{$item->id}}">{{$item->kode_variant}} {{$item->ukuran}}ML</option> 
                                    @endforeach
                            </select>
                    </div>
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