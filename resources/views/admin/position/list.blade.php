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
            <div class="pull-right">
               <a href="{{ route('admin.position.getAdd') }}" class=" btn btn-success btn-sm" >ADD</a>
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
                    @foreach ($position as $item)
                   <?php $stt = $stt + 1 ?>
                  <tr>
                     <td><input type="checkbox" class="checkthis" /></td>
                     <td>{{ $stt }}</td>
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
   <hr>
   <!-- <div class="row">
      <div class="col-md-12">
        
      </div>
      </div> -->
   <!-- and divcontainer -->
</div>
@endsection