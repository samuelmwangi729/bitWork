<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Str;
use Auth;
use App\{Projects,Proposal};
use Session;

class ProjectsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Projects.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'ProjectTitle'=>'required|unique:projects',
            'ProjectCategory'=>'required',
            'ProjectBudget'=>'required',
            'ProjectDescription'=>'required'
        ]);
        $bids=1;
        if($request->ProjectBudget=='0.00001BTC-0.0001BTC'){
            $bids=1;
        }elseif ($request->ProjectBudget=='0.0001BTC-0.001BTC') {
            $bids=2;
        }elseif ($request->ProjectBudget=='0.001BTC-0.01BTC') {
            $bids=3;
        }elseif($request->ProjectBudget=='0.01BTC-0.1BTC'){
            $bids=4;
        }elseif ($request->ProjectBudget=='0.1BTC-1BTC') {
            $bids=5;
        }elseif ($request->ProjectBudget=='Over 1BTC') {
            $bids=6;
        }
        else{
            $bids=1;
        }
        if($request->hasFile('ProjectFile')){
           $file=$request->ProjectFile;
           $newExtension=$file->getClientOriginalExtension();
           $newName=Str::random(10).'.'.$newExtension;
           $fileName='YOK04JNXg/2NAgpTL2uApASfDOQpgfwvtWMcTqX/'.$newName;
           $file->move('YOK04JNXg/2NAgpTL2uApASfDOQpgfwvtWMcTqX',$newName);
        }else{
           $fileName=0;
        }
        $projectId=Str::random(7);
        $userId=Auth::user()->UserId;
        $slug=Str::slug($request->ProjectTitle);
        Projects::create([
            'ProjectId'=>$projectId,
            'ProjectTitle'=>$request->ProjectTitle,
            'Slug'=>$slug,
            'Description'=>$request->ProjectDescription,
            'ProjectFile'=>$fileName,
            'ProjectCategory'=>$request->ProjectCategory,
            'ClientId'=>$userId,
            'Budget'=>$request->ProjectBudget,
            'Bids'=>$bids,
            'Expired'=>0
        ]);
        Session::flash('success','Project Successfully Posted');
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $project=Projects::where('ProjectId','=',$id)->get()->first();
        $proposals=Proposal::where('ProjectId','=',$id)->get();
        if(is_null($proposals)){
            $pCount=0;
        }
        if(!is_null($proposals)){
            $pCount=$proposals->count();
        }
        return view('Projects.Single')
        ->with('ProposalsCount',$pCount)
        ->with('proposals',$proposals)
        ->with('project',$project);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function view(){
        //the function returns projects owned by the logged In user
        $projects=Projects::where(
            'ClientId','=',Auth::user()->UserId
        )->get();
       return view('Projects.Mine')->with('projects',$projects);
    }
    public function completed(){
        //the function returns projects owned by the logged In user
        $projects=Projects::where(
            [
                ['ClientId','=',Auth::user()->UserId],
                ['Status','=','1']
            ]
        )->get();
       return view('Projects.Completed')->with('projects',$projects);
    }

    public function close($slug){
        $project=Projects::where(
            'slug','=',$slug
        )->get()->first();
        if(is_null($project)){

        }else{
            $project->Status=3;
            $project->save();
            Session::flash('success','Project Closed for Bidding');
            return back();
        }
    }
    public function complete($slug){
        $project=Projects::where(
            'slug','=',$slug
        )->get()->first();
        if(is_null($project)){

        }else{
            $project->Status=1;
            $project->save();
            Session::flash('success','Project Marked as Complete');
            return back();
        }
    }
}
