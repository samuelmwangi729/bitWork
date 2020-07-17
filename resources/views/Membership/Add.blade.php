@extends('layouts.user')
@section('content')
<section class="content">
    <h4 class="text-center">Manage Memberships</h4>
    @if(Session::has('success'))
    <div class="alert alert-success">
        {{ Session::get('success') }}
    </div>
    @endif
    @if(Session::has('error'))
    <div class="alert alert-danger">
        {{ Session::get('error') }}
    </div>
    @endif
    <div class="row">
        <div class="col-sm-6">
            <h6 class="text-center">Add Membership Profile</h6>
          <form method="post" action="{{ route('plans.post') }}" id="form">
            @csrf
              <div class="container">
               <div class="row">
                      <div class="col-sm-6">
                    <div class="form-group">
                        <label class="label-control" for="profile">
                           <i class="fa fa-id-badge"></i> Profile Name @error('Profile')
                           <span style="color:red">*
                         </span>
                           @enderror
                        </label>
                        <input type="text" class="form-control @error('Profile') form-control-danger @enderror" name="Profile" placeholder="Eg. Bronze">
                    </div>
                  </div> 
                  <div class="col-sm-6">
                    <div class="form-group">
                        <label class="label-control" for="profile">
                           <i class="fa fa-money"></i> Profile Amount @error('Amount')
                           <span style="color:red">
                       *
                         </span>
                           @enderror
                        </label>
                        <input type="number" class="form-control @error('Amount') form-control-danger @enderror" name="Amount" placeholder="Eg. 0.0003">
                        
                    </div>
                  </div>
               </div>
                  <div class="container text-center">
                      <button class="btn btn-success" onclick="document.getElementById('form').submit()">
                          Add Profile
                      </button>
                  </div>
              </div>
          </form>
        </div>
        <div class="col-sm-6">
            <h6 class="text-center">Membership Plans</h6>
          <table class="table table-condensed table-striped table-bordered">
              <thead>
                  <th>Plan</th>
                  <th>Amount</th>
                  <th class="text-center">Action</th>
              </thead>
              <tbody>
                  @foreach($plans as $plan)
                  <tr>
                      <td>{{ $plan->Profile }}</td>
                      <td>{{ $plan->Amount }} <i class="fa fa-bitcoin"></i></td>
                      <td class="text-center"><a href="#" class="fa fa-edit text-primary"></a>&nbsp;<a href="{{ route('plans.delete',[$plan->id]) }}" class="fa fa-trash text-danger"></a></td>
                  </tr>
                  @endforeach
              </tbody>
          </table>
        </div>
    </div>
</section>
@endsection