@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Halaman Alumni 
            <p><small>Data Alumni</small></p>
            
        </h1>
        
    </section>

    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h2 class="panel-title">List Data Alumni</h2>
                    </div>
                    <div class="panel-body">
                        <div class="pull-right">
                            <a href="{{url('/admin/alumni/tambah')}}" class="btn btn-primary" style="margin:20px;">Tambah Alumni</a>
                        </div>
                        <table class="table table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th style="text-align:center; width:10%;">No</th>
                                    <th style="text-align:center; width:20%;">Nama</th>
                                    <th style="text-align:center; width:15%;">Tpt/Tanggal Lahir</th>
                                    <th style="text-align:center; width:20%;">Email</th>
                                    <th style="text-align:center; ">Angkatan</th>
                                    <th style="text-align:center; ">Jurusan</th>
                                    <th style="text-align:center; width:10%;">Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 0; ?>
                                @forelse ($data_alumni as $alumni)
                                    <tr>
                                        <td align="center">{{$i+1}}</td>
                                        <td>{{$alumni->nama_depan." ".$alumni->nama_belakang}}</td>
                                        <td align="center">{{$alumni->tempat_lahir.', '.date('d-m-Y', strtotime($alumni->tanggal_lahir))}}</td>
                                        <td align="center">{{$alumni->email}}</td>
                                        <td align="center">{{$alumni->angkatan}}</td>
                                        <td align="center"><span class="label label-primary">
                                            <?php 
                                                switch($alumni->jurusan){
                                                    case "tinf" : 
                                                        echo "Teknik Informatika";
                                                        break;
                                                    case "tind" : 
                                                        echo "Teknik Industri";
                                                        break;
                                                    case "tk" : 
                                                        echo "Teknik Komputer";
                                                        break;
                                                    case "ts" : 
                                                        echo "Teknik Sipil";
                                                        break;
                                                    case "arsitek" : 
                                                        echo "Arsitek";
                                                        break;
                                                    default :
                                                        echo "lain-lain";
                                                }
                                            ?>
                                        </span></td>
                                        <td align="center">
                                            <a href="{{url('/admin/alumni/view').'/'.$alumni->id}}" class="btn btn-primary btn-xs"><i class="fa fa-eye"></i></a>
                                            <a href="{{url('/admin/alumni/update').'/'.$alumni->id}}" class="btn btn-success btn-xs"><i class="fa fa-pencil"></i></a>
                                            <a class="btn btn-danger btn-xs btn-hapus-alumni" id="{{$alumni->id}}"><i class="fa fa-trash"></i></a>
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

        $(document).on('click', '.btn-hapus-alumni', function(e){
            e.preventDefault();
            var id = $(this).attr('id');

            if(confirm('Yakin ingin menghapus data?')){
                $.ajax({
                    url : '/admin/alumni/delete',
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