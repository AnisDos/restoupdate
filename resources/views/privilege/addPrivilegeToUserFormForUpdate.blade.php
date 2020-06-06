
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
              <li class="breadcrumb-item active" aria-current="page">Employee Informations</li>
            </ol>
          </nav>




          
      
   
        
       

         







        </div>



        <div class="col-xl-6 col-md-12">
          <div class="ms-panel ms-panel-fh">
            <div class="ms-panel-header">
              <h6>Employee Informations</h6>
            </div>
            <div class="ms-panel-body">
                <form onsubmit="return submitForm();" id="ratinoupikamila" method="POST"  action="{{ url('restaurant/updatePrivilege') }}" class="needs-validation clearfix" novalidate>
                
                    @csrf
              
                <div class="form-row">




                  <div class="col-md-12 mb-3">
                    <label for="validationCustom18">Name Employee</label>
                    <div class="input-group">
                        
                 
                      <input type="text" readonly  value="{{ $employee->nameEmployee }}"  class="form-control " id="validationCustom18"  >
                      <div class="valid-feedback">
                        Looks good!
                      </div>
 
                    </div>
                  </div>


                            
         
    

                  <div class="col-md-12 mb-3">
                    <label for="validationCustom18">Id Of Employee</label>
                    <div class="input-group">
                        
                 
                      <input type="text" readonly  value="{{ $employee->idEmployee }}"  class="form-control " id="validationCustom18" placeholder="Meal Name" required >
                      <div class="valid-feedback">
                        Looks good!
                      </div>
 
                    </div>
                  </div>














               

                  <div class="col-md-12 mb-3">
                    <label for="validationCustom22">Type </label>
                    <div class="input-group">


        <input type="text" readonly name="idEmployee" value="{{ $employee->type }}"  class="form-control " id="validationCustom18" placeholder="Meal Name" required >
                    



                      <div class="invalid-feedback">
                        Please select a Catagory.
                      </div>
                    </div>
                  </div>
    




                  <div class="col-md-12 mb-3">
                    <label for="validationCustom25">Price per hour</label>
                    <div class="input-group">
                      <input type="number" value="{{ $employee->price_ph }}"  class="form-control  "  id="validationCustom25" placeholder="$10" readonly>
                     
                    
                    </div>
                  </div>




              
                  <div class="col-md-12 mb-3">
                    <label for="validationCustom25">hour of work</label>
                    <div class="input-group">
                      <input type="number" value="{{ $employee->hWork }}"  class="form-control  "  id="validationCustom25" placeholder="$10" readonly>
                     
                    
                    </div>
                  </div>


           
                </div>

            
       
                <input  name="id_employee" type="hidden" value="{{ $employee->id }}" />
                <input id="validationCustom36" name="var[]" type="hidden" value="" />

                <div class="ms-panel-header new">
                  <button  class="btn btn-primary d-block" type="submit">Add Privileges</button>
                </div>



              </form>

            </div>
          </div>

        </div>







































           <!-- Todo Widget -->
           <div class="col-xl-6 col-md-12 ms-deletable ms-todo-list">
            <div class="ms-card ms-widget ms-card-fh">
              <div class="ms-card-header clearfix">
                <h6 class="ms-card-title">Privileges Lists</h6>
          
      <button  onclick="addLine()" data-toggle="tooltip" data-placement="left" title="Add a Task to this block" class="ms-btn-icon float-right"> <i class="material-icons text-disabled">add</i> </button>
             
             
              </div>
              <div class="ms-card-body">
                <ul id="uldin" class="ms-list ms-task-block">
             
             @foreach ($privilegesEmployees as $privilege)
            
      
                  <li class="ms-list-item ms-to-do-task ms-deletable">
                
                     <div class="col-md-12 mb-3">

                    <div class="input-group">
                      <select class="form-control"  id="validationCustom22" >
                 
                      @foreach ($privileges as $allprivilege)
                      
                      @if ($privilege->id ==  $allprivilege->id  )
                                
                    
                      <option value="{{ $allprivilege->id }}" selected="selected"  >{{ $allprivilege->privilegeName }}</option>
                            @else
                      
                            <option value="{{ $allprivilege->id }}">{{ $allprivilege->privilegeName }}</option>
                            @endif


                      @endforeach


                      </select>

                    </div>
                   </div>

             

                   <div class="col-md-12 mb-3">
                    <button type="submit" class="close"><i class="flaticon-trash ms-delete-trigger"> </i></button>
                
                   </div>

              </li>
            
                  @endforeach
      
             
                </ul>
              </div>
              <div class="ms-card-footer clearfix">
             </div>
            </div>
          </div>








          










      </div>
    </div>


  
    @endsection



    




    @section('script')
    <script>
      $(document).ready(function() { 	
      $('a').removeClass( "active" ) ;
      
      $(".clikihafhome").each(function(){
          $(this).click();
      });
      
      });
      
        </script>
    <script>
  
      function submitForm(){
  
        
  var formElements = new Array();
  $("#uldin :input").not("#uldin :button").each(function(){
      formElements.push($(this).val());
  });
  
  var hidinput = document.getElementById('validationCustom36').value= formElements;
  
      }
  
  
  
  function addLine() {
  
  var ul = document.getElementById('uldin');
  
   
  var li = document.createElement('li');
  li.classList.add("ms-list-item");
  li.classList.add("ms-to-do-task");
  li.classList.add("ms-deletable");
  
  
  
  var div1 = document.createElement('div');
  div1.classList.add("col-md-12");
  div1.classList.add("mb-3");
  
  
  
  var div2 = document.createElement('div');
  div2.classList.add("input-group");
  
  
  
  
  div2.innerHTML = "<select class='form-control'  id='validationCustom22' >\
                 @foreach ($privileges as $allprivilege)\
               <option value='{{ $allprivilege->id }}'>{{ $allprivilege->privilegeName }}</option>\
                  @endforeach\
                 </select>";
  
  
  var button = document.createElement('button');
  button.classList.add("close");
  button.setAttribute('type', 'submit');
  
  
  var i = document.createElement('i');
  i.classList.add("flaticon-trash");
  i.classList.add("ms-delete-trigger");
  
  
  button.appendChild(i);
  
  
  
  div1.appendChild(div2);
  
  var div4 = document.createElement('div');
  div4.classList.add("col-md-12");
  div4.classList.add("mb-3");
  div4.appendChild(button);
  li.appendChild(div1);
  
  
 
  li.appendChild(div4);
  
 
  
  ul.appendChild(li);
  
  
  
  
  }
  
    </script>
  @endsection
  