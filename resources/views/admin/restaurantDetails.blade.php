
@extends('admin.base')



@section('content')

   
{{App::setLocale(Session::get('locale'))}}


    <!-- Body Content Wrapper -->
    <div class="ms-content-wrapper">
      <div class="row">
        <div class="col-md-12">
          <h1  class="db-header-title">{{$restaurant->name}} @if($restaurant->is_admin) (ADMIN) @endif</h1>
        </div>
        <div class="col-xl-3 col-md-6">
          <div class="ms-card card-gradient-success ms-widget ms-infographics-widget">
            <div class="ms-card-body media">
              <div class="media-body">
                <h6>Total Orders</h6>
                <p class="ms-card-change"> <i class="material-icons">arrow_upward</i> {{$totalorders}} </p>
                <p class="fs-12">orders this year</p>
              </div>
            </div> <i class="flaticon-statistics"></i>
          </div>
        </div>
        <div class="col-xl-3 col-md-6">
          <div class="ms-card card-gradient-secondary ms-widget ms-infographics-widget">
            <div class="ms-card-body media">
              <div class="media-body">
                <h6>Revenus (SAR)</h6>
                <p class="ms-card-change">{{$totalrevenus}} </p>
                <p class="fs-12">This Year</p>
              </div>
            </div> <i class="flaticon-stats"></i>
          </div>
        </div>
        <div class="col-xl-3 col-md-6">
          <div class="ms-card card-gradient-success ms-widget ms-infographics-widget">
            <div class="ms-card-body media">
              <div class="media-body">
                <h6>Total Employees</h6>
                <p class="ms-card-change"> <i class="material-icons">arrow_upward</i> {{$someInfoEmployees->count()}}</</p>
                <p class="fs-12">Employees of this restaurants</p>
              </div>
            </div> <i class="flaticon-user"></i>
          </div>
        </div>
        <div class="col-xl-3 col-md-6">
          <div class="ms-card card-gradient-secondary ms-widget ms-infographics-widget">
            <div class="ms-card-body media">
              <div class="media-body">
                <h6>Charges (SAR) </h6>
                <p class="ms-card-change">{{$totaldepenses}} </p>
                <p class="fs-12">This Year</p>
              </div>
            </div> <i class="flaticon-reuse"></i>
          </div>
        </div>




<!--===============================================table=================================================-->
        <div class="col-xl-12 col-md-12">
          <div class="ms-panel">
              <div class="ms-card-header clearfix">
                  <h6 class="ms-card-title">Employees List</h6>
      
                </div>
              <div class="ms-panel-body">
                <div class="table-responsive">
                  <table id="data-table-123" class="table w-100 thead-primary"></table>
                </div>
              </div>
  
              
            </div>
        </div>



<!--===============================================table=================================================-->






       

<!--============================================================================================-->
 

<!--==============================================================================================-->        
        





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
            <h6>{{__('Income and expenses')}}</</h6>
            <p>{{__('Monitor how much sales your restaurant does')}}</p>
          </div>
        </div>




        <script src="https://code.highcharts.com/highcharts.js"></script>
        <script src="https://code.highcharts.com/modules/exporting.js"></script>
        <script src="https://code.highcharts.com/modules/export-data.js"></script>
        <script src="https://code.highcharts.com/modules/accessibility.js"></script>
        
        <figure class="highcharts-figure">
            <div id="container"></div>
            <p class="highcharts-description">
              nb .
            </p>
        </figure>
        
        
        <script>
         Highcharts.chart('container', {
    chart: {
        type: 'column'
    },
    title: {
        text:'{{__("Monthly Average Income and expenses")}}'
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




<!--=================================================================================-->

<!--//////////////////////////////////////////////////////////////// -->

<div class="col-xl-12 col-md-12">
  <div class="ms-panel">
    <div class="ms-panel-header">
      <h6>All Charge List</h6>
    </div>
    <div class="ms-panel-body">
      <div class="table-responsive">
        <table id="data-table-1234" class="table w-100 thead-primary"></table>
      </div>
    </div>
  </div>
</div>

<!--//////////////////////////////////////////////////////////////// -->



<div class="col-xl-12 col-md-12">
<div class="ms-panel">
  <div class="ms-panel-header">
    <h6>Completed Orders List</h6>
  </div>
  <div class="ms-panel-body">
    <div class="table-responsive">
      <table id="data-table-12345" class="table w-100 thead-primary"></table>
    </div>
  </div>
</div>
</div>


<!--//////////////////////////////////////////////////////////////// -->

<div class="col-xl-12 col-md-12">
<div class="ms-panel">
  <div class="ms-panel-header">
  <h6>All Actions in your System  </h6>
  </div>
  <div class="ms-panel-body">
    <div class="table-responsive">
      <table id="data-table-history" class="table w-100 thead-primary"></table>
    </div>
  </div>
</div>
</div>


<!--//////////////////////////////////////////////////////////////// -->
<!--update info restaurant -->
<div class="col-xl-6 col-md-12">
    <div class="ms-panel ms-panel-fh">
      <div class="ms-panel-header">
        <h6>Update informations restaurant Form</h6>
      </div>
      <div class="ms-panel-body">
        <form method="POST"  action="{{ url('admin/updateRestaurantInfo') }}" enctype="multipart/form-data" class="needs-validation clearfix" novalidate>
          
        @csrf
          <div class="form-row">


   
            <input type="hidden" name="id_res" value="{{ $restaurant->id }}" >
                      
   
            <div class="col-md-12 mb-3">
                <label for="validationCustom18">Name</label>
                <div class="input-group">
                  <input type="text" name="name" value="{{ $restaurant->name }}"  class="form-control @error('name') is-invalid @enderror" id="validationCustom18" placeholder="Name" required >
                  <div class="valid-feedback">
                    Looks good!
                  </div>
                  @error('name')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>
              </div>
              
              <div class="col-md-12 mb-3">
                <label for="validationCustom18">Address</label>
                <div class="input-group">
                  <input type="text" name="address" value="{{ $restaurant->address}}"  class="form-control @error('address') is-invalid @enderror" id="validationCustom18" placeholder="Address" required >
                  <div class="valid-feedback">
                    Looks good!
                  </div>
                  @error('address')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>
                

              </div>

                <div class="col-md-12 mb-3">
                  <label for="validationCustom08">Email Address</label>
                  <div class="input-group">
                    <input type="email" value="{{ $restaurant->user->email }}"  name="email" class="form-control @error('email') is-invalid @enderror" id="validationCustom08" placeholder="Email Address" required>
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                  </div>
                </div>

        

                
                <label for="validationCustom12">Old Restaurant Logo</label>
               <div class="input-group">
                <img src='/storage/{{$restaurant->image}}' style='width:200px; height:100px;'>
               </div>
                
                <div class="col-md-12 mb-3">
                  <label for="validationCustom12">New Restaurant Logo</label>
                  <div class="custom-file">
                    <input type="file" name="image" value="{{ old('image') }}"  class="custom-file-input @error('image') is-invalid @enderror" id="validatedCustomFile">
                    <label class="custom-file-label" for="validatedCustomFile">Upload Images...</label>
                  
                    @error('image')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror

                  </div>
                </div>











            


          </div>



          <div class="ms-panel-header new">
            <button class="btn btn-primary d-block" type="submit">Update Restaurant Information</button>
          </div>



        </form>

      </div>
    </div>

  </div>



<!--//////////////////////////////////////////////////////////////// -->

  
<!-- for activate or deactivate compte restaurant  -->


<!--//////////////////////////////////////////////////////////////// -->
  <div class="col-xl-6 col-md-12">
    <div class="ms-panel ms-panel-fh">
      <div class="ms-panel-header">
        <h6>Action Form</h6>
      </div>
      <div class="ms-panel-body">
          @if($restaurant->active)
        <form method="POST"  action="{{ url('admin/decativateRestaurant') }}"  class="needs-validation clearfix" novalidate>
          
        @csrf
          <div class="form-row">



                      
   
<input type="hidden" name="id_res" value="{{ $restaurant->id }}" >


       


          </div>



          <div class="ms-panel-header new">
            <button class="btn btn-primary-info d-block" type="submit">block restaurant</button>
          </div>



        </form>
@else
<form method="POST"  action="{{ url('admin/updatePasswordRestaurant') }}"  class="needs-validation clearfix" novalidate>
          
    @csrf
      <div class="form-row">



                  




<input type="hidden" name="id_res" value="{{ $restaurant->id }}" >
<input type="hidden" name="Activate" value="activih" >
                  

<div class="col-md-12 mb-2">
      <label for="validationCustom09">Password</label>
      <div class="input-group">
        <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="validationCustom09" placeholder="Password" required >
        @error('password')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
      </div>
    </div>

    <div class="col-md-12 mb-2">
      <label for="validationCustom09">Repeat Password</label>
      <div class="input-group">
        <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation" id="validationCustom099" placeholder="Repeat Password" required >
        @error('password_confirmation')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
      </div>
    </div>


      </div>



      <div class="ms-panel-header new">
        <button class="btn btn-primary d-block" type="submit">activate compte restaurant</button>
      </div>



    </form>
@endif
      </div>
    </div>

  </div>



<!--//////////////////////////////////////////////////////////////// -->

  
<!-- update password restaurant  -->


  <!--//////////////////////////////////////////////////////////////// -->
  <div class="col-xl-12 col-md-12">
    <div class="ms-panel ms-panel-fh">
      <div class="ms-panel-header">
        <h6>Update Password Form</h6>
      </div>
      <div class="ms-panel-body">
        @if($restaurant->active)
        <form method="POST"  action="{{ url('admin/updatePasswordRestaurant') }}"  class="needs-validation clearfix" novalidate>
          
        @csrf
          <div class="form-row">



                      
   


   
<input type="hidden" name="id_res" value="{{ $restaurant->id }}" >
                      
   
<div class="col-md-12 mb-2">
          <label for="validationCustom09">Password</label>
          <div class="input-group">
            <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="validationCustom09" placeholder="Password" required >
            @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>
        </div>

        <div class="col-md-12 mb-2">
          <label for="validationCustom09">Repeat Password</label>
          <div class="input-group">
            <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation" id="validationCustom099" placeholder="Repeat Password" required >
            @error('password_confirmation')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>
        </div>


          </div>



          <div class="ms-panel-header new">
            <button class="btn btn-primary d-block" type="submit">Update paasword</button>
          </div>



        </form>
@endif
      </div>
    </div>

  </div>


<!--====================================================================================-->











      </div>
    </div>
              
    











    
<!-- ========================================================================== -->
<!-- ========================================================================== -->
<!-- ========================================================================== -->
<!-- ========================================================================== -->
<!-- ========================================================================== -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel"></h4>
      </div>
      <div class="modal-body khta"> 
          <img style="background-size:100% 100%;" id="image_src_image" src="" >
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>       
<!-- ========================================================================== -->
<!-- ========================================================================== -->
<!-- ========================================================================== -->
<!-- ========================================================================== -->
<!-- ========================================================================== -->
  
@endsection




@section('script')
<script>

(function($) {
  'use strict';

   var dataSet12 = [
    @foreach ($someInfoEmployees as $InfoEmployee)
                            

   [ "  {{ $InfoEmployee->idEmployee }}", " {{ $InfoEmployee->user->email }}",  " {{ $InfoEmployee->type }}", "{{ $InfoEmployee->restaurant->name }}"],
   
                            @endforeach
];









  var tableFour = $('#data-table-123').DataTable( {
    data: dataSet12,
    columns: [
     
      { title: "id Employee" },

      { title: "Email" },
      { title: "Type" },
      { title: "Restaurant" },
 

    ],
  });


 




})(jQuery);

</script>

<script>

  function changeTextOfLabelInCOnfermationAlert(image_src){
    


    document.getElementById("image_src_image").src="/storage/"+image_src;      
     
              
              
              };
  
  </script>
<script>

  (function($) {
    'use strict';
  
     var dataSet123 = [
      @foreach ($charges as $charge)
                              
  
     [ "  {{ $charge->type }}"," @if( $charge->type == 'employee') {{ $charge->employee->idEmployee }}@endif ",  " @if( $charge->type == 'delevryCompany' ){{ $charge->delivery_companies->deliveryCompaniesName }} @endif ", "{{ $charge->note }}", "{{ $charge->priceCharge }} SAR","{{ $charge->created_at }}" , "@if( $charge->type == 'additional') @if($charge->image)<img src='/storage/{{ $charge->image }}' onclick=\"changeTextOfLabelInCOnfermationAlert('{{ $charge->image}}')\" data-toggle='modal' data-target='#exampleModal' data-whatever='@getbootstrap' >  @endif @endif"],
     
                              @endforeach
  ];
  
  
  
  
  
  
  
  
  
    var tableFour = $('#data-table-1234').DataTable( {
      data: dataSet123,
      columns: [
      
      { title: "{{__('type')}}" },
      { title: "{{__('Id Employee')}}" },
      { title: "{{__('delivery Company Name')}}" },
      { title: "{{__('note')}}" },
      { title: "{{__('price Expense')}}" },
      { title: "{{__('Date')}}" },
      { title: "{{__('image')}}" },
     
  
      ],
    });
  
  
   
  
  
  
  
  })(jQuery);
  
  </script>
  
<script>

  (function($) {
    'use strict';
  
     var dataSet1245 = [
      @foreach ($orders as $order)
                              
  
     [ "{{ $order->nOrder }}","  {{ $order->taux }}",  "{{ $order->orderType }}", "{{ $order->paymentMethod }}", "{{ $order->created_at }}", "{{ $order->priceOrder }} SAR"],
     
                              @endforeach
  ];
  
  
  
  
  
  
  
  
  
    var tableFour = $('#data-table-12345').DataTable( {
      data: dataSet1245,
      columns: [
        { title: "nOrder" },
        { title: "taux" },
  
        { title: "orderType" },
        { title: "paymentMethod" },
        { title: "date" },
        { title: "priceOrder" },
  
  
      ],
    });
  
  
   
  
  
  
  
  })(jQuery);
  
  </script>
  
<script>















  (function($) {
    'use strict';
  
     var dataSet12history = [
      @foreach ($historyTransactions as $historyTransaction)
                              
  
     [ "{{ $historyTransaction->type }}","  {{ $historyTransaction->restaurant->name }}",  "@if( $historyTransaction->employee_id) {{ $historyTransaction->employee->idEmployee }} @endif", "{{ $historyTransaction->productVersion->product->productName }}","{{ $historyTransaction->oldqnt }}","{{ $historyTransaction->qnt }}" ,"{{ $historyTransaction->noteIfDelete }}" ,"{{ $historyTransaction->created_at }}"],
     
                              @endforeach
  ];
  
  
  
  
  
  
  
  
  
    var tableFour = $('#data-table-history').DataTable( {
      data: dataSet12history,
      columns: [
        { title: "type" },
        { title: "restaurant name" },
  
        { title: "employee_id" },
        { title: "product_version_id" },
        { title: "oldqnt" },
        { title: "qnt" },
        { title: "noteIfDelete" },
        { title: "date" },
      
      
  
  
      ],
    });
  
  
   
  
  
  
  
  })(jQuery);
  
  </script>

<script>
  $(document).ready(function() { 	
  $('a').removeClass( "active" ) ;
  
  $(".clikihafhome").each(function(){
      $(this).click();
  });
  
  });
  
    </script>
@endsection

