@extends('layouts.master')
@section('title','Time Reparation')

@section('content')
    <div class="card shadow-sm">
        
        <div class="card-body">
            <form action="{{ route('TimeReparation.store') }}" method="POST" class="mx-3">
                @csrf
                <div class="mb-3 col-md-12">
                    <label class="form-label fw-bold">ID Product</label>
                    <input type="number" name="id_product" class="form-control" placeholder="Masukan ID Product" required>
                </div>
                <div class="mb-3 col-md-3">
                    <label class="form-label fw-bold">Start</label>
                    <input type="datetime-local" name="start" class="form-control" placeholder="Masuk waktu Start" required>
                </div>
                <div class="mb-3 col-md-3">
                    <label class="form-label fw-bold">Stop</label>
                    <input type="datetime-local" name="stop" class="form-control" placeholder="Masukan Waktu Stop" required><br>
                    <button type="submit" class="btn btn-primary" onclick="return confirm('Yakin Simpan Data?')">Simpan Data</button>
                </div>
            </form>
        </div>
    </div>
@endsection