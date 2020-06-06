
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
              <h6>{{__('Caisses List')}}</h6>
            </div>
            <div class="ms-panel-body">
              <div class="table-responsive">
                <table id="data-table-123" class="table table-hover w-100"></table>
              </div>
            </div>

            
          </div>







      
          


          <div class="ms-panel">
            <div class="ms-panel-header">
              <h6>{{__('Screens List')}}</h6>
            </div>
            <div class="ms-panel-body">
              <div class="table-responsive">
                <table id="tablescreen" class="table table-hover w-100"></table>
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
    @foreach ($caisses as $caisse)
                            

     ["{{ $caisse->resname }}", "{{ $caisse->idCaisse }}","  {{ $caisse->caisseName }}",  "{{ $caisse->total }}", "{{ $caisse->cacheInit }}"
                         
                            
                            ],
                            
                                                     @endforeach
 ];









  var tableFour = $('#data-table-123').DataTable( {
    data: dataSet12,
    columns: [
      { title: "{{__('Restaurant Name')}}" },
      { title: "{{__('Caisse ID')}}" },
      { title: "{{__('Caisse Name')}}" },
      { title: "{{__('totale')}}" },
      { title: "{{__('cache init')}}" },


    ],
  });


 




})(jQuery);

</script>

  
<script>

    (function($) {
      'use strict';
    
       var dataSet12 = [
        @foreach ($screens as $screen)
    
    
    
       [ "{{ $screen->resname }}","{{ $screen->id_screen }}","  {{ $screen->name_screen }}", 
   
    
       ],
       
                                @endforeach
    ];
    
    
    
    
    
    
    
    
    
      var tableFour = $('#tablescreen').DataTable( {
        data: dataSet12,
        columns: [
          { title: "{{__('Restaurant Name')}}" },
          { title: "{{__('screen ID')}}" },
          { title: "{{__('screen Name')}}" },
    
    
         
    
    
        ],
      });
    
    
     
    
    
    
    
    })(jQuery);
    
    </script>
    
    
@endsection
