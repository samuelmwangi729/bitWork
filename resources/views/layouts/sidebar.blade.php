<!-- Left Sidebar -->
<aside id="leftsidebar" class="sidebar">
    <div class="navbar-brand">
        <button class="btn-menu ls-toggle-btn" type="button"><i class="zmdi zmdi-menu"></i></button>
        <a href="index.html"><img src="{{ asset('img/logo.png') }}" alt="{{config('app.name')}}"></a>
    </div>
    <div class="menu">
        <ul class="list">
            <li>
                <div class="user-info">
                    <a href="{{ route('account') }}" title="My Account"><img class="img-responsive" src="{{ asset('assets/images/profile_av.jpg') }}" width="75px" alt="{{ config('app.name') }}"></a>
                    <div class="detail">
                        <h6>{{ Auth::user()->name }}</h6>
                        <small>My Profile</small>                        
                    </div>
                </div>
            </li>
            <li class="active open"><a href="{{ route('home') }}"><i class="fa fa-home"></i><span>Dashboard</span></a></li>
            <li><a href="javascript:void(0);" class="menu-toggle"><i class="fa fa-folder"></i><span>My Projects</span></a>
                <ul class="ml-menu">
                    <li><a href="/Post/Project">Post A Project</a></li>
                    <li><a href="/Projects/View">View Projects</a></li>
                    <li><a href="/Completed/Projects">Completed Projects</a></li>
                </ul>
            </li>  
            <li><a href="javascript:void(0);" class="menu-toggle"><i class="fa fa-briefcase"></i><span>Browse Jobs</span></a>
                <ul class="ml-menu">
                    <li><a href="mail-inbox.html">Email</a></li>
                    <li><a href="chat.html">Chat Apps</a></li>
                    <li><a href="events.html">Calendar</a></li>
                    <li><a href="contact.html">Contact</a></li>                    
                </ul>
            </li>  
            <li><a href="javascript:void(0);" class="menu-toggle"><i class="fa fa-credit-card"></i><span>Payments</span></a>
                <ul class="ml-menu">
                    <li><a href="mail-inbox.html">Email</a></li>
                    <li><a href="chat.html">Chat Apps</a></li>
                    <li><a href="events.html">Calendar</a></li>
                    <li><a href="contact.html">Contact</a></li>                    
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
                    <li><a href="mail-inbox.html">Email</a></li>
                    <li><a href="chat.html">Chat Apps</a></li>
                    <li><a href="events.html">Calendar</a></li>
                    <li><a href="contact.html">Contact</a></li>                    
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