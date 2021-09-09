@extends('layouts.master')
@section('title','Tambah data Filling Perfomance')

@section('content')

        <div class="card-body">
            <form action="{{route('FillingPerfomance.store')}}" method="POST" class="mx-3">
                @csrf
                <div class="mb-3">
                    <label class="form-label fw-bold">ID Product</label>
                    <input type="number" name="id_product" class="form-control" placeholder="Masukan ID Product" required>
                </div>
                <div class="mb-3">
                    <label class="form-label fw-bold">No Batch</label>
                    <input type="text" name="no_batch" class="form-control" placeholder="Masukan No Batch" required>
                </div>
                <div class="mb-3">
                    <label class="form-label fw-bold">Start Filling</label>
                    <input type="datetime-local" name="start_filling" class="form-control" placeholder="Masukan Start Filling" required>
                </div>
                <div class="mb-3">
                    <label class="form-label fw-bold">Stop Filling</label>
                    <input type="datetime-local" name="stop_filling" class="form-control" placeholder="Masukan Stop Filling" required>
                </div>
                <div class="mb-3">
                    <label class="form-label fw-bold">Counter Filling</label>
                    <input type="number" name="counter_filling" class="form-control" placeholder="Masukan Counter Filling" required>
                </div>
                <button type="submit" class="btn btn-primary" >Simpan Data</button>
            </form>
        </div>
    </div>
@endsection
