
@extends('restaurant.base')



@section('content')
{{App::setLocale(Session::get('locale'))}}


<?php
use Carbon\Carbon;
?>


    <!-- Body Content Wrapper -->
    <div class="ms-content-wrapper">
      <div class="row">

        <div class="col-md-12">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb pl-0">
              <li class="breadcrumb-item"><a href="#"><i class="material-icons">home</i> {{__('Home')}}</a></li>
              <li class="breadcrumb-item"><a href="#">{{__('Menu')}}</a></li>
              <li class="breadcrumb-item active" aria-current="page">{{__('Add Screen')}}</li>
            </ol>
          </nav>




        
   
        







        </div>



        <div class="col-xl-6 col-md-12">
          <div class="ms-panel ms-panel-fh">
            <div class="ms-panel-header">
              <h6>{{__('Add Screen Form')}}</h6>
            </div>
            <div class="ms-panel-body">
              <form method="POST"  action="{{ url('restaurant/addScreenForm') }}"  class="needs-validation clearfix" novalidate>
                
              @csrf
                <div class="form-row">



                            
         
    

                  <div class="col-md-12 mb-3">
                    <label for="validationCustom18">{{__('Screen Name')}}</label>
                    <div class="input-group">
                      <input type="text" name="name_screen" value="{{ old('name_screen') }}"  class="form-control @error('name_screen') is-invalid @enderror" id="validationCustom18" placeholder="Screen Name" required >
                      <div class="valid-feedback">
                        Looks good!
                      </div>
                      @error('name_screen')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                    </div>
                  </div>



                </div>



                <div class="ms-panel-header new">
                  <button class="btn btn-primary d-block" type="submit">{{__('Add Screen')}}</button>
                </div>



              </form>

            </div>
          </div>

        </div>

        


        <div class="col-xl-6 col-md-12">
        <div class="ms-panel">
          <div class="ms-panel-header">
            <h6>{{__('All Screens List')}}</h6>
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





    
<!-- ========================================================================== -->


<form id="form_ex_send" method="POST" action="{{ url('/restaurant/updateNameScreen') }}" >
  @csrf


    
 
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel"></h4>
      </div>
      <div class="modal-body khta">


        <input name="id_screen" id="hiddenIdScreen" type="hidden" value="" >
         
   


        
        <div class="col-md-12 mb-3">
          <label for="inputcatnoarab">{{__('Screen Name')}}</label>
          <div class="input-group">
            <input type="text" name="name_screenUp" value="{{ old('name_screen') }}"  class="form-control @error('name_screen') is-invalid @enderror" id="inputcatnoarab"   >
            <div class="valid-feedback">
              Looks good!
            </div>
            @error('name_screen')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>
        </div>


       




      
    
     
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

        <button type="submit" class="btn btn-primary"  id="regitEx"  onclick="event.preventDefault();
        document.getElementById('form_ex_send').submit();"  > Update</button>







     
      </div>
    </div>
  </div>
</div>       








</form>
<!-------------------------------------------------------------------->





  
    @endsection












    
@section('script')

<script>

(function($) {
  'use strict';

   var dataSet12 = [
    @foreach ($screens as $screen)



   [ "{{ $screen->id_screen }}","  {{ $screen->name_screen }}", 
   "<button id='exNoForm' class='ms-btn-icon btn-success'  \
    onclick=\"changeTextOfLabelInCOnfermationAlert({{ $screen->id}},'{{ $screen->name_screen}}')\" \
    type='button' data-toggle='modal' data-target='#exampleModal' data-whatever='@getbootstrap' > <i class='flaticon-tick-inside-circle' ></i></button>"
   

   ],
   
                            @endforeach
];









  var tableFour = $('#data-table-123').DataTable( {
    data: dataSet12,
    columns: [
      { title: "{{__('screen ID')}}" },
      { title: "{{__('screen Name')}}" },
      { title: "{{__('Action')}}" },

     


    ],
  });


 




})(jQuery);

</script>

<script>

  function changeTextOfLabelInCOnfermationAlert(idScreen,catName){
    


                                
        document.getElementById('hiddenIdScreen').value = idScreen;
        document.getElementById('inputcatnoarab').value = catName;
     
              
              
              };
  
  </script>
@endsection
