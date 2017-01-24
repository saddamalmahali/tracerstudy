<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport"    content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author"      content="Sergey Pozhilov (GetTemplate.com)">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<title>STTG-Tracer Study</title>

	<link rel="shortcut icon" href="assets/images/sttg.png">
	
	<!-- Bootstrap -->
	<link href="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.no-icons.min.css" rel="stylesheet">
	<!-- Icons -->
	<link href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{url('plugins/iCheck/all.css')}}">
    <!-- Date Picker -->
    <link rel="stylesheet" href="{{url('plugins/datepicker/datepicker3.css')}}">
	<!-- Fonts -->
	<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Alice|Open+Sans:400,300,700">
	
	<!-- Bootstrap 3.3.6 -->
    <link rel="stylesheet" href="{{url('bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{url('tracer/css/styles.css')}}">
	<link rel="stylesheet" href="{{url('tracer/css/jquery.jgrowl.min.css')}}">

	<!--[if lt IE 9]> <script src="assets/js/html5shiv.js"></script> <![endif]-->

	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
	<!-- jQuery 2.2.3 -->
    <script src="{{url('plugins/jQuery/jquery-2.2.3.min.js')}}"></script>
    <script src="{{url('plugins/iCheck/icheck.js')}}"></script>
    <!-- Date Picker -->
    <script src="{{url('plugins/datepicker/bootstrap-datepicker.js')}}"></script>
</head>

<header id="header">
	<div id="head" class="parallax" parallax-speed="2">
		<h1 id="logo" class="text-center">
			<img class="img-circle" src="{{url('tracer/images/sttg.jpg')}}" alt="">
			<span class="title">TRACER STUDY STTG</span>
			<span class="tagline">SEKOLAH TINGGI TEKNOLOGI GARUT</span>
			<span class="tagline">JL.Mayor Syamsu No.1 Jayaraga Tarogong Kidul - Garut 44151<br>
				<a href="http://www.sttgarut.ac.id">www.sttgarut.ac.id</a></span>
		</h1>
	</div>

	@include('layouts.nav_home')
</header>




<body id="signin">
    @yield('content')
</body>
</html>