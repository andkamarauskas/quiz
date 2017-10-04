@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-6 col-md-offset-3">
			<a href="{{route('train.start')}}" class="btn btn-block btn-primary">Start Train</a>
			
			@if ($message = Session::get('error'))
			<div class="alert alert-danger alert-block">
				<button type="button" class="close" data-dismiss="alert">×</button>	
				<strong>{{ $message }}</strong>
			</div>
			@endif
		</div>
	</div>
</div>
@endsection
