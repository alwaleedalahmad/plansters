<?php use App\ImageModel;?>
@extends('layout.master')
@section('title' ,'Edite image')

@section('container')
{{-- <div style="position:relative;margin:0 auto;top:0px;width:900px;height:auto;overflow:hidden;"> --}}
<table class="table table-hover" style="margin-top: 90px;">
    <thead>
        <tr>
            <th colspan="4">
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
            </th>
      </tr>
     </thead>
    <tbody>

          <?php
            $images=ImageModel::all();
            foreach ($images as $key ) {
                # code...
                ?>
                <tr class="row">
                  <td  class="col-l-12"><img style="width: 200px; hieght:100px;" src="/thumbnail/<?php echo $key->filename; ?>"  />
                    <form   method="post" action="update/<?php echo $key->filename; ?>" enctype="multipart/form-data">
                        @csrf


                          <input  type="file" style="width: 200px;" name="filename" class="form-control">

                        </div>
                        <div >

                          <button style="width: 200px;" type="submit" class="btn btn-success" style="margin-top:5px">update Image</button>
                          </div>


                  </form>

                </td>
                  <td class="col-l-12">Title :<?php echo $key->filename; ?></td>
                  <td class="col-l-12">Path: images/<?php echo $key->filename; ?></td>
                  <td class="col-l-12">
                      <a href="/delete/<?php echo $key->filename; ?>">delete</a>
                  </td>
                </tr>
                <?php
            }
            ?>



    </tbody>
  </table>
  {{-- <div> --}}
@endsection
