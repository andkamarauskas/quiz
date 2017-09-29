<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Quest;
use App\Category;
use App\Answer;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;

use File;
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
            'title' => 'required',
            'question' => 'required',
            'answers' => 'required|array|min:1',
            'images' => 'required|array|min:2',
            'images.0' => 'required|mimes:jpeg,jpg|image|max:1000',
            'images.1' => 'required|mimes:jpeg,jpg|image|max:1000'
        ]);

        $quest = Quest::create($request->all());
        //next magic, uploads multiple images
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
        
        $oldAnswers = $quest->answers;
        foreach ($oldAnswers as $answer) {
            $answer->delete();
        }
        $quest->delete();

        File::delete(public_path('/images/quests/quest_'. $id .'.jpg'));
        File::delete(public_path('/images/quests/answer_'. $id .'.jpg'));

        Session::flash('message', 'Quest deleted!');
        Session::flash('status', 'success');

        return redirect('admin/quest');
    }

}
