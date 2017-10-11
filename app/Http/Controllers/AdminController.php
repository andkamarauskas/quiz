<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Quest;

class AdminController extends Controller
{
    //
    public function index()
    {
    	return view('backEnd.admin.dashboard');
    }

    public function questsToApprove()
    {
    	$quest = Quest::where('status','user')->get();
        return view('backEnd.admin.quest.toApprove', compact('quest'));
    }
    public function countToApprove()
    {
    	return Quest::where('status','user')->count();
    }
}
