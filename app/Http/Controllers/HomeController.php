<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Alumni;
use App\Tracer;
use App\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jml_alumni = Alumni::count();
        $jml_tracer = Tracer::count();
        $jml_admin = User::count();
        $data = [
            'jml_alumni'=>$jml_alumni,
            'jml_tracer'=>$jml_tracer,
            'jml_admin'=>$jml_admin
        ];

        $alumni = Alumni::orderBy('created_at', 'desc')->limit(5)->get();

        return view('home', ['data'=>$data, 'data_alumni'=>$alumni]);
    }

    public function get_data_chart()
    {
        $jml_tr_arst = Tracer::where('kode_prodi', '=', '23201')->count();
        $jml_tr_ind = Tracer::where('kode_prodi', '=', '26201')->count();
        $jml_tr_inf = Tracer::where('kode_prodi', '=', '55201')->count();
        $jml_tr_sip = Tracer::where('kode_prodi', '=', '22201')->count();
        $jml_tr_kmpt = Tracer::where('kode_prodi', '=', '56401')->count();
        $jml_tr_mind = Tracer::where('kode_prodi', '=', '26402')->count();

        $data = [
            $jml_tr_arst, $jml_tr_ind, $jml_tr_inf, $jml_tr_sip, $jml_tr_kmpt, $jml_tr_mind
        ];

        return json_encode($data);

    }

    public function index_alumni(){
        return view('admin.alumni.index');
    }
}
