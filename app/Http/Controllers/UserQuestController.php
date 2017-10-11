<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Category;
use App\Quest;
use Session;
use App\Helpers\ImageHelper;
use App\Helpers\AnswerHelper;

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
        $quest_id = $quest->id;

        AnswerHelper::save_answers($request->answers,$quest_id);

        $user = Auth::user();
        $user->quests()->attach($quest);

        if($request->hasFile('images'))
        {          
            ImageHelper::save_images($request->images,$quest_id);
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

        $quest = Quest::findOrFail($id);
        $quest->update($request->all());
        $quest->status = 'user';
        $quest->save();

        AnswerHelper::update_answers($request->answers,$quest);

        if($request->hasFile('images'))
        { 
            ImageHelper::update_images($request->images,$quest);
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

        AnswerHelper::delete_answers($quest->answers);
        ImageHelper::delete_images($quest->image);

        $quest->delete();

        Session::flash('message', 'Quest deleted!');
        Session::flash('status', 'success');

        return redirect('user/quest');
    }
}
