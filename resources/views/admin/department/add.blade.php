@extends('admin.layouts.master')
@section('content')
<div class="container-fluid">
	<h4>ADD TABLE</h4>
	<hr>
	@if(count($errors) > 0)
	<div class="alert alert-danger">
		@foreach($errors->all() as $err)
		{{$err}}<br>
		@endforeach
	</div>
	@endif
	<form  method="POST" action="{{route('admin.department.postAdd' )}}">
		<div class="form-group col-md-6">
			<input type="hidden" name="_token" value="{{csrf_token()}}">
			<label for="formGroupExampleInput" class="bmd-label-floating" style="font-weight: bold;">Name</label>
			<input type="text" class="form-control" name="name" placeholder="Nhập phòng ban ở đây">
		</div>
		<div class="form-group col-md-6"> <!-- Submit button !-->
			<button type="submit" class="btn btn-outline-success">Save</button>
			<a href="{{ route('admin.department.list')}}" class=" btn btn-outline-secondary">Cancel</a>
		</div>	
	</form>	
</div>
@endsection