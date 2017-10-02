@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-info">
                <div class="panel-heading">{{$quest->question}}</div>

                <div class="panel-body">
                    <img alt="no-image" src="{{ asset('/images/quests/answer_3.jpg') }}" class="img-responsive"></img>
                    <h4>Type answers:</h4>
                    {!! Form::open(['url' => 'train/next', 'class' => 'form-horizontal']) !!}
                    <input type="text" name="quest_id" value = "{{$quest->id}}" hidden>
                    <input type="text" name="train_id" value = "{{$train_id}}" hidden>
                    <div class="form-group {{ $errors->has('answers') ? 'has-error' : ''}}">
                        <div class="col-sm-12">
                            {!! Form::text('answers[]', null, ['class' => 'form-control', 'required' => 'required']) !!}
                            {!! $errors->first('answers', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-6">
                            {!! Form::submit('Next', ['class' => 'btn btn-block btn-primary form-control']) !!}
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
