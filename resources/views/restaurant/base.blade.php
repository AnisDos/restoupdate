<!DOCTYPE html>
<html lang="en">


<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width,initial-scale=1">
{{--   <meta name="csrf-token" content="{{ csrf_token() }}"> --}}
  <title>innovar Dashboard</title>
  <!-- Iconic Fonts -->

  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="vendors/iconic-fonts/font-awesome/css/all.min.css" rel="stylesheet">
  <link rel="stylesheet" href="{{  asset ('styleRestoIT/vendors/iconic-fonts/flat-icons/flaticon.css') }}">
  <link rel="stylesheet" href="{{  asset ('styleRestoIT/vendors/iconic-fonts/cryptocoins/cryptocoins.css') }}">
  <link rel="stylesheet" href="{{  asset ('styleRestoIT/vendors/iconic-fonts/cryptocoins/cryptocoins-colors.css') }}">
  <!-- Bootstrap core CSS -->
  <link href="{{  asset ('styleRestoIT/assets/css/bootstrap.min.css') }}" rel="stylesheet">
  <!-- jQuery UI -->
  <link href="{{  asset ('styleRestoIT/assets/css/jquery-ui.min.css') }}" rel="stylesheet">
  <!-- Page Specific CSS (Slick Slider.css) -->
  <link href="{{  asset ('styleRestoIT/assets/css/slick.css') }}" rel="stylesheet">
  <link href="{{  asset ('styleRestoIT/assets/css/datatables.min.css') }}" rel="stylesheet">
  <!-- Costic styles -->
  <link href="{{  asset ('styleRestoIT/assets/css/style.css') }}" rel="stylesheet">
  <!-- Favicon -->
  <link rel="icon" type="image/png" sizes="32x32" href="favicon.ico">
</head>

<body class="ms-body ms-aside-left-open ms-primary-theme ms-has-quickbar">
  <!-- Preloader -->
  <div id="preloader-wrap">
    <div class="spinner spinner-8">
      <div class="ms-circle1 ms-child"></div>
      <div class="ms-circle2 ms-child"></div>
      <div class="ms-circle3 ms-child"></div>
      <div class="ms-circle4 ms-child"></div>
      <div class="ms-circle5 ms-child"></div>
      <div class="ms-circle6 ms-child"></div>
      <div class="ms-circle7 ms-child"></div>
      <div class="ms-circle8 ms-child"></div>
      <div class="ms-circle9 ms-child"></div>
      <div class="ms-circle10 ms-child"></div>
      <div class="ms-circle11 ms-child"></div>
      <div class="ms-circle12 ms-child"></div>
    </div>
  </div>
  <!-- Overlays -->
  <div class="ms-aside-overlay ms-overlay-left ms-toggler" data-target="#ms-side-nav" data-toggle="slideLeft"></div>
  <div class="ms-aside-overlay ms-overlay-right ms-toggler" data-target="#ms-recent-activity" data-toggle="slideRight"></div>
  <!-- Sidebar Navigation Left -->
  <aside id="ms-side-nav" class="side-nav fixed ms-aside-scrollable ms-aside-left">
    <!-- Logo -->
    <div class="logo-sn ms-d-block-lg">
      <a class="pl-0 ml-0 text-center" href="{{ url('restaurant') }}">
        <img src="{{ asset ('styleRestoIT/assets/img/costic/costic-logo-216x62.png') }}" alt="logo">
      </a>
    </div>
    <!-- Navigation -->
    <ul class="accordion ms-main-aside fs-14" id="side-nav-accordion">
      <!-- Dashboard -->
      <li class="menu-item">
        <a href="{{ url('restaurant') }}"  > <span><i class="material-icons fs-16">dashboard</i>{{__('Dashboard')}} </span>
        </a>
       
      </li>
      <!-- /Dashboard -->
      
      @foreach ($privileges as $privilege)

      @if ($privilege->privilegeName == "menus")
      <!-- product -->
      <li class="menu-item">
        <a href="#" class="has-chevron clikihafhome" data-toggle="collapse" data-target="#product" aria-expanded="false" aria-controls="product"> <span><i class="material-icons fs-16">restaurant_menu</i>{{__('Menus')}} </span>
        </a>
        
        <ul id="product" class="collapse" aria-labelledby="product" data-parent="#side-nav-accordion">
         
          <li> <a href="{{ url('restaurant/mealsList') }}">{{__('Meals List')}}</a>
          </li>
        
          <li> <a href="{{ url('restaurant/addMeal') }}">{{__('Add Meal')}}</a>
          </li>
       
        
        </ul>
      </li>
      <!-- product end -->
@endif






@if ($privilege->privilegeName == "stocks")


           <!-- stock product -->
           <li class="menu-item">
        <a href="#" class="has-chevron clikihafhome" data-toggle="collapse" data-target="#product1" aria-expanded="false" aria-controls="product1"> <span><i class="material-icons fs-16">category</i>{{__('Stock Products')}} </span>
        </a>
        <ul id="product1" class="collapse" aria-labelledby="product1" data-parent="#side-nav-accordion">
    
          <li> <a href="{{ url('restaurant/productsList') }}">{{__('Products List')}}</a>
          </li>
      
  
          <li> <a href="{{ url('restaurant/addProduct') }}">{{__('Add Product')}}</a>
          </li>
           
          <li> <a href="{{ url('restaurant/addVersionProduct') }}">{{__('Add Version Product')}}</a>
          </li>
          <li> <a href="{{ url('restaurant/addCategory') }}">{{__('Add Category')}}</a>
          </li>

         {{--  <li> <a href="{{ url('restaurant/mealDetails') }}">Meal Detail</a>
          </li> --}}
        </ul>
      </li>
      <!-- stock product end -->


      @endif









      @if ($privilege->privilegeName == "employee")

      <!-- employee-->
      <li class="menu-item">
        <a href="#" class="has-chevron clikihafhome" data-toggle="collapse" data-target="#customer" aria-expanded="false" aria-controls="customer"> <span><i class="material-icons fs-16">supervisor_account</i>{{__('Employees')}} </span>
        </a>
        <ul id="customer" class="collapse" aria-labelledby="customer" data-parent="#side-nav-accordion">
          <li> <a href="{{ url('restaurant/addEmployee') }}"> {{__('Add Employee')}} </a>
          </li>
          <li> <a href="{{ url('restaurant/allEmployee') }}">{{__('all Employee')}}</a>
          </li>
          <li> <a href="{{ url('restaurant/employeeCharge') }}">{{__('Employee Charget')}}</a>
          </li>
        
        </ul>
      </li>
      <!-- employee  end -->    
      
      

@endif







@if ($privilege->privilegeName == "providers")

<!-- Provider-->
<li class="menu-item">
  <a href="#" id="clikiha3fois" class="has-chevron clikihafhome" data-toggle="collapse" data-target="#providertlj" aria-expanded="false" aria-controls="providertlj"> <span><i class="material-icons fs-16">directions_run</i>{{__('Providers')}} </span>
  </a>
  <ul id="providertlj" class="collapse" aria-labelledby="providertlj" data-parent="#side-nav-accordion">
    <li> <a href="{{ url('restaurant/addProvider') }}"> {{__('Add Provider')}} </a>
    </li>
{{--     <li> <a href="{{ url('restaurant/allProviders') }}">{{__('all Providers')}}</a>
    </li>
   --}}
  
  </ul>
</li>
<!-- Provider  end -->    



@endif





@if ($privilege->privilegeName == "employee")




    <!-- Privilege -->
    <li class="menu-item">
      <a href="#" class="has-chevron clikihafhome" data-toggle="collapse" data-target="#icons" aria-expanded="false" aria-controls="icons"> <span><i class="material-icons fs-16">receipt_long</i>{{__('Privileges')}}</span>
      </a>
      <ul id="icons" class="collapse" aria-labelledby="icons" data-parent="#side-nav-accordion">
        <li> <a href="{{ url('restaurant/addPrivilegeToUser') }}">{{__('Add Privilege to Employee')}}</a>
        </li>
       
      </ul>
    </li>
    <!-- /Privilege --> 

@endif
    

@if ($privilege->privilegeName == "caisses")

  <!-- Caisse Elements -->
  <li class="menu-item">
    <a href="#" class="has-chevron clikihafhome" data-toggle="collapse" data-target="#basic-elements" aria-expanded="false" aria-controls="basic-elements"> <span><i class="material-icons fs-16">attach_money</i>{{__('Caisse')}} </span>
    </a>
    <ul id="basic-elements" class="collapse" aria-labelledby="basic-elements" data-parent="#side-nav-accordion">
    
      <li> <a href="{{ url('restaurant/addCaisse') }}">{{__('Add Caisse')}}</a>
      </li>
    {{--   <li> <a href="{{ url('restaurant/allCaisses') }}">{{__('All Caisses')}}</a>
      </li> --}}
    
 
    </ul>
  </li>
  <!-- /Caisse Elements -->

@endif

@if ($privilege->privilegeName == "charges")
          <!-- charge -->
          <li class="menu-item">
            <a href="#" class="has-chevron clikihafhome" data-toggle="collapse" data-target="#invoice" aria-expanded="false" aria-controls="invoice"> <span><i class="material-icons fs-16">phone_iphone</i>{{__('Charge')}} </span>
            </a>
            <ul id="invoice" class="collapse" aria-labelledby="invoice" data-parent="#side-nav-accordion">
  
              <li> <a href="{{ url('restaurant/addSupCharge') }}">{{__('Charge')}}</a>
              </li>
            </ul>
          </li>
          <!-- charge end -->

@endif


@if ($privilege->privilegeName == "customers")

<!-- Provider-->
<li class="menu-item">
  <a href="#" class="has-chevron clikihafhome" data-toggle="collapse" data-target="#customershh" aria-expanded="false" aria-controls="customershh"> <span><i class="material-icons fs-16">emoji_people</i>{{__('Customers')}} </span>
  </a>
  <ul id="customershh" class="collapse" aria-labelledby="customershh" data-parent="#side-nav-accordion">
 
    <li> <a href="{{ url('restaurant/allCustomers') }}">{{__('all Customers')}}</a>
    </li>
  
  
  </ul>
</li>
<!-- Provider  end -->    



@endif

@if ($privilege->privilegeName == "stocks")

<li class="menu-item">
  <a href="{{ url('restaurant/stockEstimate') }}" aria-expanded="false" aria-controls="customershh"> <span><i class="material-icons fs-16">equalizer</i>{{__('stock estimate')}} </span>
  </a>
  
</li>
  @endif



  @if ($privilege->privilegeName == "deliveryCompany")

  <!-- DeliveryCompany Elements -->
  <li class="menu-item">
    <a href="#" class="has-chevron clikihafhome" data-toggle="collapse" data-target="#basic-elementsdelevery" aria-expanded="false" aria-controls="basic-elementsdelevery"> <span><i class="material-icons fs-16">apartment</i>{{__('Delivery Company')}} </span>
    </a>
    <ul id="basic-elementsdelevery" class="collapse" aria-labelledby="basic-elementsdelevery" data-parent="#side-nav-accordion">
    
      <li> <a href="{{ url('restaurant/addDeliveryCompany') }}"> {{__('Delivery Company')}}</a>
      </li>
   
 
    </ul>
  </li>
  <!-- /delevryCompany Elements -->

@endif


@if ($privilege->privilegeName == "screens")

<li class="menu-item">
  <a href="{{ url('restaurant/screens') }}" > <span><i class="material-icons fs-16">video_label</i>Screens </span>
  </a>
  
</li>
  @endif



@endforeach

  <!-- weekProgram Elements -->
  <li class="menu-item">
    <a href="#" class="has-chevron clikihafhome" data-toggle="collapse" data-target="#weekelementbas" aria-expanded="false" aria-controls="weekelementbas"> <span><i class="material-icons fs-16">date_range</i>{{__('Week Program')}} </span>
    </a>
    <ul id="weekelementbas" class="collapse" aria-labelledby="weekelementbas" data-parent="#side-nav-accordion">
    
      <li> <a href="{{ url('restaurant/weekProgram') }}">{{__('Week Program')}}</a>
      </li>
     {{--  <li> <a href="{{ url('restaurant/allweekProgram') }}">All weekPrograms</a>
      </li>
     --}}
 
    </ul>
  </li>
  <!-- /weekProgram Elements -->




    <!-- live Order Elements -->
    <li class="menu-item">
      <a href="{{ url('restaurant/liveOrders') }}"  > <span><i class="material-icons fs-16">playlist_add_check</i>{{__('Live Orders')}} </span>
      </a>
 
    </li>
    <!-- /live Order Elements -->



     <!-- History of Actions Elements -->
     <li class="menu-item">
      <a href="{{ url('restaurant/historyTransactions') }}"  > <span><i class="material-icons fs-16">history</i>{{__('History of Actions')}} </span>
      </a>
 
    </li>
    <!-- /History of Actions Elements --> 


    </ul>
  </aside>
  <!-- Sidebar Right -->
  <aside id="ms-recent-activity" class="side-nav fixed ms-aside-right ms-scrollable">
    <div class="ms-aside-header">
      <ul class="nav nav-tabs tabs-bordered d-flex nav-justified mb-3" role="tablist">
        <li role="presentation" class="fs-12"><a href="#activityLog" aria-controls="activityLog" class="active" role="tab" data-toggle="tab"> Activity Log</a>
        </li>
        <li>
          <button type="button" class="close ms-toggler text-center" data-target="#ms-recent-activity" data-toggle="slideRight"><span aria-hidden="true">&times;</span>
          </button>
        </li>
      </ul>
    </div>
    <div class="ms-aside-body">
      <div class="tab-content">
        <div role="tabpanel" class="tab-pane active fade show" id="activityLog">
          <ul class="ms-activity-log">
            <li>
              <div class="ms-btn-icon btn-pill icon btn-light"> <i class="flaticon-gear"></i>
              </div>
              <h6>Update 1.0.0 Pushed</h6>
              <span> <i class="material-icons">event</i>1 January, 2019</span>
              <p class="fs-14">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque scelerisque diam non nisi semper, ula in sodales vehicula....</p>
            </li>
            <li>
              <div class="ms-btn-icon btn-pill icon btn-success"> <i class="flaticon-tick-inside-circle"></i>
              </div>
              <h6>Profile Updated</h6>
              <span> <i class="material-icons">event</i>4 March, 2018</span>
              <p class="fs-14">Curabitur purus sem, malesuada eu luctus eget, suscipit sed turpis. Nam pellentesque felis vitae justo accumsan, sed semper nisi sollicitudin...</p>
            </li>
            <li>
              <div class="ms-btn-icon btn-pill icon btn-warning"> <i class="flaticon-alert-1"></i>
              </div>
              <h6>Your payment is due</h6>
              <span> <i class="material-icons">event</i>1 January, 2019</span>
              <p class="fs-14">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque scelerisque diam non nisi semper, ula in sodales vehicula....</p>
            </li>
            <li>
              <div class="ms-btn-icon btn-pill icon btn-danger"> <i class="flaticon-alert"></i>
              </div>
              <h6>Database Error</h6>
              <span> <i class="material-icons">event</i>4 March, 2018</span>
              <p class="fs-14">Curabitur purus sem, malesuada eu luctus eget, suscipit sed turpis. Nam pellentesque felis vitae justo accumsan, sed semper nisi sollicitudin...</p>
            </li>
            <li>
              <div class="ms-btn-icon btn-pill icon btn-info"> <i class="flaticon-information"></i>
              </div>
              <h6>Checkout what's Trending</h6>
              <span> <i class="material-icons">event</i>1 January, 2019</span>
              <p class="fs-14">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque scelerisque diam non nisi semper, ula in sodales vehicula....</p>
            </li>
            <li>
              <div class="ms-btn-icon btn-pill icon btn-secondary"> <i class="flaticon-diamond"></i>
              </div>
              <h6>Your Dashboard is ready</h6>
              <span> <i class="material-icons">event</i>4 March, 2018</span>
              <p class="fs-14">Curabitur purus sem, malesuada eu luctus eget, suscipit sed turpis. Nam pellentesque felis vitae justo accumsan, sed semper nisi sollicitudin...</p>
            </li>
          </ul> <a href="#" class="btn btn-primary d-block"> View All </a>
        </div>
      </div>
    </div>
  </aside>
  <!-- Main Content -->
  <main class="body-content">
    <!-- Navigation Bar -->
    <nav class="navbar ms-navbar">
      <div class="ms-aside-toggler ms-toggler pl-0" data-target="#ms-side-nav" data-toggle="slideLeft"> <span class="ms-toggler-bar bg-primary"></span>
        <span class="ms-toggler-bar bg-primary"></span>
        <span class="ms-toggler-bar bg-primary"></span>
      </div>
      <div class="logo-sn logo-sm ms-d-block-sm">
        <a class="pl-0 ml-0 text-center navbar-brand mr-0" href="{{ url('restaurant') }}"><img src="{{  asset ('styleRestoIT/assets/img/costic/costic-logo-84x41.png') }}" alt="logo"> </a>
      </div>
      <ul class="ms-nav-list ms-inline mb-0" id="ms-nav-options">
        <li class="ms-nav-item ms-search-form pb-0 py-0">
          <form class="ms-form" method="post">
            <div class="ms-form-group my-0 mb-0 has-icon fs-14">
              <input type="search" class="ms-form-input" name="search" placeholder="Search here..." value=""> <i class="flaticon-search text-disabled"></i>
            </div>
          </form>
        </li>
     
       
        <li class="ms-nav-item dropdown"> <a href="#" class="text-disabled @if($productNoQnt) ms-has-notification @endif" id="notificationDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="flaticon-bell"></i></a>
          <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="notificationDropdown">
            <li class="dropdown-menu-header">
              <h6 class="dropdown-header ms-inline m-0"><span class="text-disabled">Notifications</span></h6><span class="badge badge-pill badge-info">{{count($productNoQnt)}} New</span>
            </li>
            <li class="dropdown-divider"></li>
            <li class="ms-scrollable ms-dropdown-list">
              @foreach ($productNoQnt as $prod)
              <a class="media p-2" href="/restaurant/purchaseOrder/{{ $prod->id}}">
                <div class="media-body"> <span> Inventory shortage <strong> {{ $prod->productName}} </strong> go check it</span>

                </div>
              </a>
              @endforeach
          {{--     <a class="media p-2" href="#">
                <div class="media-body"> <span>12 ways to improve your crypto dashboard</span>
                  <p class="fs-10 my-1 text-disabled"><i class="material-icons">access_time</i> 30 seconds ago</p>
                </div>
              </a>
              <a class="media p-2" href="#">
                <div class="media-body"> <span>You have newly registered users</span>
                  <p class="fs-10 my-1 text-disabled"><i class="material-icons">access_time</i> 45 minutes ago</p>
                </div>
              </a>
              <a class="media p-2" href="#">
                <div class="media-body"> <span>Your account was logged in from an unauthorized IP</span>
                  <p class="fs-10 my-1 text-disabled"><i class="material-icons">access_time</i> 2 hours ago</p>
                </div>
              </a>
              <a class="media p-2" href="#">
                <div class="media-body"> <span>An application form has been submitted</span>
                  <p class="fs-10 my-1 text-disabled"><i class="material-icons">access_time</i> 1 day ago</p>
                </div>
              </a> --}}
            </li>
            <li class="dropdown-divider"></li>
            <li class="dropdown-menu-footer text-center"> <a href="#">{{__('View all Notifications')}}</a>
            </li>
          </ul>
        </li>







{{App::setLocale(Session::get('locale'))}}

    
          <select id="youpider"  >
            <option value="en" @if(Session::get('locale') == "en" ) selected @endif  > <span class="flag-icon flag-icon-us"></span> English</option>
          <option  value="ar"  @if(Session::get('locale') == "ar" ) selected @endif  > <span class="flag-icon flag-icon-mx"></span> Arab</option>
        </select>

     










        <li class="ms-nav-item ms-nav-user dropdown">
          <a href="#" id="userDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <img class="ms-user-img ms-img-round float-right" src="/storage/{{Auth::user()->restaurant->image}}" alt="people">
          </a>
          <ul class="dropdown-menu dropdown-menu-right user-dropdown" aria-labelledby="userDropdown">
            <li class="dropdown-menu-header">
              <h6 class="dropdown-header ms-inline m-0"><span class="text-disabled">{{ Auth::user()->email }}</span></h6>
            </li>
            <li class="dropdown-divider"></li>
            <li class="ms-dropdown-list">
              <a class="media fs-14 p-2" href="{{ url('restaurant') }}"> <span><i class="flaticon-user mr-2"></i> {{__('Profile')}}</span>
              </a>
           
            </li>
            <li class="dropdown-divider"></li>
            <li class="dropdown-menu-footer">
            
            </li>
            <li class="dropdown-menu-footer">
              <a class="media fs-14 p-2" href="{{ route('logout') }}" onclick="event.preventDefault();
              document.getElementById('logout-form').submit();"> <span><i class="flaticon-shut-down mr-2"></i> {{__('Logout')}}</span>
                
                      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
              </a>
            </li>
          </ul>
        </li>
      </ul>
      <div class="ms-toggler ms-d-block-sm pr-0 ms-nav-toggler" data-toggle="slideDown" data-target="#ms-nav-options"> <span class="ms-toggler-bar bg-primary"></span>
        <span class="ms-toggler-bar bg-primary"></span>
        <span class="ms-toggler-bar bg-primary"></span>
      </div>
    </nav>
    




    


 <!-- page content -->
   


 <form id="myFormlang"  method="POST" action="{{ url('changeLang') }}" >
  @csrf
  <input type="hidden" id="inputLangHid" name="lang" value="" >

</form>




<form id="myFormlangBlack"  method="POST" action="{{ url('changeLangBlack') }}" >
  @csrf
 

</form>

     
<script type="text/javascript" > 
  setTimeout(function() {
$('#successalert').fadeOut('fast');
}, 21000); // <-- time in milliseconds
</script>



@if (session('success'))
<div class="x_content bs-example-popovers" id="successalert" >
  <div class="alert alert-success" role="alert" style="text-align: center;" >
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
      </button>
      <strong>{{__('well done')}}!</strong> {{ session('success') }}
    </div>
  </div>


  @endif
@if (session('danger'))
<div class="x_content bs-example-popovers" id="successalert" >
<div class="alert alert-danger" role="alert" style="text-align: center;" >
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
    </button>
    <strong>{{__('DANGER')}}!</strong> {{ session('danger') }}
  </div>
</div>


@endif

 @yield('content')









<!-- /page content -->





  </main>
  <!-- MODALS -->
  <!-- Quick bar -->
  <aside id="ms-quick-bar" class="ms-quick-bar fixed ms-d-block-lg">

    <ul class="nav nav-tabs ms-quick-bar-list" role="tablist">

      <li class="ms-quick-bar-item ms-has-qa" role="presentation" data-toggle="tooltip" data-placement="left" title="Launch To-do-list" data-title="To-do-list">
        <a href="#qa-toDo" aria-controls="qa-toDo" role="tab" data-toggle="tab">
          <i class="flaticon-list"></i>

        </a>
      </li>
      <li class="ms-quick-bar-item ms-has-qa" role="presentation" data-toggle="tooltip" data-placement="left" title="Launch Reminders" data-title="Reminders">
        <a href="#qa-reminder" aria-controls="qa-reminder" role="tab" data-toggle="tab">
          <i class="flaticon-bell"></i>

        </a>
      </li>
      <li class="ms-quick-bar-item ms-has-qa" role="presentation" data-toggle="tooltip" data-placement="left" title="Launch Notes" data-title="Notes">
        <a href="#qa-notes" aria-controls="qa-notes" role="tab" data-toggle="tab">
          <i class="flaticon-pencil"></i>

        </a>
      </li>
  
      <li class="ms-quick-bar-item ms-has-qa" role="presentation" data-toggle="tooltip" data-placement="left" title="Settings" data-title="Settings">
        <a href="#qa-settings" aria-controls="qa-settings" role="tab" data-toggle="tab">
          <i class="flaticon-gear"></i>

        </a>
      </li>
    </ul>
    <div class="ms-configure-qa" data-toggle="tooltip" data-placement="left" title="Configure Quick Access">

      <a href="#">
        <i class="flaticon-hammer"></i>

      </a>

    </div>

    <!-- Quick bar Content -->
    <div class="ms-quick-bar-content">

      <div class="ms-quick-bar-header clearfix">
        <h5 class="ms-quick-bar-title float-left">Title</h5>
        <button type="button" class="close ms-toggler" data-target="#ms-quick-bar" data-toggle="hideQuickBar" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>

      <div class="ms-quick-bar-body tab-content">



        <div role="tabpanel" class="tab-pane" id="qa-toDo">
          <div class="ms-quickbar-container ms-todo-list-container ms-scrollable">

            <form class="ms-add-task-block">
              <div class="form-group mx-3 mt-0  fs-14 clearfix">
                <input type="text" class="form-control fs-14 float-left" id="task-block" name="todo-block" placeholder="Add Task Block" value="">
                <button type="submit" class="ms-btn-icon bg-primary float-right"><i class="material-icons text-disabled">add</i></button>
              </div>
            </form>

            <ul class="ms-todo-list">

              @foreach ($tasks as $task)
              <li class="ms-card ms-qa-card ms-deletable">

                <div class="ms-card-header clearfix">
                  <h6 class="ms-card-title">{{$task->title}}</h6>
                  <button data-toggle="tooltip" data-placement="left" title="Add a Task to this block" class="ms-add-task-to-block ms-btn-icon float-right"> <i class="material-icons text-disabled">add</i> </button>
                </div>

                <div class="ms-card-body">
                  <ul class="ms-list ms-task-block" id="idtask{{$task->id}}">

                    @foreach ($task->tasklists as $list)
                    <li class="ms-list-item ms-to-do-task ms-deletable">
                      <label class="ms-checkbox-wrap ms-todo-complete">
                        <input type="checkbox" value="" @if($list->active) checked @endif >
                        <i class="ms-checkbox-check"></i>
                      </label>
                      <input style=" border: 0;" readonly value="{{$list->to_do}}" >
                   {{-- <span> {{$list->to_do}} </span> --}}
                      <button type="submit" class="close"><i class="flaticon-trash ms-delete-trigger"> </i></button>
                    </li>
                    @endforeach


                 
                  </ul>
                </div>

                <div class="ms-card-footer clearfix">
                  <a onclick="archiveTask('{{$task->id}}')"  class="text-disabled mr-2"> <i class="flaticon-archive"> </i> Archive </a>
                  <a onclick="deleteTask('{{$task->id}}')"  class="text-disabled ms-delete-trigger float-right"> <i class="flaticon-trash"> </i> Delete </a>
                </div>

              </li>
              @endforeach




              <li class="ms-card ms-qa-card ms-deletable">

                <div class="ms-card-header clearfix">
                  <h6 class="ms-card-title">Task Block Title</h6>
                  <button data-toggle="tooltip" data-placement="left" title="Add a Task to this block" class="ms-add-task-to-block ms-btn-icon float-right"> <i class="material-icons text-disabled">add</i> </button>
                </div>

                <div class="ms-card-body">
                  <ul class="ms-list ms-task-block">
                    <li class="ms-list-item ms-to-do-task ms-deletable">
                      <label class="ms-checkbox-wrap ms-todo-complete">
                        <input type="checkbox" value="">
                        <i class="ms-checkbox-check"></i>
                      </label>
                      <span> Task to do </span>
                      <button type="submit" class="close"><i class="flaticon-trash ms-delete-trigger"> </i></button>
                    </li>
                    <li class="ms-list-item ms-to-do-task ms-deletable">
                      <label class="ms-checkbox-wrap ms-todo-complete">
                        <input type="checkbox" value="">
                        <i class="ms-checkbox-check"></i>
                      </label>
                      <span>Task to do</span>
                      <button type="submit" class="close"><i class="flaticon-trash ms-delete-trigger"> </i></button>
                    </li>
                  </ul>
                </div>

                <div class="ms-card-footer clearfix">
                  <a href="#" class="text-disabled mr-2"> <i class="flaticon-archive"> </i> Archive </a>
                  <a href="#" class="text-disabled  ms-delete-trigger float-right"> <i class="flaticon-trash"> </i> Delete </a>
                </div>

              </li>
            </ul>

          </div>
        </div>

        <div role="tabpanel" class="tab-pane" id="qa-reminder">
          <div class="ms-quickbar-container ms-reminders">

            <ul class="ms-qa-options">
              <li> <a href="#" data-toggle="modal" data-target="#reminder-modal"> <i class="flaticon-bell"></i> New Reminder </a> </li>
            </ul>

            <div class="ms-quickbar-container ms-scrollable">

              <div class="ms-card ms-qa-card ms-deletable">
                <div class="ms-card-body">
                  <p> Developer Meeting in Block B </p>
                  <span class="text-disabled fs-12"><i class="material-icons fs-14">access_time</i> Today - 3:45 pm</span>
                </div>
                <div class="ms-card-footer clearfix">

                  <div class="ms-note-editor float-right">
                    <a href="#" class="text-disabled mr-2" data-toggle="modal" data-target="#reminder-modal"> <i class="flaticon-pencil"> </i> Edit </a>
                    <a href="#" class="text-disabled  ms-delete-trigger"> <i class="flaticon-trash"> </i> Delete </a>
                  </div>

                </div>
              </div>
              <div class="ms-card ms-qa-card ms-deletable">
                <div class="ms-card-body">
                  <p> Start adding change log to version 2 </p>
                  <span class="text-disabled fs-12"><i class="material-icons fs-14">access_time</i> Tomorrow - 12:00 pm</span>
                </div>
                <div class="ms-card-footer clearfix">

                  <div class="ms-note-editor float-right">
                    <a href="#" class="text-disabled mr-2" data-toggle="modal" data-target="#reminder-modal"> <i class="flaticon-pencil"> </i> Edit </a>
                    <a href="#" class="text-disabled  ms-delete-trigger"> <i class="flaticon-trash"> </i> Delete </a>
                  </div>

                </div>
              </div>

            </div>

          </div>
        </div>

        <div role="tabpanel" class="tab-pane" id="qa-notes">

          <ul class="ms-qa-options">
            <li> <a href="#" data-toggle="modal" data-target="#notes-modal"> <i class="flaticon-sticky-note"></i> New Note </a> </li>
            <li> <a href="#"> <i class="flaticon-excel"></i> Export </a> </li>
          </ul>

          <div class="ms-quickbar-container ms-scrollable">

            <div class="ms-card ms-qa-card ms-deletable">
              <div class="ms-card-header">
                <h6 class="ms-card-title">Don't forget to check with the designer</h6>
              </div>
              <div class="ms-card-body">
                <p>
                  Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam vulputate urna in faucibus venenatis. Etiam at dapibus neque,
                  vel varius metus. Pellentesque eget orci malesuada, venenatis magna et
                </p>
         
              </div>
              <div class="ms-card-footer clearfix">

               
                <div class="ms-note-editor float-right">
                  <a href="#" class="text-disabled mr-2" data-toggle="modal" data-target="#notes-modal"> <i class="flaticon-pencil"> </i> Edit </a>
                  <a href="#" class="text-disabled  ms-delete-trigger"> <i class="flaticon-trash"> </i> Delete </a>
                </div>

              </div>
            </div>

            <div class="ms-card ms-qa-card ms-deletable">
              <div class="ms-card-header">
                <h6 class="ms-card-title">Perform the required unit tests</h6>
              </div>
              <div class="ms-card-body">
                <p>
                  Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam vulputate urna in faucibus venenatis. Etiam at dapibus neque,
                  vel varius metus. Pellentesque eget orci malesuada, venenatis magna et
                </p>
               
              </div>
              <div class="ms-card-footer clearfix">

               
                <div class="ms-note-editor float-right">
                  <a href="#" class="text-disabled mr-2" data-toggle="modal" data-target="#notes-modal"> <i class="flaticon-pencil"> </i> Edit </a>
                  <a href="#" class="text-disabled  ms-delete-trigger"> <i class="flaticon-trash"> </i> Delete </a>
                </div>

              </div>
            </div>

          </div>

        </div>

    

        <div role="tabpanel" class="tab-pane" id="qa-settings">

          <div class="ms-quickbar-container text-center ms-invite-member">
            <div class="row">
              <div class="col-md-12 text-left mb-5">
                <h4 class="section-title bold">Customize</h4>
                <div>
                  <label class="ms-switch">
                    <input type="checkbox" id="darkmodeo" @if(Session::get('black') ) checked @endif  onclick="changeDarkWitheMode()" >
                    <span class="ms-switch-slider round"></span>
                  </label>
                  <span> Dark Mode </span>
                </div>
                <div>
                  <label class="ms-switch">
                    <input type="checkbox" id="remove-quickbar">
                    <span class="ms-switch-slider round"></span>
                  </label>
                  <span> Remove Quickbar </span>
                </div>
              </div>
              <div class="col-md-12 text-left">
                <h4 class="section-title bold">Keyboard Shortcuts</h4>
                <p class="ms-directions mb-0"><code>Esc</code> Close Quick Bar</p>
                <p class="ms-directions mb-0"><code>Alt + (1 -&gt; 6)</code> Open Quick Bar Tab</p>
                <p class="ms-directions mb-0"><code>Alt + Q</code> Enable Quick Bar Configure Mode</p>

              </div>
            </div>
          </div>

        </div>

      </div>

    </div>
  </aside>
  <!-- Reminder Modal -->
  <div class="modal fade" id="reminder-modal" tabindex="-1" role="dialog" aria-labelledby="reminder-modal">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header bg-secondary">
          <h5 class="modal-title has-icon text-white"> New Reminder</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form>
          <div class="modal-body">
            <div class="ms-form-group">
              <label>Remind me about</label>
              <textarea class="form-control" name="reminder"></textarea>
            </div>
            <div class="ms-form-group"> <span class="ms-option-name fs-14">Repeat Daily</span>
              <label class="ms-switch float-right">
                <input type="checkbox"> <span class="ms-switch-slider round"></span>
              </label>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="ms-form-group">
                  <input type="text" class="form-control datepicker" name="reminder-date" value="" />
                </div>
              </div>
              <div class="col-md-6">
                <div class="ms-form-group">
                  <select class="form-control" name="reminder-time">
                    <option value="">12:00 pm</option>
                    <option value="">1:00 pm</option>
                    <option value="">2:00 pm</option>
                    <option value="">3:00 pm</option>
                    <option value="">4:00 pm</option>
                  </select>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-secondary shadow-none" data-dismiss="modal">Add Reminder</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <!-- Notes Modal -->
  <div class="modal fade" id="notes-modal" tabindex="-1" role="dialog" aria-labelledby="notes-modal">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header bg-secondary">
          <h5 class="modal-title has-icon text-white" id="NoteModal">New Note</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form>
          <div class="modal-body">
            <div class="ms-form-group">
              <label>Note Title</label>
              <input type="text" class="form-control" name="note-title" value="">
            </div>
            <div class="ms-form-group">
              <label>Note Description</label>
              <textarea class="form-control" name="note-description"></textarea>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-secondary shadow-none" data-dismiss="modal">Add Note</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <!-- SCRIPTS -->
  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script>

  
  
$('#youpider').on('change', function (e) {
    var valueSelected = this.value;
    $('#inputLangHid').val(valueSelected);
    $("#myFormlang").submit();
    console.log(valueSelected);
    
});
</script>


<script>
  $(document).ready(function() { 	
    if({{Session::get('black')}}  ) {
      $('body').toggleClass('ms-dark-theme');
    }
    
    console.log('ghfhg');
 console.log({{Session::get('black')}});
  
  });

    </script>
    
   
	
    <script>
        function changeDarkWitheMode() {


$("#myFormlangBlack").submit();

};



function deleteTask(idtask){

var _token = $('input[name="_token"]').val();

$.ajax({
url:"{{ url('restaurant/deleteTodo') }}",
method:"POST",
data:{id:idtask , _token:_token},
success:function(data)
{

console.log("innovartech protects you!!");
}
});

}

function archiveNewTask(idul){

$("#"+idul+" :input:checkbox").not("#"+idul+" :button").each(function(){
   
   if ($(this).is(":checked")) {
     $(this).val('true');
   }else {
     $(this).val('false');
   }
});   

var formElements = new Array();
$("#"+idul+" :input").not("#"+idul+" :button").each(function(){
    formElements.push($(this).val());
});
console.log(formElements);
var title = $("#idtitletotask"+idul).html();


var _token = $('input[name="_token"]').val();

    $.ajax({
    url:"{{ url('restaurant/sendNewTodo') }}",
    method:"POST",
    data:{title:title, todo:formElements , _token:_token},
    success:function(data)
    {

      console.log("innovartech protects you!!");
    }
    });





}


function archiveTask(idtask){

$("#idtask"+idtask+" :input:checkbox").not("#idtask"+idtask+" :button").each(function(){
   
    if ($(this).is(":checked")) {
      $(this).val('true');
    }else {
      $(this).val('false');
    }
});   

var formElements = new Array();
$("#idtask"+idtask+" :input").not("#idtask"+idtask+" :button").each(function(){
    formElements.push($(this).val());
});


       
        var _token = $('input[name="_token"]').val();

          $.ajax({
          url:"{{ url('restaurant/sendTodo') }}",
          method:"POST",
          data:{id:idtask, todo:formElements , _token:_token},
          success:function(data)
          {
         
            console.log("innovartech protects you!!");
          }
          });
       
}
    </script>
  
  <!-- Global Required Scripts Start -->
  <script src="{{  asset ('styleRestoIT/assets/js/jquery-3.3.1.min.js') }}"></script>
  <script src="{{  asset ('styleRestoIT/assets/js/popper.min.js') }}"></script>
  <script src="{{  asset ('styleRestoIT/assets/js/bootstrap.min.js') }}"></script>
  <script src="{{  asset ('styleRestoIT/assets/js/perfect-scrollbar.js') }}">
  </script>
  <script src="{{  asset ('styleRestoIT/assets/js/jquery-ui.min.js') }}">
  </script>
  <!-- Global Required Scripts End -->
  <!-- Page Specific Scripts Start -->

  <script src="{{  asset ('styleRestoIT/assets/js/Chart.bundle.min.js') }}">
  </script>
  <script src="{{  asset ('styleRestoIT/assets/js/widgets.js') }}"> </script>
  <script src="{{  asset ('styleRestoIT/assets/js/clients.js') }}"> </script>
  <script src="{{  asset ('styleRestoIT/assets/js/Chart.Financial.js') }}"> </script>
  <script src="{{  asset ('styleRestoIT/assets/js/d3.v3.min.js') }}">
  </script>
  <script src="{{  asset ('styleRestoIT/assets/js/topojson.v1.min.js') }}">
  </script>
  <script src="{{  asset ('styleRestoIT/assets/js/datatables.min.js') }}">
  </script>
  <script src="{{  asset ('styleRestoIT/assets/js/data-tables.js') }}">
  </script>
  <!-- Page Specific Scripts Finish -->
  <!-- Costic core JavaScript -->
  <script src="{{  asset ('styleRestoIT/assets/js/framework.js') }}"></script>
  <!-- Settings -->
  <script src="{{  asset ('styleRestoIT/assets/js/settings.js') }}"></script>

  @yield('script')
</body>


</html>
