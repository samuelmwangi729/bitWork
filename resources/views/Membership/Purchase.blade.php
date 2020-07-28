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
            <form action="https://bitpay.com/checkout" method="post">
                <input type="hidden" name="action" value="checkout" />
                <input type="hidden" name="posData" value="" />
                <input type="hidden" name="data" value="LANrxBDSfnvnl7guAYWHa6Rb4U8++mImui2wB+nW0KwftyM/oyg7OGW0j0NK+0I3sAVt+MxiaPm9dA/Gm/pN47QWhwOJCBuM2PcNozIpgVrFGDq2QUg4QDw5o6tFODxt61B4ZWASwYs4ynz0veKFISyrjc/eQKZUhS/wZhnAZt3p1Yu19OX50kYEObLicCq7qsSYY+1rlMzAHmlCcwmzkw==" />
                <input type="image" src="https://bitpay.com/cdn/en_US/bp-btn-pay-currencies.svg" name="submit" style="width: 146px" alt="BitPay, the easy way to pay with bitcoins.">
              </form>
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