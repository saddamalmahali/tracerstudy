<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Alumni;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\RedirectsUsers;
class AlumniController extends Controller
{    
    use RedirectsUsers, ThrottlesLogins;

    protected $redirectTo = '/alumni/home';
	protected $guard = 'tracer';
    
    public function index(){
        return view('alumni.index');
    }

    public function login()
    {
        if(auth('tracer')->check()){
            return redirect('/alumni/home');
        }
        return view('alumni.login');
    }

    public function register()
    {
        return view('alumni.register');
    }

    public function simpan_alumni(Request $request)
    {
        $this->validate($request, [
            'nama_depan' => 'required|max:50',
            'nama_belakang' => 'required|max:50',
            'email' => 'required|email|max:255|unique:alumni',
            'jenis_kelamin'=>'required',
            'tempat_lahir'=>'required',
            'tanggal_lahir'=>'required',
            'jurusan'=>'required',
            'tahun_lulus'=>'required',
            'alamat'=>'required',
            'no_hp'=>'required|max:20',
            'konfirmasi'=>'required'
        ]);

        $id_alumni = $request->input('id');

        // print_r($request->all());
        // echo "ID Alumni :".$id_alumni;
        if($id_alumni == ''){
            echo "Tidak Ada Data";
        }else{
            echo "Ada Data";
        }
        if($id_alumni == ""){
            $alumni = new Alumni();

            $alumni->nama_depan = $request->input('nama_depan');
            $alumni->nama_belakang = $request->input('nama_belakang');
            $alumni->email = $request->input('email');
            $alumni->password = bcrypt($request->input('password'));
            $alumni->jenis_kelamin = $request->input('jenis_kelamin');
            $alumni->tempat_lahir = $request->input('tempat_lahir');
            $alumni->tanggal_lahir = date('Y-m-d', strtotime($request->input('tanggal_lahir')));
            $alumni->jurusan = $request->input('jurusan');
            $alumni->no_hp = $request->input('no_hp');
            $alumni->tahun_lulus = $request->input('tahun_lulus');
            $alumni->alamat = $request->input('alamat');

            if($alumni->save()){
                return redirect('/admin/alumni');
            }else{
                return "Gagal Register";
            }
        }else{
            $alumni = Alumni::find($id_alumni);
            $alumni->nama_depan = $request->input('nama_depan');
            $alumni->nama_belakang = $request->input('nama_belakang');
            $alumni->jenis_kelamin = $request->input('jenis_kelamin');
            $alumni->tempat_lahir = $request->input('tempat_lahir');
            $alumni->tanggal_lahir = date('Y-m-d', strtotime($request->input('tanggal_lahir')));
            $alumni->jurusan = $request->input('jurusan');
            $alumni->no_hp = $request->input('no_hp');
            $alumni->angkatan = $request->input('tahun_lulus');
            $alumni->alamat = $request->input('alamat');

            if($alumni->save()){
                return redirect('/admin/alumni');
            }else{
                return "Gagal Register";
            }
        }
    }

    public function daftar_alumni()
    {
        return view('');
    }

    public function index_tracer()
    {
        $alumni = auth('tracer')->user();
        return view('alumni.tracer.index', ['alumni'=>$alumni]);
    }
}
