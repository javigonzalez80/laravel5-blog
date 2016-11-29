@extends('backend')

@section('content')

	<h1>Edit: {!! $category->name !!}</h1>
	
	<hr />
	
	{!! Form::model($category, ['method' => 'PATCH', 'url' => 'admin/categories/' . $category->id]) !!}
		
		@include('categories.form', ['submitButtonText' =>  'Update Category'])
		
	{!! Form::close() !!}
	
	@include('errors.formerror')
	
@stop