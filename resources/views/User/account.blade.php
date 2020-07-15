@extends('layouts.user')
@section('content')
<section class="content">
    <div class="body_scroll">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>Profile</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('account') }}"><i class="zmdi zmdi-home"></i>{{ config('app.name') }}</a></li>
                        <li class="breadcrumb-item">Profile</li>
                        <li class="breadcrumb-item active">{{ Auth::user()->name }}</li>
                    </ul>
                    <button class="btn btn-primary btn-icon mobile_menu" type="button"><i class="zmdi zmdi-sort-amount-desc"></i></button>
                </div>
                <div class="col-lg-5 col-md-6 col-sm-12">                
                    <button class="btn btn-primary btn-icon float-right right_icon_toggle_btn" type="button"><i class="zmdi zmdi-arrow-right"></i></button>
                    <a href="#" class="btn btn-info ">View Profile As Others See it</a>
                </div>
            </div>
        </div> 
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-4 col-md-12">
                    <div class="card mcard_3">
                        <div class="body">
                            @if($account->Profile =='')
                                <a href="javascript:void(0)" data-toggle="modal"><img src="{{ asset('assets/images/default.png') }}" class="rounded-circle shadow " alt="{{ Auth::user()->name}}" height="220px">
                                </a>
                            @else
                            <a href="javascript:void(0)" data-toggle="modal"><img src="{{ asset($account->Profile) }}" class="rounded-circle shadow " alt="{{ Auth::user()->name}}" height="220px">
                            </a>
                            @endif
                            <h4 class="m-t-10">{{ Auth::user()->name }}</h4>                            
                            <h6 class="m-t-10">@if(Auth::user()->AccountType==2) Freelancer @endif</h6>                            
                            <h6 class="m-t-10">@if(Auth::user()->AccountType==3) Client @endif</h6>                            
                            <h6 class="m-t-10">@if(Auth::user()->AccountType==1) Admin @endif</h6>                            
                            <div class="row">
                                <div class="col-12">
                                    <p class="text-muted">Joined on {{ ($account->created_at)->toFormattedDateString() }}</p>
                                </div>                          
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="body">
                            @if($account->Profile=='')
                                <small class="text-muted">Update Profile Photo</small>
                                <p>
                                    <form method="post" action="{{ route('Photo') }}" id="form" enctype="multipart/form-data">
                                        @csrf
                                        Choose Photo
                                        <input type="file" class="form-control @error('Photo') form-control-danger @enderror" name="Photo">
                                        <button class="btn btn-success" onclick="document.getElementById('form').submit()">
                                            Update
                                        </button>
                                    </form>
                                </p>
                                <hr>
                            @endif
                            <small class="text-muted">Email address: </small>
                            <p>{{ Auth::user()->email }}</p>
                            <hr>
                            <small class="text-muted">User Id: </small>
                            <p>{{ Auth::user()->UserId }}</p>
                            <hr>
                            <ul class="list-unstyled">
                                <h4 class="text-center">Skills</h4>
                               @if(count($skills) ==0)
                                    Update Your Skills
                               @else
                               <li>
                                <div>Photoshop</div>
                                <div class="progress m-b-20">
                                    <div class="progress-bar l-blue " role="progressbar" aria-valuenow="89" aria-valuemin="0" aria-valuemax="100" style="width: 100%"> <span class="sr-only">62% Complete</span> </div>
                                </div>
                            </li>
                            <li>
                                <div>Wordpress</div>
                                <div class="progress m-b-20">
                                    <div class="progress-bar l-green " role="progressbar" aria-valuenow="56" aria-valuemin="0" aria-valuemax="100" style="width: 56%"> <span class="sr-only">87% Complete</span> </div>
                                </div>
                            </li>
                            <li>
                                <div>HTML 5</div>
                                <div class="progress m-b-20">
                                    <div class="progress-bar l-amber" role="progressbar" aria-valuenow="78" aria-valuemin="0" aria-valuemax="100" style="width: 78%"> <span class="sr-only">32% Complete</span> </div>
                                </div>
                            </li>
                            <li>
                                <div>Angular</div>
                                <div class="progress m-b-20">
                                    <div class="progress-bar l-blush" role="progressbar" aria-valuenow="43" aria-valuemin="0" aria-valuemax="100" style="width: 43%"> <span class="sr-only">56% Complete</span> </div>
                                </div>
                            </li>
                               @endif
                            </ul>
                        </div>
                    </div>                    
                </div>
                <div class="col-lg-8 col-md-12">
                    <div class="card">
                        <div class="body">
                          <div class="card">
                              <div class="card-header">
                                  @if(Session::has('success'))
                                    <div class="alert alert-success">
                                             <strong>
                                                 {{ Session::get('success') }}
                                             </strong>
                                    </div>
                                  @endif
                                  @if(Session::has('error'))
                                    <div class="alert alert-danger">
                                             <strong>
                                                 {{ Session::get('error') }}
                                             </strong>
                                    </div>
                                  @endif
                                  @if($errors->all())
                                        <div class="alert alert-warning">
                                            <a href="#" class="close" data-dismiss="alert">&times;</a>
                                            @foreach ($errors->all() as $error )
                                                    <span>
                                                        {{ $error }}<br>
                                                    </span>
                                            @endforeach
                                        </div>
                                  @endif
                                  Profile Bio
                              </div>
                              <div class="card-body">
                                  @if(is_null($account->Description))
                                    <div class="alert alert-danger">
                                            <strong>Well!!!</strong> No Profile Bio<a href="#bioModal" data-toggle="modal" class="alert-link" style="text-decoration:none">&nbsp;Add It Here</a>.
                                    </div>
                                    <!-- Start Modal -->
                                    <div class="modal fade" id="bioModal" tabindex="-1" role="dialog">
                                        <div class="modal-dialog modal-md" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="title justify-content-center" style="color:#b7265f">Add Your Bio</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <form method="post" action="{{ route('Bio') }}" id="bio">
                                                        <script>
                                                            function validate(){
                                                                let g=document.getElementById('Bio').value;
                                                                let p=document.getElementById('PaymentId').value;
                                                                if(g=='' || p==''){
                                                                    alert('Details Cant be Empty,Fill them All');
                                                                    return false;
                                                                }else{
                                                                    document.getElementById('bio').submit()
                                                                }
                                                            }
                                                        </script>
                                                        @csrf
                                                        <label for="bio" class="label-control"><i class="fa fa-bitcoin"></i>&nbsp; BTC Address</label><br>
                                                        <input type="text" class="form-control" name="PaymentId" id="PaymentId" placeholder="Enter your Btc Wallet">
                                                        <div class="form-group justify-content-center">
                                                            <label for="bio" class="label-control"><i class="fa fa-id-card"></i>&nbsp; Add Your Bio</label><br>
                                                            <textarea  name="Bio" style="height:300px;width:100%" id="Bio"></textarea>
                                                            <button type="button" class="btn btn-primary  waves-effect" onclick="validate()">Save Bio</button>
                                                        </div>
                                                    </form>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">CLOSE</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--End Modal-->
                                  @else
                                        <span>
                                            {{ $account->Description }}
                                        </span>
                                        <span class="pull-right"><a href="#editModal" data-toggle="modal" class="alert-link" style="text-decoration:none">&nbsp;<i class="fa fa-edit"></i></a>.</span>
                                        <!-- Start Modal -->
                                     <div class="modal fade" id="editModal" tabindex="-1" role="dialog">
                                        <div class="modal-dialog modal-md" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="title justify-content-center" style="color:#b7265f">Edit Your Bio</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <form method="post" action="{{ route('EditBio',[Auth::user()->UserId]) }}" id="editbio">
                                                        <script>
                                                            function validate(){
                                                                document.getElementById('editbio').submit()
                                                            }
                                                        </script>
                                                        @csrf
                                                        <label for="bio" class="label-control"><i class="fa fa-bitcoin"></i>&nbsp; BTC Address</label><br>
                                                        <input type="text" class="form-control" name="PaymentId" placeholder="Enter your Btc Wallet" value="{{ $account->PaymentAddress }}">
                                                        <div class="form-group justify-content-center">
                                                            <label for="bio" class="label-control"><i class="fa fa-id-card"></i>&nbsp; Edit Your Bio</label><br>
                                                            <textarea  name="Bio" style="height:300px;width:100%">{{ $account->Description }}</textarea>
                                                            <button type="button" class="btn btn-primary  waves-effect" onclick="validate()">Update Bio</button>
                                                        </div>
                                                    </form>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">CLOSE</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--End Modal-->
                                  @endif
                              </div>
                              <span style="background-color:#f5f5f5">Payment Address: {{ $account->PaymentAddress }}</span><br>
                          </div>
                        </div>
                    </div>
                    <!--end Card-->
                    <div class="card">
                        <div class="body">
                          <div class="card">
                           <h3 class="text-center">  Ratings</h3>
                              <div class="card-body">
                                ratings goes here
                              </div>
                          </div>
                        </div>
                    </div>
                    <!--end Card-->
                </div>
            </div>
        </div>
    </div>
</section>
@stop