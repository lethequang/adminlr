@extends('admin.layouts.master')
@section('content')
<div class="container-fluid">
	<h4>EDIT TABLE</h4>
	<hr>
	@if(count($errors) > 0)
	<div class="alert alert-danger">
		@foreach($errors->all() as $err)
		{{$err}}<br>
		@endforeach
	</div>
	@endif
	<form  method="POST" action="{{route('admin.department.postEdit', ['id' => $department->id] )}}">
		<div class="form-group col-md-6">
			<input type="hidden" name="_token" value="{{csrf_token()}}">
			<label for="formGroupExampleInput" class="bmd-label-floating" style="font-weight: bold;">Name</label>
			<input type="text" class="form-control" name="name" value="{{$department->name}}">
		</div>
		<div  class="form-group col-md-6"> <!-- manually specified --> 
			<label for="formGroupExampleInput2" class="bmd-label-floating" style="font-weight: bold;">Order</label>
			<input type="text" class="form-control" name="order" value="{{$department->sort_order}}">
		</div>
		<div class="form-group col-md-6"> <!-- Submit button !-->
			<button type="submit" class="btn btn-outline-success">Save</button>
			<a href="{{ route('admin.department.list')}}" class=" btn btn-outline-secondary">Cancel</a>
		</div>	
	</form>	
</div>
@endsection