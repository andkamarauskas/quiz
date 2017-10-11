@extends('layouts.app')
@section('title')
Quest
@stop

@section('content')
<div class="container">

    <h1>Quest <a href="{{ url('user/quest')}}" class="btn btn-success pull-right">Back</a></h1>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>ID.</th> <th>Question</th><th>Title</th><th>Category</th><th>Status</th><th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $userQuest->id }}</td>
                    <td> {{ $userQuest->question }} </td>
                    <td> {{ $userQuest->title }} </td>
                    <td> {{ $userQuest->category->title }}</td>
                    <td> {{ $userQuest->status }}</td>
                    <td>
                        <a href="{{ url('user/quest/' . $userQuest->id . '/edit') }}" class="btn btn-primary btn-xs">Update</a> 
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['user/quest', $userQuest->id],
                            'style' => 'display:inline'
                            ]) !!}
                            {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-xs']) !!}
                            {!! Form::close() !!}
                        </td>
                    </tr>
                </tbody>    
            </table>
        </div>
        <div class="row">
            <div class="col-md-4">
                <h3>Quest Image</h3>
                <img class="img img-responsive" alt="no-image" src="{{ $userQuest->image->quest_img }}">
            </div>
            <div class="col-md-4">
                <h3>Answer Image</h3>
                <img class="img img-responsive" alt="no-image" src="{{ $userQuest->image->answer_img }}">
            </div>
            <div class="col-md-4">
                <h3>Possible Answers</h3>
                <table class="table table-bordered table-striped table-hover">
                    <thead>
                        <tr>
                            <th class="col-md-1"></th>
                            <th>Answer</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($userQuest->answers as $key => $answer)
                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td>{{ $answer->answer }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @endsection