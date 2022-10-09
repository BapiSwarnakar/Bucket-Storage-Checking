@extends('Layout.SuperAdmin.layout')
@section('title','Ball')
@section('content')
    <!-- END: Main Menu-->
    <!-- BEGIN: Content-->
<div class="app-content container center-layout col-md-7 ">
    <div class="content-overlay"></div>
    <div class="content-wrapper col-md-12">
        <div class="content-header row">
        </div>
    <div class="content-body"><!-- Basic form layout section start -->
        <section id="basic-form-layouts">
            <div class="row match-height">
                
                @if($display=="list")
                <div class="col-md-12">
                    <div class="row breadcrumbs-top d-block">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url('Super/Dashboard')}}">Dashboard</a>
                            </li>
                            <li class="breadcrumb-item active">Ball List
                            </li>
                            </ol>
                        </div>
                   </div>
                    <div class="card">
                        <div class="card-header bg-primary">
                            <h4 class="card-title text-white" id="basic-layout-form">Display Ball List</h4>
                            
                        </div>
                        <div class="card-content collapse show">
                            <div class="card-body">
                                <table class="table table-bordered table-sm">
                                    <thead>
                                        <tr>
                                            <th>Sl No</th>
                                            <th>Ball Colour</th>
                                            <th>Ball Size</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data as $item)
                                            <tr>
                                                <td>{{$no++}}</td>
                                                <td>{{$item->BALL_NAME}}</td>
                                                <td>{{$item->BALL_SIZE}} cubic inches</td>
                                                <td>
                                                    <a href="#" class="btn btn-warning btn-sm">Update</a>&nbsp;|&nbsp;<a href="#" class="btn btn-danger btn-sm">Delete</a>
                                                </td>
                                            </tr> 
                                        @endforeach
                                       
                                    </tbody>
                                </table>
                                
                            </div>
                        </div>
                    </div>
                </div>
                @endif
                @if($display=="add")
                <div class="col-md-12">
                    <div class="row breadcrumbs-top d-block">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url('Super/Dashboard')}}">Dashboard</a>
                            </li>
                            <li class="breadcrumb-item active">Save Ball
                            </li>
                            </ol>
                        </div>
                   </div>
                    <div class="card">
                        <div class="card-header bg-primary">
                            <h4 class="card-title text-white" id="basic-layout-form">Add Ball Info</h4>
                            
                        </div>
                        <div class="card-content collapse show">
                            <div class="card-body">
                                
                                <form class="form" method="POST" enctype="multipart/form-data" id="Value_Store_Form">
                                    @csrf
                                    <div class="form-body">
                                        <h4 class="form-section"><i class="ft-user"></i> Ball Info</h4>
                                        <div class="form-row">
                                            
                                            <div class="form-group col-md-6">
                                                <label for="projectinput1">Ball Colour</label>
                                                <input type="text" id="name"  name="name" class="form-control" placeholder="Ball Colour" required>
                                            </div>
                                          
                                            <div class="form-group col-md-6">
                                                <label for="projectinput2">Ball Size</label>
                                                <input type="number" id="size"  name="size" class="form-control" placeholder="Ball Size" required>
                                            </div>
                                    </div>
        
                                    <div class="form-group d-flex justify-content-center">
                                        <input type="hidden" id="url" value="/Super/Ball_Store_Request">
                                        <input type="hidden" id="action" name="action" value="add">
                                        <button type="submit" class="btn btn-primary">
                                            <i class="la la-check-square-o"></i> Save
                                        </button>
                                    </div>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
                @if($display=="edit")
                <div class="col-md-12">
                    <div class="row breadcrumbs-top d-block">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url('Super/Dashboard')}}">Dashboard</a>
                            </li>
                            <li class="breadcrumb-item"><a href="{{url('Super/Dashboard')}}">Ball List</a>
                            </li>
                            <li class="breadcrumb-item active">Update Ball Info
                            </li>
                            </ol>
                        </div>
                   </div>
                    <div class="card">
                        <div class="card-header bg-primary">
                            <h4 class="card-title text-white" id="basic-layout-form">Update Ball Info</h4>
                            
                        </div>
                        <div class="card-content collapse show">
                            <div class="card-body">
                                
                                <form class="form" method="POST" enctype="multipart/form-data" id="Value_Store_Form">
                                    @csrf
                                    <div class="form-body">
                                        <h4 class="form-section"><i class="ft-user"></i> Ball Info</h4>
                                        <div class="form-row">
                                            
                                              
                                            <div class="form-group col-md-6">
                                                <label for="projectinput1">Ball Colour</label>
                                                <input type="text" id="name"  name="name" class="form-control" placeholder="Ball Name" required>
                                            </div>
                                          
                                            <div class="form-group col-md-6">
                                                <label for="projectinput2">Ball Size</label>
                                                <input type="number" id="size"  name="size" class="form-control" placeholder="Ball Size" required>
                                            </div> 
                                    </div>
        
                                    <div class="form-group d-flex justify-content-center">
                                        <input type="hidden" id="url" value="/Super/Ball_Store_Request">
                                        <input type="hidden" id="action"  name="action"  value="edit">
                                        <button type="submit" class="btn btn-primary">
                                            <i class="la la-check-square-o"></i> Save
                                        </button>
                                    </div>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
        
            </div>
        </section>
        <!-- // Basic form layout section end -->
      </div>

    </div>
</div>


@endsection()
@section('script')
{{-- <script>
    $(document).ready(function(){
        alert("ok");
    })
</script> --}}
@endsection()