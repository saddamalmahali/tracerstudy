<?php

namespace App\Http\Controllers;

use App\Alumni;
use App\Tracer;
use Illuminate\Http\Request;

class AdminTracerController extends Controller
{
    public function index()
    {
        $data_tracer = Tracer::paginate(10);
        return view('admin.tracer.index', [
            'data_tracer'=>$data_tracer
        ]);
    }

    public function view_tracer($id_tracer, Request $request)
    {
        $tracer = Tracer::find($id_tracer);
        $isian_tracer = $tracer->detile();
        return view('admin.tracer.view', [
            'tracer'=>$tracer,
            'isian_tracer'=>$isian_tracer
        ]);
    }
}
