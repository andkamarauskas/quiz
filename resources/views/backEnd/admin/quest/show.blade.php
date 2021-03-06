@extends('backLayout.app')
@section('title')
Quest
@stop

@section('content')

<h1>Quest <a href="{{ URL::previous() }}" class="btn btn-success pull-right">Back</a></h1>
<div class="table-responsive">
    <table class="table table-bordered table-striped table-hover">
        <thead>
            <tr>
                <th>ID.</th> <th>Question</th><th>Title</th><th>Category</th><th>Status</th><th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $quest->id }}</td>
                <td> {{ $quest->question }} </td>
                <td> {{ $quest->title }} </td>
                <td> {{ $quest->category->title }}</td>
                <td> {{ $quest->status }}</td>
                <td>
                    @if( $quest->status == 'user')
                    <a href="{{ url('admin/quest/approve/train/' . $quest->id ) }}" class="btn btn-warning btn-xs">To Train</a> 
                    <a href="{{ url('admin/quest/approve/game/' . $quest->id ) }}" class="btn btn-success btn-xs">To Game</a>
                    @endif
                    <a href="{{ url('admin/quest/' . $quest->id . '/edit') }}" class="btn btn-primary btn-xs">Update</a> 
                    {!! Form::open([
                        'method'=>'DELETE',
                        'url' => ['admin/quest', $quest->id],
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
            <img class="img img-responsive" alt="no-image" src="{{ $quest->image->quest_img }}">
        </div>
        <div class="col-md-4">
            <h3>Answer Image</h3>
            <img class="img img-responsive" alt="no-image" src="{{ $quest->image->answer_img }}">
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
                    @foreach($quest->answers as $key => $answer)
                    <tr>
                        <td>{{ $key+1 }}</td>
                        <td>{{ $answer->answer }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
 @endsection