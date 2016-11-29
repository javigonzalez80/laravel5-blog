@extends('backend')

@section('content')

	<h1>Dashboard</h1>
	
	<hr/>
	
	<h2>Tags</h2>
	
	<a href="{{ url('admin/tags/create') }}" class="btn btn-primary btn-md" role="button">Create Tag</a>
	
	<hr/>
	
	<table class="table table-bordered">
		<thead>
			<tr>
				<th>Id</th>
				<th>Name</th>
				<th>Show Tag</th>
				<th>Edit Tag</th>
				<th>Delete Tag</th>
			</tr>
		</thead>
		<tbody>
	
	@foreach ($tags as $tag)
	
			<tr>
				<td>{{ $tag->id }}</td>
				<td>{{ $tag->name }}</td>
				<td><a href="{{ route('admin.tags.show', $tag->id) }}">Show</a></td>
				<td><a href="{{ route('admin.tags.edit', $tag->id) }}">Edit</a></td>
				<td>
					{!! Form::open([
						'method' => 'DELETE',
						'route' => ['admin.tags.destroy', $tag->id]
					]) !!}
					{!! Form::submit('Delete Tag?', ['class' => 'btn btn-danger']) !!}
					{!! Form::close() !!}
				</td>
			</tr>
	@endforeach
	
		</tbody>
	</table>
	

@stop