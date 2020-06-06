
@extends('admin.base')



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
              <li class="breadcrumb-item"><a href="#">{{__('Others')}}</a></li>
              <li class="breadcrumb-item active" aria-current="page">{{__('Promo Code')}}</li>
            </ol>
          </nav>




        
   
        







        </div>



        <div class="col-xl-12 col-md-12">
          <div class="ms-panel ms-panel-fh">
            <div class="ms-panel-header">
              <h6>{{__('Add Screen Form')}}</h6>
            </div>
            <div class="ms-panel-body">
              <form method="POST"  action="{{ url('admin/addCodePromo') }}"  class="needs-validation clearfix" novalidate>
                
              @csrf
                <div class="form-row">



                            
         
    

                  <div class="col-md-12 mb-3">
                    <label for="codePromo156">{{__('Code Promo')}}</label>
                    <div class="input-group">
                      <input type="text" name="codePromo" value="{{ old('codePromo') }}"  class="form-control @error('codePromo') is-invalid @enderror" id="codePromo156" placeholder="Code Promo" required >
                      <div class="valid-feedback">
                        Looks good!
                      </div>
                      @error('codePromo')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                    </div>
                  </div>






                  <div class="col-md-12 mb-3">
                    <label for="taux5656">{{__('taux')}}</label>
                    <div class="input-group">
                      <input type="number" min="0" step=".01" value="{{ old('taux') }}"  class="form-control @error('taux') is-invalid @enderror " name="taux" id="taux5656" placeholder="taux" required>
                     
                      @error('taux')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                    </div>
                  </div>









                  <div class="col-md-12 mb-3">
                    <label for="tdate_debut656">{{__('date_debut')}}</label>
                    <div class="input-group">
                        <input type="date" name="date_debut" value="{{ old('date_debut') }}"  class="form-control @error('date_debut') is-invalid @enderror" id="tdate_debut656" placeholder="date_debut" required >
                               
                      @error('date_debut')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                    </div>
                  </div>



                  <div class="col-md-12 mb-3">
                    <label for="tdate_fin656">{{__('date_fin')}}</label>
                    <div class="input-group">
                        <input type="date" name="date_fin" value="{{ old('date_fin') }}"  class="form-control @error('date_fin') is-invalid @enderror" id="tdate_fin656" placeholder="date_fin" required >
                               
                      @error('date_fin')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                    </div>
                  </div>


                  <div class="col-md-12 mb-3">
                    <label for="nbr_rst76886764">nbr_rst</label>
                    <div class="input-group">
                      <input type="number" name="nbr_rst" value="{{ old('nbr_rst') }}"  class="form-control @error('nbr_rst') is-invalid @enderror" id="nbr_rst76886764" placeholder="nbr_rst" required >
                      <div class="valid-feedback">
                        Looks good!
                      </div>
                      @error('nbr_rst')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                    </div>
                  </div>







                </div>



                <div class="ms-panel-header new">
                  <button class="btn btn-primary d-block" type="submit">{{__('Add Code')}}</button>
                </div>



              </form>

            </div>
          </div>

        </div>

        


        <div class="col-xl-12 col-md-12">
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


<form id="form_ex_send" method="POST" action="{{ url('/admin/deletePromo') }}" >
  @csrf


    
 
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel"></h4>
      </div>
      <div class="modal-body khta">


        <input name="id_promo" id="hiddenIdScreen" type="hidden" value="" >
         
   

<h3> Do you want delete this code? </h3>
        
      
    
     
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

        <button type="submit" class="btn btn-primary"  id="regitEx"  onclick="event.preventDefault();
        document.getElementById('form_ex_send').submit();"  > Delete</button>







     
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
    @foreach ($promos as $promo)



   [ "{{ $promo->codePromo	 }}","  {{ $promo->taux }}" ,"  {{ $promo->date_debut }}" ,"  {{ $promo->date_fin }}","  {{ $promo->nbr_rst }}", 
   "<button id='exNoForm' class='ms-btn-icon btn-danger'  \
    onclick=\"changeTextOfLabelInCOnfermationAlert({{ $promo->id}})\" \
    type='button' data-toggle='modal' data-target='#exampleModal' data-whatever='@getbootstrap' > <i class='flaticon-tick-inside-circle' ></i></button>",


    "<a href='/admin/checkPromo/{{ $promo->id}}' class='ms-btn-icon btn-success'  \
       > <i class='flaticon-tick-inside-circle' ></i></a>"
   
   

   ],
   
                            @endforeach
];









  var tableFour = $('#data-table-123').DataTable( {
    data: dataSet12,
    columns: [
      { title: "{{__('Promo Code')}}" },
      { title: "{{__('Taux')}}" },
      { title: "{{__('Date from')}}" },
      { title: "{{__('Date to')}}" },
      { title: "{{__('Nbr')}}" },
      { title: "{{__('Delete')}}" },

      
      { title: "{{__('Check')}}" },

     


    ],
  });


 




})(jQuery);

</script>

<script>

  function changeTextOfLabelInCOnfermationAlert(idPromo){
    


                                
        document.getElementById('hiddenIdScreen').value = idPromo;
     
              
              
              };
  
  </script>
@endsection
