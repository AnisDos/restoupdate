
@extends('restaurant.base')



@section('content')
{{App::setLocale(Session::get('locale'))}}



    <div class="ms-content-wrapper">
      <div class="row">

        <div class="col-md-12">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb pl-0">
              <li class="breadcrumb-item"><a href="#"><i class="material-icons">home</i> {{__('Home')}}</a></li>
              <li class="breadcrumb-item"><a href="#">{{__('Stock Products')}}</a></li>
              <li class="breadcrumb-item active" aria-current="page">{{__('Products List')}}</li>

  
          
            </ol>
          </nav>


                  


          <div class="ms-panel">
            <div class="ms-panel-header">
              <h6>{{__('Products List')}}</h6>
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


<form id="form_ex_send" method="POST" action="{{ url('/restaurant/updateProduct') }}" >
  @csrf


    
 
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel"></h4>
      </div>
      <div class="modal-body khta">


        <input name="id_product" id="hiddenIdProd" type="hidden" value="" >
         
   

        <div class="col-md-12 mb-3">
          <label for="inputnameprod">Product Name</label>
          <div class="input-group">
            <input type="text" name="productName" value="{{ old('productName') }}"  class="form-control @error('productName') is-invalid @enderror" id="inputnameprod" placeholder="Product Name" required >
            <div class="valid-feedback">
              Looks good!
            </div>
            @error('productName')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>
        </div>




        
        <div class="col-md-12 mb-3">
          <label for="inputnamearabprod">Product Name In Arabic</label>
          <div class="input-group">
            <input type="text" name="productName_ar" value="{{ old('productName_ar') }}"  class="form-control @error('productName_ar') is-invalid @enderror" id="inputnamearabprod" placeholder="Product Name In Arabic"  >
            <div class="valid-feedback">
              Looks good!
            </div>
            @error('productName_ar')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>
        </div>











        
        <div class="col-md-12 mb-3">
          <label for="unityinputprod">unity</label>
          <div class="input-group">
            <input type="text" name="unity" value="{{ old('unity') }}"  class="form-control @error('unity') is-invalid @enderror" id="unityinputprod" placeholder="unity" required >
            <div class="valid-feedback">
              Looks good!
            </div>
            @error('unity')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>
        </div>










        <div class="col-md-12 mb-3">
          <label for="inputtaxprod">tax</label>
          <div class="input-group">
            <input type="number"  min="0" step=".01"  name="tax" value="{{ old('tax') }}"  class="form-control @error('tax') is-invalid @enderror" id="inputtaxprod" placeholder="tax" required >
            <div class="valid-feedback">
              Looks good!
            </div>
            @error('tax')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>
        </div>






     


        <div class="col-md-12 mb-3">
          <label for="limitstkprod">limiteSTK</label>
          <div class="input-group">
            <input type="text" name="limiteSTK" value="{{ old('limiteSTK') }}"  class="form-control @error('limiteSTK') is-invalid @enderror" id="limitstkprod" placeholder="limiteSTK" required >
            <div class="valid-feedback">
              Looks good!
            </div>
            @error('limiteSTK')
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
    @foreach ($products as $product)
                            

   [ "{{ $product->id }}","  {{ $product->productName }}",  "{{ $product->unity }}", "{{ $product->tax }} %", "{{ $product->limiteSTK }}", "{{ $product->qntSTKto }}",
   "<button id='exNoForm' class='ms-btn-icon btn-success'  \
    onclick=\"changeTextOfLabelInCOnfermationAlert({{ $product->id}},'{{ $product->productName}}','{{ $product->productName_ar}}','{{ $product->unity}}',{{ $product->tax}},{{ $product->qntSTKto }})\" \
    type='button' data-toggle='modal' data-target='#exampleModal' data-whatever='@getbootstrap' > <i class='flaticon-tick-inside-circle' ></i></button>"
   
   
   ],
   
                            @endforeach
];









  var tableFour = $('#data-table-123').DataTable( {
    data: dataSet12,
    columns: [
      { title: "{{__('product ID')}}" },
      { title: "{{__('product Name')}}" },

      { title: "{{__('Unity')}}" },
      { title: "{{__('tax')}}" },
      { title: "{{__('limite stock')}}" },
      { title: "{{__('qnt in stock')}}" },
      { title: "{{__('Action')}}" },
   

    ],
  });


 




})(jQuery);

</script>

<script>

  function changeTextOfLabelInCOnfermationAlert(idProd,inputnameprod,inputnamearabprod,unityinputprod,inputtaxprod,limitstkprod){
    

    




                                
        document.getElementById('hiddenIdProd').value = idProd;
        document.getElementById('inputnameprod').value = inputnameprod;
        document.getElementById('inputnamearabprod').value = inputnamearabprod;
        document.getElementById('unityinputprod').value = unityinputprod;
        document.getElementById('inputtaxprod').value = inputtaxprod;
        document.getElementById('limitstkprod').value = limitstkprod;
     
              
              
              };
  
  </script>
  
@endsection
