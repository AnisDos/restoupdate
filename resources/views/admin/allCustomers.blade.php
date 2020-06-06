
@extends('admin.base')



@section('content')
{{App::setLocale(Session::get('locale'))}}
<?php
use Carbon\Carbon;
?>



    <div class="ms-content-wrapper">
      <div class="row">

        <div class="col-md-12">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb pl-0">
              <li class="breadcrumb-item"><a href="#"><i class="material-icons">home</i> Home</a></li>
              <li class="breadcrumb-item"><a href="#">Customers</a></li>
              <li class="breadcrumb-item active" aria-current="page">All Customers</li>

  
          
            </ol>
          </nav>


                  


          <div class="ms-panel">
            <div class="ms-panel-header">
            <h6>Spent of Customers This <span style="color:orange" > {{ Carbon::now()->format('M') }} </span> </h6>
            </div>
            <div class="ms-panel-body">
              <div class="table-responsive">
                <table id="data-table-123" class="table w-100 thead-primary"></table>
              </div>
            </div>

            
          </div>







          

          <div class="ms-panel">
            <div class="ms-panel-header">
              <h6>all Customers</h6>
            </div>
            <div class="ms-panel-body">
              <div class="table-responsive">
                <table id="data-table-1234" class="table w-100 thead-primary"></table>
              </div>
            </div>

            
          </div>




      
          









        </div>

      </div>
    </div>
  
  
@endsection




@section('script')

<script>


    
(function($) {
  'use strict';

   var dataSet123 = [
    @foreach ($allcustomers as $customer)
                            

   [ "{{ $customer->id_customer }}","  {{ $customer->customerName }}", "  {{ $customer->resname }}", "{{ $customer->tel }}"],
   
                            @endforeach
];









  var tableFour = $('#data-table-1234').DataTable( {
    data: dataSet123,
    columns: [
      { title: "customer ID" },
      { title: "customer Name" },
      { title: "Restaurant Name" },

      { title: "tel" },
 
    
    


    ],
  });


 




})(jQuery);














(function($) {
  'use strict';

   var dataSet12 = [
    @foreach ($customers as $customer)
                            

   [ "{{ $customer->id_customer }}","  {{ $customer->customerName }}","  {{ $customer->resname }}",  "{{ $customer->tel }}", "{{ $customer->priceIng }} SAR"],
   
                            @endforeach
];









  var tableFour = $('#data-table-123').DataTable( {
    data: dataSet12,
    columns: [
      { title: "customer ID" },
      { title: "customer Name" },
      { title: "Restaurant Name" },

      { title: "tel" },
      { title: "Total Spent This Month <span style='color:orange' > {{ Carbon::now()->format('M') }} </span> " },
    
    


    ],
  });


 




})(jQuery);

</script>

  
@endsection
