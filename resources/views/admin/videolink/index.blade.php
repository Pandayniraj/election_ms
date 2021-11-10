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
                   <button class="btn btn-warning mr-2" onclick="window.location.href = '{{ route('admin.videolinkcreateview') }}';"><i class="fas fa-plus-square fa-2x mr-2"></i><span style="vertical-align: super;">Add New Post</span></a> </button>
                    </div>
            </div>

              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>S.N.</th>
                    <th>Videolinks</th>
                    <th>Operations</th>
                </tr>
                  </thead>
                  <tbody>
                        {{-- @foreach($vlinks as $vlink) --}}
                        {{-- {{$vlink}} --}}
                        @if($vlinks)
                            <tr>
                        <td>{{ $vlinks['id']??''}}</td>
                        <td>{{ $vlinks['video_link']??''}}</td>
                        <td style="width:15%">
                             <span><a href="{{ route('admin.videoeditView',$vlinks['id']??'')}}"><button><i class="fas fa-edit m-3 fa-1x" ></i></button></a></span>
                             <span><a href="{{ route('admin.Videolinkdelete',$vlinks['id']??'')}}" id="delete"><i class="fas fa-trash-alt text-danger fa-1x"></i></a></span> 
                            
                        </td>
                       
                    </tr>
                        @else
                               <tr>
                       
                        <td></td>
                         <td>No data</td>
                        
                       
                    </tr> 
                        @endif
                    

                 {{-- @endforeach --}}
               
                  </tbody>
                </table>
                
              </div>
              
              <!-- /.card-body -->

        </div>
        <!-- /.card -->
        
    </div>
@endsection