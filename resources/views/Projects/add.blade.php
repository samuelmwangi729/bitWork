@extends('layouts.user')
@section('content')
<section class="content">
<h3 class="text-center">Post A Project</h3>
@if(Session::has('success'))
<div class="alert alert-success">
    {{ Session::get('success') }}
</div>
@endif
<div class="form">
    <form method="post" action="{{ route('project.bpost') }}" enctype="multipart/form-data" id="form">
        @csrf
        <div class="row">
            <!--Start Cl-->
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="projectTitle" class="label-control"><i class="fa fa-tags"></i>&nbsp;Project Title</label>
                    <input type="text" class="form-control @error('ProjectTitle') form-control-danger @enderror" maxlength="500"  name="ProjectTitle" placeholder="Your Project Title: E.g Web Design">
                    @error('ProjectTitle')
                    <span style="color:red">
                       Choose your Project Title
                    </span>
                    @enderror
                </div>
            </div>
            <!--End Col-->
             <!--Start Cl-->
             <div class="col-sm-6">
                <div class="form-group">
                    <label for="Category" class="label-control"><i class="fa fa-list"></i>&nbsp;Project Category</label>
                    <select class="form-control  search-select @error('ProjectCategory') form-danger @enderror" data-placeholder="Select Category" name="ProjectCategory">
                        <option></option>
                        <option>IT & Programming</option>
                        <option>Web Design</option>
                        <option>Hacking</option>
                    </select>
                    @error('ProjectCategory')
                    <span style="color:red">
                       Choose Category
                    </span>
                    @enderror
                </div>
            </div>
            <!--End Col-->
             <!--Start Cl-->
             <div class="col-sm-6">
                <div class="form-group">
                    <label for="Budget" class="label-control"><i class="fa fa-money"></i>&nbsp;Project Budget</label>
                    <select class="form-control  search-select @error('ProjectBudget') form-control-danger @enderror" data-placeholder="Select" name="ProjectBudget">
                        <option></option>
                        <option>0.00001BTC-0.0001BTC</option>
                        <option>0.0001BTC-0.001BTC</option>
                        <option>0.001BTC-0.01BTC</option>
                        <option>0.01BTC-0.1BTC</option>
                        <option>0.1BTC-1BTC</option>
                        <option>Over 1BTC</option>
                    </select>
                    @error('ProjectBudget')
                    <span style="color:red">
                        Please Choose your Project Budget
                    </span>
                    @enderror
                </div>
            </div>
            <!--End Col-->
             <!--Start Cl-->
             <div class="col-sm-6">
                <div class="form-group">
                    <label for="projectTitle" class="label-control"><i class="fa fa-file"></i>&nbsp;Project File(Optional)</label>
                    <input type="file" class="form-control @error('ProjectFile') form-control-danger @enderror" name="ProjectFile">
                </div>
            </div>
            <!--End Col-->
        </div>
        <div class="row justify-content-center">
            <label for="Description" class="label-control"><i class="fa fa-pencil"></i>&nbsp;Project Descrition</label>
            <textarea  style="width:90%;height:300px" name="ProjectDescription" class="input-danger" style="border: 1px solid-red">
            </textarea>
            @error('ProjectDescription')
            <span style="color:red">
                Please Write your Project Descrition
            </span>
            @enderror            
        </div>
        <div class="row justify-content-center">
            <button class="btn" type="submit" style="background-color:#f2174f" onclick="document.getElementById('form').submit()">
                Post Project
            </button>
        </div>
    </form>
</div>
</section>
@endsection