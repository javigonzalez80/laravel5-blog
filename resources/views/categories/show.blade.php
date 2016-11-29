@extends('backend')

@section('content')

	
	<h1>{{ $category->name }}</h1>
	
	<hr/>
	
	<p><strong>Slug:</strong> {{ $category->slug }}</p>
	
	
@stop