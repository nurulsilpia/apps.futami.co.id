@extends('layouts.master')
@section('title','HOME')

@section('content')
  <section class="section">
    <div class="section-header">
      <h1>Home Dashboard</h1>
    </div>

    <div class="section-body">
      <div class="title m-b-md">
        
        {{-- @php
    require('dashboard.php');
    @endphp --}}
    </div>

    </div>
    
  </section>
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

@endsection
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
          pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
              '<td style="padding:0"><b>{point.y:.1f} mm</b></td></tr>',
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
          data: [49.9, 71.5, 106.4, 129.2, 144.0, 176.0, 135.6]

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

@push('page-script')

@endpush
    

