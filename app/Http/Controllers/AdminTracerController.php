<?php

namespace App\Http\Controllers;

use App\Alumni;
use App\Tracer;
use App\TracerDetile;
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
        $isian_tracer = $tracer->detile;
//        echo json_encode($isian_tracer);
        return view('admin.tracer.view', [
            'tracer'=>$tracer,
            'isian_tracer'=>$isian_tracer
        ]);
    }

    public function edit_tracer($id_tracer, Request $request)
    {
        $tracer = Tracer::find($id_tracer);
        $isian_tracer = $tracer->detile;
//        echo json_encode($isian_tracer);
        return view('admin.tracer.edit', [
            'tracer'=>$tracer,
            'isian_tracer'=>$isian_tracer
        ]);
    }

    public function update_tracer(Request $request)
    {
        $tracer = Tracer::find($request->get('id_tracer'));

        $data_tracer = $tracer->detile;

        foreach ($data_tracer as $data){
            $data->delete();
        }

        if($tracer){
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
//
//            $alumni = Alumni::find($request->get('id_alumni'));
//            $tracer->alumni()->attach($alumni->id);

            $request->session()->flash('sukses', 'Berhasil Memutakhirkan tracer alumni!');
            return redirect('/admin/tracer');
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
        return json_encode($request->all());
    }

    public function hapus_tracer($id_tracer, Request $request)
    {
        $tracer = Tracer::find($id_tracer);

        foreach ($tracer->detile as $detile)
        {
            $detile->delete();
        }

        $request->session()->flash('sukses', 'Berhasil Menghapus tracer alumni!');
        return redirect('/admin/tracer');
    }
}
