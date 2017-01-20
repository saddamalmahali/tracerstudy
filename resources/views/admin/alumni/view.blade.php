@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Alumni 
            <p><small>Detail Alumni : {{$alumni->nama_depan.' '.$alumni->nama_belakang}}</small></p>
            
        </h1>
        
    </section>

    <section class="content">
        <div class="row">
            <div class="col-md-8">
                <div class="box box-primary">
                    <div class="box-header">
                        <h2 class="box-title">Data Alumni</h2>
                    </div>
                    <div class="box-body">
                        <table class="table">
                            <tr>
                                <td width="20%">Nama Depan</td>
                                <td>:</td>
                                <td>{{$alumni->nama_depan}}</td>
                            </tr>
                            <tr>
                                <td>Nama Belakang</td>
                                <td>:</td>
                                <td>{{$alumni->nama_belakang}}</td>
                            </tr>
                            <tr>
                                <td>Jenis Kelamin</td>
                                <td>:</td>
                                <td>{{$alumni->jenis_kelamin == 'L'? 'Laki - Laki' : 'Perempuan'}}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection