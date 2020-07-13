@extends('layouts.user')
@section('content')
<section class="content">
    <div class="body_scroll">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>Project Details</h2>
                    <button class="btn btn-primary btn-icon mobile_menu" type="button"><i class="zmdi zmdi-sort-amount-desc"></i></button>
                </div>
                <div class="col-lg-5 col-md-6 col-sm-12">                
                    <button class="btn btn-primary btn-icon float-right right_icon_toggle_btn" type="button"><i class="zmdi zmdi-arrow-right"></i></button>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="body">
                            <div class="row">
                                <div class="col-xl-9 col-lg-8 col-md-12">
                                    @if(Session::has('success'))
                                        <div class="alert alert-success">
                                            <a href="#" class="close" data-dismiss="alert">&times;</a>
                                            {{ Session::get('success') }}
                                        </div>
                                    @endif
                                    <div class="product details">
                                        <h3 class="product-title mb-0">{{ $project->ProjectTitle }}</h3>
                                        <h5 class="price mt-0">Budget: <span class="col-amber">{{ $project->Budget }}</span></h5>
                                        <hr>
                                        <p class="product-description">
                                            {{ $project->Description }}
                                        </p>
                                        <p class="vote"><strong>{{ $ProposalsCount }}</strong> Proposal(s)</strong></p>
                                        <div class="action">
                                            @if($project->Status==0)
                                            <button class="btn btn-info waves-effect" type="button" title="Save For Later" style="background-color:#d77896 !important"><i class="zmdi zmdi-favorite"></i>&nbsp;Save for Later</button>
                                            <a class="btn btn-info waves-effect"  style="background-color:black;color:white !important" href="{{ route('close',[$project->Slug]) }}"><i class="fa fa-times-circle"></i>&nbsp;Close Bidding</a>
                                            <a class="btn btn-primary waves-effect" href="{{ route('complete',[$project->Slug]) }}"><i class="fa fa-check"></i>&nbsp;Mark As Complete</a>                                           
                                            @endif
                                            @if($project->Status==3)
                                            <button class="btn btn-warning waves-effect" type="button"><i class="fa fa-times-circle"></i>&nbsp;Closed For Bidding</button>
                                            @if($project->AwardedTo==Auth::user()->UserId)
                                            <button class="btn btn-primary waves-effect" type="button"><i class="fa fa-calendar-o"></i>&nbsp;Awarded To You</button>
                                                @if($payType->PaidBy=='By Milestone')
                                                <button class="btn btn-info waves-effect" type="button" data-toggle="modal" data-target="#smallModal"><i class="fa fa-calendar-o"></i>&nbsp; Create MileStone</button>
                                                <!-- Small Size -->
                                                    <div class="modal fade modal-col-pink" id="smallModal" tabindex="-1" role="dialog">
                                                        <div class="modal-dialog modal-md" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h4 class="title" id="smallModalLabel">Create Milestone for Project  <u style="color:red">{{ $project->ProjectTitle }}</u></h4>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="form">
                                                                        <form method="POST" action="{{ route('milestone',[$project->ProjectId]) }}" id="milestone">
                                                                            @csrf
                                                                            <div class="row">
                                                                                <div class="col-sm-6">
                                                                                    <div class="form-group">
                                                                                        <label class="label-control" for="MilestoneName"><i class="fa fa-tags"></i>&nbsp; MileStone Name</label>
                                                                                        <input type="text" name="MilestoneName" id="MilestoneName" class="form-control" placeholder="Eg. Upfront Payment" required>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-sm-6">
                                                                                    <div class="form-group">
                                                                                        <label class="label-control" for="MilestoneName"><i class="fa fa-bitcoin"></i>&nbsp; MileStone Amount</label>
                                                                                        <input number="text" name="MilestoneAmount" id="MilestoneAmount" class="form-control" placeholder="Eg. 0.003" required>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="row justify-content-center">
                                                                                <script>
                                                                                   function v(){
                                                                                     let g=document.getElementById('MilestoneName');
                                                                                     let a=document.getElementById('MilestoneAmount');
                                                                                     let f=document.getElementById('milestone');
                                                                                     if(g.value=='' || a.value==''){
                                                                                         alert('please Fill in the details');
                                                                                         return false;
                                                                                     }else{
                                                                                         f.submit()
                                                                                     }
                                                                                   }
                                                                                </script>
                                                                                <button type="submit" class="btn" style="background-color:#f2174f;color:white !important" onclick="
                                                                                    v()
                                                                                    ">
                                                                                    Submit MileStone
                                                                                </button>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal" style="background-color:#f2174f">Dismiss</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                                @if($payType->PaidBy=='Hourly')
                                                <button class="btn btn-success waves-effect" type="button"><i class="fa fa-calendar-o"></i>&nbsp; Track Hours</button>
                                                @endif
                                                @if($payType->PaidBy=='By Project')
                                                <button class="btn btn-primary waves-effect" type="button"><i class="fa fa-calendar-o"></i>&nbsp; Paid By Project</button>
                                                @endif
                                            @endif
                                            @endif
                                            @if($project->Status==1)
                                            <button class="btn btn-info waves-effect" type="button"  style="background-color:green !important"><i class="fa fa-check-circle"></i>&nbsp;Completed</button>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    @if($project->Status==3)
                        @foreach(App\Milestone::where('ProjectId','=',$project->ProjectId)->get() as $milestone)
                                <div class="card widget_2 big_icon">
                                    <div class="body">
                                        <h6>Milestone Name : {{$milestone->Name}} <span class="pull-right"> For Only {{$milestone->Amount}} BTC</span></h6>
                                        <small>
                                            @if($milestone->Status==1)
                                            <span class="ti-medall" style="font-size:70px;color:green !important"></span> <span class="pull-right h1" style="color:green"> Released</span>
                                            @else
                                            <span class="ti-lock" style="font-size:70px;color:red !important"></span> <span class="pull-right h1" style="color:Red"> Pending Release...</span>
                                            @endif
                                        </small>
                                    </div>
                                </div>
                        <hr>
                        @endforeach
                    @else
                    <div class="card">
                        <div class="body">
                            <ul class="nav nav-tabs">
                                <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#description">Proposals</a></li>
                                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#review">File</a></li>
                                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#about">Messages</a></li>
                                @if($project->Status==1)
                                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#rating">Rating</a></li>
                                @endif
                            </ul>
                        </div>
                    </div>
                    <div class="card">
                        <div class="body">                            
                            <div class="tab-content">
                                <div class="tab-pane active" id="description">
                                    <p>
                                        @foreach($proposals as $proposal)
                                        <div class="card widget_2 big_icon">
                                            <div class="body">
                                                <h6>UserId : {{$proposal->UserId}} <span class="pull-right"> For Only {{$proposal->Budget}} BTC</span></h6>
                                                <h2><small class="info">{{$proposal->ProposalDescription}}</small></h2>
                                                <small>To be Delivered in less then {{$proposal->ProjectTimespan}}</small>
                                                <span><a href="{{ route('message',[$project->ProjectId,$proposal->UserId]) }}" class="btn btn-success pull-right"><i class="fa fa-comment"></i>&nbsp; Message {{ $proposal->UserId }}</a></span>
                                            </div>
                                        </div>
                                        <hr>
                                        @endforeach
                                    </p>
                                </div>
                                <div class="tab-pane" id="review">
                                    <p>
                                        @if($project->ProjectFile) 
                                            <h6 class="text-center"><a href="{{ asset($project->ProjectFile) }}" target="_blank"><button class="btn btn-primary fa fa-download"> &nbsp;Download</button></a></h6>
                                        @else
                                       <div class="alert alert-danger">
                                           No available files for the Project
                                       </div>
                                        @endif
                                    </p>
                                </div>
                                <div class="tab-pane" id="rating">
                                    <p>
                                      Projects Rating Goes Here
                                    </p>
                                </div>
                                <div class="tab-pane" id="about" class="justify-content-center">
                                    Upgrade your Membership to Message the Client Directly
                                    <a href="#" class="btn" style="background-color:#f2174f !important">0.0005BTC Per Month</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
@endsection