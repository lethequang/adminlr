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
   <form  method="POST" action="" enctype="multipart/form-data">
      <div class="form-group col-md-6">
         <input type="hidden" name="_token" value="{{csrf_token()}}">
         <label for="formGroupExampleInput" class="bmd-label-floating" style="font-weight: bold;">Name</label>
         <input type="text" class="form-control" name="name" value="{{$staff->name}}" placeholder="Nhập tên ở đây">
      </div>
      <div  class="form-group col-md-6">
         <!-- manually specified --> 
         <label for="formGroupExampleInput2" class="bmd-label-floating" style="font-weight: bold;">Password</label>
         <input type="password" class="form-control" name="password" placeholder="Nhập mật khẩu ở đây">
      </div>
      <div  class="form-group col-md-6">
         <!-- manually specified --> 
         <label for="formGroupExampleInput2" class="bmd-label-floating" style="font-weight: bold;">Email</label>
         <input type="email" class="form-control" name="email" value="{{$staff->email}}" placeholder="Nhập email ở đây">
      </div>
      <div  class="form-group col-md-6">
         <!-- manually specified --> 
         <label for="formGroupExampleInput2" class="bmd-label-floating" style="font-weight: bold;">Address</label>
         <input type="text" class="form-control" name="address" value="{{$staff->address}}" placeholder="Nhập địa chỉ ở đây">
      </div>
      <div  class="form-group col-md-6">
         <!-- manually specified --> 
         <label for="formGroupExampleInput2" class="bmd-label-floating" style="font-weight: bold;">NumberPhone</label>
         <input type="text" class="form-control" name="number_phone" value="{{$staff->number_phone}}" placeholder="Nhập số điện thoại ở đây">
      </div>
      <div  class="form-group col-md-6">
         <!-- manually specified --> 
         <label for="formGroupExampleInput2" class="bmd-label-floating" style="font-weight: bold;">Images</label>
         <input type="file" class="form-control" name="images"  placeholder="Vui lòng chọn file">
      </div>
      <div class="form-group col-md-6">
         <label for="formGroupExampleInput2" class="bmd-label-floating" style="font-weight: bold;">Department(Phòng Ban)</label>
         <select  class="form-control" id="department" name="department[]" multiple="multiple">
            @foreach($department as $value)
            <option value="{{ $value->id}}" 
            
          

             >{{ $value->name}}</option>
            @endforeach
         </select>
      </div>
      <div class="form-group col-md-6">
         <label for="formGroupExampleInput2" class="bmd-label-floating" style="font-weight: bold;">Position(Chức vụ)</label>
         <select  class="form-control" id="position" name="position[]" multiple="multiple" placeholder="Nhập chức vụ ở đây">
            @foreach($position as $value)
            <option value="">{{ $value->name}}</option>
            @endforeach
         </select>
      </div>
      <div  class="form-group col-md-6">
         <!-- manually specified --> 
         <label for="formGroupExampleInput2" class="bmd-label-floating" style="font-weight: bold;">Status</label>
         <label class="radio-inline">
         <input type="radio" value="0" name="status" checked>On
         </label>
         <label class="radio-inline">
         <input type="radio" value="1" name="status">Off
         </label>
      </div>
        <div  class="form-group col-md-6">
         <label for="formGroupExampleInput2" class="bmd-label-floating" style="font-weight: bold;">Gender</label>
         <label class="radio-inline">
         <input type="radio" value="0" name="gender" checked>Nam
         </label>
         <label class="radio-inline">
         <input type="radio" value="1" name="gender">Nữ
         </label>
      </div>
      <div  class="form-group col-md-6">
         <label for="formGroupExampleInput2" class="bmd-label-floating" style="font-weight: bold;">Is_root</label>
         <label class="radio-inline">
         <input type="radio" value="0" name="is_root" checked>Yes
         </label>
         <label class="radio-inline">
         <input type="radio" value="1" name="is_root">No
         </label>
      </div>
      <div class="form-group col-md-6">
         <!-- Submit button !-->
         <button type="submit" class="btn btn-outline-success">Save</button>
         <a href="{{ route('admin.staff.list')}}" class=" btn btn-outline-secondary">Cancel</a>
      </div>
   </form>
</div>

@endsection