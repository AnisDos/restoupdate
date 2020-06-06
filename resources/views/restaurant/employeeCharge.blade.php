
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
              <li class="breadcrumb-item active" aria-current="page">{{__('Employee Expense List')}}</li>

  
          
            </ol>
          </nav>


                  


          <div class="ms-panel">
            <div class="ms-panel-header">
              <h6>{{__('Employee Expense List')}}</h6>
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


<form id="form_ex_send" method="POST" action="{{ url('/restaurant/validatePayEmployee') }}" >
    @csrf


      
   
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="exampleModalLabel"></h4>
        </div>
        <div class="modal-body khta">
         
            <div class="form-group">
              <label for="recipient-name" id="labelFrom"  class="control-label">Do you want to pay </label>
              <p id="labelTo" > </p>
              <input name="id_employee" id="hiddenIdProduct" type="hidden" value="" >
              <input name="total" id="hiddentotale" type="hidden" value="" >
       
             
            </div>
        
      
       <strong>   <p id="totalOldNew" > </p>    </strong>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
  
          <button type="submit" class="btn btn-primary"  id="regitEx"  onclick="event.preventDefault();
          document.getElementById('form_ex_send').submit();"  > submit</button>







       
        </div>
      </div>
    </div>
  </div>       




  



</form>
<!-------------------------------------------------------------------->






  
@endsection




@section('script')

<script>

function changeTextOfLabelInCOnfermationAlert(id,idEmployee,employeeName,total){
    
                              
      document.getElementById('hiddenIdProduct').value = id;
      document.getElementById('hiddentotale').value = total;
      document.getElementById('labelFrom').innerHTML = 'ID of Employee <strong>  '  + idEmployee+ '</strong> and his name is : <strong>   '  + employeeName+ '  </strong>';      
      document.getElementById('labelTo').innerHTML = "Pay totale of:  "  + total+ " SAR   ";
            
            
            
            };

</script>
<script>

(function($) {
  'use strict';

   var dataSet12 = [
    @foreach ($employees as $employee)
                            

   [ "{{ $employee->idEmployee }}",
   "  {{ $employee->user->email}}",  
   "{{ $employee->type}}",
    "{{ $employee->hWork}}", 
    "{{ $employee->price_ph}}",
    "{{ $employee->hWork * $employee->price_ph}}",
    "@if( $employee->charges()->exists() ) {{ $employee->charges()->latest()->first()->created_at}} @else <p style='color:red' > never get payed </p> @endif",
    "<button id='exNoForm' class='ms-btn-icon btn-success'  \
    onclick=\"changeTextOfLabelInCOnfermationAlert({{ $employee->id}},'{{ $employee->idEmployee}}','{{ $employee->nameEmployee}}',{{ $employee->hWork * $employee->price_ph}})\" \
    type='button' data-toggle='modal' data-target='#exampleModal' data-whatever='@getbootstrap' > <i class='flaticon-tick-inside-circle' ></i></button>"],
   
                            @endforeach

  ];









  var tableFour = $('#data-table-123').DataTable( {
    data: dataSet12,
    columns: [
      { title: "{{__('ID Employee')}}" },
      { title: "{{__('Email')}}" },

      { title: "{{__('Type')}}" },
      { title: "{{__('Hour of Work')}}" },
      { title: "{{__('Price per Hour')}}" },
      { title: "{{__('Total to Pay')}}" },
      { title: "{{__('Date last Pay')}}" },
      { title: "{{__('Action')}}" },



    ],
  });


 




})(jQuery);

</script>

  
@endsection
