
<!DOCTYPE html>
<html>
<head>
	<title>Universitas Gadjah Mada</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

    <link rel="shortcut icon" href="/themes/tonjo/assets/ugm/img/ugm.png">

    <title>Tracer Study :: Universitas Gadjah Mada</title>
    <link rel="stylesheet" href="{{URL::asset('bootstrap/css/bootstrap.min.css')}}">

	<link href="https://fonts.googleapis.com/css?family=Lora:400,400i,700|Montserrat:400,700|Open+Sans:400,400i,700,700i" rel="stylesheet" />
	<link rel="stylesheet" type="text/css" href="{{url('css/style.css')}}" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
	<style type="text/css">
		.form-horizontal .radio, 
		.form-horizontal .checkbox {
    		min-height: 32px;
    		padding-left: 24px;
		}
		.single-post .post-content ul, 
		.single-post .post-content ol {
			padding-left: 0;
		}
		.radio-inline, .checkbox-inline {
			padding-left: 0;
			padding-right: 20px;
		}
	</style>
</head>
<body>
 <!-- jQuery 2.2.3 -->
  <script src="{{url('plugins/jQuery/jquery-2.2.3.min.js')}}"></script>
<script type="text/javascript" src="{{url('bootstrap/js/bootstrap.min.js')}}"></script>

  
<header id="header">
	<nav class="navbar navbar-default topbar">
		<div class="container">
			<ul class="nav navbar-nav">
		        <li><a href="{{url('/')}}">Beranda</a></li>
		        <li><a href="{{url('/tentang')}}">Tentang</a></li>
		        <li><a href="http://www.sttgarut.ac.id/">Kampus</a></li>
		        <li><a href="#">Kontak</a></li>
			</ul>
		</div>
	</nav>
	<div class="container">
		<div class="navbar-body">
			<a href="{{url('/')}}" class="navbar-brand">
				<img src="{{url('img/sttg.png')}}" alt="Universitas Gadjah Mada" class="img-responsive">
				<span>
					Tracer Study <br />
					Sekolah Tinggi Teknologi Garut
				</span>
			</a>
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
		</div>
		<nav id="navbar" class="navbar navbar-default navbar-collapse collapse">
			<ul class="nav navbar-nav">
				<li class="{{url()->full() == url('/') ? 'active' : ''}}"><a href="{{url('/')}}">Home</a></li>
                <li class="{{url()->full() == url('/daftar-alumni') ? 'active' : ''}}"><a href="{{url('/daftar-alumni')}}">Daftar Alumni</a></li>

            </ul>
		</nav>
	</div>
</header>

<div id="body">
	<article class="single-post">
		<div class="post-content">
			<div class="container">
		        <div class="col-md-4 col-md-push-8">

  <div class="panel panel-danger">
    <div class="panel-heading"><strong>Informasi</strong></div>
    <div class="panel-body">
      <p><strong>PIN</strong> dikirimkan ke <strong>email</strong> yang Anda isikan saat wisuda. <br />
      <br />
      Jika Anda belum mendapatkan PIN, silakan hubungi DKAUI-UGM di <strong>(0274) 649 82525 / 649 82493 </strong> 
      atau email ke <strong>alumni@ugm.ac.id</strong></p>
    </div>
  </div><!-- panel -->

  <div class="panel panel-info">
    <div class="panel-heading">
        <strong><i class="fa fa-user"></i>&nbsp; Login Ke Alumni</strong>
    </div>
    <div class="panel-body">
      <form class="form" name="form1" id="form1" action="" method="post">
        <div class="form-group has-feedback">
          <input type="email" class="form-control" placeholder="Email" name="email">
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
          <input type="password" class="form-control" placeholder="Password" name="password">
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        </div>

        <div class="form-group">
          <input class="btn btn-primary" type="submit" name="input" value="Masuk ke Form" />
        </div>
      </form>
    </div>
  </div>
</div><!-- col-md-4 -->

<div class="col-md-8 col-md-pull-4">
  <div class="panel panel-default">
    <div class="panel-heading"><strong>Selamat datang</strong></div>
    <div class="panel-body">

  <script type="text/javascript">
      $('.carousel').carousel({
          interval: 300
      })
  </script>

  <div class="row">
  <center>

    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
      <!-- Indicators -->
      <ol class="carousel-indicators">
        <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
        <li data-target="#carousel-example-generic" data-slide-to="1"></li>
        <li data-target="#carousel-example-generic" data-slide-to="2"></li>
      </ol>
     
      <!-- Wrapper for slides -->
      <div class="carousel-inner">
        <div class="item active">
          <img src="http://img.akademik.ugm.ac.id/banner/slide/slide-um-1.jpg" alt="...">
          <div class="carousel-caption">
              <!--h3>Caption Text</h3-->
          </div>
        </div>
        <div class="item">
          <img src="http://img.akademik.ugm.ac.id/banner/slide/slide-um-3.jpg" alt="...">
        </div>
        <div class="item">
          <img src="http://img.akademik.ugm.ac.id/banner/slide/slide-um-4.jpg" alt="...">
        </div>
      </div>
    </div> <!-- Carousel -->
    </center>
    </div>

      <p>&nbsp;</p>

      <p class="text-justify"><strong class="text-danger">Tracer study</strong> ini dilaksanakan untuk <strong class="text-danger">menjaring informasi/masukan dari alumni</strong> sebagai 
      salah satu dasar yang sangat penting bagi  evaluasi dan pengembangan UGM, Fakultas dan prodi 
      dalam bidang kurikulum, proses pembelajaran, sarana prasarana, dan pelayanan.</p>

      <p class="text-justify"><strong class="text-danger">Data/informasi bersifat rahasia</strong>, sehingga tidak akan dipindah tangankan tanpa seijin yang bersangkutan 
      dan semata-mata hanya digunakan untuk pengembangan.</p>
    </div>
  </div><!-- panel -->
</div><!-- col-md-7 -->			</div>
		</div>
	</article>
</div>

<footer id="footer">
<!--
	<div class="footer-body">
		<div class="container">
			<div class="row">
				<div class="col-md-4 col-sm-5 footer-brand-wrapper">
					<a href="#" class="footer-brand"><img src="/themes/tonjo/assets/images/ugm_footer.png" alt="Universitas Gadjah Mada"></a>
					<address>
						Dit. Kemitraan, Alumni dan Urusan Internasional <br />
						Universitas Gadjah Mada <br />
						Bulaksumur Yogyakarta 55281 <br />
						Indonesia <br />
						Tel. <a href="tel:+62-274-649-1904">+62-274-649-1904</a> / <a href="tel:+62-274-649-82443">+62-274-649-82443</a>
					</address>
				</div>
				<div class="col-md-8 col-sm-7 footer-menu-wrapper">
					<div class="row">
						<div class="col-md-4 widget">
							<div class="widget-header">
							<h3 class="widget-title">Halaman</h3>
							</div>
							<div class="menu-footer-pages-container">
								<ul id="menu-footer-pages" class="menu">
									<li><a href="#">Welcome Note</a></li>
									<li><a href="#">OIA Profile</a></li>
									<li><a href="#">About Yogyakarta</a></li>
								</ul>
							</div>
						</div>
						<div class="col-md-4 widget">
							<div class="widget-header">
								<h3 class="widget-title">Layout</h3>
							</div>
							<div class="menu-footer-layout-container">
								<ul id="menu-footer-layout" class="menu">
									<li><a href="#">Welcome Note</a></li>
									<li><a href="#">OIA Profile</a></li>
									<li><a href="#">About Yogyakarta</a></li>
								</ul>
							</div>
						</div>
						<div class="col-md-4 widget">
							<div class="widget-header">
								<h3 class="widget-title">Page Template</h3>
							</div>
							<div class="menu-footer-page-tempalte-container">
								<ul id="menu-footer-page-tempalte" class="menu">
									<li><a href="#">Welcome Note</a></li>
									<li><a href="#">OIA Profile</a></li>
									<li><a href="#">About Yogyakarta</a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
-->
	<div class="footer-copyright">
		<div class="container">
			<div class="row">
				<div class="col-md-3 col-sm-4"><p class="copyright">&copy; 2016 Universitas Gadjah Mada</p></div>
				<div class="col-md-9 col-sm-8">
					<p class="site-menu text-right">
						<a href="#">Aturan Penggunaan</a>
						<a href="#">Peta Situs</a>
						<a href="#">Kontak</a>
					</p>
				</div>
			</div>
		</div>
	</div>
</footer>


</body>
</html>