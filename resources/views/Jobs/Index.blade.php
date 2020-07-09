@extends('layouts.user')
@section('content')
<section class="content" style="background-color:#ffffff !important">
    <div class="body">
        <div class="col-sm-12">
            <table class="table  table-condensed table-hover dataTable js-exportable">
                <thead>
                    <tr>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($projects  as  $project )
                    <tr>
                        <td><a href="{{ route('singleProject',[$project->ProjectId]) }}" style="display:block;color:black">
                           <h6 class="text-center" style="text-decoration:underline;color:#f2174f"> {{ $project->ProjectTitle }}  <span class="pull-right"><i class="fa fa-heart" style="color:#f2174f;font-size:25px"></i></span></h6><br>
                            <span style="font-weight:bold">{{ $project->Description }}</span>
                        </a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</section>
@stop