@extends('layouts.user')
@section('content')
<section class="content">
    <div class="body_scroll">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>Chat</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="zmdi zmdi-home"></i> {{ config('app.name') }}</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Messages</a></li>
                        <li class="breadcrumb-item active">Messages</li>
                    </ul>
                    <button class="btn btn-primary btn-icon mobile_menu" type="button"><i class="zmdi zmdi-sort-amount-desc"></i></button>
                </div>
                <div class="col-lg-5 col-md-6 col-sm-12">                
                    <button class="btn btn-primary btn-icon float-right right_icon_toggle_btn" type="button"><i class="zmdi zmdi-arrow-right"></i></button>                                
                </div>
            </div>
        </div>
        <div class="container-fluid">
            @if(Session::has('error'))
            <div class="alert alert-danger">
                <strong>Error!!</strong> {{ Session::get('error') }}.
            </div>
            @endif
            @if(Session::has('success'))
            <div class="alert alert-success">
                <strong>Success!!</strong> {{ Session::get('success') }}.
            </div>
            @endif
            <div class="row clearfix">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="chat_list">
                            <h2>Latest Chats</h2>
                            <ul class="user_list list-unstyled mb-0 mt-3">
                                @foreach($inbox as $message)
                                <li>
                                    {{-- <a href="{{ route('messageFrom',[$projectId,$message->From]) }}"> --}}
                                        <a href="{{ route('Tomessage',[$ChatId]) }}">
                                        <img src="{{ asset('assets/images/xs/avatar1.jpg') }}" alt="avatar" />
                                        <div class="about">
                                            <div class="name">{{ $user->name }}</div>
                                            <div class="status online"> <i class="zmdi zmdi-circle"></i>&nbsp;{{ ($message->created_at)->toFormattedDateString() }} </div>
                                        </div>
                                    </a>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="chat_window body">
                            <div class="chat-header">
                                <div class="user">
                                    <img src="{{ asset('assets/images/xs/avatar2.jpg') }}" alt="avatar" />
                                    <div class="chat-about">
                                        {{-- <div class="chat-with">{{ App\User::where('UserId','=',$to)->get()[0]->name }}</div> --}}
                                        <div class="chat-with">{{ $user->name }}</div>
                                        <div class="chat-num-messages"><small>ProjectId:<a href="{{ route('singleProject',[$projectId]) }}">{{ $projectId }}</a></small></div>
                                    </div>
                                </div>
                                <div class="setting">
                                   @if(is_null($project->AwardedTo))
                                            <a href="{{ route('award',[$ChatId]) }}" class="btn btn-success"><i class="fa fa-gift"></i>&nbsp; Award Project</a>
                                   @else
                                            @if($project->Status==1)
                                                <button class="btn btn-success fa fa-check">&nbsp;Project Complete</button>
                                            @else
                                                <a href="{{ route('completeContract',[$ChatId]) }}" class="btn btn-success"><i class="fa fa-check-circle"></i>&nbsp; Complete Project</a>
                                                <a href="{{ route('terminateContract',[$ChatId]) }}" class="btn btn-danger"><i class="fa fa-times-circle"></i>&nbsp; Cancel Contract</a>
                                            @endif
                                   @endif
                                </div>
                                <a href="javascript:void(0);" class="list_btn btn btn-info btn-round float-md-right"><i class="zmdi zmdi-comments"></i></a>
                            </div>
                            <hr>
                            <ul class="chat-history">
                                @foreach($myMessages as $message)
                                    @if($message->From == Auth::user()->UserId)
                                            @if($message->Attachment==5)
                                            <br>
                                            <div class="body" style="border:2px solid red; background-color:whitesmoke;height:150px">
                                                <span class="ti-receipt" style="font-size:20px;color:blue;font-weight:bold !important">&nbsp;You Have Released the Milestone for {{ $message->To }}</span>
                                            </div>
                                            @elseif($message->Attachment==7)
                                            <br>
                                            <div class="body" style="border:2px solid blue; background-color:#f2174f;color:white">
                                                You Requested Project  {{ $projectId }} To Be Complete. Kindly Let {{ $message->To }} To Confirm<br>
                                           </div>
                                           @elseif($message->Attachment==8)
                                                <br>
                                                <div class="card w_data_1">
                                                    <div class="body" style="border:2px solid blue; background-color:#f2174f;color:white">
                                                        {{ $message->Message }}.<br>
                                                        Want to leave  review on the Freelancer? Do it <a class="btn btn-warning" href="#">Here</a>
                                                    </div>
                                                </div>
                                                @elseif($message->Attachment==3)
                                                <br>
                                                <div class="card w_data_1">
                                                    <div class="body" style="border:2px solid blue; background-color:#f2174f;color:white">
                                                        {{ $message->Message }}.<br>
                                                    </div>
                                                </div>
                                            @else
                                            <li class="clearfix">
                                                <div class="status online message-data text-right">
                                                    <span class="time">{{ ($message->created_at) }}</span>
                                                    <span class="name"><small>{{ Auth::user()->name }}</small></span>
                                                    <i class="zmdi zmdi-circle me" style="color:red"></i>
                                                </div>
                                                <div class="message other-message @if(Auth::user()->UserId == $message->To) pull-right @else my-message @endif"><small>{{ $message->Message }}</small></div>
                                            </li>
                                            @endif
                                    @else
                                        @if($message->Attachment==3)
                                                @if($message->From==Auth::user()->UserId)
                                                    <div class="well well-primary well-md text-center" style="background-color:red;color:white">
                                                        We Have sent a request to {{ $to }}. They Have to Accept the Offer
                                                    </div>
                                                @else
                                                <div class="body" style="border:2px solid red; background-color:whitesmoke;">
                                                    <span class="ti-receipt" style="font-size:15px;color:blue;font-weight:bold !important">&nbsp;{{ $message->Message }} We recommended {{ $message->To }} to create a milestone/add at least some hours  within the project budget for security reasons. Amount will be put in escrow for  your security Also. Kindly Accept their Amount the propose</span>
                                                </div>
                                                @endif
                                                @elseif($message->Attachment==4)
                                                <br>
                                                <div class="card w_data_1">
                                                    <div class="body" style="border:2px solid blue; background-color:#f2174f;color:white">
                                                         {{ $message->Message }}Release Now?<br>
                                                        <a href="{{ route('release',[$ChatId]) }}" class="btn btn-success">Release</a>
                                                        <a href="{{ route('reject',[$ChatId]) }}" class="btn" style="background-color:black">Dismiss</a>
                                                    </div>
                                                </div>
                                            @elseif($message->Attachment==5)
                                                <div class="card w_data_1">
                                                    <div class="body" style="border:2px solid red; background-color:whitesmoke">
                                                            {{ $message}}
                                                    </div>
                                                </div>
                                            @elseif($message->Attachment==6)
                                            <br>
                                                <div class="card w_data_1">
                                                    <div class="body" style="border:2px solid red; background-color:whitesmoke">
                                                            {{ $message->Message}}. &nbsp;Click <a href="{{ route('project.hours',[$projectId]) }}">Here</a>  to View Them
                                                    </div>
                                                </div>
                                        @else
                                            <li>
                                                <div class="status message-data">
                                                    <span class="name"><small>{{ $message->To }}</small></span>
                                                    <span class="time"> {{ ($message->created_at)->toFormattedDateString() }}</span>
                                                    <i class="zmdi zmdi-circle me" style="color:blue"></i>
                                                </div>
                                                <div class="message my-message">
                                                    <p><small>{{ $message->Message }}</small></p>
                                                </div>
                                            </li>   
                                        @endif
                                    @endif
                                @endforeach                     
                            </ul>
                            <div class="chat-box">
                                <form method="post" action="{{ route('message.post',[2,3]) }}" enctype="multipart/form-data" id="form">
                                    @csrf
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="zmdi zmdi-mail-send" onclick="
                                            if(document.getElementById('message').value ===''){
                                               $('#message').addClass('form-control-danger')
                                               alert('Cant Send Empty Mesage')
                                               return false;
                                            }else{
                                                document.getElementById('form').submit();
                                            }
                                            "></i></span>
                                        </div>
                                        <input type="hidden" name="ChatId" value="{{ $ChatId }}" required>
                                        <input type="hidden" name="To" value="{{ $from }}" required>
                                        <input type="text" class="form-control" placeholder="Type Your Message To {{ $user->name }}" id="message" name="Message" required>
                                    </div> 
                                </form>                                                           
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection