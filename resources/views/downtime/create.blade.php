@extends('layouts.master')
@section('title', 'Tambah Downtime')

@section('content')

    <div class="section-body">
        <div class="row">
            <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                    <form action="{{ route('downtime.store') }}" method="POST">
                        @csrf
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Varian</label><br>
                                            <select class="form-control" name="id_produksi" id="id_produksi" required>
                                                <option value="" disabled selected>--Pilih Varian--</option> 
                                                    @foreach ($varian as $item)
                                                        <option value="{{$item->id}}">{{$item->kode_variant}} {{$item->ukuran}}ML</option> 
                                                    @endforeach
                                            </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Jenis downtime</label><br>
                                        <select class="form-control" name="id_jenis_downtime" id="id_jenis_downtime">
                                            <option value="">--Pilih Jenis downtime--</option> 
                                            @foreach ($jenis_downtime as $jenis_downtime)
                                            <option value="{{$jenis_downtime->id}}">{{ $jenis_downtime->nama_jenis_downtime }}</option> 
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Unit downtime</label><br>
                                        <select class="form-control" name="id_unit_downtime" id="id_unit_downtime" required>
                                            <option value="">--Pilih Unit downtime--</option> 
                                            @foreach ($unit_downtime as $unit_downtime)
                                            <option value="{{$unit_downtime->id}}">{{ $unit_downtime->nama_unit_downtime}}</option> 
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="text-uppercase">Root Cause</label><br>
                                        <input type="text" placeholder="Masukan Root Cause" name="root_cause" class="form-control @error('root_cause') is invalid @enderror" value="{{old('root_cause')}}">
                                        @error('root_cause')
                                            <div class="alert alert-danger">{{$message="Root Cause harus di isi"}}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="mb-3 col-md-3">
                                    <div class="form-group">
                                        <label class="text-uppercase">Mulai</label><br>
                                        <input type="datetime-local" name="mulai_downtime" class="form-control @error('mulai_downtime') is invalid @enderror" placeholder="Masukan waktu mulai" value="{{old('mulai_downtime')}}">  
                                        @error('mulai_downtime')
                                            <div class="alert alert-danger">{{$message="Mulai Downtime harus di isi"}}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="mb-3 col-md-3">
                                    <div class="form-group">
                                        <label class="text-uppercase">Selesai</label><br>
                                        <input type="datetime-local" name="selesai_downtime" class="form-control @error('selesai_downtime') is invalid @enderror" placeholder="Masukan waktu selesai" value="{{old('selesai_downtime')}}">
                                        @error('selesai_downtime')
                                            <div class="alert alert-danger">{{$message="Selesai Downtime harus di isi"}}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="card-footer text-right">
                                        <button class="btn btn-primary mr-1" type="submit">Submit</button>
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
