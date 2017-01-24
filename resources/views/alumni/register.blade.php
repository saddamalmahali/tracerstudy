@extends('layouts.home')
@section('content')
    <div class="row">
        <div class="container">
            <div class="col-md-8 col-md-offset-2">
                
                <form action="{{url('/alumni/save_register')}}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-md-6">
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
                        </div>
                        <div class="col-md-6">
                            
                            
                            <div class="form-group has-feedback{{ $errors->has('no_hp') ? ' has-error' : '' }}">
                                <input type="text" class="form-control" placeholder="No HP" name="no_hp">
                                <span class="glyphicon glyphicon-phone form-control-feedback"></span>
                                @if ($errors->has('no_hp'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('no_hp') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group {{ $errors->has('foto') ? ' has-error' : '' }}">
                                    <div class="input-group date">
                                        <input type="file" name="foto" class="form-control">
                                        <div class="input-group-addon">
                                            <span class="fa fa-camera-retro"></span>
                                        </div>
                                    </div>
                                    @if ($errors->has('foto'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('foto') }}</strong>
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
                            <div class="form-group has-feedback{{ $errors->has('alamat') ? ' has-error' : '' }}">
                                <textarea class="form-control" placeholder="Alamat" name="alamat" rows="4"></textarea>
                                @if ($errors->has('alamat'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('alamat') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
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
                
            </div>
        </div>
    </div>
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
@endsection
  