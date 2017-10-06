<div class="table-responsive live-search-table">
    <table class="table table-bordered table-striped table-hover">
        <tr>
            <th>Title</th>
            <th>question</th>
        </tr>
        @if (isset($quests) && count($quests) > 0)
        @foreach( $quests as $quest )
        <tr>
            <td>{{ $quest->title }}</td>
            <td>{{ $quest->question}}</td>
            <td><button id="" class="btn btn-primary btn-xs" value="{{$quest->id}}" onclick="add(this.value);">Add</button></td>
        </tr>
        @endforeach
        @endif
    </table>
</div>
