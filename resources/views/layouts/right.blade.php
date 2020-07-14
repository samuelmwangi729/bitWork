<!-- Right Icon menu Sidebar -->
<div class="navbar-right">
    <ul class="navbar-nav">
        <li class="dropdown">
            <a href="javascript:void(0);" class="dropdown-toggle" title="Notifications" data-toggle="dropdown" role="button"><i class="zmdi zmdi-notifications"></i>
                <div class="notify"><span class="heartbit"></span><span class="point"></span></div>
            </a>
            <ul class="dropdown-menu slideUp2">
                <li class="header">Notifications</li>
                <li class="body">
                    <ul class="menu list-unstyled">
                        <li>
                            <a href="javascript:void(0);">
                                <div class="icon-circle bg-blue"><i class="zmdi zmdi-account"></i></div>
                                <div class="menu-info">
                                    <h4>8 New Members joined</h4>
                                    <p><i class="zmdi zmdi-time"></i> 14 mins ago </p>
                                </div>
                            </a>
                        </li>

                    </ul>
                </li>
                <li class="footer"> <a href="javascript:void(0);">View All Notifications</a> </li>
            </ul>
        </li>
        <li class="dropdown">
            <a href="javascript:void(0);" class="dropdown-toggle" title="Proposals" data-toggle="dropdown" role="button"><i class="fa fa-edit"></i>
            </a>
            <ul class="dropdown-menu slideUp2">
                <li class="header">Proposals</li>
                <li class="body">
                    <ul class="menu list-unstyled">

                        @if(is_null(App\Proposal::where('UserId','=',Auth::user()->UserId)->get()))
                        @else
                            @foreach (App\Proposal::where('UserId','=',Auth::user()->UserId)->get() as $proposal )
                            <li>
                                <a href="javascript:void(0);">
                                    <div class="icon-circle"><span class="ti-write" style="color:red;padding-top:20px;font-size:30px"></span></div>
                                    <div class="menu-info">
                                        <h6>Project ID: {{ $proposal->ProjectId }}</h6>
                                        <p><i class="zmdi zmdi-time"></i> {{ ($proposal->created_at)->toFormattedDateString() }} &nbsp; <i class="fa fa-bitcoin" style="color:gold;font-size:20px"></i>&nbsp;{{ $proposal->Budget }} BTC</p>
                                    </div>
                                </a>
                            </li>
                            @endforeach
                        @endif
                    </ul>
                </li>
                <li class="footer"> <a href="{{ route('proposed') }}">View All Proposals</a> </li>
            </ul>
        </li>
        <!-- End Proposal-->
        <!--start Contract-->
        <li class="dropdown">
            <a href="javascript:void(0);" class="dropdown-toggle" title="Contracts" data-toggle="dropdown" role="button"><i class="fa fa-file"></i>
            </a>
            <ul class="dropdown-menu slideUp2">
                <li class="header">Contracts</li>
                <li class="body">
                    <ul class="menu list-unstyled">
                        @if(is_null(App\Projects::where('AwardedTo','=',Auth::user()->UserId)->get()))
                        @else
                            @foreach (App\Projects::where('AwardedTo','=',Auth::user()->UserId)->get() as $contract )
                            <li>
                                <a href="javascript:void(0);">
                                    <div class="icon-circle"><span class="ti-bookmark-alt" style="color:red;padding-top:20px;font-size:30px"></span></div>
                                    <div class="menu-info">
                                        <h4>{{ $contract->ProjectTitle }}</h4>
                                        <p><i class="fa fa-bitcoin" style="color:gold;font-size:20px"></i> &nbsp; {{ $contract->Budget }}</p>
                                    </div>
                                </a>
                            </li>
                            @endforeach
                        @endif
                    </ul>
                </li>
                <li class="footer"> <a href="{{ route('running') }}">View All Contracts</a> </li>
            </ul>
        </li>
        <!--End Contract-->
         <!--start Messages-->
         <li class="dropdown">
            <a href="javascript:void(0);" class="dropdown-toggle" title="Messages" data-toggle="dropdown" role="button"><i class="fa fa-envelope"></i>
            </a>
            <ul class="dropdown-menu slideUp2">
                <li class="header">Sent Messages</li>

                <li class="body">
                    <ul class="menu list-unstyled">
                        @foreach (App\MessagesSender::where('From','=',Auth::user()->UserId)->get() as  $sentMessage)
                        <li>
                            <a href="{{ route('Tomessage',[$sentMessage->ChatId]) }}">
                                <div class="icon-circle bg-red"><i class="fa fa-envelope"></i></div>
                                <div class="menu-info">
                                    <h4>{{ $sentMessage->To }}</h4>
                                    <p><i class="zmdi zmdi-time"></i> {{ ($sentMessage->created_at)->toFormattedDateString() }} </p>
                                </div>
                            </a>
                        </li>
                            {{-- @foreach (App\Messages::where('From','=',$sentMessage->From)->get()->take(1) as $messages)   
                            
                            @endforeach --}}
                        @endforeach
                        <li class="header">Received Messages</li>
                        @foreach (App\MessagesSender::where('To','=',Auth::user()->UserId)->get() as  $toMe)
                            @foreach (App\Messages::where('ChatId','=',$toMe->ChatId)->get()->take(1) as $messages)
                                <li>
                                    <a href="{{ route('messageFrom',[$toMe->ChatId]) }}">
                                        <div class="icon-circle bg-red"><i class="fa fa-envelope"></i></div>
                                        <div class="menu-info">
                                            <h4>{{ $toMe->From }}</h4>
                                            <p><i class="zmdi zmdi-time"></i> {{ ($toMe->created_at)->toFormattedDateString() }} </p>
                                        </div>
                                    </a>
                                </li>
                            @endforeach
                        @endforeach
                    </ul>
                </li>
                <li class="footer"> <a href="javascript:void(0);">View All Messages</a> </li>
            </ul>
        </li>
        <li class="dropdown">
            <a href="javascript:void(0);" class="dropdown-toggle" title="Help" data-toggle="dropdown" role="button"><i class="fa fa-exclamation-circle"></i>
            </a>
        </li>
        <li class="dropdown">
            <a href="javascript:void(0);" class="dropdown-toggle" title="Support" data-toggle="dropdown" role="button"><i class="fa fa-question-circle"></i>
            </a>
        </li>
        <li class="dropdown">
            <a href="javascript:void(0);" class="dropdown-toggle" title="Community" data-toggle="dropdown" role="button"><i class="fa fa-users"></i>
            </a>
        </li>
    </ul>
</div>