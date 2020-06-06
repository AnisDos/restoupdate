
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
        
              <li class="breadcrumb-item"><a href="#">Employee</a></li>
              <li class="breadcrumb-item active" aria-current="page">Add Employee</li>
            </ol>
          </nav>




          
    
   
        
      






        </div>



        <div class="col-xl-12 col-md-12">
          <div class="ms-panel ms-panel-fh">
            <div class="ms-panel-header">
              <h6>Add Employee Form</h6>
            </div>
            <div class="ms-panel-body">
              <form method="POST"  action="{{ url('restaurant/addEmployeeForm') }}"  class="needs-validation clearfix" novalidate>
                
              @csrf
                <div class="form-row">



                  <div class="col-md-12 mb-3">
                    <label for="validationCustom18">Name Employee</label>
                    <div class="input-group">
                      <input type="text" name="nameEmployee" value="{{ old('nameEmployee') }}"  class="form-control @error('nameEmployee') is-invalid @enderror" id="validationCustom18" placeholder="nameEmployee" required >
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
                    <label for="validationCustom18">email</label>
                    <div class="input-group">
                      <input type="text" name="email" value="{{ old('email') }}"  class="form-control @error('email') is-invalid @enderror" id="validationCustom18" placeholder="email" required >
                      <div class="valid-feedback">
                        Looks good!
                      </div>
                      @error('email')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                    </div>
                  </div>






                  <div class="col-md-12 mb-3">
                    <label for="validationCustom18">password</label>
                    <div class="input-group">
                      <input type="password" name="password"  class="form-control @error('password') is-invalid @enderror" id="validationCustom18" placeholder="password" required >
                      <div class="valid-feedback">
                        Looks good!
                      </div>
                      @error('password')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                    </div>
                  </div>







                  <div class="col-md-12 mb-3">
                    <label for="validationCustom18">repetPassword</label>
                    <div class="input-group">
                      <input type="password" name="password_confirmation"   class="form-control " id="validationCustom18" placeholder="repet password" required >
                      <div class="valid-feedback">
                        Looks good!
                      </div>
               
                    </div>
                  </div>



                  <div class="col-md-12 mb-3">
                    <label for="validationCustom25">hour of work</label>
                    <div class="input-group">
                      <input type="number" value="{{ old('hWork') }}"  class="form-control @error('hWork') is-invalid @enderror " name="hWork" id="validationCustom25" placeholder="hour of work" required>
                     
                      @error('hWork')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                    </div>
                  </div>



                  <div class="col-md-12 mb-3">
                    <label for="validationCustom25">price of working per hour  </label>
                    <div class="input-group">
                      <input type="number" min="0" step=".01" value="{{ old('price_ph') }}"  class="form-control @error('price_ph') is-invalid @enderror " name="price_ph" id="validationCustom25" placeholder="price of working per hour" required>
                     
                      @error('price_ph')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                    </div>
                  </div>



                  
                  <div class="col-md-12 mb-3">
                    <label for="validationCustom25">telephone</label>
                    <div class="input-group">
                      <input type="number" value="{{ old('tel') }}"  class="form-control @error('tel') is-invalid @enderror " name="tel" id="validationCustom25" placeholder="telephone" required>
                     
                      @error('tel')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                    </div>
                  </div>

                  
                  <div class="col-md-12 mb-3">
                    <label for="validationCustom18">type</label>
                    <div class="input-group">
                   
                      
                        <select class="form-control @error('type') is-invalid @enderror " name="type" id="validationCustom22" >
                 
                           
                                    
       
                            <option value="cashier">cashier</option>
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
                  <button class="btn btn-primary d-block" type="submit">Add Employee</button>
                </div>



              </form>

            </div>
          </div>

        </div>



        

        

      </div>
    </div>


  
    @endsection