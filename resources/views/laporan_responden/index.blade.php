@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            <p><small>Data Responden</small></p>

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
                                    <a href="{{url('/admin/laporan_responden/detile/f3')}}" class="btn btn-success"><i class="fa fa-bar-chart-o"></i></a>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-danger" style="vertical-align:top;" width="5%" align="center">F4</td>
                                <td style="vertical-align:top;">Bagaimana anda mencari pekerjaan tersebut? Jawaban bisa lebih dari satu</td>
                                <td align="center">{{$data_tracer->where('kode_form', '=', 'f4')->count()}}</td>
                                <td>

                                </td>
                            </tr>
                            <tr>
                                <td class="text-danger" style="vertical-align:top;" align="center" width="5%">F5</td>
                                <td width="30%" style="vertical-align:top;">Berapa bulan waktu yang dihabiskan (sebelum dan sesudah kelulusan) untuk memeroleh pekerjaan pertama?</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td class="text-danger" style="vertical-align:top;" align="center" width="5%">F6</td>
                                <td width="30%" style="vertical-align:top;">Berapa perusahaan/instansi/institusi yang sudah anda lamar (lewat surat atau e-mail) sebelum anda memeroleh pekerjaan pertama?</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td class="text-danger" style="vertical-align:top;" align="center" width="5%">F7</td>
                                <td width="30%" style="vertical-align:top;">Berapa banyak perusahaan/instansi/institusi yang merespons lamaran anda?</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td class="text-danger" style="vertical-align:top;" align="center" width="5%">F7a</td>
                                <td width="30%" style="vertical-align:top;">Berapa banyak perusahaan/instansi/institusi yang mengundang anda untuk wawancara?</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td class="text-danger" style="vertical-align:top;" align="center" width="5%">F8</td>
                                <td width="30%" style="vertical-align:top;">Apakah anda bekerja saat ini (termasuk kerja sambilan dan wirausaha. Jika ya, lanjutkan ke f11)?</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td class="text-danger" style="vertical-align:top;" width="5%" align="center">F9</td>
                                <td style="vertical-align:top;">Bagaimana anda menggambarkan situasi anda saat ini? Jawaban bisa lebih dari satu</td>
                                <td></td>
                            </tr>

                            <tr>
                                <td class="text-danger" style="vertical-align:top;" align="center" width="5%">F10</td>
                                <td width="30%" style="vertical-align:top;">Apakah anda aktif mencari pekerjaan dalam 4 minggu terakhir? <p><i>(Pilihlah Satu Jawaban. KEMUDIAN LANJUT KE f17)</i></p></td>
                                <td></td>
                            </tr>

                            <tr>
                                <td class="text-danger" style="vertical-align:top;" align="center" width="5%">F11</td>
                                <td width="30%" style="vertical-align:top;">Apa jenis perusahaan/instansi/institusi tempat anda bekerja sekarang?</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td class="text-danger" style="vertical-align:top;" align="center" width="5%">F12</td>
                                <td width="30%" style="vertical-align:top;">Tempat anda bekerja saat ini bergerak di bidang apa? <p><i>(Klasifikasi Baku Lapangan Usaha Indonesia, Kemnakertrans, 2009)</i></p></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td class="text-danger" style="vertical-align:top;" align="center" width="5%">F13</td>
                                <td width="30%" style="vertical-align:top;">Kira-kira berapa pendapatan anda setiap bulannya? </td>
                                <td></td>
                            </tr>
                            <tr>
                                <td class="text-danger" style="vertical-align:top;" align="center" width="5%">F14</td>
                                <td width="30%" style="vertical-align:top;">Seberapa erat hubungan antara bidang studi dengan pekerjaan anda? </td>
                                <td></td>
                            </tr>
                            <tr>
                                <td class="text-danger" style="vertical-align:top;" align="center" width="5%">F15</td>
                                <td width="30%" style="vertical-align:top;">Tingkat pendidikan apa yang paling tepat/sesuai untuk pekerjaan anda saat ini?</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td class="text-danger" style="vertical-align:top;" width="5%" align="center">F16</td>
                                <td style="vertical-align:top;">Jika menurut anda pekerjaan anda saat ini tidak sesuai dengan pendidikan anda, mengapa anda mengambilnya? Jawaban bisa lebih dari satu</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td class="text-danger" style="vertical-align:top;" align="center" width="5%">F17</td>
                                <td width="30%" style="vertical-align:top;">Pada saat lulus, pada tingkat mana kompetensi di bawah ini anda kuasai? (<b>A</b>) <br /><br /> <p>Pada saat lulus, bagaimana kontribusi perguruan tinggi dalam hal kompetensi di bawah ini? (<b>B</b>)</p> </td>
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