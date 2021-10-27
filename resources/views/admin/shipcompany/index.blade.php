@extends('admin.layouts.admin_master')

@section('content')
    <div class="col-12 mt-3 abs">    
        <div class="card" id="id02">
            <div class="card-header d-flex justify-content-between">
                <div class="left flex-grow-1">
                    <h3 class="card-title">Ship List</h3>
                </div>

                @if (session('ship_company_name'))
                <div class="middle flex-grow-1">
                    <div class="alert alert-success mb-0 text-white" style="width: 50%" role="alert">
                        <h3>{{session('ship_company_name')}} has been added.</h3>
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
                   <button class="btn btn-warning" onclick="window.location.href = '{{ route('admin.shipcompany.createview') }}';"><i class="fas fa-plus-square fa-2x mr-2"></i><span style="vertical-align: super;">Add New Ship Company</span></a> </button>
                </div>
            
            
            </div>
            
            <!-- /.card-header -->
            <div class="card-body">
            <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Code</th>
                    <th>Ship Company Name</th>
                    <th>Remarks</th>
                    <th>Created At</th>
                    <th>Updated At</th>
                    <th>Operations</th>
                </tr>
                </thead>
                <tbody>

                @foreach($shipcompanies as $key=>$shipcompany)
                    <tr>
                        <td>{{ $key+1 }}</td>
                        <td>{{ $shipcompany['code'] }}</td>
                        <td>{{ $shipcompany['ship_company_name'] }}</td>
                        <td>{{ $shipcompany['remarks'] }}</td>
                        <td>{{ $shipcompany['created_at'] }}</td>
                        <td>{{ $shipcompany['updated_at'] }}</td>
                        <td style="width:15%">
                            <span><a href="{{ url('shipcompany/edit/'.$shipcompany['id'])}}"><button><i class="fas fa-edit m-3 fa-1x" ></i></button></a></span>
                            <span><a href="{{ route('admin.shipcompany.delete',$shipcompany['id'])}}" id="delete"><i class="fas fa-trash-alt text-danger fa-1x"></i></a></span>
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