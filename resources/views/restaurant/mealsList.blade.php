
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
              <li class="breadcrumb-item active" aria-current="page">{{__('Menu')}}</li>

  
          
            </ol>
          </nav>


                  


          <div class="ms-panel">
            <div class="ms-panel-header">
              <h6>{{__('Meals List')}}</h6>
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
    @foreach ($meals as $meal)
                            

   [ "{{ $meal->id }}","  <img src='/storage/{{$meal->image}}' style='width:50px; height:30px;'>{{ $meal->mealName }}",   "@if($meal->public) Activate @else Deactivate @endif", "{{ $meal->price }} SAR","{{ $meal->priceMealIng }} SAR"," @if($meal->id_screen == null) <span style='color:green' > No Screen </span> @else {{ $meal->name_screen }} @endif","<a href='/restaurant/mealDetails/{{$meal->id}}  '> Show</a>"],
   
                            @endforeach
];









  var tableFour = $('#data-table-123').DataTable( {
    data: dataSet12,
    columns: [
      { title: "{{__('Meal ID')}}" },
      { title: "{{__('Meal Name')}}" },

      { title: "{{__('Status')}}" },
      { title: "{{__('Price')}}" },
      { title: "{{__('Cost')}}" },
      { title: "{{__('Screen Name')}}" },
      { title: "{{__('Details')}}" },


    ],
  });


 




})(jQuery);

</script>

  
@endsection
