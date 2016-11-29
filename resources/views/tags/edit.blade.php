@extends('backend')

@section('content')

	<h1>Edit: {!! $tag->name !!}</h1>
	
	<hr />
	
	{!! Form::model($tag, ['method' => 'PATCH', 'url' => 'admin/tags/' . $tag->id]) !!}
		
		@include('tags.form', ['submitButtonText' =>  'Update Tag'])
		
	{!! Form::close() !!}
	
	@include('errors.formerror')
	
@stop