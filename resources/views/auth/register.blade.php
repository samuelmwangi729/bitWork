@extends('layouts.app')

@section('content')
<div class="row justify-content-center" style="padding-top:50px;padding-bottom:10px">
    <div class="card" style="width:70%">
       <div class="card-header">
           <h3 class="text-center">Create Your Account With {{ config('app.name') }}</h3>
       </div>
       <div class="card-body">
        <div class="form-group">
            @if($errors->all())
            <div class="alert alert-danger">
                <a href="#" class="close" data-dismiss="alert">&timesbar;</a>
                <ul style="list-style-type:dics">
                    @foreach ($errors->all() as $errors)
                    <li>{{ $errors }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <form action="{{ route('register') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-sm-6">
                        <!--Start Form Group-->
                        <div class="form-group">
                            <label for="names" class="label-control" style="color:#f2174f">
                                <i class="fa fa-tags"></i>&nbsp; 
                            </label>
                            <input type="text" class="form-control" placeholder="E.g John Doe" name="name">
                        </div>
                        <!--End form group-->
                    </div>
                    <div class="col-sm-6">
                        <!--Start Form Group-->
                        <div class="form-group">
                            <label for="names" class="label-control" style="color:#f2174f">
                                <i class="fa fa-envelope"></i>&nbsp; Email Address
                            </label>
                            <input type="text" class="form-control" placeholder="johndoe@example.com" name="email">
                        </div>
                        <!--End form group-->
                    </div>
                    <div class="col-sm-6">
                        <!--Start Form Group-->
                        <div class="form-group">
                        <label for="names" class="label-control" style="color:#f2174f">
                            <i class="fa fa-lock"></i>&nbsp; Password
                        </label>
                        <input type="password" class="form-control"  name="password">
                    </div>
                    <!--End form group-->
                    </div>
                    <div class="col-sm-6">
                        <!--Start Form Group-->
                        <div class="form-group">
                        <label for="names" class="label-control" style="color:#f2174f">
                            <i class="fa fa-lock"><sup><i class="fa fa-check" style="color:red"></i></sup></i>&nbsp; Confirm Password
                        </label>
                        <input type="password" class="form-control"  name="password_confirmation">
                    </div>
                    <!--End form group-->
                    </div>
                </div>
                <div class="row justify-content-center">
                  <select class="form-control text-center" style="width:50%" name="AccountType">
                      <option label="Choose Your Account Type"></option>
                      <option value="Freelancer">I AM A Freelancer</option>
                      <option value="Client">Looking For A Freelancer</option>
                  </select>
                </div>
                <br>
                <div class="row justify-content-center">
                    <button class="btn" type="submit" style="background-color:#f1184f;color:white">Register Your Account</button>
                </div>
            </form>
        </div>
    </div>
    </div>
</div>
@endsection
