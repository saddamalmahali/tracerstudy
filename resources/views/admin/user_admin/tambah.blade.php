@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            ADMIN 
            <p><small>Tambah User Admin</small></p>
            
        </h1>
        
    </section>

    <section class="content">
        <div class="row">
            <div class="col-md-8">
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">FORM TAMBAH USER</h3>
                    </div>
                    <form action="{{url('admin/user_admin/save')}}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="box-body">           
                                <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
                                    <label for="nama_depan">Nama Admin</label>
                                    <input type="text" name="name" class="form-control" placeholder="Input Nama Admin">
                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('name') }}</strong>
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
                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary pull-right" style="margin:10px; width:100px;">Save</button>
                        </div>
                    </form>
                </div>
                
            </div>
        </div>
    </section>
@endsection