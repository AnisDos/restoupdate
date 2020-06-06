
@extends('employee.base')



@section('content')

{{App::setLocale(Session::get('locale'))}}
    <!-- Body Content Wrapper -->
    <div class="ms-content-wrapper">
      <div class="row">

        <div class="col-md-12">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb pl-0">
              <li class="breadcrumb-item"><a href="#"><i class="material-icons">home</i> Home</a></li>
              <li class="breadcrumb-item"><a href="#">Menu</a></li>
              <li class="breadcrumb-item active" aria-current="page">Add Product</li>
            </ol>
          </nav>




          
       
   
        
   

    
        </div>







        <div class="col-xl-6 col-md-12">
            <div class="ms-panel">
                <div class="ms-card-header clearfix">
                    <h6 class="ms-card-title">Products List</h6>
        
                  </div>
                <div class="ms-panel-body">
                  <div class="table-responsive">
                    <table id="data-table-123" class="table w-100 thead-primary"></table>
                  </div>
                </div>
    
                
              </div>
          </div>



























<!--===========================================================================================================-->



           <!-- Todo Widget -->
           <div class="col-xl-6 col-md-12 ms-deletable ms-todo-list">
            <div class="ms-card ms-widget ms-card-fh">
              <div class="ms-card-header clearfix">
                <h6 class="ms-card-title">Ingredients Lists</h6>
     
             
              </div>

              <div class="ms-panel-body">
                <form method="POST"  action="{{ url('employee/stocks/addVersionProductForm') }}" enctype="multipart/form-data" class="needs-validation clearfix" novalidate>
                  
                @csrf
                  <div class="form-row">
  
  
  
                              
           
      
  
                    <div class="col-md-12 mb-3">
                      <h3 id="nameProductForm"  style="text-align: center; color:red;">Product Name</h3>
                     <input id="hiddenInputForm" type="hidden" name="id_product" value="" >
                    </div>
  
  
  
                    <div class="col-md-12 mb-3">
                      <label for="validationCustom25">quantity</label>
                      <div class="input-group">
                        <input type="number" value="{{ old('qntSTK') }}"  class="form-control @error('qntSTK') is-invalid @enderror " name="qntSTK" id="validationCustom25" placeholder="quantity" required>
                       
                        @error('qntSTK')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>
                    </div>
  
  
  
  
                    
                  
  
  
  
  
  
                    <div class="col-md-12 mb-3">
                      <label for="validationCustom18"> unit price</label>
                      <div class="input-group">
                        <input type="number" name="price" value="{{ old('price') }}"  class="form-control @error('price') is-invalid @enderror" id="validationCustom18" placeholder="price" required >
                        <div class="valid-feedback">
                          Looks good!
                        </div>
                        @error('price')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>
                    </div>
  
                    <div class="col-md-12 mb-3">
                      <label for="validationCustom18">return</label>
                      <div class="input-group">
                  
                          <label class="ms-switch">
                            <input name="return" type="checkbox" checked> <span class="ms-switch-slider ms-switch-success round"></span>
                          </label> <span> Success </span>
                      
                        <div class="valid-feedback">
                          Looks good!
                        </div>
                        @error('return')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>
                    </div>
  
  
                    <div class="col-md-12 mb-3">
                      <label for="validationCustom18">date_experation_bool</label>
                      <div class="input-group">
                        <label class="ms-switch">
                          <input name="date_experation_bool" type="checkbox"  onclick="deleteAddInput();" id="chekboxremouvaikd1" checked > <span class="ms-switch-slider ms-switch-success round"></span>
                        </label> <span> Success </span>
                    
                     <div class="valid-feedback">
                          Looks good!
                        </div>
                        @error('date_experation_bool')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>
                    </div>
  
  
  
                    <div class="col-md-12 mb-3" id="colmdaddthisinremouve" >
                            <div  id="remouveadddivinput" >
                                <label for="validationCustom18">date_experation</label>
                                <div class="input-group">
                                  <input type="date" name="date_experation" value="{{ old('date_experation') }}"  class="form-control @error('date_experation') is-invalid @enderror" id="validationCustom18" placeholder="date_experation" required >
                                  <div class="valid-feedback">
                                    Looks good!
                                  </div>
                                  @error('date_experation')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                                  @enderror
                                </div>
                          </div>
                    </div>
  
  
  
  
  
  
                    <div class="col-md-12 mb-3">
                      <label for="validationCustom18">codebare</label>
                      <div class="input-group">
                        <input type="text" name="codebare" value="{{ old('codebare') }}"  class="form-control @error('codebare') is-invalid @enderror" id="validationCustom18" placeholder="codebare" required >
                        <div class="valid-feedback">
                          Looks good!
                        </div>
                        @error('codebare')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>
                    </div>
  
  
                    
                    <div class="col-md-12 mb-3">
                      <label for="validationCustom22">Select provider</label>
                      <div class="input-group">
                        <select class="form-control @error('provider_id') is-invalid @enderror " name="provider_id" id="validationCustom22" >
                   
                          
                        <option value=""> no provider now  </option>
                       @foreach ($providers as $provider)
                              
  
                        <option value="{{ $provider->id }}">{{ $provider->providerName }}</option>
  
                       @endforeach
  
  
                        </select>
                        <div class="invalid-feedback">
                          Please select a Catagory.
                        </div>
                      </div>
                    </div>
  
  
  
  
  
              
                  </div>
  
  
  
                  <div class="ms-panel-header new">
                    <button id="kamalyakolfermadj" class="btn btn-primary d-block" disabled="disabled" type="submit">Add Product</button>
                  </div>
  
  
  
                </form>
  
              </div>
         
            </div>
          </div>








          










      </div>
    </div>


  
    @endsection



    





    @section('script')
    <script type="text/javascript">
    
  function deleteAddInput() {


if (document.getElementById('chekboxremouvaikd1').checked) {

  

  var div1 = document.createElement('div');
  div1.id = "remouveadddivinput";
  div1.innerHTML = "<label for='validationCustom18'>date_experation</label><div class='input-group'><input type='date' name='date_experation' value='{{ old('date_experation') }}'  class='form-control @error('date_experation') is-invalid @enderror' id='validationCustom18' placeholder='date_experation' required ><div class='valid-feedback'>Looks good!</div>@error('date_experation')<span class='invalid-feedback' role='alert'><strong>{{ $message }}</strong></span>@enderror</div>"

  var div2 = document.getElementById('colmdaddthisinremouve');


  div2.appendChild(div1);

} else {
  
  document.getElementById("remouveadddivinput").remove();
}


}
    
        function changeProductNameHiddenValueInForm(id,productName) {
      
        
var nn =document.getElementById('nameProductForm');
var nn1 =document.getElementById('hiddenInputForm');

nn.innerHTML = productName ;
nn1.value = id ;
$('#kamalyakolfermadj').attr('disabled', false);

          
      
      
        }
      
      
      
      
        
        </script>
    <script>
    
    (function($) {
      'use strict';
    
       var dataSet12 = [
        @foreach ($products as $product)
                                
    
       [ "  {{ $product->productName }}",  " {{ $product->unity }}", " {{ $product->limiteSTK }}", "<button class='ms-btn-icon btn-danger'  onclick=\"changeProductNameHiddenValueInForm({{ $product->id }},'{{ $product->productName }}')\" type='button'  ><i class='flaticon-alert-1'></i></button>"],
       
                                @endforeach
    ];
    
    
    
    
    
    
    
    
    
      var tableFour = $('#data-table-123').DataTable( {
        data: dataSet12,
        columns: [
         
          { title: "Product Name" },
    
          { title: "Unity" },
          { title: "limitr stock" },
          { title: "Action" },
     
    
        ],
      });
    
    
     
    
    
    
    
    })(jQuery);
    
    </script>
    
      
    @endsection
    
  