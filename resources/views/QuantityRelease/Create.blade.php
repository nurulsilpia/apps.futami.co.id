@extends('layouts.master')
@section('title','Quantity Release')

@section('content')
    <div class="card shadow-sm">
        
        <div class="card-body">
            <form action="{{ route('QuantityRelease.store') }}" method="POST" class="mx-3">
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
                <button type="submit" class="btn btn-primary" onclick="return confirm('Yakin Simpan Data?')">Simpan Data</button>
            </form>
        </div>
    </div>
@endsection