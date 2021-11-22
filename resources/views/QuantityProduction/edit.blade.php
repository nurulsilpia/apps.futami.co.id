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
                        <div class="form-group">
                            <label class="text-uppercase">Jenis Downtime</label>
                            <select class="form-control" name="id_product" required>
                                @foreach ($varian->where('id', $data_test->id_product) as $variannya)
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
                            <label class="form-label fw-bold">Reject + Defect</label>
                            <input type="number" name="reject_defect" class="form-control" placeholder="Masukan Jumlah Data" value="{{ $data_test->reject_defect }}" value="{{ old('reject_defect') }}">
                            @error('reject_defect')
                                <div class="alert alert-danger">{{$message="Reject + Defect harus di isi"}}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-bold">Sample</label>
                            <input type="number" name="sample" class="form-control" placeholder="Masukan Jumlah Sample" value="{{ $data_test->sample }}" value="{{ old('sample') }}">
                            @error('sample')
                                <div class="alert alert-danger">{{$message="Sample harus di isi"}}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-bold">Reject + Defect HCI</label>
                            <input type="number" name="reject_defect_hci" class="form-control" placeholder="Masukan Jumlah Data" value="{{ $data_test->reject_defect_hci }}" value="{{ old('reject_defect_hci') }}">
                            @error('reject_defect_hci')
                                <div class="alert alert-danger">{{$message="Reject + Defect HCI harus di isi"}}</div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary" onclick="return confirm('Simpan Data?')">Simpan Data</button>
                </div>
            </div>
        </form>
    @endforeach

@endsection

