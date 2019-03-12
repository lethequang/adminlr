@extends('admin.layouts.master')
@section('content')
<!-- configchocontent -->
<div class="container-fluid">
   <h4>DATA TABLE DEPARTMENT</h4>
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
            <!-- <div class="pull-right">
               <a href="#" class="create btn btn-success btn-sm" data-toggle="modal" data-target="#create"><i class="fa fa-plus" ></i></a>
            </div> -->
            <div class="pull-right">
               <a href="{{ route('admin.department.getAdd') }}" class="btn btn-success btn-sm" >ADD</a>
            </div>
            <table id="mytable" class="table table-bordred table-striped">
               <thead>
                  <th><input type="checkbox" id="checkall" /></th>
                  <th>STT</th>
                  <th>Name</th>
                  <th>Create_at</th>
                  <th>Edit</th>
                  <th>Delete</th>
               </thead>
               <tbody>
                   <?php $stt = 0 ?>
                    @foreach ($department as $item)
                   <?php $stt = $stt + 1 ?>
                  <tr>
                     <td><input type="checkbox" class="checkthis" /></td>
                     <td>{{ $stt}}</td>
                     <td>{{ $item->name}}</td>
                     <td>{{ $item->created_at}}</td>
                     <td>
                        <p data-placement="top" data-toggle="tooltip" title="Edit"><a href="edit/{{$item->id}}" ><span class="fa fa-edit"></span></a></p>
                     </td>
                     <td>
                        <p data-placement="top" data-toggle="tooltip" title="Delete"><a href="delete/{{$item->id}}" ><span class="fa fa-trash"></span></a></p>
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
      </div>
   </div>
   <div class="row">
      <div id="create" class="modal fade" role="dialog">
         <div class="modal-dialog">
            <div class="modal-content">
               <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="fa fa-times" aria-hidden="true"></span></button>
                  <h4 class="" id="Heading" ></h4>
               </div>
               <div class="modal-body">
                  <form method="POST" action="{{ route('admin.department.postAdd') }}" id="addform">
                     <input type="hidden" name="_token" value="{{csrf_token()}}">
                     <div class="form-group">
                        <input type="text" class="form-control" id="name" name="name" placeholder="Nhập Tên Phòng Ban Ở Đây">
                     </div>
                     <div class="form-group">
                        <input type="text" class="form-control" id="order" name="order" placeholder="Nhập Order">
                     </div>
                     <div class="modal-footer ">
                        <button type="submit" id="add" class="btn btn-warning btn-lg" style="width: 100%;"><span class="fa fa-check-circle"></span> ADD</button>
                     </div>
                  </form>
               </div>
            </div>
            <!-- /.modal-content --> 
         </div>
         <!-- /.modal-dialog --> 
      </div>
   </div>
   <hr>
   <!-- <div class="row">
      <div class="col-md-12">
        
      </div>
      </div> -->
   <!-- and divcontainer -->
</div>
@endsection