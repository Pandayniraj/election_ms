@extends('admin.layouts.admin_master')

@section('content')
    <!-- left column -->
          <div class="col-md-6 ml-auto mr-auto">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Add New Post</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{ route('admin.post.create') }}" method="POST">
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">English Post Name</label>
                    <input type="text" class="form-control" name="name" id="exampleInputEmail1" placeholder="Enter Post Name">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Nepali Post Name</label>
                    <input type="text" class="form-control" name="nepname" id="exampleInputEmail1" placeholder="Enter Nepali Post Name">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Max Count</label>
                    <input type="number" class="form-control" name="count" id="exampleInputPassword1" placeholder="Enter Max Count">
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