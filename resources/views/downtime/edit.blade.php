@extends('layouts.master')
@section('title', 'Tambah Downtime')

@section('content')

    @foreach ($edit as $item)
    <div class="card">
        <form action="{{ route('downtime.update',$item->id) }}" method="POST">
            @method('PUT')
            <div class="card-body">
                @csrf
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="text-uppercase">id produksi</label><br>
                            <input type="number" placeholder="Masukan id produksi" name="id_produksi" class="form-control  text-uppercase" value="{{ $item->id }}">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="text-uppercase">Jenis Downtime</label>
                            <select class="form-control" name="id_jenis_downtime" id="jenis_downtime" required>
                                @foreach ($id_jenis_downtime->where('id', $item->id_jenis_downtime) as $jenis_downtime)
                                    <option selected disabled value="{{ $jenis_downtime->id }}">{{ $jenis_downtime->nama_jenis_downtime }}</option> 
                                @endforeach
                                <option disabled>--Silahkan ganti jenis downtime--</option>
                                @foreach ($id_jenis_downtime as $jenis)
                                <option value="{{ $jenis->id }}">{{ $jenis->nama_jenis_downtime }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="text-uppercase">Unit Downtime</label>
                            <select class="form-control" name="id_unit_downtime" id="jenis_downtime">
                                {{-- <option disabled>--unit Downtime Terdahulu--</option>  --}}
                                @foreach ($id_unit_downtime->where('id', $item->id_unit_downtime) as $unit_downtime)
                                    <option selected disabled value="{{ $unit_downtime->id }}">{{ $unit_downtime->nama_unit_downtime }}</option> 
                                @endforeach
                                <option disabled>--Silahkan ganti unit downtime--</option>
                                @foreach ($id_unit_downtime as $unit)
                                <option value="{{ $unit->id }}">{{ $unit->nama_unit_downtime }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="text-uppercase">Root Cause</label><br>
                            <input type="text" placeholder="Masukan Root Cause" name="root_cause" class="form-control" value="{{ $item->root_cause }}">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="text-uppercase">Mulai</label><br>
                            <input type="datetime-local" name="mulai_downtime" class="form-control" placeholder="Masukan waktu mulai" value="{{ date('Y-m-d\TH:i', strtotime($item->mulai_downtime)) }}" required>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="text-uppercase">Selesai</label><br>
                            <input type="datetime-local" name="selesai_downtime" class="form-control" placeholder="Masukan waktu selesai" value="{{ date('Y-m-d\TH:i', strtotime($item->selesai_downtime)) }}" required>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="card-footer text-right">
                            <button class="btn btn-primary mr-1" type="submit">Edit Data</button>
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
