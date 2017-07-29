<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Alumni;
use App\User;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\RedirectsUsers;
class AdminController extends Controller
{
    use RedirectsUsers, ThrottlesLogins;

    protected $redirectTo = '/home';
	protected $guard = 'web';

    public function __construct()
    {
        $this->middleware('auth:web');
    }

    /* Menu Alumni */
    public function index_alumni()
    {
        $alumni = new Alumni();
        $alumni = $alumni->paginate('10');

        return view('admin.alumni.index', ['data_alumni'=> $alumni]);
    }

    public function tambah_alumni()
    {
        return view('admin.alumni.tambah');
    }

    public function simpan_alumni(Request $request)
    {

        $this->validate($request, [
            'nama_depan' => 'required|max:50',
            'nama_belakang' => 'required|max:50',            
            'jenis_kelamin'=>'required',
            'tempat_lahir'=>'required',
            'tanggal_lahir'=>'required',
            'tahun_lulus'=>'required',
            'alamat'=>'required',
            'no_hp'=>'required'
        ]);

        $id_alumni = $request->input('id');
        // echo "ID Alumni :".$id_alumni;
        // if($id_alumni == ''){
        //     echo "Tidak Ada Data";
        // }else{
        //     echo "Ada Data";
        // }
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
            $alumni->tahun_lulus = $request->input('tahun_lulus');
            $alumni->alamat = $request->input('alamat');
            $alumni->no_hp = $request->input('no_hp');

            if ($request->file('foto') != null) {
                $destinationPath = 'img'; // upload path
                $extension = $request->file('foto')->getClientOriginalExtension(); // getting image extension
                $fileName = rand(11111,99999).'.'.$extension; // renameing image
                $request->file('foto')->move($destinationPath, $fileName); // uploading file to given path
                $alumni->foto = $fileName;
            }

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
            $alumni->tahun_lulus = $request->input('tahun_lulus');
            $alumni->alamat = $request->input('alamat');
            $alumni->no_hp = $request->input('no_hp');
            
            if ($request->file('foto') != null) {
                $destinationPath = 'img'; // upload path
                $extension = $request->file('foto')->getClientOriginalExtension(); // getting image extension
                $fileName = rand(11111,99999).'.'.$extension; // renameing image
                $request->file('foto')->move($destinationPath, $fileName); // uploading file to given path
                $alumni->foto = $fileName;
            }

            if($request->input('password') != ''){
                $alumni->password = bcrypt($request->input('password'));
            }

            if($alumni->save()){
                return redirect('/admin/alumni');
            }else{
                return "Gagal Register";
            }
        }

    }

    public function update_alumni($id)
    {
        $alumni = Alumni::find($id);
        return view('admin.alumni.update', ['alumni'=>$alumni]);
    }

    public function hapus_alumni(Request $request)
    {
        if($request->ajax()){
            $id = $request->input('id');

            $alumni = Alumni::find($id);
            if($alumni->delete()){
                return json_encode("success");
            }
        }
    }

    public function view_alumni($id)
    {
        $alumni = Alumni::find($id);
        $tracer = $alumni->tracer()->first();
        $isian_tracer = $tracer->detile;
//        echo json_encode($isian_tracer);
        return view('admin.alumni.view', [
            'alumni'=>$alumni,
            'tracer'=>$tracer,
            'isian_tracer'=>$isian_tracer
        ]);
//        return view('admin.alumni.view',['alumni'=>$alumni]);
    }

    public function index_user_admin(){

        $admin = new User();
        $admin = $admin->paginate('5');
        return view('admin.user_admin.index', ['data_user_admin'=>$admin]);
    }

    public function tambah_user_admin()
    {
        return view('admin.user_admin.tambah');
    }

    public function save_user_admin(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:50',
            
            'email'=>'required|email|max:255|unique:users',
            'password'=>'required|min:6'
        ]);

        $admin = new User();
        $admin->name = $request->input('name');
        $admin->email = $request->input('email');
        $admin->password = bcrypt($request->input('password'));

        if($admin->save()){
            $request->session()->flash('sukses', 'Berhasil Menyimpan Data!');            
            return redirect('/admin/user_admin');
        }
    }

    public function update_user_admin($id)
    {
        $admin = User::find($id);
        return view('admin.user_admin.update', ['admin'=>$admin]);
    }

    public function save_update_user_admin(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:50',
            
            'email'=>'required|email|max:255'
        ]);

        $admin = User::find($request->input('id'));
        $admin->name = $request->input('name');
        $admin->email = $request->input('email');
        if($request->input('password') != ''){
            $admin->password = bcrypt($request->input('password'));
        }

        if($admin->save()){
            $request->session()->flash('sukses', 'Berhasil Menyimpan Data!');            
            return redirect('/admin/user_admin');
        }
    }

    public function hapus_user_admin(Request $request)
    {
        $id_user = $request->input('id');

        $admin = User::find($id_user);

        if($admin->delete()){
            return json_encode('success');
        }
    }
    
    
}
