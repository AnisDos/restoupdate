




@extends('admin.base')



@section('content')

{{App::setLocale(Session::get('locale'))}}





    <div class="ms-content-wrapper">
      <div class="row">

        


















<!--===============================================================================================-->
<!--===============================================================================================-->
<!--===============================================================================================-->
<!--===============================================================================================-->
<!--===============================================================================================-->




        <style>
          .highcharts-figure, .highcharts-data-table table {
      min-width: 360px; 
      max-width: 800px;
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
                    <h6>Project Sales</h6>
                    <p>Monitor how much sales your product does</p>
                  </div>
                </div>
  
  
  
  
                <script src="https://code.highcharts.com/highcharts.js"></script>
                <script src="https://code.highcharts.com/modules/series-label.js"></script>
                <script src="https://code.highcharts.com/modules/exporting.js"></script>
                <script src="https://code.highcharts.com/modules/export-data.js"></script>
                <script src="https://code.highcharts.com/modules/accessibility.js"></script>
                
                <figure class="highcharts-figure">
                    <div id="container"></div>
                    <p class="highcharts-description">
                        Basic line chart showing trends in a dataset. This chart includes the
                        <code>series-label</code> module, which adds a label to each line for
                        enhanced readability.
                    </p>
                </figure>
                
                <script>
                  Highcharts.chart('container', {
  
  title: {
      text: 'Solar Employment Growth by Sector, 2010-2016'
  },
  
  subtitle: {
      text: 'Source: thesolarfoundation.com'
  },
  
  yAxis: {
      title: {
          text: 'Number of Employees'
      }
  },
  
  xAxis: {
      accessibility: {
          rangeDescription: 'Range: 2010 to 2017'
      }
  },
  
  legend: {
      layout: 'vertical',
      align: 'right',
      verticalAlign: 'middle'
  },
  
  plotOptions: {
      series: {
          label: {
              connectorAllowed: false
          },
          pointStart: 2010
      }
  },
  
  series: [{
      name: 'Installation',
      data: [43934, 52503, 57177, 69658, 97031, 119931, 137133, 154175]
  }, {
      name: 'Manufacturing',
      data: [24916, 24064, 29742, 29851, 32490, 30282, 38121, 40434]
  }, {
      name: 'Sales & Distribution',
      data: [11744, 17722, 16005, 19771, 20185, 24377, 32147, 39387]
  }, {
      name: 'Project Development',
      data: [null, null, 7988, 12169, 15112, 22452, 34400, 34227]
  }, {
      name: 'Other',
      data: [12908, 5948, 8105, 11248, 8989, 11816, 18274, 18111]
  }],
  
  responsive: {
      rules: [{
          condition: {
              maxWidth: 500
          },
          chartOptions: {
              legend: {
                  layout: 'horizontal',
                  align: 'center',
                  verticalAlign: 'bottom'
              }
          }
      }]
  }
  
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

