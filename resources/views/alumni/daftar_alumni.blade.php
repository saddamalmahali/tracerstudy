@extends('layouts.home')

@section('content')
    <div class="row">
        <div class="container">
            <div class="col-md-10 col-md-offset-1">
                <center><h1>DAFTAR ALUMNI </h1><p><h3><small>Daftar Alumni yang telah terdaftar pada sistem tracer study Sekolah Tinggi Teknologi Garut</small></h3></p></center>

                <p>
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th style="text-align:center;">No</th>
                                <th style="text-align:center;">Nama</th>
                                <th style="text-align:center;">Tempat/<br />Tanggal Lahir</th>
                                <th style="text-align:center;">Jenis <br />Kelamin</th>
                                <th style="text-align:center;">Email</th>
                                <th style="text-align:center;">Status</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php $i =0; ?>
                            @forelse ($data_alumni as $alumni)
                                <tr>
                                    <td align="center">{{$i+1}}</td>
                                    <td align="center">{{$alumni->nama_depan.' '.$alumni->nama_belakang}}</td>
                                    <td align="center">{{$alumni->tempat_lahir.', '.date('d-m-Y', strtotime($alumni->tanggal_lahir))}}</td>
                                    <td align="center">{{$alumni->jenis_kelamin}}</td>
                                    <td align="center">{{$alumni->email}}</td>
                                    <td align="center">
                                        @if($alumni->cek_status($alumni->email))
                                            <span class="label label-primary">{{$alumni->status($alumni->email)}}</span>
                                        @else
                                            <span class="label label-danger">{{$alumni->status($alumni->email)}}</span>

                                        @endif
                                    </td>
                                </tr>
                                <?php $i++; ?>
                            @empty
                                
                            @endforelse
                        </tbody>
                    </table>

                    <div style="text-align:center;">{{$data_alumni->links()}}</div>
                </p>

            </div>
        </div>
    </div>
@endsection