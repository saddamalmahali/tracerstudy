@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            <p><small>Laporan Responden</small></p>

        </h1>

    </section>

    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-header">
                        <h2 class="box-title">List Data Tracer Beserta Responden</h2>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-12">
                                <form action="">
                                    <div class="form-group">
                                        <div class="col-md-8">
                                            <select name="jurusan" id="" class="form-control">
                                                <option value="" selected>Semua Jurusan</option>
                                                <option value="55201">Teknik Informatika (S1)</option>
                                                <option value="26201">Teknik Industri (S1)</option>
                                                <option value="56401">Teknik Komputer (D3)</option>
                                                <option value="22201">Teknik Sipil (S1)</option>
                                                <option value="23201">Arsitektur (S1)</option>
                                                <option value="26402">Manajemen Industri (D3)</option>
                                            </select>
                                        </div>
                                        <div class="col-md-4">
                                            <input type="submit" class="btn btn-primary" value="Filter">
                                        </div>

                                    </div>
                                </form>
                            </div>

                        </div>
                        <br />
                        <table class='table table-bordered'>
                            <tr class="bg-primary">
                                <th colspan="2" style="text-align: center;" >Isian Data Quesioner</th>
                                <th width="15%" style="text-align: center;">Responden</th>
                                <th width="15%" style="text-align:center;">Detile Laporan</th>
                            </tr>
                            <tr>
                                <td class="text-danger" style="vertical-align:top;" align="center" width="5%">F3</td>
                                <td width="30%" style="vertical-align:top;">Kapan anda mulai mencari pekerjaan? <p>(Jika tidak sedang mencari kerja langsung ke pertanyaan f8)</p></td>
                                <td align="center">
                                    {{$data_tracer->where('kode_form', '=', 'f3')->count()}}
                                </td>
                                <td align="center">
                                    @if($jurusan)
                                        <a href="{{url('/admin/laporan_responden/detile/f3').'/'.$jurusan}}" class="btn btn-success"><i class="fa fa-bar-chart-o"></i></a>
                                    @else
                                        <a href="{{url('/admin/laporan_responden/detile/f3')}}" class="btn btn-success"><i class="fa fa-bar-chart-o"></i></a>
                                    @endif

                                </td>
                            </tr>
                            <tr>
                                <td class="text-danger" style="vertical-align:top;" width="5%" align="center">F4</td>
                                <td style="vertical-align:top;">Bagaimana anda mencari pekerjaan tersebut? Jawaban bisa lebih dari satu</td>
                                <td align="center">{{$data_tracer->where('kode_form', '=', 'f4')->count()}}</td>
                                <td align="center">
                                    @if($jurusan)
                                        <a href="{{url('/admin/laporan_responden/detile/f4').'/'.$jurusan}}" class="btn btn-success"><i class="fa fa-bar-chart-o"></i></a>
                                    @else
                                        <a href="{{url('/admin/laporan_responden/detile/f4')}}" class="btn btn-success"><i class="fa fa-bar-chart-o"></i></a>
                                    @endif

                                </td>
                            </tr>
                            <tr>
                                <td class="text-danger" style="vertical-align:top;" align="center" width="5%">F5</td>
                                <td width="30%" style="vertical-align:top;">Berapa bulan waktu yang dihabiskan (sebelum dan sesudah kelulusan) untuk memeroleh pekerjaan pertama?</td>
                                <td align="center">{{$data_tracer->where('kode_form', '=', 'f5')->count()}}</td>
                                <td align="center">
                                    @if($jurusan)
                                        <a href="{{url('/admin/laporan_responden/detile/f5').'/'.$jurusan}}" class="btn btn-success"><i class="fa fa-bar-chart-o"></i></a>
                                    @else
                                        <a href="{{url('/admin/laporan_responden/detile/f5')}}" class="btn btn-success"><i class="fa fa-bar-chart-o"></i></a>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td class="text-danger" style="vertical-align:top;" align="center" width="5%">F6</td>
                                <td width="30%" style="vertical-align:top;">Berapa perusahaan/instansi/institusi yang sudah anda lamar (lewat surat atau e-mail) sebelum anda memeroleh pekerjaan pertama?</td>
                                <td align="center">{{$data_tracer->where('kode_form', '=', 'f6')->count()}}</td>
                                <td align="center">
                                    @if($jurusan)
                                        <a href="{{url('/admin/laporan_responden/detile/f6').'/'.$jurusan}}" class="btn btn-success"><i class="fa fa-bar-chart-o"></i></a>
                                    @else
                                        <a href="{{url('/admin/laporan_responden/detile/f6')}}" class="btn btn-success"><i class="fa fa-bar-chart-o"></i></a>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td class="text-danger" style="vertical-align:top;" align="center" width="5%">F7</td>
                                <td width="30%" style="vertical-align:top;">Berapa banyak perusahaan/instansi/institusi yang merespons lamaran anda?</td>
                                <td align="center">{{$data_tracer->where('kode_form', '=', 'f7')->count()}}</td>
                                <td align="center">
                                    @if($jurusan)
                                        <a href="{{url('/admin/laporan_responden/detile/f7').'/'.$jurusan}}" class="btn btn-success"><i class="fa fa-bar-chart-o"></i></a>
                                    @else
                                        <a href="{{url('/admin/laporan_responden/detile/f7')}}" class="btn btn-success"><i class="fa fa-bar-chart-o"></i></a>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td class="text-danger" style="vertical-align:top;" align="center" width="5%">F7a</td>
                                <td width="30%" style="vertical-align:top;">Berapa banyak perusahaan/instansi/institusi yang mengundang anda untuk wawancara?</td>
                                <td align="center">{{$data_tracer->where('kode_form', '=', 'f7a')->count()}}</td>
                                <td align="center">
                                    @if($jurusan)
                                        <a href="{{url('/admin/laporan_responden/detile/f7a').'/'.$jurusan}}" class="btn btn-success"><i class="fa fa-bar-chart-o"></i></a>
                                    @else
                                        <a href="{{url('/admin/laporan_responden/detile/f7a')}}" class="btn btn-success"><i class="fa fa-bar-chart-o"></i></a>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td class="text-danger" style="vertical-align:top;" align="center" width="5%">F8</td>
                                <td width="30%" style="vertical-align:top;">Apakah anda bekerja saat ini (termasuk kerja sambilan dan wirausaha. Jika ya, lanjutkan ke f11)?</td>
                                <td align="center">{{$data_tracer->where('kode_form', '=', 'f8')->count()}}</td>
                                <td align="center">
                                    @if($jurusan)
                                        <a href="{{url('/admin/laporan_responden/detile/f8').'/'.$jurusan}}" class="btn btn-success"><i class="fa fa-bar-chart-o"></i></a>
                                    @else
                                        <a href="{{url('/admin/laporan_responden/detile/f8')}}" class="btn btn-success"><i class="fa fa-bar-chart-o"></i></a>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td class="text-danger" style="vertical-align:top;" width="5%" align="center">F9</td>
                                <td style="vertical-align:top;">Bagaimana anda menggambarkan situasi anda saat ini? Jawaban bisa lebih dari satu</td>
                                <td align="center">{{$data_tracer->where('kode_form', '=', 'f9')->count()}}</td>
                                <td align="center">
                                    @if($jurusan)
                                        <a href="{{url('/admin/laporan_responden/detile/f9').'/'.$jurusan}}" class="btn btn-success"><i class="fa fa-bar-chart-o"></i></a>
                                    @else
                                        <a href="{{url('/admin/laporan_responden/detile/f9')}}" class="btn btn-success"><i class="fa fa-bar-chart-o"></i></a>
                                    @endif
                                </td>
                            </tr>

                            <tr>
                                <td class="text-danger" style="vertical-align:top;" align="center" width="5%">F10</td>
                                <td width="30%" style="vertical-align:top;">Apakah anda aktif mencari pekerjaan dalam 4 minggu terakhir? <p><i>(Pilihlah Satu Jawaban. KEMUDIAN LANJUT KE f17)</i></p></td>
                                <td align="center">{{$data_tracer->where('kode_form', '=', 'f10')->count()}}</td>
                                <td align="center">
                                    @if($jurusan)
                                        <a href="{{url('/admin/laporan_responden/detile/f10').'/'.$jurusan}}" class="btn btn-success"><i class="fa fa-bar-chart-o"></i></a>
                                    @else
                                        <a href="{{url('/admin/laporan_responden/detile/f10')}}" class="btn btn-success"><i class="fa fa-bar-chart-o"></i></a>
                                    @endif
                                </td>
                            </tr>

                            <tr>
                                <td class="text-danger" style="vertical-align:top;" align="center" width="5%">F11</td>
                                <td width="30%" style="vertical-align:top;">Apa jenis perusahaan/instansi/institusi tempat anda bekerja sekarang?</td>
                                <td align="center">{{$data_tracer->where('kode_form', '=', 'f11')->count()}}</td>
                                <td align="center">
                                    @if($jurusan)
                                        <a href="{{url('/admin/laporan_responden/detile/f11').'/'.$jurusan}}" class="btn btn-success"><i class="fa fa-bar-chart-o"></i></a>
                                    @else
                                        <a href="{{url('/admin/laporan_responden/detile/f11')}}" class="btn btn-success"><i class="fa fa-bar-chart-o"></i></a>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td class="text-danger" style="vertical-align:top;" align="center" width="5%">F12</td>
                                <td width="30%" style="vertical-align:top;">Tempat anda bekerja saat ini bergerak di bidang apa? <p><i>(Klasifikasi Baku Lapangan Usaha Indonesia, Kemnakertrans, 2009)</i></p></td>
                                <td align="center">{{$data_tracer->where('kode_form', '=', 'f12')->count()}}</td>
                                <td align="center">
                                    @if($jurusan)
                                        <a href="{{url('/admin/laporan_responden/detile/f12').'/'.$jurusan}}" class="btn btn-success"><i class="fa fa-bar-chart-o"></i></a>
                                    @else
                                        <a href="{{url('/admin/laporan_responden/detile/f12')}}" class="btn btn-success"><i class="fa fa-bar-chart-o"></i></a>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td class="text-danger" style="vertical-align:top;" align="center" width="5%">F13</td>
                                <td width="30%" style="vertical-align:top;">Kira-kira berapa pendapatan anda setiap bulannya? </td>
                                <td align="center">{{$data_tracer->where('kode_form', 'like', '%f13%')->count()}}</td>
                                <td align="center">
                                    @if($jurusan)
                                        <a href="{{url('/admin/laporan_responden/detile/f13').'/'.$jurusan}}" class="btn btn-success"><i class="fa fa-bar-chart-o"></i></a>
                                    @else
                                        <a href="{{url('/admin/laporan_responden/detile/f13')}}" class="btn btn-success"><i class="fa fa-bar-chart-o"></i></a>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td class="text-danger" style="vertical-align:top;" align="center" width="5%">F14</td>
                                <td width="30%" style="vertical-align:top;">Seberapa erat hubungan antara bidang studi dengan pekerjaan anda? </td>
                                <td align="center">{{$data_tracer->where('kode_form', '=', 'f14')->count()}}</td>
                                <td align="center">
                                    @if($jurusan)
                                        <a href="{{url('/admin/laporan_responden/detile/f14').'/'.$jurusan}}" class="btn btn-success"><i class="fa fa-bar-chart-o"></i></a>
                                    @else
                                        <a href="{{url('/admin/laporan_responden/detile/f14')}}" class="btn btn-success"><i class="fa fa-bar-chart-o"></i></a>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td class="text-danger" style="vertical-align:top;" align="center" width="5%">F15</td>
                                <td width="30%" style="vertical-align:top;">Tingkat pendidikan apa yang paling tepat/sesuai untuk pekerjaan anda saat ini?</td>
                                <td align="center">{{$data_tracer->where('kode_form', '=', 'f15')->count()}}</td>
                                <td align="center">
                                    @if($jurusan)
                                        <a href="{{url('/admin/laporan_responden/detile/f15').'/'.$jurusan}}" class="btn btn-success"><i class="fa fa-bar-chart-o"></i></a>
                                    @else
                                        <a href="{{url('/admin/laporan_responden/detile/f15')}}" class="btn btn-success"><i class="fa fa-bar-chart-o"></i></a>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td class="text-danger" style="vertical-align:top;" width="5%" align="center">F16</td>
                                <td style="vertical-align:top;">Jika menurut anda pekerjaan anda saat ini tidak sesuai dengan pendidikan anda, mengapa anda mengambilnya? Jawaban bisa lebih dari satu</td>
                                <td align="center">{{$data_tracer->where('kode_form', '=', 'f16')->count()}}</td>
                                <td align="center">
                                    @if($jurusan)
                                        <a href="{{url('/admin/laporan_responden/detile/f16').'/'.$jurusan}}" class="btn btn-success"><i class="fa fa-bar-chart-o"></i></a>
                                    @else
                                        <a href="{{url('/admin/laporan_responden/detile/f16')}}" class="btn btn-success"><i class="fa fa-bar-chart-o"></i></a>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td class="text-danger" style="vertical-align:top;" align="center" width="5%">F17</td>
                                <td width="30%" style="vertical-align:top;">Pada saat lulus, pada tingkat mana kompetensi di bawah ini anda kuasai? (<b>A</b>) <br /><br /> <p>Pada saat lulus, bagaimana kontribusi perguruan tinggi dalam hal kompetensi di bawah ini? (<b>B</b>)</p> </td>
                                <td align="center">{{$data_tracer->where('kode_form', 'like', '%f17%')->count()}}</td>
                                <td></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $(document).on('click', '.btn-hapus-alumni', function(e){
            e.preventDefault();
            var id = $(this).attr('id');

            if(confirm('Yakin ingin menghapus data?')){
                $.ajax({
                    url : '/admin/alumni/delete',
                    type : 'post',
                    data : {id : id},
                    dataType : 'json',
                    success : function(data){
                        if(data == 'success'){
                            window.location.reload(false);
                            alert("Data berhasil dihapus");
                        }
                    }
                });
            }
        });

        @if(session()->has('sukses'))
            alert('{{session()->get('sukses')}}');
        @endif
    </script>
@endsection