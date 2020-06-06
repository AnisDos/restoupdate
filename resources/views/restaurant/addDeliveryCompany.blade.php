
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
        
              <li class="breadcrumb-item"><a href="#">{{__('Delivery Company')}}</a></li>
              <li class="breadcrumb-item active" aria-current="page">{{__('Delivery Company')}}</li>
            </ol>
          </nav>




       
   
        
     
         







        </div>



        <div class="col-xl-12 col-md-12">
          <div class="ms-panel ms-panel-fh">
            <div class="ms-panel-header">
              <h6>{{__('Add Delivery Company')}}</h6>
            </div>
            <div class="ms-panel-body">
              <form method="POST"  action="{{ url('restaurant/addDeliveryCompanyForm') }}"  class="needs-validation clearfix" novalidate>
                
              @csrf
                <div class="form-row">



                            
         
    

                  <div class="col-md-12 mb-3">
                    <label for="validationCustom18">{{__('Delivery Company Name')}}</label>
                    <div class="input-group">
                      <input type="text" name="deliveryCompaniesName" value="{{ old('deliveryCompaniesName') }}"  class="form-control @error('deliveryCompaniesName') is-invalid @enderror" id="validationCustom18" placeholder="deliveryCompaniesName" required >
                      <div class="valid-feedback">
                        {{__('Looks good')}}!
                      </div>
                      @error('deliveryCompaniesName')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                    </div>
                  </div>






                  <div class="col-md-12 mb-3">
                    <label for="validationCustom18">{{__('email')}}</label>
                    <div class="input-group">
                      <input type="email" name="email" value="{{ old('email') }}"  class="form-control @error('email') is-invalid @enderror" id="validationCustom18" placeholder="email" required >
                      <div class="valid-feedback">
                        {{__('Looks good')}}!
                      </div>
                      @error('email')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                    </div>
                  </div>








                  <div class="col-md-12 mb-3">
                    <label for="validationCustom25">{{__('adresse')}}</label>
                    <div class="input-group">
                      <input type="text" value="{{ old('adresse') }}"  class="form-control @error('adresse') is-invalid @enderror " name="adresse" id="validationCustom25" placeholder="adresse" required>
                     
                      @error('adresse')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                    </div>
                  </div>

                  <div class="col-md-12 mb-3">
                    <label for="validationCustom25">{{__('percentage')}}</label>
                    <div class="input-group">
                      <input type="number" min="0" step=".01" value="{{ old('percentage') }}"  class="form-control @error('percentage') is-invalid @enderror " name="percentage" id="validationCustom25" placeholder="percentage" required>
                     
                      @error('percentage')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                    </div>
                  </div>


         

                  
                  <div class="col-md-12 mb-3">
                    <label for="validationCustom25">{{__('telephone')}}</label>
                    <div class="input-group">
                      <input type="number" value="{{ old('tel') }}"  class="form-control @error('tel') is-invalid @enderror " name="tel" id="validationCustom25" placeholder="telephone" required>
                     
                      @error('tel')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                    </div>
                  </div>

                  
               




            
                </div>



                <div class="ms-panel-header new">
                  <button class="btn btn-primary d-block" type="submit">{{__('Add Company')}}</button>
                </div>



              </form>

            </div>
          </div>

        </div>


        <div class="col-xl-12 col-md-12">
        <div class="ms-panel">
          <div class="ms-panel-header">
            <h6>{{__('Delivery Companies List')}}</h6>
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


  
    @endsection


    

@section('script')

<script>

(function($) {
  'use strict';

   var dataSet12 = [
    @foreach ($deliveryCompanies as $deliveryCompany)
                            

   [ "  {{ $deliveryCompany->deliveryCompaniesName }}","{{ $deliveryCompany->email }}",  "{{ $deliveryCompany->adresse }}", "{{ $deliveryCompany->tel }}", "{{ $deliveryCompany->percentage }}"],
   
                            @endforeach
];









  var tableFour = $('#data-table-123').DataTable( {
    data: dataSet12,
    columns: [
    
      { title: "{{__('Delivery Company Name')}}" },
      { title: "{{__('Email')}}" },
      { title: "{{__('Addresse')}}" },
      { title: "{{__('tel')}}" },
      { title: "{{__('percentage')}}" },
   

    ],
  });


 




})(jQuery);

</script>

  
@endsection
