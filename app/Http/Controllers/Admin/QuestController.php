<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Quest;
use App\Category;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;

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

        $this->validate($request, ['category_id' => 'required', 'title' => 'required', 'question' => 'required', ]);

        $quest = Quest::create($request->all());

        $imageName = $quest->id . '.' . $request->file('image')->getClientOriginalExtension();

        $request->file('image')->move(
            base_path() . '/public/images/quests/', $imageName
        );

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
        return view('backEnd.admin.quest.edit', compact('quest','categories'));
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
        $this->validate($request, ['category_id' => 'required', 'title' => 'required', 'question' => 'required', ]);

        $quest = Quest::findOrFail($id);
        $quest->update($request->all());

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

        Session::flash('message', 'Quest deleted!');
        Session::flash('status', 'success');

        return redirect('admin/quest');
    }

}
