@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-primary">
                <div class="panel-heading">{{$quest->question}}</div>

                <div class="panel-body">
                    <img alt="no-image" src="{{ $quest->image->quest_img }}" class="img-responsive"></img>
                    
                    <h4>Type answers:</h4>
                    {!! Form::open(['url' => 'train/next', 'class' => 'form-horizontal']) !!}
                    <input type="text" name="quest_id" value = "{{$quest->id}}" hidden>
                    <input type="text" name="train_id" value = "{{$train_id}}" hidden>
                    <div class="form-group {{ $errors->has('answers') ? 'has-error' : ''}}">
                        <div class="col-sm-12">
                            {!! Form::text('answers', null, ['class' => 'form-control','id' => 'answers' ,'required' => 'required']) !!}
                            {!! $errors->first('answers', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-3">
                            <span id="counter_text">Time: <span id="counter"></span> s</span>
                        </div>
                        <div class="col-sm-9">
                            {!! Form::submit('Next', ['class' => 'btn btn-block btn-primary form-control', 'id' => 'submit-btn']) !!}
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
    
</div>
<script src="{{ asset('js/counter.js') }}"></script>
@endsection
