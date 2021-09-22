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
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Jenis Downtime</label>
                                        <select class="form-control" name="jenis_downtime" id="jenis_downtime">
                                            <option selected>--Pilih Jenis Downtime--</option> 
                                            @foreach ($jenis_downtime as $jenis_downtime)
                                                <option value="{{$jenis_downtime->id}}">{{ $jenis_downtime->nama_jenis_downtime }}</option> 
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Unit Downtime</label><br>
                                        <select class="form-control" name="unit_downtime" id="unit_downtime">
                                            <option selected>--Pilih Unit Downtime--</option> 
                                            
                                                <option value="">ini value</option> 
                                            
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Root Cause</label><br>
                                        <input type="text" placeholder="Masukan Root Cause" name="root_cause" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Mulai</label><br>
                                        <input type="datetime-local" name="mulai" class="form-control" placeholder="Masukan waktu mulai" required>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Selesai</label><br>
                                        <input type="datetime-local" name="selesai" class="form-control" placeholder="Masukan waktu selesai" required>
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
