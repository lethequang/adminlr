@extends('admin.layouts.master')
@section('content')
<div class="container-fluid">
	<h4>EDIT POSITION</h4>
	<hr>
	@if(count($errors) > 0)
	<div class="alert alert-danger">
		@foreach($errors->all() as $err)
		{{$err}}<br>
		@endforeach
	</div>
	@endif
	<form  method="POST" action="">
		<div class="form-group col-md-6">
			<input type="hidden" name="_token" value="{{csrf_token()}}">
			<label for="formGroupExampleInput" class="bmd-label-floating" style="font-weight: bold;">Name</label>
			<input type="text" class="form-control" name="name" value="{{$position->name}}">
		</div>
		<div  class="form-group col-md-6"> <!-- manually specified --> 
			<label for="formGroupExampleInput2" class="bmd-label-floating" style="font-weight: bold;">Order</label>
			<input type="text" class="form-control" name="order" value="{{$position->sort_order}}">
		</div>

		<div class="form-group col-md-6">
			<label for="" style="font-weight: bold;" >Chuyên mục chức vụ</label>
			<select  class="form-control" id="" name="parent">
				<option value="0">Vui Lòng Chọn	</option>
				<?php category_parent($parent); ?>
			</select>
		</div>

		<div class="form-group col-md-6"> <!-- Submit button !-->
			<button type="submit" class="btn btn-outline-success">Save</button>
			<a href="{{ route('admin.position.list')}}" class=" btn btn-outline-secondary">Cancel</a>
		</div>	
	</form>	
</div>
@endsection
