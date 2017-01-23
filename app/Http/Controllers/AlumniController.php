<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Alumni;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\RedirectsUsers;
use App\Tracer;
use App\TracerDetile;
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
                return redirect('/login-alumni');
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
                return redirect('/login-alumni');
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

    public function input_tracer(Request $request)
    {
        //Menampilkan Request Input dari Form
        $this->validate($request, [
            'kode_pt' => 'required',
            'kode_prodi' => 'required',
            'kode_prodi' => 'required',
            'nama'=>'required',
            'no_hp'=>'required',
            'email'=>'required',
            'f3_input_text'=>'required',
            'f3_select_input'=>'required',
            'f4_check'=>'required',
            'f5_input_text'=>'required',
            'f5_select_input'=>'required',
            'f6_input_text'=>'required',
            'f6_select_input'=>'required',
            'f7_input_text'=>'required',
            'f7_select_input'=>'required',
            'f7a_input_text'=>'required',
            'f7a_select_input'=>'required',
            'f8_radio_input'=>'required',
            'f9_checkbox_input'=>'required',
            'f10_select_input'=>'required',
            'f10_select_input'=>'required',
            'f10_select_input'=>'required',
            'f11_select_input'=>'required',
            'f12_select_input'=>'required',
            'f14_select_input'=>'required',
            'f15_select_input'=>'required',
            'f16_checkbox_input'=>'required',
            'f17_option_1_a'=>'required',
            'f17_option_1_b'=>'required',
            'f17_option_2_a'=>'required',
            'f17_option_2_b'=>'required',
            'f17_option_3_a'=>'required',
            'f17_option_3_b'=>'required',
            'f17_option_4_a'=>'required',
            'f17_option_4_b'=>'required',
            'f17_option_5_a'=>'required',
            'f17_option_5_b'=>'required',
            'f17_option_6_a'=>'required',
            'f17_option_6_b'=>'required',
            'f17_option_7_a'=>'required',
            'f17_option_7_b'=>'required',
            'f17_option_8_a'=>'required',
            'f17_option_8_b'=>'required',
            'f17_option_9_a'=>'required',
            'f17_option_9_b'=>'required',
            'f17_option_10_a'=>'required',
            'f17_option_10_b'=>'required',
            'f17_option_11_a'=>'required',
            'f17_option_11_b'=>'required',
            'f17_option_12_a'=>'required',
            'f17_option_12_b'=>'required',
            'f17_option_13_a'=>'required',
            'f17_option_13_b'=>'required',
            'f17_option_14_a'=>'required',
            'f17_option_14_b'=>'required',
            'f17_option_15_a'=>'required',
            'f17_option_15_b'=>'required',
            'f17_option_16_a'=>'required',
            'f17_option_16_b'=>'required',
            'f17_option_17_a'=>'required',
            'f17_option_17_b'=>'required',
            'f17_option_18_a'=>'required',
            'f17_option_18_b'=>'required',
            'f17_option_19_a'=>'required',
            'f17_option_19_b'=>'required',
            'f17_option_20_a'=>'required',
            'f17_option_20_b'=>'required',
            'f17_option_21_a'=>'required',
            'f17_option_21_b'=>'required',
            'f17_option_22_a'=>'required',
            'f17_option_22_b'=>'required',
            'f17_option_23_a'=>'required',
            'f17_option_23_b'=>'required',
            'f17_option_24_a'=>'required',
            'f17_option_24_b'=>'required',
            'f17_option_25_a'=>'required',
            'f17_option_25_b'=>'required',
            'f17_option_26_a'=>'required',
            'f17_option_26_b'=>'required',
            'f17_option_27_a'=>'required',
            'f17_option_27_b'=>'required',
            'f17_option_28_a'=>'required',
            'f17_option_28_b'=>'required',
            'f17_option_29_a'=>'required',
            'f17_option_29_b'=>'required',
            'f17_option_30_a'=>'required',
            'f17_option_30_b'=>'required',
        ]);
        echo json_encode($request->all());

        //Isi header ke tabel tracer
        $tracer = new Tracer();
        $tracer->kode_pt = $request->input('kode_pt');
        $tracer->kode_prodi = $request->input('kode_prodi');
        $tracer->nama = $request->input('nama');
        $tracer->no_hp = $request->input('no_hp');
        $tracer->email = $request->input('email');

        if($tracer->save()){
            //isi form f3
            $f3 = new TracerDetile();
            $f3->id_tracer = $tracer->id;
            $f3->kode_form = 'f3';
            $f3->value = $request->input('f3_input_text');
            $f3->option = $request->input('f3_select_text');

            if($f3->save()){
                unset($f3);
            }

            //Isi form f4
            $f4 = new TracerDetile();
            $f4->id_tracer = $tracer->id;
            $f4->kode_form = 'f4';
            $f4->value = $request->input('f4_check');

            $f4->save();

            //Isi form f5
            $f5 = new TracerDetile();
            $f5->id_tracer = $tracer->id;
            $f5->kode_form = 'f5';
            $f5->value = $request->input('f5_input_text');
            $f5->option = $request->input('f5_select_input'); 

            $f5->save();

            //Isi form f6
            $f6 = new TracerDetile();
            $f6->id_tracer = $tracer->id;
            $f6->kode_form = 'f6';
            $f6->value = $request->input('f6_input_text');
            $f6->option = $request->input('f6_select_input'); 

            $f6->save();

            //Isi form f7
            $f7 = new TracerDetile();
            $f7->id_tracer = $tracer->id;
            $f7->kode_form = 'f7';
            $f7->value = $request->input('f7_input_text');
            $f7->option = $request->input('f7_select_input'); 
            $f7->save();

            //Isi form f8
            $f8 = new TracerDetile();
            $f8->id_tracer = $tracer->id;
            $f8->kode_form = 'f8';
            $f8->value = $request->input('f8_radio_input');
            $f8->save();

            //isi form f9
            $f9_input = $request->input('f9_checkbox_input');
            if($f9_input != null){
                $i = 0;
                foreach ($f9_input as $data) {
                    $f9 = new TracerDetile();
                    $f9->id_tracer = $tracer->id;
                    $f9->kode_form = 'f9';
                    $f9->value = $request->input($data);
                    $f9->save();
                    
            
                }
            }
        }
        
    }
}
    