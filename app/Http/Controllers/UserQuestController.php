<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Category;
use App\Quest;
use App\Answer;
use App\UserQuest;
use Session;
use File;

class UserQuestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $userQuests = $user->quests;
        return view('user.quest.index',compact('userQuests'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categories = Category::pluck('title','id');
        return view('user.quest.create',compact('categories'));
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
        $this->validate($request, [
            'category_id' => 'required',
            'title' => 'required',
            'question' => 'required',
            'answers' => 'required|array|min:1',
            'images' => 'required|array|min:2',
            'images.0' => 'required|mimes:jpeg,jpg|image|max:1000',
            'images.1' => 'required|mimes:jpeg,jpg|image|max:1000'
        ]);
        $quest = Quest::create($request->all());
        $quest->status = 'user';
        $quest->save();

        $user = Auth::user();

        $user->quests()->attach($quest);

        if($request->hasFile('images'))
        {          
            foreach ($request->images as $index => $image) {

                if($index == 0){$imageName = 'quest_';}else{$imageName='answer_';}

                $imageName = $imageName. $quest->id . '.' . $request->file('images')[$index]->getClientOriginalExtension();
                $request->file('images')[$index]->move( base_path() . '/public/images/quests/', $imageName );
            }
        }
        foreach ($request->answers as $key => $answer)
        {
            if($answer != null)
            {
                Answer::create(['quest_id' => $quest->id, 'answer' => $answer]);
            }
        }

        Session::flash('message', 'Quest added!');
        Session::flash('status', 'success');

        return redirect('user/quest');
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
        $userQuest = Quest::findOrFail($id);
        return view('user.quest.show', compact('userQuest'));
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
        $quest = Quest::findOrFail($id);
        $categories = Category::pluck('title','id');
        $answers = $quest->answers->pluck('answer');
        return view('user.quest.edit', compact('quest', 'categories', 'answers'));
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
        //
        $this->validate($request, [
            'category_id' => 'required',
            'title' => 'required',
            'question' => 'required',
            'answers' => 'required|array|min:1',
            'images.0' => 'mimes:jpeg,jpg,png | max:1000',
            'images.1' => 'mimes:jpeg,jpg,png | max:1000'
        ]);

        if($request->hasFile('images'))
        {  
            File::delete(public_path('/images/quests/quest_'. $id .'.jpg'));
            File::delete(public_path('/images/quests/answer_'. $id .'.jpg'));

            foreach ($request->images as $index => $image) {

                if($index == 0){$imageName = 'quest_';}else{$imageName='answer_';}

                $imageName = $imageName. $id . '.' . $request->file('images')[$index]->getClientOriginalExtension();
                $request->file('images')[$index]->move( base_path() . '/public/images/quests/', $imageName );
            }
        }

        $quest = Quest::findOrFail($id);
        $quest->update($request->all());
        $quest->status = 'user';
        $quest->save();

        $oldAnswers = $quest->answers;
        foreach ($oldAnswers as $answer) {
            $answer->delete();
        }
        foreach ($request->answers as $key => $answer)
        {
            if($answer != null)
            {
                Answer::create(['quest_id' => $id, 'answer' => $answer]);
            }
        }
        Session::flash('message', 'Quest updated!');
        Session::flash('status', 'success');

        return redirect('user/quest');
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
        $quest = Quest::findOrFail($id);

        $user = $quest->user->first();
        $user->quests()->detach($quest);

        $answers = $quest->answers;
        foreach ($answers as $answer) {
            $answer->delete();
        }
        $quest->delete();

        File::delete(public_path('/images/quests/quest_'. $id .'.jpg'));
        File::delete(public_path('/images/quests/answer_'. $id .'.jpg'));

        Session::flash('message', 'Quest deleted!');
        Session::flash('status', 'success');

        return redirect('user/quest');
    }
}
