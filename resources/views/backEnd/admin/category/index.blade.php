@extends('backLayout.app')
@section('title')
Category
@stop

@section('content')
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <h1>Category <a href="{{ url('admin/category/create') }}" class="btn btn-primary pull-right btn-sm">Add New Category</a></h1>
            <div class="table table-responsive">
                <table class="table table-bordered table-striped table-hover" id="tbladmin/category">
                    <thead>
                        <tr>
                            <th>ID</th><th>Title</th><th class="text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($category as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td class="col-md-6"><a href="{{ url('admin/category', $item->id) }}">{{ $item->title }}</a></td>
                            <td class="text-right">
                                <a href="{{ url('admin/category/' . $item->id . '/edit') }}" class="btn btn-primary btn-xs">Update</a> 
                                {!! Form::open([
                                    'method'=>'DELETE',
                                    'url' => ['admin/category', $item->id],
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
    </div>

@endsection

@section('scripts')
<script type="text/javascript">
    $(document).ready(function(){
        $('#tbladmin/category').DataTable({
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