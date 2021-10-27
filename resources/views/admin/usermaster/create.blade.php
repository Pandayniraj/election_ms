@extends('admin.layouts.admin_master')

@section('content')
    <!-- left column -->
          <div class="col-md-6 ml-auto mr-auto">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Add New User</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              
              <form action="{{ route('admin.user.create') }}" method="POST">
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Name</label>
                    <input type="text" class="form-control" required name="name" id="exampleInputEmail1" placeholder="Enter Name">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Identity</label>
                    <input type="text" class="form-control" name="identity" id="exampleInputPassword1" placeholder="Enter Identity">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Email</label>
                    <input type="email" class="form-control" required name="email" id="exampleInputEmail1" placeholder="Enter Email">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Password</label>
                    <input type="password" class="form-control" required name="password" id="exampleInputEmail1" placeholder="Enter Password">
                  
                    @error('password')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror

                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Confirm Password</label>
                    <input type="password" class="form-control" required name="cpassword" id="exampleInputEmail1" placeholder="Confirm Password">
                    
  
                    @error('cpassword')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror

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