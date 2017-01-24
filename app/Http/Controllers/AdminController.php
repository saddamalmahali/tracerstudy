<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Alumni;
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
        return view('admin.alumni.view',['alumni'=>$alumni]);
    }
}
