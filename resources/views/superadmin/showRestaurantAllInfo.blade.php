
@extends('superadmin.base')



@section('content')

<?php
use Carbon\Carbon;
?>



    <div class="ms-content-wrapper">
      <div class="row">

        <div class="col-md-12">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb pl-0">
              <li class="breadcrumb-item"><a href="#"><i class="material-icons">home</i> Home</a></li>
              <li class="breadcrumb-item"><a href="#">Menu</a></li>
              <li class="breadcrumb-item active" aria-current="page">Menu List</li>

  
          
            </ol>
          </nav>


                  


          <div class="ms-panel">
            <div class="ms-panel-header">
              <h6>Product List</h6>
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
    @foreach ($users as $user)
                            

   [ " {{ $user->name }}","{{ $user->email }}",  "{{ $user->address }}", "{{ $user->restaurant_key }}", "{{ $user->date_experation }}","@if($user->date_experation < Carbon::now()) - @endif{{(Carbon::parse($user->date_experation))->diffInDays(Carbon::now())}} ","@if($user->verified)<div style='color:green'> active </div> @else <div style='color:red'> noActive </div> @endif","<a href='/superadmin/showRestaurantAllInfoByOne/{{$user->admin_id}}'> check =></a>"],
   
                            @endforeach
 ];









  var tableFour = $('#data-table-123').DataTable( {
    data: dataSet12,
    columns: [
      { title: "Username"  },
      { title: "Email" },

      { title: "Address" },
      { title: "Key" },
      { title: "Date Experation" },
      { title: "Days left" },
      { title: "Status" },

      { title: "Action" },

    ],
  });


 




})(jQuery);

</script>

  
@endsection
