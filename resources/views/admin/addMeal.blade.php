
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
              <li class="breadcrumb-item"><a href="#">Menu</a></li>
              <li class="breadcrumb-item active" aria-current="page">Add Meal</li>
            </ol>
          </nav>




          
        
         







        </div>



        <div class="col-xl-6 col-md-12">
          <div class="ms-panel ms-panel-fh">
            <div class="ms-panel-header">
              <h6>Add Meal Form</h6>
            </div>
            <div class="ms-panel-body">
              <form onsubmit="return submitForm();" id="ratinoupikamila" method="POST"  action="{{ url('admin/addMealForm') }}" enctype="multipart/form-data" class="needs-validation clearfix" novalidate>
                
              @csrf
                <div class="form-row">



                            
                  <input id="validationCustom36" name="var[]" type="hidden" value="" />

    

                  <div class="col-md-12 mb-3">
                    <label for="validationCustom18">Meal Name</label>
                    <div class="input-group">
                   
                      <input type="text" name="mealName" value="{{ old('mealName') }}"  class="form-control @error('mealName') is-invalid @enderror" id="validationCustom18" placeholder="Meal Name" required >
                      <div class="valid-feedback">
                        Looks good!
                      </div>
                      @error('mealName')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                    </div>
                  </div>




                  <div class="col-md-12 mb-3">
                    <label for="validationCustom18">Meal Name In Arabic (not required)</label>
                    <div class="input-group">
                   
                      <input type="text" name="mealName_ar" value="{{ old('mealName_ar') }}"  class="form-control @error('mealName_ar') is-invalid @enderror" id="validationCustom18" placeholder="Meal Name In Arabic"  >
                      <div class="valid-feedback">
                        Looks good!
                      </div>
                      @error('mealName_ar')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                    </div>
                  </div>











               

                  <div class="col-md-12 mb-3">
                    <label for="validationCustom22">Select Catagory</label>
                    <div class="input-group">
                      <select class="form-control @error('category') is-invalid @enderror " name="category" id="validationCustom22" >
                 
                     @foreach ($categories as $category)
                            

                      <option value="{{ $category->id }}">{{ $category->categoryName }}</option>

                     @endforeach


                      </select>
                      <div class="invalid-feedback">
                        Please select a Catagory.
                      </div>
                    </div>
                  </div>
        




                  <div class="col-md-12 mb-3">
                    <label for="validationCustom25">Price</label>
                    <div class="input-group">
                      <input type="number" min="0" step=".01"  value="{{ old('price') }}"  class="form-control @error('price') is-invalid @enderror " name="price" id="validationCustom25" placeholder="price" required>
                     
                      @error('price')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                    </div>
                  </div>

                  <div class="col-md-12 mb-3">
                    <label for="validationCustom25">tax</label>
                    <div class="input-group">
                      <input type="number" min="0" step=".01"  value="{{ old('tax') }}"  class="form-control @error('tax') is-invalid @enderror " name="tax" id="validationCustom25" placeholder="tax" required>
                     
                      @error('tax')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                    </div>
                  </div>



                  
                  <div class="col-md-12 mb-3">
                    <label for="validationCustom12">Description</label>
                    <div class="input-group">
                      <textarea rows="5"  name="description" id="validationCustom12"   class="form-control @error('price') is-invalid @enderror" placeholder="Message" required >{{ old('description') }}</textarea>
                      @error('description')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                    </div>
                  </div>
                  <div class="col-md-12 mb-3">
                    <label for="validationCustom12">Product Image</label>
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
                  <button  class="btn btn-primary d-block" type="submit">Add Meal</button>
                </div>



              </form>

            </div>
          </div>

        </div>

      








































           <!-- Todo Widget -->
           <div class="col-xl-6 col-md-12 ms-deletable ms-todo-list">
            <div class="ms-card ms-widget ms-card-fh">
              <div class="ms-card-header clearfix">
                <h6 class="ms-card-title">Ingredients Lists</h6>
            {{--     <button data-toggle="tooltip" data-placement="left" title="Add a Task to this block" class="ms-add-task-to-block ms-btn-icon float-right"> <i class="material-icons text-disabled">add</i> </button>
                 --}}
      <button  onclick="addLine()" data-toggle="tooltip" data-placement="left" title="Add a Task to this block" class="ms-btn-icon float-right"> <i class="material-icons text-disabled">add</i> </button>
             
             
              </div>
              <div class="ms-card-body">
                <ul id="uldin" class="ms-list ms-task-block">
             
             
            
      
             
                </ul>
              </div>
              <div class="ms-card-footer clearfix">
                <a href="#" class="text-disabled mr-2"> <i class="flaticon-archive"> </i> Archive </a>
                <a href="#" class="text-disabled ms-delete-trigger float-right"> <i class="flaticon-trash"> </i> Delete </a>
              </div>
            </div>
          </div>



















      </div>
    </div>


  
    @endsection



    



@section('script')

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




div2.innerHTML = "<select class='form-control @error('category') is-invalid @enderror ' name='category' id='validationCustom22' >@foreach ($products as $product)<option value='{{ $product->id }}'>{{ $product->productName }}  ========>  {{ $product->unity }}</option>@endforeach</select>";


var div3 = document.createElement('div');
div3.classList.add("col-md-12");
div3.classList.add("mb-3");


div3.innerHTML = "  <label for='validationCustom25'>qnt</label><div class='input-group'><input type='number' value='{{ old('price') }}'  class='form-control @error('price') is-invalid @enderror ' name='price' id='validationCustom25' placeholder='quantity' required>@error('price')<span class='invalid-feedback' role='alert'><strong>{{ $message }}</strong></span>@enderror</div>";



var button = document.createElement('button');
button.classList.add("close");
button.setAttribute('type', 'submit');


var i = document.createElement('i');
i.classList.add("flaticon-trash");
i.classList.add("ms-delete-trigger");


button.appendChild(i);



div1.appendChild(div2);

//hadi test ====================
var div4 = document.createElement('div');
div4.classList.add("col-md-12");
div4.classList.add("mb-3");
div4.appendChild(button);
//==============================
li.appendChild(div1);

li.appendChild(div3);


//hadi test ====================

li.appendChild(div4);

//==============================

//li.appendChild(button);


ul.appendChild(li);




}

  </script>
@endsection

