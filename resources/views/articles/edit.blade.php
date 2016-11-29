@extends('backend')

@section('content')

	<h1>Edit: {!! $article->title !!}</h1>
	
	<hr />
	
	{!! Form::model($article, ['method' => 'PATCH', 'url' => 'admin/articles/' . $article->id]) !!}
		
		@include('articles.form', ['submitButtonText' =>  'Update Article'])
		
	{!! Form::close() !!}
	
	@include('errors.formerror')
	
@stop