  <header class="main-header">
    <!-- Logo -->
    <a href="#" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>A</b>LT</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>{{session('lang') === 'ar'?settings()->site_name_ar :settings()->site_name_en}}</b></span>
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
          <img src="{{Storage::url(settings()->logo)}}" class="img-circle" alt="User Image" title="{{admin()->user()->name}}">
        </div>
        <div class="pull-left info">
          <p>{{admin()->user()->name}}</p>
          <a href="#"><i class="fa fa-circle text-success"></i>{{trans('admin.online')}}</a>
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
        
        <li class="treeview {{active_menu('settings')[0]}}">
          <a href="javascript:;">
            <i class="fa fa-cog"></i>
            <span>{{trans('admin.settings')}}</span>
            <span class="pull-right-container">
          </a>
          <ul class="treeview-menu" style="{{active_menu('settings')[1]}}">
            <li><a href="{{aurl(('settings'))}}"><i class="fa fa-cogs"></i> {{trans('admin.settings')}} </a></li>
 
          </ul>
        </li>
{{-- admins --}}
        <li class="treeview {{active_menu('admins')[0]}}">
            <a href="#">
            <i class="fa fa-diamond"></i> <span>{{trans('admin.admins')}}</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu" style="{{active_menu('admins')[1]}}">
            <li class="active"><a href="{{route('admins')}}"><i class="fa fa-diamond"></i>{{trans('admin.admins')}}</a></li>
            <li><a href="#"><i class="fa fa-diamond"></i> {{trans('admin.add_admin')}}</a></li>
          </ul>
        </li>
      {{-- roles --}}
        <li class="treeview {{active_menu('roles')[0]}}">
            <a href="#">
            <i class="fa fa-hashtag"></i> <span>{{trans('admin.roles')}}</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu" style="{{active_menu('roles')[1]}}">
            <li class="active"><a href="{{route('roles')}}"><i class="fa fa-hashtag"></i>{{trans('admin.roles')}}</a></li>
            <li><a href="#"><i class="fa fa-hashtag"></i> {{trans('admin.add_role')}}</a></li>
          </ul>
        </li>

      {{-- Notification --}}
        <li class="treeview {{active_menu('notifications')[0]}}">
            <a href="#">
            <i class="fa fa-bell"></i> <span>{{trans('admin.notifications')}}</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu" style="{{active_menu('notifications')[1]}}">
            <li class="active"><a href="{{route('notifications')}}"><i class="fa fa-bell-o"></i>{{trans('admin.notifications')}}</a></li>
            {{-- <li><a href="#"><i class="fa fa-hashtag"></i> {{trans('admin.add_role')}}</a></li> --}}
          </ul>
        </li>
        {{-- Users --}}
        <li class="treeview {{active_menu('users')[0]}}">
          <a href="#">
            <i class="fa fa-users"></i> <span>{{trans('admin.users')}}</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu" style="{{active_menu('users')[1]}}">
            <li class="active"><a href="{{route('users')}}"><i class="fa fa-users"></i>{{trans('admin.users')}}</a></li>
            <li><a href="#"><i class="fa fa-user-plus
                "></i> {{trans('admin.add_user')}}</a></li>
          </ul>
        </li>
{{-- Category --}}
        <li class="treeview {{active_menu('categories')[0]}}">
          <a href="#">
            <i class="fa fa-tags"></i> <span>{{trans('admin.categories')}}</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu" style="{{active_menu('categories')[1]}}">
            <li class="active"><a href="{{route('categories')}}"><i class="fa fa-tags"></i>{{trans('admin.categories')}}</a></li>
            <li><a href="#"><i class="fa fa-tag"></i> {{trans('admin.add_category')}}</a></li>
          </ul>
        </li>

        {{-- products --}}

        <li class="treeview {{active_menu('products')[0]}}">
          <a href="#">
            <i class="fa fa-product-hunt"></i> <span>{{trans('admin.products')}}</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu" style="{{active_menu('products')[1]}}">
            <li class="active"><a href="{{route('products')}}"><i class="fa fa-circle-o"></i>{{trans('admin.products')}}</a></li>
            <li><a href="#"><i class="fa fa-plus-square"></i> {{trans('admin.add_product')}}</a></li>
          </ul>
        </li>

      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
