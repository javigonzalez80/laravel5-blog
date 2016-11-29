@extends('backend')

@section('content')

	<h1>Create Tag</h1>
	
	<hr />
	
	{!! Form::model($tag = new \App\Tag, ['url' => 'admin/tags']) !!}
	
		@include('tags.form', ['submitButtonText' =>  'Add Tag'])
	
	{!! Form::close() !!}
	
	@include('errors.formerror')
	
@stop