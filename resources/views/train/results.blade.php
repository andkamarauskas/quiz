@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
        	<div class="panel panel-success">
        		<div class="panel-heading">
                    <h3>Quiz Results</h3>
                    {{$correct_answers_num}} Your Aswers Was Right
                </div>
                <div class="panel-body">
                 @foreach($train_quests as $key => $train_quest)

                 <div class="">
                    <h3 class="text-center">
                        {{$key+1}} {{$train_quest->quest->question}}
                        @if($train_quest->correct)
                        <div class="text-success"><strong>You answered right</strong></div>
                        @else
                        <div class="text-danger"><strong>You answered wrong</strong></div>
                        @endif
                    </h3>
                   
                <strong>Quest</strong>
                <div class="results-img">
                    <img class="img img-responsive" alt="no-image" src="{{ $train_quest->quest->image->quest_img }}">
                </div>
                <p>
                    <h4>Your Answers:</h4>
                    <ul>
                        @if(count($train_quest->user_answers)>0)
                        @foreach($train_quest->user_answers as $answer)
                        <li>{{$answer->answer}}</li>
                        @endforeach
                        @else
                        <li>Not Answered</li>
                        @endif
                    </ul>
                </p>
                <strong>Answer</strong>
                <div class="results-img">
                    <img class="img img-responsive" alt="no-image" src="{{ $train_quest->quest->image->answer_img }}">
                </div>
                <p>
                    <h4>Available Answers:</h4>
                    <ul>
                        @foreach($train_quest->quest->answers as $answer)
                        <li>{{$answer->answer}}</li>
                        @endforeach
                    </ul>
                </p>
            </div>
            <hr>
            @endforeach
        </div>
    </div>
</div>
</div>
</div>
@endsection
