@extends('admin.layouts.admin_master')

@section('content')
    <!-- left column -->
          <div class="col-md-6 ml-auto mr-auto">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Edit Weather</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{ route('admin.weather.edit') }}" method="POST">
                {{ method_field('PUT') }}
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <input type="hidden" name="id" value="{{$weather['id']}}" id="">
                    <label for="exampleInputEmail1">Code</label>
                    <input type="text" class="form-control" name="code" value="{{$weather['code']}}" id="exampleInputEmail1" placeholder="Enter Code">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">English Name</label>
                    <input type="text" class="form-control" name="english_name" value="{{$weather['english_name']}}" id="exampleInputPassword1" placeholder="Enter English Name">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Japanese Name</label>
                    <input type="text" class="form-control" name="japanese_name" value="{{$weather['japanese_name']}}" id="exampleInputEmail1" placeholder="Enter Japanese Name">
                  </div>
                <!-- /.card-body -->

                <div class="card-footer mr-auto ml-auto">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
          </div>
          <!--/.col (left) -->
@endsection