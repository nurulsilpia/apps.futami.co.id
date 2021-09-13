@extends('layouts.master')
@section('title', 'Edit Data Varian')

@section('content')

    <div class="section-body">
        <div class="row">
            <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                    <form action="{{ route('varian.update',$item->id) }}" method="POST">
                        @method('PUT')
                        @csrf
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>* Nama Varian</label>
                                    <input type="text" name="nama_variant" value="{{$item->nama_variant}}" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>* Ukuran</label>
                                        <input type="number" name="ukuran" value="{{$item->ukuran}}" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>* Kode Varian</label>
                                        <input type="text" name="kode_variant" value="{{$item->kode_variant}}" class="form-control" required>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="card-footer text-right">
                                        <button class="btn btn-info mr-1" type="submit">Update</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                
                </form>
            </div>

        </div>
    </div>
    </div>
@endsection

@push('page-script')

@endpush
