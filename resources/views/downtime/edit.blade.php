@extends('layouts.master')
@section('title', 'Tambah Downtime')

@section('content')

    @foreach ($edit as $item)
    <div class="card">
        <form action="{{ route('downtime.update',$item->id) }}" method="POST">
            @method('PUT')
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="text-uppercase">id produksi</label><br>
                            <input type="number" placeholder="Masukan id produksi" name="id_produksi" class="form-control  text-uppercase" value="{{ $item->id }}">
                        </div>
                    </div>
                    {{-- <div class="col-md-12">
                        <div class="form-group">
                            <label>Jenis Downtime</label>
                        <select class="form-control"  name="id_varian" >
                            @foreach ($jenis_downtime->where('id',$item->id_jenis_downtime) as $jenis)
                            <option value="{{$jenis->id}}">{{$jenis->jenis_downtime}}</option>
                            @endforeach
                            <option value="">----Silahkan ganti untuk mengganti varian----</option>
                            @foreach ($jenis_downtime as $jenis)
                            <option value="{{$jenis->id}}">{{$jenis->jenis_downtime}}</option>
                            @endforeach
                        </select>
                        </div>
                    </div> --}}
                    {{-- <div class="col-md-12">
                        <div class="form-group">
                            <label class="text-uppercase">Unit Downtime</label><br>
                            <select class="form-control" name="id_unit_downtime" id="unit_downtime">
                                <option selected>--Pilih Unit Downtime--</option> 
                                @foreach ($unit_downtime as $unit_downtime)
                                    <option value="{{ $unit_downtime->id }}">{{ $unit_downtime->nama_unit_downtime }}</option> 
                                @endforeach
                            </select>
                        </div>
                    </div> --}}
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="text-uppercase">Root Cause</label><br>
                            <input type="text" placeholder="Masukan Root Cause" name="root_cause" class="form-control" value="{{ $item->root_cause }}">
                        </div>
                    </div>
                    <div class="col-md-12">
                            <label class="text-uppercase">Mulai</label><br>
                            <input type="datetime-local" name="mulai_downtime" class="form-control" placeholder="Masukan waktu mulai" required>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="text-uppercase">Selesai</label><br>
                            <input type="datetime-local" name="selesai_downtime" class="form-control" placeholder="Masukan waktu selesai" required>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="card-footer text-right">
                            <button class="btn btn-primary mr-1" type="submit">Edit</button>
                        </div>
                    </div>
                </div>
            </div>

        </form>
    </div>
        
    @endforeach        
            
@endsection

@push('page-script')

@endpush
