@extends('layouts.user')
@section('content')
<section class="content">
    @if(Session::has('error'))
        <div class="alert alert-danger">
            {{ Session::get('error') }}
        </div>
    @endif
    @if(Session::has('success'))
    <div class="alert alert-success">
        {{ Session::get('success') }}
    </div>
@endif
    <h6 class="text-center">Hours Tracking</h6>
    <div class="container">
        <table class="table table-hover table-condensed table-bordered table-success table-striped">
            <thead class="text-center">
                <th>Hours</th>
                <th>Amount</th>
                <th>Status</th>
            </thead>
            <tbody>
                @foreach ($hours as $hour)
                    <tr class="text-center">
                        <td>{{ $hour->Hours }} Hours</td>
                        <td>{{ $hour->Amount }} Btc</td>
                        @if($hour->Status==0)
                            <td><button class="btn btn-danger">Pending Approval</button></td>
                        @else
                            <td><button class="btn btn-primary">Approved</button></td>
                        @endif
                        @if($owner==Auth::user()->UserId)
                            @if($hour->Status==0)
                                <td><button class="btn btn-warning" onclick="document.getElementById('approve').submit()">Approve</button></td>
                                <form method="post" action="{{ route('approve',[$hour->ProjectId]) }}" id="approve">
                                    @csrf
                                </form>
                            @else    
                            @endif
                        @endif
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</section>
@stop