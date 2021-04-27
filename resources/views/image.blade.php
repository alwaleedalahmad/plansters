@extends('layout.master')

@section('title' , 'image')

@section('nav')
<nav class="navbar navbar-expand-md navbar-light bg-light fixed-top" >
    <!-- Brand -->
    <a class="navbar-brand" href="#"><img src="../img/plansters.png" style="height: 40px;width:200px;"></a>

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
@endsection

@section('container')
@if($image)
   	    <div class="row">
        <div class="col-md-8">

            <br/><br/><br/>
            <img src="/thumbnail/{{$image->filename}}"  />
       	 </div>
            <div class="col-md-4">

                <br/><br/><br/>
                <strong class="text-success" >titel: {{$image->filename}}<strong><br>
                    <strong class="text-success" >path: image/{{$image->filename}}<strong><br>
                </div>
   		</div>
        @endif
@endsection
