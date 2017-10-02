@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <a href="{{route('train.start')}}" class="btn btn-block btn-primary">Start Train</a>
        </div>
    </div>
</div>
@endsection
