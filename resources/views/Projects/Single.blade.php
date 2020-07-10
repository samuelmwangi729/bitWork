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
                                                <div class="pull-right">
                                                    <a href="{{ route('message',[$proposal->ProjectId,$proposal->UserId]) }}" class="btn" style="background-color:#f2174f;color:white"><i class="fa fa-envelope"></i>&nbsp; Message {{ $proposal->UserId }}</a>
                                                    <a href="#" class="btn btn-success"><i class="fa fa-gift"></i>&nbsp; Award {{ $proposal->UserId }}</a>
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        @endforeach
                                    </p>
                                </div>
                                <div class="tab-pane" id="review">
                                    <p>
                                        @if($project->ProjectFile ==0 )  No Files Uploaded By The Client @else <a href="{{ asset($project->ProjectFile) }}">View File</a> @endif
                                    </p>
                                </div>
                                <div class="tab-pane" id="rating">
                                    <p>
                                      Projects Rating Goes Here
                                    </p>
                                </div>
                                <div class="tab-pane" id="about">
                                    <div class="body">
                                        <ul class="list-group">
                                            <a href="#" style="display:block;text-decoration:none;color:black !important">
                                                <li class="list-group-item">
                                                    Sent a Message <span class="pull-right">12:34 AM <i class="fa fa-circle" style="color:red"></i></span>
                                                </li>
                                            </a>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection