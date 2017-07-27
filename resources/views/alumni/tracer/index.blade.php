@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Tracer Study 
            <p><small>Isi Tracer</small></p>
            
        </h1>
        
    </section>

    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-info">
                    <div class="box-header">
                        <h3 class="box-title">Form Quesioner</h3>
                    </div>
                    <form action="{{url('/alumni/submit_form_tracer')}}" method="post">
                        {{ csrf_field() }}
                        <input type="hidden" name="id_alumni" value="{{$alumni->id}}">
                        <div class="box-body">
                            <table class='table'>
                                <tr class="bg-primary">
                                    <th colspan="3">Form Data Pengisi</th>
                                </tr>
                                
                                <tr>
                                    <td class="text-danger" style="vertical-align:middle;" width="10%">F1</td>
                                    <td width="20%" style="vertical-align:middle;">Kode PT</td>
                                    <td><input type="text" class="form-control" style="width:20%;" name="kode_pt" readonly value="{{$alumni->kode_kampus}}"></td>
                                </tr>
                                <tr>
                                    <td class="text-danger" style="vertical-align:middle;" width="10%"></td>
                                    <td width="20%" style="vertical-align:middle;">Kode Prodi</td>
                                    <td><input type="text" class="form-control" style="width:20%;" name="kode_prodi" readonly value="{{$alumni->jurusan}}"></td>
                                </tr>
                                <tr>
                                    <td class="text-danger" style="vertical-align:middle;" width="10%"></td>
                                    <td width="20%" style="vertical-align:middle;">Nama</td>
                                    <td><input type="text" class="form-control" style="width:30%;" name="nama" value="{{$alumni->nama_depan.' '.$alumni->nama_belakang}}" readonly></td>
                                </tr>
                                <tr>
                                    <td class="text-danger" style="vertical-align:middle;" width="10%"></td>
                                    <td width="20%" style="vertical-align:middle;">No. Telp/HP</td>
                                    <td><input type="text" class="form-control" style="width:30%;" name="no_hp" placeholder="Masukan No Telp. Anda" value="{{$alumni->no_hp}}" readonly></td>
                                </tr>
                                <tr>
                                    <td class="text-danger" style="vertical-align:middle;" width="10%"></td>
                                    <td width="20%" style="vertical-align:middle;">Email</td>
                                    <td><input type="text" class="form-control" style="width:30%;" name="email" placeholder="Email Anda yang masih aktif" readonly value="{{$alumni->email}}"></td>
                                </tr>
                            </table>

                            <br />
                            <table class='table'>
                                <tr class="bg-primary">
                                    <th colspan="3">Isian Data Quesioner</th>
                                </tr>
                                <tr>
                                    <td class="text-danger" style="vertical-align:top;" align="center" width="5%">F3</td>
                                    <td width="30%" style="vertical-align:top;">Kapan anda mulai mencari pekerjaan? <p>(Jika tidak sedang mencari kerja langsung ke pertanyaan f8)</p></td>
                                    <td>
                                        <div class="form-group{{ $errors->has('f3_input_text') ? ' has-error' : '' }}">
                                            <div class="col-md-2"><input type="number" name="f3_input_text" class="form-control"></div>
                                            <div class="col-md-10">
                                                <select name="f3_select_input" id="f3_select_input" class="form-control">
                                                    <option value="" disabled selected>Pilih Opsi</option>
                                                    <option value="1">Bulan Sebelum Lulus</option>
                                                    <option value="2">Bulan Sesudah Lulus</option>
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
                                                <input type="checkbox" class="flat-red" name="f4_check[1]" value="1">
                                                Melalui iklan di koran/majalah, brosur
                                                </label>
                                            </div>

                                            <div class="checkbox">
                                                <label>
                                                <input type="checkbox" class="flat-red" name="f4_check[2]" value="2">
                                                Melamar ke perusahaan tanpa mengetahui lowongan yang ada
                                                </label>
                                            </div>

                                            <div class="checkbox">
                                                <label>
                                                <input type="checkbox" class="flat-red" name="f4_check[3]" value="3">
                                                Pergi ke bursa/pameran kerja
                                                </label>
                                            </div>

                                            <div class="checkbox">
                                                <label>
                                                <input type="checkbox" class="flat-red" name="f4_check[4]" value="4">
                                                Mencari lewat internet/iklan online/milis
                                                </label>
                                            </div>
                                            <div class="checkbox">
                                                <label>
                                                <input type="checkbox" class="flat-red" name="f4_check[5]" value="5">
                                                Dihubungi oleh perusahaan
                                                </label>
                                            </div>

                                            <div class="checkbox">
                                                <label>
                                                <input type="checkbox" class="flat-red" name="f4_check[6]" value="6">
                                                Menghubungi Kemenakertrans
                                                </label>
                                            </div>

                                            <div class="checkbox">
                                                <label>
                                                <input type="checkbox" class="flat-red" name="f4_check[7]" value="7">
                                                Menghubungi agen tenaga kerja komersial/swasta
                                                </label>
                                            </div>

                                            <div class="checkbox">
                                                <label>
                                                <input type="checkbox" class="flat-red" name="f4_check[8]" value="8">
                                                Memeroleh informasi dari pusat/kantor pengembangan karir fakultas/universitas
                                                </label>
                                            </div>
                                            
                                            <div class="checkbox">
                                                <label>
                                                <input type="checkbox" class="flat-red" name="f4_check[9]" value="9">
                                                Menghubungi kantor kemahasiswaan/hubungan alumni
                                                </label>
                                            </div>
                                            
                                            <div class="checkbox">
                                                <label>
                                                <input type="checkbox" class="flat-red" name="f4_check[10]" value="10">
                                                Membangun jejaring (network) sejak masih kuliah
                                                </label>
                                            </div>
                                            
                                            <div class="checkbox">
                                                <label>
                                                <input type="checkbox" class="flat-red" name="f4_check[10]" value="10">
                                                Melalui relasi (misalnya dosen, orang tua, saudara, teman, dll.)
                                                </label>
                                            </div>

                                            <div class="checkbox">
                                                <label>
                                                <input type="checkbox" class="flat-red" name="f4_check[11]" value="11">
                                                Membangun bisnis sendiri
                                                </label>
                                            </div>

                                            <div class="checkbox">
                                                <label>
                                                <input type="checkbox" class="flat-red" name="f4_check[12]" value="12">
                                                Melalui penempatan kerja atau magang
                                                </label>
                                            </div>

                                            <div class="checkbox">
                                                <label>
                                                <input type="checkbox" class="flat-red" name="f4_check[13]" value="13">
                                                Bekerja di tempat yang sama dengan tempat kerja semasa kuliah
                                                </label>
                                            </div>

                                            <div class="checkbox">
                                                <label>
                                                <input type="checkbox" class="flat-red" name="f4_check[14]" value="14">
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
                                            <div class="col-md-2"><input type="number" name="f5_input_text" class="form-control"></div>
                                            <div class="col-md-10{{ $errors->has('f5_select_input') ? ' has-error' : '' }}">
                                                <select name="f5_select_input" id="f5_select_input" class="form-control">
                                                    <option value="" disabled selected>Pilih Opsi</option>
                                                    <option value="1">Bulan Sebelum Lulus</option>
                                                    <option value="2">Bulan Sesudah Lulus</option>
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
                                            <div class="col-md-2"><input type="number" name="f6_input_text" class="form-control"></div>
                                            <div class="col-md-10{{ $errors->has('f6_select_input') ? ' has-error' : '' }}">
                                                <select name="f6_select_input" id="f6_select_input" class="form-control">
                                                    <option value="" disabled selected>Pilih Opsi</option>
                                                    <option value="1">Perusahaan</option>
                                                    <option value="2">Instansi</option>
                                                    <option value="3">Institusi</option>
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
                                            <div class="col-md-2"><input type="number" name="f7_input_text" class="form-control"></div>
                                            <div class="col-md-10 {{ $errors->has('f7_select_input') ? ' has-error' : '' }}">
                                                <select name="f7_select_input" id="f7_select_input" class="form-control">
                                                    <option value="" disabled selected>Pilih Opsi</option>
                                                    <option value="1">Perusahaan</option>
                                                    <option value="2">Instansi</option>
                                                    <option value="3">Institusi</option>
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
                                            <div class="col-md-2"><input type="number" name="f7a_input_text" class="form-control"></div>
                                            <div class="col-md-10 {{ $errors->has('f7a_select_input') ? ' has-error' : '' }}">
                                                <select name="f7a_select_input" id="f7a_select_input" class="form-control">
                                                    <option value="" disabled selected>Pilih Opsi</option>
                                                    <option value="1">Perusahaan</option>
                                                    <option value="2">Instansi</option>
                                                    <option value="3">Institusi</option>
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
                                                <input type="radio" name="f8_radio_input" class="flat-red" id="optionsRadios1" value="1" checked>
                                                Ya
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <label>
                                                <input type="radio" name="f8_radio_input" class="flat-red" id="optionsRadios2" value="0">
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
                                                <input type="checkbox" class="flat-red" name="f9_checkbox_input[1]" value="1">
                                                Saya masih belajar/melanjutkan kuliah profesi atau pascasarjana
                                                </label>
                                            </div>

                                            <div class="checkbox">
                                                <label>
                                                <input type="checkbox" class="flat-red" name="f9_checkbox_input[2]" value="2">
                                                Saya menikah
                                                </label>
                                            </div>

                                            <div class="checkbox">
                                                <label>
                                                <input type="checkbox" class="flat-red" name="f9_checkbox_input[3]" value="3">
                                                Saya sibuk dengan keluarga dan anak-anak
                                                </label>
                                            </div>

                                            <div class="checkbox">
                                                <label>
                                                <input type="checkbox" class="flat-red" name="f9_checkbox_input[4]" value="4">
                                                Saya sekarang sedang mencari pekerjaan
                                                </label>
                                            </div>

                                            <div class="checkbox">
                                                <label>
                                                <input type="checkbox" class="flat-red" name="f9_checkbox_input[4]" value="4">
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
                                                <select name="f10_select_input" id="f10_select_input" class="form-control">
                                                    <option value="" disabled selected>Pilih Opsi</option>
                                                    <option value="1">Tidak</option>
                                                    <option value="2">Tidak, tapi saya sedang menunggu hasil lamaran kerja</option>
                                                    <option value="3">Ya, saya akan mulai bekerja dalam 2 minggu ke depan</option>
                                                    <option value="4">Ya, tapi saya belum pasti akan bekerja dalam 2 minggu ke depan</option>
                                                    <option value="5">Lainnya</option>
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
                                                <select name="f11_select_input" id="f11_select_input" class="form-control">
                                                    <option value="" disabled selected>Pilih Opsi</option>
                                                    <option value="1">Instansi pemerintah (termasuk BUMN)</option>
                                                    <option value="2">Organisasi non-profit/Lembaga Swadaya Masyarakat</option>
                                                    <option value="3">Perusahaan swasta</option>
                                                    <option value="4">Wiraswasta/perusahaan sendiri</option>
                                                    <option value="5">Lainnya, tuliskan:</option>
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
                                                <select name="f12_select_input" id="f12_select_input" class="form-control select2" style="width : 100%;">
                                                    <option value="" disabled selected>Pilih Opsi</option>
                                                    <option value="1">Pertanian tanaman, peternakan, perburuan dan kegiatan yang berhubungan dengan itu</option>
                                                    <option value="2">Kehutanan dan penebangan kayu</option>
                                                    <option value="3">Perikanan </option>
                                                    <option value="4">Pertambangan batu bara dan lignit</option>
                                                    <option value="5">Pertambangan minyak bumi dan gas alam dan panas bumi</option>
                                                    <option value="6">Pertambangan bijih logam</option>
                                                    <option value="7">Pertambangan dan penggalian lainnya</option>
                                                    <option value="8">Jasa pertambangan</option>
                                                    <option value="9">Industri makanan</option>
                                                    <option value="10">Industri minuman</option>
                                                    <option value="11">Industri pengolahan tembakau</option>
                                                    <option value="12">Industri tekstil</option>
                                                    <option value="13">Industri pakaian jadi</option>
                                                    <option value="14">Industri kulit, barang dari kulit dan alas kaki</option>
                                                    <option value="15">Industri kayu, barang dari kayu dan gabus (tidak termasuk furnitur) dan barang anyaman dari bambu, rotan dan sejenisnya</option>
                                                    <option value="16">Industri kertas dan barang dari kertas</option>
                                                    <option value="17">Industri pencetakan dan reproduksi media rekaman</option>
                                                    <option value="18">Industri produk dari batu bara dan pengilangan minyak bumi </option>
                                                    <option value="19">Industri bahan kimia dan barang dari bahan kimia</option>
                                                    <option value="20">Industri farmasi, produk obat kimia dan obat tradisional</option>
                                                    <option value="21">Industri karet, barang dari karet dan plastik</option>
                                                    <option value="22">Industri barang galian bukan logam</option>
                                                    <option value="23">Industri logam dasar</option>
                                                    <option value="24">Industri barang logam, bukan mesin dan peralatannya</option>
                                                    <option value="25">Industri komputer, barang elektronik dan optik</option>
                                                    <option value="27">Industri mesin dan perlengkapan ytdl</option>
                                                    <option value="28">Industri kendaraan bermotor, trailer dan semi trailer </option>
                                                    <option value="29">Industri alat angkutan lainnya</option>
                                                    <option value="30">Industri furnitur</option>
                                                    <option value="31">Industri pengolahan lainnya</option>
                                                    <option value="32">Jasa reparasi dan pemasangan mesin dan peralatan</option>
                                                    <option value="33">Pengadaan listrik, gas, uap/air panas dan udara dingin</option>
                                                    <option value="34">Pengadaan air</option>
                                                    <option value="35">Pengolahan limbah</option>
                                                    <option value="36">Pengolahan sampah dan daur ulang</option>
                                                    <option value="37">Jasa pembersihan dan pengelolaan sampah lainnya</option>
                                                    <option value="38">Konstruksi gedung</option>
                                                    <option value="39">Konstruksi bangunan sipil</option>
                                                    <option value="40">Konstruksi khusus</option>
                                                    <option value="41">Perdagangan, reparasi dan perawatan mobil dan sepeda motor</option>
                                                    <option value="42">Perdagangan besar, bukan mobil dan sepeda motor</option>
                                                    <option value="43">Perdagangan eceran, bukan mobil dan motor</option>
                                                    <option value="44">Angkutan darat dan angkutan melalui saluran pipa</option>
                                                    <option value="88">Angkutan Air</option>
                                                    <option value="45">Angkutan udara</option>
                                                    <option value="46">Pergudangan dan jasa penunjang angkutan</option>
                                                    <option value="47">Pos dan kurir</option>
                                                    <option value="48">Penyediaan akomodasi</option>
                                                    <option value="49">Penyediaan makanan dan minuman</option>
                                                    <option value="50">Penerbitan</option>                                                    
                                                    <option value="51">Produksi gambar bergerak, video dan program televisi, perekaman suara dan penerbitan musik</option>
                                                    <option value="52">Penyiaran dan pemrograman</option>
                                                    <option value="53">Telekomunikasi </option>
                                                    <option value="54">Kegiatan pemrograman, konsultasi komputer dan kegiatan yang berhubungan dengan itu</option>
                                                    <option value="55">Kegiatan jasa informasi</option>
                                                    <option value="56">Jasa keuangan, bukan asuransi dan dana pensiun</option>
                                                    <option value="57">Asuransi, reasuransi dan dana pensiun, bukan jaminan sosial wajib</option>
                                                    <option value="58">Jasa penunjang jasa keuangan, asuransi dan dana pensiun</option>
                                                    <option value="59">Real estate</option>
                                                    <option value="60">Jasa hukum dan akuntansi</option>
                                                    <option value="61">Kegiatan kantor pusat dan konsultasi manajemen</option>
                                                    <option value="62">Jasa arsitektur dan teknik sipil; analisis dan uji teknis</option>
                                                    <option value="63">Penelitian dan pengembangan ilmu pengetahuan</option>
                                                    <option value="64">Periklanan dan penelitian pasar</option>
                                                    <option value="65">Jasa profesional, ilmiah dan teknis lainnya</option>
                                                    <option value="66">Jasa kesehatan hewan</option>
                                                    <option value="67">Jasa persewaan dan sewa guna usaha tanpa hak opsi</option>
                                                    <option value="68">Jasa ketenagakerjaan</option>
                                                    <option value="69">Jasa agen perjalanan, penyelenggara tur dan jasa reservasi lainnya</option>
                                                    <option value="70">Jasa keamanan dan penyelidikan</option>
                                                    <option value="71">Jasa untuk gedung dan pertamanan</option>
                                                    <option value="72">Jasa administrasi kantor, jasa penunjang kantor dan jasa penunjang usaha lainnya</option>
                                                    <option value="73">Administrasi pemerintahan, pertahanan dan jaminan sosial wajib</option>
                                                    <option value="74">Jasa pendidikan</option>
                                                    <option value="75">Jasa kesehatan manusia</option>
                                                    <option value="76">Jasa kegiatan sosial di dalam panti </option>
                                                    <option value="77">Jasa kegiatan sosial di luar panti </option>
                                                    <option value="78">Kegiatan hiburan, kesenian dan kreativitas</option>
                                                    <option value="79">Perpustakaan, arsip, museum dan kegiatan kebudayaan lainnya</option>
                                                    <option value="80">Kegiatan perjudian dan pertaruhan</option>
                                                    <option value="81">Kegiatan olahraga dan rekreasi lainnya</option>
                                                    <option value="82">Kegiatan keanggotaan organisasi</option>
                                                    <option value="83">Jasa reparasi komputer dan barang keperluan pribadi dan perlengkapan rumah tangga </option>
                                                    <option value="84">Jasa perorangan lainnya</option>
                                                    <option value="85">Jasa perorangan yang melayani rumah tangga</option>
                                                    <option value="86">Kegiatan yang menghasilkan barang dan jasa oleh rumah tangga yang digunakan sendiri untuk memenuhi kebutuhan</option>
                                                    <option value="87">Kegiatan badan internasional dan badan ekstra internasional lainnya</option>
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
                                                <input type="number" class="form-control" name="f13_pekerjaan_utama" value="1" style="margin-bottom:10px; width:200px;">
                                            </div>
                                        </div>
                                        <div class="form-group{{ $errors->has('f13_pekerjaan_lembur') ? ' has-error' : '' }}">
                                            <label for="f13_pekerjaan_utama[1]"  class='col-md-3 control-label'>Dari Lembur dan Tips</label>
                                            <div class="col-md-9">
                                                <input type="number" class="form-control" name="f13_pekerjaan_lembur" value="2" style="margin-bottom:10px;width:200px;">
                                            </div>
                                        </div>
                                        <div class="form-group{{ $errors->has('f13_pekerjaan_lainnya') ? ' has-error' : '' }}" style="margin-bottom:10px;">
                                            <label for="f13_pekerjaan_utama[2]"  class='col-md-3 control-label'>Dari Pekerjaan Lainnya</label>
                                            <div class="col-md-9">
                                                <input type="number" class="form-control" name="f13_pekerjaan_lainnya" value="3" style="margin-bottom:10px;width:200px;">
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
                                                <select name="f14_select_input" id="f14_select_input" class="form-control">
                                                    <option value="" disabled selected>Pilih Opsi</option>
                                                    <option value="1">Sangat Erat</option>
                                                    <option value="2">Erat</option>
                                                    <option value="3">Cukup Erat</option>
                                                    <option value="4">Kurang Erat</option>
                                                    <option value="5">Tidak Sama Sekali </option>
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
                                                <select name="f15_select_input" id="f15_select_input" class="form-control">
                                                    <option value="" disabled selected>Pilih Opsi</option>
                                                    <option value="1">Setingkat Lebih Tinggi</option>
                                                    <option value="2">Tingkat yang Sama</option>
                                                    <option value="3">Setingkat Lebih Rendah</option>
                                                    <option value="4">Tidak Perlu Pendidikan Tinggi</option>
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
                                                <input type="checkbox" class="flat-red" name="f16_checkbox_input[1]" value="1">
                                                Pertanyaan tidak sesuai; pekerjaan saya sekarang sudah sesuai dengan pendidikan saya
                                                </label>
                                            </div>

                                            <div class="checkbox">
                                                <label>
                                                <input type="checkbox" class="flat-red" name="f16_checkbox_input[2]" value="2">
                                                Saya belum mendapatkan pekerjaan yang lebih sesuai
                                                </label>
                                            </div>

                                            <div class="checkbox">
                                                <label>
                                                <input type="checkbox" class="flat-red" name="f16_checkbox_input[3]" value="3">
                                                Di pekerjaan ini saya memeroleh prospek karir yang baik
                                                </label>
                                            </div>

                                            <div class="checkbox">
                                                <label>
                                                <input type="checkbox" class="flat-red" name="f16_checkbox_input[4]" value="4">
                                                Saya lebih suka bekerja di area pekerjaan yang tidak ada hubungannya dengan pendidikan saya
                                                </label>
                                            </div>

                                            <div class="checkbox">
                                                <label>
                                                <input type="checkbox" class="flat-red" name="f16_checkbox_input[5]" value="5">
                                                Saya dipromosikan ke posisi yang kurang berhubungan dengan pendidikan saya dibanding posisi sebelumnya
                                                </label>
                                            </div>

                                            <div class="checkbox">
                                                <label>
                                                <input type="checkbox" class="flat-red" name="f16_checkbox_input[6]" value="6">
                                                Saya dapat memeroleh pendapatan yang lebih tinggi di pekerjaan ini
                                                </label>
                                            </div>

                                            <div class="checkbox">
                                                <label>
                                                <input type="checkbox" class="flat-red" name="f16_checkbox_input[7]" value="7">
                                                Pekerjaan saya saat ini lebih aman/terjamin/secure
                                                </label>
                                            </div>

                                            <div class="checkbox">
                                                <label>
                                                <input type="checkbox" class="flat-red" name="f16_checkbox_input[8]" value="8">
                                                Pekerjaan saya saat ini lebih menarik
                                                </label>
                                            </div>

                                            <div class="checkbox">
                                                <label>
                                                <input type="checkbox" class="flat-red" name="f16_checkbox_input[9]" value="8">
                                                Pekerjaan saya saat ini lebih memungkinkan saya mengambil pekerjaan tambahan/jadwal yang fleksibel, dll
                                                </label>
                                            </div>

                                            <div class="checkbox">
                                                <label>
                                                <input type="checkbox" class="flat-red" name="f16_checkbox_input[10]" value="10">
                                                Pekerjaan saya saat ini lokasinya lebih dekat dari rumah saya
                                                </label>
                                            </div>

                                            <div class="checkbox">
                                                <label>
                                                <input type="checkbox" class="flat-red" name="f16_checkbox_input[11]" value="11">
                                                Pekerjaan saya saat ini dapat lebih menjamin kebutuhan keluarga saya
                                                </label>
                                            </div>

                                            <div class="checkbox">
                                                <label>
                                                <input type="checkbox" class="flat-red" name="f16_checkbox_input[12]" value="12">
                                                Pada awal meniti karir ini, saya harus menerima pekerjaan yang tidak berhubungan dengan pendidikan saya
                                                </label>
                                            </div>

                                            <div class="checkbox">
                                                <label>
                                                <input type="checkbox" class="flat-red" name="f16_checkbox_input[13]" value="13">
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
                                                                <input type="radio" name="f17_option_1_a" class="flat-red" value="1">                                                                
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="radio">
                                                                <input type="radio" name="f17_option_1_a" class="flat-red" value="2">                                                                
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="radio">
                                                                <input type="radio" name="f17_option_1_a" class="flat-red" value="3">                                                                
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="radio">
                                                                <input type="radio" name="f17_option_1_a" class="flat-red" value="4">                                                                
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="radio">
                                                                <input type="radio" name="f17_option_1_a" class="flat-red" value="5">                                                                
                                                            </div>
                                                        </td>
                                                        </div>
                                                        <div class="form-group">
                                                        <td>
                                                            <div class="radio">
                                                                <input type="radio" name="f17_option_1_b" class="flat-red" value="1">                                                                
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="radio">
                                                                <input type="radio" name="f17_option_1_b" class="flat-red" value="2">                                                                
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="radio">
                                                                <input type="radio" name="f17_option_1_b" class="flat-red" value="3">                                                                
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="radio">
                                                                <input type="radio" name="f17_option_1_b" class="flat-red" value="4">                                                                
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="radio">
                                                                <input type="radio" name="f17_option_1_b" class="flat-red" value="5">                                                                
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
                                                                <input type="radio" name="f17_option_2_a" class="flat-red" value="1">                                                                
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="radio">
                                                                <input type="radio" name="f17_option_2_a" class="flat-red" value="2">                                                                
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="radio">
                                                                <input type="radio" name="f17_option_2_a" class="flat-red" value="3">                                                                
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="radio">
                                                                <input type="radio" name="f17_option_2_a" class="flat-red" value="4">                                                                
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="radio">
                                                                <input type="radio" name="f17_option_2_a" class="flat-red" value="5">                                                                
                                                            </div>
                                                        </td>
                                                        </div>
                                                        <div class="form-group">
                                                        <td>
                                                            <div class="radio">
                                                                <input type="radio" name="f17_option_2_b" class="flat-red" value="1">                                                                
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="radio">
                                                                <input type="radio" name="f17_option_2_b" class="flat-red" value="2">                                                                
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="radio">
                                                                <input type="radio" name="f17_option_2_b" class="flat-red" value="3">                                                                
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="radio">
                                                                <input type="radio" name="f17_option_2_b" class="flat-red" value="4">                                                                
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="radio">
                                                                <input type="radio" name="f17_option_2_b" class="flat-red" value="5">                                                                
                                                            </div>
                                                        </td>
                                                        </div>
                                                    </tr>
                                                    <tr>
                                                        <td>3</td>
                                                        <td>Pengetahuan umum</td>
                                                        
                                                        <td>
                                                            <div class="radio">
                                                                <input type="radio" name="f17_option_3_a" class="flat-red" value="1">                                                                
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="radio">
                                                                <input type="radio" name="f17_option_3_a" class="flat-red" value="2">                                                                
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="radio">
                                                                <input type="radio" name="f17_option_3_a" class="flat-red" value="3">                                                                
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="radio">
                                                                <input type="radio" name="f17_option_3_a" class="flat-red" value="4">                                                                
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="radio">
                                                                <input type="radio" name="f17_option_3_a" class="flat-red" value="5">                                                                
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="radio">
                                                                <input type="radio" name="f17_option_3_b" class="flat-red" value="1">                                                                
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="radio">
                                                                <input type="radio" name="f17_option_3_b" class="flat-red" value="2">                                                                
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="radio">
                                                                <input type="radio" name="f17_option_3_b" class="flat-red" value="3">                                                                
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="radio">
                                                                <input type="radio" name="f17_option_3_b" class="flat-red" value="4">                                                                
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="radio">
                                                                <input type="radio" name="f17_option_3_b" class="flat-red" value="5">                                                                
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>4</td>
                                                        <td>Bahasa Inggris</td>
                                                        
                                                        <td>
                                                            <div class="radio">
                                                                <input type="radio" name="f17_option_4_a" class="flat-red" value="1">                                                                
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="radio">
                                                                <input type="radio" name="f17_option_4_a" class="flat-red" value="2">                                                                
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="radio">
                                                                <input type="radio" name="f17_option_4_a" class="flat-red" value="3">                                                                
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="radio">
                                                                <input type="radio" name="f17_option_4_a" class="flat-red" value="4">                                                                
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="radio">
                                                                <input type="radio" name="f17_option_4_a" class="flat-red" value="5">                                                                
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="radio">
                                                                <input type="radio" name="f17_option_4_b" class="flat-red" value="1">                                                                
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="radio">
                                                                <input type="radio" name="f17_option_4_b" class="flat-red" value="2">                                                                
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="radio">
                                                                <input type="radio" name="f17_option_4_b" class="flat-red" value="3">                                                                
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="radio">
                                                                <input type="radio" name="f17_option_4_b" class="flat-red" value="4">                                                                
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="radio">
                                                                <input type="radio" name="f17_option_4_b" class="flat-red" value="5">                                                                
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>5</td>
                                                        <td>Ketrampilan internet</td>
                                                        
                                                        <td>
                                                            <div class="radio">
                                                                <input type="radio" name="f17_option_5_a" class="flat-red" value="1">                                                                
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="radio">
                                                                <input type="radio" name="f17_option_5_a" class="flat-red" value="2">                                                                
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="radio">
                                                                <input type="radio" name="f17_option_5_a" class="flat-red" value="3">                                                                
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="radio">
                                                                <input type="radio" name="f17_option_5_a" class="flat-red" value="4">                                                                
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="radio">
                                                                <input type="radio" name="f17_option_5_a" class="flat-red" value="5">                                                                
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="radio">
                                                                <input type="radio" name="f17_option_5_b" class="flat-red" value="1">                                                                
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="radio">
                                                                <input type="radio" name="f17_option_5_b" class="flat-red" value="2">                                                                
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="radio">
                                                                <input type="radio" name="f17_option_5_b" class="flat-red" value="3">                                                                
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="radio">
                                                                <input type="radio" name="f17_option_5_b" class="flat-red" value="4">                                                                
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="radio">
                                                                <input type="radio" name="f17_option_5_b" class="flat-red" value="5">                                                                
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>6</td>
                                                        <td>Ketrampilan komputer</td>
                                                        
                                                        <td>
                                                            <div class="radio">
                                                                <input type="radio" name="f17_option_6_a" class="flat-red" value="1">                                                                
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="radio">
                                                                <input type="radio" name="f17_option_6_a" class="flat-red" value="2">                                                                
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="radio">
                                                                <input type="radio" name="f17_option_6_a" class="flat-red" value="3">                                                                
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="radio">
                                                                <input type="radio" name="f17_option_6_a" class="flat-red" value="4">                                                                
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="radio">
                                                                <input type="radio" name="f17_option_6_a" class="flat-red" value="5">                                                                
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="radio">
                                                                <input type="radio" name="f17_option_6_b" class="flat-red" value="1">                                                                
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="radio">
                                                                <input type="radio" name="f17_option_6_b" class="flat-red" value="2">                                                                
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="radio">
                                                                <input type="radio" name="f17_option_6_b" class="flat-red" value="3">                                                                
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="radio">
                                                                <input type="radio" name="f17_option_6_b" class="flat-red" value="4">                                                                
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="radio">
                                                                <input type="radio" name="f17_option_6_b" class="flat-red" value="5">                                                                
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>7</td>
                                                        <td>Berpikir kritis</td>
                                                        
                                                        <td>
                                                            <div class="radio">
                                                                <input type="radio" name="f17_option_7_a" class="flat-red" value="1">                                                                
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="radio">
                                                                <input type="radio" name="f17_option_7_a" class="flat-red" value="2">                                                                
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="radio">
                                                                <input type="radio" name="f17_option_7_a" class="flat-red" value="3">                                                                
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="radio">
                                                                <input type="radio" name="f17_option_7_a" class="flat-red" value="4">                                                                
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="radio">
                                                                <input type="radio" name="f17_option_7_a" class="flat-red" value="5">                                                                
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="radio">
                                                                <input type="radio" name="f17_option_7_b" class="flat-red" value="1">                                                                
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="radio">
                                                                <input type="radio" name="f17_option_7_b" class="flat-red" value="2">                                                                
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="radio">
                                                                <input type="radio" name="f17_option_7_b" class="flat-red" value="3">                                                                
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="radio">
                                                                <input type="radio" name="f17_option_7_b" class="flat-red" value="4">                                                                
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="radio">
                                                                <input type="radio" name="f17_option_7_b" class="flat-red" value="5">                                                                
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>8</td>
                                                        <td>Ketrampilan riset</td>
                                                        
                                                        <td>
                                                            <div class="radio">
                                                                <input type="radio" name="f17_option_8_a" class="flat-red" value="1">                                                                
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="radio">
                                                                <input type="radio" name="f17_option_8_a" class="flat-red" value="2">                                                                
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="radio">
                                                                <input type="radio" name="f17_option_8_a" class="flat-red" value="3">                                                                
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="radio">
                                                                <input type="radio" name="f17_option_8_a" class="flat-red" value="4">                                                                
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="radio">
                                                                <input type="radio" name="f17_option_8_a" class="flat-red" value="5">                                                                
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="radio">
                                                                <input type="radio" name="f17_option_8_b" class="flat-red" value="1">                                                                
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="radio">
                                                                <input type="radio" name="f17_option_8_b" class="flat-red" value="2">                                                                
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="radio">
                                                                <input type="radio" name="f17_option_8_b" class="flat-red" value="3">                                                                
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="radio">
                                                                <input type="radio" name="f17_option_8_b" class="flat-red" value="4">                                                                
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="radio">
                                                                <input type="radio" name="f17_option_8_b" class="flat-red" value="5">                                                                
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>9</td>
                                                        <td>Kemampuan belajar</td>
                                                        
                                                        <td>
                                                            <div class="radio">
                                                                <input type="radio" name="f17_option_9_a" class="flat-red" value="1">                                                                
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="radio">
                                                                <input type="radio" name="f17_option_9_a" class="flat-red" value="2">                                                                
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="radio">
                                                                <input type="radio" name="f17_option_9_a" class="flat-red" value="3">                                                                
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="radio">
                                                                <input type="radio" name="f17_option_9_a" class="flat-red" value="4">                                                                
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="radio">
                                                                <input type="radio" name="f17_option_9_a" class="flat-red" value="5">                                                                
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="radio">
                                                                <input type="radio" name="f17_option_9_b" class="flat-red" value="1">                                                                
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="radio">
                                                                <input type="radio" name="f17_option_9_b" class="flat-red" value="2">                                                                
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="radio">
                                                                <input type="radio" name="f17_option_9_b" class="flat-red" value="3">                                                                
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="radio">
                                                                <input type="radio" name="f17_option_9_b" class="flat-red" value="4">                                                                
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="radio">
                                                                <input type="radio" name="f17_option_9_b" class="flat-red" value="5">                                                                
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>10</td>
                                                        <td>Kemampuan berkomunikasi</td>
                                                        
                                                        <td>
                                                            <div class="radio">
                                                                <input type="radio" name="f17_option_10_a" class="flat-red" value="1">                                                                
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="radio">
                                                                <input type="radio" name="f17_option_10_a" class="flat-red" value="2">                                                                
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="radio">
                                                                <input type="radio" name="f17_option_10_a" class="flat-red" value="3">                                                                
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="radio">
                                                                <input type="radio" name="f17_option_10_a" class="flat-red" value="4">                                                                
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="radio">
                                                                <input type="radio" name="f17_option_10_a" class="flat-red" value="5">                                                                
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="radio">
                                                                <input type="radio" name="f17_option_10_b" class="flat-red" value="1">                                                                
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="radio">
                                                                <input type="radio" name="f17_option_10_b" class="flat-red" value="2">                                                                
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="radio">
                                                                <input type="radio" name="f17_option_10_b" class="flat-red" value="3">                                                                
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="radio">
                                                                <input type="radio" name="f17_option_10_b" class="flat-red" value="4">                                                                
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="radio">
                                                                <input type="radio" name="f17_option_10_b" class="flat-red" value="5">                                                                
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>11</td>
                                                        <td>Bekerja di bawah tekanan</td>
                                                        
                                                        <td>
                                                            <div class="radio">
                                                                <input type="radio" name="f17_option_11_a" class="flat-red" value="1">                                                                
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="radio">
                                                                <input type="radio" name="f17_option_11_a" class="flat-red" value="2">                                                                
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="radio">
                                                                <input type="radio" name="f17_option_11_a" class="flat-red" value="3">                                                                
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="radio">
                                                                <input type="radio" name="f17_option_11_a" class="flat-red" value="4">                                                                
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="radio">
                                                                <input type="radio" name="f17_option_11_a" class="flat-red" value="5">                                                                
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="radio">
                                                                <input type="radio" name="f17_option_11_b" class="flat-red" value="1">                                                                
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="radio">
                                                                <input type="radio" name="f17_option_11_b" class="flat-red" value="2">                                                                
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="radio">
                                                                <input type="radio" name="f17_option_11_b" class="flat-red" value="3">                                                                
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="radio">
                                                                <input type="radio" name="f17_option_11_b" class="flat-red" value="4">                                                                
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="radio">
                                                                <input type="radio" name="f17_option_11_b" class="flat-red" value="5">                                                                
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>12</td>
                                                        <td>Manajemen waktu</td>
                                                        
                                                        <td>
                                                            <div class="radio">
                                                                <input type="radio" name="f17_option_12_a" class="flat-red" value="1">                                                                
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="radio">
                                                                <input type="radio" name="f17_option_12_a" class="flat-red" value="2">                                                                
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="radio">
                                                                <input type="radio" name="f17_option_12_a" class="flat-red" value="3">                                                                
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="radio">
                                                                <input type="radio" name="f17_option_12_a" class="flat-red" value="4">                                                                
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="radio">
                                                                <input type="radio" name="f17_option_12_a" class="flat-red" value="5">                                                                
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="radio">
                                                                <input type="radio" name="f17_option_12_b" class="flat-red" value="1">                                                                
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="radio">
                                                                <input type="radio" name="f17_option_12_b" class="flat-red" value="2">                                                                
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="radio">
                                                                <input type="radio" name="f17_option_12_b" class="flat-red" value="3">                                                                
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="radio">
                                                                <input type="radio" name="f17_option_12_b" class="flat-red" value="4">                                                                
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="radio">
                                                                <input type="radio" name="f17_option_12_b" class="flat-red" value="5">                                                                
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>13</td>
                                                        <td>Bekerja secara mandiri</td>
                                                        
                                                        <td>
                                                            <div class="radio">
                                                                <input type="radio" name="f17_option_13_a" class="flat-red" value="1">                                                                
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="radio">
                                                                <input type="radio" name="f17_option_13_a" class="flat-red" value="2">                                                                
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="radio">
                                                                <input type="radio" name="f17_option_13_a" class="flat-red" value="3">                                                                
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="radio">
                                                                <input type="radio" name="f17_option_13_a" class="flat-red" value="4">                                                                
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="radio">
                                                                <input type="radio" name="f17_option_13_a" class="flat-red" value="5">                                                                
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="radio">
                                                                <input type="radio" name="f17_option_13_b" class="flat-red" value="1">                                                                
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="radio">
                                                                <input type="radio" name="f17_option_13_b" class="flat-red" value="2">                                                                
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="radio">
                                                                <input type="radio" name="f17_option_13_b" class="flat-red" value="3">                                                                
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="radio">
                                                                <input type="radio" name="f17_option_13_b" class="flat-red" value="4">                                                                
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="radio">
                                                                <input type="radio" name="f17_option_13_b" class="flat-red" value="5">                                                                
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>14</td>
                                                        <td>Bekerja dalam tim/bekerjasama dengan orang lain</td>
                                                        
                                                        <td>
                                                            <div class="radio">
                                                                <input type="radio" name="f17_option_14_a" class="flat-red" value="1">                                                                
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="radio">
                                                                <input type="radio" name="f17_option_14_a" class="flat-red" value="2">                                                                
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="radio">
                                                                <input type="radio" name="f17_option_14_a" class="flat-red" value="3">                                                                
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="radio">
                                                                <input type="radio" name="f17_option_14_a" class="flat-red" value="4">                                                                
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="radio">
                                                                <input type="radio" name="f17_option_14_a" class="flat-red" value="5">                                                                
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="radio">
                                                                <input type="radio" name="f17_option_14_b" class="flat-red" value="1">                                                                
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="radio">
                                                                <input type="radio" name="f17_option_14_b" class="flat-red" value="2">                                                                
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="radio">
                                                                <input type="radio" name="f17_option_14_b" class="flat-red" value="3">                                                                
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="radio">
                                                                <input type="radio" name="f17_option_14_b" class="flat-red" value="4">                                                                
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="radio">
                                                                <input type="radio" name="f17_option_14_b" class="flat-red" value="5">                                                                
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>15</td>
                                                        <td>Bekerja dalam tim/bekerjasama dengan orang lain</td>
                                                        
                                                        <td>
                                                            <div class="radio">
                                                                <input type="radio" name="f17_option_15_a" class="flat-red" value="1">                                                                
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="radio">
                                                                <input type="radio" name="f17_option_15_a" class="flat-red" value="2">                                                                
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="radio">
                                                                <input type="radio" name="f17_option_15_a" class="flat-red" value="3">                                                                
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="radio">
                                                                <input type="radio" name="f17_option_15_a" class="flat-red" value="4">                                                                
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="radio">
                                                                <input type="radio" name="f17_option_15_a" class="flat-red" value="5">                                                                
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="radio">
                                                                <input type="radio" name="f17_option_15_b" class="flat-red" value="1">                                                                
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="radio">
                                                                <input type="radio" name="f17_option_15_b" class="flat-red" value="2">                                                                
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="radio">
                                                                <input type="radio" name="f17_option_15_b" class="flat-red" value="3">                                                                
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="radio">
                                                                <input type="radio" name="f17_option_15_b" class="flat-red" value="4">                                                                
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="radio">
                                                                <input type="radio" name="f17_option_15_b" class="flat-red" value="5">                                                                
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>16</td>
                                                        <td>Kemampuan dalam memecahkan masalah</td>
                                                        
                                                        <td>
                                                            <div class="radio">
                                                                <input type="radio" name="f17_option_16_a" class="flat-red" value="1">                                                                
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="radio">
                                                                <input type="radio" name="f17_option_16_a" class="flat-red" value="2">                                                                
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="radio">
                                                                <input type="radio" name="f17_option_16_a" class="flat-red" value="3">                                                                
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="radio">
                                                                <input type="radio" name="f17_option_16_a" class="flat-red" value="4">                                                                
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="radio">
                                                                <input type="radio" name="f17_option_16_a" class="flat-red" value="5">                                                                
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="radio">
                                                                <input type="radio" name="f17_option_16_b" class="flat-red" value="1">                                                                
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="radio">
                                                                <input type="radio" name="f17_option_16_b" class="flat-red" value="2">                                                                
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="radio">
                                                                <input type="radio" name="f17_option_16_b" class="flat-red" value="3">                                                                
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="radio">
                                                                <input type="radio" name="f17_option_16_b" class="flat-red" value="4">                                                                
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="radio">
                                                                <input type="radio" name="f17_option_16_b" class="flat-red" value="5">                                                                
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>17</td>
                                                        <td>Negosiasi</td>
                                                        
                                                        <td>
                                                            <div class="radio">
                                                                <input type="radio" name="f17_option_17_a" class="flat-red" value="1">                                                                
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="radio">
                                                                <input type="radio" name="f17_option_17_a" class="flat-red" value="2">                                                                
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="radio">
                                                                <input type="radio" name="f17_option_17_a" class="flat-red" value="3">                                                                
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="radio">
                                                                <input type="radio" name="f17_option_17_a" class="flat-red" value="4">                                                                
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="radio">
                                                                <input type="radio" name="f17_option_17_a" class="flat-red" value="5">                                                                
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="radio">
                                                                <input type="radio" name="f17_option_17_b" class="flat-red" value="1">                                                                
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="radio">
                                                                <input type="radio" name="f17_option_17_b" class="flat-red" value="2">                                                                
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="radio">
                                                                <input type="radio" name="f17_option_17_b" class="flat-red" value="3">                                                                
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="radio">
                                                                <input type="radio" name="f17_option_17_b" class="flat-red" value="4">                                                                
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="radio">
                                                                <input type="radio" name="f17_option_17_b" class="flat-red" value="5">                                                                
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>18</td>
                                                        <td>Kemampuan analisis</td>
                                                        
                                                        <td>
                                                            <div class="radio">
                                                                <input type="radio" name="f17_option_18_a" class="flat-red" value="1">                                                                
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="radio">
                                                                <input type="radio" name="f17_option_18_a" class="flat-red" value="2">                                                                
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="radio">
                                                                <input type="radio" name="f17_option_18_a" class="flat-red" value="3">                                                                
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="radio">
                                                                <input type="radio" name="f17_option_18_a" class="flat-red" value="4">                                                                
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="radio">
                                                                <input type="radio" name="f17_option_18_a" class="flat-red" value="5">                                                                
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="radio">
                                                                <input type="radio" name="f17_option_18_b" class="flat-red" value="1">                                                                
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="radio">
                                                                <input type="radio" name="f17_option_18_b" class="flat-red" value="2">                                                                
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="radio">
                                                                <input type="radio" name="f17_option_18_b" class="flat-red" value="3">                                                                
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="radio">
                                                                <input type="radio" name="f17_option_18_b" class="flat-red" value="4">                                                                
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="radio">
                                                                <input type="radio" name="f17_option_18_b" class="flat-red" value="5">                                                                
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>19</td>
                                                        <td>Toleransi</td>
                                                        
                                                        <td>
                                                            <div class="radio">
                                                                <input type="radio" name="f17_option_19_a" class="flat-red" value="1">                                                                
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="radio">
                                                                <input type="radio" name="f17_option_19_a" class="flat-red" value="2">                                                                
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="radio">
                                                                <input type="radio" name="f17_option_19_a" class="flat-red" value="3">                                                                
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="radio">
                                                                <input type="radio" name="f17_option_19_a" class="flat-red" value="4">                                                                
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="radio">
                                                                <input type="radio" name="f17_option_19_a" class="flat-red" value="5">                                                                
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="radio">
                                                                <input type="radio" name="f17_option_19_b" class="flat-red" value="1">                                                                
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="radio">
                                                                <input type="radio" name="f17_option_19_b" class="flat-red" value="2">                                                                
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="radio">
                                                                <input type="radio" name="f17_option_19_b" class="flat-red" value="3">                                                                
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="radio">
                                                                <input type="radio" name="f17_option_19_b" class="flat-red" value="4">                                                                
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="radio">
                                                                <input type="radio" name="f17_option_19_b" class="flat-red" value="5">                                                                
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>20</td>
                                                        <td>Kemampuan adaptasi</td>
                                                        
                                                        <td>
                                                            <div class="radio">
                                                                <input type="radio" name="f17_option_20_a" class="flat-red" value="1">                                                                
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="radio">
                                                                <input type="radio" name="f17_option_20_a" class="flat-red" value="2">                                                                
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="radio">
                                                                <input type="radio" name="f17_option_20_a" class="flat-red" value="3">                                                                
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="radio">
                                                                <input type="radio" name="f17_option_20_a" class="flat-red" value="4">                                                                
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="radio">
                                                                <input type="radio" name="f17_option_20_a" class="flat-red" value="5">                                                                
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="radio">
                                                                <input type="radio" name="f17_option_20_b" class="flat-red" value="1">                                                                
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="radio">
                                                                <input type="radio" name="f17_option_20_b" class="flat-red" value="2">                                                                
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="radio">
                                                                <input type="radio" name="f17_option_20_b" class="flat-red" value="3">                                                                
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="radio">
                                                                <input type="radio" name="f17_option_20_b" class="flat-red" value="4">                                                                
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="radio">
                                                                <input type="radio" name="f17_option_20_b" class="flat-red" value="5">                                                                
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>21</td>
                                                        <td>Loyalitas</td>
                                                        
                                                        <td>
                                                            <div class="radio">
                                                                <input type="radio" name="f17_option_21_a" class="flat-red" value="1">                                                                
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="radio">
                                                                <input type="radio" name="f17_option_21_a" class="flat-red" value="2">                                                                
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="radio">
                                                                <input type="radio" name="f17_option_21_a" class="flat-red" value="3">                                                                
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="radio">
                                                                <input type="radio" name="f17_option_21_a" class="flat-red" value="4">                                                                
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="radio">
                                                                <input type="radio" name="f17_option_21_a" class="flat-red" value="5">                                                                
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="radio">
                                                                <input type="radio" name="f17_option_21_b" class="flat-red" value="1">                                                                
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="radio">
                                                                <input type="radio" name="f17_option_21_b" class="flat-red" value="2">                                                                
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="radio">
                                                                <input type="radio" name="f17_option_21_b" class="flat-red" value="3">                                                                
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="radio">
                                                                <input type="radio" name="f17_option_21_b" class="flat-red" value="4">                                                                
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="radio">
                                                                <input type="radio" name="f17_option_21_b" class="flat-red" value="5">                                                                
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>22</td>
                                                        <td>Integritas</td>
                                                        
                                                        <td>
                                                            <div class="radio">
                                                                <input type="radio" name="f17_option_22_a" class="flat-red" value="1">                                                                
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="radio">
                                                                <input type="radio" name="f17_option_22_a" class="flat-red" value="2">                                                                
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="radio">
                                                                <input type="radio" name="f17_option_22_a" class="flat-red" value="3">                                                                
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="radio">
                                                                <input type="radio" name="f17_option_22_a" class="flat-red" value="4">                                                                
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="radio">
                                                                <input type="radio" name="f17_option_22_a" class="flat-red" value="5">                                                                
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="radio">
                                                                <input type="radio" name="f17_option_22_b" class="flat-red" value="1">                                                                
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="radio">
                                                                <input type="radio" name="f17_option_22_b" class="flat-red" value="2">                                                                
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="radio">
                                                                <input type="radio" name="f17_option_22_b" class="flat-red" value="3">                                                                
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="radio">
                                                                <input type="radio" name="f17_option_22_b" class="flat-red" value="4">                                                                
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="radio">
                                                                <input type="radio" name="f17_option_22_b" class="flat-red" value="5">                                                                
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>23</td>
                                                        <td>Bekerja dengan orang yang berbeda budaya maupun latar belakang</td>
                                                        
                                                        <td>
                                                            <div class="radio">
                                                                <input type="radio" name="f17_option_23_a" class="flat-red" value="1">                                                                
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="radio">
                                                                <input type="radio" name="f17_option_23_a" class="flat-red" value="2">                                                                
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="radio">
                                                                <input type="radio" name="f17_option_23_a" class="flat-red" value="3">                                                                
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="radio">
                                                                <input type="radio" name="f17_option_23_a" class="flat-red" value="4">                                                                
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="radio">
                                                                <input type="radio" name="f17_option_23_a" class="flat-red" value="5">                                                                
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="radio">
                                                                <input type="radio" name="f17_option_23_b" class="flat-red" value="1">                                                                
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="radio">
                                                                <input type="radio" name="f17_option_23_b" class="flat-red" value="2">                                                                
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="radio">
                                                                <input type="radio" name="f17_option_23_b" class="flat-red" value="3">                                                                
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="radio">
                                                                <input type="radio" name="f17_option_23_b" class="flat-red" value="4">                                                                
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="radio">
                                                                <input type="radio" name="f17_option_23_b" class="flat-red" value="5">                                                                
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>24</td>
                                                        <td>Kepemimpinan</td>
                                                        
                                                        <td>
                                                            <div class="radio">
                                                                <input type="radio" name="f17_option_24_a" class="flat-red" value="1">                                                                
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="radio">
                                                                <input type="radio" name="f17_option_24_a" class="flat-red" value="2">                                                                
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="radio">
                                                                <input type="radio" name="f17_option_24_a" class="flat-red" value="3">                                                                
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="radio">
                                                                <input type="radio" name="f17_option_24_a" class="flat-red" value="4">                                                                
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="radio">
                                                                <input type="radio" name="f17_option_24_a" class="flat-red" value="5">                                                                
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="radio">
                                                                <input type="radio" name="f17_option_24_b" class="flat-red" value="1">                                                                
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="radio">
                                                                <input type="radio" name="f17_option_24_b" class="flat-red" value="2">                                                                
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="radio">
                                                                <input type="radio" name="f17_option_24_b" class="flat-red" value="3">                                                                
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="radio">
                                                                <input type="radio" name="f17_option_24_b" class="flat-red" value="4">                                                                
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="radio">
                                                                <input type="radio" name="f17_option_24_b" class="flat-red" value="5">                                                                
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>25</td>
                                                        <td>Kemampuan dalam memegang tanggungjawab</td>
                                                        
                                                        <td>
                                                            <div class="radio">
                                                                <input type="radio" name="f17_option_25_a" class="flat-red" value="1">                                                                
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="radio">
                                                                <input type="radio" name="f17_option_25_a" class="flat-red" value="2">                                                                
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="radio">
                                                                <input type="radio" name="f17_option_25_a" class="flat-red" value="3">                                                                
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="radio">
                                                                <input type="radio" name="f17_option_25_a" class="flat-red" value="4">                                                                
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="radio">
                                                                <input type="radio" name="f17_option_25_a" class="flat-red" value="5">                                                                
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="radio">
                                                                <input type="radio" name="f17_option_25_b" class="flat-red" value="1">                                                                
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="radio">
                                                                <input type="radio" name="f17_option_25_b" class="flat-red" value="2">                                                                
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="radio">
                                                                <input type="radio" name="f17_option_25_b" class="flat-red" value="3">                                                                
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="radio">
                                                                <input type="radio" name="f17_option_25_b" class="flat-red" value="4">                                                                
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="radio">
                                                                <input type="radio" name="f17_option_25_b" class="flat-red" value="5">                                                                
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>26</td>
                                                        <td>Inisiatif</td>
                                                        
                                                        <td>
                                                            <div class="radio">
                                                                <input type="radio" name="f17_option_26_a" class="flat-red" value="1">                                                                
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="radio">
                                                                <input type="radio" name="f17_option_26_a" class="flat-red" value="2">                                                                
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="radio">
                                                                <input type="radio" name="f17_option_26_a" class="flat-red" value="3">                                                                
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="radio">
                                                                <input type="radio" name="f17_option_26_a" class="flat-red" value="4">                                                                
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="radio">
                                                                <input type="radio" name="f17_option_26_a" class="flat-red" value="5">                                                                
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="radio">
                                                                <input type="radio" name="f17_option_26_b" class="flat-red" value="1">                                                                
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="radio">
                                                                <input type="radio" name="f17_option_26_b" class="flat-red" value="2">                                                                
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="radio">
                                                                <input type="radio" name="f17_option_26_b" class="flat-red" value="3">                                                                
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="radio">
                                                                <input type="radio" name="f17_option_26_b" class="flat-red" value="4">                                                                
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="radio">
                                                                <input type="radio" name="f17_option_26_b" class="flat-red" value="5">                                                                
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>27</td>
                                                        <td>Manajemen proyek/program</td>
                                                        
                                                        <td>
                                                            <div class="radio">
                                                                <input type="radio" name="f17_option_27_a" class="flat-red" value="1">                                                                
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="radio">
                                                                <input type="radio" name="f17_option_27_a" class="flat-red" value="2">                                                                
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="radio">
                                                                <input type="radio" name="f17_option_27_a" class="flat-red" value="3">                                                                
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="radio">
                                                                <input type="radio" name="f17_option_27_a" class="flat-red" value="4">                                                                
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="radio">
                                                                <input type="radio" name="f17_option_27_a" class="flat-red" value="5">                                                                
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="radio">
                                                                <input type="radio" name="f17_option_27_b" class="flat-red" value="1">                                                                
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="radio">
                                                                <input type="radio" name="f17_option_27_b" class="flat-red" value="2">                                                                
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="radio">
                                                                <input type="radio" name="f17_option_27_b" class="flat-red" value="3">                                                                
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="radio">
                                                                <input type="radio" name="f17_option_27_b" class="flat-red" value="4">                                                                
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="radio">
                                                                <input type="radio" name="f17_option_27_b" class="flat-red" value="5">                                                                
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>28</td>
                                                        <td>Kemampuan untuk memresentasikan ide/produk/laporan</td>
                                                        
                                                        <td>
                                                            <div class="radio">
                                                                <input type="radio" name="f17_option_28_a" class="flat-red" value="1">                                                                
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="radio">
                                                                <input type="radio" name="f17_option_28_a" class="flat-red" value="2">                                                                
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="radio">
                                                                <input type="radio" name="f17_option_28_a" class="flat-red" value="3">                                                                
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="radio">
                                                                <input type="radio" name="f17_option_28_a" class="flat-red" value="4">                                                                
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="radio">
                                                                <input type="radio" name="f17_option_28_a" class="flat-red" value="5">                                                                
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="radio">
                                                                <input type="radio" name="f17_option_28_b" class="flat-red" value="1">                                                                
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="radio">
                                                                <input type="radio" name="f17_option_28_b" class="flat-red" value="2">                                                                
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="radio">
                                                                <input type="radio" name="f17_option_28_b" class="flat-red" value="3">                                                                
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="radio">
                                                                <input type="radio" name="f17_option_28_b" class="flat-red" value="4">                                                                
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="radio">
                                                                <input type="radio" name="f17_option_28_b" class="flat-red" value="5">                                                                
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>29</td>
                                                        <td>Kemampuan dalam menulis laporan, memo dan dokumen</td>
                                                        
                                                        <td>
                                                            <div class="radio">
                                                                <input type="radio" name="f17_option_29_a" class="flat-red" value="1">                                                                
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="radio">
                                                                <input type="radio" name="f17_option_29_a" class="flat-red" value="2">                                                                
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="radio">
                                                                <input type="radio" name="f17_option_29_a" class="flat-red" value="3">                                                                
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="radio">
                                                                <input type="radio" name="f17_option_29_a" class="flat-red" value="4">                                                                
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="radio">
                                                                <input type="radio" name="f17_option_29_a" class="flat-red" value="5">                                                                
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="radio">
                                                                <input type="radio" name="f17_option_29_b" class="flat-red" value="1">                                                                
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="radio">
                                                                <input type="radio" name="f17_option_29_b" class="flat-red" value="2">                                                                
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="radio">
                                                                <input type="radio" name="f17_option_29_b" class="flat-red" value="3">                                                                
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="radio">
                                                                <input type="radio" name="f17_option_29_b" class="flat-red" value="4">                                                                
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="radio">
                                                                <input type="radio" name="f17_option_29_b" class="flat-red" value="5">                                                                
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>30</td>
                                                        <td>Kemampuan untuk terus belajar sepanjang hayat</td>
                                                        
                                                        <td>
                                                            <div class="radio">
                                                                <input type="radio" name="f17_option_30_a" class="flat-red" value="1">                                                                
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="radio">
                                                                <input type="radio" name="f17_option_30_a" class="flat-red" value="2">                                                                
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="radio">
                                                                <input type="radio" name="f17_option_30_a" class="flat-red" value="3">                                                                
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="radio">
                                                                <input type="radio" name="f17_option_30_a" class="flat-red" value="4">                                                                
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="radio">
                                                                <input type="radio" name="f17_option_30_a" class="flat-red" value="5">                                                                
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="radio">
                                                                <input type="radio" name="f17_option_30_b" class="flat-red" value="1">                                                                
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="radio">
                                                                <input type="radio" name="f17_option_30_b" class="flat-red" value="2">                                                                
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="radio">
                                                                <input type="radio" name="f17_option_30_b" class="flat-red" value="3">                                                                
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="radio">
                                                                <input type="radio" name="f17_option_30_b" class="flat-red" value="4">                                                                
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="radio">
                                                                <input type="radio" name="f17_option_30_b" class="flat-red" value="5">                                                                
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

                        <div class="panel-footer">
                            <div class="row">
                                <div class="form-group">    
                                    <div class="pull-right">
                                        <input type="submit" class="btn btn-primary btn-sm" style="margin:20px;" value="Submit">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    
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