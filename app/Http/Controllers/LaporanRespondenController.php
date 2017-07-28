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
        }


    }

}
