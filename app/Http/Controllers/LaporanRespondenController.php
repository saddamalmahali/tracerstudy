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

        if($id_form == 'f4'){
            $res = [
                'title_panel'=> 'Responden Untuk Form 4',
                'page_head'=> 'Bagaimana anda mencari pekerjaan tersebut?',
                'id_form' =>'f4'
            ];

            return view('laporan_responden.detile_f4', ['res'=>$res]);
        }

        if($id_form == 'f5'){
            $res = [
                'title_panel'=> 'Responden Untuk Form 5',
                'page_head'=> 'Berapa bulan waktu yang dihabiskan (sebelum dan sesudah kelulusan) untuk memeroleh pekerjaan pertama?',
                'id_form' =>'f5'
            ];

            return view('laporan_responden.detile', ['res'=>$res]);
        }

        if($id_form == 'f6'){
            $res = [
                'title_panel'=> 'Responden Untuk Form 6',
                'page_head'=> 'Berapa perusahaan/instansi/institusi yang sudah anda lamar (lewat surat atau e-mail) sebelum anda memeroleh pekerjaan pertama?',
                'id_form' =>'f6'
            ];

            return view('laporan_responden.detile', ['res'=>$res]);
        }

        if($id_form == 'f7'){
            $res = [
                'title_panel'=> 'Responden Untuk Form 7',
                'page_head'=> 'Berapa banyak perusahaan/instansi/institusi yang merespons lamaran anda?',
                'id_form' =>'f7'
            ];

            return view('laporan_responden.detile', ['res'=>$res]);
        }

        if($id_form == 'f7a'){
            $res = [
                'title_panel'=> 'Responden Untuk Form 7a',
                'page_head'=> 'Berapa banyak perusahaan/instansi/institusi yang mengundang anda untuk wawancara?',
                'id_form' =>'f7a'
            ];

            return view('laporan_responden.detile', ['res'=>$res]);
        }

        if($id_form == 'f8'){
            $res = [
                'title_panel'=> 'Responden Untuk Form 8',
                'page_head'=> 'Apakah anda bekerja saat ini (termasuk kerja sambilan dan wirausaha. Jika ya, lanjutkan ke f11)?',
                'id_form' =>'f8'
            ];

            return view('laporan_responden.detile', ['res'=>$res]);
        }

        if($id_form == 'f9'){
            $res = [
                'title_panel'=> 'Responden Untuk Form 9',
                'page_head'=> 'Bagaimana anda menggambarkan situasi anda saat ini?',
                'id_form' =>'f9'
            ];

            return view('laporan_responden.detile_f4', ['res'=>$res]);
        }

        if($id_form == 'f10'){
            $res = [
                'title_panel'=> 'Responden Untuk Form 10',
                'page_head'=> 'Apakah anda aktif mencari pekerjaan dalam 4 minggu terakhir?',
                'id_form' =>'f10'
            ];

            return view('laporan_responden.detile_f4', ['res'=>$res]);
        }

        if($id_form == 'f11'){
            $res = [
                'title_panel'=> 'Responden Untuk Form 11',
                'page_head'=> 'Apa jenis perusahaan/instansi/institusi tempat anda bekerja sekarang?',
                'id_form' =>'f11'
            ];

            return view('laporan_responden.detile_f4', ['res'=>$res]);
        }

        if($id_form == 'f12'){
            $res = [
                'title_panel'=> 'Responden Untuk Form 12',
                'page_head'=> 'Tempat anda bekerja saat ini bergerak di bidang apa?',
                'id_form' =>'f12'
            ];

            return view('laporan_responden.detile_f4', ['res'=>$res]);
        }

        if($id_form == 'f13'){
            $res = [
                'title_panel'=> 'Responden Untuk Form 13',
                'page_head'=> 'Kira-kira berapa pendapatan anda setiap bulannya?',
                'id_form' =>'f13'
            ];

            return view('laporan_responden.detile_f13', ['res'=>$res]);
        }
        if($id_form == 'f14'){
            $res = [
                'title_panel'=> 'Responden Untuk Form 14',
                'page_head'=> 'Seberapa erat hubungan antara bidang studi dengan pekerjaan anda?',
                'id_form' =>'f14'
            ];

            return view('laporan_responden.detile_f4', ['res'=>$res]);
        }

        if($id_form == 'f15'){

            $res = [
                'title_panel'=> 'Responden Untuk Form 15',
                'page_head'=> 'Tingkat pendidikan apa yang paling tepat/sesuai untuk pekerjaan anda saat ini?',
                'id_form' =>'f15'
            ];

            return view('laporan_responden.detile_f4', ['res'=>$res]);
        }

        if($id_form == 'f16'){

            $res = [
                'title_panel'=> 'Responden Untuk Form 16',
                'page_head'=> 'Tingkat pendidikan apa yang paling tepat/sesuai untuk pekerjaan anda saat ini?',
                'id_form' =>'f16'
            ];

            return view('laporan_responden.detile_f4', ['res'=>$res]);
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
        } else if($request->get('id_form') == 'f4'){
            $data_chart = [
                TracerDetile::where('kode_form', '=', 'f4')->where('value', '=', 1)->count(),
                TracerDetile::where('kode_form', '=', 'f4')->where('value', '=', 2)->count(),
                TracerDetile::where('kode_form', '=', 'f4')->where('value', '=', 3)->count(),
                TracerDetile::where('kode_form', '=', 'f4')->where('value', '=', 4)->count(),
                TracerDetile::where('kode_form', '=', 'f4')->where('value', '=', 5)->count(),
                TracerDetile::where('kode_form', '=', 'f4')->where('value', '=', 6)->count(),
                TracerDetile::where('kode_form', '=', 'f4')->where('value', '=', 7)->count(),
                TracerDetile::where('kode_form', '=', 'f4')->where('value', '=', 8)->count(),
                TracerDetile::where('kode_form', '=', 'f4')->where('value', '=', 9)->count(),
                TracerDetile::where('kode_form', '=', 'f4')->where('value', '=', 10)->count(),
                TracerDetile::where('kode_form', '=', 'f4')->where('value', '=', 11)->count(),
                TracerDetile::where('kode_form', '=', 'f4')->where('value', '=', 12)->count(),
                TracerDetile::where('kode_form', '=', 'f4')->where('value', '=', 13)->count(),
                TracerDetile::where('kode_form', '=', 'f4')->where('value', '=', 14)->count(),
                TracerDetile::where('kode_form', '=', 'f4')->where('value', '=', 15)->count(),

            ];

            $res = [
                'chart_data'=>$data_chart,
                'chart_head'=>[
                    'Melalui iklan di koran/majalah, brosur', 'Melamar ke perusahaan tanpa mengetahui lowongan yang ada',
                    'Pergi ke bursa/pameran kerja', 'Mencari lewat internet/iklan online/milis',
                    'Dihubungi oleh perusahaan', 'Menghubungi Kemenakertrans',
                    'Menghubungi agen tenaga kerja komersial/swasta', 'Memeroleh informasi dari pusat/kantor pengembangan karir fakultas/universitas',
                    'Menghubungi kantor kemahasiswaan/hubungan alumni', 'Membangun jejaring (network) sejak masih kuliah',
                    'Melalui relasi (misalnya dosen, orang tua, saudara, teman, dll.)', 'Membangun bisnis sendiri',
                    'Melalui penempatan kerja atau magang', 'Bekerja di tempat yang sama dengan tempat kerja semasa kuliah',
                    'Lainnya'

                ],
                'chart_title'=>'Responden Untuk Form 4'
            ];
            return \response($res, 200, ['Content-Type'=>'application/json']);
        } else if($request->get('id_form') == 'f5'){
            $data_chart = [
                TracerDetile::where('kode_form', '=', 'f5')->where('option', '=', 1)->count(),
                TracerDetile::where('kode_form', '=', 'f5')->where('option', '=', 2)->count()
            ];

            $res = [
                'chart_data'=>$data_chart,
                'chart_head'=>[
                    'Sebelum Lulus', 'Sesudah Lulus'
                ]
            ];

            return \response($res, 200, ['Content-Type'=>'application/json']);
        } else if($request->get('id_form') == 'f6'){
            $data_chart = [
                TracerDetile::where('kode_form', '=', 'f6')->where('option', '=', 1)->count(),
                TracerDetile::where('kode_form', '=', 'f6')->where('option', '=', 2)->count(),
                TracerDetile::where('kode_form', '=', 'f6')->where('option', '=', 3)->count()
            ];

            $res = [
                'chart_data'=>$data_chart,
                'chart_head'=>[
                    'Perusahaan', 'Instansi', 'Institusi'
                ]
            ];

            return \response($res, 200, ['Content-Type'=>'application/json']);
        }
        else if($request->get('id_form') == 'f7'){
            $data_chart = [
                TracerDetile::where('kode_form', '=', 'f7')->where('option', '=', 1)->count(),
                TracerDetile::where('kode_form', '=', 'f7')->where('option', '=', 2)->count(),
                TracerDetile::where('kode_form', '=', 'f7')->where('option', '=', 3)->count()
            ];

            $res = [
                'chart_data'=>$data_chart,
                'chart_head'=>[
                    'Perusahaan', 'Instansi', 'Institusi'
                ]
            ];

            return \response($res, 200, ['Content-Type'=>'application/json']);
        }else if($request->get('id_form') == 'f7a'){
            $data_chart = [
                TracerDetile::where('kode_form', '=', 'f7a')->where('option', '=', 1)->count(),
                TracerDetile::where('kode_form', '=', 'f7a')->where('option', '=', 2)->count(),
                TracerDetile::where('kode_form', '=', 'f7a')->where('option', '=', 3)->count()
            ];

            $res = [
                'chart_data'=>$data_chart,
                'chart_head'=>[
                    'Perusahaan', 'Instansi', 'Institusi'
                ]
            ];

            return \response($res, 200, ['Content-Type'=>'application/json']);
        }else if($request->get('id_form') == 'f8'){
            $data_chart = [
                TracerDetile::where('kode_form', '=', 'f8')->where('value', '=', 1)->count(),
                TracerDetile::where('kode_form', '=', 'f8')->where('value', '=', 0)->count(),
            ];

            $res = [
                'chart_data'=>$data_chart,
                'chart_head'=>[
                    'Tidak', 'Ya'
                ]
            ];

            return \response($res, 200, ['Content-Type'=>'application/json']);
        }else if($request->get('id_form') == 'f9'){
            $data_chart = [
                TracerDetile::where('kode_form', '=', 'f9')->where('value', '=', 1)->count(),
                TracerDetile::where('kode_form', '=', 'f9')->where('value', '=', 2)->count(),
                TracerDetile::where('kode_form', '=', 'f9')->where('value', '=', 3)->count(),
                TracerDetile::where('kode_form', '=', 'f9')->where('value', '=', 4)->count(),
                TracerDetile::where('kode_form', '=', 'f9')->where('value', '=', 5)->count(),

            ];

            $res = [
                'chart_data'=>$data_chart,
                'chart_head'=>[
                    'Saya masih belajar/melanjutkan kuliah profesi atau pascasarjana', 'Saya menikah',
                    'Saya sibuk dengan keluarga dan anak-anak', 'Saya sekarang sedang mencari pekerjaan',
                    'Lainnya'
                ],
                'chart_title'=>'Responden Untuk Form 9'
            ];
            return \response($res, 200, ['Content-Type'=>'application/json']);
        }else if($request->get('id_form') == 'f10'){
            $data_chart = [
                TracerDetile::where('kode_form', '=', 'f10')->where('value', '=', 1)->count(),
                TracerDetile::where('kode_form', '=', 'f10')->where('value', '=', 2)->count(),
                TracerDetile::where('kode_form', '=', 'f10')->where('value', '=', 3)->count(),
                TracerDetile::where('kode_form', '=', 'f10')->where('value', '=', 4)->count(),
                TracerDetile::where('kode_form', '=', 'f10')->where('value', '=', 5)->count(),

            ];

            $res = [
                'chart_data'=>$data_chart,
                'chart_head'=>[
                    'Tidak', 'Tidak, tapi saya sedang menunggu hasil lamaran kerja',
                    'Ya, saya akan mulai bekerja dalam 2 minggu ke depan', 'Ya, tapi saya belum pasti akan bekerja dalam 2 minggu ke depan',
                    'Lainnya'
                ],
                'chart_title'=>'Responden Untuk Form 10'
            ];
            return \response($res, 200, ['Content-Type'=>'application/json']);
        }
        else if($request->get('id_form') == 'f11'){
            $data_chart = [
                TracerDetile::where('kode_form', '=', 'f11')->where('value', '=', 1)->count(),
                TracerDetile::where('kode_form', '=', 'f11')->where('value', '=', 2)->count(),
                TracerDetile::where('kode_form', '=', 'f11')->where('value', '=', 3)->count(),
                TracerDetile::where('kode_form', '=', 'f11')->where('value', '=', 4)->count(),
                TracerDetile::where('kode_form', '=', 'f11')->where('value', '=', 5)->count(),

            ];

            $res = [
                'chart_data'=>$data_chart,
                'chart_head'=>[
                    'Instansi pemerintah (termasuk BUMN)', 'Organisasi non-profit/Lembaga Swadaya Masyarakat',
                    'Perusahaan swasta', 'Wiraswasta/perusahaan sendiri',
                    'Lainnya'
                ],
                'chart_title'=>'Responden Untuk Form 11'
            ];
            return \response($res, 200, ['Content-Type'=>'application/json']);
        }else if($request->get('id_form') == 'f12'){
//            <option value="1" {{$isian_tracer->where('kode_form', '=', 'f12')->first()->value==1 ? "selected" : "" }}></option>
//                                                <option value="2" {{$isian_tracer->where('kode_form', '=', 'f12')->first()->value==2 ? "selected" : "" }}></option>
//
            $data_chart = [
                TracerDetile::where('kode_form', '=', 'f12')->where('value', '=', 1)->count(),
                TracerDetile::where('kode_form', '=', 'f12')->where('value', '=', 2)->count(),
                TracerDetile::where('kode_form', '=', 'f12')->where('value', '=', 3)->count(),
                TracerDetile::where('kode_form', '=', 'f12')->where('value', '=', 4)->count(),
                TracerDetile::where('kode_form', '=', 'f12')->where('value', '=', 5)->count(),
                TracerDetile::where('kode_form', '=', 'f12')->where('value', '=', 6)->count(),
                TracerDetile::where('kode_form', '=', 'f12')->where('value', '=', 7)->count(),
                TracerDetile::where('kode_form', '=', 'f12')->where('value', '=', 8)->count(),
                TracerDetile::where('kode_form', '=', 'f12')->where('value', '=', 9)->count(),
                TracerDetile::where('kode_form', '=', 'f12')->where('value', '=', 10)->count(),
                TracerDetile::where('kode_form', '=', 'f12')->where('value', '=', 11)->count(),
                TracerDetile::where('kode_form', '=', 'f12')->where('value', '=', 12)->count(),
                TracerDetile::where('kode_form', '=', 'f12')->where('value', '=', 13)->count(),
                TracerDetile::where('kode_form', '=', 'f12')->where('value', '=', 14)->count(),
                TracerDetile::where('kode_form', '=', 'f12')->where('value', '=', 15)->count(),
                TracerDetile::where('kode_form', '=', 'f12')->where('value', '=', 16)->count(),
                TracerDetile::where('kode_form', '=', 'f12')->where('value', '=', 17)->count(),
                TracerDetile::where('kode_form', '=', 'f12')->where('value', '=', 18)->count(),
                TracerDetile::where('kode_form', '=', 'f12')->where('value', '=', 19)->count(),
                TracerDetile::where('kode_form', '=', 'f12')->where('value', '=', 20)->count(),
                TracerDetile::where('kode_form', '=', 'f12')->where('value', '=', 21)->count(),
                TracerDetile::where('kode_form', '=', 'f12')->where('value', '=', 22)->count(),
                TracerDetile::where('kode_form', '=', 'f12')->where('value', '=', 23)->count(),
                TracerDetile::where('kode_form', '=', 'f12')->where('value', '=', 24)->count(),
                TracerDetile::where('kode_form', '=', 'f12')->where('value', '=', 25)->count(),
                TracerDetile::where('kode_form', '=', 'f12')->where('value', '=', 26)->count(),
                TracerDetile::where('kode_form', '=', 'f12')->where('value', '=', 27)->count(),
                TracerDetile::where('kode_form', '=', 'f12')->where('value', '=', 28)->count(),
                TracerDetile::where('kode_form', '=', 'f12')->where('value', '=', 29)->count(),
                TracerDetile::where('kode_form', '=', 'f12')->where('value', '=', 30)->count(),
                TracerDetile::where('kode_form', '=', 'f12')->where('value', '=', 31)->count(),
                TracerDetile::where('kode_form', '=', 'f12')->where('value', '=', 32)->count(),
                TracerDetile::where('kode_form', '=', 'f12')->where('value', '=', 33)->count(),
                TracerDetile::where('kode_form', '=', 'f12')->where('value', '=', 34)->count(),
                TracerDetile::where('kode_form', '=', 'f12')->where('value', '=', 35)->count(),
                TracerDetile::where('kode_form', '=', 'f12')->where('value', '=', 36)->count(),
                TracerDetile::where('kode_form', '=', 'f12')->where('value', '=', 37)->count(),
                TracerDetile::where('kode_form', '=', 'f12')->where('value', '=', 38)->count(),
                TracerDetile::where('kode_form', '=', 'f12')->where('value', '=', 39)->count(),
                TracerDetile::where('kode_form', '=', 'f12')->where('value', '=', 40)->count(),
                TracerDetile::where('kode_form', '=', 'f12')->where('value', '=', 41)->count(),
                TracerDetile::where('kode_form', '=', 'f12')->where('value', '=', 42)->count(),
                TracerDetile::where('kode_form', '=', 'f12')->where('value', '=', 43)->count(),
                TracerDetile::where('kode_form', '=', 'f12')->where('value', '=', 45)->count(),
                TracerDetile::where('kode_form', '=', 'f12')->where('value', '=', 46)->count(),
                TracerDetile::where('kode_form', '=', 'f12')->where('value', '=', 47)->count(),
                TracerDetile::where('kode_form', '=', 'f12')->where('value', '=', 48)->count(),
                TracerDetile::where('kode_form', '=', 'f12')->where('value', '=', 49)->count(),
                TracerDetile::where('kode_form', '=', 'f12')->where('value', '=', 50)->count(),
                TracerDetile::where('kode_form', '=', 'f12')->where('value', '=', 51)->count(),
                TracerDetile::where('kode_form', '=', 'f12')->where('value', '=', 52)->count(),
                TracerDetile::where('kode_form', '=', 'f12')->where('value', '=', 53)->count(),
                TracerDetile::where('kode_form', '=', 'f12')->where('value', '=', 54)->count(),
                TracerDetile::where('kode_form', '=', 'f12')->where('value', '=', 55)->count(),
                TracerDetile::where('kode_form', '=', 'f12')->where('value', '=', 56)->count(),
                TracerDetile::where('kode_form', '=', 'f12')->where('value', '=', 57)->count(),
                TracerDetile::where('kode_form', '=', 'f12')->where('value', '=', 58)->count(),
                TracerDetile::where('kode_form', '=', 'f12')->where('value', '=', 59)->count(),
                TracerDetile::where('kode_form', '=', 'f12')->where('value', '=', 60)->count(),
                TracerDetile::where('kode_form', '=', 'f12')->where('value', '=', 61)->count(),
                TracerDetile::where('kode_form', '=', 'f12')->where('value', '=', 62)->count(),
                TracerDetile::where('kode_form', '=', 'f12')->where('value', '=', 63)->count(),
                TracerDetile::where('kode_form', '=', 'f12')->where('value', '=', 64)->count(),
                TracerDetile::where('kode_form', '=', 'f12')->where('value', '=', 65)->count(),
                TracerDetile::where('kode_form', '=', 'f12')->where('value', '=', 66)->count(),
                TracerDetile::where('kode_form', '=', 'f12')->where('value', '=', 67)->count(),
                TracerDetile::where('kode_form', '=', 'f12')->where('value', '=', 68)->count(),
                TracerDetile::where('kode_form', '=', 'f12')->where('value', '=', 69)->count(),
                TracerDetile::where('kode_form', '=', 'f12')->where('value', '=', 70)->count(),
                TracerDetile::where('kode_form', '=', 'f12')->where('value', '=', 71)->count(),
                TracerDetile::where('kode_form', '=', 'f12')->where('value', '=', 72)->count(),
                TracerDetile::where('kode_form', '=', 'f12')->where('value', '=', 73)->count(),
                TracerDetile::where('kode_form', '=', 'f12')->where('value', '=', 74)->count(),
                TracerDetile::where('kode_form', '=', 'f12')->where('value', '=', 75)->count(),
                TracerDetile::where('kode_form', '=', 'f12')->where('value', '=', 76)->count(),
                TracerDetile::where('kode_form', '=', 'f12')->where('value', '=', 77)->count(),
                TracerDetile::where('kode_form', '=', 'f12')->where('value', '=', 78)->count(),
                TracerDetile::where('kode_form', '=', 'f12')->where('value', '=', 79)->count(),
                TracerDetile::where('kode_form', '=', 'f12')->where('value', '=', 80)->count(),
                TracerDetile::where('kode_form', '=', 'f12')->where('value', '=', 81)->count(),
                TracerDetile::where('kode_form', '=', 'f12')->where('value', '=', 82)->count(),
                TracerDetile::where('kode_form', '=', 'f12')->where('value', '=', 83)->count(),
                TracerDetile::where('kode_form', '=', 'f12')->where('value', '=', 84)->count(),
                TracerDetile::where('kode_form', '=', 'f12')->where('value', '=', 85)->count(),
                TracerDetile::where('kode_form', '=', 'f12')->where('value', '=', 86)->count(),
                TracerDetile::where('kode_form', '=', 'f12')->where('value', '=', 87)->count(),
                TracerDetile::where('kode_form', '=', 'f12')->where('value', '=', 88)->count(),

            ];

            $res = [
                'chart_data'=>$data_chart,
                'chart_head'=>[
                    'Pertanian tanaman, peternakan, perburuan dan kegiatan yang berhubungan dengan itu', 'Kehutanan dan penebangan kayu',
                    'Perikanan', 'Pertambangan batu bara dan lignit', 'Pertambangan minyak bumi dan gas alam dan panas bumi',
                    'Pertambangan bijih logam', 'Pertambangan dan penggalian lainnya', 'Jasa pertambangan',
                    'Industri makanan', 'Industri minuman', 'Industri pengolahan tembakau',
                    'Industri tekstil', 'Industri pakaian jadi', 'Industri kulit, barang dari kulit dan alas kaki',
                    'Industri kayu, barang dari kayu dan gabus (tidak termasuk furnitur) dan barang anyaman dari bambu, rotan dan sejenisnya',
                    'Industri kertas dan barang dari kertas', 'Industri pencetakan dan reproduksi media rekaman',
                    'Industri produk dari batu bara dan pengilangan minyak bumi', 'Industri bahan kimia dan barang dari bahan kimia',
                    'Industri farmasi, produk obat kimia dan obat tradisional', 'Industri karet, barang dari karet dan plastik',
                    'Industri barang galian bukan logam', 'Industri logam dasar', 'Industri barang logam, bukan mesin dan peralatannya',
                    'Industri komputer, barang elektronik dan optik', 'Industri mesin dan perlengkapan ytdl',
                    'Industri kendaraan bermotor, trailer dan semi trailer', 'Industri alat angkutan lainnya',
                    'Industri furnitur', 'Industri pengolahan lainnya',  'Jasa reparasi dan pemasangan mesin dan peralatan',
                    'Pengadaan listrik, gas, uap/air panas dan udara dingin', 'Pengadaan air',
                    'Pengolahan limbah', 'Pengolahan sampah dan daur ulang', 'Jasa pembersihan dan pengelolaan sampah lainnya',
                    'Konstruksi gedung', 'Konstruksi bangunan sipil', 'Konstruksi khusus', 'Perdagangan, reparasi dan perawatan mobil dan sepeda motor',
                    'Perdagangan besar, bukan mobil dan sepeda motor',  'Perdagangan eceran, bukan mobil dan motor',
                    'Angkutan darat dan angkutan melalui saluran pipa','Angkutan Air', 'Angkutan udara',
                    'Pergudangan dan jasa penunjang angkutan', 'Pos dan kurir', 'Penyediaan akomodasi',
                    'Penyediaan makanan dan minuman', 'Penerbitan', 'Produksi gambar bergerak, video dan program televisi, perekaman suara dan penerbitan musik',
                    'Penyiaran dan pemrograman', 'Telekomunikasi ', 'Kegiatan pemrograman, konsultasi komputer dan kegiatan yang berhubungan dengan itu',
                    'Kegiatan jasa informasi', 'Jasa keuangan, bukan asuransi dan dana pensiun', 'Asuransi, reasuransi dan dana pensiun, bukan jaminan sosial wajib',
                    'Jasa penunjang jasa keuangan, asuransi dan dana pensiun', 'Real estate',
                    'Jasa hukum dan akuntansi', 'Kegiatan kantor pusat dan konsultasi manajemen',
                    'Jasa arsitektur dan teknik sipil; analisis dan uji teknis', 'Penelitian dan pengembangan ilmu pengetahuan',
                    'Periklanan dan penelitian pasar', 'Jasa profesional, ilmiah dan teknis lainnya',
                    'Jasa kesehatan hewan', 'Jasa persewaan dan sewa guna usaha tanpa hak opsi',
                    'Jasa ketenagakerjaan', 'Jasa agen perjalanan, penyelenggara tur dan jasa reservasi lainnya',
                    'Jasa keamanan dan penyelidikan', 'Jasa untuk gedung dan pertamanan',
                    'Jasa administrasi kantor, jasa penunjang kantor dan jasa penunjang usaha lainnya', 'Administrasi pemerintahan, pertahanan dan jaminan sosial wajib',
                    'Jasa pendidikan', 'Jasa kesehatan manusia', 'Jasa kegiatan sosial di dalam panti',  'Jasa kegiatan sosial di luar panti',
                    'Kegiatan hiburan, kesenian dan kreativitas', 'Perpustakaan, arsip, museum dan kegiatan kebudayaan lainnya',
                    'Kegiatan perjudian dan pertaruhan', 'Kegiatan olahraga dan rekreasi lainnya', 'Kegiatan keanggotaan organisasi',
                    'Jasa reparasi komputer dan barang keperluan pribadi dan perlengkapan rumah tangga', 'Jasa perorangan lainnya',
                    'Jasa perorangan yang melayani rumah tangga','Kegiatan yang menghasilkan barang dan jasa oleh rumah tangga yang digunakan sendiri untuk memenuhi kebutuhan',
                    'Kegiatan badan internasional dan badan ekstra internasional lainnya'
                ],
                'chart_title'=>'Responden Untuk Form 12'
            ];
            return \response($res, 200, ['Content-Type'=>'application/json']);
        }else if($request->get('id_form') == 'f13'){
            $pokok = [
                'label'=> 'Penghasilan Pokok',
                'backgroundColor'=> [
                    'window.chartColors.red',
                    'window.chartColors.orange',
                ],
                'data'=> [
                    TracerDetile::where('kode_form', '=', 'f13_1')->where('value', '<', 2000000)->count(),
                    TracerDetile::where('kode_form', '=', 'f13_1')->where('value', '>=', 2000000)->count(),
                ]
            ];

            $lembur = [
                'label'=> 'Penghasilan Lembur',
                'data'=> [
                    TracerDetile::where('kode_form', '=', 'f13_2')->where('value', '<', 2000000)->count(),
                    TracerDetile::where('kode_form', '=', 'f13_2')->where('value', '>=', 2000000)->count(),
                ]
            ];

            $lainnya = [
                'label'=> 'Penghasilan Lainnya',
                'data'=> [
                    TracerDetile::where('kode_form', '=', 'f13_3')->where('value', '<', 2000000)->count(),
                    TracerDetile::where('kode_form', '=', 'f13_3')->where('value', '>=', 2000000)->count(),
                ]
            ];

            $res = [
                'chart_data'=>[$pokok, $lembur, $lainnya],
                'chart_head'=>[
                    '< Rp. 2.000.000,-', '> Rp. 2.000.000,-'
                ],
                'chart_title'=>'Responden Untuk Form Penghasilan'
            ];
            return \response($res, 200, ['Content-Type'=>'application/json']);
        }else if($request->get('id_form') == 'f14'){
            $data_chart = [
                TracerDetile::where('kode_form', '=', 'f14')->where('value', '=', 1)->count(),
                TracerDetile::where('kode_form', '=', 'f14')->where('value', '=', 2)->count(),
                TracerDetile::where('kode_form', '=', 'f14')->where('value', '=', 3)->count(),
                TracerDetile::where('kode_form', '=', 'f14')->where('value', '=', 4)->count(),
                TracerDetile::where('kode_form', '=', 'f14')->where('value', '=', 5)->count(),

            ];

            $res = [
                'chart_data'=>$data_chart,
                'chart_head'=>[
                    'Sangat Erat', 'Erat', 'Cukup Erat',
                    'Kurang Erat', 'Tidak Sama Sekali'

                ],
                'chart_title'=>'Responden Untuk Form 14'
            ];
            return \response($res, 200, ['Content-Type'=>'application/json']);
        }
        else if($request->get('id_form') == 'f15'){
            $data_chart = [
                TracerDetile::where('kode_form', '=', 'f15')->where('value', '=', 1)->count(),
                TracerDetile::where('kode_form', '=', 'f15')->where('value', '=', 2)->count(),
                TracerDetile::where('kode_form', '=', 'f15')->where('value', '=', 3)->count(),
                TracerDetile::where('kode_form', '=', 'f15')->where('value', '=', 4)->count(),
            ];
            $res = [
                'chart_data'=>$data_chart,
                'chart_head'=>[
                    'Setingkat Lebih Tinggi', 'Tingkat yang Sama',
                    'Setingkat Lebih Rendah', 'Tidak Perlu Pendidikan Tinggi'
                ],
                'chart_title'=>'Responden Untuk Form 15'
            ];
            return \response($res, 200, ['Content-Type'=>'application/json']);
        }else if($request->get('id_form') == 'f16'){
            $data_chart = [
                TracerDetile::where('kode_form', '=', 'f15')->where('value', '=', 1)->count(),
                TracerDetile::where('kode_form', '=', 'f15')->where('value', '=', 2)->count(),
                TracerDetile::where('kode_form', '=', 'f15')->where('value', '=', 3)->count(),
                TracerDetile::where('kode_form', '=', 'f15')->where('value', '=', 4)->count(),
                TracerDetile::where('kode_form', '=', 'f15')->where('value', '=', 5)->count(),
                TracerDetile::where('kode_form', '=', 'f15')->where('value', '=', 6)->count(),
                TracerDetile::where('kode_form', '=', 'f15')->where('value', '=', 7)->count(),
                TracerDetile::where('kode_form', '=', 'f15')->where('value', '=', 8)->count(),
                TracerDetile::where('kode_form', '=', 'f15')->where('value', '=', 9)->count(),
                TracerDetile::where('kode_form', '=', 'f15')->where('value', '=', 10)->count(),
                TracerDetile::where('kode_form', '=', 'f15')->where('value', '=', 11)->count(),
                TracerDetile::where('kode_form', '=', 'f15')->where('value', '=', 12)->count(),
                TracerDetile::where('kode_form', '=', 'f15')->where('value', '=', 13)->count(),
            ];
            $res = [
                'chart_data'=>$data_chart,
                'chart_head'=>[
                    'Pertanyaan tidak sesuai; pekerjaan saya sekarang sudah sesuai dengan pendidikan saya',
                    'Saya belum mendapatkan pekerjaan yang lebih sesuai',
                    'Di pekerjaan ini saya memeroleh prospek karir yang baik',
                    'Saya lebih suka bekerja di area pekerjaan yang tidak ada hubungannya dengan pendidikan saya',
                    'Saya dipromosikan ke posisi yang kurang berhubungan dengan pendidikan saya dibanding posisi sebelumnya',
                    'Saya dapat memeroleh pendapatan yang lebih tinggi di pekerjaan ini',
                    'Pekerjaan saya saat ini lebih aman/terjamin/secure',
                    'Pekerjaan saya saat ini lebih menarik',
                    'Pekerjaan saya saat ini lebih memungkinkan saya mengambil pekerjaan tambahan/jadwal yang fleksibel, dll',
                    'Pekerjaan saya saat ini lokasinya lebih dekat dari rumah saya',
                    'Pekerjaan saya saat ini dapat lebih menjamin kebutuhan keluarga saya',
                    'Pada awal meniti karir ini, saya harus menerima pekerjaan yang tidak berhubungan dengan pendidikan saya',
                    'Lainnya'

                ],
                'chart_title'=>'Responden Untuk Form 16'
            ];
            return \response($res, 200, ['Content-Type'=>'application/json']);
        }



    }

}
