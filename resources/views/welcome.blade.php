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

	<nav class="navbar navbar-default navbar-sticky">
		<div class="container-fluid">
			
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
			</div>
			
			<div class="navbar-collapse collapse">
				
				<ul class="nav navbar-nav">
					<li><a href="welcome.blade.php">Beranda</a></li>
					<li><a href="report.php">Daftar Alumni</a></li>
					<li class="active"><a href="about.php">Tentang</a></li>
					</li>
					<li><a href="contact.php">Kontak</a></li>
				</ul>
			
			</div><!--/.nav-collapse -->			
		</div>	
	</nav>
</header>


<body id="signin">
    <div class="row section featured topspace">
                <h2 class="section-title"><span>Tracer Study</span></h2>
                <div class="row">

    <main id="main">
        <div class="container">
            
            <div class="row section topspace">
                <div class="col-md-12">
                    <p class="lead text-center text-muted"><i>Tracer Study</i> adalah studi mengenai lulusan lembaga penyelenggara pendidikan tinggi yang mampu menyediakan berbagai informasi bermanfaat bagi kepentingan evaluasi hasil pendidikan tinggi dan selanjutnya dapat digunakan untuk penyempurnaan dan penjaminan kualitas lembaga yang bersangkutan serta menyediakan informasi penting mengenai hubungan antara pendidikan tinggi dan dunia kerja professional, menilai relevansi pendidikan tinggi, informasi bagi pemangku kepentingan, dan kelengkapan persyaratan bagi akreditasi pendidikan tinggi.</p>
                </div>
            <div class="row section featured topspace">
                <h2 class="section-title"><span>Sign in</span></h2>
                <div class="row">

                <!-- / section -->
                <div class="container">
                <div class="row" style="margin-top:5px">
                    <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
                    
                        <form role="form" action="{{url('/login-alumni')}}" method="post">
                            {{ csrf_field() }}
                            <fieldset>
                                <h2 class="text-center">Sign in to start your session</h2>
                                <hr class="colorgraph">
                                <div class="form-group">
                                    <input type="text" name="email" id="user" class="form-control input-lg" placeholder="Email">
                                </div>
                                <div class="form-group">
                                    <input type="password" name="password" id="user" class="form-control input-lg" placeholder="Password">
                                </div>
                                <hr class="colorgraph">
                                <div class="row">
                                    <div class="col-xs-6 col-sm-6 col-md-6">
                                        <input type="submit" name="signin" id="signin" class="btn btn-lg btn-success btn-block" value="Sign In" tabindex="3">
                                            <script type="text/javascript">
                                                $(document).ready(function(){
                                                    $('#signin').tooltip('show');
                                                    $('#signin').tooltip('hide');
                                                });
                                            </script>
                                    </div>
                                    <div class="col-xs-6 col-sm-6 col-md-6">
                                        <a href="{{url('/reg-alumni')}}" class="btn btn-lg btn-primary btn-block">Sign Up</a>
                                    </div>
                                </div>
                            </fieldset>
                        
                            </form>
                            
                            </div>
                        </div>
                    </div>
                </div>
                </div>
                </div>
                </div> <!-- /section -->

            
            <div class="row section clients topspace">
                <h2 class="section-title"><span></span></h2>
                <div class="col-lg-12">
                    <p>
                        <img src="" alt="">
                    </p>
                </div>
            </div>
        </div>	
    </main>

    <footer id="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-3 widget">
                    <h3 class="widget-title">Contact</h3>
                    <div class="widget-body">
                        <p>+6285323275813 <br>
                            <a href="mailto:#">leni.fitriani@sttgarut.ac.id</a><br>
                            <br>
                        </p>	
                    </div>
                </div>

                <div class="col-md-3 widget">
                    <h3 class="widget-title">Follow us</h3>
                    <div class="widget-body">
                        <p class="follow-me-icons">
                            <a href=""><i class="fa fa-twitter fa-2"></i></a>
                            <a href=""><i class="fa fa-instagram fa-2"></i></a>
                            <a href=""><i class="fa fa-google-plus fa-2"></i></a>
                            <a href=""><i class="fa fa-facebook fa-2"></i></a>
                        </p>
                    </div>
                </div>

                
                <div class="col-md-3 widget">
                    <h3 class="widget-title"><italic>CDC</italic></h3>
                    <div class="widget-body">
                        <p><italic>Career Development Center</italic> adalah salah satu lembaga yang ada di Sekolah Tinggi Teknologi Garut yang bergerak didalam bidang pembunaan karir. Pelayanan yang ada di CDC ini diantaranya Tracer Study, Konseling Carir, Magang, Job Fair & Scholarship, dan Bursa Kerja.</p>
                        
                    </div>
                </div>

                <div class="col-md-3 widget">
                    <h3 class="widget-title">CDC Information</h3>
                    <div class="widget-body">
                        <p>(0262) 232 773<br>
                            <a href="mailto:#">karir.sttg.ac.id</a><br>
                            <br>
                            Jalan Mayor Syamsu No.1 Tarogong Kidul-Garut 44151 
                        </p>	
                    </div>
                </div>

            </div> <!-- /row of widgets -->
        </div>
    </footer>

    <footer id="underfooter">
        <div class="container">
            <div class="row">
                
                <div class="col-md-6 widget">
                    <div class="widget-body">
                        <p></p>
                    </div>
                </div>

                <div class="col-md-6 widget">
                    <div class="widget-body">
                        <p class="text-right">
                            Copyright &copy; 2016, Alfi S M  & Intania Sintiani </p>
                    </div>
                </div>

            </div> <!-- /row of widgets -->
        </div>
    </footer>
    <script src="{{url('tracer/js/template.js')}}"></script>
</body>
</html>