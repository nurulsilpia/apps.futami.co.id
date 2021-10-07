@extends('layouts.master')
@section('title', 'Tambah User')

@section('content')

    <div class="section-body">
        <div class="row">
            <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                    

                    <form action="{{ route('tambah-user-simpan') }}" method="POST">
                        @csrf
                        <input type="hidden" name="creator" value="@if ($message = Session::get('id_user'))
                        {{ $message }}
                        @endif">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>* Nama/username</label>
                                        <input type="text" placeholder="Input Nama" name="name" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>* Email</label>
                                        <input type="text" placeholder="Input email" name="email" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>* Departemen</label><br>
                                        <select class="form-control" name="departement" id="departement">
                                            <option value="">--Pilih Departement--</option> 
                                            @foreach ($departement as $departemen_item)
                                            <option value="{{$departemen_item->id}}">{{$departemen_item->departemen}}</option> 
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label><i>password default : 12345678<br>
                                        Nama akan sekaligus sebagai username</i></label>
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
