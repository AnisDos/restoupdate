
@extends('admin.base')



@section('content')
{{App::setLocale(Session::get('locale'))}}

    <!-- Body Content Wrapper -->
    <div class="ms-content-wrapper">
      <div class="row">

        <div class="col-md-12">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb pl-0">
              <li class="breadcrumb-item"><a href="#"><i class="material-icons">home</i> Home</a></li>
              <li class="breadcrumb-item"><a href="#">Restaurant</a></li>
              <li class="breadcrumb-item active" aria-current="page">Add Restaurant</li>
            </ol>
          </nav>



        </div>


        <div class="col-xl-12 col-md-12">
            <div class="ms-panel ms-panel-fh">
              <div class="ms-panel-header">
                <h6>Add Restaurant Form</h6>
              </div>
              <div class="ms-panel-body">
                <form enctype="multipart/form-data" method="POST"  action="{{ url('admin/addRestaurantFormValidation') }}"  class="needs-validation clearfix" novalidate>
                
                  @csrf
                    <div class="form-row">
    
    
    
                                
             
        
    
                      <div class="col-md-12 mb-3">
                        <label for="validationCustom18">Name</label>
                        <div class="input-group">
                          <input type="text" name="name" value="{{ old('name') }}"  class="form-control @error('name') is-invalid @enderror" id="validationCustom18" placeholder="Name" required >
                          <div class="valid-feedback">
                            Looks good!
                          </div>
                          @error('name')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                          @enderror
                        </div>
                      </div>
                      
                      <div class="col-md-12 mb-3">
                        <label for="validationCustom18">Address</label>
                        <div class="input-group">
                          <input type="text" name="address" value="{{ old('address') }}"  class="form-control @error('address') is-invalid @enderror" id="validationCustom18" placeholder="Address" required >
                          <div class="valid-feedback">
                            Looks good!
                          </div>
                          @error('address')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                          @enderror
                        </div>
                        
    
                      </div>

                        <div class="col-md-12 mb-3">
                          <label for="validationCustom08">Email Address</label>
                          <div class="input-group">
                            <input type="email" value="{{ old('email') }}"  name="email" class="form-control @error('email') is-invalid @enderror" id="validationCustom08" placeholder="Email Address" required>
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                          </div>
                        </div>

                        <div class="col-md-12 mb-2">
                          <label for="validationCustom09">Password</label>
                          <div class="input-group">
                            <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="validationCustom09" placeholder="Password" required>
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                          </div>
                        </div>

                        <div class="col-md-12 mb-2">
                          <label for="validationCustom09">Repeat Password</label>
                          <div class="input-group">
                            <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation" id="validationCustom099" placeholder="Repeat Password" required>
                            @error('password_confirmation')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                          </div>
                        </div>
                        
                        <div class="col-md-12 mb-3">
                          <label for="validationCustom12">Restaurant Logo</label>
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
                      <button class="btn btn-primary d-block" type="submit">Add Restaurant</button>
                    </div>
    
    
    
                  </form>
  
            </div>
            </div>
          </div>

      </div>
    </div>


  
    @endsection