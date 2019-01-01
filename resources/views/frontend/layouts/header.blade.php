<!DOCTYPE html>
<html lang="{{app()->getLocale()}}">
    <head>
        <meta charset="utf-8">
        <link rel="shortcut icon" type="image/png" href=""/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge"><!-- Compatibility Meta IE -->
        <meta name="viewport" content="width=device-width, initial-scale=1"> <!-- First Mobile Meta -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
       
        <title>Hadya - Main page</title>
        <link rel="stylesheet" href="{{url('frontend')}}/css/bootstrap.css">
        <link rel="stylesheet" href="{{url('frontend')}}/css/font-awesome.min.css">
        <link rel="stylesheet" href="{{url('frontend')}}/css/animate.css">

        <link rel="stylesheet" type="text/css" href="{{url('frontend')}}/css/slick.css"/>
        <!-- Add the new slick-theme.css if you want the default styling -->
        <link rel="stylesheet" type="text/css" href="{{url('frontend')}}/css/slick-theme.css"/>

        <link rel="stylesheet" href="{{url('frontend')}}/css/style.css">

    {{-- <link href="{{ asset('css/frontend.css') }}" rel="stylesheet"> --}}
    <script src="{{ asset('js/frontend.js') }}" defer></script>
    

        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body >