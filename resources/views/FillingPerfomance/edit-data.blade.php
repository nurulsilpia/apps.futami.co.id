@extends('layouts.master')
@section('title','Filling Perfomance')

@section('content')

@foreach ($edit as $no => $data_index)
        <form action="{{route('FillingPerfomance.update',$data_index->id_filling_perfomance)}}" method="POST">
            @method('PUT')
            <div class="card shadow-sm">
                <div class="card-header fs-5 bg-light">
                    <b>Edit Data</b> 
                </div>
                <div class="card-body">
                        @csrf
                        <div class="mb-3">
                        <div class="form-group">
                            <label class="text-uppercase">Jenis Downtime</label>
                            <select class="form-control" name="id_product" required>
                                @foreach ($varian->where('id', $data_index->id_product) as $variannya)
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
                        <label class="form-label fw-bold">No Batch</label>
                        <input type="text" name="no_batch" class="form-control" value="{{$data_index->no_batch}}" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold">Start Filling</label>
                        <input type="datetime-local" name="start_filling" class="form-control" value="{{ date('Y-m-d\TH:i', strtotime($data_index->start_filling)) }}" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold">Stop Filling</label>
                        <input type="datetime-local" name="stop_filling" class="form-control" value="{{ date('Y-m-d\TH:i', strtotime($data_index->stop_filling)) }}" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold">Counter Filling</label>
                        <input type="number" name="counter_filling" class="form-control" value="{{$data_index->counter_filling}}" required>
                    </div>
                            <button type="submit" class="btn btn-primary">Simpan Data</button>
                    </div>
                </div>
        </form>
    @endforeach

@endsection