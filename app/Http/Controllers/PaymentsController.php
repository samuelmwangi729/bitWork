<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Session;
use App\{Payment,Accounts,PaymentsPlatforms,Plans};
class PaymentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $statements=payment::where('Freelancer','=',Auth::user()->UserId)->get();
        $statementCount=$statements->count();
        return view('Payments.Index')
        ->with('counts',$statementCount)
        ->with('statements',$statements);
    }

    protected function withdraw(){
        //check if the withdrawal Address Is Available
        $user=Accounts::where('UserId','=',Auth::user()->UserId)->get()->first();
        if(is_null($user->paymentAddress)){
            Session::flash('error','No Payment Address Available, Please Update It Under Accounts');
            return back();
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function platform()
    {
        $platforms=PaymentsPlatforms::all();
        return view('Payments.Add')->with('platforms',$platforms);
    }
    protected function storePlatforms(Request $request){
        $this->validate($request,[
            'Platform'=>'required|unique:payments_platforms'
        ]);
        PaymentsPlatforms::create($request->all());
        Session::flash('success','Payment Method Created');
        return back();
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        $platform=PaymentsPlatforms::find($id);
        $platform->destroy($id);
        Session::flash('error','The Platform Successfully removed');
        return back();
    }
    //to handle the btc payments 
    //to handle paypal gateway
    protected function PaywithPaypal(){
        $membership=Plans::where('Profile','=',request()->Profile)->get()->first();
        if(is_null($membership)){
            return back()->with('message','Membership Plan Not found');
        }else{
            $amount=$membership->Amount;
            dd($amount*9000);
        }
        //get the membership Eg. Bronze etc
    }
    //to handle Credit Card Payment
}
