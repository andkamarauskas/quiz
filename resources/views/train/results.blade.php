@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
        	<div class="panel panel-success">
        		<div class="panel-heading">
                    <h3>Quiz Results</h3>
                    {{$correct_answers_num}} Your Aswers Was Right
                </div>
        		<div class="panel-body">
        			@foreach($train_quests as $key => $train_quest)
                    <div class="row">
                        <div class="text-center">
                            <h3>
                                {{$key+1}} {{$train_quest->quest->question}}
                                @if($train_quest->correct)
                                <div class="text-success"><strong>You answered right</strong></div>
                                @else
                                <div class="text-danger"><strong>You answered wrong</strong></div>
                                @endif
                            </h3>
                        </div>
                        <div class="col-md-6">
                            <h4>Quest</h4>
                            <img class="img img-responsive" alt="no-image" src="{{ asset('images/quests/quest_' . $train_quest->quest->id . '.jpg') }}">
                            <p>
                                <strong>Your Answers:</strong>
                                <ul>
                                    @foreach($train_quest->user_answers as $answer)
                                    <li>{{$answer->answer}}</li>
                                    @endforeach
                                </ul>
                            </p>
                        </div>
                        <div class="col-md-6">
                            <h4>Answer</h4>
                            <img class="img img-responsive" alt="no-image" src="{{ asset('images/quests/answer_' . $train_quest->quest->id . '.jpg') }}">
                            <p>
                                <strong>Available Answers:</strong>
                                <ul>
                                    @foreach($train_quest->quest->answers as $answer)
                                    <li>{{$answer->answer}}</li>
                                    @endforeach
                                </ul>
                            </p>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
