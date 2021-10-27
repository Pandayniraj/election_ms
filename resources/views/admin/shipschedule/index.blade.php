@extends('admin.layouts.admin_master')

@section('content')
    <!-- Button trigger modal -->
            <div class="card">
              <div class="card-header d-flex justify-content-between">
                <div class="left flex-grow-1">
                    <h3 class="card-title">Ship Schedule</h3>
                </div>

                @if (Session::has('companyid'))
                <div class="middle flex-grow-1"  id="alert">
                  <div x-data="{show: true}" x-init="setTimeout(() => show = false, 3000)" x-show="show">
                      <div class="alert alert-success mb-0 text-white" style="width: 50%" role="alert">
                          <h3>New schedule has been added.</h3>
                      </div>
                  </div>
                </div>
                @endif

                @if (session('edited'))
                <div class="middle flex-grow-1">
                  <div x-data="{show: true}" x-init="setTimeout(() => show = false, 3000)" x-show="show">
                      <div class="alert alert-success mb-0 text-white" style="width: 50%" role="alert" id="flash">
                          <h3>Updated Successfully.</h3>
                      </div>
                  </div>
                </div>
                @endif
                
                <div class="right">
                   <button class="btn btn-warning" id="swalDefaultSuccess" onclick="window.location.href = '{{ route('admin.schedule.createview') }}';"><i class="fas fa-plus-square fa-2x mr-2"></i><span style="vertical-align: super;" >Add New Schedule</span></a> </button>
                </div>
            
            
            </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="table-responsive">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                      <th>S.No</th>
                      <th>CallSign</th>
                      <th>Next Term</th>
                      <th>Operating Ship Company</th>
                      <th>Operations</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach ($schedules as $key=>$schedule)
                        
                      <tr>
                        <td>{{ $key+1 }}</td>
                        <td>{{ $schedule->ships->callsing  }}</td>
                        {{-- <td>as</td> --}}
                        <td>{{ $schedule['next_term']  }}</td>
                        <td> {{ $schedule->shipcompanies->ship_company_name }}</td>
                        {{-- <td>
                          <span><a href="{{ url('schedule/view'.$schedule['id'])}}"><button><i class="fas fa-eye m-3 fa-1x"></i></button></a></span>
                          <span><a href="{{ url('schedule/edit/'.$schedule['id'])}}"><button><i class="fas fa-edit m-3 fa-1x" ></i></button></a></span>
                          <span><a href="{{ route('admin.schedule.delete',$schedule['id'])}}" id="delete"><i class="fas fa-trash-alt text-danger fa-1x"></i></a></span>
                        </td> --}}
                        <td>
                          <span><a href="{{ route('admin.schedule.detailview',$schedule['id']) }}"><button type="button" data-toggle="modal" data-target="#exampleModalCenter"><i class="fas fa-eye m-2 fa-1x"></i></button></a></span>
                          <span><a href="{{ route('admin.schedule.editView',$schedule['id']) }}"><button type="button"><i class="fas fa-edit m-3 fa-1x" ></i></button></a></span>
                          <span><a href="{{ route('admin.schedule.delete',$schedule['id']) }}" id="delete"><button type="button"><i class="fas fa-trash-alt text-danger fa-1x"></i></button></a></span>
                        </td>
                      </tr>

                    @endforeach
                    
                    </tbody>
                  </table>
                </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

</div>


<script>
  $("document").ready(function(){
    setTimeout(function(){
        $("div.alert").remove();
    }, 3000 );
});
</script>

@endsection