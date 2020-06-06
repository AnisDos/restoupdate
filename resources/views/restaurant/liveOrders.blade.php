
@extends('restaurant.base')



@section('content')
{{App::setLocale(Session::get('locale'))}}



    <div class="ms-content-wrapper">
      <div class="row">

        <div class="col-md-12">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb pl-0">
              <li class="breadcrumb-item"><a href="#"><i class="material-icons">home</i> {{__('Home')}}</a></li>
              <li class="breadcrumb-item"><a href="#">{{__('Menu')}}</a></li>
              <li class="breadcrumb-item active" aria-current="page">{{__('orders List')}}</li>

  
          
            </ol>
          </nav>


                  


          <div class="ms-panel">
            <div class="ms-panel-header">
              <h6>{{__('Completed Orders List')}}</h6>
            </div>
            <div class="ms-panel-body">
              <div class="table-responsive">
                <table id="data-table-123" class="table w-100 thead-primary"></table>
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

   var dataSet12 = [
    @foreach ($orders as $order)
                            

   [ "{{ $order->nOrder }}","  {{ $order->taux }}",  "{{ $order->orderType }}", "{{ $order->paymentMethod }}", "{{ $order->created_at }}", "{{ $order->priceOrder }}"],
   
                            @endforeach
];









  var tableFour = $('#data-table-123').DataTable( {
    data: dataSet12,
    columns: [
      { title: "{{__('n° Order')}}" },
      { title: "{{__('taux')}}" },

      { title: "{{__('Order Type')}}" },
      { title: "{{__('Payment Method')}}" },
      { title: "{{__('date')}}" },
      { title: "{{__('Price Order')}}" },


    ],
  });


 




})(jQuery);

</script>

  
@endsection
