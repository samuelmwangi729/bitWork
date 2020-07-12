<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MessagesSender;
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
        $sent=MessagesSender::where('From','=',Auth::user()->UserId)->get();
        $toMe=MessagesSender::where('To','=',Auth::user()->UserId)->get();
        return view('home')
        ->with('sent',$sent)
        ->with('toMe',$toMe);
    }
}
