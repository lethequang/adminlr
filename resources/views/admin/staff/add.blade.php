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
         <input type="text" class="form-control" name="name" placeholder="Nhập tên ở đây">
      </div>
      <div  class="form-group col-md-6">
         <!-- manually specified --> 
         <label for="formGroupExampleInput2" class="bmd-label-floating" style="font-weight: bold;">Password</label>
         <input type="password" id="myInput" class="form-control my-password" name="password"  placeholder="Vui lòng nhập password "/>
         <input type="checkbox" onclick="myFunction()" class="showPassword" />Show Password
      </div>
      <div  class="form-group col-md-6">
         <!-- manually specified --> 
         <label for="formGroupExampleInput2" class="bmd-label-floating" style="font-weight: bold;">Email</label>
         <input type="email" class="form-control" name="email" placeholder="Nhập email ở đây">
      </div>
      <div  class="form-group col-md-6">
         <!-- manually specified --> 
         <label for="formGroupExampleInput2" class="bmd-label-floating" style="font-weight: bold;">Address</label>
         <textarea type="text" class="form-control" name="address" placeholder="Nhập địa chỉ ở đây"></textarea>
      </div>
      <div  class="form-group col-md-6">
         <!-- manually specified --> 
         <label for="formGroupExampleInput2" class="bmd-label-floating" style="font-weight: bold;">NumberPhone</label>
         <input type="text" class="form-control" name="number_phone" placeholder="Nhập số điện thoại ở đây">
      </div>
      <div  class="form-group col-md-6">
         <!-- manually specified --> 
         <label for="formGroupExampleInput2" class="bmd-label-floating" style="font-weight: bold;">Images</label>
         <input type="file" class="form-control" name="images" placeholder="Vui lòng chọn file">
      </div>
      <div class="form-group col-md-6">
         <label for="sel1" class="bmd-label-floating" style="font-weight: bold;">Department:</label>
         <div class="table-responsive">
            <table class="table table-bordered" id="dynamic_field">
              <tr>
                <!-- <td><input type="text" name="name[]" placeholder="Enter your Name" class="form-control name_list" /></td> -->
                <td>
                                  <select class="form-control" name="department[]" placeholder="Enter your Name" class="form-control name_list" >
                                       @foreach($department as $value)
                                        <option value="{{ $value->id}}" >{{ $value->name}}
                                        </option>
                                        @endforeach
                                  </select>
                                  <br>
                                  <select class="form-control" name="position[]">
                                      @foreach($position as $value)
                                        <option value="{{$value->id}}"> {{$value->name}}
                                        </option>
                                      @endforeach
                                  </select>
                </td>
                <td><button type="button" name="add" id="add" class="btn btn-success">Add More</button></td>
              </tr>
            </table>
          </div>
      </div>
      <div  class="form-group col-md-6">
         <!-- manually specified --> 
         <label for="formGroupExampleInput2" class="bmd-label-floating" style="font-weight: bold;">Status</label>
         <label class="radio-inline">
         <input type="radio" value="0" name="status">On
         </label>
         <label class="radio-inline">
         <input type="radio" value="1" name="status">Off
         </label>
      </div>
      <div  class="form-group col-md-6">
         <label for="formGroupExampleInput2" class="bmd-label-floating" style="font-weight: bold;">Gender</label>
         <label class="radio-inline">
         <input type="radio" value="0" name="gender">Nam
         </label>
         <label class="radio-inline">
         <input type="radio" value="1" name="gender">Nữ
         </label>
      </div>
      <div  class="form-group col-md-6">
         <label for="formGroupExampleInput2" class="bmd-label-floating" style="font-weight: bold;">Admin</label>
         <label class="radio-inline">
         <input type="radio" value="1" name="is_root">Yes
         </label>
         <label class="radio-inline">
         <input type="radio" value="0" name="is_root">No
         </label>
      </div>
      <div class="form-group col-md-6">
         <!-- Submit button !-->
         <button type="submit" class="btn btn-outline-success">Save</button>
         <a href="{{ route('admin.staff.list')}}" class=" btn btn-outline-secondary">Cancel</a>
      </div>
   </form>
</div>
<!-- <script type="text/javascript">
   function myFunction() {
     var x = document.getElementById("myInput");
       if (x.type === "password") 
       {
             x.type = "text";
       } else {
             x.type = "password";
       }
   }
    $(function () {
      $('#department').change(function(){
   
        $('#position').select2({
            placeholder:'Vui lòng chọn chức vụ',
            minimumInputLength: 0,
            allowClear: true,
            
            placeholder :'',
            ajax: {
                url: '{{ route('admin.department.getdepartment') }}', //api xu ly get chuc vụ theo phong ban
                type: 'get',
                dataType: 'json',
                delay: 300,
                data: function (params) {  
                //gửi param len sẻver
                    return {
                        txt: params.term,   //tim theo text neu muốn
                        type: $('#department').val(),  //day la id của phong ban gui len sv
                        page: params.page || 1  //phan trang neu co nhieu
                    };
                },
                processResults: function (data, params) {  //datta trả ve chucvuj tuong ứng
                    params.page = params.page || 1;
                    return {
                        results: $.map(data, function (item) {
                            return {
                                text: item.name,  //select2 mac dinh hien thị text ra option
                                id: item.id,    //id là value của option
                                name: item.name,    //hieu ko :))  
                                code: item.code
                            }
                        }),
                        pagination: {
                            more: params.page < data.last_page //load more neu lít co nhieu
                        }
                    };
                }
            },
           cache: true
          
        });
      });
    
   
   
    });
</script> -->

<script>
$(document).ready(function(){
  var i=1;
  $('#add').click(function(){
    i++;
    $('#dynamic_field').append(
           '<tr id="row'+i+'"><td><select class="form-control" name="department[]" data-skip-name="true" >@foreach($department as $value)<option value="{{ $value->id}}" >{{ $value->name}}</option>@endforeach</select><br><select class="form-control" name="position[]" data-skip-name="true"  >@foreach($position as $value)<option value="{{ $value->id}}" >{{ $value->name}}</option>@endforeach</select></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');
  });
  $(document).on('click', '.btn_remove', function(){
    var button_id = $(this).attr("id"); 
    $('#row'+button_id+'').remove();
  });
  
  /*$('#submit').click(function(){    
    $.ajax({
      url:"name.php",
      method:"POST",
      data:$('#add_name').serialize(),
      success:function(data)
      {
        alert(data);
        $('#add_name')[0].reset();
      }
    });
  });*/
  
});
</script>

@endsection