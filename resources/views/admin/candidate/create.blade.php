@extends('admin.layouts.admin_master')

@section('content')
    <!-- left column -->
          <div class="col-md-6 ml-auto mr-auto">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Add New Candidate</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{ route('admin.candidate.create') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Post Name</label>
                    <select name="postname" class="form-control select2bs4" id="" required>
                      <option value="">Select Post Name</option>
                      @foreach ($posts as $post)
                          <option value="{{ $post['id'] }}">{{ $post['post_name'] }}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Nepali Name</label>
                    <input type="text" class="form-control" name="nepname" id="exampleInputPassword1" placeholder="Enter Nepali Name">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">English Name</label>
                    <input type="text" class="form-control" name="engname" id="exampleInputPassword1" placeholder="Enter English Name">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Photo</label>
                    <input type="file" class="form-control" name="photo" id="exampleInputPassword1">
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