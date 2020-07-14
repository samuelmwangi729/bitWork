@extends('layouts.user')
@section('content')
<!-- Main Content -->

<section class="content">
    <div class="">
        <div class="block-header">
            @if(Session::has('error'))
                <div class="alert alert-danger">
                    <a href="#" class="close" data-dismiss="alert">&times;</a>
                    {{ Session::get('error') }}
                </div>
            @endif
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>Dashboard</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html"><i class="zmdi zmdi-home"></i> {{config('app.name')}}</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
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
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="card widget_2 big_icon zmdi-balance-wallet">
                        <div class="body">
                            <h6>Earning</h6>
                            <h2 style="color:gold">{{ $earning }} <small class="info"><i class="fa fa-bitcoin" style="color:gold;font-size:40px"></i></small></h2>
                            <small>In Terms Of BitCoins</small>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="card widget_2 big_icon zmdi-edit">
                        <div class="body">
                            <h6>Proposals</h6>
                            <h2>{{ $proposals }}<small class="info"><i class="ti-write" style="color:gold;font-size:40px"></i></small></h2>
                            <small>Total Sent Proposals</small>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="card widget_2 big_icon email">
                        <div class="body">
                            <h6>Messages</h6>
                            <h2>{{ $messages }} <small class="info"><i class="fa fa-comment" style="color:gold;font-size:40px"></i></small></h2>
                            <small>Total Received Messages</small>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="card widget_2 big_icon zmdi-bookmark">
                        <div class="body">
                            <h6>Jobs In<br>Progress</h6>
                            <h2>{{ $contracts }}<small class="info"><i class="fa fa-bookmark" style="color:gold;font-size:40px"></i></small></h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@stop