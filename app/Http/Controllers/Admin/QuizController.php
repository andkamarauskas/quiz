<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Quiz;
use App\Quest;
use App\QuizQuest;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;
use Response;

class QuizController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $quiz = Quiz::all();

        return view('backEnd.admin.quiz.index', compact('quiz'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('backEnd.admin.quiz.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $this->validate($request, ['title' => 'required', 'persons_num' => 'required', 'quests_num' => 'required', 'date' => 'required', 'time' => 'required', ]);

        Quiz::create($request->all());

        Session::flash('message', 'Quiz added!');
        Session::flash('status', 'success');

        return redirect('admin/quiz');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return Response
     */
    public function show($id)
    {
        $quiz = Quiz::findOrFail($id);

        return view('backEnd.admin.quiz.show', compact('quiz'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $quiz = Quiz::findOrFail($id);

        return view('backEnd.admin.quiz.edit', compact('quiz'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     *
     * @return Response
     */
    public function update($id, Request $request)
    {
        $this->validate($request, ['title' => 'required', 'persons_num' => 'required', 'quests_num' => 'required', 'date' => 'required', 'time' => 'required', ]);

        $quiz = Quiz::findOrFail($id);
        $quiz->update($request->all());

        Session::flash('message', 'Quiz updated!');
        Session::flash('status', 'success');

        return redirect('admin/quiz');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $quiz = Quiz::findOrFail($id);

        $quiz->delete();

        Session::flash('message', 'Quiz deleted!');
        Session::flash('status', 'success');

        return redirect('admin/quiz');
    }

    public function liveSearch(Request $request)
    {
        $search = $request->str;
        if (is_null($search))
        {
            return view('admin.quiz.show');        
        }
        else
        {
            $quests = Quest::where('title','LIKE',"%{$search}%")->get();
            
            return view('backEnd.admin.quiz.livesearch',['quests' => $quests ]);
        }
    }
    public function attachQuest(Request $request)
    {
        $quiz_id = $request->quiz_id;
        $quest_id = $request->quest_id;
        $quest_quiz = QuizQuest::where('quiz_id', $quiz_id)
                               ->where('quest_id',$quest_id)
                               ->first();
        if(!$quest_quiz)
        {
            $quest = Quest::find($quest_id);
            $quiz = Quiz::find($quiz_id);
            $quiz->quests()->attach($quest);
        }
    }
    public function questList(Request $request)
    {
        $quiz = Quiz::find($request->quiz_id);

        return view('backEnd.admin.quiz.questslist',['quiz' => $quiz ]);
    }
}
