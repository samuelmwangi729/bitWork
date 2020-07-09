@extends('layouts.app')

@section('content')
<div class="container" style="padding-top:100px;padding-bottom:100px">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card" style="width:100%;border-radius:30px">
                <div class="card-header text-center text-white" style="border-radius:200px;background-color:#f1184f !important"><b>{{ __('Login') }} To Your Account</b></div>
                <div class="card-body">
                    <form action="{{ route('login') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-sm-6">
                                <!--Start Form Group-->
                                <div class="form-group">
                                    <label for="names" class="label-control" style="color:#f2174f">
                                        <i class="fa fa-envelope"></i>&nbsp; {{ __('E-Mail Address') }}
                                    </label>
                                    <input type="text" class="form-control @error('email') is-invalid @enderror" name="email">
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>
                                <!--End form group-->
                            </div>
                            <div class="col-sm-6">
                                <!--Start Form Group-->
                                <div class="form-group">
                                <label for="names" class="label-control" style="color:#f2174f">
                                    <i class="fa fa-envelope"></i>&nbsp; {{ __('Password') }}
                                </label>
                                <input type="password" class="form-control  @error('email') is-invalid @enderror"  name="password">
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            </div>
                            <!--End form group-->
                            </div>
                           
                        </div>
                        <div class="row justify-content-center">
                            <button class="btn" type="submit" style="background-color:#f1184f;color:white">Login</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
