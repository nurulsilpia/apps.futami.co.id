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
        type: 'areaspline'
    },
    title: {
        text: 'Futami Graphic'
    },
    legend: {
        layout: 'vertical',
        align: 'left',
        verticalAlign: 'top',
        x: 150,
        y: 100,
        floating: true,
        borderWidth: 1,
        backgroundColor:
            Highcharts.defaultOptions.legend.backgroundColor || '#FFFFFF'
    },
    xAxis: {
        categories: [
            'Monday',
            'Tuesday',
            'Wednesday',
            'Thursday',
            'Friday',
            'Saturday',
            'Sunday'
        ],
        plotBands: [{ // visualize the weekend
            from: 4.5,
            to: 6.5,
            color: 'rgba(68, 170, 213, .2)'
        }]
    },
    yAxis: {
        title: {
            text: 'Units'
        }
    },
    tooltip: {
        shared: true,
        valueSuffix: ' units'
    },
    credits: {
        enabled: false
    },
    plotOptions: {
        areaspline: {
            fillOpacity: 0.5
        }
    },
    series: [{
        name: 'Filling Performance',
        data: [1, 5, 7, 2, 4, 10, 12]
    }, {
        name: 'Quantity Release',
        data: [3, 4, 3, 4, 6, 11, 9]
    }, {
        name: 'Downtime',
        data: [4, 3, 2, 6, 8, 5, 8]
    }]
});
</script>
@endsection

@push('page-script')

@endpush
    

