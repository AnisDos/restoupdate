<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from slidesigma.com/themes/html/costic/pages/prebuilt-pages/coming-soon.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 10 Apr 2020 18:51:11 GMT -->
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
    

  <!-- Main Content -->
  <main class="body-content ms-coming-soon">



    
    <!-- Body Content Wrapper -->
    <div class="ms-content-wrapper">




        
    <h1>Welcome {{ Auth::user()->name }}</h1>
      <p class="ms-duration">Thank you for your trust in our services</p>
  
      <div class="input-group">
          @if(Auth::user()->is_admin)
      <h3> you can now check your Admin Panel<a href=" {{ url('admin') }} " ><h3 style="color:red" >here</h3></a>  </h3>
      
      @else 
      
      <h3> you can now check your Restaurant Panel<a href=" {{ url('restaurant') }} " ><h3 style="color:red" >here</h3></a> </h3>
      @endif
      </div>
      <ul class="ms-list-flex ms-social-container">
        <li> <a target="_blank" class="ms-social ms-fb" href="https://www.facebook.com/"><i class="fab fa-facebook-f"></i></a> 
        </li>
        <li> <a target="_blank" class="ms-social ms-pnt" href="#"><i class="fab fa-pinterest-p"></i></a> 
        </li>
        <li> <a target="_blank" class="ms-social ms-tw" href="#"><i class="fab fa-twitter"></i></a> 
        </li>
        <li> <a target="_blank" class="ms-social ms-wa" href="#"><i class="fab fa-whatsapp"></i></a> 
        </li>
        <li> <a target="_blank" class="ms-social ms-skype" href="#"><i class="fab fa-skype"></i></a> 
        </li>
        <li> <a target="_blank" class="ms-social ms-g-plus" href="#"><i class="fab fa-google-plus-g"></i></a> 
        </li>
        <li>    <a class="media fs-14 p-2" href="{{ route('logout') }}" onclick="event.preventDefault();
          document.getElementById('logout-form').submit();"> <span><i class="flaticon-shut-down mr-2"></i> Logout</span>
            
 <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
          </a></li>
      </ul>
    </div>
  </main>
  <!-- SCRIPTS -->
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
  <script src="{{  asset ('styleRestoIT/assets/js/jquery.countdown.min.js') }}">
  </script>
  <script src="{{  asset ('styleRestoIT/assets/js/coming-soon.js') }}"></script>
  <!-- Page Specific Scripts End -->
  <!-- Costic core JavaScript -->
  <script src="{{  asset ('styleRestoIT/assets/js/framework.js') }}"></script>
  <!-- Settings -->
  <script src="{{  asset ('styleRestoIT/assets/js/settings.js') }}"></script>
</body>

</html>