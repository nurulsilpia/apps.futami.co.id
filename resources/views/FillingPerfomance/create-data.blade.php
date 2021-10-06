@extends('layouts.master')
@section('title','Tambah data Filling Perfomance')

@section('content')

        <div class="card p-3">
            <form action="{{route('FillingPerfomance.store')}}" method="POST" class="mx-3">
                @csrf
                <div class="mb-3">
                    <label class="form-label fw-bold">ID Product</label>
                    <input type="number" name="id_product" class="form-control @error('id_product') is invalid @enderror" placeholder="Masukan ID Product" value="{{old('id_product')}}">
                    @error('id_product')
                        <div class="alert alert-danger">{{$message="ID Product harus di isi"}}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label fw-bold">No Batch</label>
                    <input type="text" name="no_batch" class="form-control @error('no_batch') is invalid @enderror" placeholder="Masukan No Batch" value="{{old('no_batch')}}">
                    @error('no_batch')
                        <div class="alert alert-danger">{{$message="No Batch harus di isi"}}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label fw-bold">Start Filling</label>
                    <input type="datetime-local" name="start_filling" class="form-control @error('start_filling') is invalid @enderror" placeholder="Masukan Start Filling" value="{{old('start_filling')}}">
                    @error('start_filling')
                        <div class="alert alert-danger">{{$message="Start Filiing harus di isi"}}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label fw-bold">Stop Filling</label>
                    <input type="datetime-local" name="stop_filling" class="form-control @error('stop_filling') is invalid @enderror" placeholder="Masukan Stop Filling" value="{{old('stop_filling')}}">
                    @error('stop_filling')
                        <div class="alert alert-danger">{{$message="Stop Filling harus di isi"}}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label fw-bold">Counter Filling</label>
                    <input type="number" name="counter_filling" class="form-control @error('counter_filling') is invalid @enderror" placeholder="Masukan Counter Filling" value="{{old('counter_filling')}}">
                    @error('counter_filling')
                        <div class="alert alert-danger">{{$message="Counter Filling harus di isi"}}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary" >Simpan Data</button>
            </form>
        </div>
    
@endsection
