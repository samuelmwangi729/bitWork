<!doctype html>
<html class="no-js " lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
<meta name="description" content="Responsive Bootstrap 4 and web Application ui kit.">
<title>{{config('app.name')}} Home</title>
<link rel="icon" href="{{  asset('img/logo.png')  }}" type="image/x-icon"> <!-- Favicon-->
<link rel="stylesheet" href="{{ asset('assets/plugins/bootstrap/css/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{asset('assets/plugins/dropify/css/dropify.min.css')}}">
<link rel="stylesheet" href="{{ asset('assets/plugins/jvectormap/jquery-jvectormap-2.0.3.min.css') }}"/>
<link rel="stylesheet" href="{{ asset('assets/plugins/charts-c3/plugin.css') }}"/>
<link rel="stylesheet" href="{{ asset('assets/plugins/bootstrap-select/css/bootstrap-select.css') }}" />
<!-- Select2 -->
<link rel="stylesheet" href="{{ asset('assets/plugins/select2/select2.css') }}" />
<link rel="stylesheet" href="{{ asset('assets/plugins/morrisjs/morris.min.css') }}" />
<!-- Custom Css -->
<link rel="stylesheet" href="{{ asset('assets/css/style.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}" />
<link rel="stylesheet" href="{{ asset('css/summernote.min.css') }}" />
<style>
#nav-link {
    color: #f2174f;
    font-weight: bold;
    font-size:15px;
    background-color: #eaefe9;
    display: inline;
}

.navbar {
    background-color: #eaefe9;
}

#nav-link:hover {
    color: white;
    background-color: #f2174f;
    border-radius: 20px
}
</style>
</head>

<body class="theme-blush">

<!-- Page Loader -->
<div class="page-loader-wrapper">
    <div class="loader">
        <div class="m-t-30"><img class="zmdi-hc-spin" src="assets/images/logo.png" width="48" height="48" alt="Aero"></div>
        <p>Please wait...</p>
    </div>
</div>
<section class="container">
    <div class="body_scroll">
        <div class="row">
            @include('layouts.nav') 
        </div>
        <div class="row-fluid">
            <div class="row clearfix" style="margin-top:100px !important">
                <div class="col-sm-3">
                    <div class="card pricing pricing-item" style="border:3px solid purple;border-radius:10px">
                        <div class="pricing-deco" style="background-color:purple">
                            <svg class="pricing-deco-img" enable-background="new 0 0 300 100" height="100px" id="Layer_1" preserveAspectRatio="none" version="1.1" viewBox="0 0 300 100" width="300px" x="0px" xml:space="preserve" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg" y="0px">
                                <path class="deco-layer deco-layer--1" d="M30.913,43.944c0,0,42.911-34.464,87.51-14.191c77.31,35.14,113.304-1.952,146.638-4.729&#x000A;	c48.654-4.056,69.94,16.218,69.94,16.218v54.396H30.913V43.944z" fill="#FFFFFF" opacity="0.6"></path>
                                <path class="deco-layer deco-layer--2" d="M-35.667,44.628c0,0,42.91-34.463,87.51-14.191c77.31,35.141,113.304-1.952,146.639-4.729&#x000A;	c48.653-4.055,69.939,16.218,69.939,16.218v54.396H-35.667V44.628z" fill="#FFFFFF" opacity="0.6"></path>
                                <path class="deco-layer deco-layer--3" d="M43.415,98.342c0,0,48.283-68.927,109.133-68.927c65.886,0,97.983,67.914,97.983,67.914v3.716&#x000A;	H42.401L43.415,98.342z" fill="#FFFFFF" opacity="0.7"></path>
                                <path class="deco-layer deco-layer--4" d="M-34.667,62.998c0,0,56-45.667,120.316-27.839C167.484,57.842,197,41.332,232.286,30.428&#x000A;	c53.07-16.399,104.047,36.903,104.047,36.903l1.333,36.667l-372-2.954L-34.667,62.998z" fill="#FFFFFF"></path>
                            </svg>
                            <div class="pricing-price"><span class="pricing-currency"><i class="fa fa-bitcoin"></i></span>{{ $plans[0]->Amount ?? '0.0' }}<span class="pricing-period">/ mo</span>
                            </div>
                            <h3 class="pricing-title">{{ config('app.name') }} {{ $plans[0]->Profile ?? 'Basic'}}</h3>
                        </div>
                        <div class="body">
                            <ul class="feature-list list-unstyled">
                                <li><i class="fa fa-check pull-left" style="color:purple"></i>50 Bids Monthly</li>
                                <li><i class="fa fa-check pull-left" style="color:purple"></i>5 Bitcoins Trades Per Month</li>
                                <li><i class="fa fa-check pull-left" style="color:purple"></i>Single Billing Cycle Weekly</li>                            
                                <li><i class="fa fa-check pull-left" style="color:purple"></i>Fully Support</li>
                                <li><i class="fa fa-check pull-left" style="color:purple"></i>Withdraw Method BTC only</li>
                                <li><i class="fa fa-check pull-left" style="color:purple"></i>Bids Not Refundable</li>
                                <li><i class="fa fa-check pull-left" style="color:purple"></i>Withdrawal Limit <b>$500</b> in BTC</li>
                                <li><i class="fa fa-check pull-left" style="color:purple"></i><div class="badge badge-primary">New Member Badge</div></li>
                                <li><i class="fa fa-check pull-left" style="color:purple"></i><div class="badge badge-success">DEFAULT FOR NEW MEMBERS</div></li>
                                <li><button class="btn disabled" style="background-color:purple"><b>Current Plan</b></button></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="card pricing pricing-item" style="border:3px solid blue;border-radius:10px">
                        <div class="pricing-deco" style="background-color:blue">
                            <svg class="pricing-deco-img" enable-background="new 0 0 300 100" height="100px" id="Layer_1" preserveAspectRatio="none" version="1.1" viewBox="0 0 300 100" width="300px" x="0px" xml:space="preserve" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg" y="0px">
                                <path class="deco-layer deco-layer--1" d="M30.913,43.944c0,0,42.911-34.464,87.51-14.191c77.31,35.14,113.304-1.952,146.638-4.729&#x000A;	c48.654-4.056,69.94,16.218,69.94,16.218v54.396H30.913V43.944z" fill="#FFFFFF" opacity="0.6"></path>
                                <path class="deco-layer deco-layer--2" d="M-35.667,44.628c0,0,42.91-34.463,87.51-14.191c77.31,35.141,113.304-1.952,146.639-4.729&#x000A;	c48.653-4.055,69.939,16.218,69.939,16.218v54.396H-35.667V44.628z" fill="#FFFFFF" opacity="0.6"></path>
                                <path class="deco-layer deco-layer--3" d="M43.415,98.342c0,0,48.283-68.927,109.133-68.927c65.886,0,97.983,67.914,97.983,67.914v3.716&#x000A;	H42.401L43.415,98.342z" fill="#FFFFFF" opacity="0.7"></path>
                                <path class="deco-layer deco-layer--4" d="M-34.667,62.998c0,0,56-45.667,120.316-27.839C167.484,57.842,197,41.332,232.286,30.428&#x000A;	c53.07-16.399,104.047,36.903,104.047,36.903l1.333,36.667l-372-2.954L-34.667,62.998z" fill="#FFFFFF"></path>
                            </svg>
                            <div class="pricing-price"><span class="pricing-currency"><i class="fa fa-bitcoin"></i></span>{{ $plans[1]->Amount ?? '0.00' }} <span class="pricing-period">/ mo</span>
                            </div>
                            <h3 class="pricing-title">{{ config('app.name') }} {{ $plans[1]->Profile ?? 'Bronze' }}</h3>
                        </div>
                        <div class="body">
                            <ul class="feature-list list-unstyled">
                                <li><i class="fa fa-check pull-left" style="color:blue"></i>100 Bids Monthly</li>                            
                                <li><i class="fa fa-check pull-left" style="color:blue"></i>10 Bitcoins Trades Per Month</li>                            
                                <li><i class="fa fa-check pull-left" style="color:blue"></i>Double Billing Cycle Weekly</li>                            
                                <li><i class="fa fa-check pull-left" style="color:blue"></i>Full Support</li>                            
                                <li><i class="fa fa-check pull-left" style="color:blue"></i>Withdraw Method BTC only</li>                            
                                <li><i class="fa fa-check pull-left" style="color:blue"></i>Bids Not Refundable</li>                            
                                <li><i class="fa fa-check pull-left" style="color:blue"></i>Withdrawal Limit <b>$1000</b> in BTC</li>  
                                <li><i class="fa fa-check pull-left" style="color:blue"></i><div class="badge badge-primary">Bids Highlighted</div></li>
                                <li></li>
                                <li><button class="btn" style="background-color:blue" onclick="window.open('/Bronze','_parent')"><b>Choose plan</b></button></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="card pricing pricing-item" style="border:3px solid green;border-radius:10px">
                        <div class="pricing-deco" style="background-color:green">
                            <svg class="pricing-deco-img" enable-background="new 0 0 300 100" height="100px" id="Layer_1" preserveAspectRatio="none" version="1.1" viewBox="0 0 300 100" width="300px" x="0px" xml:space="preserve" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg" y="0px">
                                <path class="deco-layer deco-layer--1" d="M30.913,43.944c0,0,42.911-34.464,87.51-14.191c77.31,35.14,113.304-1.952,146.638-4.729&#x000A;	c48.654-4.056,69.94,16.218,69.94,16.218v54.396H30.913V43.944z" fill="#FFFFFF" opacity="0.6"></path>
                                <path class="deco-layer deco-layer--2" d="M-35.667,44.628c0,0,42.91-34.463,87.51-14.191c77.31,35.141,113.304-1.952,146.639-4.729&#x000A;	c48.653-4.055,69.939,16.218,69.939,16.218v54.396H-35.667V44.628z" fill="#FFFFFF" opacity="0.6"></path>
                                <path class="deco-layer deco-layer--3" d="M43.415,98.342c0,0,48.283-68.927,109.133-68.927c65.886,0,97.983,67.914,97.983,67.914v3.716&#x000A;	H42.401L43.415,98.342z" fill="#FFFFFF" opacity="0.7"></path>
                                <path class="deco-layer deco-layer--4" d="M-34.667,62.998c0,0,56-45.667,120.316-27.839C167.484,57.842,197,41.332,232.286,30.428&#x000A;	c53.07-16.399,104.047,36.903,104.047,36.903l1.333,36.667l-372-2.954L-34.667,62.998z" fill="#FFFFFF"></path>
                            </svg>
                            <div class="pricing-price"><span class="pricing-currency"><i class="fa fa-bitcoin"></i></span>{{ $plans[2]->Amount ?? '0' }} <span class="pricing-period">/ mo</span>
                            </div>
                            <h3 class="pricing-title">{{ config('app.name') }} {{ $plans[2]->Profile ?? 'Silver' }} </h3>
                        </div>
                        <div class="body">
                            <ul class="feature-list list-unstyled">
                                <li><i class="fa fa-check pull-left" style="color:green"></i>200 Bids Monthly</li>
                                <li><i class="fa fa-check pull-left" style="color:green"></i>30 Bitcoins Trades Monthly</li>
                                <li><i class="fa fa-check pull-left" style="color:green"></i>Triple Billing Cycle In a  Week</li>
                                <li><i class="fa fa-check pull-left" style="color:green"></i>Prioritized Full Support</li>
                                <li><i class="fa fa-check pull-left" style="color:green"></i>Withdraw in BTC and USD only</li>
                                <li><i class="fa fa-check pull-left" style="color:green"></i>Refundable Bids</li>
                                <li><i class="fa fa-check pull-left" style="color:green"></i>Withdrawal Limit $10,000 in USD or in BTC</li>
                                <li><i class="fa fa-check pull-left" style="color:green"></i><div class="badge badge-success">Sponsored Bid</div></li>
                                <li></li>
                                <li><button class="btn btn-default" style="background-color:green" onclick="window.open('/Silver','_parent')">Choose plan</button></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="card pricing pricing-item" style="border:3px solid gold;border-radius:10px">
                        <div class="pricing-deco" style="background-color:gold">
                            <svg class="pricing-deco-img" enable-background="new 0 0 300 100" height="100px" id="Layer_1" preserveAspectRatio="none" version="1.1" viewBox="0 0 300 100" width="300px" x="0px" xml:space="preserve" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg" y="0px">
                                <path class="deco-layer deco-layer--1" d="M30.913,43.944c0,0,42.911-34.464,87.51-14.191c77.31,35.14,113.304-1.952,146.638-4.729&#x000A;	c48.654-4.056,69.94,16.218,69.94,16.218v54.396H30.913V43.944z" fill="#FFFFFF" opacity="0.6"></path>
                                <path class="deco-layer deco-layer--2" d="M-35.667,44.628c0,0,42.91-34.463,87.51-14.191c77.31,35.141,113.304-1.952,146.639-4.729&#x000A;	c48.653-4.055,69.939,16.218,69.939,16.218v54.396H-35.667V44.628z" fill="#FFFFFF" opacity="0.6"></path>
                                <path class="deco-layer deco-layer--3" d="M43.415,98.342c0,0,48.283-68.927,109.133-68.927c65.886,0,97.983,67.914,97.983,67.914v3.716&#x000A;	H42.401L43.415,98.342z" fill="#FFFFFF" opacity="0.7"></path>
                                <path class="deco-layer deco-layer--4" d="M-34.667,62.998c0,0,56-45.667,120.316-27.839C167.484,57.842,197,41.332,232.286,30.428&#x000A;	c53.07-16.399,104.047,36.903,104.047,36.903l1.333,36.667l-372-2.954L-34.667,62.998z" fill="#FFFFFF"></path>
                            </svg>
                            <div class="pricing-price"><span class="pricing-currency"><i class="fa fa-bitcoin"></i></span>{{ $plans[3]->Amount ??  '0' }}<span class="pricing-period">/ mo</span>
                            </div>
                            <h3 class="pricing-title"> {{ config('app.name') }} {{ $plans[3]->Profile  ?? 'Gold'}}</h3>
                        </div>
                        <div class="body">
                            <ul class="feature-list list-unstyled">
                                <li><i class="fa fa-check pull-left" style="color:gold"></i>Ulimited Bids Monthly</li>
                                <li><i class="fa fa-check pull-left" style="color:gold"></i>100 Bitcoins Trades Monthly</li>
                                <li><i class="fa fa-check pull-left" style="color:gold"></i>Withdrawal Processed Daily</li>
                                <li><i class="fa fa-check pull-left" style="color:gold"></i>Prioritized Full Support</li>
                                <li><i class="fa fa-check pull-left" style="color:gold"></i>Withdraw in BTC and USD Only</li>
                                <li><i class="fa fa-check pull-left" style="color:gold"></i>Bids Refundable</li>
                                <li><i class="fa fa-check pull-left" style="color:gold"></i>No Withdrawal Limit</li>
                                <li><i class="fa fa-check pull-left" style="color:gold"></i><div class="badge badge-warning">Preferred Freelancer Badge</div></li>
                                <li></li>
                                <li><button class="btn" style="background-color:gold" onclick="window.open('/Gold','_parent')">Choose plan</button></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@include('layouts.scripts') 
</body>


</html>