
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
              <li class="breadcrumb-item active" aria-current="page">Menu List</li>

  
          
            </ol>
          </nav>


                  


          <div class="ms-panel">
            <div class="ms-panel-header">
              <h6>Product List</h6>
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

   var dataSet12 = [
    @foreach ($restaurants as $restaurant)
                            

   [ "{{ $restaurant->id }}","  <img src='/storage/{{$restaurant->image}}' style='width:50px; height:30px;'>{{ $restaurant->name }}",  "{{ $restaurant->address }}","<a href='/admin/restaurantDetails/{{$restaurant->id}}  '> DETAILS</a>"],
   
                            @endforeach
 ];









  var tableFour = $('#data-table-123').DataTable( {
    data: dataSet12,
    columns: [
      { title: "Restaurant ID" },
      { title: "Restaurant Name" },

      { title: "address" },
  
      { title: "details" },


    ],
  });


 




})(jQuery);

</script>

  
@endsection
