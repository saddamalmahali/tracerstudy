@extends('layouts.app')

@section('content')
<div class="content-header">
    <h1>
        Dasboard
    </h1>
</div>

<section class="content">
    <div class="row">
        <div class="col-lg-3 col-xs-6">
            <div class="small-box bg-aqua">
                <div class="inner">
                    <h3>{{$jml_alumni}}</h3>
                    <p>Total Alumni</p>
                </div>
                <div class="icon">
                    <i class="ion ion-bag"></i>
                </div>

                <a href="{{url('/admin/alumni')}}" class="small-box-footer">
                    Lihat Data
                    <i class="fa fa-arrow-circle-right"></i>
                </a>
                
            </div>
        </div>
        <div class="col-lg-3 col-xs-6">
        
        </div>
    </div>
</section>
@endsection
