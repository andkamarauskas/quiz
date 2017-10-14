@extends('layouts.app')

@section('content')
<div class="container">
	<h1>Quizes <a href="{{ url('admin/quiz/create') }}" class="btn btn-primary pull-right btn-sm">Add New Quiz</a></h1>
	<div class="table table-responsive">
		<table class="table table-bordered table-striped table-hover" id="tbladmin/quiz">
			<thead>
				<tr>
					<th>ID</th><th>Title</th><th>About</th><th>Persons Num</th><th>Quests Num</th><th>Time Left</th><th>Actions</th>
				</tr>
			</thead>
			<tbody>
				@foreach($quizes as $item)
				<tr>
					<td>{{ $item->id }}</td>
					<td><a href="#">{{ $item->title }}</a></td>
					<td>{{ $item->about }}</td>
					<td>{{ $item->persons_num }}</td>
					<td>{{$item->quests_num}}</td>
					<td><span id="number">Xd XXh XXm XXs</span></td>
					<td>
						<a href="#" class="btn btn-warning btn-xs">View</a>
						<a href="#" class="btn btn-success btn-xs">Join</a>
					</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
	@endsection

	@section('scripts')
	<script>

		$(document).ready(function(){
			var countDownDate;
			$.get( "{{ url('quiz/countdown') }}",function( data )
			{
				countDownDate = new Date(data);
			});

			var x = setInterval(function() {
				var now = new Date().getTime();
				var distance = countDownDate - now;
				var days = Math.floor(distance / (1000 * 60 * 60 * 24));
				var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
				var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
				var seconds = Math.floor((distance % (1000 * 60)) / 1000);
				var dateTime = days + "d " + hours + "h "+ minutes + "m " + seconds + "s ";
				$('#number').html(dateTime);
				if (distance < 0) {
					clearInterval(x);
					$('#number').html('EXPIRED');
				}
			}, 1000);

		});
	</script>



	@endsection