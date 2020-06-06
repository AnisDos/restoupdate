
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
                            

   [ " {{ $user->name }}","{{ $user->email }}",  "{{ $user->address }}", "{{ $user->restaurant_key }}", "{{ $user->date_experation }}","{{(Carbon::parse($user->date_experation))->diffInDays(Carbon::now())}} "],
   
                            @endforeach
    [ "40521","  <img src='../../assets/img/costic/pizza.jpg' style='width:50px; height:30px;'>pizza",  "5421", "In Stock", "$32","564"],
    [ "98521", "<img src='../../assets/img/costic/pizza.jpg' style='width:50px; height:30px;'>shake", "8422", "In Stock", "$17","564"],
    [ "45454", "<img src='../../assets/img/costic/egg-sandwich.jpg' style='width:50px; height:30px;'>Burger",  "1562", "In Stock", "$86" ,"564"],
    [ "12121", "<img src='../../assets/img/costic/egg-sandwich.jpg' style='width:50px; height:30px;'>Noodels",  "6224", "In Stock", "$43" ,"564"],
    [ "14451", "<img src='../../assets/img/costic/french-fries.jpg' style='width:50px; height:30px;'>pizza",  "5384", "Out Of Stock", "$85","564" ]
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


    ],
  });


 




})(jQuery);

</script>

  
@endsection
