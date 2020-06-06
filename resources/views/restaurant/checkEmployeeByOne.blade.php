
@extends('restaurant.base')



@section('content')
{{App::setLocale(Session::get('locale'))}}
   


 


    <!-- Body Content Wrapper -->
    <div class="ms-content-wrapper">
      <div class="row">
        <div class="col-md-12">
          <h1  class="db-header-title">{{$employee->name}} </h1>
        </div>
     {{--    <div class="col-xl-3 col-md-6">
          <div class="ms-card card-gradient-success ms-widget ms-infographics-widget">
            <div class="ms-card-body media">
              <div class="media-body">
                <h6>Total Branches</h6>
                <p class="ms-card-change"> <i class="material-icons">arrow_upward</i></p>
                <p class="fs-12">48% From Last 24 Hours</p>
              </div>
            </div> <i class="flaticon-statistics"></i>
          </div>
        </div>
        <div class="col-xl-3 col-md-6">
          <div class="ms-card card-gradient-secondary ms-widget ms-infographics-widget">
            <div class="ms-card-body media">
              <div class="media-body">
                <h6>Budgets</h6>
                <p class="ms-card-change">$80,950</p>
                <p class="fs-12">2% Decreased from last budget</p>
              </div>
            </div> <i class="flaticon-stats"></i>
          </div>
        </div>
        <div class="col-xl-3 col-md-6">
          <div class="ms-card card-gradient-success ms-widget ms-infographics-widget">
            <div class="ms-card-body media">
              <div class="media-body">
                <h6>Total Employees</h6>
                <p class="ms-card-change"> <i class="material-icons">arrow_upward</i> </p>
                <p class="fs-12">48% From Last 24 Hours</p>
              </div>
            </div> <i class="flaticon-user"></i>
          </div>
        </div>
        <div class="col-xl-3 col-md-6">
          <div class="ms-card card-gradient-secondary ms-widget ms-infographics-widget">
            <div class="ms-card-body media">
              <div class="media-body">
                <h6>Conversions</h6>
                <p class="ms-card-change">$80,950</p>
                <p class="fs-12">2% Decreased from last budget</p>
              </div>
            </div> <i class="flaticon-reuse"></i>
          </div>
        </div>
 --}}



<!--===============================================table=================================================-->
        <div class="col-xl-6 col-md-12">
          <div class="ms-panel">
              <div class="ms-card-header clearfix">
                  <h6 class="ms-card-title">{{__('Historique Charge')}}</h6>
      
                </div>
              <div class="ms-panel-body">
                <div class="table-responsive">
                  <table id="data-table-123" class="table w-100 thead-primary"></table>
                </div>
              </div>
  
              
            </div>
        </div>



<!--===============================================table=================================================-->






        <div class="col-xl-6 col-md-12">
          <div class="ms-panel ms-panel-fh">
            <div class="ms-panel-header">
              <h6>Project Timeline</h6>
            </div>
            <div class="ms-panel-body">
              <ul class="ms-activity-log">
                <li>
                  <div class="ms-btn-icon btn-pill icon btn-success"> <i class="flaticon-tick-inside-circle"></i>
                  </div>
                  <h6>Lorem ipsum dolor sit</h6>
                  <span> <i class="material-icons">event</i>1 January, 2018</span>
                  <p class="fs-14">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque scelerisque diam non nisi semper, ula in sodales vehicula....</p>
                </li>
                <li>
                  <div class="ms-btn-icon btn-pill icon btn-danger"> <i class="flaticon-alert-1"></i>
                  </div>
                  <h6>Lorem ipsum dolor sit</h6>
                  <span> <i class="material-icons">event</i>1 March, 2020</span>
                  <p class="fs-14">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque scelerisque diam non nisi semper, ula in sodales vehicula....
              


                  </p>
                </li>
              </ul>
            </div>
          </div>
        </div>


<!--============================================================================================-->
 



<!--//////////////////////////////////////////////////////////////// -->



<!--update info employees -->


<!--//////////////////////////////////////////////////////////////// -->
<div class="col-xl-6 col-md-12">
    <div class="ms-panel ms-panel-fh">
      <div class="ms-panel-header">
        <h6>{{__('Update informations Employee Form')}}</h6>
      </div>
      <div class="ms-panel-body">
        <form method="POST"  action="{{ url('restaurant/updateEmployyeInfo') }}"  class="needs-validation clearfix" novalidate>
          
        @csrf
          <div class="form-row">


   
            <input type="hidden" name="id_emplo" value="{{ $employee->id }}" >
                      
            <div class="col-md-12 mb-3">
                <label for="validationCustom18">{{__('id Employee')}}</label>
                <div class="input-group">
                  <input type="text"  value="{{ $employee->idEmployee }}"  class="form-control" id="validationCustom18" placeholder="id Employee" readonly >
            
                </div>
              </div>
              
   
            <div class="col-md-12 mb-3">
                <label for="validationCustom18">{{__('Name Employee')}}</label>
                <div class="input-group">
                  <input type="text" name="nameEmployee" value="{{ $employee->nameEmployee }}"  class="form-control @error('nameEmployee') is-invalid @enderror" id="validationCustom18" placeholder="Name Employee" required >
                  <div class="valid-feedback">
                    Looks good!
                  </div>
                  @error('nameEmployee')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>
              </div>
              
              <div class="col-md-12 mb-3">
                <label for="validationCustom18">{{__('telephone')}}</label>
                <div class="input-group">
                  <input type="number" name="tel" value="{{ $employee->tel}}"  class="form-control @error('tel') is-invalid @enderror" id="validationCustom18" placeholder="tel" required >
                  <div class="valid-feedback">
                    Looks good!
                  </div>
                  @error('tel')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>
              </div>

                <div class="col-md-12 mb-3">
                  <label for="validationCustom08">{{__('Email')}}</label>
                  <div class="input-group">
                    <input type="email" value="{{ $employee->user->email }}"  name="email" class="form-control @error('email') is-invalid @enderror" id="validationCustom08" placeholder="Email Address" required>
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                  </div>
                </div>

        

                <div class="col-md-12 mb-3">
                    <label for="validationCustom18">{{__('price per hour')}}</label>
                    <div class="input-group">
                      <input type="number" name="price_ph" value="{{ $employee->price_ph}}"  class="form-control @error('price_ph') is-invalid @enderror" id="validationCustom18" placeholder="price per hour" required >
                      <div class="valid-feedback">
                        Looks good!
                      </div>
                      @error('price_ph')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                    </div>
                  </div>
    
                  <div class="col-md-12 mb-3">
                    <label for="validationCustom18">{{__('type')}}</label>
                    <div class="input-group">
                   
                      
                        <select class="form-control @error('type') is-invalid @enderror " name="type" id="validationCustom22" >
                 
                           
                            
                            
                            <option value="{{ $employee->type}}" selected >{{ $employee->type}}</option>
       
                            <option value="kashir" >kashir</option>
                            <option value="cook">cook</option>
       
                     
       
       
                             </select>
                      
                      
                        <div class="valid-feedback">
                        Looks good!
                      </div>
                      @error('type')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                    </div>
                  </div>











            


          </div>



          <div class="ms-panel-header new">
            <button class="btn btn-primary d-block" type="submit">{{__('Update Employee Information')}}</button>
          </div>



        </form>

      </div>
    </div>

  </div>



<!--//////////////////////////////////////////////////////////////// -->

  
<!-- for activate or deactivate compte restaurant  -->


<!--//////////////////////////////////////////////////////////////// -->
  <div class="col-xl-6 col-md-12">
    <div>
    <div class="ms-panel ms-panel-fh">
      <div class="ms-panel-header">
        <h6>{{__('Deactivate Activate Form')}}</h6>
      </div>
      <div class="ms-panel-body">
          @if($employee->active)
        <form method="POST"  action="{{ url('restaurant/decativateEmployee') }}"  class="needs-validation clearfix" novalidate>
          
        @csrf
          <div class="form-row">



                      
   
<input type="hidden" name="id_emplo" value="{{ $employee->id }}" >


       


          </div>



          <div class="ms-panel-header new">
            <button class="btn btn-primary-info d-block" type="submit">{{__('block Employee')}}</button>
          </div>



        </form>
@else
<form method="POST"  action="{{ url('restaurant/updatePasswordEmployee') }}"  class="needs-validation clearfix" novalidate>
          
    @csrf
      <div class="form-row">



                  




<input type="hidden" name="id_emplo" value="{{ $employee->id }}" >
<input type="hidden" name="Activate" value="activih" >
                  

<div class="col-md-12 mb-2">
      <label for="validationCustom09">{{__('Password')}}</label>
      <div class="input-group">
        <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="validationCustom09" placeholder="Password" required >
        @error('password')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
      </div>
    </div>

    <div class="col-md-12 mb-2">
      <label for="validationCustom09">{{__('Repeat Password')}}</label>
      <div class="input-group">
        <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation" id="validationCustom099" placeholder="Repeat Password" required >
        @error('password_confirmation')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
      </div>
    </div>


      </div>



      <div class="ms-panel-header new">
        <button class="btn btn-success d-block" type="submit">{{__('activate compte Employee')}}</button>
      </div>



    </form>
@endif
      </div>
    </div>
  </div>

    
  <!--//////////////////////////////////////////////////////////////// -->
  @if($employee->active)
  <div >
    <div class="ms-panel ms-panel-fh">
      <div class="ms-panel-header">
        <h6>{{__('Update Password Form')}}</h6>
      </div>
      <div class="ms-panel-body">
 
        <form method="POST"  action="{{ url('restaurant/updatePasswordEmployee') }}"  class="needs-validation clearfix" novalidate>
          
        @csrf
          <div class="form-row">



                      
   


   
<input type="hidden" name="id_emplo" value="{{ $employee->id }}" >
                      
   
<div class="col-md-12 mb-2">
          <label for="validationCustom09">{{__('Password')}}</label>
          <div class="input-group">
            <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="validationCustom09" placeholder="Password" required >
            @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>
        </div>

        <div class="col-md-12 mb-2">
          <label for="validationCustom09">{{__('Repeat Password')}}</label>
          <div class="input-group">
            <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation" id="validationCustom099" placeholder="Repeat Password" required >
            @error('password_confirmation')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>
        </div>


          </div>



          <div class="ms-panel-header new">
            <button class="btn btn-primary d-block" type="submit">{{__('Update paasword')}}</button>
          </div>



        </form>

      </div>
    </div>

  </div>

@endif
<!--====================================================================================-->

  </div>



<!--//////////////////////////////////////////////////////////////// -->

  
<!-- update password restaurant  -->













      </div>
    </div>
              
    
  
@endsection




@section('script')
<script>

(function($) {
  'use strict';

   var dataSet12 = [
    @foreach ($employeeAllCharges as $InfoEmployee)
                            

   [ "  {{ $employee->idEmployee }}", " {{ $employee->email }}",  " {{ $InfoEmployee->created_at }}", "{{ $InfoEmployee->priceCharge }}"],
   
                            @endforeach
];









  var tableFour = $('#data-table-123').DataTable( {
    data: dataSet12,
    columns: [
     
      { title: "{{__('Id Employee')}}" },

      { title: "{{__('Email')}}" },
      { title: "{{__('Date')}}" },
      { title: "{{__('Expense')}}" },
 

    ],
  });


 




})(jQuery);

</script>

<script>
  $(document).ready(function() { 	
  $('a').removeClass( "active" ) ;
  
  $(".clikihafhome").each(function(){
      $(this).click();
  });
  
  });
  
    </script>
@endsection

