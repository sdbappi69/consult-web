<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>@yield('title')</title>

    <!-- Fonts -->
    <link href="//fonts.googleapis.com/css?family=Open+Sans:400,600,700%7CRaleway:400,700" rel="stylesheet">
    <!-- Favicon -->
    <link rel="icon" type="{{asset('/')}}image/ico" href="{{asset('/')}}img/favicon.ico">
    <!-- Bootstrap -->
    <link href="{{asset('/')}}css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{asset('/')}}css/font-awesome.min.css" rel="stylesheet">
    <!-- Owl Carousel -->
    <link rel="stylesheet" href="{{asset('/')}}css/owl.carousel.min.css">
    <link rel="stylesheet" href="{{asset('/')}}css/owl.theme.default.min.css">
    <!-- Custom Style -->
    <link href="{{asset('/')}}css/style.css" rel="stylesheet">
    <link href="{{asset('/')}}css/default_theme.css" rel="stylesheet">
    <link href="{{asset('/')}}css/bootstrap-datepicker/bootstrap-datepicker.min.css" rel="stylesheet">
    <!-- Responsive Style -->
    <link href="{{asset('/')}}css/responsive.css" rel="stylesheet">
    <link href="{{asset('/')}}css/custom.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>

<!-- Layout cog -->
<div class="layout-options">
    <div class="box-layout">
        <h2>Style Switcher</h2>
        <!-- Skins-->
        <div class="block-switcher-cloud color-swr">
            <h3>Template Skins:</h3>
            <button class="green-o" value="default_theme"></button>
            <button class="sky-o" value="sky_theme"></button>
            <button class="yellow-o" value="yellow_theme"></button>
            <button class="violet-o" value="violet_theme"></button>
        </div>
        <!-- Layout -->
        <div class="block-switcher-cloud hide-responsive">
            <h3>Layout Mode:</h3>
            <button class="wide-layout" value="Wide">Wide</button>
            <button class="boxed-layout" value="Boxed">Boxed</button>
        </div>
        <!-- Patterns -->
        <div class="block-switcher-cloud hide-responsive">
            <h3>Background Patterns:</h3>
            <button class="pattern-box pattern1"></button>
            <button class="pattern-box pattern2"></button>
            <button class="pattern-box pattern3"></button>
            <button class="pattern-box pattern4"></button>
            <button class="pattern-box pattern5"></button>
            <button class="pattern-box pattern6"></button>
            <button class="pattern-box pattern7"></button>
            <button class="pattern-box pattern8"></button>
            <button class="pattern-box pattern9"></button>
            <button class="pattern-box pattern10"></button>
        </div>
    </div>
    <div class="icon-cog">
        <i class="fa fa-cog lay fa-spin"></i>
    </div>
</div>

<div class="layout-width">
    <!-- Header -->
    @include('layout.header')

    <div class="clearfix"></div>

    <!-- Login Form -->
    @yield('content')

    <div class="clearfix"></div>

    @include('layout.footer')
</div>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="{{asset('/')}}js/jquery-2.2.4.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="{{asset('/')}}js/popper.min.js"></script>
<script src="{{asset('/')}}js/bootstrap.min.js"></script>
<!-- Owl Carousel -->
<script src="{{asset('/')}}js/owl.carousel.min.js"></script>
<script src="{{asset('/')}}css/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
<!-- Plugins -->
<script src="{{asset('/')}}js/plugins.js"></script>
<script>
    $(document).ready(function () {
        $('.datetime').datepicker({
            format:'yyyy-m-d'
        })
    })
</script>
</body>

</html>
