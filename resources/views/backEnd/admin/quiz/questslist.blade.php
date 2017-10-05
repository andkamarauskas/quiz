<div class="table-responsive live-search-table">
    <table class="table table-bordered table-striped table-hover">
        <tr>
            <th>Title</th>
            <th>question</th>
        </tr>
        @if (isset($quiz->quests) && count($quiz->quests) > 0)
        @foreach( $quiz->quests as $quest )
        <tr>
            <td>{{ $quest->title }}</td>
            <td>{{ $quest->question}}</td>
            <td><button id="" class="btn btn-warning btn-xs" value="{{$quest->id}}" onclick="remove(this.value);">Remove</button></td>
        </tr>
        @endforeach
        @endif
    </table>
</div>
