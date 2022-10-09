
@extends('Layout.SuperAdmin.layout')
@section('title','Ball Placed')
@section('content')
    <!-- END: Main Menu-->
    <!-- BEGIN: Content-->
<div class="app-content container center-layout col-md-8 ">
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
                            <li class="breadcrumb-item active">Ball Placed List
                            </li>
                            </ol>
                        </div>
                   </div>
                    <div class="card">
                        <div class="card-header bg-primary">
                            <h4 class="card-title text-white" id="basic-layout-form">Display Ball Placed List</h4>
                            
                        </div>
                        <div class="card-content collapse show">
                            <div class="card-body">
                                <table class="table table-bordered table-sm">
                                    <thead>
                                        <tr>
                                            <th>Sl No</th>
                                            <th>Bucket Name</th>
                                            <th>Ball Name</th>
                                            <th>Value</th>
                                            <th>Total Point</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data as $item)
                                            <tr>
                                                <td>{{$no++}}</td>
                                                <td>{{$item->B_NAME}}</td>
                                                <td>{{$item->BALL_NAME}}-({{$item->BALL_SIZE}})</td>
                                                <td>{{$item->BALL_COUNT}}</td>
                                                <td>{{$item->BALL_SIZE*$item->BALL_COUNT}}</td>
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
                            <li class="breadcrumb-item active">Save Ball Placed
                            </li>
                            </ol>
                        </div>
                   </div>
                    <div class="card">
                        <div class="card-header bg-primary">
                            <h4 class="card-title text-white" id="basic-layout-form">Add Ball Placed Info</h4>
                            
                        </div>
                        <div class="card-content collapse show">
                            <div class="card-body">
                                
                                <form class="form" method="POST" enctype="multipart/form-data" id="Value_Store_Form">
                                    @csrf
                                    <div class="form-body">
                                        <h4 class="form-section"><i class="ft-user"></i> Ball Placed Info</h4>
                                        <div class="form-row">
                                            
                                            <div class="form-group col-md-6">
                                                <label for="projectinput1">Select Ball Colour</label>
                                                <select name="ball_name" id="ball_name" class="form-control" required>
                                                    <option value="">Select</option>  
                                                 @foreach ($ball_list as $val)
                                                    <option value="{{$val->BALL_ID}}">{{$val->BALL_NAME}}-({{$val->BALL_SIZE}})</option>  
                                                  @endforeach
                                                </select>
                                            </div>
                                          
                                            <div class="form-group col-md-6">
                                                <label for="projectinput2">Ball Value</label>
                                                <input type="number" id="ball_value" min="0"  name="ball_value" class="form-control" placeholder="Ball Value" required>
                                            </div>
                                    
        
                                    <div class="form-group col-md-12 d-flex justify-content-center mb-3">
                                        <input type="hidden" id="url" value="/Super/Ball_Placed_Store_Request">
                                        <input type="hidden" id="action" name="action" value="add">
                                        <button type="submit" class="btn btn-primary">
                                            <i class="la la-check-square-o"></i> Save
                                        </button>
                                    </div>
                                    <div class="form-group col-md-1">
                                       
                                    </div>
                                    <div class="form-group col-md-2">
                                        <p>A Bucket</p>
                                        <img src="{{url('img/scr-img/bucket.jpg')}}" alt="" width="60px">
                                        <div id="a"></div>
                                    </div>
                                    <div class="form-group col-md-2">
                                        <p>B Bucket</p>
                                        <img src="{{url('img/scr-img/bucket.jpg')}}" alt="" width="60px">
                                        <div id="b"></div>
                                    </div>
                                    <div class="form-group col-md-2">
                                        <p>C Bucket</p>
                                        <img src="{{url('img/scr-img/bucket.jpg')}}" alt="" width="60px">
                                        <div id="c"></div>
                                    </div>
                                    <div class="form-group col-md-2">
                                        <p>D Bucket</p>
                                        <img src="{{url('img/scr-img/bucket.jpg')}}" alt="" width="60px">
                                        <div id="d"></div> 
                                    </div>
                                    <div class="form-group col-md-2">
                                        <p>E Bucket</p>
                                        <img src="{{url('img/scr-img/bucket.jpg')}}" alt="" width="60px">
                                        <div id="e"></div>
                                        
                                    </div>
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
                            <li class="breadcrumb-item"><a href="{{url('Super/Dashboard')}}">Ball Placed List</a>
                            </li>
                            <li class="breadcrumb-item active">Update Ball Placed Info
                            </li>
                            </ol>
                        </div>
                   </div>
                    <div class="card">
                        <div class="card-header bg-primary">
                            <h4 class="card-title text-white" id="basic-layout-form">Update Ball Placed Info</h4>
                            
                        </div>
                        <div class="card-content collapse show">
                            <div class="card-body">
                                
                                <form class="form" method="POST" enctype="multipart/form-data" id="Value_Store_Form">
                                    @csrf
                                    <div class="form-body">
                                        <h4 class="form-section"><i class="ft-user"></i> Ball Placed Info</h4>
                                        <div class="form-row">
                                            
                                              
                                            <div class="form-group col-md-6">
                                                <label for="projectinput1">Ball Placed Name</label>
                                                <input type="text" id="name"  name="name" class="form-control" placeholder="Ball Placed Name" required>
                                            </div>
                                          
                                            <div class="form-group col-md-6">
                                                <label for="projectinput2">Ball Placed Size</label>
                                                <input type="number" id="size"  name="size" class="form-control" placeholder="Ball Placed Size" required>
                                            </div> 
                                    </div>
        
                                    <div class="form-group d-flex justify-content-center">
                                        <input type="hidden" id="url" value="/Super/Ball_Placed_Store_Request">
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
<script>
    $(document).ready(function(){
        Load_Bucket();
        function Load_Bucket() {

            $.post( "/Super/Ball-Placed/Load_Bucket",{ _token : "{{csrf_token()}}"} ,function( data ) {
                $('#a').html(data.a);
                $('#b').html(data.b);
                $('#c').html(data.c);
                $('#d').html(data.d);
                $('#e').html(data.e);
            },"json");
        }
    })
</script>
@endsection()