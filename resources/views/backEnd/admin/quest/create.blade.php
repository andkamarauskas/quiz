@extends('backLayout.app')
@section('title')
Create new Quest
@stop

@section('content')

<h1>Create New Quest <a href="{{ url('admin/quest')}}" class="btn btn-success pull-right">Back</a></h1>
<hr/>

{!! Form::open(['url' => 'admin/quest', 'class' => 'form-horizontal', 'enctype' => 'multipart/form-data']) !!}

<div class="form-group {{ $errors->has('category_id') ? 'has-error' : ''}}">
    {!! Form::label('category_id', 'Category: ', ['class' => 'col-sm-4 control-label']) !!}
    <div class="col-sm-5">
        {!! Form::select('category_id',$categories, null,['class' => 'form-control', 'required' => 'required']) !!}
        {!! $errors->first('category_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('status_id') ? 'has-error' : ''}}">
    {!! Form::label('status_id', 'Status: ', ['class' => 'col-sm-4 control-label']) !!}
    <div class="col-sm-5">
        {!! Form::select('status_id',$statuses, null,['class' => 'form-control', 'required' => 'required']) !!}
        {!! $errors->first('status_id', '<p class="help-block">:message</p>') !!}
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
<div class="form-group {{ $errors->has('answers') ? 'has-error' : ''}}">
    {!! Form::label('answers[]', 'Answer 1: ', ['class' => 'col-sm-4 control-label']) !!}
    <div class="col-sm-5">
        {!! Form::text('answers[]', null, ['class' => 'form-control', 'required' => 'required']) !!}
        {!! $errors->first('answers', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('answers') ? 'has-error' : ''}}">
    {!! Form::label('answers[]', 'Answer 2: ', ['class' => 'col-sm-4 control-label']) !!}
    <div class="col-sm-5">
        {!! Form::text('answers[]', null, ['class' => 'form-control']) !!}
        {!! $errors->first('answers', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('answers') ? 'has-error' : ''}}">
    {!! Form::label('answers[]', 'Answer 3: ', ['class' => 'col-sm-4 control-label']) !!}
    <div class="col-sm-5">
        {!! Form::text('answers[]', null, ['class' => 'form-control']) !!}
        {!! $errors->first('answers', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('answers') ? 'has-error' : ''}}">
    {!! Form::label('answers[]', 'Answer 4: ', ['class' => 'col-sm-4 control-label']) !!}
    <div class="col-sm-5">
        {!! Form::text('answers[]', null, ['class' => 'form-control']) !!}
        {!! $errors->first('answers', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('answers') ? 'has-error' : ''}}">
    {!! Form::label('answers[]', 'Answer 5: ', ['class' => 'col-sm-4 control-label']) !!}
    <div class="col-sm-5">
        {!! Form::text('answers[]', null, ['class' => 'form-control']) !!}
        {!! $errors->first('answers', '<p class="help-block">:message</p>') !!}
    </div>
</div>
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
    <div class="col-sm-offset-4 col-sm-5">
        {!! Form::submit('Create', ['class' => 'btn btn-block btn-primary form-control']) !!}
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