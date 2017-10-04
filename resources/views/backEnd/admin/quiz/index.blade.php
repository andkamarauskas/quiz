@extends('backLayout.app')
@section('title')
Quiz
@stop

@section('content')

    <h1>Quiz <a href="{{ url('admin/quiz/create') }}" class="btn btn-primary pull-right btn-sm">Add New Quiz</a></h1>
    <div class="table table-responsive">
        <table class="table table-bordered table-striped table-hover" id="tbladmin/quiz">
            <thead>
                <tr>
                    <th>ID</th><th>Title</th><th>About</th><th>Persons Num</th><th>Actions</th>
                </tr>
            </thead>
            <tbody>
            @foreach($quiz as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td><a href="{{ url('admin/quiz', $item->id) }}">{{ $item->title }}</a></td><td>{{ $item->about }}</td><td>{{ $item->persons_num }}</td>
                    <td>
                        <a href="{{ url('admin/quiz/' . $item->id . '/edit') }}" class="btn btn-primary btn-xs">Update</a> 
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['admin/quiz', $item->id],
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

@endsection

@section('scripts')
<script type="text/javascript">
    $(document).ready(function(){
        $('#tbladmin/quiz').DataTable({
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