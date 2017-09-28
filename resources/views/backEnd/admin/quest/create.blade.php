@extends('backLayout.app')
@section('title')
Create new Quest
@stop

@section('content')

<h1>Create New Quest</h1>
<hr/>

{!! Form::open(['url' => 'admin/quest', 'class' => 'form-horizontal', 'enctype' => 'multipart/form-data']) !!}

<div class="form-group {{ $errors->has('category_id') ? 'has-error' : ''}}">
    {!! Form::label('category_id', 'Category: ', ['class' => 'col-sm-3 control-label']) !!}
    <div class="col-sm-6">
        {!! Form::select('category_id',$categories, null,['class' => 'form-control', 'required' => 'required']) !!}
        {!! $errors->first('category_id', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
    <div class="form-group {{ $errors->has('title') ? 'has-error' : ''}}">
        {!! Form::label('title', 'Title: ', ['class' => 'col-sm-3 control-label']) !!}
        <div class="col-sm-6">
            {!! Form::text('title', null, ['class' => 'form-control', 'required' => 'required']) !!}
            {!! $errors->first('title', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
    <div class="form-group {{ $errors->has('question') ? 'has-error' : ''}}">
        {!! Form::label('question', 'Question: ', ['class' => 'col-sm-3 control-label']) !!}
        <div class="col-sm-6">
            {!! Form::text('question', null, ['class' => 'form-control', 'required' => 'required']) !!}
            {!! $errors->first('question', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
    <div class="form-group {{ $errors->has('image') ? 'has-error' : ''}}">
        {!! Form::label('image', 'Image: ', ['class' => 'col-sm-3 control-label']) !!}

        <div class="col-sm-6">
            {!! Form::file('image', null, ['class' => 'form-control']) !!}
        </div>
    </div>


    <div class="form-group">
        <div class="col-sm-offset-3 col-sm-3">
            {!! Form::submit('Create', ['class' => 'btn btn-primary form-control']) !!}
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

    @endsection