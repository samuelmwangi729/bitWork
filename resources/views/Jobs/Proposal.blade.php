@extends('layouts.user')
@section('content')
<section class="content">
    @if(Session::has('error'))
    <div class="alert alert-danger">
        <a href="#" class="close" data-dismiss="alert">&times;</a>
            {{Session::get('error')}}
    </div>
    @endif
    <h3>Submit Your Proposal for the Project <u style="color:red">{{ $project->ProjectTitle }}</u></h3><br>
    Project Budget: <b>{{ $project->Budget }}</b><br>
    <form method="POST" action="{{ route('proposal.post',[$project->ProjectId]) }}" enctype="multipart/form-data" id="form">
        @csrf
          <div class="row">
              <!--Start col-->
              <div class="col-sm-6">
                  <div class="form-group">
                      <label for="Budget" class="label-control">Your Budget</label>
                      <input type="number" class="form-control  @error('Budget') form-control-danger @enderror" name="Budget" placeholder="eg. 0.5" title="We collect payments in terms of BTC. if you input 5, it will be 5 BTC">
                      @error('Budget')
                <span style="color:red">
                    Please Choose your Budget
                </span>
                @enderror
                  </div>
              </div>
              <!--End Col-->
               <!--Start col-->
               <div class="col-sm-6">
                <div class="form-group">
                    <label for="Time" class="label-control">Payment By Type</label>
                    <select class="form-control  search-select" data-placeholder="Select" name="PaidBy">
                    <option></option>
                    <option value="DVdfvfEo0">Paid Hourly</option>
                    <option value="fRuSScTym">By Project</option>
                    <option value="kO95REdCnh">By Milestone</option>
                </select>
                @error('PaidBy')
                <span style="color:red">
                    Please Choose How you want to be Paid
                </span>
                @enderror
                </div>
            </div>
            <!--End Col-->
            <!--Start col-->
            <div class="col-sm-12">
                <div class="form-group">
                    <label for="Time" class="label-control">Estimated Time Span</label>
                    <select class="form-control  search-select" data-placeholder="Select" name="ProjectTimespan">
                    <option></option>
                    <option value="DFL9VVdfvfEo0">Less then 1 Week</option>
                    <option value="fRdK4KuSScTym">Less than 1 Month</option>
                    <option value="rZztxi5vvZL9V">1 - 3 Months</option>
                    <option value="fWZroeyXmk6Er">3-6 Months</option>
                    <option value="CtZAZPvBDxlhH">6-12 Months</option>
                    <option value="noH8DoGPxYuV9">Over 1 Year</option>
                </select>
                @error('ProjectTimespan')
                <span style="color:red">
                    Please Choose your Project Budget
                </span>
                @enderror
                </div>
            </div>
            <!--End Col-->
             <!--Start col-->
             <div class="col-sm-12">
                <div class="form-group">
                    <label for="Budget" class="label-control">Drop Your Resume</label>
                    <input type="file" class="dropify" name="Resume" data-allowed-file-extensions="pdf">
                </div>
            </div>
            <!--End Col-->
             <!--Start col-->
            <!--End Col-->
          </div>
          <div class="row justify-content-center">
            <label for="Description" class="label-control"><i class="fa fa-pencil"></i>&nbsp;Project Descrition</label>
            <textarea class="form-control" style="width:96%;height:100px" name="ProposalDescription"></textarea>
            @error('ProposalDescription')
            <span style="color:red">
                Please Write your Proposal Descrition
            </span>
            @enderror            
        </div>
        <div class="row justify-content-center">
            <button class="btn" type="submit" style="background-color:#f2174f"onclick="document.getElementById('form').submit()">Send Proposal</button>
        </div>
      </form>
</section>
@stop