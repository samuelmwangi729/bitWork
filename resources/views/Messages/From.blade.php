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
                                @foreach($inbox as $message)
                                <li>
                                    {{-- <a href="{{ route('messageFrom',[$projectId,$message->From]) }}"> --}}
                                        <a href="#">
                                        <img src="{{ asset('assets/images/xs/avatar1.jpg') }}" alt="avatar" />
                                        <div class="about">
                                            <div class="name">{{ App\User::where('UserId','=',$message->From)->get()[0]->name }}</div>
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
                                        {{-- <div class="chat-with"></div> --}}
                                        <div class="chat-with">{{App\User::where('UserId','=',$message->From)->get()[0]->name }}</div>
                                        <div class="chat-num-messages"><small>ProjectId:<a href="{{ route('singleProject',[$projectId]) }}">{{ $projectId }}</a></small></div>
                                    </div>
                                </div>
                                <div class="setting">
                                    @if($payment=='By Project') 
                                        <a href="#" class="btn btn-success"><i class="fa fa-gift"></i>&nbsp; Paid By Project</a>
                                    @endif
                                    @if($payment=='By Milestone') 
                                        <a href="#" class="btn btn-success"><i class="fa fa-gift"></i>&nbsp; Create MileStone</a>
                                    @endif
                                    @if($payment=='Paid Hourly') 
                                    <a href="#" class="btn btn-success"><i class="fa fa-gift"></i>&nbsp;Track Hours</a>
                                @endif
                                    
                                </div>
                                <a href="javascript:void(0);" class="list_btn btn btn-info btn-round float-md-right"><i class="zmdi zmdi-comments"></i></a>
                            </div>
                            <hr>
                            <ul class="chat-history">
                              @foreach($myMessages as $message)
                             @if($message->From == Auth::user()->UserId)
                                @if($message->Attachment==3)
                                <div class="card w_data_1">
                                    <div class="body" style="border:2px solid red; background-color:whitesmoke">
                                      Congratulations!!! You Have Accepted {{ $message->To }} Project. You Can Now Start Working<br>
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
                                 <div class="card w_data_1">
                                     <div class="body" style="border:2px solid red; background-color:whitesmoke">
                                        @if(Session::has('error'))
                                    <div class="aler alert-danger">
                                        <a href="#" class="close" data-dismiss="alert">&times;</a>
                                        {{ Session::get('error') }}
                                    </div>
                                @endif
                                        {{ $message->From }} Has Offered The Project To You. Do You Accept?<br>
                                     <a href="{{ route('accept',[$ChatId]) }}" class="btn btn-success">Yes</a>
                                     <a href="{{ route('reject',[$ChatId]) }}" class="btn btn-danger">No</a>
                                     </div>
                                 </div>
                             @endif
                         @else
                            <li>
                                <div class="status message-data">
                                    <span class="name"><small>{{ $message->From }}</small></span>
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
                                        <input type="hidden" name="To" value="{{ $from->UserId }}" required>
                                        <input type="text" class="form-control" placeholder="Type Your Message To {{App\User::where('UserId','=',$message->To)->get()[0]->name }}" id="message" name="Message" required>
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