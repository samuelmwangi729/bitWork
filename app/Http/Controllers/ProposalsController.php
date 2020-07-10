<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{Projects,Proposal};
use Auth;
use Session;
class ProposalsController extends Controller
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
        $this->validate($request,[
            'ProposalDescription'=>'required',
            'ProjectTimespan'=>'required',
            'Budget'=>'required',
            'PaidBy'=>'required',
        ]);
        $hasProposed=Proposal::where([
            ['UserId','=',Auth::user()->UserId],
            ['ProjectId','=',$request->Id]
        ])->get()->first();
        if(is_null($hasProposed)){
            $paymentType='Hourly';
        $PaidBy=$request->PaidBy;
        if($PaidBy=='$request->PaidBy'){
            $paymentType='Hourly';
        }
        if($PaidBy=='fRuSScTym'){
            $paymentType='By Project';
        }
        if($PaidBy=='kO95REdCnh'){
            $paymentType='By Milestone';
        }
        $timespan='1 Month';
        $time=$request->ProjectTimespan;
        if($time=='DFL9VVdfvfEo0'){
            $timespan='1 Week';
        }
        if($time=='fRdK4KuSScTym'){
            $timespan=='1 Month';
        }
        if($time=='rZztxi5vvZL9V'){
            $timespan='1 - 3 Months';
        }if($time=='fWZroeyXmk6Er'){
            $timespan='3-6 Months';
        }if($time=='CtZAZPvBDxlhH'){
            $timespan='6-12 Months';
        }if($time=='noH8DoGPxYuV9'){
            $timespan='Over 1 Year';
        }
        if($request->hasFile('Resume')){
            $file=$request->ProjectFile;
            $newExtension=$file->getClientOriginalExtension();
            $newName=Str::random(10).'.'.$newExtension;
            $resume='JNXg/2NAgpTL2uApASYOK04fDOQpgfwvtWMcTqX/'.$newName;
            $file->move('NXg/2NAgpTL2uApASYOK04fDOQpgfwvtWMcTqX',$newName);
         }else{
            $resume="None";
         }
         Proposal::create([
            'UserId'=>Auth::user()->UserId,
            'ProjectId'=>$request->Id,
            'ProposalDescription'=>$request->ProposalDescription,
            'ProjectTimespan'=>$timespan,
            'Budget'=>$request->Budget,
            'PaidBy'=>$paymentType,
            'Resume'=>$resume,
            'Status'=>'0',
         ]);
         Session::flash('success','Proposal Successfully Submitted');
         return redirect(route('jobs'));

        }
        if($hasProposed->count()>1){
            Session::flash('error','You have already Submitted your Proposal');
            return back();
        }
        

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
    public function proposed(){
        $proposedJobs=Proposal::where([
            ['UserId','=',Auth::user()->UserId],
            ['Status','=','0']
        ])->get();
        if(is_null($proposedJobs)){
            return back();
        }else{
            $projectsId=[];
            //to get the projects id that the user has sent proposals on
        for($i=0;$i<$proposedJobs->count(); $i++){
            array_push($projectsId,$proposedJobs[$i]->ProjectId);
        }
        $projectz=[];
        //to get the projects then 
        for($i=0;$i<count($projectsId); $i++){
            $project=Projects::where('ProjectId','=',$projectsId[$i])->get();
            array_push($projectz,$project);
        }
        return view('Jobs.Proposed')->with('projects',$projectz);
        }
        
    }
    //the function to retract the proposals proposed by the users 
    public function retract(Request $request){
        $proposal=Proposal::where([
            ['UserId','=',Auth::user()->UserId],
            ['ProjectId','=',$request->ProjectId]
        ])->get()->first();
        $proposal->Status=1;
        $proposal->save();
        Session::flash('error','the proposal has been successfully retracted');
        return back();
    }
}
