@extends('layouts.master')
@section('title','Time Reparation')

@section('content')

@if ($message = Session::get('success'))
    <p> <script>alert('{{ $message }}');</script> </p>
@endif
@if ($message = Session::get('delete'))
    <p> <script>alert('{{ $message }}');</script> </p>
@endif
@if ($message = Session::get('update'))
    <p> <script>alert('{{ $message }}');</script> </p>
@endif

    <div class="card mt-3 p-4 shadow-sm">
        <div class="table-responsive">
            <a href="{{ route('TimeReparation.create') }}" class="btn btn-success">Tambah Data</a>
            <table class="mt-4 table table-bordered table-md table-hover bg-white text-center">
                <thead>
                <tr>
                    <th>No</th>
                    <th>ID Time Reparation</th>
                    <th>ID Product</th>
                    <th>Start</th>
                    <th>Stop</th>
                    <th>Total Waktu (Menit)</th>
                    <th colspan="6">Aksi</th>
                </tr>
                </thead>
                <tbody>

                @foreach($data_table as $no => $data_table)
                        <tr>
                            <th scope="row">{{ $no + 1 }}</th>
                            <td>{{$data_table->id_time_reparation}}</td>
                            <td>{{$data_table->id_product}}</td>
                            <td>{{$data_table->start}}</td>
                            <td>{{$data_table->stop}}</td>
                            <td>{{ \Carbon\Carbon::parse($data_table->start)->diffinMinutes($data_table->stop) }}</td>
                            <td><a href="{{route('TimeReparation.show',$data_table->id_time_reparation)}}" class="btn btn-info">Show</a></td>
                            <td><a href="{{route('TimeReparation.edit',$data_table->id_time_reparation)}}"  class="btn btn-warning">Edit</a></td>  
                            <td>
                                <form action="{{ route('TimeReparation.destroy',$data_table->id_time_reparation) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger" type="submit" onclick="return confirm('Hapus Data?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                @endforeach
                
                </tbody>
            </table>
        </div>
    </div>

@endsection