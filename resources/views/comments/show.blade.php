@extends('backend')

@section('content')

	
	<h1>{{ $comment->id }}</h1>
	
	<hr/>
	
	<p><strong>Article:</strong> {{ $comment->article->title }}</p>
	<p><strong>Name:</strong> {{ $comment->name }}</p>
	<p><strong>Email:</strong> {{ $comment->email }}</p>
	<p><strong>Date:</strong> {{ $comment->created_at }}</p>
	<p><strong>Comment:</strong> {{ $comment->body }}</p>
	<p><strong>Approved:</strong> {{ $comment->approved }}</p>
	
	
@stop