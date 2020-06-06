
@extends('restaurant.base')



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
              <li class="breadcrumb-item"><a href="#"><i class="material-icons">home</i> {{__('Home')}}</a></li>
              <li class="breadcrumb-item"><a href="#">{{__('Menu')}}</a></li>
              <li class="breadcrumb-item active" aria-current="page">{{__('History of Actions')}}</li>

  
          
            </ol>
          </nav>


                  


          <div class="ms-panel">
            <div class="ms-panel-header">
            <h6>{{__('All Actions in your System')}}  </h6>
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
    @foreach ($historyTransactions as $historyTransaction)
                            

   [ "{{ $historyTransaction->type }}","  {{ $historyTransaction->restaurant->name }}",  "@if( $historyTransaction->employee_id) {{ $historyTransaction->employee->idEmployee }} @endif", "{{ $historyTransaction->productVersion->product->productName }}","{{ $historyTransaction->oldqnt }}","{{ $historyTransaction->qnt }}" ,"{{ $historyTransaction->noteIfDelete }}" ,"{{ $historyTransaction->created_at }}"],
   
                            @endforeach
];









  var tableFour = $('#data-table-123').DataTable( {
    data: dataSet12,
    columns: [
      { title: "{{__('type')}}" },
      { title: "{{__('restaurant name')}}" },

      { title: "{{__('ID Employee')}}" },
      { title: "{{__('Product Version Id')}}" },
      { title: "{{__('old qnt')}}" },
      { title: "{{__('qnt')}}" },
      { title: "{{__('note If Delete')}}" },
      { title: "{{__('date')}}" },
    
    


    ],
  });


 




})(jQuery);

</script>

  
@endsection
