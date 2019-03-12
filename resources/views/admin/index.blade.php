@extends('admin.layouts.master')
@section('content')
<main class="page-content">
   <!-- configchocontent -->
   <div class="container-fluid">
      <h2>Quản Lý Nhân Sự</h2>
      <hr>
      <div class="row">
         <div class="form-group col-md-12">
            <div class="table-responsive">
               <table id="mytable" class="table table-bordred table-striped">
                  <thead>
                     <th><input type="checkbox" id="checkall" /></th>
                     <th>ID</th>
                     <th>Name</th>
                     <th>Order</th>
                     <th>Create_at</th>
                     <th>Update_at</th>
                     <th>Edit</th>
                     <th>Delete</th>
                  </thead>
                  <tbody>
                     <tr>
                        <td><input type="checkbox" class="checkthis" /></td>
                        <td>Mohsin</td>
                        <td>Irshad</td>
                        <td>+923335586757</td>
                        <td>Irshad</td>
                        <td>+923335586757</td>
                        <td>
                           <p data-placement="top" data-toggle="tooltip" title="Edit"><button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#edit" ><span class="glyphicon glyphicon-pencil"></span></button></p>
                        </td>
                        <td>
                           <p data-placement="top" data-toggle="tooltip" title="Delete"><button class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete" ><span class="glyphicon glyphicon-trash"></span></button></p>
                        </td>
                     </tr>
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
</main>
@endsection