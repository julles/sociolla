@extends('layouts.layout')
@section('content')
<div class="col-lg-12">
	
	<h1>{{ $model->title }}</h1>

    <hr>
	
	<p><span class="glyphicon glyphicon-time"></span> Posted on {{ Carbon\Carbon::parse($model->created_at)->format('F d, Y H:i') }}</p>

    <hr>
	
	<p class="lead">{{ $model->sub_title }}</p>
    {!! $model->description !!}
    <hr>
</div>
@endsection