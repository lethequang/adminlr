@extends('admin.layouts.master')
@section('content')
<!-- configchocontent -->
<div class="container-fluid">
   <h4>DATA TABLE POSITION</h4>
   <hr>
   <div class="row">
      <div class="form-group col-md-12">
         @if(count($errors) > 0)
         <div class="alert alert-danger">
            @foreach($errors->all() as $err)
            {{$err}}<br>
            @endforeach
         </div>
         @endif
         @if (session()->has('messages'))
         <div class="alert alert-success">
            <strong>Notification:</strong> {{ session()->get('messages') }}            
         </div>
         @endif
         <div class="table-responsive">
            <form  method="POST" action="{{ route('admin.resetpassword') }}" enctype="multipart/form-data">
               <div class="pull-right">

                  <input type="hidden" name="_token" value="{{csrf_token()}}">
                  
                  <a href="{{route('admin.staff.getAdd')}}" class=" btn btn-success btn-sm" >ADD</a>
                  <button type="submit" name = "submit" class=" btn btn-danger btn-sm" >Resetpassword</button>
               </div>
               <table id="mytable" class="table table-bordred table-striped" style="text-align: center;">
                  <thead>
                     <th><input type="checkbox" id="checkall" /></th>
                     <th>STT</th>
                     <th>Name</th>
                     <th>Images</th>
                     <th>Email</th>
                     <th>Address</th>
                     <th>Gender</th>
                     <th>Status</th>
                     <th>Level</th>
                     <th>Edit</th>
                     <th>Delete</th>
                  </thead>
                  <tbody>
                     <?php $stt = 0 ?>
                     @foreach ($staff as $item)
                     <?php $stt = $stt + 1 ?>
                     <tr>
                        <td>
                           @if($item->is_root == 0)
                           <input type="checkbox"  name="list[]" value="{{$item->id}}"/>
                           
                           @endif
                        </td>
                        <td>{{ $stt }}</td>
                        <td>{{ $item->name}}</td>
                        <td><img src="{{ asset('images/staff/'.$item->images)}}" style=" width: 50px;  " ></td>
                        <td>{{$item->email}}</td>
                        <td>{{ $item->address}}</td>
                        <td>
                           @if($item['gender'] == 0)
                           {{"Nam"}}
                           @else
                           {{"Nữ"}}
                           @endif
                        </td>
                        <td>
                           @if($item['status'] == 0)
                           <span class="badge badge-pill badge-primary">{{"On"}}</span>
                           @else
                           <span class="badge badge-pill badge-danger">{{"Off"}}</span>
                           @endif
                        </td>
                        <td>
                           @if($item['is_root'] == 1)
                           <span class="badge badge-pill badge-warning">{{"ADMIN"}}</span>
                           @else
                           <span class="badge badge-pill badge-primary">{{"MEMBER"}}</span>
                           @endif   
                        </td>
                        <td>
                           <p  data-placement="top" data-toggle="tooltip" title="Edit"><a href="edit/{{$item->id}}" ><span class="fa fa-edit"></span></a></p>
                        </td>
                        <td>
                           <p data-placement="top" data-toggle="tooltip" title="Delete"><a href="delete/{{$item->id}}"><span class="fa fa-trash"></span></a></p>
                        </td>
                     </tr>
                     @endforeach
                  </tbody>
               </table>
               <div class="clearfix"></div>
               <!--  <ul class="pagination pull-right">
                  <li class="disabled"><a href="#"><span class="glyphicon glyphicon-chevron-left"></span></a></li>
                  <li class="active"><a href="#">1</a></li>
                  <li><a href="#">2</a></li>
                  <li><a href="#">3</a></li>
                  <li><a href="#">4</a></li>
                  <li><a href="#">5</a></li>
                  <li><a href="#"><span class="glyphicon glyphicon-chevron-right"></span></a></li>
                  </ul> -->
         </div>
         </form>
      </div>
   </div>
   <hr>
</div>


@endsection