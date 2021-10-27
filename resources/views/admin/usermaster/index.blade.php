@extends('admin.layouts.admin_master')

@section('content')
    <div class="col-12 mt-3 abs">    
        <div class="card" id="id02">
            <div class="card-header d-flex justify-content-between">
                <div class="left flex-grow-1">
                    <h3 class="card-title">User List</h3>
                </div>

                @if (session('name'))
                <div class="middle flex-grow-1">
                    <div class="alert alert-success mb-0 text-white" style="width: 50%" role="alert">
                        <h3>{{session('name')}} has been added.</h3>
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
                   <button class="btn btn-warning" id="swalDefaultSuccess" onclick="window.location.href = '{{ route('admin.user.createview') }}';"><i class="fas fa-plus-square fa-2x mr-2"></i><span style="vertical-align: super;" >Add New User</span></a> </button>
                </div>
            
            
            </div>
            
            <!-- /.card-header -->
            <div class="card-body">
            <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                    <th>S.No.</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Identity</th>
                    <th>Registration Date</th>
                    {{-- <th>Cancellation Date</th> --}}
                    <th>Operations</th>
                </tr>
                </thead>
                <tbody>

                @foreach($users as $key=>$user)
                    <tr>
                        <td>{{ $key+1 }}</td>
                        <td>{{ $user['name'] }}</td>
                        <td>{{ $user['email'] }}</td>
                        <td>{{ $user['identity'] }}</td>
                        <td>{{ $user['created_at'] }}</td>
                        {{-- <td>{{ $user['updated_at'] }}</td> --}}
                        <td style="width:15%">
                            <span><a href="{{ url('user/edit/'.$user['id'])}}"><button><i class="fas fa-edit m-3 fa-1x" ></i></button></a></span>
                            <span><a href="{{ route('admin.user.delete',$user['id'])}}" id="delete"><i class="fas fa-trash-alt text-danger fa-1x"></i></a></span>
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