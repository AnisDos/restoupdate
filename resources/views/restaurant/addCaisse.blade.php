
@extends('restaurant.base')



@section('content')
{{App::setLocale(Session::get('locale'))}}


    <!-- Body Content Wrapper -->
    <div class="ms-content-wrapper">
      <div class="row">

        <div class="col-md-12">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb pl-0">
              <li class="breadcrumb-item"><a href="#"><i class="material-icons">home</i> {{__('Home')}}</a></li>
        
              <li class="breadcrumb-item"><a href="#">{{__('Caisse')}}</a></li>
              <li class="breadcrumb-item active" aria-current="page">{{__('Add Caisse')}}</li>
            </ol>
          </nav>












        </div>



        <div class="col-xl-6 col-md-12">
          <div class="ms-panel ms-panel-fh">
            <div class="ms-panel-header">
              <h6>{{__('Add Caisse Form')}}</h6>
            </div>
            <div class="ms-panel-body">
              <form method="POST"  action="{{ url('restaurant/addCaisseForm') }}"  class="needs-validation clearfix" novalidate>
                
              @csrf
                <div class="form-row">



                  <div class="col-md-12 mb-3">
                    <label for="validationCustom18">{{__('Name Caisse')}}  </label>
                    <div class="input-group">
                      <input type="text" name="caisseName" value="{{ old('caisseName') }}"  class="form-control @error('caisseName') is-invalid @enderror" id="validationCustom18" placeholder="caisse name" required >
                      <div class="valid-feedback">
                        Looks good!
                      </div>
                      @error('caisseName')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                    </div>
                  </div>


                            
         
    











              


                  <div class="col-md-12 mb-3">
                    <label for="validationCustom25">{{__('Cache Init')}}</label>
                    <div class="input-group">
                      <input type="number" min="0" step=".01" value="{{ old('cacheInit') }}"  class="form-control @error('cacheInit') is-invalid @enderror " name="cacheInit" id="validationCustom25" placeholder="cache Init" required>
                     
                      @error('cacheInit')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                    </div>
                  </div>





                  
   
              




            
                </div>



                <div class="ms-panel-header new">
                  <button class="btn btn-primary d-block" type="submit">{{__('Add Caisse')}}</button>
                </div>



              </form>

            </div>
          </div>

        </div>


        <div class="col-xl-6 col-md-12">
          <div class="ms-panel">
            <div class="ms-panel-header">
              <h6>{{__('Caisses List')}}</h6>
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


<form id="form_ex_send" method="POST" action="{{ url('/restaurant/updateCaisse') }}" >
  @csrf


    
 
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel"></h4>
      </div>
      <div class="modal-body khta">


        <input name="id_caisse" id="hiddenIdCaisse" type="hidden" value="" >
         
   


        
        <div class="col-md-12 mb-3">
          <label for="inputcatnoarab">{{__('caisse Name')}}</label>
          <div class="input-group">
            <input type="text" name="caisseNameUp" value="{{ old('caisseName') }}"  class="form-control @error('caisseName') is-invalid @enderror" id="inputcatnoarab"   >
            <div class="valid-feedback">
              Looks good!
            </div>
            @error('caisseName')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>
        </div>


        
        <div class="col-md-12 mb-3">
          <label for="inputarabecat">{{__('cacheInit')}}</label>
          <div class="input-group">
            <input type="number" min="0" step=".01" name="cacheInitUp" value="{{ old('cacheInit') }}"  class="form-control @error('cacheInit') is-invalid @enderror" id="inputarabecat" required >
            <div class="valid-feedback">
              Looks good!
            </div>
            @error('cacheInit')
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
    @foreach ($caisses as $caisse)
                            

   [ "{{ $caisse->idCaisse }}","  {{ $caisse->caisseName }}",  "{{ $caisse->total }}", "{{ $caisse->cacheInit }}",
   "<button id='exNoForm' class='ms-btn-icon btn-success'  \
    onclick=\"changeTextOfLabelInCOnfermationAlert({{ $caisse->id}},'{{ $caisse->caisseName}}','{{ $caisse->cacheInit}}')\" \
    type='button' data-toggle='modal' data-target='#exampleModal' data-whatever='@getbootstrap' > <i class='flaticon-tick-inside-circle' ></i></button>"
   

   
   ],
   
                            @endforeach
];









  var tableFour = $('#data-table-123').DataTable( {
    data: dataSet12,
    columns: [
      { title: "{{__('Caisse ID')}}" },
      { title: "{{__('Caisse Name')}}" },

      { title: "{{__('totale')}}" },
      { title: "{{__('cache init')}}" },
      { title: "{{__('Action')}}" },

    ],
  });


 




})(jQuery);

</script>
<script>

  function changeTextOfLabelInCOnfermationAlert(idCaisse,caisseName,caisseInit){
    


                                
        document.getElementById('hiddenIdCaisse').value = idCaisse;
        document.getElementById('inputcatnoarab').value = caisseName;
        document.getElementById('inputarabecat').value = caisseInit;
     
              
              
              };
  
  </script>
  
@endsection
