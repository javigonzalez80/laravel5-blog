@extends('backend')

@section('content')

	<h1>Dashboard</h1>
	
	<hr/>
	
	<h2>Comments</h2>
	
	<a href="{{ url('admin/comments/create') }}" class="btn btn-primary btn-md" role="button">Create Comment</a>
	
	<hr/>
	
	<table class="table table-bordered">
		<thead>
			<tr>
				<th>Id</th>
				<th>Name</th>
				<th>Show Comment</th>
				<th>Edit Comment</th>
				<th>Delete Comment</th>
			</tr>
		</thead>
		<tbody>
	
	@foreach ($comments as $comment)
	
			<tr>
				<td>{{ $comment->id }}</td>
				<td>{{ $comment->name }}</td>
				<td><a href="{{ route('admin.comments.show', $comment->id) }}">Show</a></td>
				<td><a href="{{ route('admin.comments.edit', $comment->id) }}">Edit</a></td>
				<td>
					{!! Form::open([
						'method' => 'DELETE',
						'route' => ['admin.comments.destroy', $comment->id]
					]) !!}
					{!! Form::submit('Delete Comment?', ['class' => 'btn btn-danger']) !!}
					{!! Form::close() !!}
				</td>
			</tr>
	@endforeach
	
		</tbody>
	</table>
	

@stop