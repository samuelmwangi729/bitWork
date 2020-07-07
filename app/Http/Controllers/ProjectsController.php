<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Str;
use Auth;
use App\Projects;
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
        //
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
}
