<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Quest;
use App\Train;
use App\TrainQuest;
use App\UserAnswer;

class TrainController extends Controller
{
    public function index()
    {

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
            return view('train.index');
        }
        else
        {
            $available_quests  = $train->available_quests;

            if (count($available_quests) > 0) {
                foreach ($available_quests as $key => $train_quest) {
                    $quest = $train_quest->quest;
                    return view('train.game',['quest' => $quest, 'train_id' => $train->id]);
                }
            }
            else
            {
                $train->active = false;
                $train->save();

                return redirect()->route('train.results',['train_id' => $train->id]);
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
        $this->validate($request, [
            'quest_id' => 'required|integer',
            'train_id' => 'required|integer',
            'answers' => 'required',
        ]);

        $train = Train::where('id',$request->train_id)->first();
        $available_quests = $train->available_quests;

        foreach ($available_quests as $key => $train_quest)
        {
            
            if($train_quest->quest->id == $request->quest_id)
            {
                $user_answers = preg_replace('/\s+/', '', $request->answers);
                $user_answers = explode(',', $user_answers);
                $user_answers = array_filter($user_answers, function($value) { return $value !== ''; });
                $right_answers = $train_quest->quest->answers;

                foreach ($user_answers as $key => $user_answer) {
                    UserAnswer::create(['train_quest_id' => $train_quest->id, 'answer' => $user_answer]);
                    
                    foreach ($right_answers as $right_answer) {
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
    public function results($train_id)
    {
        $train = Train::where('id',$train_id)->first();
        $correct_answers_num = TrainQuest::where('train_id',$train_id)
                             ->where('correct', true)->count();
        $train_quests = $train->get_train_quests;
        return view('train.results',['correct_answers_num' => $correct_answers_num, 'train_quests' => $train_quests]);
    }
}
