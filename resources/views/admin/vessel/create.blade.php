@extends('admin.layouts.admin_master')

@section('content')
    <!-- left column -->
          <div class="col-md-6 ml-auto mr-auto">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Add New Vessel</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{ route('admin.vessel.create') }}" method="POST">
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Callsing</label>
                    <input type="text" class="form-control" name="callsing" id="exampleInputEmail1" placeholder="Enter email">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Ship Name</label>
                    <input type="text" class="form-control" name="shipname" id="exampleInputPassword1" placeholder="Enter Ship Name">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Number of Hatches</label>
                    <input type="number" class="form-control" name="hatchesnumber" id="exampleInputEmail1" placeholder="Enter Number of Hatches">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Remarks</label>
                    <input type="text" class="form-control" name="remarks" id="exampleInputEmail1" placeholder="Enter Remarks">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Shipping Company</label><br>
                    <select name="shipping_company_id" id="" class="w-100 form-control select2bs4" required>

                      <option value="">Choose Shipping Company</option>

                      @foreach ($shipcompanies as $shipcompany)
                          
                      <option value="{{ $shipcompany['id'] }}">{{ $shipcompany['ship_company_name'] }}</option>
                      @endforeach

                    </select>
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