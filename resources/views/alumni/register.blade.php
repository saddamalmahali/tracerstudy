
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>TracerStudy | Registration Page</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="{{url('bootstrap/css/bootstrap.min.css')}}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{url('css/adminlte/AdminLTE.min.css')}}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{url('plugins/iCheck/square/blue.css')}}">
  <!-- datepicker -->
  <link rel="stylesheet" href="{{url('plugins/datepicker/datepicker3.css')}}">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition register-page col-md-8 col-md-offset-2">
<div class="register-box">
  <div class="register-logo">
    <a href="{{url('/')}}"><b>Tracer</b> Study</a>
  </div>

  <div class="register-box-body" style="width:100%;">
    <p class="login-box-msg">Register a new membership</p>

    <form action="{{url('/alumni/save_register')}}" method="post">
        {{ csrf_field() }}
      <div class="form-group has-feedback{{ $errors->has('nama_depan') ? ' has-error' : '' }}">
        <input type="text" class="form-control" name="nama_depan" placeholder="Nama Depan">
        @if ($errors->has('nama_depan'))
            <span class="help-block">
                <strong>{{ $errors->first('nama_depan') }}</strong>
            </span>
        @endif
      </div>
      <div class="form-group has-feedback{{ $errors->has('nama_depan') ? ' has-error' : '' }}">
        <input type="text" class="form-control" name="nama_belakang" placeholder="Nama Belakang">
        @if ($errors->has('nama_depan'))
            <span class="help-block">
                <strong>{{ $errors->first('nama_depan') }}</strong>
            </span>
        @endif
      </div>
      <div class="form-group has-feedback{{ $errors->has('jenis_kelamin') ? ' has-error' : '' }}">
        <select name="jenis_kelamin" class="form-control" >
            <option value="" disabled selected>Jenis Kelamin</option>
            <option value="L">Laki - Laki</option>
            <option value="P">Perempuan</option>
        </select>
        @if ($errors->has('jenis_kelamin'))
            <span class="help-block">
                <strong>{{ $errors->first('jenis_kelamin') }}</strong>
            </span>
        @endif
      </div>
      <div class="form-group has-feedback{{ $errors->has('tempat_lahir') ? ' has-error' : '' }}">
        <input type="text" class="form-control" name="tempat_lahir" placeholder="Tempat Lahir">
        @if ($errors->has('tempat_lahir'))
            <span class="help-block">
                <strong>{{ $errors->first('tempat_lahir') }}</strong>
            </span>
        @endif
      </div>
      <div class="form-group has-feedback{{ $errors->has('tanggal_lahir') ? ' has-error' : '' }}">
        <input type="text" class="form-control" id="tanggal_lahir" name="tanggal_lahir" placeholder="Tanggal Lahir">
        @if ($errors->has('tanggal_lahir'))
            <span class="help-block">
                <strong>{{ $errors->first('tanggal_lahir') }}</strong>
            </span>
        @endif
      </div>
      
      <div class="form-group has-feedback{{ $errors->has('jurusan') ? ' has-error' : '' }}">
        <select class="form-control" name="jurusan">
            <option value="" disabled selected>Pilih Jurusan</option>
            <option value="23201">Arsitektur (S1)</option>
            <option value="26201">Teknik Industri (S1)</option>
            <option value="55201">Teknik Informatika (S1)</option>
            <option value="22201">Teknik Sipil (S1)</option>
            <option value="56401">Teknik Komputer (D3)</option>
            <option value="26402">Manajemen Industri (D3)</option>
        </select>
        @if ($errors->has('jurusan'))
            <span class="help-block">
                <strong>{{ $errors->first('jurusan') }}</strong>
            </span>
        @endif
      </div>

      <div class="form-group has-feedback{{ $errors->has('tahun_lulus') ? ' has-error' : '' }}">
        <input type="number" class="form-control" name="tahun_lulus" placeholder="Tahun Lulus">  
        @if ($errors->has('tahun_lulus'))
            <span class="help-block">
                <strong>{{ $errors->first('tahun_lulus') }}</strong>
            </span>
        @endif      
      </div>
      <div class="form-group has-feedback{{ $errors->has('alamat') ? ' has-error' : '' }}">
        <textarea class="form-control" placeholder="Alamat" name="alamat"></textarea>
        @if ($errors->has('alamat'))
            <span class="help-block">
                <strong>{{ $errors->first('alamat') }}</strong>
            </span>
        @endif
      </div>
      <div class="form-group has-feedback{{ $errors->has('no_hp') ? ' has-error' : '' }}">
        <input type="text" class="form-control" placeholder="No HP" name="no_hp">
        <span class="glyphicon glyphicon-phone form-control-feedback"></span>
        @if ($errors->has('no_hp'))
            <span class="help-block">
                <strong>{{ $errors->first('no_hp') }}</strong>
            </span>
        @endif
      </div>
      <div class="form-group has-feedback{{ $errors->has('email') ? ' has-error' : '' }}">
        <input type="email" class="form-control" placeholder="Email" name="email">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
        @if ($errors->has('email'))
            <span class="help-block">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
        @endif
      </div>
      <div class="form-group has-feedback{{ $errors->has('password') ? ' has-error' : '' }}">
        <input type="password" class="form-control" placeholder="Password" name="password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        @if ($errors->has('password'))
            <span class="help-block">
                <strong>{{ $errors->first('password') }}</strong>
            </span>
        @endif
      </div>
      
      <div class="row">
        <div class="col-xs-8{{ $errors->has('konfirmasi') ? ' has-error' : '' }}">
          <div class="checkbox icheck">
            <label>
              <input type="checkbox" name="konfirmasi"> I agree to the <a href="#">terms</a>
            </label>
          </div>
          @if ($errors->has('konfirmasi'))
            <span class="help-block">
                <strong>{{ $errors->first('konfirmasi') }}</strong>
            </span>
          @endif
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Register</button>
        </div>
        <!-- /.col -->
      </div>
    </form>

    

    <a href="login.html" class="text-center">I already have a membership</a>
  </div>
  <!-- /.form-box -->
</div>
<!-- /.register-box -->

<!-- jQuery 2.2.3 -->
<script src="{{url('plugins/jQuery/jquery-2.2.3.min.js')}}"></script>
<!-- Bootstrap 3.3.6 -->
<script src="{{url('bootstrap/js/bootstrap.min.js')}}"></script>
<!-- iCheck -->
<script src="{{url('plugins/iCheck/icheck.min.js')}}"></script>
<script src="{{url('plugins/datepicker/bootstrap-datepicker.js')}}"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
    $('input#tanggal_lahir').datepicker({
        format : "dd-mm-yyyy",
        autoclose : true
    });
  });
</script>
</body>
</html>
