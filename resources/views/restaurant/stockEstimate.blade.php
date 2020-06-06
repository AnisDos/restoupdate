
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
        
              <li class="breadcrumb-item"><a href="#">{{__('Estimate')}}</a></li>
              <li class="breadcrumb-item active" aria-current="page">{{__('Stock Estimate')}} </li>
            </ol>
          </nav>












        </div>



        <div class="col-xl-12 col-md-12">
          <div class="ms-panel ms-panel-fh">
            <div class="ms-panel-header">
              <h6>{{__('Estimate how Many Meal We Can Make With Our Stock')}}</h6>
            </div>
            <div class="ms-panel-body">
              <form method="POST"  action="{{ url('restaurant/estimationMealForm') }}"  class="needs-validation clearfix" novalidate>
                
              @csrf
                <div class="form-row">


                    <div class="col-md-6 mb-3">
                    <label for="validationCustom18">{{__('Select Meal')}} </label>
                        <div class="input-group">
                       
                          
                            <select class="form-control @error('meal_id') is-invalid @enderror " name="meal_id" id="validationCustom22" required >
                     
                               
                                       @foreach ($meals as $meal)
                                       <option value="{{$meal->id}}" @if (session('mealSSid') == "$meal->id" ) selected @endif >{{$meal->mealName}}</option>
                                       @endforeach
           
                            
                             
           
                         
           
           
                                 </select>
                          
                          
                            <div class="valid-feedback">
                            {{__('Looks good!')}}
                          </div>
                          @error('type')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                          @enderror
                        </div>
                      </div>
                            
         
    


              
                      <div class="ms-panel-header new">
                        <button class="btn btn-primary d-block" type="submit">{{__('Check')}}</button>
                      </div>
      


                      @if (session('nbrnbr'))
                      @if (session('nbrnbr') == "0" )
                      
                      <div class="col-md-3 mb-2">
                        <label></label>
                        <div class="input-group">

                            <h4 >{{__('You can\'t make any one of this meal')}}</h4>
                        </div>
            
                     </div>
                     @else
                     <div class="col-md-3 mb-2">
                        <label></label>
                        <div class="input-group" style="text-align: center" >

                            <h4 > {{__('You can make')}} {{session('nbrnbr')}} {{__('pieces of this meal')}}  </h4> </br>
                        </div>
            
                     </div>

                      @endif

                      @endif
                      
                   




            
                </div>



                


              </form>

            </div>
          </div>

        </div>


        @if (session('nbrnbr'))
        @if (session('nbrnbr') == "0" )

        @if (session('manqueOfProd'))
      
    



          <div class="col-xl-12 col-md-12">
            <div class="ms-panel ms-panel-fh">
              <div class="ms-panel-header">
                <h6>{{__('You don\'t have enough of this products')}}</h6>
              </div>
              <div class="ms-panel-body">
           
                  

                  <div class="form-row">
  
  
                      <div class="col-md-12 mb-3">
                        
                        
                         
                            
                              
                       
                                @foreach(session('manqueOfProd') as $in)
                            <div style="text-align: center" >    <h5 >{{$in}}</h5><div> </br>
                                @endforeach
                                      
             
                                
                            
                         
                          </div>
                        </div>
                              
           
      
  
   
              </div>
            </div>
  
          </div>
















 @endif


 @endif
 @endif


        

      </div>
    </div>


  
    @endsection