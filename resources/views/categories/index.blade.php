@extends('backend')

@section('content')

	<h1>Dashboard</h1>
	
	<hr/>
	
	<h2>Categories</h2>
	
	<a href="{{ url('admin/categories/create') }}" class="btn btn-primary btn-md" role="button">Create Category</a>
	
	<hr/>
	
	<table class="table table-bordered">
		<thead>
			<tr>
				<th>Id</th>
				<th>Name</th>
				<th>Show Category</th>
				<th>Edit Category</th>
				<th>Delete Category</th>
			</tr>
		</thead>
		<tbody>
	
	@foreach ($categories as $category)
	
			<tr>
				<td>{{ $category->id }}</td>
				<td>{{ $category->name }}</td>
				<td><a href="{{ route('admin.categories.show', $category->id) }}">Show</a></td>
				<td><a href="{{ route('admin.categories.edit', $category->id) }}">Edit</a></td>
				<td>
					{!! Form::open([
						'method' => 'DELETE',
						'route' => ['admin.categories.destroy', $category->id]
					]) !!}
					{!! Form::submit('Delete Category?', ['class' => 'btn btn-danger']) !!}
					{!! Form::close() !!}
				</td>
			</tr>
	@endforeach
	
		</tbody>
	</table>
	

@stop