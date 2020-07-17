@extends('layouts.user')
@section('content')
<section class="content">
    <div class="container">
        @if(Session::has('success'))
        <div class="alert alert-success">
            <a href="#" class="close" data-dismiss="alert">&times;</a>
            {{ Session::get('success') }}
        </div>
        @endif
        @if(Session::has('error'))
        <div class="alert alert-danger">
            <a href="#" class="close" data-dismiss="alert">&times;</a>
            {{ Session::get('error') }}
        </div>
        @endif
        <h5 class="text-center">Add Payment Platforms</h5>
        <div class="row">
            <div class="col-sm-6">
                <form method="post" action="{{ route('platform.post') }}" id="form">
                    @csrf
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="Platform" class="label-control">
                                    <i class="fa fa-money"></i> Payment Platform <br>@error('Platform') <span class="text-danger">
                                        @foreach($errors->all() as $error)
                                            {{ $error }}
                                        @endforeach
                                    </span> @enderror
                                </label>
                                <input type="text" class="form-control @error('Platform') form-control-danger @enderror" name="Platform" placeholder="Eg. Bitcoins">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="Platform" class="label-control">
                                    <i class="fa fa-address-book"></i> Payment Address
                                </label>
                                <input type="text"  class="form-control" name="Address" placeholder="Leave empty if No Adress">
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-primary" onclick="document.getElementById('form').submit()">Add Method</button>
                </form>
            </div>
            <div class="col-sm-6">
              <table class="table table-striped table-condensed table-hover table-bordered">
                  <thead>
                      <th>
                          Platform
                      </th>
                      <th>Address</th>
                      <th class="text-center">Action</th>
                  </thead>
                  <tbody>
                      @foreach($platforms as $platform)
                        <tr>
                            <td>{{ $platform->Platform }}</td>
                            <td>
                                @if(is_null($platform->Address))
                                    Via Api
                                @else
                                    {{ $platform->Address }}
                                @endif
                            </td>
                            <td><a href="#" class="fa fa-edit text-primary"></a>&nbsp; <a href="{{ route('platform.delete',[$platform->id]) }}" class="fa fa-trash text-danger"></a></td>
                        </tr>
                      @endforeach
                  </tbody>
              </table>
            </div>
        </div>
    </div>
</section>
@stop