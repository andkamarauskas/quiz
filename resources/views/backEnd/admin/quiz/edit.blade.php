@extends('backLayout.app')
@section('title')
Edit Quiz
@stop

@section('content')

    <h1>Edit Quiz <a href="{{ url('admin/quiz')}}" class="btn btn-success pull-right">Back</a></h1>
    <hr/>

    {!! Form::model($quiz, [
        'method' => 'PATCH',
        'url' => ['admin/quiz', $quiz->id],
        'class' => 'form-horizontal'
    ]) !!}

                <div class="form-group {{ $errors->has('title') ? 'has-error' : ''}}">
                {!! Form::label('title', 'Title: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('title', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('title', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('about') ? 'has-error' : ''}}">
                {!! Form::label('about', 'About: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::textarea('about', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('about', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('persons_num') ? 'has-error' : ''}}">
                {!! Form::label('persons_num', 'Persons Num: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::number('persons_num', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('persons_num', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('quests_num') ? 'has-error' : ''}}">
                {!! Form::label('quests_num', 'Quests Num: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::number('quests_num', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('quests_num', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('date') ? 'has-error' : ''}}">
                {!! Form::label('date', 'Date: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::date('date', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('date', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('time') ? 'has-error' : ''}}">
                {!! Form::label('time', 'Time: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::input('time', 'time', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('time', '<p class="help-block">:message</p>') !!}
                </div>
            </div>


    <div class="form-group">
        <div class="col-sm-offset-3 col-sm-3">
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

@endsection