
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
              <li class="breadcrumb-item active" aria-current="page">Add Product</li>
            </ol>
          </nav>




     
         







        </div>



        <div class="col-xl-6 col-md-12">
          <div class="ms-panel ms-panel-fh">
            <div class="ms-panel-header">
              <h6>Add Category Form</h6>
            </div>
            <div class="ms-panel-body">
              <form method="POST"  action="{{ url('admin/addCategoryForm') }}"  class="needs-validation clearfix" novalidate>
                
              @csrf
                <div class="form-row">



                            
         
    

                  <div class="col-md-12 mb-3">
                    <label for="validationCustom18">Category Name</label>
                    <div class="input-group">
                      <input type="text" name="categoryName" value="{{ old('categoryName') }}"  class="form-control @error('categoryName') is-invalid @enderror" id="validationCustom18" placeholder="category Name" required >
                      <div class="valid-feedback">
                        Looks good!
                      </div>
                      @error('categoryName')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                    </div>
                  </div>



                  <div class="col-md-12 mb-3">
                    <label for="validationCustom18">{{__('Category Name Arabe')}}</label>
                    <div class="input-group">
                      <input type="text" name="categoryName_ar" value="{{ old('categoryName_ar') }}"  class="form-control @error('categoryName_ar') is-invalid @enderror" id="validationCustom18" placeholder="category Name Arabe (not required)"  >
                      <div class="valid-feedback">
                        Looks good!
                      </div>
                      @error('categoryName_ar')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                    </div>
                  </div>



                </div>



                <div class="ms-panel-header new">
                  <button class="btn btn-primary d-block" type="submit">Add category</button>
                </div>



              </form>

            </div>
          </div>

        </div>





        <div class="col-xl-6 col-md-12">
          <div class="ms-panel">
            <div class="ms-panel-header">
              <h6>{{__('All Categories List')}}</h6>
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


















    

    
<!-- ========================================================================== -->


<form id="form_ex_send" method="POST" action="{{ url('/admin/updateNameCategory') }}" >
  @csrf


    
 
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel"></h4>
      </div>
      <div class="modal-body khta">


        <input name="id_category" id="hiddenIdCategory" type="hidden" value="" >
         
   


        
        <div class="col-md-12 mb-3">
          <label for="inputcatnoarab">{{__('Category Name')}}</label>
          <div class="input-group">
            <input type="text" name="categoryNameUp" value="{{ old('categoryName') }}"  class="form-control @error('categoryName') is-invalid @enderror" id="inputcatnoarab"   >
            <div class="valid-feedback">
              Looks good!
            </div>
            @error('categoryName')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>
        </div>


        
        <div class="col-md-12 mb-3">
          <label for="inputarabecat">{{__('Category Name Arabe')}}</label>
          <div class="input-group">
            <input type="text" name="categoryName_arUp" value="{{ old('categoryName_ar') }}"  class="form-control @error('categoryName_ar') is-invalid @enderror" id="inputarabecat" required >
            <div class="valid-feedback">
              Looks good!
            </div>
            @error('categoryName_ar')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>
        </div>




      
    
     
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

        <button type="submit" class="btn btn-primary"  id="regitEx"  onclick="event.preventDefault();
        document.getElementById('form_ex_send').submit();"  > Update</button>







     
      </div>
    </div>
  </div>
</div>       








</form>
<!-------------------------------------------------------------------->





































  
    @endsection


    



    

@section('script')

<script>

(function($) {
  'use strict';

   var dataSet12 = [
    @foreach ($allcategories as $category)
                            

   [ "{{ $category->id }}","  {{ $category->categoryName }}", "  {{ $category->categoryName_ar }}",
   "<button id='exNoForm' class='ms-btn-icon btn-success'  \
    onclick=\"changeTextOfLabelInCOnfermationAlert({{ $category->id}},'{{ $category->categoryName}}','{{ $category->categoryName_ar}}')\" \
    type='button' data-toggle='modal' data-target='#exampleModal' data-whatever='@getbootstrap' > <i class='flaticon-tick-inside-circle' ></i></button>"
   

   ],
   
                            @endforeach
];









  var tableFour = $('#data-table-123').DataTable( {
    data: dataSet12,
    columns: [
      { title: "{{__('category ID')}}" },
      { title: "{{__('category Name')}}" },
      { title: "{{__('category Name Arabe')}}" },
      { title: "{{__('Action')}}" },
     


    ],
  });


 




})(jQuery);

</script>

<script>

  function changeTextOfLabelInCOnfermationAlert(idCategory,catName,catName_ar){
    


                                
        document.getElementById('hiddenIdCategory').value = idCategory;
        document.getElementById('inputcatnoarab').value = catName;
        document.getElementById('inputarabecat').value = catName_ar;
     
              
              
              };
  
  </script>
  
@endsection
