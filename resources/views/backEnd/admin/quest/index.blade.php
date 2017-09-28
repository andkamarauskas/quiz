@extends('backLayout.app')
@section('title')
Quest
@stop

@section('content')

    <h1>Quest <a href="{{ url('admin/quest/create') }}" class="btn btn-primary pull-right btn-sm">Add New Quest</a></h1>
    {{ HTML::image('images/quests/6.jpg') }}
    <div class="table table-responsive">
        <table class="table table-bordered table-striped table-hover" id="tbladmin/quest">
            <thead>
                <tr>
                    <th>ID</th><th>Question</th><th>Title</th><th>Image Url</th><th>Category</th><th>Actions</th>
                </tr>
            </thead>
            <tbody>
            @foreach($quest as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td><a href="{{ url('admin/quest', $item->id) }}">{{ $item->question }}</a></td>
                    <td>{{ $item->title }}</td>
                    <td>{{ $item->image_url }}</td>
                    <td>{{ $item->category->title }}</td>
                    <td>
                        <a href="{{ url('admin/quest/' . $item->id . '/edit') }}" class="btn btn-primary btn-xs">Update</a> 
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['admin/quest', $item->id],
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