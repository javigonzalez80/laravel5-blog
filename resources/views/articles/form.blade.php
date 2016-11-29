		<div class="form-group">
			{!! Form::label('title', 'Title:') !!}
			{!! Form::text('title', null, ['class' => 'form-control']) !!}
		</div>
		
		<div class="form-group">
			{!! Form::label('category_id', 'Category:') !!}
			{!! Form::select('category_id', $categories, null, ['id' => 'category_id', 'class' => 'form-control']) !!}
		</div>
		
		<div class="form-group">
			{!! Form::label('slug', 'Slug:') !!}
			{!! Form::text('slug', null, ['class' => 'form-control']) !!}
		</div>
		
		<div class="form-group">
			{!! Form::label('meta_description', 'Meta Description:') !!}
			{!! Form::text('meta_description', null, ['class' => 'form-control']) !!}
		</div>
		
		<div class="form-group">
			{!! Form::label('excerpt', 'Excerpt:') !!}
			{!! Form::text('excerpt', null, ['class' => 'form-control']) !!}
		</div>
		
		<div class="form-group">
			{!! Form::label('body', 'Body:') !!}
			{!! Form::textarea('body', null, ['id' => 'body', 'class' => 'form-control']) !!}
		</div>
		
		<div class="form-group">
			{!! Form::label('published_at', 'Date:') !!}
			{!! Form::input('date', 'published_at', $article->published_at->format('Y-m-d'), ['class' => 'form-control']) !!}
		</div>
		
		<div class="form-group">
			{!! Form::label('tag_list', 'Tags:') !!}
			{!! Form::select('tag_list[]', $tags, null, ['id' => 'tag_list', 'class' => 'form-control', 'multiple']) !!}
		</div>
		
		<div class="form-group">
			{!! Form::submit($submitButtonText, ['class' => 'btn btn-primary form-control']) !!}
		</div>
		
		@section('footer')
		
		<script>
            // Replace the <textarea id="editor1"> with a CKEditor
            // instance, using default configuration.
            CKEDITOR.replace( 'body' );
		</script>
		
		<script>
			$('select#category_id.form-control').select2({
				placeholder: 'Choose a Category'
			});
		</script>
		
		<script>
			$('select#tag_list.form-control').select2({
				placeholder: 'Choose a Tag'
			});
		</script>
		
		@endsection
		