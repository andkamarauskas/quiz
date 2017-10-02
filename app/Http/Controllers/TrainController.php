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
    /**
     * Method start(),
     * first check if there is no existing train where active is true,
     * if no, it creates new train and random takes 10 quests for train game,
     * quests id storing in to train_quests table.
     * 
     */
    public function start()
    {
        $exist_train =Train::where('user_id', Auth::user()->id)
                        ->where('active', true)->first();
        if($exist_train)
        {
            return redirect()->route('train.play');
        }
        else
        {
            $train = Train::create(['user_id' => Auth::user()->id]);

            $quests_for_train = Quest::where('status','train')
            ->orderByRaw("RAND()")
            ->limit(10)
            ->get();
            
            foreach ($quests_for_train as $key => $quest) {
                TrainQuest::create(['train_id' => $train->id, 'quest_id' => $quest->id]);
            }

            return redirect()->route('train.play');
        }
    }
    /**
     * Method play(),
     * first check if there is existing train where active is true,
     * then take a quest wich is not used before on this train,
     * and return main game view
     */
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
            $available_quests  = $train->available_quests;

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
    /**
     * Method next(),
     * checks right answers with user answers
     * 
     */
    public function next(Request $request)
    {
        $train = Train::where('id',$request->train_id)->first();
        $available_quests = $train->available_quests;

        foreach ($available_quests as $key => $train_quest)
        {
            if($train_quest->quest->id == $request->quest_id)
            {
                $user_answers = explode(',', $request->answers);
                $right_answers = $train_quest->quest->answers;
                foreach ($right_answers as $right_answer) {
                    foreach ($user_answers as $key => $user_answer) {
                        if($right_answer->answer == $user_answer)
                        {
                            $train_quest->correct = true;
                        }
                    }
                }
                $train_quest->used = true;
                $train_quest->save();
                return redirect()->route('train.play');
            }
        }

    }
}
