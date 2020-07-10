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
                                @foreach($Messages as $message)
                                <li>
                                    <a href="javascript:void(0);">
                                        <img src="{{ asset('assets/images/xs/avatar1.jpg') }}" alt="avatar" />
                                        <div class="about">
                                            <div class="name">{{ $message->To }}</div>
                                            <div class="status offline"> <i class="zmdi zmdi-circle"></i> left 7 mins ago </div>
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
                                        <div class="chat-with">{{ $user->name }}</div>
                                        <div class="chat-num-messages"><small>{{ $project->ProjectTitle }}</small></div>
                                    </div>
                                </div>
                                <div class="setting">
                                    <a href="#" class="btn btn-success"><i class="fa fa-gift"></i>&nbsp; Award Project</a>
                                </div>
                                <a href="javascript:void(0);" class="list_btn btn btn-info btn-round float-md-right"><i class="zmdi zmdi-comments"></i></a>
                            </div>
                            <hr>
                            <ul class="chat-history">
                              @if($isMessages=='None')
                              <h6 class="text-center text-success" style="text-transform:lowercase !important">Start A new Conversation with {{ $user->name }} <i class="zmdi zmdi-circle" style="font-size:8px;color:red"></i> <i class="zmdi zmdi-circle" style="font-size:8px;color:blue"></i> <i class="zmdi zmdi-circle" style="font-size:8px"></i></h6>
                              @endif
                              @foreach($Messages as $message)
                             @if($message->From == Auth::user()->UserId)
                             <li class="clearfix">
                                <div class="status online message-data text-right">
                                    <span class="time">{{ ($message->created_at) }}</span>
                                    <span class="name"><small>{{ Auth::user()->name }}</small></span>
                                    <i class="zmdi zmdi-circle me" style="color:red"></i>
                                </div>
                                <div class="message other-message @if(Auth::user()->UserId == $message->To) pull-right @else my-message @endif"><small>{{ $message->Message }}</small></div>
                            </li>
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
                              @endforeach                     
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
                                        <input type="text" class="form-control" placeholder="Type Your Message Here" id="message" name="Message" required>
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