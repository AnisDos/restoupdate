




@extends('restaurant.base')



@section('content')
{{App::setLocale(Session::get('locale'))}}




<div class="ms-content-wrapper">
  <div class="row">

 
     

      
      



  
    <div class="col-md-12">
    <h1 class="db-header-title"> {{ __('Welcome')}}, {{ Auth::user()->restaurant->name }}</h1>
    </div>
    <div class="col-xl-3 col-lg-6 col-md-6">
      <div class="ms-card ms-widget has-graph-full-width ms-infographics-widget">
        <span class="ms-chart-label bg-black"><i class="material-icons">  </i>monthly </span>
        <div class="ms-card-body media">
          <div class="media-body">
            <span class="black-text"><strong>{{__('Spents')}} (SAR)</strong></span>
            <h2  >{{$totalspents}}</h2>
          </div>
        </div>
        <canvas id="line-chart"></canvas>
      </div>
    </div>
    <div class="col-xl-3 col-lg-6 col-md-6">
      <div class="ms-card ms-widget has-graph-full-width ms-infographics-widget">
        <span class="ms-chart-label bg-red"><i class="material-icons"></i>all </span>
        <div class="ms-card-body media">
          <div class="media-body">
            <span class="black-text"><strong>{{__('Total Customers')}}</strong></span>
            <h2>{{$totalcustomers}}</h2>
          </div>
        </div>
        <canvas id="line-chart-2"></canvas>
      </div>
    </div>
    <div class="col-xl-3 col-lg-6 col-md-6">
      <div class="ms-card ms-widget has-graph-full-width ms-infographics-widget">
        <span class="ms-chart-label bg-black"><i class="material-icons"></i>monthly </span>
        <div class="ms-card-body media">
          <div class="media-body">
            <span class="black-text"><strong>{{__('Revenues')}} (SAR) </strong></span>
            <h2>{{$totalrevenues}}   </h2>
          </div>
        </div>
        <canvas id="line-chart-3"></canvas>
      </div>
    </div>
    <div class="col-xl-3 col-lg-6 col-md-6">
      <div class="ms-card ms-widget has-graph-full-width ms-infographics-widget">
        <span class="ms-chart-label bg-red"><i class="material-icons"></i> monthly</span>
        <div class="ms-card-body media">
          <div class="media-body">
            <span class="black-text"><strong>{{__('Total Orders')}}</strong></span>
            <h2>{{$totalOrders}}</h2>
          </div>
        </div>
        <canvas id="line-chart-4"></canvas>
      </div>
    </div>
    <!-- Recent Orders Requested -->
   











































































<!--===============================================================================================-->
<!--===============================================================================================-->
<!--===============================================================================================-->
<!--===============================================================================================-->
<!--===============================================================================================-->











    <!-- Food Orders -->
    <div class="col-md-12">
      <div class="ms-panel">
        <div class="ms-panel-header">
          <h6>{{__('Trending Orders')}}</h6>
        </div>
        <div class="ms-panel-body">
          <div class="row">

          
              
              
<style>
  .highcharts-figure, .highcharts-data-table table {
    min-width: 310px; 
    max-width: 800px;
    margin: 1em auto;
}

#container {
    height: 400px;
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



              <script src="https://code.highcharts.com/highcharts.js"></script>
              <script src="https://code.highcharts.com/modules/exporting.js"></script>
              <script src="https://code.highcharts.com/modules/export-data.js"></script>
              <script src="https://code.highcharts.com/modules/accessibility.js"></script>
              
              <figure class="highcharts-figure">
                  <div id="container"></div>
                  <p class="highcharts-description">
                      A basic line chart compares orders between four types of request.
                      Local order is order inside restaurant, delivery order is that who customers take it with him,
                      delivery company is order who get distributed buy one of your delivery company and delivery boy is
                      order who get distributed by one of your employees.
                  </p>
              </figure>


             
          </div>
        </div>
      </div>
    </div>
    <!-- END/Food Orders -->





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
            <h6>{{__('Chart Revenue Per Caisse')}}</h6>
       
          </div>
        </div>




        <script src="https://code.highcharts.com/highcharts.js"></script>
        <script src="https://code.highcharts.com/modules/series-label.js"></script>
        <script src="https://code.highcharts.com/modules/exporting.js"></script>
        <script src="https://code.highcharts.com/modules/export-data.js"></script>
        <script src="https://code.highcharts.com/modules/accessibility.js"></script>
        
        <figure class="highcharts-figure">
            <div id="container1"></div>
            <p class="highcharts-description"  style="text-align: center" >
              {{__('A pie chart showing the revenue for each caisses in your restaurant per month for a full year.')}}
            </p>
        </figure>
        
        <script>
          Highcharts.chart('container1', {

title: {
text: '{{__('Revenu of all your caisses, 2020')}}'
},

subtitle: {
text: "{{__('nb: revenue from all orders in every caisse')}}"
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
    min-width: 310px; 
    max-width: 800px;
    margin: 1em auto;
}

#container {
    height: 400px;
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
            <h6>{{__('Income and expenses')}}</h6>
            <p>{{__('Monitor how much sales your restaurant does')}}</p>
          </div>
        </div>




        <script src="https://code.highcharts.com/highcharts.js"></script>
        <script src="https://code.highcharts.com/modules/exporting.js"></script>
        <script src="https://code.highcharts.com/modules/export-data.js"></script>
        <script src="https://code.highcharts.com/modules/accessibility.js"></script>
        
        <figure class="highcharts-figure">
            <div id="container2"></div>
            <p class="highcharts-description">
            
            </p>
        </figure>
        
        
        <script>
         Highcharts.chart('container2', {
    chart: {
        type: 'column'
    },
    title: {
        text: '{{__('Monthly Average Income and expenses')}}'
    },
    subtitle: {
        text: ''
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
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: ' SAR'
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
    plotOptions: {
        column: {
            pointPadding: 0.2,
            borderWidth: 0
        }
    },
    series: [{
        name: 'revenu',
        data: [@foreach($revenus as $revenu) {{$revenu}}, @endforeach]

    }, {
        name: 'depense',
        data: [@foreach($depenses as $depense) {{$depense}}, @endforeach]

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




@section('script')
<script>
$(document).ready(function() { 	
$('a').removeClass( "active" ) ;

$(".clikihafhome").each(function(){
    $(this).click();
});

});

  </script>


<script>
  Highcharts.chart('container', {
chart: {
type: 'column'
},
title: {
text: '{{__('Monthly Average Orders')}}'
},
subtitle: {
text: ''
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
crosshair: true
},
yAxis: {
min: 0,
title: {
text: ' Orders(nbr)'
}
},
tooltip: {
headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
'<td style="padding:0"><b>{point.y:.f} orders</b></td></tr>',
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
name: 'Local',
data: [ {{ $localorders[0] }}, {{ $localorders[1] }}, {{ $localorders[2] }}, {{ $localorders[3] }}, {{ $localorders[4] }}, {{ $localorders[5] }}, {{ $localorders[6] }}, {{ $localorders[7] }}, {{ $localorders[8] }}, {{ $localorders[9] }}, {{ $localorders[10] }}, {{ $localorders[11] }}]

}, {
name: 'Delivery',
data: [ {{ $deliveryorders[0] }}, {{ $deliveryorders[1] }}, {{ $deliveryorders[2] }}, {{ $deliveryorders[3] }}, {{ $deliveryorders[4] }}, {{ $deliveryorders[5] }}, {{ $deliveryorders[6] }}, {{ $deliveryorders[7] }}, {{ $deliveryorders[8] }}, {{ $deliveryorders[9] }}, {{ $deliveryorders[10] }}, {{ $deliveryorders[11] }}]

}, {
name: 'Delivery Company',
data: [ {{ $delevrycompanyorders[0] }}, {{ $delevrycompanyorders[1] }}, {{ $delevrycompanyorders[2] }}, {{ $delevrycompanyorders[3] }}, {{ $delevrycompanyorders[4] }}, {{ $delevrycompanyorders[5] }}, {{ $delevrycompanyorders[6] }}, {{ $delevrycompanyorders[7] }}, {{ $delevrycompanyorders[8] }}, {{ $delevrycompanyorders[9] }}, {{ $delevrycompanyorders[10] }}, {{ $delevrycompanyorders[11] }}]

}, {
name: 'Delivery Boy',
data: [ {{ $delevryboyorders[0] }}, {{ $delevryboyorders[1] }}, {{ $delevryboyorders[2] }}, {{ $delevryboyorders[3] }}, {{ $delevryboyorders[4] }}, {{ $delevryboyorders[5] }}, {{ $delevryboyorders[6] }}, {{ $delevryboyorders[7] }}, {{ $delevryboyorders[8] }}, {{ $delevryboyorders[9] }}, {{ $delevryboyorders[10] }}, {{ $delevryboyorders[11] }}]

}]
});
</script>

@endsection
