




@extends('superadmin.base')



@section('content')
{{App::setLocale(Session::get('locale'))}}
<?php

use Carbon\Carbon;
?>






    <div class="ms-content-wrapper">
      <div class="row">

    
        
    

      


















<!--===============================================================================================-->
<!--===============================================================================================-->
<!--===============================================================================================-->
<!--===============================================================================================-->
<!--===============================================================================================-->




        <style>
  .highcharts-figure, .highcharts-data-table table {
    min-width: 320px; 
    max-width: 660px;
    margin: 1em auto;
}

.highcharts-data-table table {
	font-family: Verdana, sans-serif;
	border-collapse: collapse;
	border: 1px solid #EBEBEB;
	margin: 10px auto;
	text-align: center;
	width: 100%;
	max-width: 500px;
}
.highcharts-data-table caption {
    padding: 1em 0;
    font-size: 1.2em;
    color: #555;
}
.highcharts-data-table th {
	font-weight: 600;
    padding: 0.5em;
}
.highcharts-data-table td, .highcharts-data-table th, .highcharts-data-table caption {
    padding: 0.5em;
}
.highcharts-data-table thead tr, .highcharts-data-table tr:nth-child(even) {
    background: #f8f8f8;
}
.highcharts-data-table tr:hover {
    background: #f1f7ff;
}

        </style>
          <div class="col-xl-12 col-md-12">
            <div class="ms-panel ms-panel-fh">
              <div class="ms-panel-header header-mini">
                <div class="d-flex justify-content-between">
                  <div>
                    <h6>Admins Accounts</h6>
                    
                  </div>
                </div>
  
  
  
  
                <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
                <script src="https://code.highcharts.com/highcharts.js"></script>
                <script src="https://code.highcharts.com/modules/exporting.js"></script>
                <script src="https://code.highcharts.com/modules/export-data.js"></script>
                <script src="https://code.highcharts.com/modules/accessibility.js"></script>
                
                <figure class="highcharts-figure">
                    <div id="container"></div>
                    <p class="highcharts-description">
                        This pie chart shows how the chart legend can be used to provide
                        information about the individual slices.
                    </p>
                </figure>
                
                
                <script>
                 // Build the chart
Highcharts.chart('container', {
    chart: {
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false,
        type: 'pie'
    },
    title: {
        text: 'Admins Accounts in your system'
    },
    tooltip: {
        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
    },
    accessibility: {
        point: {
            valueSuffix: '%'
        }
    },
    plotOptions: {
        pie: {
            allowPointSelect: true,
            cursor: 'pointer',
            dataLabels: {
                enabled: false
            },
            showInLegend: true
        }
    },
    series: [{
        name: 'accounts',
        colorByPoint: true,
        data: [{
            name: 'active',
            y: {{$activcoupmtes}},
            sliced: true,
            selected: true
        }, {
            name: 'never get key',
            y: {{$nokeycoupmtes}}
        }, {
            name: 'key expired',
            y: {{$expirkeycoupmtes}}
        }]
    }]
});
                </script>
                
  
  
  
              </div>
              <div class="ms-panel-body">
                <canvas id="pm-chart"></canvas>
              </div>
            </div>
          </div>
  
  
  
<!--===============================================================================================-->
<!--===============================================================================================-->
<!--===============================================================================================-->
<!--===============================================================================================-->
<!--===============================================================================================-->  




























































    







      </div>
    </div>
  

  
@endsection

