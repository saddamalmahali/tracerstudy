@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1> 
            Data Admin
            <p><small>index</small></p>
            
        </h1>
        
    </section>

    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h2 class="panel-title">List Data Admin</h2>
                    </div>
                    <div class="panel-body">
                        @if(Session::has('sukses'))
                            <div class="alert alert-info alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <h4><i class="icon fa fa-info"></i> Sukses!</h4>
                                {!! Session::get('sukses') !!}
                            </div>
                        @endif
                        <div class="pull-right">
                            <a href="{{url('/admin/user_admin/tambah')}}" class="btn btn-primary" style="margin:20px;">Tambah Data</a>
                        </div>
                        <table class="table table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th style="text-align:center; width:10%;">No</th>
                                    <th style="text-align:center; width:20%;">Nama</th>
                                    <th style="text-align:center; width:15%;">Email</th>
                                    <th style="text-align:center; width:20%;">Register</th>
                                    <th style="text-align:center; width:10%;">Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 0; ?>
                                @forelse ($data_user_admin as $admin)
                                    <tr>
                                        <td align="center">{{$i+1}}</td>
                                        <td align="center">{{$admin->name}}</td>
                                        <td align="center">{{$admin->email}}</td>
                                        <td align="center">{{date('d-m-Y', strtotime($admin->created_at))}}</td>
                                        <td align="center">
                                            
                                            <a href="{{url('/admin/user_admin/update').'/'.$admin->id}}" {{auth('web')->user()->id == $admin->id ? 'disabled' : ''}} class="btn btn-success btn-xs"><i class="fa fa-pencil"></i></a>
                                            <a class="btn btn-danger btn-xs btn-hapus-admin" id="{{$admin->id}}" {{auth('web')->user()->id == $admin->id ? 'disabled' : ''}}><i class="fa fa-trash"></i></a>
                                        </td>
                                    </tr>
                                    <?php $i++; ?>
                                @empty
                                    <tr>
                                        <td colspan="6" align="center">Tidak Ada Data</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $(document).on('click', '.btn-hapus-admin', function(e){
            e.preventDefault();
            var id = $(this).attr('id');

            if(confirm('Yakin ingin menghapus data?')){
                $.ajax({
                    url : '/admin/user_admin/delete',
                    type : 'post',
                    data : {id : id},
                    dataType : 'json',
                    success : function(data){
                        if(data == 'success'){
                            window.location.reload(false);
                            alert("Data berhasil dihapus");
                        }
                    }
                });
            }
        });
        $(document).ready({
            
        });
    </script>
@endsection