@extends('frontend')

@section('title'){{ $article->title }}@stop

@section('description'){!! $article->meta_description !!}@stop

@section('content')
	
	<div class="page-header">
	<h1>Blog</h1>
	</div>
	
	<div class="row">
	
	<div class="col-md-9">
	
	<h2>{{ $article->title }}</h2>
	
	<p><em>{{ $article->published_at->format('d-m-Y') }} | {{ $article->user->name }}</em></p>
	
	<div class="entry">
		<p>{{ $article->excerpt }}</p>
		
		<p>{!! $article->body !!}</p>
	</div>
	
	<hr>
	
	<div class="comments">
	
		@if (count($comments) < 1)
		<p><strong>No  Comments found ...</strong></p>
		@else
		
		@foreach ($comments as $comment)
				<p><strong>{{ $comment->name }}</strong></p>
				<p><em>{{ $comment->created_at }} | {{ $comment->email }}</em></p>
				<p>{!! $comment->body !!}</p>
				<hr>
		@endforeach
		
		@endif
		
		@unless ($comments < '11')
			<div class="pagination">
			{!! $comments->render() !!}
			</div>
		@endunless
	
	</div>
	
	<div class="commentform">
		
		<h3><u>Commentform</u></h3>
		
			
		{!! Form::open(['route' => ['blog.commentform', $article->id]]) !!}

			
			<div class="form-group">
				{!! Form::label('name', 'Name:') !!}
				{!! Form::text('name', null, ['class' => 'form-control']) !!}
			</div>
				
			<div class="form-group">
				{!! Form::label('email', 'Email:') !!}
				{!! Form::text('email', null, ['class' => 'form-control']) !!}
			</div>
			
			<div class="form-group">
				{!! Form::label('body', 'Comment:') !!}
				{!! Form::textarea('body', null, ['class' => 'form-control']) !!}
			</div>
			
			<div class="form-group">
				{!! Form::submit('Add Comment', ['class' => 'btn btn-primary form-control']) !!}
			</div>

			{!! Form::close() !!}
			
			@include('errors.formerror')
		
	
	</div>
	
	</div>
	
	<div class="col-md-3">
	<aside>
	
	<div class="categories">
		<h3>Categories</h3>
		<ul>
		@foreach ($categories as $category)
			<li><a href="{{ url('/blog/category', $category->slug) }}">{{ $category->name }}</a></li>
		@endforeach
		</ul>
	</div>
	
	<div class="tags">
		<h3>Tags</h3>
		<ul>
		@foreach ($tags as $tag)
			<li><a href="{{ url('/blog/tag', $tag->slug) }}">{{ $tag->name }}</a></li>
		@endforeach
		</ul>
	</div>
	
	</aside>
	</div>
	
	</div>
	
	
@stop


