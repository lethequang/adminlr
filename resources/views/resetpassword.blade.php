<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
   <link rel="stylesheet" type="text/css" href="{{asset('public/css/homepage.css')}}">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
   <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
</head>
<body>

   <div class="container">
   	<div class="row">
	<form method="POST" action="" enctype="multipart/form-data">
    <input type="hidden" name="_token" value="{{csrf_token()}}">
     <div class="form-group col-md-3" >
    <label for="exampleInputEmail1">Password</label>
    <input type="password" name="password" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter reset password">
    <!-- <small id="emailHelp" class="form-text text-muted">Reset password</small> -->
     <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</form>
  </div>
  </div>

</body>
</html>