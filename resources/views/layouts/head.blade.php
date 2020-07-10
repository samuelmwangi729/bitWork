<!doctype html>
<html class="no-js " lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
<meta name="description" content="Responsive Bootstrap 4 and web Application ui kit.">
<title>{{config('app.name')}} {{ Auth::user()->name }} Home</title>
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
</head>

<body class="theme-blush">

<!-- Page Loader -->
<div class="page-loader-wrapper">
    <div class="loader">
        <div class="m-t-30"><img class="zmdi-hc-spin" src="{{  asset('img/logo.png')  }}" alt="{{config('app.name')}}"></div>
        <p>Welcome  {{ Auth::user()->name }}, Loading Your {{ config('app.name') }}  Dashboard</p>
    </div>
</div>