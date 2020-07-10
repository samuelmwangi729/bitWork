<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{Projects,User,Messages};
use Session;
use Auth;
class MessagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projectId=request()->ProjectId;
        $UserId=request()->UserId;
        $project=Projects::where('ProjectId','=',$projectId)->get()->first();
        if(is_null($project)){
            return back();
        }
        $user=User::where('UserId','=',$UserId)->get()->first();
        if(is_null($user)){
            return back();
        }
        $isMessages=Messages::where([
            ['Project','=',$projectId]
        ])->get();
        if(is_null($isMessages)){
            $messages='None';
        }else{
            $messages=$isMessages;
        }
        $Messages=Messages::where(
            'Project','=',$projectId
        )->get();
        return view('Messages.Index')
        ->with('Messages',$Messages)
        ->with('isMessages',$messages)
        ->with('user',$user)
        ->with('project',$project)
        ;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $userId=request()->UserId;
        $projectId=request()->ProjectId;
        $message=request()->Message;
        $from=Auth::user()->UserId;
        Messages::create([
            'From'=>$from,
            'To'=>$userId,
            'Project'=>$projectId,
            'Message'=>$message,
            'Attachment'=>'0',
        ]);
        $Messages=Messages::where([
            ['From','=',Auth::user()->UserId],
            ['To','=',$userId],
            ['Project','=',$projectId]
        ])->get();
        return back()->with('Messages',$Messages);
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
