@extends('backend')

@section('content')

	
	<h1>{{ $article->title }}</h1>
	
	<hr/>
	
	<p><strong>Author:</strong> {{ $article->user->name }}</p>
	<p><strong>Category:</strong> {{ $article->category->name }}</p>
	<p><strong>Date:</strong> {{ $article->published_at->format('d-m-Y') }}</p>
	<p><strong>Slug:</strong> {{ $article->slug }}</p>
	<p><strong>Meta Description:</strong> {{ $article->meta_description }}</p>
		
	<p>{{ $article->excerpt }}</p>
		
	<p>{{ $article->body }}</p>
	
	<p><strong>Tags:</strong></p>
	
		<ul>
			@foreach ($article->tags as $tag)
				<li>{{ $tag->name }}</a></li>
			@endforeach
		</ul>
	
@stop