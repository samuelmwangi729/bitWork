@extends('layouts.user')
@section('content')
<section class="content">
    <div class="body">
        <div class="col-sm-12">
            <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                <thead>
                    <tr>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($projects  as  $project )
                    <tr>
                        <td><a href="{{ route('singleProject',[$project->ProjectId]) }}" style="display:block;color:black">{{ $project->ProjectTitle }}<br>{{ $project->Description }}</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</section>
@stop