@extends('admin.layouts.admin_master')

@section('content')
    <div class="col-12 mt-3 abs">   
        <div class="card" id="id02">
            @if (session('name'))
                <div class="middle ">
                    <div class="alert alert-success mb-0 text-white" style="width: 50%" role="alert">
                        <h3>{{session('name')}} has been added.</h3>
                    </div>
                </div>
            @endif
            @if (session('postdelete'))
                <div class="middle">
                    <div class="alert alert-danger mb-0 text-white" style="width: 50%" role="alert">
                        <h3>{{session('postdelete')}}</h3>
                    </div>
                </div>
            @endif 
            @if (session('deletesuccess'))
            <div class="middle">
                <div class="alert alert-success mb-0 text-white" style="width: 50%" role="alert">
                    <h3>{{session('deletesuccess')}}</h3>
                </div>
            </div>
        @endif 
          
            @if (session('edited'))
                <div class="middle">
                    <div class="alert alert-success mb-0 text-white" style="width: 50%" role="alert">
                        <h3>Updated Successfully.</h3>
                    </div>
                </div>
            @endif 

            <div class="card-header d-flex justify-content-between">
                <div class="left flex-grow-1">
                    <h3 class="card-title">Post List</h3>
                </div>

                <div class="right d-flex justify-content-between">
                   <button class="btn btn-warning mr-2" onclick="window.location.href = '{{ route('admin.post.createview') }}';"><i class="fas fa-plus-square fa-2x mr-2"></i><span style="vertical-align: super;">Add New Post</span></a> </button>
                
                   <form action="{{ route('admin.post.getPost') }}" method="POST">
                        @csrf
                        <button id="export" class="btn btn-info"  style="padding: 11px;" type="submit">Get Post</button>
                    </form>    
                    @if($status==True)
                        <span data-href="exportpostdata " id="export" class="btn btn-success mx-2" onclick="exportTasks(event.target);" style="padding: 11px;">Export Data</span>
                    @endif
                    </div>
            </div>

              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>S.N.</th>
                    <th>Post Id</th>
                    <th>Post Name(Nepali)</th>
                    <th>Post Name</th>
                    <th>Max Count</th>
                    <th>Operations</th>
                </tr>
                  </thead>
                  <tbody>
                        @foreach($posts as $key=>$post)
                    <tr>
                        <td>{{$posts->firstItem() + $key }}</td>
                        <td>{{ $post['position_id'] }}</td>
                        <td>{{ $post['nepali_post_name'] }}</td>
                        <td>{{ $post['post_name'] }}</td>
                        <td>{{ $post['max_count'] }}</td>
                        <td style="width:15%">
                            <span><a href="{{ url('post/edit/'.$post['id'])}}"><button><i class="fas fa-edit m-3 fa-1x" ></i></button></a></span>
                            <span><a href="{{ route('admin.post.delete',$post['id'])}}" id="delete"><i class="fas fa-trash-alt text-danger fa-1x"></i></a></span>
                            
                        </td>
                       
                    </tr>

                 @endforeach
               
                  </tbody>
                </table>
                {{ $posts->links() }}
              </div>
              
              <!-- /.card-body -->

        </div>
        <!-- /.card -->
        
    </div>
@endsection