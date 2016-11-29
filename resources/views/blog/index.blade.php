@extends('frontend')

@section('title', 'Blog')

@section('description', 'Blog')

@section('content')

	<div class="page-header">
	<h1>Blog</h1>
	</div>
	
	<div class="row">
	
	<div class="col-md-9">
	
	@if (count($articles) < 1)
		<p><strong>No  Articles found ...</strong></p>
	@else
	
	@foreach ($articles as $article)
	
	<div class="post">
		
		<h2><a href="{{ url('/blog', $article->slug) }}">{{ $article->title }}</a></h2>
		<p><em>{{ $article->published_at->format('d-m-Y') }} | {{ $article->user->name }}</em></p>
		
		<div class="entry">
			<p>{!! $article->excerpt !!}</p> 
		</div>
			
		<p><a href="{{ url('/blog', $article->slug) }}">Read More...</a></p>
		
		
	</div>
	
	@endforeach
	
	@endif
	
	@unless ($articles < '11')
		<div class="pagination">
		{!! $articles->render() !!}
		</div>
	@endunless
	
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
