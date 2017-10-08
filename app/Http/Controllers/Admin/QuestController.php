<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Quest;
use App\Category;
use App\Answer;
use App\UserQuest;
use App\User;
use App\Helpers\ImageHelper;
use App\Helpers\AnswerHelper;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;

use Illuminate\Support\Facades\Validator;
class QuestController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $quest = Quest::all();
        return view('backEnd.admin.quest.index', compact('quest'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $categories = Category::pluck('title','id');
        return view('backEnd.admin.quest.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'category_id' => 'required',
            'status' => 'required',
            'title' => 'required',
            'question' => 'required',
            'answers' => 'required|array|min:1',
            'images' => 'required|array|min:2',
            'images.0' => 'required|mimes:jpeg,jpg|image|max:1000',
            'images.1' => 'required|mimes:jpeg,jpg|image|max:1000'
        ]);

        $quest = Quest::create($request->all());
        $quest_id = $quest->id;

        AnswerHelper::save_answers($request->answers,$quest_id);

        if($request->hasFile('images'))
        {          
            ImageHelper::save_images($request->images,$quest_id);
        }

        Session::flash('message', 'Quest added!');
        Session::flash('status', 'success');

        return redirect('admin/quest');
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
        $quest = Quest::findOrFail($id);

        return view('backEnd.admin.quest.show', compact('quest'));
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
        $quest = Quest::findOrFail($id);
        $categories = Category::pluck('title','id');
        $answers = $quest->answers->pluck('answer');
        return view('backEnd.admin.quest.edit', compact('quest', 'categories', 'answers'));
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
        $this->validate($request, [
            'category_id' => 'required',
            'status' => 'required',
            'title' => 'required',
            'question' => 'required',
            'answers' => 'required|array|min:1',
            'images.0' => 'mimes:jpeg,jpg,png | max:1000',
            'images.1' => 'mimes:jpeg,jpg,png | max:1000'
        ]);

        $quest = Quest::findOrFail($id);
        $quest->update($request->all());

        AnswerHelper::delete_answers($quest->answers);
        AnswerHelper::save_answers($request->answers,$id);
        
        if($request->hasFile('images'))
        { 
            ImageHelper::delete_images($id);
            ImageHelper::save_images($request->images,$id);
        }



        Session::flash('message', 'Quest updated!');
        Session::flash('status', 'success');

        return redirect('admin/quest');
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
        $quest = Quest::findOrFail($id);
        $quest->delete();

        AnswerHelper::delete_answers($quest->answers);
        ImageHelper::delete_images($id);

        Session::flash('message', 'Quest deleted!');
        Session::flash('status', 'success');

        return redirect('admin/quest');
    }

}
