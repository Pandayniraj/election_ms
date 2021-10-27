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
              <form action="{{ route('admin.shipcompany.edit') }}" method="POST">
                {{ method_field('PUT') }}
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <input type="hidden" name="id" value="{{$shipcompany['id']}}" id="">
                    <label for="exampleInputEmail1">Code</label>
                    <input type="text" class="form-control" name="code" value="{{$shipcompany['code']}}" id="exampleInputEmail1" placeholder="Enter code">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Ship Company Name</label>
                    <input type="text" class="form-control" name="ship_company_name" value="{{$shipcompany['ship_company_name']}}" id="exampleInputPassword1" placeholder="Enter Ship Name">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Remarks</label>
                    <input type="text" class="form-control" name="remarks" value="{{$shipcompany['remarks']}}" id="exampleInputEmail1" placeholder="Enter Remarks">
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