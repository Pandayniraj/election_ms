@extends('admin.layouts.admin_master')

@section('content')
    <div class="col-12 mt-3 abs">    
        <div class="card" id="id02">
            <div class="card-header d-flex justify-content-between">
                <div class="left flex-grow-1">
                    <h3 class="card-title">Vessel List</h3>
                </div>

                @if (session('shipname'))
                <div class="middle flex-grow-1">
                    <div class="alert alert-success mb-0 text-white" style="width: 50%" role="alert">
                        <h3>{{session('shipname')}} has been added.</h3>
                    </div>
                </div>
                @endif

                @if (session('edited'))
                <div class="middle flex-grow-1">
                    <div class="alert alert-success mb-0 text-white" style="width: 50%" role="alert">
                        <h3>Updated Successfully.</h3>
                    </div>
                </div>
                @endif

                <div class="right">
                   <button class="btn btn-warning" onclick="window.location.href = '{{ route('admin.vessel.createview') }}';"><i class="fas fa-plus-square fa-2x mr-2"></i><span style="vertical-align: super;">Add New Vessel</span></a> </button>
                </div>
            
            
            </div>
            
            <!-- /.card-header -->
            <div class="card-body">
            <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                    <th>S.No.</th>
                    <th>Callsign</th>
                    <th>Vessel Name</th>
                    <th>Ship Company Name</th>
                    <th>Number Of Hatches</th>
                    <th>Remarks</th>
                    <th>Created At</th>
                    <th>Updated At</th>
                    <th>Operations</th>
                </tr>
                </thead>
                <tbody>

                @foreach($ships as $key=>$ship)
                    <tr>
                        <td>{{ $key+1 }}</td>
                        <td>{{ $ship['callsing'] }}</td>
                        <td>{{ $ship['ship_name'] }}</td>
                        <td>{{ $ship->shipcompanies->ship_company_name }}</td>
                        {{-- <td>{{ $ship['shipcompanies']['ship_company_name'] }}</td> --}}
                        <td>{{ $ship['number_of_hatches'] }}</td>
                        <td>{{ $ship['remarks'] }}</td>
                        <td>{{ $ship['created_at'] }}</td>
                        <td>{{ $ship['updated_at'] }}</td>
                        <td style="width:15%">
                            <span><a href="{{ url('vessel/edit/'.$ship['id'])}}"><button><i class="fas fa-edit m-3 fa-1x" ></i></button></a></span>
                            <span><a href="{{ route('admin.vessel.delete',$ship['id'])}}" id="delete"><i class="fas fa-trash-alt text-danger fa-1x"></i></a></span>
                        </td>
                    </tr>

                 @endforeach
    
                </tbody>
            </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
        
    </div>
@endsection