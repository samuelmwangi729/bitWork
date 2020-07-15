<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{MessagesSender,Projects,Balance,Messages,Proposal,Accounts,User};
use Auth;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user=User::where('UserId','=',Auth::user()->UserId)->get()->first();
        $account=Accounts::where('UserId','=',Auth::user()->UserId)->get()->first();
        $Proposals=Proposal::where('UserId','=',Auth::user()->UserId)->get()->count();
        // dd($Proposals);
        $Earning=Balance::where('UserId','=',Auth::user()->UserId)->get()->first()->Balance;
        // dd($Earning->Balance);
        $Messages=Messages::where('To','=',Auth::user()->UserId)->get()->count();
        // dd($Messages);
        $Contracts=Projects::where('AwardedTo','=',Auth::user()->UserId)->get()->count();
        // dd($Contracts);
        $sent=MessagesSender::where('From','=',Auth::user()->UserId)->get();
        $toMe=MessagesSender::where('To','=',Auth::user()->UserId)->get();
        return view('home')
        ->with('user',$user)
        ->with('account',$account)
        ->with('proposals',$Proposals)
        ->with('earning',$Earning)
        ->with('messages',$Messages)
        ->with('contracts',$Contracts)
        ->with('sent',$sent)
        ->with('toMe',$toMe);
    }
}
