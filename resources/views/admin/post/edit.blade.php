@extends('admin.layouts.admin_master')

@section('content')
    <!-- left column -->
          <div class="col-md-6 ml-auto mr-auto">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Edit Post</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{ route('admin.post.edit') }}" method="POST">
                {{ method_field('PUT') }}
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <input type="hidden" name="id" value="{{$post['id']}}" id="">
                    <label for="exampleInputEmail1">Post Name</label>
                    <input type="text" class="form-control" name="name" value="{{$post['post_name']}}" id="exampleInputEmail1" placeholder="Enter Post Name">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Nepali Post Name</label>
                    <input type="text" class="form-control" name="nepname" value="{{$post['nepali_post_name']}}" id="exampleInputEmail1" placeholder="Enter Nepali Post Name">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Max Count</label>
                    <input type="text" class="form-control" name="count" value="{{$post['max_count']}}" id="exampleInputPassword1" placeholder="Enter Max Count">
                  </div>
                  
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