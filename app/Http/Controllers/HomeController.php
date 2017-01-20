<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Alumni;

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

        return view('home', ['jml_alumni'=>$jml_alumni]);
    }

    public function index_alumni(){
        return view('admin.alumni.index');
    }
}
