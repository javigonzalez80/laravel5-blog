		<div class="form-group">
			{!! Form::label('article_id', 'Article:') !!}
			{!! Form::select('article_id', $article, null, ['id' => 'article_id', 'class' => 'form-control']) !!}
		</div>
		
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
			{!! Form::textarea('body', null, ['id' => 'body', 'class' => 'form-control']) !!}
		</div>
		
		<div class="form-group">
			{!! Form::label('approved', 'Approved:') !!}
			{!! Form::select('approved', ['0' => 'No', '1' => 'Yes'], null, ['class' => 'form-control']) !!}
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
			$('select#article_id.form-control').select2({
				placeholder: 'Choose a Article'
			});
		</script>
		
		@endsection