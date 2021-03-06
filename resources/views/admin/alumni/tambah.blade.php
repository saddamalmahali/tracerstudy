@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Alumni 
            <p><small>Tambah Alumni</small></p>
            
        </h1>
        
    </section>

    <section class="content">
        <div class="row">
            <div class="col-md-8">
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">FORM TAMBAH ALUMNI</h3>
                    </div>
                    <form action="{{url('admin/alumni/save')}}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="box-body">                        
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group {{ $errors->has('nama_depan') ? ' has-error' : '' }}">
                                        <label for="nama_depan">Nama Depan</label>
                                        <input type="text" name="nama_depan" class="form-control" placeholder="Input Nama Depan">
                                        @if ($errors->has('nama_depan'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('nama_depan') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="form-group {{ $errors->has('nama_belakang') ? ' has-error' : '' }}">
                                        <label for="nama_belakang">Nama Belakang</label>
                                        <input type="text" name="nama_belakang" class="form-control" placeholder="Input Nama Belakang">
                                        @if ($errors->has('nama_belakang'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('nama_belakang') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="form-group {{ $errors->has('jenis_kelamin') ? ' has-error' : '' }}">
                                        <label for="jenis_kelamin">Jenis Kelamin</label>
                                        <select name="jenis_kelamin" class="form-control">
                                            <option value="" disabled selected>Pilih Jenis Kelamin</option>
                                            <option value="L">Laki - Laki</option>
                                            <option value="P">Perempuan</option>
                                        </select>
                                        @if ($errors->has('jenis_kelamin'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('jenis_kelamin') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="form-group {{ $errors->has('tempat_lahir') ? ' has-error' : '' }}">
                                        <label for="tempat_lahir">Tempat Lahir</label>
                                        <input type="text" name="tempat_lahir" class="form-control" placeholder="Input Tempat Lahir">
                                        @if ($errors->has('tempat_lahir'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('tempat_lahir') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="form-group {{ $errors->has('tanggal_lahir') ? ' has-error' : '' }}">
                                        <label for="tanggal_lahir">Tanggal Lahir</label>
                                        <div class="input-group date">
                                            <input type="text" name="tanggal_lahir" class="form-control input-date" data-provide="datepicker" placeholder="Input Tanggal Lahir">
                                            <div class="input-group-addon">
                                                <span class="glyphicon glyphicon-th"></span>
                                            </div>
                                        </div>
                                        @if ($errors->has('tanggal_lahir'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('tanggal_lahir') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="form-group {{ $errors->has('no_hp') ? ' has-error' : '' }}">
                                        <label for="no_hp">No HP</label>
                                        <div class="input-group date">
                                            <input type="text" name="no_hp" class="form-control" placeholder="Input No HP">
                                            <div class="input-group-addon">
                                                <span class="fa fa-mobile"></span>
                                            </div>
                                        </div>
                                        @if ($errors->has('no_hp'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('no_hp') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="form-group {{ $errors->has('jurusan') ? ' has-error' : '' }}">
                                        <label for="jurusan">Jurusan</label>
                                        <select name="jurusan" class="form-control">
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
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group {{ $errors->has('tahun_lulus') ? ' has-error' : '' }}">
                                        <label for="tahun_lulus">Tahun Lulus</label>
                                        <input type="text" name="tahun_lulus" class="form-control" placeholder="Tahun Angkatan">
                                        @if ($errors->has('tahun_lulus'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('tahun_lulus') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    
                                    <div class="form-group {{ $errors->has('alamat') ? ' has-error' : '' }}">
                                        <label for="alamat">Alamat</label>
                                        <textarea name="alamat" class="form-control" rows="4"></textarea>
                                        @if ($errors->has('alamat'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('alamat') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="form-group {{ $errors->has('foto') ? ' has-error' : '' }}">
                                        <label for="foto">Foto</label>
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
                                    <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                                        <label for="email">Email</label>
                                        <div class="input-group date">
                                            <input type="email" name="email" class="form-control" placeholder="Input Email">
                                            <div class="input-group-addon">
                                                <span class="fa fa-envelope"></span>
                                            </div>
                                        </div>
                                        @if ($errors->has('email'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="form-group {{ $errors->has('password') ? ' has-error' : '' }}">
                                        <label for="password">Password</label>
                                        <input type="password" name="password" class="form-control" placeholder="Input Password">
                                         @if ($errors->has('password'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>                        
                        </div>
                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary pull-right" style="margin:10px; width:100px;">Save</button>
                        </div>
                    </form>
                </div>
                
            </div>
        </div>
    </section>
@endsection