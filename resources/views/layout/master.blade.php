<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>@yield('title')</title>
    <!-- Latest compiled and minified CSS -->
    @section('links')
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/5ec2ade711.js" crossorigin="anonymous"></script>


    @show


</head>
@section('body')
<body style=" background-color:#fff;font-family:arial,helvetica,sans-serif,verdana,'Open Sans'">
@show

@section('nav')


    <nav class="navbar navbar-expand-md navbar-light bg-light fixed-top" >
        <!-- Brand -->
        <a class="navbar-brand" href="#"><img src="img/plansters.png" style="height: 40px;width:200px;"></a>

        <!-- Toggler/collapsibe Button -->
        <button class="navbar-toggler bg-success" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Navbar links -->
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" href="/view">view images</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/create">add image</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/edit">edite & delete imag</a>
            </li>
            {{-- <li class="nav-item"><a class="nav-link" style="position: absolute; right:10px;" href="/login"><i class="fa fa-lock"></i> Login   </a>
            </li> --}}

            <li class="nav-item">
                {{-- <a  href="login">

                </a> --}}
                <a  class="nav-link" style="position: absolute; right:30px;" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        <i class="fa fa-unlock"></i> logout
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
            </li>
          </ul>
        </div>
      </nav>
      @show
      <div style="padding: 10px;">
@yield('container')
    </div>
</body>
</html>
