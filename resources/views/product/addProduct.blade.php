
@extends('restaurant.base')



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



        <div class="col-xl-12 col-md-12">
          <div class="ms-panel ms-panel-fh">
            <div class="ms-panel-header">
              <h6>Add Product Form</h6>
            </div>
            <div class="ms-panel-body">
              <form method="POST"  action="{{ url('restaurant/addProductForm') }}" enctype="multipart/form-data" class="needs-validation clearfix" novalidate>
                
              @csrf
                <div class="form-row">



                            
         
    

                  <div class="col-md-12 mb-3">
                    <label for="validationCustom18">Product Name</label>
                    <div class="input-group">
                      <input type="text" name="productName" value="{{ old('productName') }}"  class="form-control @error('productName') is-invalid @enderror" id="validationCustom18" placeholder="Product Name" required >
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
                    <label for="validationyCustom18">Product Name In Arabic</label>
                    <div class="input-group">
                      <input type="text" name="productName_ar" value="{{ old('productName_ar') }}"  class="form-control @error('productName_ar') is-invalid @enderror" id="validationyCustom18" placeholder="Product Name In Arabic"  >
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
                    <label for="validationCustom18">unity</label>
                    <div class="input-group">
                      <input type="text" name="unity" value="{{ old('unity') }}"  class="form-control @error('unity') is-invalid @enderror" id="validationCustom18" placeholder="unity" required >
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
                    <label for="validationCustom18">unit price </label>
                    <div class="input-group">
                      <input type="number" min="0" step=".01" name="price" value="{{ old('price') }}"  class="form-control @error('price') is-invalid @enderror" id="validationCustom18" placeholder="price" required >
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
                    <label for="validationCustom18">tax</label>
                    <div class="input-group">
                      <input type="number" min="0" step=".01"  name="tax" value="{{ old('tax') }}"  class="form-control @error('tax') is-invalid @enderror" id="validationCustom18" placeholder="tax" required >
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
                    <label for="validationCustom18">limiteSTK</label>
                    <div class="input-group">
                      <input type="number" name="limiteSTK" value="{{ old('limiteSTK') }}"  class="form-control @error('limiteSTK') is-invalid @enderror" id="validationCustom18" placeholder="limiteSTK" required >
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
                  <button class="btn btn-primary d-block" type="submit">Add Product</button>
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




  
  </script>
    
@endsection


