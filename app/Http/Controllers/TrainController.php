<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Quest;
use App\Train;
use App\TrainQuest;

class TrainController extends Controller
{
    public function index()
    {

    	$train_quests = Train::find(6);
    	$train_quests = $train_quests->quests;

    	foreach ($train_quests as $key => $quest) {
    		dd($quest->quest->question);
    	}

    	return view('train.index');
    }
    public function start()
    {

        $train = Train::create(['user_id' => Auth::user()->id]);

        $quests_for_train = Quest::where('status','train')
        ->orderByRaw("RAND()")
        ->limit(10)
        ->get();
        
        foreach ($quests_for_train as $key => $quest) {
            TrainQuest::create(['train_id' => $train->id, 'quest_id' => $quest->id]);
        }
    }

    public function play()
    {
        $train =Train::where('user_id', Auth::user()->id)
        ->where('active', true)->first();

        if(!$train)
        {
            dd('no available train');
        }
        else
        {
            $available_quests  = $train->quests;

            if (count($available_quests) > 0) {
                foreach ($available_quests as $key => $train_quest) {
                    $quest = $train_quest->quest;
                    return view('train.index',['quest' => $quest, 'train_id' => $train->id]);
                }
            }
            else
            {
                $train->active = false;
                $train->save();
            }
        }

    }
    public function next(Request $request)
    {
        $train = Train::where('id',$request->train_id)->first();

        foreach ($train->quests as $key => $train_quest)
        {
            if($train_quest->quest->id == $request->quest_id)
            {
                $train_quest->used = true;
                $train_quest->save();
                return redirect()->route('train.play');
            }
        }

    }
}
