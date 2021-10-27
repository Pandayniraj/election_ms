@extends('admin.layouts.admin_master')

@section('content')
    <div class="card card-default">
          <div class="card-header bg-primary"">
            <h3 class="card-title">Ship Schedule Details</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
              {{-- action="{{ route('admin.schedule.create') }}" method="POST" --}}
            <form >
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                    <label for="callsing">Call Sign</label>
                    <input type="text" value="{{ $shipid }}" id="nextterm" class="form-control" required name="nextterm" id="exampleInputEmail1" placeholder="Enter Next Term" disabled>

                </div>
                <!-- /.form-group -->
                <div class="form-group">
                    <label for="nextterm">Next Term</label>
                    <input type="date" value="{{ $schedule['next_term'] }}" id="nextterm" class="form-control" required name="nextterm" id="exampleInputEmail1" placeholder="Enter Next Term" disabled>
                </div>
                <!-- /.form-group -->
                <div class="form-group">
                    <label for="comp">Operating Ship Company</label>
                    <input type="text" value="{{ $companyid }}" id="nextterm" class="form-control" required name="nextterm" id="exampleInputEmail1" placeholder="Enter Next Term" disabled>

                </div>
                <!-- /.form-group -->
                <div class="form-group ">
                    <label for="import">Import Voy</label>
                    <input id="import" value="{{ $schedule['import_voy'] }}" type="text" class="form-control" required name="import" id="exampleInputEmail1" placeholder="Enter Import Voy" disabled>
                </div>
                <!-- /.form-group -->
                <div class="form-group">
                    <label for="export">Export Voy</label>
                    <input id="export" value="{{ $schedule['export_voy'] }}" type="text" class="form-control" required name="export" id="exampleInputEmail1" placeholder="Enter Export Voy" disabled>
                </div>
                <!-- /.form-group -->
                <div class="form-group">
                    <label for="port">Port Of Entering</label>
                    <input id="port" value="{{ $schedule['port_of_entering'] }}" type="text" class="form-control" required name="port" id="exampleInputEmail1" placeholder="Enter Port Of Entering" disabled>
                </div>
                <!-- /.form-group -->
                <div class="form-group">
                    <label for="pile">Pile</label>
                    <input id="pile" value="{{ $schedule['a_pile'] }}" type="text" class="form-control" required name="pile" id="exampleInputEmail1" placeholder="Enter Pile" disabled>
                </div>
                <!-- /.form-group -->
                <div class="form-group">
                    <label for="landing">Landing</label>
                    <input id="landing" value="{{ $schedule['a_landing'] }}" type="text" class="form-control" required name="landing" id="exampleInputEmail1" placeholder="Enter Landing" disabled>
                </div>
                <!-- /.form-group -->
              </div>
              <!-- /.col -->
              <div class="col-md-6">
                <div class="form-group">
                    <label for="cut">Cut Date</label>
                    <input id="cut" value="{{ $schedule['cut_date'] }}" type="datetime-local" class="form-control" required name="cut_date" id="exampleInputEmail1" placeholder="Enter Cut Date" disabled>
                </div>
                <!-- /.form-group -->
                <div class="form-group">
                    <label for="eta">E.T.A</label>
                    <input id="eta" value="{{ $schedule['ETA'] }}" type="datetime-local" class="form-control" required name="eta" id="exampleInputEmail1" placeholder="Enter E.T.A" disabled>
                </div>
                <!-- /.form-group -->
                <div class="form-group">
                    <label for="etb">E.T.B</label>
                    <input id="etb" value="{{ $schedule['ETB'] }}" type="datetime-local" class="form-control" required name="etb" id="exampleInputEmail1" placeholder="Enter E.T.B" disabled>
                </div>
                <!-- /.form-group -->
                <div class="form-group">
                    <label for="etd">E.T.D</label>
                    <input id="etd" value="{{ $schedule['ETD'] }}" type="datetime-local" class="form-control" required name="etd" id="exampleInputEmail1" placeholder="Enter E.T.D" disabled>
                </div>
                <!-- /.form-group -->
                <div class="form-group">
                    <label for="atd1">A.T.D</label>
                    <input id="atd1" value="{{ $schedule['ATD1'] }}" type="datetime-local" class="form-control" required name="atd1" id="exampleInputEmail1" placeholder="Enter A.T.D." disabled>
                </div>
                <!-- /.form-group -->
                <div class="form-group">
                    <label for="atd2">A.T.D</label>
                    <input id="atd2" value="{{ $schedule['ATD2'] }}" type="datetime-local" class="form-control" required name="atd2" id="exampleInputEmail1" placeholder="Enter A.T.D." disabled>
                </div>
                    <!-- /.form-group -->
                <div class="form-group">
                    <label for="atd3">A.T.D</label>
                    <input id="atd3" value="{{ $schedule['ATD3'] }}" type="datetime-local" class="form-control" required name="atd3" id="exampleInputEmail1" placeholder="Enter A.T.D." disabled>
                </div>
                <!-- /.form-group -->
                <div class="form-group">
                    <label for="remarks">Remarks</label>
                    <input id="remarks" value="{{ $schedule['remarks'] }}" type="text" class="form-control" required name="remarks" id="exampleInputEmail1" placeholder="Enter Remarks" disabled>
                </div>
                <!-- /.form-group -->
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.card -->
@endsection