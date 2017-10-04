@extends('backLayout.app')
@section('title')
Quiz
@stop

@section('content')

    <h1>Quiz</h1>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>ID.</th> <th>Title</th><th>About</th><th>Persons Num</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $quiz->id }}</td> <td> {{ $quiz->title }} </td><td> {{ $quiz->about }} </td><td> {{ $quiz->persons_num }} </td>
                </tr>
            </tbody>    
        </table>
    </div>

@endsection