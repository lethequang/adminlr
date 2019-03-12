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
      <nav class="navbar navbar-inverse container" role="navigation">
         <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
               <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
               <span class="sr-only">Toggle navigation</span>
               <span class="icon-bar"></span>
               <span class="icon-bar"></span>
               <span class="icon-bar"></span>
               </button>
               <a class="navbar-brand" href="#">HOME</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
               <ul class="nav navbar-nav navbar-right">
                  @if(Auth::check())
                  <li class="dropdown">
                     <a href="#" class="dropdown-toggle" data-toggle="dropdown">{{Auth::user()->name}} <b class="caret"></b></a>
                     <ul class="dropdown-menu">
                        <li align="center" class="well">
                           <div><img class="img-responsive" style="padding:2%;" src="{{ asset('images/staff/'.Auth::user()->images)}}"/><a class="change" href=""><span class="user-role">
                              @if(Auth::user()->is_root == 1)
                              {{'Administrator'}}
                              @else 
                              {{'Member'}}
                              @endif
                              </span>
                              </a>
                           </div>
                           <a href="#" class="btn btn-sm btn-default"><span class="glyphicon glyphicon-lock"></span> Security</a>
                           <a href="{{route('admin.getLogout') }}" class="btn btn-sm btn-default"><span class="glyphicon glyphicon-log-out"></span> Logout</a>
                        </li>
                     </ul>
                  </li>
               </ul>
            </div>
            <!-- /.navbar-collapse -->
         </div>
         <!-- /.container-fluid -->
      </nav>
      <div class="container">
         <div class="row well">
            <div class="col-md-2">
               <ul class="nav nav-pills nav-stacked well">
                  <li  class="active"><a href="#"><i class="fa fa-envelope"></i> Compose</a></li>
                  <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
                  @if(Auth::user()->is_root == 1)
                  <li><a href="{{route('admin.staff.list')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                  @endif
                  <li><a href="#"><i class="fa fa-user"></i> Profile</a></li>
                  <li><a href="#"><i class="fa fa-key"></i> Security</a></li>
                  <li><a href="{{route('admin.getLogout')}}"><i class="fa fa-sign-out"></i> Logout</a></li>
               </ul>
            </div>
            <div class="col-md-10">
               <div class="panel">
                  <img class="pic img-circle" src="{{ asset('images/staff/'.Auth::user()->images)}}" alt="...">
                  <div class="name"><small>{{Auth::user()->name}}</small></div>
                  <a href="#" class="btn btn-xs btn-primary pull-right" style="margin:10px;"><span class="glyphicon glyphicon-picture"></span> Change cover</a>
               </div>
           
               <br><br><br>
               <ul class="nav nav-tabs" id="myTab">
                  <li class="active"><a href="#inbox" data-toggle="tab"><i class="fa fa-envelope-o"></i>Thông Tin Cá Nhân</a></li>
                  <li><a href="#sent" data-toggle="tab"><i class="fa fa-reply-all"></i> Sent</a></li>
                  <li><a href="#assignment" data-toggle="tab"><i class="fa fa-file-text-o"></i> Assignment</a></li>
                  <li><a href="#event" data-toggle="tab"><i class="fa fa-clock-o"></i> Event</a></li>
               </ul>
               <div class="tab-content">
                  <div class="tab-pane active" id="inbox">
                     <a type="button" data-toggle="collapse" data-target="#a1">
                        <div class="btn-toolbar well well-sm" role="toolbar"  style="margin:0px;">
                           <div class="container">
                              <div class="row">
                                 <div class="col-xs-12 col-sm-6 col-md-6">
                                    <div class="well well-sm">
                                       <div class="row">
                                         <!--  <div class="col-sm-6 col-md-4">
                                             <img src="http://placehold.it/380x500" alt="" class="img-rounded img-responsive" />
                                          </div> -->
                                          <div class="col-sm-6 col-md-8">
                                             <h4>
                                                Thông tin cá nhân
                                             </h4>
                                             <label>Name</label>
                                             <p title="San Francisco, USA">{{Auth::user()->name}}<i class="glyphicon glyphicon-map-marker">
                                             </i>
                                             </p>
                                             <label>Email</label>
                                             <p>
                                                <i class="glyphicon glyphicon-envelope">
                                                </i>{{Auth::user()->email}}
                                             </p>

                                               <label>Address</label>
                                               <p>
                                                <i class="glyphicon glyphicon-globe">
                                                </i>{{Auth::user()->address}}
                                             
                                               </p>

                                                <label>NumberPhone</label>
                                               <p>
                                                <i class="glyphicon glyphicon-phone">
                                                </i>{{Auth::user()->number_phone}}
                                               </p>

                                                <label>Gender</label>
                                               <p>
                                                <i class="glyphicon glyphicon-gender">
                                                </i>
                                                @if(Auth::user()->gender == 0)
                                                  {{"Nam"}}
                                                @else
                                                 {{"Nữ"}}
                                                @endif
                                               </p>
                                </br>
                     </div>
                     </div>
                     </div>
                     </div>
                     </div>
                     </div>    
                     </div>
                     </a>
                     <br>
                     <a href="{{route('get.edituser')}}" class="btn btn-primary"><i class="fa fa-edit"></i>Chỉnh sửa thông tin </a>
                    <!--  <button class="btn btn-primary"><i class="fa fa-check-square-o"></i>Cập nhật thông tin </button> -->
                  </div>
               </div>
            </div>
         </div>
          @endif
      </div>
   </body>
</html>