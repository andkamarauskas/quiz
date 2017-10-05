@extends('backLayout.app')
@section('title')
Quiz
@stop

@section('content')

<h1>Quiz <a href="{{ url('admin/quiz')}}" class="btn btn-success pull-right">Back</a></h1>
<div class="table-responsive">
    <table class="table table-bordered table-striped table-hover">
        <thead>
            <tr>
                <th>ID.</th>
                <th>Title</th>
                <th>About</th>
                <th>Persons Num</th>
                <th>Quests Num</th>
                <th>Date</th>
                <th>Time</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $quiz->id }}</td>
                <td> {{ $quiz->title }} </td>
                <td> {{ $quiz->about }} </td>
                <td> {{ $quiz->persons_num }} </td>
                <td> {{ $quiz->quests_num }} </td>
                <td> {{ $quiz->date }} </td>
                <td> {{ $quiz->time }} </td>
                <td>
                    <a href="{{ url('admin/quiz/' . $quiz->id . '/edit') }}" class="btn btn-primary btn-xs">Update</a> 
                    {!! Form::open([
                        'method'=>'DELETE',
                        'url' => ['admin/quiz', $quiz->id],
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
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">Find And Add Quests To Quiz</div>
                <div class="panel-body">
                    <input type="text" autocomplete="off" id="search" class="form-control " placeholder="Enter quest title">
                    <div id="search-results" >
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">Added Quests</div>
                <div class="panel-body">
                    <div id="quests-list"></div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>

    $(document).ready(function(){
        get_added_quests();

        $("#search").keyup(function(){
            var str=  $("#search").val();
            if(str == "")
            {
                $( "#search-results" ).html("<b>Quests will be listed here</b>"); 
            }
            else
            {
                $.get( "{{ url('quest/livesearch') }}",{ "str" : str}, function( data )
                {
                    $('#search-results').html(data);
                });
            }
        });

    });
    function add(quest_id)
    {
        $.get( "{{ url('quest/attach') }}",{ "quest_id" : quest_id , "quiz_id" : {{$quiz->id}} }, function( data )
        {
            get_added_quests();
        });
    }
    function remove(quest_id)
    {
        $.get( "{{ url('quest/detach') }}",{ "quest_id" : quest_id , "quiz_id" : {{$quiz->id}} }, function( data )
        {
            get_added_quests();
        });
    }
    function get_added_quests()
    {
        $.get( "{{ url('quest/list') }}",{ "quiz_id" : {{$quiz->id}} }, function( data )
                {
                    $('#quests-list').html(data);
                });
    }
</script>
@endsection