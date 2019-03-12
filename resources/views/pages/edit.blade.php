<!DOCTYPE html>
<html>
   <head>
      <title></title>
   </head>
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
   <link rel="stylesheet" type="text/css" href="{{asset('public/css/homepage.css')}}">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
   <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
   <body>
    <!--   @if(count($errors) > 0)
      <div class="alert alert-danger">
         @foreach($errors->all() as $err)
         {{$err}}<br>
         @endforeach
      </div>
      @endif -->
      <div class="container">
      <h1>Edit Profile</h1>
      <hr>
      <div class="row">

         @if (session()->has('messages'))
         <div class="alert alert-success">
            <strong>Notification:</strong> {{ session()->get('messages') }}            
         </div>
         @endif
       <form  method="POST" action="{{route('post.edituser')}}" enctype="multipart/form-data">
           <input type="hidden" name="_token" value="{{csrf_token()}}">
   
            <!-- left column -->
            <div class="col-md-3">
               <div class="text-center">
                  <img src="{{ asset('images/staff/'.$user->images)}}"  style=" width: 100px; class="avatar img-circle" alt="avatar">
                  <h6>Upload a different photo...</h6>
                  <input type="file" name="images" class="form-control">
               </div>
            </div>
            <!-- edit form column -->
            <div class="col-md-9 personal-info">
                  @if(count($errors) > 0)
                  <div class="alert alert-danger">
                     @foreach($errors->all() as $err)
                     {{$err}}<br>
                     @endforeach
                  </div>
                  @endif
               <h3>Personal info</h3>
               <div class="form-group">
                  <label class="col-lg-3 control-label">Name</label>
                  <div class="col-lg-8">
                     <input class="form-control" type="text" name="name" value="{{$user->name}}">
                  </div>
               </div>
               <div class="form-group">
                  <label class="col-lg-3 control-label">Email</label>
                  <div class="col-lg-8">
                     <input class="form-control" type="text" name="email" value="{{$user->email}}">
                  </div>
               </div>
               <div class="form-group">
                  <label class="col-lg-3 control-label">Address</label>
                  <div class="col-lg-8">
                     <input class="form-control" name="address" type="text" value="{{$user->address}}">
                  </div>
               </div>
               <div class="form-group">
                  <label class="col-lg-3 control-label">Password</label>
                  <div class="col-lg-8">
                     <input class="form-control" type="password" name="password" value="">
                  </div>
               </div>
               <div class="form-group">
                  <label class="col-lg-3 control-label">Gender</label>
                  <div class="col-lg-8">
                     <div class="ui-select">
                        <select id="" name="gender"class="form-control">
                           <option value="0">Nam</option>
                           <option value="1">Nữ</option>
                        </select>
                     </div>
                  </div>
                  <div class="form-group">
                     <label class="col-md-3 control-label"></label>
                     <div class="col-md-8">
                        <button type="submit" class="btn btn-outline-success">Save</button>
                        <a href="{{route('home')}}" class=" btn btn-outline-secondary">Cancel</a>
                     </div>
                  </div>
               </div>
         </form>
         </div>
      </div>
      <hr>
  </body>
</html>