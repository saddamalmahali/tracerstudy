@extends('layouts.app')

@section('content')
<div class="content-header">
    <h1>
        Dashboard
    </h1>
</div>

<section class="content">
    <div class="row">
        <div class="col-lg-3 col-xs-6">
            <div class="small-box bg-aqua">
                <div class="inner">
                    <h3>{{$data['jml_alumni']}}</h3>
                    <p>Total Alumni</p>
                </div>
                <div class="icon">
                    <i class="ion ion-android-contacts"></i>
                </div>

                <a href="{{url('/admin/alumni')}}" class="small-box-footer">
                    Lihat Data
                    <i class="fa fa-arrow-circle-right"></i>
                </a>
                
            </div>
        </div>
        <div class="col-lg-3 col-xs-6">
            <div class="small-box bg-green">
                <div class="inner">
                    <h3>{{$data['jml_tracer']}}</h3>
                    <p>Total Responden</p>
                </div>
                <div class="icon">
                    <i class="ion ion-android-list"></i>
                </div>

                <a href="#" class="small-box-footer">
                    Lihat Data
                    <i class="fa fa-arrow-circle-right"></i>
                </a>
                
            </div>
        </div>
        <div class="col-lg-3 col-xs-6">
            <div class="small-box bg-yellow">
                <div class="inner">
                    <h3>6</h3>
                    <p>Total Jurusan</p>
                </div>
                <div class="icon">
                    <i class="ion ion-arrow-graph-up-right"></i>
                </div>

                <a href="#" class="small-box-footer">
                    Lihat Data
                    <i class="fa fa-arrow-circle-right"></i>
                </a>
                
            </div>
        </div>
        <div class="col-lg-3 col-xs-6">
            <div class="small-box bg-red">
                <div class="inner">
                    <h3>{{$data['jml_admin']}}</h3>
                    <p>Total Admin</p>
                </div>
                <div class="icon">
                    <i class="ion ion-person-add"></i>
                </div>

                <a href="#" class="small-box-footer">
                    Lihat Data
                    <i class="fa fa-arrow-circle-right"></i>
                </a>
                
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h4 class="box-title">Data Quesioner & 5 Terakhir Alumni yang terdaftar</h4>
                </div>
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-4">
                            <canvas id="myChart"></canvas>
                        </div>
                        <div class="col-md-8">
                            <table class="table">
                                <em>Data Update Per tanggal {{date('d-m-Y')}}</em>
                                <thead>
                                    <tr>
                                        <th style="text-align:center;">No</th>
                                        <th style="text-align:center;">Nama Alumni</th>
                                        <th style="text-align:center;">Email</th>
                                        <th style="text-align:center;">Jurusan</th>
                                        <th style="text-align:center;">Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i=0; ?>
                                    @forelse ($data_alumni as $alumni)
                                        <tr>
                                            <td align="center">{{$i+1}}</td>
                                            <td align="center">{{$alumni->nama_depan.' '.$alumni->nama_belakang}}</td>
                                            <td align="center">{{$alumni->email}}</td>
                                            <td align="center"><span class="label label-primary">
                                                <?php 
                                                    switch($alumni->jurusan){
                                                        case "55201" : 
                                                            echo "Teknik Informatika (S1)";
                                                            break;
                                                        case "26201" : 
                                                            echo "Teknik Industri (S1)";
                                                            break;
                                                        case "56401" : 
                                                            echo "Teknik Komputer (D3)";
                                                            break;
                                                        case "22201" : 
                                                            echo "Teknik Sipil (S1)";
                                                            break;
                                                        case "23201" : 
                                                            echo "Arsitektur (S1)";
                                                            break;
                                                        case "26402" :
                                                            echo "Manajemen Industri (D3)";
                                                        default :
                                                            echo "lain-lain";
                                                    }
                                                ?>
                                            </span></td>
                                            <td  align="center">
                                                @if($alumni->cek_status($alumni->email))
                                                    <span class="label label-primary">Sudah Mengisi</span>
                                                @else
                                                    <span class="label label-danger">Belum Mengisi</span>
                                                @endif
                                            </td>
                                        </tr>
                                        <?php $i++; ?>
                                    @empty
                                        <tr>
                                            <td colspan="5" align="center">Tidak Ada Data</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
    window.chartColors = {
        red: 'rgb(255, 99, 132)',
        orange: 'rgb(255, 159, 64)',
        yellow: 'rgb(255, 205, 86)',
        green: 'rgb(75, 192, 192)',
        blue: 'rgb(54, 162, 235)',
        purple: 'rgb(153, 102, 255)',
        grey: 'rgb(231,233,237)'
    };
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var data_chart = '';
    var set_data = function(data){
        data_chart = data;
        var i = 0;
        $.each(data_chart,  function(index, value){
            config.data.datasets[0].data[index] = value;
            
        });
         //config.data.datasets.forEach(function(dataset) {
            
           // dataset.data = dataset.data.map(function() {
             //   return data_chart[i];
            //});
            
           // i++;
        //});
        window.myPie.update();
    };
    $.ajax({
        url : '/get_data_chart',
        type : 'post',
        dataType : 'json',
        success : function(data){
            set_data(data);
        }
    });

    

    window.randomScalingFactor = function() {
        return (Math.random() > 0.5 ? 1.0 : -1.0) * Math.round(Math.random() * 100);
    }

    var randomScalingFactor = function() {
        return Math.round(Math.random() * 100);
    };
    var data_chart= '';
                       
    var config = {
        type: 'pie',
        data: {
            datasets: [{
                data: [
                    randomScalingFactor(),
                    randomScalingFactor(),
                    randomScalingFactor(),
                    randomScalingFactor(),
                    randomScalingFactor(),
                    randomScalingFactor(),
                ],
                backgroundColor: [
                    window.chartColors.red,
                    window.chartColors.orange,
                    window.chartColors.yellow,
                    window.chartColors.green,
                    window.chartColors.blue,
                    window.chartColors.grey,
                ],
                label: 'Dataset 1'
            }],
            labels: [
                "ARS",
                "TID",
                "TIF",
                "TSP",
                "TKM",
                "MID"
            ]
        },
        options: {
            responsive: true
        }
    };

    window.onload = function() {
        var ctx = document.getElementById("myChart").getContext("2d");
        window.myPie = new Chart(ctx, config);
    };
</script>
@endsection
