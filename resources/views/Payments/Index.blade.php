@extends('layouts.user')
@section('content')
<section class="content">
    @if(Session::has('error'))
        <div class="alert alert-danger">
            <a href="#" class="close" data-dismiss="alert">&times;</a>
            {{ Session::get('error') }}
        </div>
    @endif
    <div class="table-responsive">
        <table class="table table-bordered">
            @if($counts==0)
            <div class="alert alert-danger">
                <strong>No Data Available</strong> Come Back Later
            </div>
            @else
            <caption>Payments Transactions Done in your Account</caption>
            <thead>
                <tr>
                    <th>PaymentId</th>
                    <th>Paid By</th>
                    <th>For the Project</th>
                    <th>Amount</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($statements  as $statement )
                    <tr>
                        <th scope="row">{{ $statement->PaymentId }}</th>
                        <td>{{ $statement->Client }}</td>
                        <td>{{ $statement->ProjectId }}</td>
                        <td>{{ $statement->Amount }}</td>
                    </tr>
                @endforeach
            </tbody>
            @endif
        </table>
    </div>
</section>
@stop