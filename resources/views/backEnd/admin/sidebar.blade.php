<div class="col-md-3">


    <div class="panel panel-default panel-flush">
        <div class="panel-heading">Sidebar</div>
        <div class="panel-body">
            <ul class="nav">
                <li><a href="{{ url('/admin/quests/approve') }}">Quests To Approve <span id="questsCount"></span></a></li>
            </ul>
        </div>
    </div>

</div>

@section('scripts')
<script>

    $(document).ready(function(){
        questsToApproveCount();
    });

    function questsToApproveCount()
    {
        $.get( "{{ url('admin/quests/approve/count') }}",function( data )
        {
            $('#questsCount').html('('+ data +')');
        });
    }
</script>
@endsection