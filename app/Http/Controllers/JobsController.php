<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Projects;
use Auth;

class JobsController extends Controller
{
    public function index(){
         //the function returns projects owned by the logged In user
         $projects=Projects::where(
            'ClientId','=',Auth::user()->UserId
        )->get();
       return view('Jobs.Index')->with('projects',$projects);
    }
}
