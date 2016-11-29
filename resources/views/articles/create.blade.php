@extends('backend')

@section('content')

	<h1>Create Article</h1>
	
	<hr />
	
	{!! Form::model($article = new \App\Article, ['url' => 'admin/articles']) !!}
	
		@include('articles.form', ['submitButtonText' =>  'Add Article'])
	
	{!! Form::close() !!}
	
	@include('errors.formerror')
	
@stop