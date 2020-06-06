

@extends('employee.base')



@section('content')

{{App::setLocale(Session::get('locale'))}}





<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

<script>
    $(document).ready(function() { 	
    $('a').removeClass( "active" ) ;
    
    $(".clikihafhome").each(function(){
        $(this).click();
    });
    
    });
    
      </script>
@endsection