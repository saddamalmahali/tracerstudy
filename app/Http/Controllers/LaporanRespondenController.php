<?php

namespace App\Http\Controllers;

use App\Tracer;
use App\TracerDetile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;


class LaporanRespondenController extends Controller
{
    public function index()
    {
        $tracer = new TracerDetile();
        return view('laporan_responden.index', [
            'data_tracer'=>$tracer
        ]);
    }

    public function tracer_detile($id_form, Request $request)
    {
        if($id_form == 'f3')
        {



            $res = [
                'title_panel'=> 'Responden Untuk Form 3',
                'page_head'=> 'Kapan anda mulai mencari pekerjaan?',
                'id_form' =>'f3'
            ];

            return view('laporan_responden.detile', ['res'=>$res]);

        }
    }

    public function getChartContent(Request $request)
    {
        if($request->get('id_form') == 'f3'){
            $data_chart = [
                TracerDetile::where('kode_form', '=', 'f3')->where('option', '=', 1)->count(),
                TracerDetile::where('kode_form', '=', 'f3')->where('option', '=', 2)->count()
            ];

            $res = [
                'chart_data'=>$data_chart,
                'chart_head'=>[
                    'Sebelum Lulus', 'Sesudah Lulus'
                ]
            ];

            return \response($res, 200, ['Content-Type'=>'application/json']);
        }

    }

}
