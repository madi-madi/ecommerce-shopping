<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta name="admin" content="{{Request::user('admin')->id}}">
  <meta name="category_slug" content="{{session('category_slug')}}">


  <title>AdminLTE 2 | Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="{{url('design/adminlte')}}/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{url('design/adminlte')}}/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{url('design/adminlte')}}/bower_components/Ionicons/css/ionicons.min.css">
  
  <!-- Theme style -->
  {{-- <link rel="stylesheet" href="{{url('design/adminlte')}}/dist/css/AdminLTE.min.css"> --}}
    @if(direction() == 'ltr')
  <link rel="stylesheet" href="{{url('/')}}/design/adminlte/dist/css/AdminLTE.min.css">
  @else
  <link rel="stylesheet" href="{{url('/')}}/design/adminlte/dist/css/rtl/AdminLTE.min.css">
  <link rel="stylesheet" href="{{url('/')}}/design/adminlte/dist/css/rtl/bootstrap-rtl.min.css">
  <link rel="stylesheet" href="{{url('/')}}/design/adminlte/dist/css/rtl/profile.css">
  <link rel="stylesheet" href="{{url('/')}}/design/adminlte/dist/css/rtl/rtl.css">


  @endif
    <link href="https://fonts.googleapis.com/css?family=Cairo:300,400,600,700&amp;subset=arabic,latin-ext" rel="stylesheet">

  <style type="text/css">
    html,body,*,h1,h2,h3,h4,h5,h6{
      font-family: 'Cairo', sans-serif;

    }
  </style>
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="{{url('design/adminlte')}}/dist/css/skins/_all-skins.min.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="{{url('design/adminlte')}}/bower_components/morris.js/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="{{url('design/adminlte')}}/bower_components/jvectormap/jquery-jvectormap.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="{{url('design/adminlte')}}/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{url('design/adminlte')}}/bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="{{url('design/adminlte')}}/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
  <link rel="stylesheet" href="https://unpkg.com/native-toast@2.0.0/dist/native-toast.css">
  

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <style type="text/css">
 label{
    /*padding: 10px;*/
    cursor: pointer;
    /*background: red; */
    /*display: table;*/
    /*color: #fff;*/
     }


/*#upfile{
  display: inline-block;
}*/
#myfileinput {
    display: none;
}

[v-cloak] > * { display:none; }
/*[v-cloak]::before { content: "loading..."; }
*/
[v-cloak]::before { 
  content: " ";
  display: block;
  width: 16px;
  height: 16px;
  background-image: url('data:image/gif;base64,R0lGODlhEAAQAPIAAP///wAAAMLCwkJCQgAAAGJiYoKCgpKSkiH/C05FVFNDQVBFMi4wAwEAAAAh/hpDcmVhdGVkIHdpdGggYWpheGxvYWQuaW5mbwAh+QQJCgAAACwAAAAAEAAQAAADMwi63P4wyklrE2MIOggZnAdOmGYJRbExwroUmcG2LmDEwnHQLVsYOd2mBzkYDAdKa+dIAAAh+QQJCgAAACwAAAAAEAAQAAADNAi63P5OjCEgG4QMu7DmikRxQlFUYDEZIGBMRVsaqHwctXXf7WEYB4Ag1xjihkMZsiUkKhIAIfkECQoAAAAsAAAAABAAEAAAAzYIujIjK8pByJDMlFYvBoVjHA70GU7xSUJhmKtwHPAKzLO9HMaoKwJZ7Rf8AYPDDzKpZBqfvwQAIfkECQoAAAAsAAAAABAAEAAAAzMIumIlK8oyhpHsnFZfhYumCYUhDAQxRIdhHBGqRoKw0R8DYlJd8z0fMDgsGo/IpHI5TAAAIfkECQoAAAAsAAAAABAAEAAAAzIIunInK0rnZBTwGPNMgQwmdsNgXGJUlIWEuR5oWUIpz8pAEAMe6TwfwyYsGo/IpFKSAAAh+QQJCgAAACwAAAAAEAAQAAADMwi6IMKQORfjdOe82p4wGccc4CEuQradylesojEMBgsUc2G7sDX3lQGBMLAJibufbSlKAAAh+QQJCgAAACwAAAAAEAAQAAADMgi63P7wCRHZnFVdmgHu2nFwlWCI3WGc3TSWhUFGxTAUkGCbtgENBMJAEJsxgMLWzpEAACH5BAkKAAAALAAAAAAQABAAAAMyCLrc/jDKSatlQtScKdceCAjDII7HcQ4EMTCpyrCuUBjCYRgHVtqlAiB1YhiCnlsRkAAAOwAAAAAAAAAAAA==');
  }
  </style>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper" id="app">
