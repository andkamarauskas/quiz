<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Quest;
use App\Status;
use App\Train;
use App\TrainQuest;

class TrainController extends Controller
{
    public function index()
    {
    	//geting quests with train status
    	// $quests_for_train = Status::where('title', 'train')->first();
    	// $quests_for_train = $quests_for_train->quests; 

    	// $train = Train::create(['user_id' => 1]);
    	
    	// foreach ($quests_for_train as $key => $quest) {
    	// 	TrainQuest::create(['train_id' => $train->id, 'quest_id' => $quest->id]);
    	// }

    	$train_quests = Train::find(6);
    	$train_quests = $train_quests->quests;

    	foreach ($train_quests as $key => $quest) {
    		dd($quest->quest);
    	}

    	return view('train.index');
    }
}
