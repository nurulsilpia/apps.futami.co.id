@extends('layouts.master')
@section('title','Time Reparation')

@section('content')

    @foreach ($edit as $no => $data_table)
        <form action="{{route('TimeReparation.update',$data_table->id_time_reparation)}}" method="POST">
            @method('PUT')
            <div class="card shadow-sm">
                <div class="card-header fs-5 bg-light text-uppercase">
                    <b>Edit Data</b> 
                </div>
            <div class="card-body">
            @csrf
                <div class="mb-3 col-md-3">
                    <div class="form-group">
                        <label class="text-uppercase">Varian</label>
                        <select class="form-control" name="id_product" required>
                            @foreach ($varian->where('id', $data_table->id_product) as $variannya)
                                <option value="{{ $variannya->id }}">{{ $variannya->kode_variant }} {{ $variannya->ukuran }}ML</option> 
                            @endforeach
                            <option disabled>--Silahkan ganti jenis downtime--</option> 
                            @foreach ($varian as $variannya)
                                <option value="{{ $variannya->id }}">{{ $variannya->kode_variant }} {{ $variannya->ukuran }}ML</option> 
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="mb-3 col-md-3">
                    <label class="form-label fw-bold">Start</label>
                    <input type="datetime-local" name="start" class="form-control @error('start') is invalid @enderror" placeholder="Masuk waktu Start" value="{{ date('Y-m-d\TH:i', strtotime( $data_table->start)) }}" value="{{old('start')}}">
                    @error('start')
                        <div class="alert alert-danger">{{$message="waktu start harus di isi"}}</div>
                    @enderror
                </div>
                <div class="mb-3 col-md-3">
                    <label class="form-label fw-bold">Stop</label>
                    <input type="datetime-local" name="stop" class="form-control  @error('stop') is invalid @enderror" placeholder="Masukan Waktu Stop" value="{{ date('Y-m-d\TH:i', strtotime( $data_table->stop)) }}" value="{{old('stop')}}">
                    @error('stop')
                        <div class="alert alert-danger">{{$message="waktu stop harus di isi"}}</div>
                    @enderror
                    <br>
                    <button type="submit" class="btn btn-primary" onclick="return confirm('Yakin Simpan Data?')">Simpan Data</button>
                </div>
            </div>
        </form>
    @endforeach

@endsection