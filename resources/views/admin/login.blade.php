<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('public/admin_asset/asset/css/login.css') }}">
    <title>LOGIN</title>
</head>
<body>
    <div id="logreg-forms">
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
        <form class="form-signin" method="POST" action="{{ route('admin.postLogin') }}">
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <h1 class="h3 mb-3 font-weight-normal" style="text-align: center"> Sign in</h1>
            <div class="social-login">
                <button class="btn facebook-btn social-btn" type="button"><span><i class="fab fa-facebook-f"></i> Sign in with Facebook</span> </button>
                <button class="btn google-btn social-btn" type="button"><span><i class="fab fa-google-plus-g"></i> Sign in with Google+</span> </button>
            </div>
            <p style="text-align:center"> OR  </p>
            <label for="formGroupExampleInput2" class="bmd-label-floating" style="font-weight: bold;">Email</label>
            <input type="email" name="email" id="inputEmail" class="form-control"  placeholder="Vui lòng nhập email" >
            <label for="formGroupExampleInput2" class="bmd-label-floating" style="font-weight: bold;">Password</label>
            <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Vui lòng nhập password" >
            <button class="btn btn-success btn-block" type="submit"><i class="fas fa-sign-in-alt"></i> Sign in</button>
            <a href="#" id="forgot_pswd">Forgot password?</a>
            <hr>
            <!-- <p>Don't have an account!</p>  -->
        </form>

 
</body>
</html>