@extends('admin.layouts.admin_master')

@section('content')
        <div class="card card-default">
          <div class="card-header bg-primary"">
            <h3 class="card-title">Add Ship Schedule</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <form action="{{ route('admin.schedule.create') }}" method="POST">
            <div class="row">
                @csrf
              <div class="col-md-6">
                <div class="form-group">
                    <label for="callsing">Call Sign</label>
                    <select class="form-control select2bs4" id="callsing" name="callsing" style="width: 100%;" required>
                        <option value="">Choose Shipping Company</option>

                        @foreach ($ships as $ship)                           
                            <option value="{{ $ship['id'] }}">{{ $ship['callsing'] }}</option>
                        @endforeach
                  </select>
                </div>
                <!-- /.form-group -->
                <div class="form-group">
                    <label for="nextterm">Next Term</label>
                    <input type="date" id="nextterm" class="form-control" required name="nextterm" id="exampleInputEmail1" placeholder="Enter Next Term">
                </div>
                <!-- /.form-group -->
                <div class="form-group">
                    <label for="comp">Operating Ship Company</label>
                    <select id="comp" class="form-control select2bs4" name="operating_ship_company" style="width: 100%;" required>
                        <option value="">Choose Shipping Company</option>

                        @foreach ($shipcompanies as $shipcompany)                           
                            <option value="{{ $shipcompany['id'] }}">{{ $shipcompany['ship_company_name'] }}</option>
                        @endforeach

                  </select>
                </div>
                <!-- /.form-group -->
                <div class="form-group ">
                    <label for="import">Import Voy</label>
                    <input id="import" type="text" class="form-control" required name="import" id="exampleInputEmail1" placeholder="Enter Import Voy">
                </div>
                <!-- /.form-group -->
                <div class="form-group">
                    <label for="export">Export Voy</label>
                    <input id="export" type="text" class="form-control" required name="export" id="exampleInputEmail1" placeholder="Enter Export Voy">
                </div>
                <!-- /.form-group -->
                <div class="form-group">
                    <label for="port">Port Of Entering</label>
                    <input id="port" type="text" class="form-control" required name="port" id="exampleInputEmail1" placeholder="Enter Port Of Entering">
                </div>
                <!-- /.form-group -->
                <div class="form-group">
                    <label for="pile">Pile</label>
                    <input id="pile" type="text" class="form-control" required name="pile" id="exampleInputEmail1" placeholder="Enter Pile">
                </div>
                <!-- /.form-group -->
                <div class="form-group">
                    <label for="landing">Landing</label>
                    <input id="landing" type="text" class="form-control" required name="landing" id="exampleInputEmail1" placeholder="Enter Landing">
                </div>
                <!-- /.form-group -->
              </div>
              <!-- /.col -->
              <div class="col-md-6">
                <div class="form-group">
                    <label for="cut">Cut Date</label>
                    <input id="cut" type="datetime-local" class="form-control" required name="cut_date" id="exampleInputEmail1" placeholder="Enter Cut Date">
                </div>
                <!-- /.form-group -->
                <div class="form-group">
                    <label for="eta">E.T.A</label>
                    <input id="eta" type="datetime-local" class="form-control" required name="eta" id="exampleInputEmail1" placeholder="Enter E.T.A">
                </div>
                <!-- /.form-group -->
                <div class="form-group">
                    <label for="etb">E.T.B</label>
                    <input id="etb" type="datetime-local" class="form-control" required name="etb" id="exampleInputEmail1" placeholder="Enter E.T.B">
                </div>
                <!-- /.form-group -->
                <div class="form-group">
                    <label for="etd">E.T.D</label>
                    <input id="etd" type="datetime-local" class="form-control" required name="etd" id="exampleInputEmail1" placeholder="Enter E.T.D">
                </div>
                <!-- /.form-group -->
                <div class="form-group">
                    <label for="atd1">A.T.D</label>
                    <input id="atd1" type="datetime-local" class="form-control" required name="atd1" id="exampleInputEmail1" placeholder="Enter A.T.D.">
                </div>
                <!-- /.form-group -->
                <div class="form-group">
                    <label for="atd2">A.T.D</label>
                    <input id="atd2" type="datetime-local" class="form-control" required name="atd2" id="exampleInputEmail1" placeholder="Enter A.T.D.">
                </div>
                    <!-- /.form-group -->
                <div class="form-group">
                    <label for="atd3">A.T.D</label>
                    <input id="atd3" type="datetime-local" class="form-control" required name="atd3" id="exampleInputEmail1" placeholder="Enter A.T.D.">
                </div>
                <!-- /.form-group -->
                <div class="form-group">
                    <label for="remarks">Remarks</label>
                    <input id="remarks" type="text" class="form-control" required name="remarks" id="exampleInputEmail1" placeholder="Enter Remarks">
                </div>
                <!-- /.form-group -->
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.card -->
        <div class="mb-4 mx-auto">
            <button type="submit" class="btn btn-primary px-5">Submit</button>
        </div>
    </form>
    </div>
          <!--/.col (left) -->
@endsection