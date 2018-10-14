  <header class="main-header">
    <!-- Logo -->
    <a href="index2.html" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>A</b>LT</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Admin</b>LTE</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>


{{-- include(layouts.menu) --}}
      @include('admin.layouts.menu')
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{url('design/adminlte')}}/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>Alexander Pierce</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">{{trans('admin.main_avigation')}}</li>
        <li class="active treeview">
          <a href="#">
            <i class="ion ion-ios-gear-outline"></i> <span>{{trans('admin.settings')}}</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="active"><a href="{{route('settings')}}"><i class="fa fa-circle-o"></i>{{trans('admin.edit_settings')}}</a></li>
            <li><a href="index2.html"><i class="fa fa-circle-o"></i> Dashboard v2</a></li>
          </ul>
        </li>

        {{-- Users --}}
                <li class="active treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>{{trans('admin.Users')}}</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="active"><a href="{{route('users')}}"><i class="fa fa-circle-o"></i>{{trans('admin.users')}}</a></li>
            <li><a href="index2.html"><i class="fa fa-circle-o"></i> {{trans('admin.add_user')}}</a></li>
          </ul>
        </li>

                <li class="active treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>{{trans('admin.admins')}}</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="active"><a href="{{route('admins')}}"><i class="fa fa-circle-o"></i>{{trans('admin.admins')}}</a></li>
            <li><a href="index2.html"><i class="fa fa-circle-o"></i> {{trans('admin.add_admin')}}</a></li>
          </ul>
        </li>
        {{-- products --}}

                <li class="active treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>{{trans('admin.products')}}</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="active"><a href="{{route('products')}}"><i class="fa fa-circle-o"></i>{{trans('admin.products')}}</a></li>
            <li><a href="index2.html"><i class="fa fa-circle-o"></i> {{trans('admin.add_admin')}}</a></li>
          </ul>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
