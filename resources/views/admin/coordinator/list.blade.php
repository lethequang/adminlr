@extends('admin.layouts.master')
@section('content')
<div class="container-fluid">
   <h4>ADD STAFF</h4>
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
         <label for="formGroupExampleInput" class="bmd-label-floating" style="font-weight: bold;">Staff</label>
         <input type="text" class="form-control" name="name" placeholder="Nhập tên ở đây">
      </div>
      <div class="form-group col-md-6">
         <label for="formGroupExampleInput2" class="bmd-label-floating" style="font-weight: bold;">Department(Phòng Ban)</label>
         <select  class="form-control" id="department" name="states[]" multiple="multiple">
            @foreach($department as $value)
            <option value="{{ $value->name}}">{{ $value->name}}</option>
            @endforeach
         </select>
      </div>
      <div  class="form-group col-md-6">
         <label for="formGroupExampleInput2" class="bmd-label-floating" style="font-weight: bold;">Position</label>
         <input type="text" class="form-control" name="order" placeholder="Nhập địa chỉ ở đây">
      </div>
      <div class="form-group col-md-6">
         <!-- Submit button !-->
         <button type="submit" class="btn btn-outline-success">Save</button>
         <a href="{{ route('admin.staff.list')}}" class=" btn btn-outline-secondary">Cancel</a>
      </div>
   </form>
</div>
@endsection