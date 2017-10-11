@extends('layouts.app')
@section('title')
Edit Quest
@stop

@section('content')

<div class="container">
    <h1>Edit Quest <a href="{{ url('user/quest')}}" class="btn btn-success pull-right">Back</a></h1>
<hr/>

{!! Form::model($quest, [
    'method' => 'PATCH',
    'url' => ['user/quest', $quest->id],
    'class' => 'form-horizontal',
    'enctype' => 'multipart/form-data'
    ]) !!}

    <div class="form-group {{ $errors->has('category_id') ? 'has-error' : ''}}">
        {!! Form::label('category_id', 'Category: ', ['class' => 'col-sm-4 control-label']) !!}
        <div class="col-sm-5">
            {!! Form::select('category_id',$categories, null,['class' => 'form-control', 'required' => 'required']) !!}
            {!! $errors->first('category_id', '<p class="help-block">:message</p>') !!}
        </div> 
    </div>
    <div class="form-group {{ $errors->has('title') ? 'has-error' : ''}}">
        {!! Form::label('title', 'Title: ', ['class' => 'col-sm-4 control-label']) !!}
        <div class="col-sm-5">
            {!! Form::text('title', null, ['class' => 'form-control', 'required' => 'required']) !!}
            {!! $errors->first('title', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
    <div class="form-group {{ $errors->has('question') ? 'has-error' : ''}}">
        {!! Form::label('question', 'Question: ', ['class' => 'col-sm-4 control-label']) !!}
        <div class="col-sm-5">
            {!! Form::text('question', null, ['class' => 'form-control', 'required' => 'required']) !!}
            {!! $errors->first('question', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
    @for ($i=0; $i < 5 ; $i++)
    <div class="form-group {{ $errors->has('answers') ? 'has-error' : ''}}">
        <label for="answers" class="col-sm-4 control-label">Answer {{$i+1}}</label>
        <div class="col-sm-5">
            <input type="text" name="answers[]" value="@if (isset($answers[$i])) {{ $answers[$i] }} @endif" class="form-control" @if($i==0) required @endif>
            {!! $errors->first('answers', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
    @endfor

    <div class="form-group {{ $errors->has('images[]') ? 'has-error' : ''}}">
        {!! Form::label('images[]', 'Question Image: ', ['class' => 'col-sm-4 control-label']) !!}
        <div class="col-sm-5">
            <input type="file" name="images[]"  multiple>
        </div>
    </div>
    <div class="form-group {{ $errors->has('images[]') ? 'has-error' : ''}}">
        {!! Form::label('images[]', 'Answer Image: ', ['class' => 'col-sm-4 control-label']) !!}
        <div class="col-sm-5">
            <input type="file" name="images[]"  multiple>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-offset-3 col-sm-4">
            {!! Form::submit('Update', ['class' => 'btn btn-primary form-control']) !!}
        </div>
    </div>
    {!! Form::close() !!}
    @if ($errors->any())
    <ul class="alert alert-danger">
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
    @endif
    <div class="row">
        <div class="col-md-4 col-md-offset-2">
            <h3>Quest Image</h3>
            <img class="img img-responsive" alt="no-image" src="{{ $quest->image->quest_img }}">
        </div>
        <div class="col-md-4">
            <h3>Answer Image</h3>
            <img class="img img-responsive" alt="no-image" src="{{ $quest->image->answer_img }}">
        </div>
    </div>
</div>
    @endsection