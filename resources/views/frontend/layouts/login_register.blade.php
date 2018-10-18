<!--
 * GenesisUI - Bootstrap 4 Admin Template
 * @version v1.8.4
 * @link https://genesisui.com
 * Copyright (c) 2017 creativeLabs Łukasz Holeczek
 * @license Commercial
 -->
<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from genesisui.com/demo/genius/bootstrap4-static/pages-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 09 Sep 2017 09:51:35 GMT -->
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Genius Bootstrap 4 Admin Template">
    <meta name="author" content="Lukasz Holeczek">
    <meta name="keyword" content="Genius Bootstrap 4 Admin Template">
    <!-- <link rel="shortcut icon" href="assets/ico/favicon.png"> -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Genius Bootstrap 4 Admin Template</title>

    <!-- Icons -->
    <link href="{{url('css')}}/cssfrontend/font-awesome.min.css" rel="stylesheet">
    <link href="{{url('css')}}/cssfrontend/simple-line-icons.css" rel="stylesheet">

    <!-- Main styles for this application -->
    <link href="{{url('css')}}/cssfrontend/style.css" rel="stylesheet">

</head>

<body class="app flex-row align-items-center">
    <div class="container">
        <div class="row justify-content-center">
                @yield('content')

            
        </div>
    </div>

    <!-- Bootstrap and necessary plugins -->
    <script src="{{url('js')}}/frontend/libs/jquery.min.js"></script>
    <script src="{{url('js')}}/frontend/libs/tether.min.js"></script>
    <script src="{{url('js')}}/frontend/libs/bootstrap.min.js"></script>



</body>


<!-- Mirrored from genesisui.com/demo/genius/bootstrap4-static/pages-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 09 Sep 2017 09:51:35 GMT -->
</html>