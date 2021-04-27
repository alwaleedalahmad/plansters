@extends('layout.master')
@section('titel','insert Image')

@section('container')

  @if(session('success'))
        <div class="alert alert-success">
          {{ session('success') }}
        </div>
        @endif
        @if (count($errors) > 0)
      <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
          @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
      @endif
    {{-- <h3 class="jumbotron" > --}}

        <div class="jumbotron">
            <div class="container-fluid">
              <h1 class="display-3" style="word-wrap: wrap none;">Add image to DB</h1>
            </div>
          </div>
    {{-- </h3> --}}
    <div style="position:relative;margin:0 auto;top:0px;width:900px;height:auto;overflow:hidden;">
  <form method="post" action="{{url('create')}}" enctype="multipart/form-data">
        @csrf
        <div class="row">
          {{-- <div class="col-md-4">
              <label for="title" >Image Title</label>
              <input  id="title" type="text" name="title" class="form-control">
          </div> --}}
          <div class="form-group col-md-4">
            <label for="filename">choos Image</label>
          <input id="filename" type="file"  name="filename" class="form-control">
          </div>
        </div>
        <div class="row">
          {{-- <div class="col-md-4"></div> --}}
          <div class="form-group col-md-4">
          <button type="submit" class="btn btn-success" style="margin-top:10px">Upload Image</button>
          </div>
        </div>
        @if($image)
   	    <div class="row">
         {{-- <div class="col-md-8">
              <strong>Original Image:</strong>
              <br/>
              <img src="/images/{{$image->filename}}" />
        </div> --}}
        <div class="col-md-8">
            <strong>Thumbnail Image:</strong>
            <br/>
            <img src="/thumbnail/{{$image->filename}}"  />
       	 </div>
   		</div>
           <script type="text/javascript">
            var loadFile = function(event) {
                var extension = $('#fimag').val().split('.').pop().toLowerCase();
                if(jQuery.inArray(extension, ['gif','png','jpg','jpeg']) == -1)
                {
                    alert('Invalid Image File');
                    $('#fimag').val('');
                    return false;
                }
                var image = document.getElementById('pc');
                image.src = URL.createObjectURL(event.target.files[0]);
            }
            // document.getElementById("fimag").required = true;
        </script>
        @endif
  </form>
</div>


  @endsection
