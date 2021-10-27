@extends('admin.layouts.admin_master')

@section('content')
    <!-- left column -->
          <div class="col-md-6 ml-auto mr-auto">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Edit Vessel</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{ route('admin.user.edit') }}" method="POST">
                {{ method_field('PUT') }}
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <input type="hidden" name="id" value="{{$user['id']}}" id="">
                    <label for="exampleInputEmail1">Name</label>
                    <input type="text" class="form-control" name="name" value="{{$user['name']}}" id="exampleInputEmail1" placeholder="Enter Name">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Identity</label>
                    <input type="text" class="form-control" name="identity" value="{{$user['identity']}}" id="exampleInputPassword1" placeholder="Enter Identity">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Email</label>
                    <input type="email" class="form-control" name="email" value="{{$user['email']}}" id="exampleInputEmail1" placeholder="Enter Email">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Password</label>
                    <input type="password" class="form-control" name="password"  id="exampleInputEmail1" placeholder="Enter Password">
                  
                      @error('password')
                            <div class="text-danger">{{ $message }}</div>
                      @enderror
                      
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Confirm Password</label>
                    <input type="password" class="form-control" name="cpassword"  id="exampleInputEmail1" placeholder="Confirm Password">
                  
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