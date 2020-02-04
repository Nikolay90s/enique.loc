<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, maximum-scale=1">
<title>{{ $title }}</title>
<link rel="icon" href="{{ asset('asset/favicon.png') }}" type="image/png">
<link href="{{ asset('asset/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
<link href="{{ asset('asset/css/style.css') }}" rel="stylesheet" type="text/css"> 
<link href="{{ asset('asset/css/font-awesome.css') }}" rel="stylesheet" type="text/css"> 
<link href="{{ asset('asset/css/animate.css') }}" rel="stylesheet" type="text/css">
 
<!--[if lt IE 9]>
    <script src="js/respond-1.1.0.min.js"></script>
    <script src="js/html5shiv.js"></script>
    <script src="js/html5element.js"></script>
<![endif]-->
 
</head>
<body>

<header id="header_wrapper">
  @yield('header')
</header> 

  @yield('content')
    
  @yield('footer')

<script type="text/javascript" src="{{ asset('asset/js/jquery-1.11.0.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('asset/js/bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('asset/js/jquery-scrolltofixed.js') }}"></script>
<script type="text/javascript" src="{{ asset('asset/js/jquery.nav.js') }}"></script> 
<script type="text/javascript" src="{{ asset('asset/js/jquery.easing.1.3.js') }}"></script>
<script type="text/javascript" src="{{ asset('asset/js/jquery.isotope.js') }}"></script>
<script type="text/javascript" src="{{ asset('asset/js/wow.js') }}"></script> 
<script type="text/javascript" src="{{ asset('asset/js/custom.js') }}"></script>

</body>
</html>