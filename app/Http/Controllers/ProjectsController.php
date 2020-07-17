<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Str;
use Auth;
use App\{Projects,Proposal,MessagesSender,Messages,Milestone,HourTracker,Balance,Payment,BitworkProfit,BitworkEscrow};
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
        $awardedTo=$project->AwardedTo;
        $payType=Proposal::where([
            ['ProjectId','=',$id],
            ['UserId','=',$awardedTo]
        ])->get()->first();
        return view('Projects.Single')
        ->with('ProposalsCount',$pCount)
        ->with('payType',$payType)
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

    protected function award(){
        $ChatId=request()->ChatId;
        $isValid=MessagesSender::where('ChatId','=',$ChatId)->get()->first();
        if(is_null($isValid)){
            Session::flash('error','Freelancer Is Not Available At The Moment');
            return back();
        }else{
            $project=Messages::where('ChatId','=',$ChatId)->get()->first();
            $projectId=$project->Project;
            $freelancer=$project->To;
            $from=$project->From;
            $isAwarded=Messages::where([
                ['From','=',$from],
                ['To','=',$freelancer],
                ['Project','=',$projectId],
                ['Attachment','=',3]
            ])->get()->first();
            // dd($isAwarded);
              //get the proposal amount and check it in the clients balance
            $proposal=Proposal::where([
                ['UserId','=',$freelancer],
                ['ProjectId','=',$projectId]
            ])->get()->first();
            $checkBalance=Balance::where('UserId','=',$from)->get()->first();
            $proposalAmount=$proposal->Budget;
            //the  balance of the clients account 
            $accountBalance=$checkBalance->Balance;
            if($accountBalance<$proposalAmount){
                Messages::create([
                    'To'=>$freelancer,
                    'From'=>$from,
                    'Project'=>$projectId,
                    'ChatId'=>$ChatId,
                    'Message'=>'You have no enough funds to award your project. Kindly top up',
                    'Attachment'=>'9',
                ]);
                return back();
            }else{
                   //then take the amount into escrow
            $profit=$proposalAmount*0.2;
            $ActualAmount=$proposalAmount-$profit;
            if($proposal->PaidBy=='By Project'){
                //get the amount and place it to escrow
                BitworkProfit::create([
                    'TransactionId'=>Str::random(10),
                    'ProjectId'=>$projectId,
                    'Amount'=>$profit,
                    'Description'=>'20% service fee for the Project Awarded',
                ]);
                //post the amount to escrow
                BitworkEscrow::create([
                    'ProjectId'=>$projectId,
                    'Client'=>$from,
                    'Freelancer'=>$freelancer,
                    'Amount'=>$ActualAmount,
                ]);
                //then update the users balance 
                $checkBalance->Balance=$accountBalance-$proposalAmount;
                $checkBalance->save();
            }
            if(is_null($isAwarded)){
                Messages::create([
                    'To'=>$freelancer,
                    'From'=>$from,
                    'Project'=>$projectId,
                    'ChatId'=>$ChatId,
                    'Message'=>'You Have Awarded  '.$freelancer.' Your Project. Kindly Wait For their response soon',
                    'Attachment'=>'3',
                ]);
                return back();
            }
            }
            if($isAwarded->Attachment==3){
                Session::flash('error','Kindlly Let the Freelancer respond. You already  Awarded The Project');
                return back();
            }
        }


    }
    protected function completeContract(){
        $ChatId=request()->ChatId;
        $isValid=MessagesSender::where('ChatId','=',$ChatId)->get()->first();
        if(is_null($isValid)){
            Session::flash('error','Freelancer Is Not Available At The Moment');
            return back();
        }else{
            $project=Messages::where('ChatId','=',$ChatId)->get()->first();
            $projectId=$project->Project;
            $freelancer=$project->To;
            $from=$project->From;
            $isAwarded=Messages::where([
                ['From','=',$from],
                ['To','=',$freelancer],
                ['Attachment','=',3]
            ])->get()->first();
            if($isAwarded->To ==$freelancer && $project->From==Auth::user()->UserId)
                Messages::create([
                    'To'=>$freelancer,
                    'From'=>$from,
                    'Project'=>$projectId,
                    'ChatId'=>$ChatId,
                    'Message'=>$project->From .' Has Requested To Mark the Project  '.$projectId.'  As Complete',
                    'Attachment'=>'7',
                ]);
                return back();
            }
    }
    protected function AgreeContract(){
        $projectId=request()->ProjectId;
        $project=Projects::where('ProjectId','=',$projectId)->get()->first();
        $isValid=MessagesSender::where('ChatId','=',request()->ChatId)->get()->first();
      if(is_null($isValid)){
          Session::flash('error','Unknown Error Occurred');
          return back();
      }
      $isValid->Status=1;
      $isValid->save();
      if($project->Status==1){
          return back();
          Session::flash('error','Project Already Completed');
      }
     if($project->AwardedTo==Auth::user()->UserId){
         //mark the project complete 
         $project->Status=1;
         $project->save();
         //get the balance from escrow and update it the the client balanced
         $escrowAmount=BitworkEscrow::where('ProjectId','=',$project->ProjectId)->get()->first();
        $escAmount=$escrowAmount->Amount;
        $user=Balance::where('UserId','=',Auth::user()->UserId)->get()->first();
        $oldBalance=$user->Balance;
        $user->Balance=$oldBalance+$escAmount;
        $user->save();
        //update the status of the escrow amount
        $escrowAmount->Status=1;
        $escrowAmount->save();
         Messages::create([
            'To'=>Auth::user()->UserId,
            'From'=>$project->ClientId,
            'Project'=>$project->ProjectId,
            'ChatId'=>request()->ChatId,
            'Message'=>$project->ProjectId .' Has Been Marked Complete By Agreement By Both Parties',
            'Attachment'=>'8',
        ]);
        return back();
     }else {
         Session::flash('error','Unknown Error Occurred');
         return back();
     }

    }
    protected function accept(){
        $ChatId=request()->ChatId;
        // dd($ChatId);
        $details=Messages::where('ChatId','=',$ChatId)->get()->first();
        $projectId=$details->Project;
        $freelancer=$details->To;
        $clientId=$details->From;
        $isAwarded=$project=Projects::where([
            ['ProjectId','=',$projectId],
            ['AwardedTo','=',$freelancer]
        ])->get()->first();

        if(is_null($isAwarded)){
            $project=Projects::where([
                ['ProjectId','=',$projectId],
                ['ClientId','=',$clientId]
            ])->get()->first();
            $project->Status=3;
            $project->AwardedTo=$freelancer;
            $project->save();
            Messages::create([
                'To'=>$clientId,
                'From'=>$freelancer,
                'Project'=>$projectId,
                'ChatId'=>$ChatId,
                'Message'=>$freelancer.' Has Accepted your Project',
                'Attachment'=>'3',
            ]);
            return back();
        }else{
            Session::flash('error','You already Accepted the Project');
            return back();
        }
    }
    protected function Release(){
        $ChatId=request()->ChatId;
        $details=Messages::where('ChatId','=',$ChatId)->get()->first();
        $projectId=$details->Project;
        $freelancer=$details->To;
        $clientId=$details->From;
        //update the amount in escrow
        $inEscrow=BitworkEscrow::where([
            ['ProjectId','=',$projectId],
            ['Status','=','0']
        ])->get()->first();
        $inEscrow->Status=1;
        $inEscrow->save();
        //then check if the person releasing the milestone is the owner of the project
        if($clientId==Auth::user()->UserId){
            $Release=Milestone::where([
                ['ProjectId','=',$projectId],
                ['Status','=','0']
            ])->get()->first();
           if(is_null($Release)){
               Session::flash('error','Seems You already Released the Milestone');
               return back();
           }else{
            $Release->Status=1;
            $Release->save();
            //post the blance in the persons account 
            
            Payment::create([
                'PaymentId'=>Str::random(10),
                'Freelancer'=>$freelancer,
                'Client'=>$clientId,
                'ProjectId'=>$projectId,
                'Amount'=>$Release->Amount,
                'DateReleased'=>date('Y-m-d'),
            ]);
            //update the freelancer's balance 
            $pDetails=Balance::where('UserId','=',$freelancer)->get()->first();
            $NewBalance=$pDetails->Balance+$Release->Amount;
            $pDetails->Balance=$NewBalance;
            $pDetails->save();
              //then post the message on release of the milestone 
            Messages::create([
                'To'=>$freelancer,
                'From'=>$clientId,
                'Project'=>$projectId,
                'ChatId'=>$ChatId,
                'Message'=>$clientId.' Has Released your Milestone of  '.$Release->Amount.' BTC. The Amount  Added to Your Account Balance. Keep Working With Us',
                'Attachment'=>'5',
            ]);
            Session::flash('success','Milestone Successfully Released');
            return back();
           }
        }

    }
    protected function milestone(Request $request){
        // dd(request()->ProjectId);
        $isAwarded=Projects::where('ProjectId','=',request()->ProjectId)->get()->first();
        if($isAwarded->Status==1){
            Session::flash('error','Project Marked As Complete');
            return back();
        }
        $Freelancer=$isAwarded->AwardedTo;
        if($Freelancer==Auth::user()->UserId){
            //Submit the Milestone
            $ChatId=MessagesSender::where([
                ['From','=',$isAwarded->ClientId],
                ['To','=',$Freelancer]
            ])->get()->first();
            $profit=$request->MilestoneAmount*0.2;
            $ActualAmount=$request->MilestoneAmount-$profit;
            BitworkProfit::create([
                'TransactionId'=>Str::random(10),
                'ProjectId'=>request()->ProjectId,
                'Amount'=>$profit,
                'Description'=>'20% service fee for the Milestone  Created',
            ]);
            BitworkEscrow::create([
                'ProjectId'=>request()->ProjectId,
                'Client'=>$isAwarded->ClientId,
                'Freelancer'=>$Freelancer,
                'Amount'=>$ActualAmount,
            ]);
            //post the amount to escrow
            Milestone::create([
                'ProjectId'=>request()->ProjectId,
                'Name'=>$request->MilestoneName,
                'Amount'=>$ActualAmount,
                'Status'=>0
            ]);
            Messages::create([
                'To'=>$isAwarded->ClientId,
                'From'=>$Freelancer,
                'Project'=>request()->ProjectId,
                'ChatId'=>$ChatId->ChatId,
                'Message'=>$Freelancer.' Has Created A Milestone Milestone'.Str::upper($request->MilestoneName).' With Amount '.$ActualAmount.' BTC. Amount In ESCROW',
                'Attachment'=>'4',
            ]);
            Session::flash('success','Milestone Successfully Created');
            return back();
        }else{
           Session::flash('error','You have not been awarded to the project');
           return back();
        }
    }
    public function TrackHours(Request $request){
       
        $isAwarded=Projects::where('ProjectId','=',request()->ProjectId)->get()->first();
        if($isAwarded->Status==1){
            Session::flash('error','Unknown Error Occurred');
            return back();
        }
        $Freelancer=$isAwarded->AwardedTo;
        //get the proposal 
        $proposal=Proposal::where([
            ['ProjectId','=',request()->ProjectId],
            ['UserId','=',Auth::user()->UserId]
        ])->get()->first();
        $budget=$proposal->Budget;
        $totalAmount=$budget*$request->HoursWorked;
        //get the 20% of the total Amount dd
        $profit=$totalAmount*0.2;
        //then the remaining amount is 80%
        $remAmount=$totalAmount-$profit;
        //post the profilt
        BitworkProfit::create([
            'TransactionId'=>Str::random(10),
            'ProjectId'=>request()->ProjectId,
            'Amount'=>$profit,
            'Description'=>'20% service fee for the hours posted',
        ]);
        //post the hours to the database
        HourTracker::create([
            'ProjectId'=>request()->ProjectId,
            'Hours'=>$request->HoursWorked,
            'Amount'=>$remAmount
        ]);
        if($Freelancer==Auth::user()->UserId){
            //Submit the Milestone
            $ChatId=MessagesSender::where([
                ['From','=',$isAwarded->ClientId],
                ['To','=',$Freelancer]
            ])->get()->first();
            //Get the Hours Posted
            Messages::create([
                'To'=>$isAwarded->ClientId,
                'From'=>$Freelancer,
                'Project'=>request()->ProjectId,
                'ChatId'=>$ChatId->ChatId,
                'Message'=>$Freelancer.' Has Added '.$request->HoursWorked.'  of Work for your Project. Total  Amount For the Hours is  '.$remAmount.' BTC. We have Charged 20% as service fee',
                'Attachment'=>'6',
            ]);
            Session::flash('success','Hours Successfully Added');
            return back();
        }else{
           Session::flash('error','You have not been awarded to the project');
           return back();
        }
    }
    protected function track(){
        $projectId=request()->ProjectId;
        $isExist=Projects::where('ProjectId','=',$projectId)->get();
        if(is_null($isExist)){
            Session::flash('error','Project Not Available');
            return back();
        }
        $projectOwner=$isExist[0]->ClientId;
       //get the hours tracked
       $hours=HourTracker::where('ProjectId','=',$projectId)->get();
      return view('Projects.Hours')
      ->with('owner',$projectOwner)
      ->with('hours',$hours);
    }
    protected function approve(){
        $projectId=request()->ProjectId;
        $isExist=HourTracker::where([
            ['ProjectId','=',$projectId],
            ['Status','=',0]
        ])->get()->first();
        if(is_null($isExist)){
            Session::flash('error','Unknown Error Occurred');
            return back();
        }
        $Project=Projects::where('ProjectId','=',$projectId)->get()->first();
        $UserBalance=Balance::where('UserId','=',$Project->AwardedTo)->get()->first();
        $newBalance=$UserBalance->Balance + $isExist->Amount;
        $UserBalance->Balance=$newBalance;
        $UserBalance->Save();
        $isExist->Status=1;
        $isExist->save();
        Payment::create([
            'PaymentId'=>Str::random(10),
            'Freelancer'=>$Project->AwardedTo,
            'Client'=>$Project->ClientId,
            'ProjectId'=>$projectId,
            'Amount'=>$isExist->Amount,
            'DateReleased'=>date('Y-m-d'),
        ]);
        Session::flash('success','Hours Successfully Approved');
        return back();
    }
    protected function reject(){
        $projectId=request()->ProjectId;
        $Project=Projects::where('ProjectId','=',$projectId)->get()->first();
        $UserBalance=Balance::where('UserId','=',$Project->AwardedTo)->get()->first();
        $isExist=HourTracker::where([
            ['ProjectId','=',$projectId],
            ['Status','=',1]
        ])->get()->first();
        if(is_null($isExist)){
            Session::flash('error','Unknown Error Occurred');
            return back();
        }
        $newBalance=$UserBalance->Balance - $isExist->Amount;
        if($newBalance<0){
            Session::flash('error','Amount Can not be Reversed');
            return back();
        }else{
            $UserBalance->Balance=$newBalance;
            // $UserBalance->Save();
            $isExist->Status=0;
            $isExist->save();
        }
        Session::flash('error','Hours Rejected');
        return back();
    }
}
