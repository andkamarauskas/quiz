@extends('backLayout.app')
@section('title')
Category
@stop

@section('content')

    <h1>Category</h1>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>ID.</th> <th>Title</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $category->id }}</td> <td> {{ $category->title }} </td>
                </tr>
            </tbody>    
        </table>
    </div>

@endsection