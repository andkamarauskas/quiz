@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
        	<div class="panel panel-success">
        		<div class="panel-heading"><h3>Correct asnwers: {{$correct_answers_num}}</h3></div>
        		<div class="panel-body">
        			@foreach($train_quests as $train_quest)
                    <p>
                        <p>
                            <strong>{{$train_quest->quest->question}}</strong>
                            <img class="img img-responsive" alt="no-image" src="{{ asset('images/quests/quest_' . $train_quest->quest->id . '.jpg') }}">
                        </p>
                        <p>
                            <strong>Available Answers</strong>
                            <img class="img img-responsive" alt="no-image" src="{{ asset('images/quests/answer_' . $train_quest->quest->id . '.jpg') }}">
                            <ul>
                            @foreach($train_quest->quest->answers as $answer)
                                <li>{{$answer->answer}}</li>
                            @endforeach
                            </ul>
                        </p>

                    </p>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
