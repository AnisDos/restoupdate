
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
              <li class="breadcrumb-item"><a href="#">{{__('Charge')}}</a></li>
              <li class="breadcrumb-item active" aria-current="page">{{__('Add sub charge')}}</li>
            </ol>
          </nav>




          







        </div>


        <div class="col-xl-12 col-md-12">
            <div class="ms-panel ms-panel-fh">
              <div class="ms-panel-header">
                <h6>{{__('Add sub charge Form')}}</h6>
              </div>
              <div class="ms-panel-body">
                <form enctype="multipart/form-data" method="POST"  action="{{ url('restaurant/addSupChargeForm') }}"  class="needs-validation clearfix" novalidate>
                
                  @csrf
                    <div class="form-row">
    
    
    
                                
             
        
    
             
                      
                      <div class="col-md-12 mb-3">
                        <label for="validationCustom18">{{__('Price Charge')}}</label>
                        <div class="input-group">
                          <input type="number" min="0" step=".01" name="priceCharge" value="{{ old('priceCharge') }}"  class="form-control @error('priceCharge') is-invalid @enderror" id="validationCustom18" placeholder="priceCharge" required >
                          <div class="valid-feedback">
                            Looks good!
                          </div>
                          @error('priceCharge')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                          @enderror
                        </div>
                      </div>


                           
                  <div class="col-md-12 mb-3">
                    <label for="validationCustom12">{{__('note')}}</label>
                    <div class="input-group">
                      <textarea rows="5"  name="note" id="validationCustom12"   class="form-control @error('price') is-invalid @enderror" placeholder="Message" required >{{ old('note') }}</textarea>
                      @error('note')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                    </div>
                  </div>




                        
                        <div class="col-md-12 mb-3">
                          <label for="validationCustom12">{{__('Evidence')}}</label>
                          <div class="custom-file">
                            <input type="file" name="image" value="{{ old('image') }}"  class="custom-file-input @error('image') is-invalid @enderror" id="validatedCustomFile">
                            <label class="custom-file-label" for="validatedCustomFile">Upload Images...</label>
                          
                            @error('image')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
      
                          </div>
                        </div>
    
    
                    </div>
    
    
    
                    <div class="ms-panel-header new">
                      <button class="btn btn-primary d-block" type="submit">{{__('Add Expenses')}}</button>
                    </div>
    
    
    
                  </form>
  
            </div>
            </div>
        </div>







        <div class="col-xl-12 col-md-12">
          <div class="ms-panel">
            <div class="ms-panel-header">
              <h6>{{__('All Expenses List')}}</h6>
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
<!-- ========================================================================== -->
<!-- ========================================================================== -->
<!-- ========================================================================== -->
<!-- ========================================================================== -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel"></h4>
      </div>
      <div class="modal-body khta"> 
          <img style="background-size:100% 100%;" id="image_src_image" src="" >
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>       
<!-- ========================================================================== -->
<!-- ========================================================================== -->
<!-- ========================================================================== -->
<!-- ========================================================================== -->
<!-- ========================================================================== -->


























  
    @endsection

    

@section('script')



<script>

  function changeTextOfLabelInCOnfermationAlert(image_src){
    


    document.getElementById("image_src_image").src="/storage/"+image_src;      
     
              
              
              };
  
  </script>
<script>

(function($) {
  'use strict';

   var dataSet12 = [
    @foreach ($charges as $charge)
                            

   [ "  {{ $charge->type }}"," @if( $charge->type == 'employee') {{ $charge->employee->idEmployee }}  @endif ",  " @if( $charge->type == 'delevryCompany' ){{ $charge->delivery_companies->deliveryCompaniesName }} @endif ", "{{ $charge->note }}", "{{ $charge->priceCharge }} SAR","{{ $charge->created_at }}" ,"@if( $charge->type == 'additional') @if($charge->image)<img src='/storage/{{ $charge->image }}' onclick=\"changeTextOfLabelInCOnfermationAlert('{{ $charge->image}}')\" data-toggle='modal' data-target='#exampleModal' data-whatever='@getbootstrap' > @endif @endif"],
   
                            @endforeach
];









  var tableFour = $('#data-table-123').DataTable( {
    data: dataSet12,
    columns: [
    
      { title: "{{__('type')}}" },
      { title: "{{__('Id Employee')}}" },
      { title: "{{__('delivery Company Name')}}" },
      { title: "{{__('note')}}" },
      { title: "{{__('price Expense')}}" },
      { title: "{{__('Date')}}" },
      { title: "{{__('image')}}" },
   

    ],
  });


 




})(jQuery);

</script>

  
@endsection
