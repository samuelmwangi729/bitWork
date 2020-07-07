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
                    <a href="profile-edit.html" class="btn btn-info btn-icon float-right"><i class="zmdi zmdi-edit"></i></a>
                </div>
            </div>
        </div> 
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-4 col-md-12">
                    <div class="card mcard_3">
                        <div class="body">
                            <a href="{{ route('account') }}"><img src="{{ asset('assets/images/profile_av.jpg') }}" class="rounded-circle shadow " alt="profile-image"></a>
                            <h4 class="m-t-10">{{ Auth::user()->name }}</h4>                            
                            <h6 class="m-t-10">@if(Auth::user()->AccountType==2) Freelancer @endif</h6>                            
                            <h6 class="m-t-10">@if(Auth::user()->AccountType==3) Client @endif</h6>                            
                            <h6 class="m-t-10">@if(Auth::user()->AccountType==1) Admin @endif</h6>                            
                            <div class="row">
                                <div class="col-12">
                                    <p class="text-muted">795 Folsom Ave, Suite 600 San Francisco, CADGE 94107</p>
                                </div>                          
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="body">
                            <small class="text-muted">Email address: </small>
                            <p>{{ Auth::user()->email }}</p>
                            <hr>
                            <small class="text-muted">User Id: </small>
                            <p>{{ Auth::user()->UserId }}</p>
                            <hr>
                            <ul class="list-unstyled">
                                <h4 class="text-center">Skills</h4>
                                <li>
                                    <div>Photoshop</div>
                                    <div class="progress m-b-20">
                                        <div class="progress-bar l-blue " role="progressbar" aria-valuenow="89" aria-valuemin="0" aria-valuemax="100" style="width: 89%"> <span class="sr-only">62% Complete</span> </div>
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
                            </ul>
                        </div>
                    </div>                    
                </div>
                <div class="col-lg-8 col-md-12">
                    <div class="card">
                        <div class="body">
                          <div class="card">
                              <div class="card-header">
                                  Profile
                              </div>
                              <div class="card-body">
                                  Profile Description goes here
                              </div>
                              <span style="background-color:#f5f5f5">Payment Platform: BlockChain</span><br>
                              <span style="background-color:#f5f5f5">Payment Address: dhjsdbj89sdbbjsd767r556sdv</span><br>
                              <span style="background-color:#f5f5f5">Country: Kenya</span><br>
                          </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@stop