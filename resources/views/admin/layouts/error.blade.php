@if(count($errors))
<br>
	@foreach($errors->all() as $error )
	<div class="alert alert-danger fade show m-b-10">
		{{ $error }}
	</div>
	@endforeach
  @endif