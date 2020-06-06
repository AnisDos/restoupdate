<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from slidesigma.com/themes/html/costic/pages/prebuilt-pages/lock-screen.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 10 Apr 2020 18:51:11 GMT -->
<head>

  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Costic Dashboard</title>
  <!-- Iconic Fonts -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" href="{{  asset ('styleRestoIT/vendors/iconic-fonts/flat-icons/flaticon.css') }}">
    <link href="{{  asset ('styleRestoIT/vendors/iconic-fonts/font-awesome/css/all.min.css') }}" rel="stylesheet">
  <!-- Bootstrap core CSS -->
  <link href="{{  asset ('styleRestoIT/assets/css/bootstrap.min.css') }}" rel="stylesheet">
  <!-- jQuery UI -->
  <link href="{{  asset ('styleRestoIT/assets/css/jquery-ui.min.css') }}" rel="stylesheet">
  <!-- Costic styles -->
  <link href="{{  asset ('styleRestoIT/assets/css/style.css') }}" rel="stylesheet">
  <!-- Favicon -->
  <link rel="icon" type="image/png" sizes="32x32" href="{{  asset ('styleRestoIT/favicon.ico') }}">

</head>

<body class="ms-body ms-primary-theme">

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

  <div class="ms-lock-screen-weather">
    <p>38&deg;</p>
    <p>San Francisco, CA</p>
  </div>

  <ul class="ms-lock-screen-nav">
  
    <li class="dropdown-menu-footer">
      <a style=" font-size: 19px;" class="media fs-14 p-2" href="{{ route('logout') }}" onclick="event.preventDefault();
      document.getElementById('logout-form').submit();"> <span><i class="flaticon-shut-down mr-2"></i> Logout</span>
        
<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
      </a>
    </li>
  </ul>

  <!-- Main Content -->
  <main class="body-content ms-lock-screen">

    <!-- Body Content Wrapper -->
    <div class="ms-content-wrapper">
      <script type="text/javascript" > 
        setTimeout(function() {
     $('#successalert').fadeOut('fast');
   }, 8000); // <-- time in milliseconds
   </script>
  
 
      
      @if (session('success'))
      <div class="x_content bs-example-popovers" id="successalert" >
        <div class="alert alert-success" role="alert" >
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
            </button>
            <strong>well done!</strong> {{ session('success') }}
          </div>
        </div>

      
        @endif

      <img class="ms-user-img ms-img-round ms-lock-screen-user" src="/storage/{{Auth::user()->admin->image}}" alt="people">
      <h1>{{Auth::user()->admin->name}}</h1>
    <form method="post" action="{{ url('admin/chekKeyForm') }}" >
      @csrf
        <div class="ms-form-group my-0 mb-0 has-icon fs-14">
          <input type="password" id="inputyadika" class="ms-form-input @error('pinKey') is-invalid @enderror" name="pinKey" placeholder="Enter Pin">
        
          <i class="material-icons" onclick="myFunction()" >security</i>
  
        </div>
         @error('pinKey')
          <span >
              <strong  style="color:blue" >{{ $message }}</strong>
          </span>
          @enderror
        {{-- <a id="balakfasini" href="#" class="btn bg-black w-100">Unlock</a> --}}
        <button type="submit" class="btn bg-black w-100" {{-- style="color:white;"  --}}>Unlock</button>
      </form>

    </div>

  </main>

  <div class="ms-lock-screen-time">
    <p>04:25</p>
    <p>Friday, January 9</p>
  </div>

  <script>



    function myFunction() {
  var x = document.getElementById("inputyadika");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
  </script>
  <!-- SCRIPTS -->
  <!-- Global Required Scripts Start -->
  <script src="{{  asset ('styleRestoIT/assets/js/jquery-3.3.1.min.js') }}"></script>
  <script src="{{  asset ('styleRestoIT/assets/js/popper.min.js') }}"></script>
  <script src="{{  asset ('styleRestoIT/assets/js/bootstrap.min.js') }}"></script>
  <script src="{{  asset ('styleRestoIT/assets/js/perfect-scrollbar.js') }}"> </script>
  <script src="{{  asset ('styleRestoIT/assets/js/jquery-ui.min.js') }}"> </script>
  <!-- Global Required Scripts End -->

  <!-- Costic core JavaScript -->
  <script src="{{  asset ('styleRestoIT/assets/js/framework.js') }}"></script>

  <!-- Settings -->
  <script src="{{  asset ('styleRestoIT/assets/js/settings.js') }}"></script>

</body>


<!-- Mirrored from slidesigma.com/themes/html/costic/pages/prebuilt-pages/lock-screen.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 10 Apr 2020 18:51:11 GMT -->
</html>
