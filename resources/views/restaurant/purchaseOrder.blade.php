
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
              <li class="breadcrumb-item"><a href="#">{{__('Menu')}}</a></li>
              <li class="breadcrumb-item active" aria-current="page">{{__('Purchase A product')}} </li>
            </ol>
          </nav>




          
         







        </div>



        <div class="col-xl-6 col-md-12">
          <div class="ms-panel ms-panel-fh">
            <div class="ms-panel-header">
              <h6>{{__('Purchare A product  Form')}}</h6>
            </div>
            <div class="ms-panel-body">
              <form method="POST"  action="{{ url('restaurant/send_mail') }}"  class="needs-validation clearfix" novalidate>
                
              @csrf
                <div class="form-row">



                            
                    
    

                  <div class="col-md-12 mb-3">
                    <label for="validationCustom18">{{__('Product Name')}}</label>
                    <div class="input-group">
                      <input type="text"  value="{{ $product->productName }}"   class="form-control" id="validationCustom18" readonly >
                    </div>
                  </div>




                  <div class="col-md-12 mb-3">
                    <label for="validationCustom18">{{__('Current QNT')}}</label>
                    <div class="input-group">
                      <input type="text"  value="{{ $productWest}} {{ $product->unity }}"   class="form-control" id="validationCustom18" readonly >
                    </div>
                  </div>



                <input type="hidden" name="product_id" value="{{ $product->id }}" >
                  
                  <div class="col-md-12 mb-3">
                    <label for="validationCustom25">{{__('Quantity you want to purchase it')}}</label>
                    <div class="input-group">
                      <input type="number" name="qntSTK" value="{{ old('qntSTK') }}"  class="form-control @error('qntSTK') is-invalid @enderror "  id="validationCustom25" placeholder="quantity" required>
                     
                      @error('qntSTK')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                    </div>
                  </div>



                  

                  <div class="col-md-12 mb-3">
                    <label for="validationCustom25">{{__('message')}}</label>
                    <div class="input-group">
                      <input type="text" name="message" value="{{ old('message') }}"  class="form-control @error('message') is-invalid @enderror "  id="validationCustom25" placeholder="quantity" required>
                     
                      @error('message')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                    </div>
                  </div>



      
                  <div class="col-md-12 mb-3">
                    <label for="validationCustom22">{{__('Select provider')}}</label>
                    <div class="input-group">
                      <select class="form-control @error('provider_id') is-invalid @enderror " name="provider_id" id="validationCustom22" required >
                 
                        
          
                     @foreach ($providers as $provider)
                            

                      <option value="{{ $provider->id }}">{{ $provider->providerName }}</option>

                     @endforeach


                      </select>
                      <div class="invalid-feedback">
                        {{__('Please select a Provider')}}.
                      </div>
                    </div>
                  </div>






                </div>



                <div class="ms-panel-header new">
                  <button class="btn btn-primary d-block" type="submit">{{__('Purchare A product')}} </button>
                </div>



              </form>

            </div>
          </div>

        </div>

        
<!--===============================================================================================-->

<div class="col-xl-6 col-md-12">
    <div class="ms-panel ms-panel-fh">
      <div class="ms-panel-header">
        <h6>{{__('All pruduct Inventory Shortage')}}</h6>
      </div>
      <div class="ms-panel-body">
  










        @foreach ($productNoQnt as $prod)
        <a class="media p-2" href="/restaurant/purchaseOrder/{{ $prod->id}}">
          <div class="media-body"> <span> Inventory shortage <strong> {{ $prod->productName}} </strong></span>

          </div>
        </a>
        @endforeach
















      </div>
    </div>

  </div>































      </div>
    </div>


    <script>
      $(document).ready(function() { 	
      $('a').removeClass( "active" ) ;
      
      $(".clikihafhome").each(function(){
          $(this).click();
      });
      
      });
      
        </script>
    @endsection