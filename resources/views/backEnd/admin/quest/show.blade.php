@extends('backLayout.app')
@section('title')
Quest
@stop

@section('content')

    <h1>Quest</h1>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>ID.</th> <th>Category Id</th><th>Title</th><th>Question</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $quest->id }}</td> <td> {{ $quest->category_id }} </td><td> {{ $quest->title }} </td><td> {{ $quest->question }} </td>
                </tr>
            </tbody>    
        </table>
    </div>

@endsection