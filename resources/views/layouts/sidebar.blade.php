<!-- Left Sidebar -->
<aside id="leftsidebar" class="sidebar">
    <div class="navbar-brand">
        <button class="btn-menu ls-toggle-btn" type="button"><i class="zmdi zmdi-menu"></i></button>
        <a href="/Dashboard/Index"><img src="{{ asset('img/logo.png') }}" alt="{{config('app.name')}}"></a>
    </div>
    <div class="menu">
        <ul class="list">
            <li>
                <div class="user-info">
                    {{-- make sure that the image is there, if the image is null, then, there must be the default image --}}
                    @if(is_null(App\Accounts::where('UserId','=',Auth::user()->UserId)->get()->first()->Profile ))
                    <a href="{{ route('account') }}" title="My Account"><img class="img-responsive" src="{{asset('assets/images/default.png')}}" width="75px" alt="{{ config('app.name') }}">
                    </a>
                    @else
                    <a href="{{ route('account') }}" title="My Account"><img class="img-responsive" src="{{ asset(App\Accounts::where('UserId','=',Auth::user()->UserId)->get()->first()->Profile ) }}" width="75px" alt="{{ config('app.name') }}">
                    </a>
                    @endif
                    <div class="detail">
                        <h6>{{ Auth::user()->name }}</h6>
                        <small>My Profile</small>                        
                    </div>
                </div>
            </li>
            <li class="active open"><a href="{{ route('home') }}"><i class="fa fa-home"></i><span>Dashboard</span></a></li>
            @if(Auth::user()->AccountType==0)
            <li>
                <a href="javascript:void(0);" class="menu-toggle"><i class="fa fa-folder"></i><span>My Projects</span></a>
                <ul class="ml-menu">
                    <li><a href="{{ route('projects.add') }}">Post A Project</a></li>
                    <li><a href="{{ route('projects.view') }}">View Projects</a></li>
                    <li><a href="{{ route('projects.completed') }}">Completed Projects</a></li>
                </ul>
            </li>  
            <li>
                <a href="javascript:void(0);" class="menu-toggle"><i class="fa fa-folder"></i><span>Deposit</span></a>
                <ul class="ml-menu">
                    <li><a href="{{ route('projects.add') }}">Deposit</a></li>
                    <li><a href="{{ route('projects.view') }}">Check Balance</a></li>
                    <li><a href="{{ route('projects.completed') }}">Print Statements</a></li>
                </ul>
            </li>  
            @endif
            @if(Auth::user()->AccountType==1)
            <li>
                <a href="javascript:void(0);" class="menu-toggle"><i class="fa fa-cog"></i><span>Settings</span></a>
                <ul class="ml-menu">
                    <li><a href="{{ route('MembershipProfiles') }}">Manage  Profiles</a></li>
                    <li><a href="{{ route('payments') }}">Manage  Payment Methods</a></li>
                </ul>
            </li>  
            @endif
            <li><a href="javascript:void(0);" class="menu-toggle"><i class="fa fa-briefcase"></i><span>Browse Jobs</span></a>
                <ul class="ml-menu">
                    <li><a href="{{ route('jobs') }}">View Jobs</a></li>
                    <li><a href="{{ route('proposed') }}">My Jobs</a></li>
                    <li><a href="{{ route('running') }}">Running Jobs</a></li>                
                </ul>
            </li>  
            <li><a href="javascript:void(0);" class="menu-toggle"><i class="fa fa-credit-card"></i><span>Payments</span></a>
                <ul class="ml-menu">
                    <li><a href="{{ route('statement') }}">Payments Statement</a></li>
                    <li><a href="{{ route('withdraw') }}">Withdraw Earnings</a></li>                    
                    <li><a href="{{ route('withdraw') }}">View Purchases</a></li>                    
                    <li><a href="contact.html">Letter of Earning</a></li>                    
                    <li><a href="contact.html">Print Statement</a></li>                    
                </ul>
            </li>    
            <li><a href="javascript:void(0);" class="menu-toggle"><i class="fa fa-cog"></i><span>Settings</span></a>
                <ul class="ml-menu">
                    <li><a href="mail-inbox.html">Email</a></li>
                    <li><a href="chat.html">Chat Apps</a></li>
                    <li><a href="events.html">Calendar</a></li>
                    <li><a href="contact.html">Contact</a></li>                    
                </ul>
            </li>  
            <li><a href="javascript:void(0);" class="menu-toggle"><i class="fa fa-user"></i><span>My Profile</span></a>
                <ul class="ml-menu">
                    <li><a href="/Account/Index>Profile</a></li>
                    <li><a href="chat.html">Security</a></li>                  
                </ul>
            </li>  
            <li>
                <a  href="{{ route('logout') }}" class="fa fa-power-off"
                                    onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </li>    
        </ul>
    </div>
</aside>