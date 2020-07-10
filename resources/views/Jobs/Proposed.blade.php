@extends('layouts.user')
@section('content')
<section class="content">
    @if(Session::has('error'))
    <div class="alert alert-danger">
        <a href="#" class="close" data-dismiss="alert">&times;</a>
        {{ Session::get('error') }}
    </div>
    @endif
    @if(Session::has('success'))
    <div class="alert alert-success">
        <a href="#" class="close" data-dismiss="alert">&times;</a>
        {{ Session::get('success') }}
    </div>
    @endif
    <div class="body">
        <div class="col-sm-12">
            <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                <thead>
                    <tr>
                        <th>ProjectId</th>
                        <th>Project Title</th>
                    </tr>
                </thead>
                <tbody>
                    @for($i=0;$i<count($projects);$i++)
                    @foreach ($projects[$i]  as  $project )
                    <tr>
                        <td><a href="{{ route('singleJob',[$project->ProjectId]) }}" style="display:block;color:black">{{ $project->ProjectId }}</a></td>
                        <td><a href="{{ route('singleJob',[$project->ProjectId]) }}" style="display:block;color:black">{{ $project->ProjectTitle }}</a> <span class="pull-right"><a href="{{ route('retract',[$project->ProjectId]) }}"><div class="badge badge-info">Retract Proposal</div></a></span></td>
                    </tr>
                    @endforeach
                    @endfor
                </tbody>
            </table>
        </div>
</section>
@stop