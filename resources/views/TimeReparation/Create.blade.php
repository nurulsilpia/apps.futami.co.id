@extends('layouts.master')
@section('title','Time Reparation')

@section('content')
<div class="card shadow-sm">
        
        <div class="card-body">
            <form action="{{ route('TimeReparation.store') }}" method="POST" class="mx-3">
                @csrf
                @if(Session::has('error'))
                    <div class="alert alert-danger">{{Session::get('error')}}</div>
                @endif
                <div class="mb-3 col-md-12">
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
                <div class="mb-3 col-md-3">
                    <label class="form-label fw-bold">Start</label>
                    <input type="datetime-local" name="start" class="form-control @error('start') is invalid @enderror" placeholder="Masuk waktu Start" value="{{old('start')}}">
                    @error('start')
                        <div class="alert alert-danger">{{$message="waktu start harus di isi"}}</div>
                    @enderror
                </div>
                <div class="mb-3 col-md-3">
                    <label class="form-label fw-bold">Stop</label>
                    <input type="datetime-local" name="stop" class="form-control  @error('stop') is invalid @enderror" placeholder="Masukan Waktu Stop" value="{{old('stop')}}">
                    @error('stop')
                        <div class="alert alert-danger">{{$message="waktu stop harus di isi"}}</div>
                    @enderror
                    <br>
                    <button type="submit" class="btn btn-primary" onclick="return confirm('Yakin Simpan Data?')">Simpan Data</button>
                </div>
            </form>
        </div>
    </div>
@endsection