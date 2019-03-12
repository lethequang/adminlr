<div class="sidebar-menu">
   <ul>
      <li class="header-menu">
         <span>General</span>
      </li>
      <li class="sidebar-dropdown">
         <a href="{{ route('admin.staff.list') }}">
         <i class="fa fa-tachometer-alt"></i>
         <span>Dashboard</span>
         <span class="badge badge-pill badge-primary">New</span>
         </a>
      </li>
      <li class="sidebar-dropdown">
         <a href="#">
            <i class="fa fa-briefcase"></i>
            <span>Position</span>
            <!--  <span class="badge badge-pill badge-danger">3</span> -->
            <span class="badge badge-pill badge-warning">New</span>
         </a>
         <div class="sidebar-submenu">
            <ul>
               <li>
                  <a href="{{ route('admin.position.list')}}">List Position</a>
               </li>
               <li>
                  <a href="{{ route('admin.position.getAdd')}}">Add Position</a>
               </li>
               <li>
                  <a href="{{ route('admin.position.list')}}">Edit Position</a>
               </li>
            </ul>
         </div>
      </li>
      <li class="sidebar-dropdown">
         <a href="#">
         <i class="far fa-gem"></i>
         <span>Department</span>
         <span class="badge badge-pill badge-warning">New</span>
         </a>
         <div class="sidebar-submenu">
            <ul>
               <li>
                  <a href="{{ route('admin.department.list')}}" >List Department</a>
               </li>
               <li>
                  <a href="{{ route('admin.department.getAdd')}}">Add Department</a>
               </li>
               <!--  <li>
                  <a href="" class="create-modal">Add Department</a>
                  </li> -->       
            </ul>
         </div>
      </li>
      <li class="sidebar-dropdown">
         <a href="#">
         <i class="fa fa-user"></i>
         <span>Staff</span>
         <span class="badge badge-pill badge-warning">New</span>
         </a>
         <div class="sidebar-submenu">
            <ul>
               <li>
                  <a href="{{ route('admin.staff.list') }}">List Staff</a>
               </li>
               <li>
                  <a href="#">Add Staff</a>
               </li>
               <li>
                  <a href="#">Edit Staff</a>
               </li>
            </ul>
         </div>
      </li>
      <li class="header-menu">
         <span>Extra</span>
      </li>
   </ul>
</div>