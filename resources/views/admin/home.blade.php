




@extends('admin.base')



@section('content')

{{App::setLocale(Session::get('locale'))}}
<?php

use Carbon\Carbon;
?>


    <div class="ms-content-wrapper">
      <div class="row">
  
      

        <div class="col-md-12">
        <h1 class="db-header-title">{{__('Welcome')}}, {{Auth::user()->admin->name}}</h1>
        </div>
        <div class="col-xl-3 col-lg-6 col-md-6">
          <div class="ms-card ms-widget has-graph-full-width ms-infographics-widget">
            <span class="ms-chart-label bg-black"><i class="material-icons">arrow_upward</i> </span>
            <div class="ms-card-body media">
              <div class="media-body">
                <span class="black-text"><strong>Total Restaurants</strong></span>
                <h2> {{$totalRestaurants}} </h2>
              </div>
            </div>
            <canvas id="line-chart"></canvas>
          </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-md-6">
          <div class="ms-card ms-widget has-graph-full-width ms-infographics-widget">
            <span class="ms-chart-label bg-red"><i class="material-icons">arrow_upward</i> </span>
            <div class="ms-card-body media">
              <div class="media-body">
                <span class="black-text"><strong>Total Customers</strong></span>
                <h2> {{$totalCustomers}} </h2>
              </div>
            </div>
            <canvas id="line-chart-2"></canvas>
          </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-md-6">
          <div class="ms-card ms-widget has-graph-full-width ms-infographics-widget">
            <span class="ms-chart-label bg-black"><i class="material-icons">arrow_upward</i> </span>
            <div class="ms-card-body media">
              <div class="media-body">
                <span class="black-text"><strong>Total Employee</strong></span>
                <h2> {{$totalEmployee}} </h2>
              </div>
            </div>
            <canvas id="line-chart-3"></canvas>
          </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-md-6">
          <div class="ms-card ms-widget has-graph-full-width ms-infographics-widget">
            <span class="ms-chart-label bg-red"><i class="material-icons"></i> {{ Carbon::now()->format('M') }}  </span>
            <div class="ms-card-body media">
              <div class="media-body">
                <span class="black-text"><strong>Total Orders</strong></span>
                <h2> {{$totalOrders}} </h2>
              </div>
            </div>
            <canvas id="line-chart-4"></canvas>
          </div>
        </div>
        <!-- Recent Orders Requested -->
        {{-- <div class="col-xl-6 col-md-12">
          <div class="ms-panel">
            <div class="ms-panel-header">
              <div class="d-flex justify-content-between">
                <div class="align-self-center align-left">
                  <h6>Recent Orders Requested</h6>
                </div>
                <button type="button" class="btn btn-primary">View All</button>
              </div>
            </div>
            <div class="ms-panel-body">
              <div class="table-responsive">
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th scope="col">Food Item</th>
                      <th scope="col">Price</th>
                      <th scope="col">Product ID</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td class="ms-table-f-w"> <img src="{{  asset ('styleRestoIT/assets/img/costic/pizza.jpg') }}" alt="people"> Pizza </td>
                      <td>$19.99</td>
                      <td>67384917</td>
                    </tr>
                    <tr>
                      <td class="ms-table-f-w"> <img src="{{  asset ('styleRestoIT/assets/img/costic/french-fries.jpg') }}" alt="people"> French Fries </td>
                      <td>$14.59</td>
                      <td>789393819</td>
                    </tr>
                    <tr>
                      <td class="ms-table-f-w"> <img src="{{  asset ('styleRestoIT/assets/img/costic/cereals.jpg') }}" alt="people"> Multigrain Hot Cereal </td>
                      <td>$25.22</td>
                      <td>137893137</td>
                    </tr>
                    <tr>
                      <td class="ms-table-f-w"> <img src="{{  asset ('styleRestoIT/assets/img/costic/egg-sandwich.jpg') }}" alt="people"> Fried Egg Sandwich </td>
                      <td>$11.23</td>
                      <td>235193138</td>
                    </tr>

                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div> --}}
       {{--  <div class="col-xl-6 col-md-12">
          <div class="ms-panel ms-panel-fh">
            <div class="ms-panel-header new">
              <h6>Monthly Revenue</h6>
              <select class="form-control new" id="exampleSelect">
                <option value="1">January</option>
                <option value="2">February</option>
                <option value="3">March </option>
                <option value="4">April</option>
                <option value="5">May</option>
                <option value="1">June</option>
                <option value="2">July</option>
                <option value="3">August</option>
                <option value="4">September</option>
                <option value="5">October</option>
                <option value="4">November</option>
                <option value="5">December</option>
              </select>
            </div>
            <div class="ms-panel-body">
              <span class="progress-label"> <strong>Week 1</strong> </span>
              <div class="progress">
                <div class="progress-bar bg-primary" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25%</div>
              </div>
              <span class="progress-label"> <strong>Week 2</strong> </span>
              <div class="progress">
                <div class="progress-bar bg-primary" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">50%</div>
              </div>
              <span class="progress-label"> <strong>Week 3</strong> </span>
              <div class="progress">
                <div class="progress-bar bg-primary" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">75%</div>
              </div>
              <span class="progress-label"> <strong>Week 4</strong> </span>
              <div class="progress">
                <div class="progress-bar bg-primary" role="progressbar" style="width: 40%" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100">40%</div>
              </div>
            </div>
          </div>
        </div> --}}
        <!-- Food Orders -->
       {{--  <div class="col-md-12">
          <div class="ms-panel">
            <div class="ms-panel-header">
              <h6>Trending Orders</h6>
            </div>
            <div class="ms-panel-body">
              <div class="row">

                <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
                  <div class="ms-card no-margin">
                    <div class="ms-card-img">
                      <img src="{{  asset ('styleRestoIT/assets/img/costic/food-5.jpg') }}" alt="card_img">
                    </div>
                    <div class="ms-card-body">
                      <div class="ms-card-heading-title">
                        <h6>Meat Stew</h6>
                        <span class="green-text"><strong>$25.00</strong></span>
                      </div>

                      <div class="ms-card-heading-title">
                        <p>Orders <span class="red-text">15</span></p>
                        <p>Income <span class="red-text">$175</span></p>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
                  <div class="ms-card no-margin">
                    <div class="ms-card-img">
                      <img src="{{  asset ('styleRestoIT/assets/img/costic/food-2.jpg') }}" alt="card_img">
                    </div>
                    <div class="ms-card-body">
                      <div class="ms-card-heading-title">
                        <h6>Pancake</h6>
                        <span class="green-text"><strong>$50.00</strong></span>
                      </div>

                      <div class="ms-card-heading-title">
                        <p>Orders <span class="red-text">75</span></p>
                        <p>Income <span class="red-text">$275</span></p>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
                  <div class="ms-card no-margin">
                    <div class="ms-card-img">
                      <img src="{{  asset ('styleRestoIT/assets/img/costic/food-4.jpg') }}" alt="card_img">
                    </div>
                    <div class="ms-card-body">
                      <div class="ms-card-heading-title">
                        <h6>Burger</h6>
                        <span class="green-text"><strong>$45.00</strong></span>
                      </div>

                      <div class="ms-card-heading-title">
                        <p>Orders <span class="red-text">85</span></p>
                        <p>Income <span class="red-text">$575</span></p>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
                  <div class="ms-card no-margin">
                    <div class="ms-card-img">
                      <img src="{{  asset ('styleRestoIT/assets/img/costic/food-3.jpg') }}" alt="card_img">
                    </div>
                    <div class="ms-card-body">
                      <div class="ms-card-heading-title">
                        <h6>Saled</h6>
                        <span class="green-text"><strong>$85.00</strong></span>
                      </div>
                      <div class="ms-card-heading-title">
                        <p>Orders <span class="red-text">175</span></p>
                        <p>Income <span class="red-text">$775</span></p>
                      </div>
                    </div>
                  </div>
                </div>

              </div>
            </div>
          </div>
        </div> --}}
        <!-- END/Food Orders -->
     
        






























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
            <h6>Restaurants Revenu</h6>
            <p>Monitor how much revenu your restaurants does</p>
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
                
            </p>
        </figure>
        
        <script>
          Highcharts.chart('container', {

title: {
text: 'Revenu of all your restaurant, {{Carbon::now()->year}}'
},

subtitle: {
text: ''
},

yAxis: {
title: {
  text: 'SAR'
}
},
tooltip: {
headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
'<td style="padding:0"><b>{point.y:.2f} SAR</b></td></tr>',
footerFormat: '</table>',
shared: true,
useHTML: true
},

xAxis: {
  categories: [
      'Jan',
      'Feb',
      'Mar',
      'Apr',
      'May',
      'Jun',
      'Jul',
      'Aug',
      'Sep',
      'Oct',
      'Nov',
      'Dec'
    ],
   
},

legend: {
layout: 'vertical',
align: 'right',
verticalAlign: 'middle'
},

plotOptions: {
    column: {
      pointPadding: 0.2,
      borderWidth: 0
    }
  },

series: [

  @foreach ($charts as $chart)
  {
name: '{{ $chart[0] }}',
data: [  {{ $chart[1][0] }}, {{ $chart[1][1] }}, {{ $chart[1][2] }}, {{ $chart[1][3] }}, {{ $chart[1][4] }}, {{ $chart[1][5] }}, {{ $chart[1][6] }}, {{ $chart[1][7] }}, {{ $chart[1][8] }}, {{ $chart[1][9] }}, {{ $chart[1][10] }}, {{ $chart[1][11] }},]
}, 
  @endforeach
/* {
name: 'Installation',
data: [43934, 52503, 57177, 69658, 97031, 119931, 137133, 154175,1236,5465,5465,54654]
}, 
{
name: 'Manufacturing',
data: [24916, 24064, 29742, 29851, 32490, 30282, 38121, 40434,1236,5465,5465,54654]
}, 
{
name: 'Sales & Distribution',
data: [11744, 17722, 16005, 19771, 20185, 24377, 32147, 39387,1236,5465,5465,54654]
},
{
name: 'Project Development',
data: [null, null, 7988, 12169, 15112, 22452, 34400, 34227,1236,5465,5465,54654]
},
{
name: 'Other',
data: [12908, 5948, 8105, 11248, 8989, 11816, 18274, 18111,1236,5465,5465,54654]
} */],

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
            <h6>Restaurants Expenses</h6>
            <p>Monitor how much Expenses your restaurants does</p>
          </div>
        </div>




        <script src="https://code.highcharts.com/highcharts.js"></script>
        <script src="https://code.highcharts.com/modules/series-label.js"></script>
        <script src="https://code.highcharts.com/modules/exporting.js"></script>
        <script src="https://code.highcharts.com/modules/export-data.js"></script>
        <script src="https://code.highcharts.com/modules/accessibility.js"></script>
        
        <figure class="highcharts-figure">
            <div id="container1"></div>
            <p class="highcharts-description">
        
            </p>
        </figure>
        
        <script>
          Highcharts.chart('container1', {

title: {
text: 'Expenses of all your restaurant, {{Carbon::now()->year}}'
},

subtitle: {
text: ''
},

yAxis: {
title: {
  text: 'SAR'
}
},
tooltip: {
headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
'<td style="padding:0"><b>{point.y:.2f} SAR</b></td></tr>',
footerFormat: '</table>',
shared: true,
useHTML: true
},

xAxis: {
  categories: [
      'Jan',
      'Feb',
      'Mar',
      'Apr',
      'May',
      'Jun',
      'Jul',
      'Aug',
      'Sep',
      'Oct',
      'Nov',
      'Dec'
    ],
   
},

legend: {
layout: 'vertical',
align: 'right',
verticalAlign: 'middle'
},

plotOptions: {
    column: {
      pointPadding: 0.2,
      borderWidth: 0
    }
  },

series: [

  @foreach ($chartsexpenses as $chart)
  {
name: '{{ $chart[0] }}',
data: [  {{ $chart[1][0] }}, {{ $chart[1][1] }}, {{ $chart[1][2] }}, {{ $chart[1][3] }}, {{ $chart[1][4] }}, {{ $chart[1][5] }}, {{ $chart[1][6] }}, {{ $chart[1][7] }}, {{ $chart[1][8] }}, {{ $chart[1][9] }}, {{ $chart[1][10] }}, {{ $chart[1][11] }},]
}, 
  @endforeach
],

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
            <h6>Restaurants Orders</h6>
            <p>Monitor how many Orders your restaurants does</p>
          </div>
        </div>




        <script src="https://code.highcharts.com/highcharts.js"></script>
        <script src="https://code.highcharts.com/modules/series-label.js"></script>
        <script src="https://code.highcharts.com/modules/exporting.js"></script>
        <script src="https://code.highcharts.com/modules/export-data.js"></script>
        <script src="https://code.highcharts.com/modules/accessibility.js"></script>
        
        <figure class="highcharts-figure">
            <div id="chartchichiorder"></div>
            <p class="highcharts-description">
           
            </p>
        </figure>
        
        <script>
          Highcharts.chart('chartchichiorder', {

title: {
text: 'Nbr Orders of all your restaurant, {{Carbon::now()->year}}'
},

subtitle: {
text: ''
},

yAxis: {
title: {
  text: 'Orders'
}
},
tooltip: {
headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
'<td style="padding:0"><b>{point.y:.f} Orders</b></td></tr>',
footerFormat: '</table>',
shared: true,
useHTML: true
},

xAxis: {
  categories: [
      'Jan',
      'Feb',
      'Mar',
      'Apr',
      'May',
      'Jun',
      'Jul',
      'Aug',
      'Sep',
      'Oct',
      'Nov',
      'Dec'
    ],
   
},

legend: {
layout: 'vertical',
align: 'right',
verticalAlign: 'middle'
},

plotOptions: {
    column: {
      pointPadding: 0.2,
      borderWidth: 0
    }
  },

series: [

  @foreach ($chartOrders as $chart)
  {
name: '{{ $chart[0] }}',
data: [  {{ $chart[1][0] }}, {{ $chart[1][1] }}, {{ $chart[1][2] }}, {{ $chart[1][3] }}, {{ $chart[1][4] }}, {{ $chart[1][5] }}, {{ $chart[1][6] }}, {{ $chart[1][7] }}, {{ $chart[1][8] }}, {{ $chart[1][9] }}, {{ $chart[1][10] }}, {{ $chart[1][11] }},]
}, 
  @endforeach
],

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
  
    <script>
  $(document).ready(function() { 	
  $('a').removeClass( "active" ) ;
  
  $(".clikihafhome").each(function(){
      $(this).click();
  });
  
  });
  
    </script>
  
@endsection

