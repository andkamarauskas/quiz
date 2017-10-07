@extends('layouts.app')
@section('title')
Quest
@stop

@section('content')

<div class="container">
    <h1>Your Quests <a href="{{ url('user/quest/create') }}" class="btn btn-success pull-right btn-sm">Add New Quest</a></h1>
    <div class="table table-responsive">
        <table class="table table-bordered table-striped table-hover" id="tbladmin/quest">
            <thead>
                <tr>
                    <th>ID</th><th>Question</th><th>Title</th><th>Category</th><th>Status</th><th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($userQuests as $quest)
                <tr>
                    <td>{{ $quest->id }}</td>
                    <td><a href="{{ url('admin/quest', $quest->id) }}">{{ $quest->question }}</a></td>
                    <td>{{ $quest->title }}</td>
                    <td>{{ $quest->category->title }}</td>
                    <td>{{ $quest->status }}</td>
                    <td>
                        <a href="{{ url('admin/quest/' . $quest->id . '/edit') }}" class="btn btn-primary btn-xs">Update</a> 
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['admin/quest', $quest->id],
                            'style' => 'display:inline'
                            ]) !!}
                            {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-xs']) !!}
                            {!! Form::close() !!}
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    @endsection

    @section('scripts')
    <script type="text/javascript">
        $(document).ready(function(){
            $('#tbladmin/quest').DataTable({
                columnDefs: [{
                    targets: [0],
                    visible: false,
                    searchable: false
                },
                ],
                order: [[0, "asc"]],
            });
        });
    </script>
    @endsection