@extends('backend')

@section('content')

	<h1>Edit: {!! $comment->name !!}</h1>
	
	<hr />
	
	{!! Form::model($comment, ['method' => 'PATCH', 'url' => 'admin/comments/' . $comment->id]) !!}
		
		@include('comments.form', ['submitButtonText' =>  'Update Comment'])
		
	{!! Form::close() !!}
	
	@include('errors.formerror')
	
@stop