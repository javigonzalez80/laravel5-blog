@extends('backend')

@section('content')

	
	<h1>{{ $tag->name }}</h1>
	
	<hr/>
	
	<p><strong>Slug:</strong> {{ $tag->slug }}</p>
	
	
@stop