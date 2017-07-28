@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            <p><small>Data Responden</small></p>

        </h1>

    </section>

    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-header">
                        <h2 class="box-title">{{$res['title_panel']}}</h2>
                    </div>
                    <div class="box-body ">
                        <div id="container" class="text-center" style="width: 100%;">
                            <canvas id="myChart"></canvas>
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
            chart_head = data.chart_head;
            config.data.labels = chart_head;
            data_chart = data.chart_data;
//            config.data.datasets[0].data= data_chart;
            $.each(data_chart, function(index, value){
                console.log(value);
                config.data.datasets[0].data[index] = value;
            });
            config.options.title.display = true;
            config.options.title.text = data.chart_title;
//            var i = 0;
//            $.each(data_chart,  function(index, value){
//                config.data.datasets[0].data[index] = value;
//
//            });
            //config.data.datasets.forEach(function(dataset) {

            // dataset.data = dataset.data.map(function() {
            //   return data_chart[i];
            //});

            // i++;
            //});
            window.myPie.update();
        };
        var id_form = "{{$res['id_form']}}";
        $.ajax({
            url : '/admin/laporan_responden/get_chart_content',
            type : 'post',
            data: {id_form: id_form},
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
            type: 'bar',
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
                    ]
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
                responsive: true,
                title: {
                    display: true,
                    text: 'Responden Untuk Form 4'
                },
                legend: {
                    display: false
                },
                scales: {
                    xAxes: [{
                        gridLines : {
                            display : false,
                        },
                        ticks: {
                            stepSize: 1,
                            min: 0,
                            autoSkip: false
                        }
                    }],

                },
            }
        };

        window.onload = function() {
            var ctx = document.getElementById("myChart").getContext("2d");
            window.myPie = new Chart(ctx, config);
        };
    </script>
@endsection