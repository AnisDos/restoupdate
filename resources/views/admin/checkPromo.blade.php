
@extends('admin.base')



@section('content')


{{App::setLocale(Session::get('locale'))}}



    <div class="ms-content-wrapper">
      <div class="row">

        <div class="col-md-12">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb pl-0">
              <li class="breadcrumb-item"><a href="#"><i class="material-icons">home</i> Home</a></li>
              <li class="breadcrumb-item"><a href="#">Menu</a></li>
              <li class="breadcrumb-item active" aria-current="page">Others</li>

  
          
            </ol>
          </nav>


            







      
          


          <div class="ms-panel">
            <div class="ms-panel-header">
              <h6>{{__('Restaurants List')}}</h6>
            </div>
            <div class="ms-panel-body">
              <div class="table-responsive">
                <table id="tablescreen" class="table table-hover w-100"></table>
              </div>
            </div>
          </div>






                


          <div class="ms-panel">
            <div class="ms-panel-header">
              <h6>{{__('Customers List')}}</h6>
            </div>
            <div class="ms-panel-body">
              <div class="table-responsive">
                <table id="data-table-123" class="table table-hover w-100"></table>
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

   var dataSet12 =
   
   [
        @foreach ($customer_promos as $customer_promo)
    
            [
                @foreach ($customer_promo as $promo)
                  "{{ $promo }}",
                @endforeach
            ],
            
        @endforeach
    ];








  var tableFour = $('#data-table-123').DataTable( {
    data: dataSet12,
    columns: [
      { title: "{{__('Customer name')}}" },
      { title: "{{__('Restaurant Name')}}" },
      { title: "{{__('Nbr use code')}}" },



    ],
  });


 




})(jQuery);

</script>

  
<script>

    (function($) {
      'use strict';
    
       var dataSet12 = 
    [
        @foreach ($resto_promos as $resto_promo)
    
            [
                @foreach ($resto_promo as $promo)
                  "{{ $promo }}",
                @endforeach
            ],
            
        @endforeach
    ];
    
    
    
    
    
    
    
    
    
      var tableFour = $('#tablescreen').DataTable( {
        data: dataSet12,
        columns: [
          { title: "{{__('Restaurant Name')}}" },
          { title: "{{__('Nbr use code')}}" },
        
    
    
         
    
    
        ],
      });
    
    
     
    
    
    
    
    })(jQuery);
    
    </script>
    
    
@endsection
