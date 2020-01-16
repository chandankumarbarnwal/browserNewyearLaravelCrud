<html>
    <head>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Crud in laravel</title>
    
    <!-- <script src="{{asset('js/app.js')}}"></script> -->
    <!-- <link rel="stylesheet" type="text/css" href="{{asset('css/app.css')}}"> -->
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="{{asset('css/custom.css')}}">

    </head>  

    <body>

        <div class="header">
        	@section('header')
        	<nav class="navbar navbar-expand-md bg-dark navbar-dark">
              <a class="navbar-brand" href="#">Navbar</a>
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                <span class="navbar-toggler-icon"></span>
              </button>

              <div class="collapse navbar-collapse" id="collapsibleNavbar">
                <ul class="navbar-nav">

                  <li class="nav-item">
                    <a class="nav-link" href="list">Users List</a>
                  </li>

                  <li class="nav-item">
                    <a class="nav-link" href="/">Login</a>
                  </li>

                  <li class="nav-item">
                    <a class="nav-link" href="create">Create Account</a>
                  </li>    
                  
                </ul>
              </div>  
            </nav>
        	@show
        </div>

        <div class="content">
        	@section('content')
        	<h1>content part</h1>
        	@show
        </div>

         <div class="footer">
         	@section('footer')
        	<h1>footer part</h1>
        	@show
        </div>


        <script type="text/javascript">
            $(document).ready(function(){
                console.log("oppppppppppp");
            });
        </script>
    </body>
</html>



