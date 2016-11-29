@extends('backend')

@section('content')

	<h1>Dashboard</h1>
	
	<hr/>
	
	<h2>Articles</h2>
	
	<a href="{{ url('admin/articles/create') }}" class="btn btn-primary btn-md" role="button">Create Article</a>
	
	<hr/>
	
	<table class="table table-bordered">
		<thead>
			<tr>
				<th>Id</th>
				<th>Title</th>
				<th>Show Article</th>
				<th>Edit Article</th>
				<th>Delete Article</th>
			</tr>
		</thead>
		<tbody>
	
	@foreach ($articles as $article)
	
			<tr>
				<td>{{ $article->id }}</td>
				<td>{{ $article->title }}</td>
				<td><a href="{{ route('admin.articles.show', $article->id) }}">Show</a></td>
				<td><a href="{{ route('admin.articles.edit', $article->id) }}">Edit</a></td>
				<td>
					{!! Form::open([
						'method' => 'DELETE',
						'route' => ['admin.articles.destroy', $article->id]
					]) !!}
					{!! Form::submit('Delete Article?', ['class' => 'btn btn-danger']) !!}
					{!! Form::close() !!}
				</td>
			</tr>
	@endforeach
	
		</tbody>
	</table>
	

@stop