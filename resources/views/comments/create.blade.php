@extends('backend')

@section('content')

	<h1>Create Comment</h1>
	
	<hr />
	
	{!! Form::model($comment = new \App\Comment, ['url' => 'admin/comments']) !!}
	
		@include('comments.form', ['submitButtonText' =>  'Add Comment'])
	
	{!! Form::close() !!}
	
	@include('errors.formerror')
	
@stop