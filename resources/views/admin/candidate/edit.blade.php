@extends('admin.layouts.admin_master')

@section('content')
    <!-- left column -->
          <div class="col-md-6 ml-auto mr-auto">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Edit Candidate</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{ route('admin.candidate.edit',$candidate['id']) }}" method="POST" enctype="multipart/form-data">
                {{ method_field('PUT') }}
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    {{-- <input type="hidden" name="id" value="{{$candidate['id']}}" id=""> --}}
                    <label for="exampleInputEmail1">Post Name</label>
                    <select name="postname" class="form-control select2bs4" id="" required>
                      @foreach ($posts as $post)
                          <option value="{{ $post['id'] }}"  {{$candidate->post_id == $post->id ? 'selected':""}}>{{ $post['post_name'] }}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Nepali Name</label>
                    <input type="text" class="form-control" value="{{ $candidate['nepali_name'] }}" name="nepname" id="exampleInputPassword1" placeholder="Enter Nepali Name">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">English Name</label>
                    <input type="text" class="form-control" value="{{ $candidate['english_name'] }}" name="engname" id="exampleInputPassword1" placeholder="Enter English Name">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Photo</label>
                    <input type="file" class="form-control"  name="photo" id="exampleInputPassword1">
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