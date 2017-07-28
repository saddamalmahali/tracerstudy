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

            if ($request->file('foto') != null) {
                $destinationPath = 'img'; // upload path
                $extension = $request->file('foto')->getClientOriginalExtension(); // getting image extension
                $fileName = rand(11111,99999).'.'.$extension; // renameing image
                $request->file('foto')->move($destinationPath, $fileName); // uploading file to given path
                $alumni->foto = $fileName;
            }

            if($alumni->save()){
                $auth = auth()->guard('tracer'); // Atau \Auth::guard('doctor')
 
                $credentials = [
                    'email' =>  $alumni->email, // Nomor Induk Pegawai
                    'password' =>  $request->input('password'),
                ];


            
                if ($auth->attempt($credentials)) {
                    return redirect('/alumni/home');
                }
                //return redirect('/login-alumni');
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

            if($request->input('password')!= null){
                $alumni->password = bcrypt($request->input('password'));
            }

            if ($request->file('foto') != null) {
                $destinationPath = 'img'; // upload path
                $extension = $request->file('foto')->getClientOriginalExtension(); // getting image extension
                $fileName = rand(11111,99999).'.'.$extension; // renameing image
                $request->file('foto')->move($destinationPath, $fileName); // uploading file to given path
                $alumni->foto = $fileName;
            }

            if($alumni->save()){
                return redirect('/login-alumni');
            }else{
                return "Gagal Register";
            } 
        }
    }

    public function daftar_alumni()
    {
        $alumni = new Alumni();

        $alumni = $alumni->paginate('8');
        return view('alumni.daftar_alumni', ['data_alumni'=>$alumni]);
    }

    public function index_tracer()
    {
        $email_alumni = auth('tracer')->user()->email;
        $alumni = new Alumni();
        if($alumni->cek_status($email_alumni)){

            $tracer = Alumni::find(auth('tracer')->user()->id)->tracer()->first();
            $isian_tracer = $tracer->detile;
//        echo json_encode($isian_tracer);

            return view('alumni.tracer.done', [
                'tracer'=>$tracer,
                'isian_tracer'=>$isian_tracer
            ]);
        }else{
            $user_alumni = auth('tracer')->user(); 
            return view('alumni.tracer.index', ['alumni'=>$user_alumni]);
        }
        
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
            // 'f9_checkbox_input'=>'required',
            // 'f10_select_input'=>'required',
            // 'f10_select_input'=>'required',
            // 'f10_select_input'=>'required',
            // 'f11_select_input'=>'required',
            // 'f12_select_input'=>'required',
            // 'f14_select_input'=>'required',
            // 'f15_select_input'=>'required',
            // 'f16_checkbox_input'=>'required',
            // 'f17_option_1_a'=>'required',
            // 'f17_option_1_b'=>'required',
            // 'f17_option_2_a'=>'required',
            // 'f17_option_2_b'=>'required',
            // 'f17_option_3_a'=>'required',
            // 'f17_option_3_b'=>'required',
            // 'f17_option_4_a'=>'required',
            // 'f17_option_4_b'=>'required',
            // 'f17_option_5_a'=>'required',
            // 'f17_option_5_b'=>'required',
            // 'f17_option_6_a'=>'required',
            // 'f17_option_6_b'=>'required',
            // 'f17_option_7_a'=>'required',
            // 'f17_option_7_b'=>'required',
            // 'f17_option_8_a'=>'required',
            // 'f17_option_8_b'=>'required',
            // 'f17_option_9_a'=>'required',
            // 'f17_option_9_b'=>'required',
            // 'f17_option_10_a'=>'required',
            // 'f17_option_10_b'=>'required',
            // 'f17_option_11_a'=>'required',
            // 'f17_option_11_b'=>'required',
            // 'f17_option_12_a'=>'required',
            // 'f17_option_12_b'=>'required',
            // 'f17_option_13_a'=>'required',
            // 'f17_option_13_b'=>'required',
            // 'f17_option_14_a'=>'required',
            // 'f17_option_14_b'=>'required',
            // 'f17_option_15_a'=>'required',
            // 'f17_option_15_b'=>'required',
            // 'f17_option_16_a'=>'required',
            // 'f17_option_16_b'=>'required',
            // 'f17_option_17_a'=>'required',
            // 'f17_option_17_b'=>'required',
            // 'f17_option_18_a'=>'required',
            // 'f17_option_18_b'=>'required',
            // 'f17_option_19_a'=>'required',
            // 'f17_option_19_b'=>'required',
            // 'f17_option_20_a'=>'required',
            // 'f17_option_20_b'=>'required',
            // 'f17_option_21_a'=>'required',
            // 'f17_option_21_b'=>'required',
            // 'f17_option_22_a'=>'required',
            // 'f17_option_22_b'=>'required',
            // 'f17_option_23_a'=>'required',
            // 'f17_option_23_b'=>'required',
            // 'f17_option_24_a'=>'required',
            // 'f17_option_24_b'=>'required',
            // 'f17_option_25_a'=>'required',
            // 'f17_option_25_b'=>'required',
            // 'f17_option_26_a'=>'required',
            // 'f17_option_26_b'=>'required',
            // 'f17_option_27_a'=>'required',
            // 'f17_option_27_b'=>'required',
            // 'f17_option_28_a'=>'required',
            // 'f17_option_28_b'=>'required',
            // 'f17_option_29_a'=>'required',
            // 'f17_option_29_b'=>'required',
            // 'f17_option_30_a'=>'required',
            // 'f17_option_30_b'=>'required',
        ]);
//        echo json_encode($request->all());

        //Isi header ke tabel tracer
        $tracer = new Tracer();
        $tracer->kode_pt = $request->input('kode_pt');
        $tracer->kode_prodi = $request->input('kode_prodi');
        $tracer->nama_alumni = $request->input('nama');
        $tracer->no_hp = $request->input('no_hp');
        $tracer->email = $request->input('email');

        if($tracer->save()){
            $data_quesioner = array();
            //isi form f3
            $f3 = new TracerDetile();
            $f3->id_tracer = $tracer->id;
            $f3->kode_form = 'f3';
            $f3->value = $request->input('f3_input_text');
            $f3->option = $request->input('f3_select_input');

            if($f3->save()){
                unset($f3);
                array_push($data_quesioner, ['form_f3'=>'sukses']);
            }

            //Isi form f4

            $f4_check = $request->input('f4_check');
            $f4_i = 0;
            $data_f4 = array();
            foreach ($f4_check as $data) {
                $f4_i++;
                $f4 = new TracerDetile();
                $f4->id_tracer = $tracer->id;
                $f4->kode_form = 'f4';
                $f4->value = $data;
                if($f4->save()){
                    $data_f4 = [
                        'data_f4_'.$f4_i => 'sukses'
                    ];
                    array_push($data_quesioner, $data_f4);
                    unset($f4);

                }

            }
            

            $f5 = new TracerDetile();
            $f5->id_tracer = $tracer->id;
            $f5->kode_form = 'f5';
            $f5->value = $request->input('f5_input_text');
            $f5->option = $request->input('f5_select_input');

            if($f5->save()){
                unset($f5);
                array_push($data_quesioner, ['form_f5'=>'sukses']);
            }    

            $f6 = new TracerDetile();
            $f6->id_tracer = $tracer->id;
            $f6->kode_form = 'f6';
            $f6->value = $request->input('f6_input_text');
            $f6->option = $request->input('f6_select_input');

            if($f6->save()){
                unset($f6);
                array_push($data_quesioner, ['form_f6'=>'sukses']);
            }  

            $f7 = new TracerDetile();
            $f7->id_tracer = $tracer->id;
            $f7->kode_form = 'f7';
            $f7->value = $request->input('f7_input_text');
            $f7->option = $request->input('f7_select_input');

            if($f7->save()){
                unset($f7);
                array_push($data_quesioner, ['form_f7'=>'sukses']);
            } 

            $f7a = new TracerDetile();
            $f7a->id_tracer = $tracer->id;
            $f7a->kode_form = 'f7a';
            $f7a->value = $request->input('f7a_input_text');
            $f7a->option = $request->input('f7a_select_input');

            if($f7a->save()){
                unset($f7a);
                array_push($data_quesioner, ['form_f7a'=>'sukses']);
            } 

            


            //Isi form f8
            $f8 = new TracerDetile();
            $f8->id_tracer = $tracer->id;
            $f8->kode_form = 'f8';
            $f8->value = $request->input('f8_radio_input');
            
            if($f8->save()){
                unset($f8);
                array_push($data_quesioner, ['form_f8'=>'sukses']);
            } 

            $f9_check = $request->input('f9_checkbox_input');
            $f9_i = 0;
            $data_f9 = array();
            foreach ($f9_check as $data) {
                $f9_i++;
                $f9 = new TracerDetile();
                $f9->id_tracer = $tracer->id;
                $f9->kode_form = 'f9';
                $f9->value = $data;
                if($f9->save()){
                    $data_f9 = [
                        'data_f9_'.$f9_i => 'sukses'
                    ];
                    array_push($data_quesioner, $data_f9);
                    unset($f9);

                }

            }

            $f10 = new TracerDetile();
            $f10->id_tracer = $tracer->id;
            $f10->kode_form = 'f10';
            $f10->value = $request->input('f10_select_input');
            if($f10->save()){
                array_push($data_quesioner, ['data_f10' => 'sukses']);
                unset($f10);
            }

            $f11 = new TracerDetile();
            $f11->id_tracer = $tracer->id;
            $f11->kode_form = 'f11';
            $f11->value = $request->input('f11_select_input');
            if($f11->value == '5'){
                $f11->option = $request->input('f11_input_text');
            }
            if($f11->save()){
                array_push($data_quesioner, ['data_f11' => 'sukses']);
                unset($f11);
            }

            $f12 = new TracerDetile();
            $f12->id_tracer = $tracer->id;
            $f12->kode_form = 'f12';
            $f12->value = $request->input('f12_select_input');

            if($f12->save()){
                array_push($data_quesioner, ['data_f12' => 'sukses']);
                unset($f12);
            }

            $f13_data_attribute = ['f13_pekerjaan_utama', 'f13_pekerjaan_lembur', 'f13_pekerjaan_lainnya'
            ];
            $f13_i = 0;

            foreach ($f13_data_attribute as $data_attribute) {
                $f13_i++;
                $f13 = new TracerDetile();
                $f13->id_tracer = $tracer->id;
                $f13->kode_form = 'f13_'.$f13_i;
                $f13->value = $request->input($data_attribute);

                if($f13->save()){
                    array_push($data_quesioner, ['data_f13_'.$data_attribute => 'sukses']);
                    unset($f13);
                }
            }

            $f14 = new TracerDetile();
            $f14->id_tracer = $tracer->id;
            $f14->kode_form = 'f14';
            $f14->value = $request->input('f14_select_input');

            if($f14->save()){
                array_push($data_quesioner, ['data_f14' => 'sukses']);
                unset($f14);
            }

            $f15 = new TracerDetile();
            $f15->id_tracer = $tracer->id;
            $f15->kode_form = 'f15';
            $f15->value = $request->input('f15_select_input');

            if($f15->save()){
                array_push($data_quesioner, ['data_f15' => 'sukses']);
                unset($f15);
            }

            $f16_check = $request->input('f16_checkbox_input');
            $f16_i = 0;
            $data_f16 = array();
            foreach ($f16_check as $data) {
                $f16_i++;
                $f16 = new TracerDetile();
                $f16->id_tracer = $tracer->id;
                $f16->kode_form = 'f16';
                $f16->value = $data;
                if($f16->save()){
                    $data_f16 = [
                        'data_f16_'.$f9_i => 'sukses'
                    ];
                    array_push($data_quesioner, $data_f16);
                    unset($f16);

                }

            }

            for($i=1; $i<=30; $i++){
                $f17 = new TracerDetile();
                $f17->id_tracer = $tracer->id;
                $f17->kode_form = 'f17a_'.$i;
                $f17->value = $request->input('f17_option_'.$i.'_a');

                if($f17->save()){
                    array_push($data_quesioner, ['data_f17_a'.$i => 'sukses']);
                    unset($f17);
                }
            }

            for($i=1; $i<=30; $i++){
                $f17 = new TracerDetile();
                $f17->id_tracer = $tracer->id;
                $f17->kode_form = 'f17b_'.$i;
                $f17->value = $request->input('f17_option_'.$i.'_b');

                if($f17->save()){
                    array_push($data_quesioner, ['data_f17_b'.$i => 'sukses']);
                    unset($f17);
                }
            }

            $alumni = Alumni::find($request->get('id_alumni'));
            $tracer->alumni()->attach($alumni->id);


            return view('alumni.tracer.done');
            // //isi form f9
            // $f9_input = $request->input('f9_checkbox_input');
            // if($f9_input != null){
            //     $i = 0;
            //     foreach ($f9_input as $data) {
            //         $f9 = new TracerDetile();
            //         $f9->id_tracer = $tracer->id;
            //         $f9->kode_form = 'f9';
            //         $f9->value = $request->input($data);
            //         $f9->save();
                    
            
            //     }
            // }
        }
        
    }

    public function tentang_situs()
    {
        return view('tentang_situs');
    }

    public function kontak_situs()
    {
        return view('kontak');
    }

}
    