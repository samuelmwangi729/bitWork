<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{Accounts,Skills,User};
use Auth;
use Session;
use Str;
class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user=User::where('UserId','=',Auth::user()->UserId)->get()->first();
        $skills=Skills::where('UserId','=',Auth::user()->UserId)->get();
        $account=Accounts::where('UserId','=',Auth::user()->UserId)->get()->first();
        return view('User.account')
        ->with('user',$user)
        ->with('skills',$skills)
        ->with('account',$account);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function Bio(Request $request)
    {
        $this->validate($request,[
            'Bio'=>'required',
            'PaymentId'=>'required'
        ]);
        $account=Accounts::where('UserId','=',Auth::user()->UserId)->get()->first();
        $account->Description=$request->Bio;
        $account->PaymentAddress=$request->PaymentId;
        $account->save();
        Session::flash('success','Bio Successfully Updated');
        return back();
    }
    protected function Photo(Request $request){
        $this->validate($request,[
            'Photo'=>'required'
        ]);
        $file=$request->Photo;
        $extension=$file->getClientOriginalExtension();
        $allowed=['jpg','png','jpeg'];
        if(in_array($extension,$allowed)){
            //process the file
            $randName=Str::random('20');
            $filename=time().$randName;
            $newName=$filename.'.'.$extension;
            //this is the new file  name 
            $profilePhoto='i4TYgefmIML09O/'.$newName;
            //upload into the directory
            $file->move('i4TYgefmIML09O',$newName);
            //save into the database
            $account=Accounts::where('UserId','=',Auth::user()->UserId)->get()->first();
            $account->Profile=$profilePhoto;
            $account->save();
            Session::flash('success','Your Profile Photo Has Been Successfully Saved');
            return back();
        }else{
            Session::flash('error','We only permit  .png, .jpg, .jpeg extensions');
            return back();
        }
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
        $this->validate($request,[
            'Bio'=>'required',
            'PaymentId'=>'required'
        ]);
        $account=Accounts::where('UserId','=',Auth::user()->UserId)->get()->first();
        $account->Description=$request->Bio;
        $account->PaymentAddress=$request->PaymentId;
        $account->save();
        Session::flash('success','Bio Successfully Updated');
        return back();
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
