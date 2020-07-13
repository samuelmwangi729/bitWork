<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{Projects,Proposal};
use Auth;
use Session;
class JobsController extends Controller
{
    public function index(){
         //the function returns projects owned by the logged In user
         $projects=Projects::where(
            [
                ['Status','=','0'],
                ['ClientId','!=',Auth::user()->UserId]
            ]
        )->get();
       return view('Jobs.Index')->with('projects',$projects);
    }
    public function show($id)
    {
        $project=Projects::where('ProjectId','=',$id)->get()->first();
        $proposals=Proposal::where([
            ['ProjectId','=',$id],
            ['Status','=','0']
        ])->get();
        if(is_null($proposals)){
            $pCount=0;
        }
        if(!is_null($proposals)){
            $pCount=$proposals->count();
        }
        $hasProposed=Proposal::where([
            ['UserId','=',Auth::user()->UserId],
            ['ProjectId','=',$id],
            ['Status','=',0]
        ])->get()->first();
        return view('Jobs.Single')
        ->with('ProposalsCount',$pCount)
        ->with('proposals',$proposals)
        ->with('hasProposed',$hasProposed)
        ->with('project',$project);
    }
    public function Proposal($id)
    {
        $project=Projects::where('ProjectId','=',$id)->get()->first();
        if(is_null($project)){
            Session::flash('error','No Such Project Available');
            return back();
        }
        $hasProposed=Proposal::where([
            ['UserId','=',Auth::user()->UserId],
            ['ProjectId','=',$id]
        ])->get()->first();
        if($hasProposed){
            $proposals=Proposal::where('ProjectId','=',$id)->get();
            if(is_null($proposals)){
                $pCount=0;
            }
            if(!is_null($proposals)){
                $pCount=$proposals->count();
            }
            $project=Projects::where('ProjectId','=',$id)->get()->first();
        return view('Jobs.Single')
        ->with('ProposalsCount',$pCount)
        ->with('proposals',$proposals)
        ->with('hasProposed',$hasProposed)
        ->with('project',$project);
        }
        return view('Jobs.Proposal')->with('project',$project);
    }

    protected function Contracts(){
        $projects=Projects::where(
            [
                ['Status','=','3'],
                ['AwardedTo','=',Auth::user()->UserId]
            ]
        )->get();
        return view('Jobs.Contracts')->with('projects',$projects);
    }
}
