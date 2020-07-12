<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{Projects,User,Messages,MessagesSender,Proposal};
use Session;
use Auth;
use Str;
class MessagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $projectId=request()->ProjectId;
        
        $to=$request->UserId;
        $projectId=$request->ProjectId;
        $project=Projects::where('ProjectId','=',$projectId)->get()->first();
        if(is_null($project)){
            return back();
        }
        $user=User::where('UserId','=',$to)->get()->first();
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
        $Messages=Messages::where([
            ['Project','=',$projectId],
            ['To','=',$request->UserId]
        ]
        )->get();
        //is there a chat Id?
        $ChatId=MessagesSender::where([
            ['From','=',Auth::user()->UserId],
            ['To','=',$to]
        ])->get()->first();
        if(is_null($ChatId)){
            $chatsId=null;
            $Messages='None';
            $inbox='None';
        }
        if(!is_null($ChatId)){
            $chatsId=$ChatId->ChatId;
            $Messages=Messages::where('ChatId','=',$chatsId)->get();
            $inbox=MessagesSender::where('ChatId','=',$chatsId)->get();
        }
        return view('Messages.Index')
        ->with('ChatId',$chatsId)
        ->with('to',$to)
        ->with('inbox',$inbox)
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
        $projectId=request()->ProjectId;
        $message=request()->Message;
        $from=Auth::user()->UserId;
        $ChatId=$request->ChatId;
        //Register the sender of the message 
        $isSent=MessagesSender::where('ChatId','=',$ChatId)->get()->first();
        if(is_null($isSent)){
            $ChatId=Str::random(8);
        }
        if(is_null($isSent)){
            MessagesSender::create([
                'To'=>$request->To,
                'From'=>$from,
                'ChatId'=>$ChatId,
            ]);
        }
        Messages::create([
            'From'=>$from,
            'To'=>$request->To,
            'Project'=>$projectId,
            'Message'=>$message,
            'ChatId'=>$ChatId,
            'Attachment'=>'0',
        ]);
        $Messages=Messages::where('ChatId','=',$ChatId)->get();
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
    public function From(){
        $ChatId=request()->ChatId;
        $myMessages=Messages::where('ChatId','=',$ChatId)->get();
        $projectId=Messages::where('ChatId','=',$ChatId)->get()->first();
        $from=Messages::where('ChatId','=',$ChatId)->get()->last();
        $user=User::where('UserId','=',$from->From)->get()->first();
        $inbox=MessagesSender::where('ChatId','=',$ChatId)->get();
        //get the project type pay
        $payType=Proposal::where([
            ['UserId','=',Auth::user()->UserId],
            ['ProjectId','=',$projectId->Project]
        ])->get()->first();
        if(is_null($payType)){
            $payment='Project';
        }else{
            $payment=$payType->PaidBy;
        }
        return view('Messages.From')
        ->with('payment',$payment)
        ->with('ChatId',$ChatId)
        ->with('inbox',$inbox)
        ->with('from',$user)
        ->with('projectId',$projectId->Project)
        ->with('myMessages',$myMessages);
    }
    public function Sent(){
        $ChatId=request()->ChatId;
        $myMessages=Messages::where('ChatId','=',$ChatId)->get();
        $projectId=$myMessages[0]->Project;
        $To=$myMessages[0]->To;
        $user=User::where('UserId','=',$To)->get()->first();
        $inbox=MessagesSender::where('ChatId','=',$ChatId)->get();
        // dd($user);
        return view('Messages.Sent')
        ->with('ChatId',$ChatId)
        ->with('user',$user)
        ->with('inbox',$inbox)
        ->with('from',Auth::user()->UserId)
        ->with('projectId',$projectId)
        ->with('myMessages',$myMessages);
    }
}
