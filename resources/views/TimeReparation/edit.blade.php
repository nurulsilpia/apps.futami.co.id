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
                        <div class="mb-3">
                            <label class="form-label fw-bold">ID Product</label>
                            <input type="number" name="id_product" class="form-control" placeholder="Masukan ID Product" value="{{ $data_table->id_product }}" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-bold">Start</label>
                            <input type="datetime-local" name="start" class="form-control" placeholder="Masukan Waktu Start" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-bold">Stop</label>
                            <input type="datetime-local" name="stop" class="form-control" placeholder="Masukan Waktu Stop" required>
                        </div>
                        <button type="submit" class="btn btn-primary" onclick="return confirm('Yakin Simpan Data?')">Simpan Data</button>
                </div>
            </div>
        </form>
    @endforeach

@endsection