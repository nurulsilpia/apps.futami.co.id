@extends('layouts.master')
@section('title','Test')
@section('content')

<a href="{{route('test.create')}}">Tambah Data</a><br>
<table border="1">
    <tr>
        <th>no</th>
        <th>nama</th>
        <th>alamat</th>
        <th>action</th>
    </tr>
    @foreach ($data_test as $no => $data_test)
    <tr>
        <td>{{$no + 1}}</td>
        <td>{{$data_test->name}}</td>
        <td>{{$data_test->alamat}}</td>
        <td><a href="{{route('test.show',$data_test->id)}}">Show</a> | <a href="{{route('test.edit',$data_test->id)}}">Edit</a> 
        <form action="{{ route('test.destroy',$data_test->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" >Delete</button>
        </form>
    </td>
    <tr>
    @endforeach
</table>

<div class="container">
    <div class="section-body">
        <div class="row">
            <div class="col-12 col-md-12 col-lg-12">
            <div class="card">
                <div id="chart" class="py-3">

                </div>
            </div>
            </div>
        </div>
    </div>
</div>

@section('chart')
<script src="https://code.highcharts.com/highcharts.js"></script>
<script>
    Highcharts.chart('chart', {
      chart: {
          type: 'column'
      },
      title: {
          text: 'Futami Graphic'
      },
      subtitle: {
          text: 'October'
      },
      xAxis: {
          categories: [
              'Sun',
              'Mon',
              'Tue',
              'Wed',
              'Thu',
              'Fri',
              'Sat'
          ],
          crosshair: true
      },
      yAxis: {
          min: 0,
          title: {
              text: 'Daily'
          }
      },
      tooltip: {
          headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
          footerFormat: '</table>',
          shared: true,
          useHTML: true
      },
      plotOptions: {
          column: {
              pointPadding: 0.2,
              borderWidth: 0
          }
      },
      series: [{
          name: 'Filling Performance',
          data: {!! json_encode($data_filling) !!}

      }, {
          name: 'QC Release',
          data: [83.6, 78.8, 98.5, 93.4, 106.0, 84.5, 105.0]

      }, {
          name: 'Downtime',
          data: [48.9, 38.8, 39.3, 41.4, 47.0, 48.3, 59.0]

      }]
  });
</script>
@endsection