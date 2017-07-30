@extends('layouts.app')

@section('content')
    <style>
        .table-borderless > tbody > tr > td,
        .table-borderless > tbody > tr > th,
        .table-borderless > tfoot > tr > td,
        .table-borderless > tfoot > tr > th,
        .table-borderless > thead > tr > td,
        .table-borderless > thead > tr > th {
            border: none;
        }
    </style>
    <section class="content-header">
        <h1>
            Alumni <div class="pull-right"><a href="{{url('/admin/alumni')}}" class="btn btn-warning btn-lg"><i class="fa fa-arrow-left"></i>&nbsp;&nbsp;Kembali</a></div>
            <p><small>Detail Alumni & Isian Tracer : {{$alumni->nama_depan.' '.$alumni->nama_belakang}}</small></p>

        </h1>

    </section>

    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-header">
                        <h2 class="box-title">
                            Data Alumni

                        </h2>
                    </div>
                    <div class="box-body">
                        <table class="table table-borderless">
                            <tr>
                                <td>Nama Depan</td>
                                <td style="width: 5%;">:</td>
                                <td align="left" style="width: 30%;">{{$tracer->alumni()->first()->nama_depan}}</td>
                                <td>Jurusan</td>
                                <td style="width: 5%;">:</td>
                                <td style="width: 30%;" align="left">
                                    <?php
                                    switch($tracer->alumni()->first()->jurusan){
                                        case "55201" :
                                            echo "Teknik Informatika (S1)";
                                            break;
                                        case "26201" :
                                            echo "Teknik Industri (S1)";
                                            break;
                                        case "56401" :
                                            echo "Teknik Komputer (D3)";
                                            break;
                                        case "22201" :
                                            echo "Teknik Sipil (S1)";
                                            break;
                                        case "23201" :
                                            echo "Arsitektur (S1)";
                                            break;
                                        case "26402" :
                                            echo "Manajemen Industri (D3)";
                                        default :
                                            echo "lain-lain";
                                    }
                                    ?>
                                </td>
                            </tr>
                            <tr>
                                <td>Nama Belakang</td>
                                <td style="width: 5%;">:</td>
                                <td align="left">{{$tracer->alumni()->first()->nama_belakang}}</td>

                                <td>Tahun Lulus</td>
                                <td style="width: 5%;">:</td>
                                <td align="left">{{$tracer->alumni()->first()->tahun_lulus}}</td>
                            </tr>
                            <tr>
                                <td>Jenis Kelamin</td>
                                <td style="width: 5%;">:</td>
                                <td align="left">{{$tracer->alumni()->first()->jenis_kelamin == 'L'? 'Laki - Laki' : 'Perempuan'}}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
            @if($isian_tracer)
                <div class="col-md-12">
                    <div class="box box-primary">
                        <div class="box-header">
                            <h2 class="box-title"><i class="fa fa-calendar-check-o"></i>&nbsp;&nbsp;Detile Isian Tracer</h2>
                        </div>
                        <div class="box-body">
                            <table class='table'>
                                <tr class="bg-primary">
                                    <th colspan="3">Isian Data Quesioner</th>
                                </tr>
                                <tr>
                                    <td class="text-danger" style="vertical-align:top;" align="center" width="5%">F3</td>
                                    <td width="30%" style="vertical-align:top;">Kapan anda mulai mencari pekerjaan? <p>(Jika tidak sedang mencari kerja langsung ke pertanyaan f8)</p></td>
                                    <td>
                                        <div class="form-group{{ $errors->has('f3_input_text') ? ' has-error' : '' }}">
                                            <div class="col-md-2"><input type="number" name="f3_input_text" readonly value="{{$isian_tracer->where('kode_form', '=', 'f3')->first()->value}}" class="form-control"></div>
                                            <div class="col-md-10">
                                                <select name="f3_select_input" id="f3_select_input" class="form-control" disabled>
                                                    <option value="" disabled>Pilih Opsi</option>
                                                    <option value="1" {{$isian_tracer->where('kode_form', '=', 'f3')->first()->option ==1 ? 'selcted' : ''}}>Bulan Sebelum Lulus</option>
                                                    <option value="2" {{$isian_tracer->where('kode_form', '=', 'f3')->first()->option ==2 ? 'selcted' : ''}}>Bulan Sesudah Lulus</option>
                                                </select>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-danger" style="vertical-align:top;" width="5%" align="center">F4</td>
                                    <td style="vertical-align:top;">Bagaimana anda mencari pekerjaan tersebut? Jawaban bisa lebih dari satu</td>
                                    <td>
                                        <div class="form-group{{ $errors->has('f4_check') ? ' has-error' : '' }}">
                                            <div class="checkbox" >
                                                <label>
                                                    <input type="checkbox" class="flat-red" name="f4_check[1]" {{$isian_tracer->where('kode_form', '=', 'f4')->where('value', '=', 1)->first()? 'checked': '' }} value="1">
                                                    Melalui iklan di koran/majalah, brosur
                                                </label>
                                            </div>

                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" class="flat-red" name="f4_check[2]" {{$isian_tracer->where('kode_form', '=', 'f4')->where('value', '=', 2)->first() ? 'checked': '' }} value="2">
                                                    Melamar ke perusahaan tanpa mengetahui lowongan yang ada
                                                </label>
                                            </div>

                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" class="flat-red" name="f4_check[3]" {{$isian_tracer->where('kode_form', '=', 'f4')->where('value', '=', 3)->first() ? 'checked': '' }} value="3">
                                                    Pergi ke bursa/pameran kerja
                                                </label>
                                            </div>

                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" class="flat-red" name="f4_check[4]" {{$isian_tracer->where('kode_form', '=', 'f4')->where('value', '=', 4)->first() ? 'checked': '' }}  value="4">
                                                    Mencari lewat internet/iklan online/milis
                                                </label>
                                            </div>
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" class="flat-red" name="f4_check[5]" {{$isian_tracer->where('kode_form', '=', 'f4')->where('value', '=', 5)->first() ? 'checked': '' }} value="5">
                                                    Dihubungi oleh perusahaan
                                                </label>
                                            </div>

                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" class="flat-red" name="f4_check[6]" {{$isian_tracer->where('kode_form', '=', 'f4')->where('value', '=', 6)->first() ? 'checked': '' }} value="6">
                                                    Menghubungi Kemenakertrans
                                                </label>
                                            </div>

                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" class="flat-red" name="f4_check[7]" {{$isian_tracer->where('kode_form', '=', 'f4')->where('value', '=', 7)->first() ? 'checked': '' }} value="7">
                                                    Menghubungi agen tenaga kerja komersial/swasta
                                                </label>
                                            </div>

                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" class="flat-red" name="f4_check[8]" {{$isian_tracer->where('kode_form', '=', 'f4')->where('value', '=', 8)->first() ? 'checked': '' }} value="8">
                                                    Memeroleh informasi dari pusat/kantor pengembangan karir fakultas/universitas
                                                </label>
                                            </div>

                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" class="flat-red" name="f4_check[9]" {{$isian_tracer->where('kode_form', '=', 'f4')->where('value', '=', 9)->first() ? 'checked': '' }} value="9">
                                                    Menghubungi kantor kemahasiswaan/hubungan alumni
                                                </label>
                                            </div>

                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" class="flat-red" name="f4_check[10]" {{$isian_tracer->where('kode_form', '=', 'f4')->where('value', '=', 10)->first() ? 'checked': '' }} value="10">
                                                    Membangun jejaring (network) sejak masih kuliah
                                                </label>
                                            </div>

                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" class="flat-red" name="f4_check[11]" {{$isian_tracer->where('kode_form', '=', 'f4')->where('value', '=', 11)->first() ? 'checked': '' }} value="11">
                                                    Melalui relasi (misalnya dosen, orang tua, saudara, teman, dll.)
                                                </label>
                                            </div>

                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" class="flat-red" name="f4_check[12]" {{$isian_tracer->where('kode_form', '=', 'f4')->where('value', '=', 12)->first() ? 'checked': '' }} value="12">
                                                    Membangun bisnis sendiri
                                                </label>
                                            </div>

                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" class="flat-red" name="f4_check[13]" {{$isian_tracer->where('kode_form', '=', 'f4')->where('value', '=', 13)->first() ? 'checked': '' }} value="13">
                                                    Melalui penempatan kerja atau magang
                                                </label>
                                            </div>

                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" class="flat-red" name="f4_check[14]" {{$isian_tracer->where('kode_form', '=', 'f4')->where('value', '=', 14)->first() ? 'checked': '' }} value="14">
                                                    Bekerja di tempat yang sama dengan tempat kerja semasa kuliah
                                                </label>
                                            </div>

                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" class="flat-red" name="f4_check[15]" {{$isian_tracer->where('kode_form', '=', 'f4')->where('value', '=', 15)->first() ? 'checked': '' }} value="15">
                                                    Lainnya
                                                </label>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-danger" style="vertical-align:top;" align="center" width="5%">F5</td>
                                    <td width="30%" style="vertical-align:top;">Berapa bulan waktu yang dihabiskan (sebelum dan sesudah kelulusan) untuk memeroleh pekerjaan pertama?</td>
                                    <td>
                                        <div class="form-group {{ $errors->has('f5_input_text') ? ' has-error' : '' }}">
                                            <div class="col-md-2"><input type="number" name="f5_input_text" value="{{$isian_tracer->where('kode_form', '=', 'f5')->first()->value }}" readonly class="form-control"></div>
                                            <div class="col-md-10{{ $errors->has('f5_select_input') ? ' has-error' : '' }}">
                                                <select name="f5_select_input" id="f5_select_input" class="form-control" disabled>
                                                    <option value="" disabled>Pilih Opsi</option>
                                                    <option value="1" {{$isian_tracer->where('kode_form', '=', 'f5')->first()->option==1 ? "selected" : "" }}>Bulan Sebelum Lulus</option>
                                                    <option value="2" {{$isian_tracer->where('kode_form', '=', 'f5')->first()->option==2 ? "selected" : "" }}>Bulan Sesudah Lulus</option>
                                                </select>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-danger" style="vertical-align:top;" align="center" width="5%">F6</td>
                                    <td width="30%" style="vertical-align:top;">Berapa perusahaan/instansi/institusi yang sudah anda lamar (lewat surat atau e-mail) sebelum anda memeroleh pekerjaan pertama?</td>
                                    <td>
                                        <div class="form-group {{ $errors->has('f6_input_text') ? ' has-error' : '' }}">
                                            <div class="col-md-2"><input type="number" name="f6_input_text" value="{{$isian_tracer->where('kode_form', '=', 'f6')->first()->value}}" readonly class="form-control"></div>
                                            <div class="col-md-10{{ $errors->has('f6_select_input') ? ' has-error' : '' }}">
                                                <select name="f6_select_input" id="f6_select_input" disabled class="form-control">
                                                    <option value="" disabled selected>Pilih Opsi</option>
                                                    <option value="1" {{$isian_tracer->where('kode_form', '=', 'f6')->first()->option==1 ? "selected" : "" }}>Perusahaan</option>
                                                    <option value="2" {{$isian_tracer->where('kode_form', '=', 'f6')->first()->option==2 ? "selected" : "" }}>Instansi</option>
                                                    <option value="3" {{$isian_tracer->where('kode_form', '=', 'f6')->first()->option==3 ? "selected" : "" }}>Institusi</option>
                                                </select>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-danger" style="vertical-align:top;" align="center" width="5%">F7</td>
                                    <td width="30%" style="vertical-align:top;">Berapa banyak perusahaan/instansi/institusi yang merespons lamaran anda?</td>
                                    <td>
                                        <div class="form-group {{ $errors->has('f7_input_text') ? ' has-error' : '' }}">
                                            <div class="col-md-2"><input type="number" name="f7_input_text" value="{{$isian_tracer->where('kode_form', '=', 'f7')->first()->value }}" readonly class="form-control"></div>
                                            <div class="col-md-10 {{ $errors->has('f7_select_input') ? ' has-error' : '' }}">
                                                <select name="f7_select_input" id="f7_select_input" class="form-control" disabled>
                                                    <option value="" disabled selected>Pilih Opsi</option>
                                                    <option value="1" {{$isian_tracer->where('kode_form', '=', 'f7')->first()->option==1 ? "selected" : "" }}>Perusahaan</option>
                                                    <option value="2" {{$isian_tracer->where('kode_form', '=', 'f7')->first()->option==2 ? "selected" : "" }}>Instansi</option>
                                                    <option value="3" {{$isian_tracer->where('kode_form', '=', 'f7')->first()->option==3 ? "selected" : "" }}>Institusi</option>
                                                </select>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-danger" style="vertical-align:top;" align="center" width="5%">F7a</td>
                                    <td width="30%" style="vertical-align:top;">Berapa banyak perusahaan/instansi/institusi yang mengundang anda untuk wawancara?</td>
                                    <td>
                                        <div class="form-group{{ $errors->has('f7a_input_text') ? ' has-error' : '' }}">
                                            <div class="col-md-2"><input type="number" name="f7a_input_text" value="{{$isian_tracer->where('kode_form', '=', 'f7a')->first()->value}}" readonly class="form-control"></div>
                                            <div class="col-md-10 {{ $errors->has('f7a_select_input') ? ' has-error' : '' }}">
                                                <select name="f7a_select_input" id="f7a_select_input" disabled class="form-control">
                                                    <option value="" disabled selected>Pilih Opsi</option>
                                                    <option value="1" {{$isian_tracer->where('kode_form', '=', 'f7a')->first()->option==1 ? "selected" : "" }}>Perusahaan</option>
                                                    <option value="2" {{$isian_tracer->where('kode_form', '=', 'f7a')->first()->option==2 ? "selected" : "" }}>Instansi</option>
                                                    <option value="3" {{$isian_tracer->where('kode_form', '=', 'f7a')->first()->option==3 ? "selected" : "" }}>Institusi</option>
                                                </select>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-danger" style="vertical-align:top;" align="center" width="5%">F8</td>
                                    <td width="30%" style="vertical-align:top;">Apakah anda bekerja saat ini (termasuk kerja sambilan dan wirausaha. Jika ya, lanjutkan ke f11)?</td>
                                    <td>
                                        <div class="form-group {{ $errors->has('f8_radio_input') ? ' has-error' : '' }}">
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="f8_radio_input" class="flat-red" {{$isian_tracer->where('kode_form', '=', 'f8')->first()->value==1 ? "checked" : "" }} id="optionsRadios1" value="1" checked>
                                                    Ya
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="f8_radio_input" class="flat-red" {{$isian_tracer->where('kode_form', '=', 'f8')->first()->value==2 ? "checked" : "" }} id="optionsRadios2" value="0">
                                                    Tidak
                                                </label>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-danger" style="vertical-align:top;" width="5%" align="center">F9</td>
                                    <td style="vertical-align:top;">Bagaimana anda menggambarkan situasi anda saat ini? Jawaban bisa lebih dari satu</td>
                                    <td>
                                        <div class="form-group {{ $errors->has('f9_checkbox_input') ? ' has-error' : '' }}">
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" class="flat-red" {{$isian_tracer->where('kode_form', '=', 'f9')->first()->value==1 ? "checked" : "" }} name="f9_checkbox_input[1]" value="1">
                                                    Saya masih belajar/melanjutkan kuliah profesi atau pascasarjana
                                                </label>
                                            </div>

                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" class="flat-red" {{$isian_tracer->where('kode_form', '=', 'f9')->first()->value==2 ? "selected" : "" }} name="f9_checkbox_input[2]" value="2">
                                                    Saya menikah
                                                </label>
                                            </div>

                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" class="flat-red" {{$isian_tracer->where('kode_form', '=', 'f9')->first()->value==3 ? "selected" : "" }} name="f9_checkbox_input[3]" value="3">
                                                    Saya sibuk dengan keluarga dan anak-anak
                                                </label>
                                            </div>

                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" class="flat-red" {{$isian_tracer->where('kode_form', '=', 'f9')->first()->value==4 ? "selected" : "" }} name="f9_checkbox_input[4]" value="4">
                                                    Saya sekarang sedang mencari pekerjaan
                                                </label>
                                            </div>

                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" class="flat-red" {{$isian_tracer->where('kode_form', '=', 'f9')->first()->value==5 ? "selected" : "" }} name="f9_checkbox_input[5]" value="5">
                                                    Lainnya
                                                </label>
                                            </div>
                                        </div>
                                    </td>
                                </tr>

                                <tr>
                                    <td class="text-danger" style="vertical-align:top;" align="center" width="5%">F10</td>
                                    <td width="30%" style="vertical-align:top;">Apakah anda aktif mencari pekerjaan dalam 4 minggu terakhir? <p><i>(Pilihlah Satu Jawaban. KEMUDIAN LANJUT KE f17)</i></p></td>
                                    <td>
                                        <div class="form-group {{ $errors->has('f10_select_input') ? ' has-error' : '' }}">

                                            <div class="col-md-12">
                                                <select name="f10_select_input" id="f10_select_input" disabled class="form-control">
                                                    <option value="" selected>Pilih Opsi</option>
                                                    <option value="1" {{$isian_tracer->where('kode_form', '=', 'f10')->first()->value==1 ? "selected" : "" }}>Tidak</option>
                                                    <option value="2" {{$isian_tracer->where('kode_form', '=', 'f10')->first()->value==2 ? "selected" : "" }}>Tidak, tapi saya sedang menunggu hasil lamaran kerja</option>
                                                    <option value="3" {{$isian_tracer->where('kode_form', '=', 'f10')->first()->value==3 ? "selected" : "" }}>Ya, saya akan mulai bekerja dalam 2 minggu ke depan</option>
                                                    <option value="4" {{$isian_tracer->where('kode_form', '=', 'f10')->first()->value==4 ? "selected" : "" }}>Ya, tapi saya belum pasti akan bekerja dalam 2 minggu ke depan</option>
                                                    <option value="5" {{$isian_tracer->where('kode_form', '=', 'f10')->first()->value==5 ? "selected" : "" }}>Lainnya</option>
                                                </select>
                                            </div>
                                        </div>
                                    </td>
                                </tr>

                                <tr>
                                    <td class="text-danger" style="vertical-align:top;" align="center" width="5%">F11</td>
                                    <td width="30%" style="vertical-align:top;">Apa jenis perusahaan/instansi/institusi tempat anda bekerja sekarang?</td>
                                    <td>
                                        <div class="form-group{{ $errors->has('f11_select_input') ? ' has-error' : '' }}">

                                            <div class="col-md-6">
                                                <select name="f11_select_input" disabled id="f11_select_input" class="form-control">
                                                    <option value="" disabled >Pilih Opsi</option>
                                                    <option value="1" {{$isian_tracer->where('kode_form', '=', 'f11')->first()->value==1 ? "selected" : "" }}>Instansi pemerintah (termasuk BUMN)</option>
                                                    <option value="2" {{$isian_tracer->where('kode_form', '=', 'f11')->first()->value==2 ? "selected" : "" }}>Organisasi non-profit/Lembaga Swadaya Masyarakat</option>
                                                    <option value="3" {{$isian_tracer->where('kode_form', '=', 'f11')->first()->value==3 ? "selected" : "" }}>Perusahaan swasta</option>
                                                    <option value="4" {{$isian_tracer->where('kode_form', '=', 'f11')->first()->value==4 ? "selected" : "" }}>Wiraswasta/perusahaan sendiri</option>
                                                    <option value="5" {{$isian_tracer->where('kode_form', '=', 'f11')->first()->value==5 ? "selected" : "" }}>Lainnya, tuliskan:</option>
                                                </select>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="input-lainnya-f11">
                                                    <input type="text" class="form-control" name="f11_input_text" placeholder="Inputkan Jenis Perusahaan">
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-danger" style="vertical-align:top;" align="center" width="5%">F12</td>
                                    <td width="30%" style="vertical-align:top;">Tempat anda bekerja saat ini bergerak di bidang apa? <p><i>(Klasifikasi Baku Lapangan Usaha Indonesia, Kemnakertrans, 2009)</i></p></td>
                                    <td>
                                        <div class="form-group{{ $errors->has('f12_select_input') ? ' has-error' : '' }}">

                                            <div class="col-md-12">
                                                <select name="f12_select_input" disabled id="f12_select_input" class="form-control select2" style="width : 100%;">
                                                    <option value="" disabled selected>Pilih Opsi</option>
                                                    <option value="1" {{$isian_tracer->where('kode_form', '=', 'f12')->first()->value==1 ? "selected" : "" }}>Pertanian tanaman, peternakan, perburuan dan kegiatan yang berhubungan dengan itu</option>
                                                    <option value="2" {{$isian_tracer->where('kode_form', '=', 'f12')->first()->value==2 ? "selected" : "" }}>Kehutanan dan penebangan kayu</option>
                                                    <option value="3" {{$isian_tracer->where('kode_form', '=', 'f12')->first()->value==3 ? "selected" : "" }}>Perikanan </option>
                                                    <option value="4" {{$isian_tracer->where('kode_form', '=', 'f12')->first()->value==4 ? "selected" : "" }}>Pertambangan batu bara dan lignit</option>
                                                    <option value="5" {{$isian_tracer->where('kode_form', '=', 'f12')->first()->value==5 ? "selected" : "" }}>Pertambangan minyak bumi dan gas alam dan panas bumi</option>
                                                    <option value="6" {{$isian_tracer->where('kode_form', '=', 'f12')->first()->value==6 ? "selected" : "" }}>Pertambangan bijih logam</option>
                                                    <option value="7" {{$isian_tracer->where('kode_form', '=', 'f12')->first()->value==7 ? "selected" : "" }}>Pertambangan dan penggalian lainnya</option>
                                                    <option value="8" {{$isian_tracer->where('kode_form', '=', 'f12')->first()->value==8 ? "selected" : "" }}>Jasa pertambangan</option>
                                                    <option value="9" {{$isian_tracer->where('kode_form', '=', 'f12')->first()->value==9 ? "selected" : "" }}>Industri makanan</option>
                                                    <option value="10" {{$isian_tracer->where('kode_form', '=', 'f12')->first()->value==10 ? "selected" : "" }}>Industri minuman</option>
                                                    <option value="11" {{$isian_tracer->where('kode_form', '=', 'f12')->first()->value==11 ? "selected" : "" }}>Industri pengolahan tembakau</option>
                                                    <option value="12" {{$isian_tracer->where('kode_form', '=', 'f12')->first()->value==12 ? "selected" : "" }}>Industri tekstil</option>
                                                    <option value="13" {{$isian_tracer->where('kode_form', '=', 'f12')->first()->value==13 ? "selected" : "" }}>Industri pakaian jadi</option>
                                                    <option value="14" {{$isian_tracer->where('kode_form', '=', 'f12')->first()->value==14 ? "selected" : "" }}>Industri kulit, barang dari kulit dan alas kaki</option>
                                                    <option value="15" {{$isian_tracer->where('kode_form', '=', 'f12')->first()->value==15 ? "selected" : "" }}>Industri kayu, barang dari kayu dan gabus (tidak termasuk furnitur) dan barang anyaman dari bambu, rotan dan sejenisnya</option>
                                                    <option value="16" {{$isian_tracer->where('kode_form', '=', 'f12')->first()->value==16 ? "selected" : "" }}>Industri kertas dan barang dari kertas</option>
                                                    <option value="17" {{$isian_tracer->where('kode_form', '=', 'f12')->first()->value==17 ? "selected" : "" }}>Industri pencetakan dan reproduksi media rekaman</option>
                                                    <option value="18" {{$isian_tracer->where('kode_form', '=', 'f12')->first()->value==18 ? "selected" : "" }}>Industri produk dari batu bara dan pengilangan minyak bumi </option>
                                                    <option value="19" {{$isian_tracer->where('kode_form', '=', 'f12')->first()->value==19 ? "selected" : "" }}>Industri bahan kimia dan barang dari bahan kimia</option>
                                                    <option value="20" {{$isian_tracer->where('kode_form', '=', 'f12')->first()->value==20 ? "selected" : "" }}>Industri farmasi, produk obat kimia dan obat tradisional</option>
                                                    <option value="21" {{$isian_tracer->where('kode_form', '=', 'f12')->first()->value==21 ? "selected" : "" }}>Industri karet, barang dari karet dan plastik</option>
                                                    <option value="22" {{$isian_tracer->where('kode_form', '=', 'f12')->first()->value==22 ? "selected" : "" }}>Industri barang galian bukan logam</option>
                                                    <option value="23" {{$isian_tracer->where('kode_form', '=', 'f12')->first()->value==23 ? "selected" : "" }}>Industri logam dasar</option>
                                                    <option value="24" {{$isian_tracer->where('kode_form', '=', 'f12')->first()->value==24 ? "selected" : "" }}>Industri barang logam, bukan mesin dan peralatannya</option>
                                                    <option value="25" {{$isian_tracer->where('kode_form', '=', 'f12')->first()->value==25 ? "selected" : "" }}>Industri komputer, barang elektronik dan optik</option>
                                                    <option value="27" {{$isian_tracer->where('kode_form', '=', 'f12')->first()->value==26 ? "selected" : "" }}>Industri mesin dan perlengkapan ytdl</option>
                                                    <option value="28" {{$isian_tracer->where('kode_form', '=', 'f12')->first()->value==27 ? "selected" : "" }}>Industri kendaraan bermotor, trailer dan semi trailer </option>
                                                    <option value="29" {{$isian_tracer->where('kode_form', '=', 'f12')->first()->value==28 ? "selected" : "" }}>Industri alat angkutan lainnya</option>
                                                    <option value="30" {{$isian_tracer->where('kode_form', '=', 'f12')->first()->value==29 ? "selected" : "" }}>Industri furnitur</option>
                                                    <option value="31" {{$isian_tracer->where('kode_form', '=', 'f12')->first()->value==30 ? "selected" : "" }}>Industri pengolahan lainnya</option>
                                                    <option value="32" {{$isian_tracer->where('kode_form', '=', 'f12')->first()->value==31 ? "selected" : "" }}>Jasa reparasi dan pemasangan mesin dan peralatan</option>
                                                    <option value="33" {{$isian_tracer->where('kode_form', '=', 'f12')->first()->value==32 ? "selected" : "" }}>Pengadaan listrik, gas, uap/air panas dan udara dingin</option>
                                                    <option value="34" {{$isian_tracer->where('kode_form', '=', 'f12')->first()->value==33 ? "selected" : "" }}>Pengadaan air</option>
                                                    <option value="35" {{$isian_tracer->where('kode_form', '=', 'f12')->first()->value==34 ? "selected" : "" }}>Pengolahan limbah</option>
                                                    <option value="36" {{$isian_tracer->where('kode_form', '=', 'f12')->first()->value==35 ? "selected" : "" }}>Pengolahan sampah dan daur ulang</option>
                                                    <option value="37" {{$isian_tracer->where('kode_form', '=', 'f12')->first()->value==36 ? "selected" : "" }}>Jasa pembersihan dan pengelolaan sampah lainnya</option>
                                                    <option value="38" {{$isian_tracer->where('kode_form', '=', 'f12')->first()->value==37 ? "selected" : "" }}>Konstruksi gedung</option>
                                                    <option value="39" {{$isian_tracer->where('kode_form', '=', 'f12')->first()->value==38 ? "selected" : "" }}>Konstruksi bangunan sipil</option>
                                                    <option value="40" {{$isian_tracer->where('kode_form', '=', 'f12')->first()->value==39 ? "selected" : "" }}>Konstruksi khusus</option>
                                                    <option value="41" {{$isian_tracer->where('kode_form', '=', 'f12')->first()->value==40 ? "selected" : "" }}>Perdagangan, reparasi dan perawatan mobil dan sepeda motor</option>
                                                    <option value="42" {{$isian_tracer->where('kode_form', '=', 'f12')->first()->value==41 ? "selected" : "" }}>Perdagangan besar, bukan mobil dan sepeda motor</option>
                                                    <option value="43" {{$isian_tracer->where('kode_form', '=', 'f12')->first()->value==42 ? "selected" : "" }}>Perdagangan eceran, bukan mobil dan motor</option>
                                                    <option value="44" {{$isian_tracer->where('kode_form', '=', 'f12')->first()->value==43 ? "selected" : "" }}>Angkutan darat dan angkutan melalui saluran pipa</option>
                                                    <option value="88" {{$isian_tracer->where('kode_form', '=', 'f12')->first()->value==44 ? "selected" : "" }}>Angkutan Air</option>
                                                    <option value="45" {{$isian_tracer->where('kode_form', '=', 'f12')->first()->value==45 ? "selected" : "" }}>Angkutan udara</option>
                                                    <option value="46" {{$isian_tracer->where('kode_form', '=', 'f12')->first()->value==46 ? "selected" : "" }}>Pergudangan dan jasa penunjang angkutan</option>
                                                    <option value="47" {{$isian_tracer->where('kode_form', '=', 'f12')->first()->value==47 ? "selected" : "" }}>Pos dan kurir</option>
                                                    <option value="48" {{$isian_tracer->where('kode_form', '=', 'f12')->first()->value==48 ? "selected" : "" }}>Penyediaan akomodasi</option>
                                                    <option value="49" {{$isian_tracer->where('kode_form', '=', 'f12')->first()->value==49 ? "selected" : "" }}>Penyediaan makanan dan minuman</option>
                                                    <option value="50" {{$isian_tracer->where('kode_form', '=', 'f12')->first()->value==50 ? "selected" : "" }}>Penerbitan</option>
                                                    <option value="51" {{$isian_tracer->where('kode_form', '=', 'f12')->first()->value==51 ? "selected" : "" }}>Produksi gambar bergerak, video dan program televisi, perekaman suara dan penerbitan musik</option>
                                                    <option value="52" {{$isian_tracer->where('kode_form', '=', 'f12')->first()->value==52 ? "selected" : "" }}>Penyiaran dan pemrograman</option>
                                                    <option value="53" {{$isian_tracer->where('kode_form', '=', 'f12')->first()->value==53 ? "selected" : "" }}>Telekomunikasi </option>
                                                    <option value="54" {{$isian_tracer->where('kode_form', '=', 'f12')->first()->value==54 ? "selected" : "" }}>Kegiatan pemrograman, konsultasi komputer dan kegiatan yang berhubungan dengan itu</option>
                                                    <option value="55" {{$isian_tracer->where('kode_form', '=', 'f12')->first()->value==55 ? "selected" : "" }}>Kegiatan jasa informasi</option>
                                                    <option value="56" {{$isian_tracer->where('kode_form', '=', 'f12')->first()->value==56 ? "selected" : "" }}>Jasa keuangan, bukan asuransi dan dana pensiun</option>
                                                    <option value="57" {{$isian_tracer->where('kode_form', '=', 'f12')->first()->value==57 ? "selected" : "" }}>Asuransi, reasuransi dan dana pensiun, bukan jaminan sosial wajib</option>
                                                    <option value="58" {{$isian_tracer->where('kode_form', '=', 'f12')->first()->value==58 ? "selected" : "" }}>Jasa penunjang jasa keuangan, asuransi dan dana pensiun</option>
                                                    <option value="59" {{$isian_tracer->where('kode_form', '=', 'f12')->first()->value==59 ? "selected" : "" }}>Real estate</option>
                                                    <option value="60" {{$isian_tracer->where('kode_form', '=', 'f12')->first()->value==60 ? "selected" : "" }}>Jasa hukum dan akuntansi</option>
                                                    <option value="61" {{$isian_tracer->where('kode_form', '=', 'f12')->first()->value==61 ? "selected" : "" }}>Kegiatan kantor pusat dan konsultasi manajemen</option>
                                                    <option value="62" {{$isian_tracer->where('kode_form', '=', 'f12')->first()->value==62 ? "selected" : "" }}>Jasa arsitektur dan teknik sipil; analisis dan uji teknis</option>
                                                    <option value="63" {{$isian_tracer->where('kode_form', '=', 'f12')->first()->value==63 ? "selected" : "" }}>Penelitian dan pengembangan ilmu pengetahuan</option>
                                                    <option value="64" {{$isian_tracer->where('kode_form', '=', 'f12')->first()->value==64 ? "selected" : "" }}>Periklanan dan penelitian pasar</option>
                                                    <option value="65" {{$isian_tracer->where('kode_form', '=', 'f12')->first()->value==65 ? "selected" : "" }}>Jasa profesional, ilmiah dan teknis lainnya</option>
                                                    <option value="66" {{$isian_tracer->where('kode_form', '=', 'f12')->first()->value==66 ? "selected" : "" }}>Jasa kesehatan hewan</option>
                                                    <option value="67" {{$isian_tracer->where('kode_form', '=', 'f12')->first()->value==67 ? "selected" : "" }}>Jasa persewaan dan sewa guna usaha tanpa hak opsi</option>
                                                    <option value="68" {{$isian_tracer->where('kode_form', '=', 'f12')->first()->value==68 ? "selected" : "" }}>Jasa ketenagakerjaan</option>
                                                    <option value="69" {{$isian_tracer->where('kode_form', '=', 'f12')->first()->value==69 ? "selected" : "" }}>Jasa agen perjalanan, penyelenggara tur dan jasa reservasi lainnya</option>
                                                    <option value="70" {{$isian_tracer->where('kode_form', '=', 'f12')->first()->value==70 ? "selected" : "" }}>Jasa keamanan dan penyelidikan</option>
                                                    <option value="71" {{$isian_tracer->where('kode_form', '=', 'f12')->first()->value==71 ? "selected" : "" }}>Jasa untuk gedung dan pertamanan</option>
                                                    <option value="72" {{$isian_tracer->where('kode_form', '=', 'f12')->first()->value==72 ? "selected" : "" }}>Jasa administrasi kantor, jasa penunjang kantor dan jasa penunjang usaha lainnya</option>
                                                    <option value="73" {{$isian_tracer->where('kode_form', '=', 'f12')->first()->value==73 ? "selected" : "" }}>Administrasi pemerintahan, pertahanan dan jaminan sosial wajib</option>
                                                    <option value="74" {{$isian_tracer->where('kode_form', '=', 'f12')->first()->value==74 ? "selected" : "" }}>Jasa pendidikan</option>
                                                    <option value="75" {{$isian_tracer->where('kode_form', '=', 'f12')->first()->value==75 ? "selected" : "" }}>Jasa kesehatan manusia</option>
                                                    <option value="76" {{$isian_tracer->where('kode_form', '=', 'f12')->first()->value==76 ? "selected" : "" }}>Jasa kegiatan sosial di dalam panti </option>
                                                    <option value="77" {{$isian_tracer->where('kode_form', '=', 'f12')->first()->value==77 ? "selected" : "" }}>Jasa kegiatan sosial di luar panti </option>
                                                    <option value="78" {{$isian_tracer->where('kode_form', '=', 'f12')->first()->value==78 ? "selected" : "" }}>Kegiatan hiburan, kesenian dan kreativitas</option>
                                                    <option value="79" {{$isian_tracer->where('kode_form', '=', 'f12')->first()->value==79 ? "selected" : "" }}>Perpustakaan, arsip, museum dan kegiatan kebudayaan lainnya</option>
                                                    <option value="80" {{$isian_tracer->where('kode_form', '=', 'f12')->first()->value==80 ? "selected" : "" }}>Kegiatan perjudian dan pertaruhan</option>
                                                    <option value="81" {{$isian_tracer->where('kode_form', '=', 'f12')->first()->value==81 ? "selected" : "" }}>Kegiatan olahraga dan rekreasi lainnya</option>
                                                    <option value="82" {{$isian_tracer->where('kode_form', '=', 'f12')->first()->value==82 ? "selected" : "" }}>Kegiatan keanggotaan organisasi</option>
                                                    <option value="83" {{$isian_tracer->where('kode_form', '=', 'f12')->first()->value==83 ? "selected" : "" }}>Jasa reparasi komputer dan barang keperluan pribadi dan perlengkapan rumah tangga </option>
                                                    <option value="84" {{$isian_tracer->where('kode_form', '=', 'f12')->first()->value==84 ? "selected" : "" }}>Jasa perorangan lainnya</option>
                                                    <option value="85" {{$isian_tracer->where('kode_form', '=', 'f12')->first()->value==85 ? "selected" : "" }}>Jasa perorangan yang melayani rumah tangga</option>
                                                    <option value="86" {{$isian_tracer->where('kode_form', '=', 'f12')->first()->value==86 ? "selected" : "" }}>Kegiatan yang menghasilkan barang dan jasa oleh rumah tangga yang digunakan sendiri untuk memenuhi kebutuhan</option>
                                                    <option value="87" {{$isian_tracer->where('kode_form', '=', 'f12')->first()->value==87 ? "selected" : "" }}>Kegiatan badan internasional dan badan ekstra internasional lainnya</option>
                                                </select>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-danger" style="vertical-align:top;" align="center" width="5%">F13</td>
                                    <td width="30%" style="vertical-align:top;">Kira-kira berapa pendapatan anda setiap bulannya? </td>
                                    <td>
                                        <div class="form-group{{ $errors->has('f13_pekerjaan_utama') ? ' has-error' : '' }}" >
                                            <label for="f13_pekerjaan_utama"  class='col-md-3 control-label'>Dari Pekerjaan Utama</label>
                                            <div class="col-md-9">
                                                <input type="number" class="form-control" readonly value="{{$isian_tracer->where('kode_form', '=', 'f13_1')->first()->value}}" name="f13_pekerjaan_utama" value="1" style="margin-bottom:10px; width:200px;">
                                            </div>
                                        </div>
                                        <div class="form-group{{ $errors->has('f13_pekerjaan_lembur') ? ' has-error' : '' }}">
                                            <label for="f13_pekerjaan_utama[1]"  class='col-md-3 control-label'>Dari Lembur dan Tips</label>
                                            <div class="col-md-9">
                                                <input type="number" class="form-control" readonly value="{{$isian_tracer->where('kode_form', '=', 'f13_2')->first()->value}}" name="f13_pekerjaan_lembur" value="2" style="margin-bottom:10px;width:200px;">
                                            </div>
                                        </div>
                                        <div class="form-group{{ $errors->has('f13_pekerjaan_lainnya') ? ' has-error' : '' }}" style="margin-bottom:10px;">
                                            <label for="f13_pekerjaan_utama[2]"  class='col-md-3 control-label'>Dari Pekerjaan Lainnya</label>
                                            <div class="col-md-9">
                                                <input type="number" class="form-control" readonly value="{{$isian_tracer->where('kode_form', '=', 'f13_3')->first()->value}}" name="f13_pekerjaan_lainnya" value="3" style="margin-bottom:10px;width:200px;">
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-danger" style="vertical-align:top;" align="center" width="5%">F14</td>
                                    <td width="30%" style="vertical-align:top;">Seberapa erat hubungan antara bidang studi dengan pekerjaan anda? </td>
                                    <td>
                                        <div class="form-group{{ $errors->has('f14_select_input') ? ' has-error' : '' }}">

                                            <div class="col-md-12">
                                                <select name="f14_select_input" id="f14_select_input" disabled class="form-control">
                                                    <option value="" disabled>Pilih Opsi</option>
                                                    <option value="1" {{$isian_tracer->where('kode_form', '=', 'f14')->first()->value==1 ? "selected" : "" }}>Sangat Erat</option>
                                                    <option value="2" {{$isian_tracer->where('kode_form', '=', 'f14')->first()->value==1 ? "selected" : "" }}>Erat</option>
                                                    <option value="3" {{$isian_tracer->where('kode_form', '=', 'f14')->first()->value==1 ? "selected" : "" }}>Cukup Erat</option>
                                                    <option value="4" {{$isian_tracer->where('kode_form', '=', 'f14')->first()->value==1 ? "selected" : "" }}>Kurang Erat</option>
                                                    <option value="5" {{$isian_tracer->where('kode_form', '=', 'f14')->first()->value==1 ? "selected" : "" }}>Tidak Sama Sekali </option>
                                                </select>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-danger" style="vertical-align:top;" align="center" width="5%">F15</td>
                                    <td width="30%" style="vertical-align:top;">Tingkat pendidikan apa yang paling tepat/sesuai untuk pekerjaan anda saat ini?</td>
                                    <td>
                                        <div class="form-group{{ $errors->has('f15_select_input') ? ' has-error' : '' }}">

                                            <div class="col-md-12">
                                                <select name="f15_select_input" id="f15_select_input" disabled class="form-control">
                                                    <option value="" disabled>Pilih Opsi</option>
                                                    <option value="1" {{$isian_tracer->where('kode_form', '=', 'f15')->first()->value==1 ? "selected" : "" }}>Setingkat Lebih Tinggi</option>
                                                    <option value="2" {{$isian_tracer->where('kode_form', '=', 'f15')->first()->value==2 ? "selected" : "" }}>Tingkat yang Sama</option>
                                                    <option value="3" {{$isian_tracer->where('kode_form', '=', 'f15')->first()->value==3 ? "selected" : "" }}>Setingkat Lebih Rendah</option>
                                                    <option value="4" {{$isian_tracer->where('kode_form', '=', 'f15')->first()->value==4 ? "selected" : "" }}>Tidak Perlu Pendidikan Tinggi</option>
                                                </select>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-danger" style="vertical-align:top;" width="5%" align="center">F16</td>
                                    <td style="vertical-align:top;">Jika menurut anda pekerjaan anda saat ini tidak sesuai dengan pendidikan anda, mengapa anda mengambilnya? Jawaban bisa lebih dari satu</td>
                                    <td>
                                        <div class="form-group{{ $errors->has('f16_checkbox_input') ? ' has-error' : '' }}">
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" class="flat-red" name="f16_checkbox_input[1]" {{$isian_tracer->where('kode_form', '=', 'f16')->first()->value==1 ? "checked" : "" }} value="1">
                                                    Pertanyaan tidak sesuai; pekerjaan saya sekarang sudah sesuai dengan pendidikan saya
                                                </label>
                                            </div>

                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" class="flat-red" name="f16_checkbox_input[2]" {{$isian_tracer->where('kode_form', '=', 'f16')->first()->value==2 ? "checked" : "" }} value="2">
                                                    Saya belum mendapatkan pekerjaan yang lebih sesuai
                                                </label>
                                            </div>

                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" class="flat-red" name="f16_checkbox_input[3]" {{$isian_tracer->where('kode_form', '=', 'f16')->first()->value==3 ? "checked" : "" }} value="3">
                                                    Di pekerjaan ini saya memeroleh prospek karir yang baik
                                                </label>
                                            </div>

                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" class="flat-red" name="f16_checkbox_input[4]" {{$isian_tracer->where('kode_form', '=', 'f16')->first()->value==4 ? "checked" : "" }} value="4">
                                                    Saya lebih suka bekerja di area pekerjaan yang tidak ada hubungannya dengan pendidikan saya
                                                </label>
                                            </div>

                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" class="flat-red" name="f16_checkbox_input[5]" {{$isian_tracer->where('kode_form', '=', 'f16')->first()->value==5 ? "checked" : "" }} value="5">
                                                    Saya dipromosikan ke posisi yang kurang berhubungan dengan pendidikan saya dibanding posisi sebelumnya
                                                </label>
                                            </div>

                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" class="flat-red" name="f16_checkbox_input[6]" {{$isian_tracer->where('kode_form', '=', 'f16')->first()->value==6 ? "checked" : "" }} value="6">
                                                    Saya dapat memeroleh pendapatan yang lebih tinggi di pekerjaan ini
                                                </label>
                                            </div>

                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" class="flat-red" name="f16_checkbox_input[7]" {{$isian_tracer->where('kode_form', '=', 'f16')->first()->value==7 ? "checked" : "" }} value="7">
                                                    Pekerjaan saya saat ini lebih aman/terjamin/secure
                                                </label>
                                            </div>

                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" class="flat-red" name="f16_checkbox_input[8]" {{$isian_tracer->where('kode_form', '=', 'f16')->first()->value==8 ? "checked" : "" }} value="8">
                                                    Pekerjaan saya saat ini lebih menarik
                                                </label>
                                            </div>

                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" class="flat-red" name="f16_checkbox_input[9]" {{$isian_tracer->where('kode_form', '=', 'f16')->first()->value==9 ? "checked" : "" }} value="9">
                                                    Pekerjaan saya saat ini lebih memungkinkan saya mengambil pekerjaan tambahan/jadwal yang fleksibel, dll
                                                </label>
                                            </div>

                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" class="flat-red" name="f16_checkbox_input[10]" {{$isian_tracer->where('kode_form', '=', 'f16')->first()->value==10 ? "checked" : "" }} value="10">
                                                    Pekerjaan saya saat ini lokasinya lebih dekat dari rumah saya
                                                </label>
                                            </div>

                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" class="flat-red" name="f16_checkbox_input[11]" {{$isian_tracer->where('kode_form', '=', 'f16')->first()->value==11 ? "checked" : "" }} value="11">
                                                    Pekerjaan saya saat ini dapat lebih menjamin kebutuhan keluarga saya
                                                </label>
                                            </div>

                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" class="flat-red" name="f16_checkbox_input[12]" {{$isian_tracer->where('kode_form', '=', 'f16')->first()->value==12 ? "checked" : "" }} value="12">
                                                    Pada awal meniti karir ini, saya harus menerima pekerjaan yang tidak berhubungan dengan pendidikan saya
                                                </label>
                                            </div>

                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" class="flat-red" name="f16_checkbox_input[13]" {{$isian_tracer->where('kode_form', '=', 'f16')->first()->value==13 ? "checked" : "" }} value="13">
                                                    Lainnya
                                                </label>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-danger" style="vertical-align:top;" align="center" width="5%">F17</td>
                                    <td width="30%" style="vertical-align:top;">Pada saat lulus, pada tingkat mana kompetensi di bawah ini anda kuasai? (<b>A</b>) <br /><br /> <p>Pada saat lulus, bagaimana kontribusi perguruan tinggi dalam hal kompetensi di bawah ini? (<b>B</b>)</p> </td>
                                    <td>
                                        <div class="form-group">
                                            <table class="table table-bordered">
                                                <thead>
                                                <tr>
                                                    <th rowspan="2" style="text-align:center; vertical-alin:middle; width:5%;">No</th>
                                                    <th rowspan="2" style="text-align:center; vertical-alin:middle;">Kompetensi</th>
                                                    <th colspan="5" style="text-align:center; vertical-alin:middle;">Nilai A</th>
                                                    <th colspan="5" style="text-align:center; vertical-alin:middle;">Nilai B</th>
                                                </tr>
                                                <tr>
                                                    <th>1</th>
                                                    <th>2</th>
                                                    <th>3</th>
                                                    <th>4</th>
                                                    <th>5</th>
                                                    <th>1</th>
                                                    <th>2</th>
                                                    <th>3</th>
                                                    <th>4</th>
                                                    <th>5</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr>
                                                    <td>1</td>
                                                    <td>Pengetahuan di bidang atau disiplin ilmu anda</td>
                                                    <div class="form-group">
                                                        <td>
                                                            <div class="radio">
                                                                <input type="radio" name="f17_option_1_a" {{$isian_tracer->where('kode_form', '=', 'f17a_1')->first()->value==1 ? "checked" : "" }} class="flat-red" value="1">
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="radio">
                                                                <input type="radio" name="f17_option_1_a" {{$isian_tracer->where('kode_form', '=', 'f17a_1')->first()->value==2 ? "checked" : "" }} class="flat-red" value="2">
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="radio">
                                                                <input type="radio" name="f17_option_1_a" {{$isian_tracer->where('kode_form', '=', 'f17a_1')->first()->value==3 ? "checked" : "" }} class="flat-red" value="3">
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="radio">
                                                                <input type="radio" name="f17_option_1_a" {{$isian_tracer->where('kode_form', '=', 'f17a_1')->first()->value==4 ? "checked" : "" }} class="flat-red" value="4">
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="radio">
                                                                <input type="radio" name="f17_option_1_a" {{$isian_tracer->where('kode_form', '=', 'f17a_1')->first()->value==5 ? "checked" : "" }} class="flat-red" value="5">
                                                            </div>
                                                        </td>
                                                    </div>
                                                    <div class="form-group">
                                                        <td>
                                                            <div class="radio">
                                                                <input type="radio" name="f17_option_1_b" {{$isian_tracer->where('kode_form', '=', 'f17b_1')->first()->value==1 ? "checked" : "" }} class="flat-red" value="1">
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="radio">
                                                                <input type="radio" name="f17_option_1_b" {{$isian_tracer->where('kode_form', '=', 'f17b_1')->first()->value==2 ? "checked" : "" }} class="flat-red" value="2">
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="radio">
                                                                <input type="radio" name="f17_option_1_b" {{$isian_tracer->where('kode_form', '=', 'f17b_1')->first()->value==3 ? "checked" : "" }} class="flat-red" value="3">
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="radio">
                                                                <input type="radio" name="f17_option_1_b" {{$isian_tracer->where('kode_form', '=', 'f17b_1')->first()->value==4 ? "checked" : "" }} class="flat-red" value="4">
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="radio">
                                                                <input type="radio" name="f17_option_1_b" {{$isian_tracer->where('kode_form', '=', 'f17b_1')->first()->value==5 ? "checked" : "" }} class="flat-red" value="5">
                                                            </div>
                                                        </td>
                                                    </div>
                                                </tr>
                                                <tr>
                                                    <td>2</td>
                                                    <td>Pengetahuan di luar bidang atau disiplin ilmu anda</td>
                                                    <div class="form-group">
                                                        <td>
                                                            <div class="radio">
                                                                <input type="radio" name="f17_option_2_a" {{$isian_tracer->where('kode_form', '=', 'f17a_2')->first()->value==1 ? "checked" : "" }} class="flat-red" value="1">
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="radio">
                                                                <input type="radio" name="f17_option_2_a" {{$isian_tracer->where('kode_form', '=', 'f17a_2')->first()->value==2 ? "checked" : "" }} class="flat-red" value="2">
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="radio">
                                                                <input type="radio" name="f17_option_2_a" {{$isian_tracer->where('kode_form', '=', 'f17a_2')->first()->value==3 ? "checked" : "" }} class="flat-red" value="3">
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="radio">
                                                                <input type="radio" name="f17_option_2_a" {{$isian_tracer->where('kode_form', '=', 'f17a_2')->first()->value==4 ? "checked" : "" }} class="flat-red" value="4">
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="radio">
                                                                <input type="radio" name="f17_option_2_a" {{$isian_tracer->where('kode_form', '=', 'f17a_2')->first()->value==5 ? "checked" : "" }} class="flat-red" value="5">
                                                            </div>
                                                        </td>
                                                    </div>
                                                    <div class="form-group">
                                                        <td>
                                                            <div class="radio">
                                                                <input type="radio" name="f17_option_2_b" {{$isian_tracer->where('kode_form', '=', 'f17b_2')->first()->value==1 ? "checked" : "" }} class="flat-red" value="1">
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="radio">
                                                                <input type="radio" name="f17_option_2_b" {{$isian_tracer->where('kode_form', '=', 'f17b_2')->first()->value==2 ? "checked" : "" }} class="flat-red" value="2">
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="radio">
                                                                <input type="radio" name="f17_option_2_b" {{$isian_tracer->where('kode_form', '=', 'f17b_2')->first()->value==3 ? "checked" : "" }} class="flat-red" value="3">
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="radio">
                                                                <input type="radio" name="f17_option_2_b" {{$isian_tracer->where('kode_form', '=', 'f17b_2')->first()->value==4 ? "checked" : "" }} class="flat-red" value="4">
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="radio">
                                                                <input type="radio" name="f17_option_2_b" {{$isian_tracer->where('kode_form', '=', 'f17b_2')->first()->value==5 ? "checked" : "" }} class="flat-red" value="5">
                                                            </div>
                                                        </td>
                                                    </div>
                                                </tr>
                                                <tr>
                                                    <td>3</td>
                                                    <td>Pengetahuan umum</td>

                                                    <td>
                                                        <div class="radio">
                                                            <input type="radio" name="f17_option_3_a" {{$isian_tracer->where('kode_form', '=', 'f17a_3')->first()->value==1 ? "checked" : "" }} class="flat-red" value="1">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="radio">
                                                            <input type="radio" name="f17_option_3_a" {{$isian_tracer->where('kode_form', '=', 'f17a_3')->first()->value==2 ? "checked" : "" }} class="flat-red" value="2">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="radio">
                                                            <input type="radio" name="f17_option_3_a" {{$isian_tracer->where('kode_form', '=', 'f17a_3')->first()->value==3 ? "checked" : "" }} class="flat-red" value="3">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="radio">
                                                            <input type="radio" name="f17_option_3_a" {{$isian_tracer->where('kode_form', '=', 'f17a_3')->first()->value==4 ? "checked" : "" }} class="flat-red" value="4">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="radio">
                                                            <input type="radio" name="f17_option_3_a" {{$isian_tracer->where('kode_form', '=', 'f17a_3')->first()->value==5 ? "checked" : "" }} class="flat-red" value="5">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="radio">
                                                            <input type="radio" name="f17_option_3_b" {{$isian_tracer->where('kode_form', '=', 'f17b_3')->first()->value==1 ? "checked" : "" }} class="flat-red" value="1">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="radio">
                                                            <input type="radio" name="f17_option_3_b" {{$isian_tracer->where('kode_form', '=', 'f17b_3')->first()->value==2 ? "checked" : "" }} class="flat-red" value="2">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="radio">
                                                            <input type="radio" name="f17_option_3_b" {{$isian_tracer->where('kode_form', '=', 'f17b_3')->first()->value==3 ? "checked" : "" }} class="flat-red" value="3">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="radio">
                                                            <input type="radio" name="f17_option_3_b" {{$isian_tracer->where('kode_form', '=', 'f17b_3')->first()->value==4 ? "checked" : "" }} class="flat-red" value="4">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="radio">
                                                            <input type="radio" name="f17_option_3_b" {{$isian_tracer->where('kode_form', '=', 'f17b_3')->first()->value==5 ? "checked" : "" }} class="flat-red" value="5">
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>4</td>
                                                    <td>Bahasa Inggris</td>

                                                    <td>
                                                        <div class="radio">
                                                            <input type="radio" name="f17_option_4_a" {{$isian_tracer->where('kode_form', '=', 'f17a_4')->first()->value==1 ? "checked" : "" }} class="flat-red" value="1">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="radio">
                                                            <input type="radio" name="f17_option_4_a" {{$isian_tracer->where('kode_form', '=', 'f17a_4')->first()->value==2 ? "checked" : "" }} class="flat-red" value="2">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="radio">
                                                            <input type="radio" name="f17_option_4_a" {{$isian_tracer->where('kode_form', '=', 'f17a_4')->first()->value==3 ? "checked" : "" }} class="flat-red" value="3">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="radio">
                                                            <input type="radio" name="f17_option_4_a" {{$isian_tracer->where('kode_form', '=', 'f17a_4')->first()->value==4 ? "checked" : "" }} class="flat-red" value="4">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="radio">
                                                            <input type="radio" name="f17_option_4_a" {{$isian_tracer->where('kode_form', '=', 'f17a_4')->first()->value==5 ? "checked" : "" }} class="flat-red" value="5">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="radio">
                                                            <input type="radio" name="f17_option_4_b" {{$isian_tracer->where('kode_form', '=', 'f17b_4')->first()->value==1 ? "checked" : "" }} class="flat-red" value="1">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="radio">
                                                            <input type="radio" name="f17_option_4_b" {{$isian_tracer->where('kode_form', '=', 'f17b_4')->first()->value==2 ? "checked" : "" }} class="flat-red" value="2">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="radio">
                                                            <input type="radio" name="f17_option_4_b" {{$isian_tracer->where('kode_form', '=', 'f17b_4')->first()->value==3 ? "checked" : "" }} class="flat-red" value="3">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="radio">
                                                            <input type="radio" name="f17_option_4_b" {{$isian_tracer->where('kode_form', '=', 'f17b_4')->first()->value==4 ? "checked" : "" }} class="flat-red" value="4">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="radio">
                                                            <input type="radio" name="f17_option_4_b" {{$isian_tracer->where('kode_form', '=', 'f17b_4')->first()->value==5 ? "checked" : "" }} class="flat-red" value="5">
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>5</td>
                                                    <td>Ketrampilan internet</td>

                                                    <td>
                                                        <div class="radio">
                                                            <input type="radio" name="f17_option_5_a" {{$isian_tracer->where('kode_form', '=', 'f17a_5')->first()->value==1 ? "checked" : "" }} class="flat-red" value="1">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="radio">
                                                            <input type="radio" name="f17_option_5_a" {{$isian_tracer->where('kode_form', '=', 'f17a_5')->first()->value==2 ? "checked" : "" }} class="flat-red" value="2">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="radio">
                                                            <input type="radio" name="f17_option_5_a" {{$isian_tracer->where('kode_form', '=', 'f17a_5')->first()->value==3 ? "checked" : "" }} class="flat-red" value="3">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="radio">
                                                            <input type="radio" name="f17_option_5_a" {{$isian_tracer->where('kode_form', '=', 'f17a_5')->first()->value==4 ? "checked" : "" }} class="flat-red" value="4">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="radio">
                                                            <input type="radio" name="f17_option_5_a" {{$isian_tracer->where('kode_form', '=', 'f17a_5')->first()->value==5 ? "checked" : "" }} class="flat-red" value="5">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="radio">
                                                            <input type="radio" name="f17_option_5_b" {{$isian_tracer->where('kode_form', '=', 'f17b_5')->first()->value==1 ? "checked" : "" }} class="flat-red" value="1">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="radio">
                                                            <input type="radio" name="f17_option_5_b" {{$isian_tracer->where('kode_form', '=', 'f17b_5')->first()->value==2 ? "checked" : "" }} class="flat-red" value="2">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="radio">
                                                            <input type="radio" name="f17_option_5_b" {{$isian_tracer->where('kode_form', '=', 'f17b_5')->first()->value==3 ? "checked" : "" }} class="flat-red" value="3">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="radio">
                                                            <input type="radio" name="f17_option_5_b" {{$isian_tracer->where('kode_form', '=', 'f17b_5')->first()->value==4 ? "checked" : "" }} class="flat-red" value="4">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="radio">
                                                            <input type="radio" name="f17_option_5_b" {{$isian_tracer->where('kode_form', '=', 'f17b_5')->first()->value==5 ? "checked" : "" }} class="flat-red" value="5">
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>6</td>
                                                    <td>Ketrampilan komputer</td>

                                                    <td>
                                                        <div class="radio">
                                                            <input type="radio" name="f17_option_6_a" {{$isian_tracer->where('kode_form', '=', 'f17a_6')->first()->value==1 ? "checked" : "" }} class="flat-red" value="1">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="radio">
                                                            <input type="radio" name="f17_option_6_a" {{$isian_tracer->where('kode_form', '=', 'f17a_6')->first()->value==2 ? "checked" : "" }} class="flat-red" value="2">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="radio">
                                                            <input type="radio" name="f17_option_6_a" {{$isian_tracer->where('kode_form', '=', 'f17a_6')->first()->value==3 ? "checked" : "" }} class="flat-red" value="3">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="radio">
                                                            <input type="radio" name="f17_option_6_a" {{$isian_tracer->where('kode_form', '=', 'f17a_6')->first()->value==4 ? "checked" : "" }} class="flat-red" value="4">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="radio">
                                                            <input type="radio" name="f17_option_6_a" {{$isian_tracer->where('kode_form', '=', 'f17a_6')->first()->value==5 ? "checked" : "" }} class="flat-red" value="5">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="radio">
                                                            <input type="radio" name="f17_option_6_b" {{$isian_tracer->where('kode_form', '=', 'f17b_6')->first()->value==1 ? "checked" : "" }} class="flat-red" value="1">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="radio">
                                                            <input type="radio" name="f17_option_6_b" {{$isian_tracer->where('kode_form', '=', 'f17b_6')->first()->value==2 ? "checked" : "" }} class="flat-red" value="2">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="radio">
                                                            <input type="radio" name="f17_option_6_b" {{$isian_tracer->where('kode_form', '=', 'f17b_6')->first()->value==3 ? "checked" : "" }} class="flat-red" value="3">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="radio">
                                                            <input type="radio" name="f17_option_6_b" {{$isian_tracer->where('kode_form', '=', 'f17b_6')->first()->value==4 ? "checked" : "" }} class="flat-red" value="4">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="radio">
                                                            <input type="radio" name="f17_option_6_b" {{$isian_tracer->where('kode_form', '=', 'f17b_6')->first()->value==5 ? "checked" : "" }} class="flat-red" value="5">
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>7</td>
                                                    <td>Berpikir kritis</td>

                                                    <td>
                                                        <div class="radio">
                                                            <input type="radio" name="f17_option_7_a" {{$isian_tracer->where('kode_form', '=', 'f17a_7')->first()->value==1 ? "checked" : "" }} class="flat-red" value="1">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="radio">
                                                            <input type="radio" name="f17_option_7_a" {{$isian_tracer->where('kode_form', '=', 'f17a_7')->first()->value==2 ? "checked" : "" }} class="flat-red" value="2">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="radio">
                                                            <input type="radio" name="f17_option_7_a" {{$isian_tracer->where('kode_form', '=', 'f17a_7')->first()->value==3 ? "checked" : "" }} class="flat-red" value="3">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="radio">
                                                            <input type="radio" name="f17_option_7_a" {{$isian_tracer->where('kode_form', '=', 'f17a_7')->first()->value==4 ? "checked" : "" }} class="flat-red" value="4">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="radio">
                                                            <input type="radio" name="f17_option_7_a" {{$isian_tracer->where('kode_form', '=', 'f17a_7')->first()->value==5 ? "checked" : "" }} class="flat-red" value="5">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="radio">
                                                            <input type="radio" name="f17_option_7_b" {{$isian_tracer->where('kode_form', '=', 'f17b_7')->first()->value==1 ? "checked" : "" }} class="flat-red" value="1">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="radio">
                                                            <input type="radio" name="f17_option_7_b" {{$isian_tracer->where('kode_form', '=', 'f17b_7')->first()->value==2 ? "checked" : "" }} class="flat-red" value="2">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="radio">
                                                            <input type="radio" name="f17_option_7_b" {{$isian_tracer->where('kode_form', '=', 'f17b_7')->first()->value==3 ? "checked" : "" }} class="flat-red" value="3">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="radio">
                                                            <input type="radio" name="f17_option_7_b" {{$isian_tracer->where('kode_form', '=', 'f17b_7')->first()->value==4 ? "checked" : "" }} class="flat-red" value="4">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="radio">
                                                            <input type="radio" name="f17_option_7_b" {{$isian_tracer->where('kode_form', '=', 'f17b_7')->first()->value==5 ? "checked" : "" }} class="flat-red" value="5">
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>8</td>
                                                    <td>Ketrampilan riset</td>

                                                    <td>
                                                        <div class="radio">
                                                            <input type="radio" name="f17_option_8_a" {{$isian_tracer->where('kode_form', '=', 'f17a_8')->first()->value==1 ? "checked" : "" }} class="flat-red" value="1">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="radio">
                                                            <input type="radio" name="f17_option_8_a" {{$isian_tracer->where('kode_form', '=', 'f17a_8')->first()->value==2 ? "checked" : "" }} class="flat-red" value="2">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="radio">
                                                            <input type="radio" name="f17_option_8_a" {{$isian_tracer->where('kode_form', '=', 'f17a_8')->first()->value==3 ? "checked" : "" }} class="flat-red" value="3">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="radio">
                                                            <input type="radio" name="f17_option_8_a" {{$isian_tracer->where('kode_form', '=', 'f17a_8')->first()->value==4 ? "checked" : "" }} class="flat-red" value="4">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="radio">
                                                            <input type="radio" name="f17_option_8_a" {{$isian_tracer->where('kode_form', '=', 'f17a_8')->first()->value==5 ? "checked" : "" }} class="flat-red" value="5">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="radio">
                                                            <input type="radio" name="f17_option_8_b" {{$isian_tracer->where('kode_form', '=', 'f17b_8')->first()->value==1 ? "checked" : "" }} class="flat-red" value="1">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="radio">
                                                            <input type="radio" name="f17_option_8_b" {{$isian_tracer->where('kode_form', '=', 'f17b_8')->first()->value==2 ? "checked" : "" }} class="flat-red" value="2">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="radio">
                                                            <input type="radio" name="f17_option_8_b" {{$isian_tracer->where('kode_form', '=', 'f17b_8')->first()->value==3 ? "checked" : "" }} class="flat-red" value="3">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="radio">
                                                            <input type="radio" name="f17_option_8_b" {{$isian_tracer->where('kode_form', '=', 'f17b_8')->first()->value==4 ? "checked" : "" }} class="flat-red" value="4">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="radio">
                                                            <input type="radio" name="f17_option_8_b" {{$isian_tracer->where('kode_form', '=', 'f17b_8')->first()->value==5 ? "checked" : "" }} class="flat-red" value="5">
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>9</td>
                                                    <td>Kemampuan belajar</td>

                                                    <td>
                                                        <div class="radio">
                                                            <input type="radio" name="f17_option_9_a" {{$isian_tracer->where('kode_form', '=', 'f17a_9')->first()->value==1 ? "checked" : "" }} class="flat-red" value="1">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="radio">
                                                            <input type="radio" name="f17_option_9_a" {{$isian_tracer->where('kode_form', '=', 'f17a_9')->first()->value==2 ? "checked" : "" }} class="flat-red" value="2">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="radio">
                                                            <input type="radio" name="f17_option_9_a" {{$isian_tracer->where('kode_form', '=', 'f17a_9')->first()->value==3 ? "checked" : "" }} class="flat-red" value="3">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="radio">
                                                            <input type="radio" name="f17_option_9_a" {{$isian_tracer->where('kode_form', '=', 'f17a_9')->first()->value==4 ? "checked" : "" }} class="flat-red" value="4">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="radio">
                                                            <input type="radio" name="f17_option_9_a" {{$isian_tracer->where('kode_form', '=', 'f17a_9')->first()->value==5 ? "checked" : "" }} class="flat-red" value="5">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="radio">
                                                            <input type="radio" name="f17_option_9_b" {{$isian_tracer->where('kode_form', '=', 'f17b_9')->first()->value==1 ? "checked" : "" }} class="flat-red" value="1">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="radio">
                                                            <input type="radio" name="f17_option_9_b" {{$isian_tracer->where('kode_form', '=', 'f17b_9')->first()->value==2 ? "checked" : "" }} class="flat-red" value="2">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="radio">
                                                            <input type="radio" name="f17_option_9_b" {{$isian_tracer->where('kode_form', '=', 'f17b_9')->first()->value==3 ? "checked" : "" }} class="flat-red" value="3">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="radio">
                                                            <input type="radio" name="f17_option_9_b" {{$isian_tracer->where('kode_form', '=', 'f17b_9')->first()->value==4 ? "checked" : "" }} class="flat-red" value="4">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="radio">
                                                            <input type="radio" name="f17_option_9_b" {{$isian_tracer->where('kode_form', '=', 'f17b_9')->first()->value==5 ? "checked" : "" }} class="flat-red" value="5">
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>10</td>
                                                    <td>Kemampuan berkomunikasi</td>

                                                    <td>
                                                        <div class="radio">
                                                            <input type="radio" name="f17_option_10_a" {{$isian_tracer->where('kode_form', '=', 'f17a_10')->first()->value==1 ? "checked" : "" }} class="flat-red" value="1">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="radio">
                                                            <input type="radio" name="f17_option_10_a" {{$isian_tracer->where('kode_form', '=', 'f17a_10')->first()->value==2 ? "checked" : "" }} class="flat-red" value="2">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="radio">
                                                            <input type="radio" name="f17_option_10_a" {{$isian_tracer->where('kode_form', '=', 'f17a_10')->first()->value==3 ? "checked" : "" }} class="flat-red" value="3">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="radio">
                                                            <input type="radio" name="f17_option_10_a" {{$isian_tracer->where('kode_form', '=', 'f17a_10')->first()->value==4 ? "checked" : "" }} class="flat-red" value="4">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="radio">
                                                            <input type="radio" name="f17_option_10_a" {{$isian_tracer->where('kode_form', '=', 'f17a_10')->first()->value==5 ? "checked" : "" }} class="flat-red" value="5">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="radio">
                                                            <input type="radio" name="f17_option_10_b" {{$isian_tracer->where('kode_form', '=', 'f17b_10')->first()->value==1 ? "checked" : "" }} class="flat-red" value="1">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="radio">
                                                            <input type="radio" name="f17_option_10_b" {{$isian_tracer->where('kode_form', '=', 'f17b_10')->first()->value==2 ? "checked" : "" }} class="flat-red" value="2">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="radio">
                                                            <input type="radio" name="f17_option_10_b" {{$isian_tracer->where('kode_form', '=', 'f17b_10')->first()->value==3 ? "checked" : "" }} class="flat-red" value="3">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="radio">
                                                            <input type="radio" name="f17_option_10_b" {{$isian_tracer->where('kode_form', '=', 'f17b_10')->first()->value==4 ? "checked" : "" }} class="flat-red" value="4">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="radio">
                                                            <input type="radio" name="f17_option_10_b" {{$isian_tracer->where('kode_form', '=', 'f17b_10')->first()->value==5 ? "checked" : "" }} class="flat-red" value="5">
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>11</td>
                                                    <td>Bekerja di bawah tekanan</td>

                                                    <td>
                                                        <div class="radio">
                                                            <input type="radio" name="f17_option_11_a" {{$isian_tracer->where('kode_form', '=', 'f17a_11')->first()->value==1 ? "checked" : "" }} class="flat-red" value="1">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="radio">
                                                            <input type="radio" name="f17_option_11_a" {{$isian_tracer->where('kode_form', '=', 'f17a_11')->first()->value==2 ? "checked" : "" }} class="flat-red" value="2">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="radio">
                                                            <input type="radio" name="f17_option_11_a" {{$isian_tracer->where('kode_form', '=', 'f17a_11')->first()->value==3 ? "checked" : "" }} class="flat-red" value="3">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="radio">
                                                            <input type="radio" name="f17_option_11_a" {{$isian_tracer->where('kode_form', '=', 'f17a_11')->first()->value==4 ? "checked" : "" }} class="flat-red" value="4">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="radio">
                                                            <input type="radio" name="f17_option_11_a" {{$isian_tracer->where('kode_form', '=', 'f17a_11')->first()->value==5 ? "checked" : "" }} class="flat-red" value="5">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="radio">
                                                            <input type="radio" name="f17_option_11_b" {{$isian_tracer->where('kode_form', '=', 'f17b_11')->first()->value==1 ? "checked" : "" }} class="flat-red" value="1">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="radio">
                                                            <input type="radio" name="f17_option_11_b" {{$isian_tracer->where('kode_form', '=', 'f17b_11')->first()->value==2 ? "checked" : "" }} class="flat-red" value="2">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="radio">
                                                            <input type="radio" name="f17_option_11_b" {{$isian_tracer->where('kode_form', '=', 'f17b_11')->first()->value==3 ? "checked" : "" }} class="flat-red" value="3">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="radio">
                                                            <input type="radio" name="f17_option_11_b" {{$isian_tracer->where('kode_form', '=', 'f17b_11')->first()->value==4 ? "checked" : "" }} class="flat-red" value="4">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="radio">
                                                            <input type="radio" name="f17_option_11_b" {{$isian_tracer->where('kode_form', '=', 'f17b_11')->first()->value==5 ? "checked" : "" }} class="flat-red" value="5">
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>12</td>
                                                    <td>Manajemen waktu</td>

                                                    <td>
                                                        <div class="radio">
                                                            <input type="radio" name="f17_option_12_a" {{$isian_tracer->where('kode_form', '=', 'f17a_12')->first()->value==1 ? "checked" : "" }} class="flat-red" value="1">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="radio">
                                                            <input type="radio" name="f17_option_12_a" {{$isian_tracer->where('kode_form', '=', 'f17a_12')->first()->value==2 ? "checked" : "" }} class="flat-red" value="2">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="radio">
                                                            <input type="radio" name="f17_option_12_a" {{$isian_tracer->where('kode_form', '=', 'f17a_12')->first()->value==3 ? "checked" : "" }} class="flat-red" value="3">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="radio">
                                                            <input type="radio" name="f17_option_12_a" {{$isian_tracer->where('kode_form', '=', 'f17a_12')->first()->value==4 ? "checked" : "" }} class="flat-red" value="4">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="radio">
                                                            <input type="radio" name="f17_option_12_a" {{$isian_tracer->where('kode_form', '=', 'f17a_12')->first()->value==5 ? "checked" : "" }} class="flat-red" value="5">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="radio">
                                                            <input type="radio" name="f17_option_12_b" {{$isian_tracer->where('kode_form', '=', 'f17b_12')->first()->value==1 ? "checked" : "" }} class="flat-red" value="1">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="radio">
                                                            <input type="radio" name="f17_option_12_b" {{$isian_tracer->where('kode_form', '=', 'f17b_12')->first()->value==2 ? "checked" : "" }} class="flat-red" value="2">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="radio">
                                                            <input type="radio" name="f17_option_12_b" {{$isian_tracer->where('kode_form', '=', 'f17b_12')->first()->value==3 ? "checked" : "" }} class="flat-red" value="3">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="radio">
                                                            <input type="radio" name="f17_option_12_b" {{$isian_tracer->where('kode_form', '=', 'f17b_12')->first()->value==4 ? "checked" : "" }} class="flat-red" value="4">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="radio">
                                                            <input type="radio" name="f17_option_12_b" {{$isian_tracer->where('kode_form', '=', 'f17b_12')->first()->value==5 ? "checked" : "" }} class="flat-red" value="5">
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>13</td>
                                                    <td>Bekerja secara mandiri</td>

                                                    <td>
                                                        <div class="radio">
                                                            <input type="radio" name="f17_option_13_a" {{$isian_tracer->where('kode_form', '=', 'f17a_13')->first()->value==1 ? "checked" : "" }} class="flat-red" value="1">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="radio">
                                                            <input type="radio" name="f17_option_13_a" {{$isian_tracer->where('kode_form', '=', 'f17a_13')->first()->value==2 ? "checked" : "" }} class="flat-red" value="2">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="radio">
                                                            <input type="radio" name="f17_option_13_a" {{$isian_tracer->where('kode_form', '=', 'f17a_13')->first()->value==3 ? "checked" : "" }} class="flat-red" value="3">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="radio">
                                                            <input type="radio" name="f17_option_13_a" {{$isian_tracer->where('kode_form', '=', 'f17a_13')->first()->value==4 ? "checked" : "" }} class="flat-red" value="4">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="radio">
                                                            <input type="radio" name="f17_option_13_a" {{$isian_tracer->where('kode_form', '=', 'f17a_13')->first()->value==5 ? "checked" : "" }} class="flat-red" value="5">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="radio">
                                                            <input type="radio" name="f17_option_13_b" {{$isian_tracer->where('kode_form', '=', 'f17b_13')->first()->value==1 ? "checked" : "" }} class="flat-red" value="1">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="radio">
                                                            <input type="radio" name="f17_option_13_b" {{$isian_tracer->where('kode_form', '=', 'f17b_13')->first()->value==2 ? "checked" : "" }} class="flat-red" value="2">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="radio">
                                                            <input type="radio" name="f17_option_13_b" {{$isian_tracer->where('kode_form', '=', 'f17b_13')->first()->value==3 ? "checked" : "" }} class="flat-red" value="3">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="radio">
                                                            <input type="radio" name="f17_option_13_b" {{$isian_tracer->where('kode_form', '=', 'f17b_13')->first()->value==4 ? "checked" : "" }} class="flat-red" value="4">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="radio">
                                                            <input type="radio" name="f17_option_13_b" {{$isian_tracer->where('kode_form', '=', 'f17b_13')->first()->value==5 ? "checked" : "" }} class="flat-red" value="5">
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>14</td>
                                                    <td>Bekerja dalam tim/bekerjasama dengan orang lain</td>

                                                    <td>
                                                        <div class="radio">
                                                            <input type="radio" name="f17_option_14_a" {{$isian_tracer->where('kode_form', '=', 'f17a_14')->first()->value==1 ? "checked" : "" }} class="flat-red" value="1">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="radio">
                                                            <input type="radio" name="f17_option_14_a" {{$isian_tracer->where('kode_form', '=', 'f17a_14')->first()->value==2 ? "checked" : "" }} class="flat-red" value="2">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="radio">
                                                            <input type="radio" name="f17_option_14_a" {{$isian_tracer->where('kode_form', '=', 'f17a_14')->first()->value==3 ? "checked" : "" }} class="flat-red" value="3">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="radio">
                                                            <input type="radio" name="f17_option_14_a" {{$isian_tracer->where('kode_form', '=', 'f17a_14')->first()->value==4 ? "checked" : "" }} class="flat-red" value="4">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="radio">
                                                            <input type="radio" name="f17_option_14_a" {{$isian_tracer->where('kode_form', '=', 'f17a_14')->first()->value==5 ? "checked" : "" }} class="flat-red" value="5">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="radio">
                                                            <input type="radio" name="f17_option_14_b" {{$isian_tracer->where('kode_form', '=', 'f17b_14')->first()->value==1 ? "checked" : "" }} class="flat-red" value="1">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="radio">
                                                            <input type="radio" name="f17_option_14_b" {{$isian_tracer->where('kode_form', '=', 'f17b_14')->first()->value==2 ? "checked" : "" }} class="flat-red" value="2">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="radio">
                                                            <input type="radio" name="f17_option_14_b" {{$isian_tracer->where('kode_form', '=', 'f17b_14')->first()->value==3 ? "checked" : "" }} class="flat-red" value="3">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="radio">
                                                            <input type="radio" name="f17_option_14_b" {{$isian_tracer->where('kode_form', '=', 'f17b_14')->first()->value==4 ? "checked" : "" }} class="flat-red" value="4">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="radio">
                                                            <input type="radio" name="f17_option_14_b" {{$isian_tracer->where('kode_form', '=', 'f17b_14')->first()->value==5 ? "checked" : "" }} class="flat-red" value="5">
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>15</td>
                                                    <td>Bekerja dalam tim/bekerjasama dengan orang lain</td>

                                                    <td>
                                                        <div class="radio">
                                                            <input type="radio" name="f17_option_15_a" {{$isian_tracer->where('kode_form', '=', 'f17a_15')->first()->value==1 ? "checked" : "" }} class="flat-red" value="1">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="radio">
                                                            <input type="radio" name="f17_option_15_a" {{$isian_tracer->where('kode_form', '=', 'f17a_15')->first()->value==2 ? "checked" : "" }} class="flat-red" value="2">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="radio">
                                                            <input type="radio" name="f17_option_15_a" {{$isian_tracer->where('kode_form', '=', 'f17a_15')->first()->value==3 ? "checked" : "" }} class="flat-red" value="3">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="radio">
                                                            <input type="radio" name="f17_option_15_a" {{$isian_tracer->where('kode_form', '=', 'f17a_15')->first()->value==4 ? "checked" : "" }} class="flat-red" value="4">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="radio">
                                                            <input type="radio" name="f17_option_15_a" {{$isian_tracer->where('kode_form', '=', 'f17a_15')->first()->value==5 ? "checked" : "" }} class="flat-red" value="5">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="radio">
                                                            <input type="radio" name="f17_option_15_b" {{$isian_tracer->where('kode_form', '=', 'f17b_15')->first()->value==1 ? "checked" : "" }} class="flat-red" value="1">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="radio">
                                                            <input type="radio" name="f17_option_15_b" {{$isian_tracer->where('kode_form', '=', 'f17b_15')->first()->value==2 ? "checked" : "" }} class="flat-red" value="2">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="radio">
                                                            <input type="radio" name="f17_option_15_b" {{$isian_tracer->where('kode_form', '=', 'f17b_15')->first()->value==3 ? "checked" : "" }} class="flat-red" value="3">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="radio">
                                                            <input type="radio" name="f17_option_15_b" {{$isian_tracer->where('kode_form', '=', 'f17b_15')->first()->value==4 ? "checked" : "" }} class="flat-red" value="4">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="radio">
                                                            <input type="radio" name="f17_option_15_b" {{$isian_tracer->where('kode_form', '=', 'f17b_15')->first()->value==5 ? "checked" : "" }} class="flat-red" value="5">
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>16</td>
                                                    <td>Kemampuan dalam memecahkan masalah</td>

                                                    <td>
                                                        <div class="radio">
                                                            <input type="radio" name="f17_option_16_a" {{$isian_tracer->where('kode_form', '=', 'f17a_16')->first()->value==1 ? "checked" : "" }} class="flat-red" value="1">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="radio">
                                                            <input type="radio" name="f17_option_16_a" {{$isian_tracer->where('kode_form', '=', 'f17a_16')->first()->value==2 ? "checked" : "" }} class="flat-red" value="2">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="radio">
                                                            <input type="radio" name="f17_option_16_a" {{$isian_tracer->where('kode_form', '=', 'f17a_16')->first()->value==3 ? "checked" : "" }} class="flat-red" value="3">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="radio">
                                                            <input type="radio" name="f17_option_16_a" {{$isian_tracer->where('kode_form', '=', 'f17a_16')->first()->value==4 ? "checked" : "" }} class="flat-red" value="4">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="radio">
                                                            <input type="radio" name="f17_option_16_a" {{$isian_tracer->where('kode_form', '=', 'f17a_16')->first()->value==5 ? "checked" : "" }} class="flat-red" value="5">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="radio">
                                                            <input type="radio" name="f17_option_16_b" {{$isian_tracer->where('kode_form', '=', 'f17b_16')->first()->value==1 ? "checked" : "" }} class="flat-red" value="1">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="radio">
                                                            <input type="radio" name="f17_option_16_b" {{$isian_tracer->where('kode_form', '=', 'f17b_16')->first()->value==2 ? "checked" : "" }} class="flat-red" value="2">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="radio">
                                                            <input type="radio" name="f17_option_16_b" {{$isian_tracer->where('kode_form', '=', 'f17b_16')->first()->value==3 ? "checked" : "" }} class="flat-red" value="3">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="radio">
                                                            <input type="radio" name="f17_option_16_b" {{$isian_tracer->where('kode_form', '=', 'f17b_16')->first()->value==4 ? "checked" : "" }} class="flat-red" value="4">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="radio">
                                                            <input type="radio" name="f17_option_16_b" {{$isian_tracer->where('kode_form', '=', 'f17b_16')->first()->value==5 ? "checked" : "" }} class="flat-red" value="5">
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>17</td>
                                                    <td>Negosiasi</td>

                                                    <td>
                                                        <div class="radio">
                                                            <input type="radio" name="f17_option_17_a" {{$isian_tracer->where('kode_form', '=', 'f17a_17')->first()->value==1 ? "checked" : "" }} class="flat-red" value="1">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="radio">
                                                            <input type="radio" name="f17_option_17_a" {{$isian_tracer->where('kode_form', '=', 'f17a_17')->first()->value==2 ? "checked" : "" }}  class="flat-red" value="2">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="radio">
                                                            <input type="radio" name="f17_option_17_a" {{$isian_tracer->where('kode_form', '=', 'f17a_17')->first()->value==3 ? "checked" : "" }} class="flat-red" value="3">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="radio">
                                                            <input type="radio" name="f17_option_17_a" {{$isian_tracer->where('kode_form', '=', 'f17a_17')->first()->value==4 ? "checked" : "" }} class="flat-red" value="4">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="radio">
                                                            <input type="radio" name="f17_option_17_a" {{$isian_tracer->where('kode_form', '=', 'f17a_17')->first()->value==5 ? "checked" : "" }} class="flat-red" value="5">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="radio">
                                                            <input type="radio" name="f17_option_17_b" {{$isian_tracer->where('kode_form', '=', 'f17b_17')->first()->value==1 ? "checked" : "" }} class="flat-red" value="1">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="radio">
                                                            <input type="radio" name="f17_option_17_b" {{$isian_tracer->where('kode_form', '=', 'f17b_17')->first()->value==2 ? "checked" : "" }} class="flat-red" value="2">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="radio">
                                                            <input type="radio" name="f17_option_17_b" {{$isian_tracer->where('kode_form', '=', 'f17b_17')->first()->value==3 ? "checked" : "" }} class="flat-red" value="3">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="radio">
                                                            <input type="radio" name="f17_option_17_b" {{$isian_tracer->where('kode_form', '=', 'f17b_17')->first()->value==4 ? "checked" : "" }} class="flat-red" value="4">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="radio">
                                                            <input type="radio" name="f17_option_17_b" {{$isian_tracer->where('kode_form', '=', 'f17b_17')->first()->value==5 ? "checked" : "" }} class="flat-red" value="5">
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>18</td>
                                                    <td>Kemampuan analisis</td>

                                                    <td>
                                                        <div class="radio">
                                                            <input type="radio" name="f17_option_18_a" {{$isian_tracer->where('kode_form', '=', 'f17a_18')->first()->value==1 ? "checked" : "" }} class="flat-red" value="1">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="radio">
                                                            <input type="radio" name="f17_option_18_a" {{$isian_tracer->where('kode_form', '=', 'f17a_18')->first()->value==2 ? "checked" : "" }} class="flat-red" value="2">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="radio">
                                                            <input type="radio" name="f17_option_18_a" {{$isian_tracer->where('kode_form', '=', 'f17a_18')->first()->value==3 ? "checked" : "" }} class="flat-red" value="3">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="radio">
                                                            <input type="radio" name="f17_option_18_a" {{$isian_tracer->where('kode_form', '=', 'f17a_18')->first()->value==4 ? "checked" : "" }} class="flat-red" value="4">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="radio">
                                                            <input type="radio" name="f17_option_18_a" {{$isian_tracer->where('kode_form', '=', 'f17a_18')->first()->value==5 ? "checked" : "" }} class="flat-red" value="5">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="radio">
                                                            <input type="radio" name="f17_option_18_b" {{$isian_tracer->where('kode_form', '=', 'f17b_18')->first()->value==1 ? "checked" : "" }} class="flat-red" value="1">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="radio">
                                                            <input type="radio" name="f17_option_18_b" {{$isian_tracer->where('kode_form', '=', 'f17b_18')->first()->value==2 ? "checked" : "" }}  class="flat-red" value="2">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="radio">
                                                            <input type="radio" name="f17_option_18_b" {{$isian_tracer->where('kode_form', '=', 'f17b_18')->first()->value==3 ? "checked" : "" }} class="flat-red" value="3">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="radio">
                                                            <input type="radio" name="f17_option_18_b" {{$isian_tracer->where('kode_form', '=', 'f17b_18')->first()->value==4 ? "checked" : "" }} class="flat-red" value="4">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="radio">
                                                            <input type="radio" name="f17_option_18_b" {{$isian_tracer->where('kode_form', '=', 'f17b_18')->first()->value==5 ? "checked" : "" }} class="flat-red" value="5">
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>19</td>
                                                    <td>Toleransi</td>

                                                    <td>
                                                        <div class="radio">
                                                            <input type="radio" name="f17_option_19_a" {{$isian_tracer->where('kode_form', '=', 'f17a_19')->first()->value==1 ? "checked" : "" }} class="flat-red" value="1">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="radio">
                                                            <input type="radio" name="f17_option_19_a" {{$isian_tracer->where('kode_form', '=', 'f17a_19')->first()->value==2 ? "checked" : "" }} class="flat-red" value="2">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="radio">
                                                            <input type="radio" name="f17_option_19_a" {{$isian_tracer->where('kode_form', '=', 'f17a_19')->first()->value==3 ? "checked" : "" }} class="flat-red" value="3">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="radio">
                                                            <input type="radio" name="f17_option_19_a" {{$isian_tracer->where('kode_form', '=', 'f17a_19')->first()->value==4 ? "checked" : "" }} class="flat-red" value="4">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="radio">
                                                            <input type="radio" name="f17_option_19_a" {{$isian_tracer->where('kode_form', '=', 'f17a_19')->first()->value==5 ? "checked" : "" }} class="flat-red" value="5">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="radio">
                                                            <input type="radio" name="f17_option_19_b" {{$isian_tracer->where('kode_form', '=', 'f17b_19')->first()->value==1 ? "checked" : "" }} class="flat-red" value="1">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="radio">
                                                            <input type="radio" name="f17_option_19_b" {{$isian_tracer->where('kode_form', '=', 'f17b_19')->first()->value==2 ? "checked" : "" }} class="flat-red" value="2">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="radio">
                                                            <input type="radio" name="f17_option_19_b" {{$isian_tracer->where('kode_form', '=', 'f17b_19')->first()->value==3 ? "checked" : "" }} class="flat-red" value="3">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="radio">
                                                            <input type="radio" name="f17_option_19_b" {{$isian_tracer->where('kode_form', '=', 'f17b_19')->first()->value==4 ? "checked" : "" }} class="flat-red" value="4">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="radio">
                                                            <input type="radio" name="f17_option_19_b" {{$isian_tracer->where('kode_form', '=', 'f17b_19')->first()->value==5 ? "checked" : "" }} class="flat-red" value="5">
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>20</td>
                                                    <td>Kemampuan adaptasi</td>

                                                    <td>
                                                        <div class="radio">
                                                            <input type="radio" name="f17_option_20_a" {{$isian_tracer->where('kode_form', '=', 'f17a_20')->first()->value==1 ? "checked" : "" }} class="flat-red" value="1">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="radio">
                                                            <input type="radio" name="f17_option_20_a" {{$isian_tracer->where('kode_form', '=', 'f17a_20')->first()->value==2 ? "checked" : "" }} class="flat-red" value="2">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="radio">
                                                            <input type="radio" name="f17_option_20_a" {{$isian_tracer->where('kode_form', '=', 'f17a_20')->first()->value==3 ? "checked" : "" }} class="flat-red" value="3">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="radio">
                                                            <input type="radio" name="f17_option_20_a" {{$isian_tracer->where('kode_form', '=', 'f17a_20')->first()->value==4 ? "checked" : "" }} class="flat-red" value="4">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="radio">
                                                            <input type="radio" name="f17_option_20_a" {{$isian_tracer->where('kode_form', '=', 'f17a_20')->first()->value==5 ? "checked" : "" }} class="flat-red" value="5">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="radio">
                                                            <input type="radio" name="f17_option_20_b" {{$isian_tracer->where('kode_form', '=', 'f17b_20')->first()->value==1 ? "checked" : "" }} class="flat-red" value="1">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="radio">
                                                            <input type="radio" name="f17_option_20_b" {{$isian_tracer->where('kode_form', '=', 'f17b_20')->first()->value==2 ? "checked" : "" }} class="flat-red" value="2">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="radio">
                                                            <input type="radio" name="f17_option_20_b" {{$isian_tracer->where('kode_form', '=', 'f17b_20')->first()->value==3 ? "checked" : "" }} class="flat-red" value="3">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="radio">
                                                            <input type="radio" name="f17_option_20_b" {{$isian_tracer->where('kode_form', '=', 'f17b_20')->first()->value==4 ? "checked" : "" }} class="flat-red" value="4">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="radio">
                                                            <input type="radio" name="f17_option_20_b" {{$isian_tracer->where('kode_form', '=', 'f17b_20')->first()->value==5 ? "checked" : "" }} class="flat-red" value="5">
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>21</td>
                                                    <td>Loyalitas</td>

                                                    <td>
                                                        <div class="radio">
                                                            <input type="radio" name="f17_option_21_a" {{$isian_tracer->where('kode_form', '=', 'f17a_21')->first()->value==1 ? "checked" : "" }} class="flat-red" value="1">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="radio">
                                                            <input type="radio" name="f17_option_21_a" {{$isian_tracer->where('kode_form', '=', 'f17a_21')->first()->value==2 ? "checked" : "" }} class="flat-red" value="2">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="radio">
                                                            <input type="radio" name="f17_option_21_a" {{$isian_tracer->where('kode_form', '=', 'f17a_21')->first()->value==3 ? "checked" : "" }} class="flat-red" value="3">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="radio">
                                                            <input type="radio" name="f17_option_21_a" {{$isian_tracer->where('kode_form', '=', 'f17a_21')->first()->value==4 ? "checked" : "" }} class="flat-red" value="4">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="radio">
                                                            <input type="radio" name="f17_option_21_a" {{$isian_tracer->where('kode_form', '=', 'f17a_21')->first()->value==5 ? "checked" : "" }} class="flat-red" value="5">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="radio">
                                                            <input type="radio" name="f17_option_21_b" {{$isian_tracer->where('kode_form', '=', 'f17b_21')->first()->value==1 ? "checked" : "" }} class="flat-red" value="1">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="radio">
                                                            <input type="radio" name="f17_option_21_b" {{$isian_tracer->where('kode_form', '=', 'f17b_21')->first()->value==2 ? "checked" : "" }} class="flat-red" value="2">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="radio">
                                                            <input type="radio" name="f17_option_21_b" {{$isian_tracer->where('kode_form', '=', 'f17b_21')->first()->value==3 ? "checked" : "" }} class="flat-red" value="3">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="radio">
                                                            <input type="radio" name="f17_option_21_b" {{$isian_tracer->where('kode_form', '=', 'f17b_21')->first()->value==4 ? "checked" : "" }} class="flat-red" value="4">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="radio">
                                                            <input type="radio" name="f17_option_21_b" {{$isian_tracer->where('kode_form', '=', 'f17b_21')->first()->value==5 ? "checked" : "" }} class="flat-red" value="5">
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>22</td>
                                                    <td>Integritas</td>

                                                    <td>
                                                        <div class="radio">
                                                            <input type="radio" name="f17_option_22_a" {{$isian_tracer->where('kode_form', '=', 'f17a_22')->first()->value==1 ? "checked" : "" }} class="flat-red" value="1">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="radio">
                                                            <input type="radio" name="f17_option_22_a" {{$isian_tracer->where('kode_form', '=', 'f17a_22')->first()->value==2 ? "checked" : "" }} class="flat-red" value="2">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="radio">
                                                            <input type="radio" name="f17_option_22_a" {{$isian_tracer->where('kode_form', '=', 'f17a_22')->first()->value==3 ? "checked" : "" }} class="flat-red" value="3">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="radio">
                                                            <input type="radio" name="f17_option_22_a" {{$isian_tracer->where('kode_form', '=', 'f17a_22')->first()->value==4 ? "checked" : "" }} class="flat-red" value="4">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="radio">
                                                            <input type="radio" name="f17_option_22_a" {{$isian_tracer->where('kode_form', '=', 'f17a_22')->first()->value==5 ? "checked" : "" }} class="flat-red" value="5">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="radio">
                                                            <input type="radio" name="f17_option_22_b" {{$isian_tracer->where('kode_form', '=', 'f17b_22')->first()->value==1 ? "checked" : "" }} class="flat-red" value="1">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="radio">
                                                            <input type="radio" name="f17_option_22_b" {{$isian_tracer->where('kode_form', '=', 'f17b_22')->first()->value==2 ? "checked" : "" }} class="flat-red" value="2">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="radio">
                                                            <input type="radio" name="f17_option_22_b" {{$isian_tracer->where('kode_form', '=', 'f17b_22')->first()->value==3 ? "checked" : "" }} class="flat-red" value="3">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="radio">
                                                            <input type="radio" name="f17_option_22_b" {{$isian_tracer->where('kode_form', '=', 'f17b_22')->first()->value==4 ? "checked" : "" }} class="flat-red" value="4">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="radio">
                                                            <input type="radio" name="f17_option_22_b" {{$isian_tracer->where('kode_form', '=', 'f17b_22')->first()->value==5 ? "checked" : "" }} class="flat-red" value="5">
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>23</td>
                                                    <td>Bekerja dengan orang yang berbeda budaya maupun latar belakang</td>

                                                    <td>
                                                        <div class="radio">
                                                            <input type="radio" name="f17_option_23_a" {{$isian_tracer->where('kode_form', '=', 'f17a_23')->first()->value==1 ? "checked" : "" }} class="flat-red" value="1">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="radio">
                                                            <input type="radio" name="f17_option_23_a" {{$isian_tracer->where('kode_form', '=', 'f17a_23')->first()->value==2 ? "checked" : "" }} class="flat-red" value="2">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="radio">
                                                            <input type="radio" name="f17_option_23_a" {{$isian_tracer->where('kode_form', '=', 'f17a_23')->first()->value==3 ? "checked" : "" }} class="flat-red" value="3">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="radio">
                                                            <input type="radio" name="f17_option_23_a" {{$isian_tracer->where('kode_form', '=', 'f17a_23')->first()->value==4 ? "checked" : "" }} class="flat-red" value="4">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="radio">
                                                            <input type="radio" name="f17_option_23_a" {{$isian_tracer->where('kode_form', '=', 'f17a_23')->first()->value==5 ? "checked" : "" }} class="flat-red" value="5">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="radio">
                                                            <input type="radio" name="f17_option_23_b" {{$isian_tracer->where('kode_form', '=', 'f17b_23')->first()->value==1 ? "checked" : "" }} class="flat-red" value="1">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="radio">
                                                            <input type="radio" name="f17_option_23_b" {{$isian_tracer->where('kode_form', '=', 'f17b_23')->first()->value==2 ? "checked" : "" }} class="flat-red" value="2">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="radio">
                                                            <input type="radio" name="f17_option_23_b" {{$isian_tracer->where('kode_form', '=', 'f17b_23')->first()->value==3 ? "checked" : "" }} class="flat-red" value="3">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="radio">
                                                            <input type="radio" name="f17_option_23_b" {{$isian_tracer->where('kode_form', '=', 'f17b_23')->first()->value==4 ? "checked" : "" }} class="flat-red" value="4">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="radio">
                                                            <input type="radio" name="f17_option_23_b" {{$isian_tracer->where('kode_form', '=', 'f17b_23')->first()->value==5 ? "checked" : "" }} class="flat-red" value="5">
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>24</td>
                                                    <td>Kepemimpinan</td>

                                                    <td>
                                                        <div class="radio">
                                                            <input type="radio" name="f17_option_24_a" {{$isian_tracer->where('kode_form', '=', 'f17a_24')->first()->value==1 ? "checked" : "" }} class="flat-red" value="1">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="radio">
                                                            <input type="radio" name="f17_option_24_a" {{$isian_tracer->where('kode_form', '=', 'f17a_24')->first()->value==2 ? "checked" : "" }} class="flat-red" value="2">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="radio">
                                                            <input type="radio" name="f17_option_24_a" {{$isian_tracer->where('kode_form', '=', 'f17a_24')->first()->value==3 ? "checked" : "" }} class="flat-red" value="3">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="radio">
                                                            <input type="radio" name="f17_option_24_a" {{$isian_tracer->where('kode_form', '=', 'f17a_24')->first()->value==4 ? "checked" : "" }} class="flat-red" value="4">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="radio">
                                                            <input type="radio" name="f17_option_24_a" {{$isian_tracer->where('kode_form', '=', 'f17a_24')->first()->value==5 ? "checked" : "" }} class="flat-red" value="5">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="radio">
                                                            <input type="radio" name="f17_option_24_b" {{$isian_tracer->where('kode_form', '=', 'f17b_24')->first()->value==1 ? "checked" : "" }} class="flat-red" value="1">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="radio">
                                                            <input type="radio" name="f17_option_24_b" {{$isian_tracer->where('kode_form', '=', 'f17b_24')->first()->value==2 ? "checked" : "" }} class="flat-red" value="2">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="radio">
                                                            <input type="radio" name="f17_option_24_b" {{$isian_tracer->where('kode_form', '=', 'f17b_24')->first()->value==3 ? "checked" : "" }} class="flat-red" value="3">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="radio">
                                                            <input type="radio" name="f17_option_24_b" {{$isian_tracer->where('kode_form', '=', 'f17b_24')->first()->value==4 ? "checked" : "" }} class="flat-red" value="4">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="radio">
                                                            <input type="radio" name="f17_option_24_b" {{$isian_tracer->where('kode_form', '=', 'f17b_24')->first()->value==5 ? "checked" : "" }} class="flat-red" value="5">
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>25</td>
                                                    <td>Kemampuan dalam memegang tanggungjawab</td>

                                                    <td>
                                                        <div class="radio">
                                                            <input type="radio" name="f17_option_25_a" {{$isian_tracer->where('kode_form', '=', 'f17a_25')->first()->value==1 ? "checked" : "" }} class="flat-red" value="1">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="radio">
                                                            <input type="radio" name="f17_option_25_a" {{$isian_tracer->where('kode_form', '=', 'f17a_25')->first()->value==2 ? "checked" : "" }} class="flat-red" value="2">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="radio">
                                                            <input type="radio" name="f17_option_25_a" {{$isian_tracer->where('kode_form', '=', 'f17a_25')->first()->value==3 ? "checked" : "" }} class="flat-red" value="3">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="radio">
                                                            <input type="radio" name="f17_option_25_a" {{$isian_tracer->where('kode_form', '=', 'f17a_25')->first()->value==4 ? "checked" : "" }} class="flat-red" value="4">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="radio">
                                                            <input type="radio" name="f17_option_25_a" {{$isian_tracer->where('kode_form', '=', 'f17a_25')->first()->value==5 ? "checked" : "" }} class="flat-red" value="5">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="radio">
                                                            <input type="radio" name="f17_option_25_b" {{$isian_tracer->where('kode_form', '=', 'f17b_25')->first()->value==1 ? "checked" : "" }} class="flat-red" value="1">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="radio">
                                                            <input type="radio" name="f17_option_25_b" {{$isian_tracer->where('kode_form', '=', 'f17b_25')->first()->value==2 ? "checked" : "" }} class="flat-red" value="2">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="radio">
                                                            <input type="radio" name="f17_option_25_b" {{$isian_tracer->where('kode_form', '=', 'f17b_25')->first()->value==3 ? "checked" : "" }} class="flat-red" value="3">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="radio">
                                                            <input type="radio" name="f17_option_25_b" {{$isian_tracer->where('kode_form', '=', 'f17b_25')->first()->value==4 ? "checked" : "" }} class="flat-red" value="4">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="radio">
                                                            <input type="radio" name="f17_option_25_b" {{$isian_tracer->where('kode_form', '=', 'f17b_25')->first()->value==5 ? "checked" : "" }} class="flat-red" value="5">
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>26</td>
                                                    <td>Inisiatif</td>

                                                    <td>
                                                        <div class="radio">
                                                            <input type="radio" name="f17_option_26_a" {{$isian_tracer->where('kode_form', '=', 'f17a_26')->first()->value==1 ? "checked" : "" }} class="flat-red" value="1">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="radio">
                                                            <input type="radio" name="f17_option_26_a" {{$isian_tracer->where('kode_form', '=', 'f17a_26')->first()->value==2 ? "checked" : "" }} class="flat-red" value="2">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="radio">
                                                            <input type="radio" name="f17_option_26_a" {{$isian_tracer->where('kode_form', '=', 'f17a_26')->first()->value==3 ? "checked" : "" }} class="flat-red" value="3">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="radio">
                                                            <input type="radio" name="f17_option_26_a" {{$isian_tracer->where('kode_form', '=', 'f17a_26')->first()->value==4 ? "checked" : "" }} class="flat-red" value="4">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="radio">
                                                            <input type="radio" name="f17_option_26_a" {{$isian_tracer->where('kode_form', '=', 'f17a_26')->first()->value==5 ? "checked" : "" }} class="flat-red" value="5">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="radio">
                                                            <input type="radio" name="f17_option_26_b" {{$isian_tracer->where('kode_form', '=', 'f17b_26')->first()->value==1 ? "checked" : "" }} class="flat-red" value="1">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="radio">
                                                            <input type="radio" name="f17_option_26_b" {{$isian_tracer->where('kode_form', '=', 'f17b_26')->first()->value==2 ? "checked" : "" }} class="flat-red" value="2">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="radio">
                                                            <input type="radio" name="f17_option_26_b" {{$isian_tracer->where('kode_form', '=', 'f17b_26')->first()->value==3 ? "checked" : "" }} class="flat-red" value="3">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="radio">
                                                            <input type="radio" name="f17_option_26_b" {{$isian_tracer->where('kode_form', '=', 'f17b_26')->first()->value==4 ? "checked" : "" }} class="flat-red" value="4">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="radio">
                                                            <input type="radio" name="f17_option_26_b" {{$isian_tracer->where('kode_form', '=', 'f17b_26')->first()->value==5 ? "checked" : "" }} class="flat-red" value="5">
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>27</td>
                                                    <td>Manajemen proyek/program</td>

                                                    <td>
                                                        <div class="radio">
                                                            <input type="radio" name="f17_option_27_a" {{$isian_tracer->where('kode_form', '=', 'f17a_27')->first()->value==1 ? "checked" : "" }} class="flat-red" value="1">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="radio">
                                                            <input type="radio" name="f17_option_27_a" {{$isian_tracer->where('kode_form', '=', 'f17a_27')->first()->value==2 ? "checked" : "" }} class="flat-red" value="2">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="radio">
                                                            <input type="radio" name="f17_option_27_a" {{$isian_tracer->where('kode_form', '=', 'f17a_27')->first()->value==3 ? "checked" : "" }} class="flat-red" value="3">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="radio">
                                                            <input type="radio" name="f17_option_27_a" {{$isian_tracer->where('kode_form', '=', 'f17a_27')->first()->value==4 ? "checked" : "" }} class="flat-red" value="4">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="radio">
                                                            <input type="radio" name="f17_option_27_a" {{$isian_tracer->where('kode_form', '=', 'f17a_27')->first()->value==5 ? "checked" : "" }} class="flat-red" value="5">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="radio">
                                                            <input type="radio" name="f17_option_27_b" {{$isian_tracer->where('kode_form', '=', 'f17b_27')->first()->value==1 ? "checked" : "" }} class="flat-red" value="1">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="radio">
                                                            <input type="radio" name="f17_option_27_b" {{$isian_tracer->where('kode_form', '=', 'f17b_27')->first()->value==2 ? "checked" : "" }} class="flat-red" value="2">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="radio">
                                                            <input type="radio" name="f17_option_27_b" {{$isian_tracer->where('kode_form', '=', 'f17b_27')->first()->value==3 ? "checked" : "" }} class="flat-red" value="3">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="radio">
                                                            <input type="radio" name="f17_option_27_b" {{$isian_tracer->where('kode_form', '=', 'f17b_27')->first()->value==4 ? "checked" : "" }} class="flat-red" value="4">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="radio">
                                                            <input type="radio" name="f17_option_27_b" {{$isian_tracer->where('kode_form', '=', 'f17b_27')->first()->value==5 ? "checked" : "" }} class="flat-red" value="5">
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>28</td>
                                                    <td>Kemampuan untuk memresentasikan ide/produk/laporan</td>

                                                    <td>
                                                        <div class="radio">
                                                            <input type="radio" name="f17_option_28_a" {{$isian_tracer->where('kode_form', '=', 'f17a_28')->first()->value==1 ? "checked" : "" }} class="flat-red" value="1">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="radio">
                                                            <input type="radio" name="f17_option_28_a" {{$isian_tracer->where('kode_form', '=', 'f17a_28')->first()->value==2 ? "checked" : "" }} class="flat-red" value="2">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="radio">
                                                            <input type="radio" name="f17_option_28_a" {{$isian_tracer->where('kode_form', '=', 'f17a_28')->first()->value==3 ? "checked" : "" }} class="flat-red" value="3">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="radio">
                                                            <input type="radio" name="f17_option_28_a" {{$isian_tracer->where('kode_form', '=', 'f17a_28')->first()->value==4 ? "checked" : "" }} class="flat-red" value="4">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="radio">
                                                            <input type="radio" name="f17_option_28_a" {{$isian_tracer->where('kode_form', '=', 'f17a_28')->first()->value==5 ? "checked" : "" }} class="flat-red" value="5">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="radio">
                                                            <input type="radio" name="f17_option_28_b" {{$isian_tracer->where('kode_form', '=', 'f17b_28')->first()->value==1 ? "checked" : "" }} class="flat-red" value="1">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="radio">
                                                            <input type="radio" name="f17_option_28_b" {{$isian_tracer->where('kode_form', '=', 'f17b_28')->first()->value==2 ? "checked" : "" }} class="flat-red" value="2">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="radio">
                                                            <input type="radio" name="f17_option_28_b" {{$isian_tracer->where('kode_form', '=', 'f17b_28')->first()->value==3 ? "checked" : "" }} class="flat-red" value="3">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="radio">
                                                            <input type="radio" name="f17_option_28_b" {{$isian_tracer->where('kode_form', '=', 'f17b_28')->first()->value==4 ? "checked" : "" }} class="flat-red" value="4">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="radio">
                                                            <input type="radio" name="f17_option_28_b" {{$isian_tracer->where('kode_form', '=', 'f17b_28')->first()->value==5 ? "checked" : "" }} class="flat-red" value="5">
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>29</td>
                                                    <td>Kemampuan dalam menulis laporan, memo dan dokumen</td>

                                                    <td>
                                                        <div class="radio">
                                                            <input type="radio" name="f17_option_29_a" {{$isian_tracer->where('kode_form', '=', 'f17a_29')->first()->value==1 ? "checked" : "" }} class="flat-red" value="1">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="radio">
                                                            <input type="radio" name="f17_option_29_a" {{$isian_tracer->where('kode_form', '=', 'f17a_29')->first()->value==2 ? "checked" : "" }} class="flat-red" value="2">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="radio">
                                                            <input type="radio" name="f17_option_29_a" {{$isian_tracer->where('kode_form', '=', 'f17a_29')->first()->value==3 ? "checked" : "" }} class="flat-red" value="3">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="radio">
                                                            <input type="radio" name="f17_option_29_a" {{$isian_tracer->where('kode_form', '=', 'f17a_29')->first()->value==4 ? "checked" : "" }} class="flat-red" value="4">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="radio">
                                                            <input type="radio" name="f17_option_29_a" {{$isian_tracer->where('kode_form', '=', 'f17a_29')->first()->value==5 ? "checked" : "" }} class="flat-red" value="5">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="radio">
                                                            <input type="radio" name="f17_option_29_b" {{$isian_tracer->where('kode_form', '=', 'f17b_29')->first()->value==1 ? "checked" : "" }} class="flat-red" value="1">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="radio">
                                                            <input type="radio" name="f17_option_29_b" {{$isian_tracer->where('kode_form', '=', 'f17b_29')->first()->value==2 ? "checked" : "" }} class="flat-red" value="2">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="radio">
                                                            <input type="radio" name="f17_option_29_b" {{$isian_tracer->where('kode_form', '=', 'f17b_29')->first()->value==3 ? "checked" : "" }} class="flat-red" value="3">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="radio">
                                                            <input type="radio" name="f17_option_29_b" {{$isian_tracer->where('kode_form', '=', 'f17b_29')->first()->value==4 ? "checked" : "" }} class="flat-red" value="4">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="radio">
                                                            <input type="radio" name="f17_option_29_b" {{$isian_tracer->where('kode_form', '=', 'f17b_29')->first()->value==5 ? "checked" : "" }} class="flat-red" value="5">
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>30</td>
                                                    <td>Kemampuan untuk terus belajar sepanjang hayat</td>

                                                    <td>
                                                        <div class="radio">
                                                            <input type="radio" name="f17_option_30_a" {{$isian_tracer->where('kode_form', '=', 'f17a_30')->first()->value==1 ? "checked" : "" }} class="flat-red" value="1">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="radio">
                                                            <input type="radio" name="f17_option_30_a" {{$isian_tracer->where('kode_form', '=', 'f17a_30')->first()->value==2 ? "checked" : "" }} class="flat-red" value="2">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="radio">
                                                            <input type="radio" name="f17_option_30_a" {{$isian_tracer->where('kode_form', '=', 'f17a_30')->first()->value==3 ? "checked" : "" }} class="flat-red" value="3">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="radio">
                                                            <input type="radio" name="f17_option_30_a" {{$isian_tracer->where('kode_form', '=', 'f17a_30')->first()->value==4 ? "checked" : "" }} class="flat-red" value="4">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="radio">
                                                            <input type="radio" name="f17_option_30_a" {{$isian_tracer->where('kode_form', '=', 'f17a_30')->first()->value==5 ? "checked" : "" }} class="flat-red" value="5">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="radio">
                                                            <input type="radio" name="f17_option_30_b" {{$isian_tracer->where('kode_form', '=', 'f17b_30')->first()->value==1 ? "checked" : "" }} class="flat-red" value="1">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="radio">
                                                            <input type="radio" name="f17_option_30_b" {{$isian_tracer->where('kode_form', '=', 'f17b_30')->first()->value==2 ? "checked" : "" }} class="flat-red" value="2">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="radio">
                                                            <input type="radio" name="f17_option_30_b" {{$isian_tracer->where('kode_form', '=', 'f17b_30')->first()->value==3 ? "checked" : "" }} class="flat-red" value="3">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="radio">
                                                            <input type="radio" name="f17_option_30_b" {{$isian_tracer->where('kode_form', '=', 'f17b_30')->first()->value==4 ? "checked" : "" }} class="flat-red" value="4">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="radio">
                                                            <input type="radio" name="f17_option_30_b" {{$isian_tracer->where('kode_form', '=', 'f17b_30')->first()->value==5 ? "checked" : "" }} class="flat-red" value="5">
                                                        </div>
                                                    </td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            @else
            <div class="col-md-12">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h4 class="panel-title">DATA TRACER</h4>
                    </div>
                    <div class="panel-body">
                        <center><h3>Data Isian Tracer Kosong</h3></center>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </section>
    <script>

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('.input-lainnya-f11').hide();
        $('select#f11_select_input').on('change', function(e){
            e.preventDefault();
            if($(this).val() == 5){
                $('.input-lainnya-f11').show();
            }else{
                $('.input-lainnya-f11').hide('slow', function(){

                    $('.input-lainnya-f11 > input').val('');

                });
            }
        });


        $('.select2').select2();

        $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
            checkboxClass: 'icheckbox_minimal-blue',
            radioClass: 'iradio_minimal-blue'
        });
        //Flat red color scheme for iCheck
        $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
            checkboxClass: 'icheckbox_flat-green',
            radioClass: 'iradio_flat-green'
        });
    </script>
@endsection