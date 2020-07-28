<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Auth;
use Str;
use App\{Plans,Balance,BitworkProfit,Membership,Accounts,PaymentsPlatforms};
class MembershipController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //returns the view with the membership Plans
        $plans=Plans::where('Status','=',0)->get();
        return view('Membership.Index')->with('plans',$plans);
    }

    //for the bronze membership
    protected function Bronze(){
        if(is_null(Auth::user())){
            Session::flash('error','Please Login to Upgrade your Membership');
            return redirect('/login');
        }
        else{
            $bronze=Plans::where('Profile','Bronze')->get()->first();
            $amount=$bronze->Amount;
            //check if the user has the balance in their account 
            $balance=Balance::where('UserId','=',Auth::user()->UserId)->get()->first();
            $availableBalance=$balance->Balance;
            //compute the new Balance 
            $newBalance=$availableBalance-$amount;
            if($availableBalance<$amount){
                $platforms=PaymentsPlatforms::all();
                $bitcoinWallet=Accounts::where('UserId','=',Auth::user()->UserId)->get()->first();
                return view('Membership.Purchase')
                ->with('uProfile','Bronze')
                ->with('platforms',$platforms)
                ->with('bitcoinAddress',$bitcoinWallet)
                ->with('message','No Enough Amount In Your Account to Upgrade your membership, Kindly Deposit with Us and try  Again');
            }else{
                //update the users balance 
            $balance->Balance=$newBalance;
            $balance->save();
            //then post the amount into the bitworq profit
            BitworkProfit::create([
                'TransactionId'=>Str::random(10),
                'ProjectId'=>'Upgrade',
                'Amount'=>$amount,
                'Description'=>Auth::user()->UserId.' Upgrading of membership to Bronze',
            ]);
            //update their membership status 
            $membership=Membership::where('UserId','=',Auth::user()->UserId)->get()->first();
            $membership->MemberType='Bronze';
            $membership->Registered=date('Y-M-d');
            //when will it expire 
            //$today=date('Y-M-d);
            //$expiry=$today->addWeeks(4);
            $membership->save();
            //send email to the user using php mailer
            //later
            Session::flash('success','Successfully Upgraded Membership to Bronze');
           return redirect(route('home'));
            }
        }
    }
    //create new plans 
    protected function newPlan(){
        //check if the user is an admin 
        if(Auth::user()->AccountType==1){
            //add them here
            $plans=Plans::where('Status','=',0)->get();
            return view('Membership.Add')->with('plans',$plans);
        }else{
            return back();
        }
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
        if(Auth::user()->AccountType==1){
            $this->validate($request,[
                'Profile'=>'required|unique:plans',
                'Amount'=>'required'
            ]);
            //add them here
            Plans::create([
                'Profile'=>$request->Profile,
                'Amount'=>$request->Amount
            ]);
            Session::flash('success','The Plan Hass been succesfully added');
            return back();
        }else{
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
        $plan=Plans::find($id);
        $plan->destroy($id);
        Session::flash('error','Plan Successfully Deleted');
        return back();
    }
}
