@extends('layouts.user')
@section('content')
<section class="content">
    <h4 class="text-center">
        Purchase Membership
    </h4>
    @if($message)
    <div class="container alert alert-danger">
        <a href="#" class="close" data-dismiss="alert">&times;</a>
        {{ $message }}
    </div>
    @endif
    <div class="body">
        <p>Kindly Choose The Appropriate Way to Pay for your  <b>{{ $uProfile }}</b> Membership</p>
        <div class="panel-group" id="accordion_1" role="tablist" aria-multiselectable="true">
            @foreach($platforms as $platform)
            @if($platform->Platform=='BitCoins')
            <a href="#" class="btn btn-warning" style="background-color:gold"><i class="fa fa-bitcoin"></i> Pay with {{ $platform->Platform }}</a>
            @elseif($platform->Platform=='Paypal')
            <a href="{{ route('paypal',[$uProfile]) }}" class="btn btn-warning"><i class="fa fa-paypal" style="color:blue"></i> Pay with {{ $platform->Platform }}</a>
            @elseif($platform->Platform=='Skrill')
            <a href="#" class="btn btn-warning" style="background-color:purple"><i class="fa fa-money"></i> Pay with {{ $platform->Platform }}</a>
            @else
            <a href="#" class="btn btn-warning"><i class="fa fa-credit-card"></i> Pay with {{ $platform->Platform }}</a>
            @endif
            @endforeach
        </div>
    </div>
</section>
@endsection