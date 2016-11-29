@extends('backend')

@section('content')

	<h1>Create Category</h1>
	
	<hr />
	
	{!! Form::model($category = new \App\Category, ['url' => 'admin/categories']) !!}
	
		@include('categories.form', ['submitButtonText' =>  'Add Category'])
	
	{!! Form::close() !!}
	
	@include('errors.formerror')
	
@stop