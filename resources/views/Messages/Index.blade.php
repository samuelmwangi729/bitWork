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
            <div class="row clearfix">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="chat_list">
                            <h2>Latest Chats</h2>
                            <ul class="user_list list-unstyled mb-0 mt-3">
                                @if($inbox=='None')
                                No Available Messages
                                @else
                                @foreach($inbox as $message)
                                <li>
                                    {{-- <a href="{{ route('messageFrom',[$projectId,$message->From]) }}"> --}}
                                        <a href="{{ route('Tomessage',[$ChatId]) }}">
                                        <img src="{{ asset('assets/images/xs/avatar1.jpg') }}" alt="avatar" />
                                        <div class="about">
                                            <div class="name">{{ App\User::where('UserId','=',$message->To)->get()[0]->name }}</div>
                                            <div class="status online"> <i class="zmdi zmdi-circle"></i>&nbsp;{{ ($message->created_at)->toFormattedDateString() }} </div>
                                        </div>
                                    </a>
                                </li>
                                @endforeach
                                @endif
                            </ul>
                        </div>
                        <div class="chat_window body">
                            <div class="chat-header">
                                <div class="user">
                                    <img src="{{ asset('assets/images/xs/avatar2.jpg') }}" alt="avatar" />
                                    <div class="chat-about">
                                        <div class="chat-with">{{ $user->name }}</div>
                                        <div class="chat-num-messages"><small>{{ $project->ProjectTitle }}</small></div>
                                    </div>
                                </div>
                                <div class="setting">
                                  @if($ChatId=='')
                                        <button class="btn btn-success">Enjoy</button>
                                  @else
                                  <a href="{{ route('award',[$ChatId]) }}" class="btn btn-success"><i class="fa fa-gift"></i>&nbsp; Award Project</a>
                                  @endif
                                </div>
                                <a href="javascript:void(0);" class="list_btn btn btn-info btn-round float-md-right"><i class="zmdi zmdi-comments"></i></a>
                            </div>
                            <hr>
                            <ul class="chat-history">
                              @if($Messages=='None')
                              <h6 class="text-center text-success" style="text-transform:lowercase !important">Start A new Conversation with {{ $user->name }} <i class="zmdi zmdi-circle" style="font-size:8px;color:red"></i> <i class="zmdi zmdi-circle" style="font-size:8px;color:blue"></i> <i class="zmdi zmdi-circle" style="font-size:8px"></i></h6>
                              @else
                              @foreach($Messages as $message)
                             @if($message->From == Auth::user()->UserId)
                                @if($message->Attachment==3)
                                    @if($message->From==Auth::user()->UserId)
                                    <br>
                                    <div class="body" style="border:2px solid blue; background-color:#f2174f;color:white">
                                        We Have sent a request to {{ $to }}. They Have to Accept the Offer
                                       <br>
                                    </div>
                                    @elseif($message->Attachment==9)
                                    <div class="body" style="border:2px solid blue; background-color:#f2174f;color:white">
                                       {{$message->Message}}
                                       <br>
                                    </div>
                                    @else
                                        <div class="card w_data_1">
                                            <div class="body">
                                                {{ $message->From }}
                                            <a href="{{ route('accept',[$project->ProjectId]) }}" class="btn btn-success">Yes</a>
                                            <a href="{{ route('reject',[$project->ProjectId]) }}" class="btn btn-danger">No</a>
                                            </div>
                                        </div>
                                    @endif
                                @else
                                        @if($message->Attachment==9)
                                        <br>
                                            <div class="body" style="border:2px solid blue; background-color:#f2174f;color:white">
                                            {{$message->Message}}. We have notified the Freelancer to give you some time to top up your Account
                                            <br>
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
                                @endif
                             @else
                            <li>
                                <div class="status message-data">
                                    <span class="name"><small>{{ $message->To }}</small></span>
                                    <span class="time"> {{ ($message->created_at)->toFormattedDateString() }}</span>
                                    <i class="zmdi zmdi-circle me" style="color:blue"></i>
                                </div>
                                <div class="message my-message">
                                    <p><small>{{ $message->Message }} </small></p>
                                </div>
                            </li>   
                            @endif
                              @endforeach       
                              @endif              
                            </ul>
                            <div class="chat-box">
                                <form method="post" action="{{ route('message.post',[$user->UserId,$project->ProjectId]) }}" enctype="multipart/form-data" id="form">
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
                                        <input type="hidden" name="To" value="{{ $to }}" required>
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