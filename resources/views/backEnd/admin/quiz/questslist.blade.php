<div class="table-responsive live-search-table">
    <table class="table table-bordered table-striped table-hover">
        <tr>
            <th></th>
            <th>Title</th>
            <th>question</th>
        </tr>
        @if (isset($quiz->quests) && count($quiz->quests) > 0)
        @foreach( $quiz->quests as $key => $quest )
        <tr>
            <td>{{$key+1}}</td>
            <td>{{ $quest->title }}</td>
            <td><a href="{{ url('admin/quest', $quest->id) }}">{{ $quest->question}}<a></td>
            <td><button id="" class="btn btn-warning btn-xs" value="{{$quest->id}}" onclick="remove(this.value);">Remove</button></td>
        </tr>
        @endforeach
        @endif
    </table>
</div>
