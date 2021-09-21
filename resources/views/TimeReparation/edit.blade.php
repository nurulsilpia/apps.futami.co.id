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
                <div class="mb-3 col-md-12">
                    <label class="form-label fw-bold">ID Product</label>
                    <input type="number" name="id_product" class="form-control @error('id_product') is invalid @enderror" placeholder="Masukan ID Product" value="{{ $data_table->id_product }}" value="{{old('id_product')}}">
                    @error('id_product')
                        <div class="alert alert-danger">{{$message="ID Product harus di isi"}}</div>
                    @enderror
                </div>
                <div class="mb-3 col-md-3">
                    <label class="form-label fw-bold">Start</label>
                    <input type="datetime-local" name="start" class="form-control @error('start') is invalid @enderror" placeholder="Masuk waktu Start" value="{{ $data_table->start }}" value="{{old('start')}}">
                    @error('start')
                        <div class="alert alert-danger">{{$message="waktu start harus di isi"}}</div>
                    @enderror
                </div>
                <div class="mb-3 col-md-3">
                    <label class="form-label fw-bold">Stop</label>
                    <input type="datetime-local" name="stop" class="form-control  @error('stop') is invalid @enderror" placeholder="Masukan Waktu Stop" value="{{ $data_table->stop }}" value="{{old('stop')}}">
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