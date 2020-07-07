<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta name="description" content="{{ config('app.name') }} is an online Freelancing Website which helps Clients and Freelancers work securely preserving their privacy through the modes of Payments.">
    <meta name="keywords" content="Freelancer,Freelancing,Online Work,Bitcoin,CryptoLancer"/>
    <title>BitWorq Platform - Access Anything On your Preserving Your Provacy - {{ config('app.name') }}</title>

    <!-- Site Icons -->
    <link rel="shortcut icon" href="#" type="image/x-icon" />
    <link rel="apple-touch-icon" href="#" />

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <!-- Pogo Slider CSS -->
    <link rel="stylesheet" href="css/pogo-slider.min.css" />
    <!-- Site CSS -->
    <link rel="stylesheet" href="css/style.css" />
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="css/responsive.css" />
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/custom.css" />
    <link rel="icon" href="{{ asset('img/logo.png') }}">
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->



    <!-- Fonts -->
</head>
<body id="home" data-spy="scroll" data-target="#navbar-wd" data-offset="98">

    <!-- LOADER -->
    <div id="preloader">
        <div class="loader">
            <img src="{{  asset('img/logo.png')  }}" alt="{{ config('app.name') }}" />
        </div>
    </div>
    <!-- end loader -->
    <!-- END LOADER -->

    <!-- Start header -->
    <header class="top-header">
        <nav class="navbar header-nav navbar-expand-sm">
            <div class="container-fluid" style="height:50px">
                <a class="navbar-brand" href="/"><img src="{{ asset('img/logo.png') }}" alt="{{ config('app.name') }}" height="60px"></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-wd" aria-controls="navbar-wd" aria-expanded="false" aria-label="Toggle navigation">
                    <span></span>
                    <span></span>
                    <span></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="navbar-wd">
                    <ul class="navbar-nav">
                        <li><a class="nav-link" href="/Freelancers" id="nav-link">Find Freelancers</a></li>
                        <li><a class="nav-link" href="/HowItWorks" id="nav-link">How It Works</a></li>
                        <li><a class="nav-link active" href="/Projects" id="nav-link">Find Projects</a></li>
						<li><a class="nav-link" href="/register" id="nav-link">Join Us</a></li>
                        <li><a class="nav-link" href="/login" id="nav-link">Login</a></li>
                        @if(Auth::check())
                        <li><a class="nav-link" href="/Dashboard/Index" id="nav-link">Account</a></li>
                        <li>
                            <a class="dropdown-item" href="{{ route('logout') }}" id="nav-link"
                                    onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <!--the main content goes here-->
    @yield('content')
       <!-- Start Footer -->
    <footer class="footer-box">
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                   <img src="{{ asset('img/f_logo.png') }}" alt="#" />
                   <h3 style="color:white;font-weight:bold;color:#f2174f" class="text-center">Contact Us</h3>
                   <ul class="text-center" style="color:white;list-style:none;">
                    <li><i class="fa fa-phone"></i> 0704922042</li>
                    <li><i class="fa fa-envelope"></i>mail@bitwork.com</li>
                </div>
                 <div class="col-sm-3">
                  <h3 class="text-center" style="color:white;font-weight:bold;color:#f2174f">Information</h3>
                  <ul class="text-center" style="color:white;list-style:none;">
                      <li>Fee and Charges</li>
                      <li>Privacy  Policies</li>
                      <li>FAQs</li>
                      <li>Membership Pollicy</li>
                  </ul>
                 </div>
                 <div class="col-sm-3">
                    <h3 class="text-center" style="color:white;font-weight:bold;color:#f2174f">Freelancers</h3>
                    <ul class="text-center" style="color:white;list-style:none;">
                        <li>Freelancers in India</li>
                        <li>Freelancers in USA</li>
                        <li>Freelancers in Britain</li>
                        <li>Freelancers in Kenya</li>
                    </ul>
                 </div>
                 <div class="col-sm-3">
                    <h3 class="text-center" style="color:white;font-weight:bold;color:#f2174f">Blog</h3>
                    <ul class="text-center" style="color:white;list-style:none;">
                        <li>Future of BlockChain</li>
                        <li>Future of BlockChain</li>
                        <li>Future of BlockChain</li>
                        <li>Future of BlockChain</li>
                    </ul>
                 </div>
            </div>
            
        </div>
    </footer>
    <!-- End Footer -->

    <div class="footer_bottom">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <p class="crp">© 2019 Business . All Rights Reserved.</p>
                    <ul class="bottom_menu">
                        <li><a href="#">Term of Service</a></li>
                        <li><a href="#">Privacy</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <a href="#" id="scroll-to-top" class="hvr-radial-out"><i class="fa fa-angle-up"></i></a>
    <!--end Content -->
      <!-- ALL JS FILES -->
      <script src="js/jquery.min.js"></script>
      <script src="js/popper.min.js"></script>
      <script src="js/bootstrap.min.js"></script>
      <!-- ALL PLUGINS -->
      <script src="js/jquery.magnific-popup.min.js"></script>
      <script src="js/jquery.pogo-slider.min.js"></script>
      <script src="js/slider-index.js"></script>
      <script src="js/smoothscroll.js"></script>
      <script src="js/form-validator.min.js"></script>
      <script src="js/contact-form-script.js"></script>
      <script src="js/isotope.min.js"></script>
      <script src="js/images-loded.min.js"></script>
      <script src="js/custom.js"></script>
      <script>
      /* counter js */
  
  (function ($) {
      $.fn.countTo = function (options) {
          options = options || {};
          
          return $(this).each(function () {
              // set options for current element
              var settings = $.extend({}, $.fn.countTo.defaults, {
                  from:            $(this).data('from'),
                  to:              $(this).data('to'),
                  speed:           $(this).data('speed'),
                  refreshInterval: $(this).data('refresh-interval'),
                  decimals:        $(this).data('decimals')
              }, options);
              
              // how many times to update the value, and how much to increment the value on each update
              var loops = Math.ceil(settings.speed / settings.refreshInterval),
                  increment = (settings.to - settings.from) / loops;
              
              // references & variables that will change with each update
              var self = this,
                  $self = $(this),
                  loopCount = 0,
                  value = settings.from,
                  data = $self.data('countTo') || {};
              
              $self.data('countTo', data);
              
              // if an existing interval can be found, clear it first
              if (data.interval) {
                  clearInterval(data.interval);
              }
              data.interval = setInterval(updateTimer, settings.refreshInterval);
              
              // initialize the element with the starting value
              render(value);
              
              function updateTimer() {
                  value += increment;
                  loopCount++;
                  
                  render(value);
                  
                  if (typeof(settings.onUpdate) == 'function') {
                      settings.onUpdate.call(self, value);
                  }
                  
                  if (loopCount >= loops) {
                      // remove the interval
                      $self.removeData('countTo');
                      clearInterval(data.interval);
                      value = settings.to;
                      
                      if (typeof(settings.onComplete) == 'function') {
                          settings.onComplete.call(self, value);
                      }
                  }
              }
              
              function render(value) {
                  var formattedValue = settings.formatter.call(self, value, settings);
                  $self.html(formattedValue);
              }
          });
      };
      
      $.fn.countTo.defaults = {
          from: 0,               // the number the element should start at
          to: 0,                 // the number the element should end at
          speed: 1000,           // how long it should take to count between the target numbers
          refreshInterval: 100,  // how often the element should be updated
          decimals: 0,           // the number of decimal places to show
          formatter: formatter,  // handler for formatting the value before rendering
          onUpdate: null,        // callback method for every time the element is updated
          onComplete: null       // callback method for when the element finishes updating
      };
      
      function formatter(value, settings) {
          return value.toFixed(settings.decimals);
      }
  }(jQuery));
  
  jQuery(function ($) {
    // custom formatting example
    $('.count-number').data('countToOptions', {
      formatter: function (value, options) {
        return value.toFixed(options.decimals).replace(/\B(?=(?:\d{3})+(?!\d))/g, ',');
      }
    });
    
    // start all the timers
    $('.timer').each(count);  
    
    function count(options) {
      var $this = $(this);
      options = $.extend({}, options || {}, $this.data('countToOptions') || {});
      $this.countTo(options);
    }
  });
      </script>
</body>
</html>
