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
                    <form action="">
                        <div class="box-body">
                            <table class='table'>
                                <tr class="bg-primary">
                                    <th colspan="3">Form Data Pengisi</th>
                                </tr>
                                <tr>
                                    <td class="text-danger" style="vertical-align:middle;" width="10%">F1</td>
                                    <td width="20%" style="vertical-align:middle;">Kode PT</td>
                                    <td><input type="text" class="form-control" style="width:20%;" readonly></td>
                                </tr>
                                <tr>
                                    <td class="text-danger" style="vertical-align:middle;" width="10%"></td>
                                    <td width="20%" style="vertical-align:middle;">Kode Prodi</td>
                                    <td><input type="text" class="form-control" style="width:20%;" readonly></td>
                                </tr>
                                <tr>
                                    <td class="text-danger" style="vertical-align:middle;" width="10%"></td>
                                    <td width="20%" style="vertical-align:middle;">Nama</td>
                                    <td><input type="text" class="form-control" style="width:30%;" value="{{$alumni->nama_depan.' '.$alumni->nama_belakang}}" readonly></td>
                                </tr>
                                <tr>
                                    <td class="text-danger" style="vertical-align:middle;" width="10%"></td>
                                    <td width="20%" style="vertical-align:middle;">No. Telp/HP</td>
                                    <td><input type="text" class="form-control" style="width:30%;" placeholder="Masukan No Telp. Anda" ></td>
                                </tr>
                                <tr>
                                    <td class="text-danger" style="vertical-align:middle;" width="10%"></td>
                                    <td width="20%" style="vertical-align:middle;">Email</td>
                                    <td><input type="text" class="form-control" style="width:30%;" placeholder="Email Anda yang masih aktif" readonly value="{{$alumni->email}}"></td>
                                </tr>
                            </table>

                            <br />
                            <table class='table'>
                                <tr class="bg-primary">
                                    <th colspan="3">Isian Data Quesioner</th>
                                </tr>
                                <tr>
                                    <td class="text-danger" style="vertical-align:top;" align="center" width="5%">F3</td>
                                    <td width="30%" style="vertical-align:top;">Kapan anda mulai mencari pekerjaan? <p>(Mohon pekerjaan sambilan tidak dimasukkan)</p></td>
                                    <td>
                                        <div class="form-group">
                                            <div class="col-md-2"><input type="number" name="f1_input_text" class="form-control"></div>
                                            <div class="col-md-10">
                                                <select name="f1_select_input" id="f1_select_input" class="form-control">
                                                    <option value="" disabled selected>Pilih Opsi</option>
                                                    <option value="sebelum">Bulan Sebelum Lulus</option>
                                                    <option value="sesudah">Bulan Sesudah Lulus</option>
                                                </select>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-danger" style="vertical-align:top;" width="5%" align="center">F4</td>
                                    <td style="vertical-align:top;">Bagaimana anda mencari pekerjaan tersebut? Jawaban bisa lebih dari satu</td>
                                    <td>
                                        <div class="form-group">
                                            <div class="checkbox">
                                                <label>
                                                <input type="checkbox" class="flat-red">
                                                Melalui iklan di koran/majalah, brosur
                                                </label>
                                            </div>

                                            <div class="checkbox">
                                                <label>
                                                <input type="checkbox" class="flat-red">
                                                Melamar ke perusahaan tanpa mengetahui lowongan yang ada
                                                </label>
                                            </div>

                                            <div class="checkbox">
                                                <label>
                                                <input type="checkbox" class="flat-red">
                                                Pergi ke bursa/pameran kerja
                                                </label>
                                            </div>

                                            <div class="checkbox">
                                                <label>
                                                <input type="checkbox" class="flat-red">
                                                Mencari lewat internet/iklan online/milis
                                                </label>
                                            </div>
                                            <div class="checkbox">
                                                <label>
                                                <input type="checkbox" class="flat-red">
                                                Dihubungi oleh perusahaan
                                                </label>
                                            </div>

                                            <div class="checkbox">
                                                <label>
                                                <input type="checkbox" class="flat-red">
                                                Menghubungi Kemenakertrans
                                                </label>
                                            </div>

                                            <div class="checkbox">
                                                <label>
                                                <input type="checkbox" class="flat-red">
                                                Menghubungi agen tenaga kerja komersial/swasta
                                                </label>
                                            </div>

                                            <div class="checkbox">
                                                <label>
                                                <input type="checkbox" class="flat-red">
                                                Memeroleh informasi dari pusat/kantor pengembangan karir fakultas/universitas
                                                </label>
                                            </div>
                                            
                                            <div class="checkbox">
                                                <label>
                                                <input type="checkbox" class="flat-red">
                                                Menghubungi kantor kemahasiswaan/hubungan alumni
                                                </label>
                                            </div>
                                            
                                            <div class="checkbox">
                                                <label>
                                                <input type="checkbox" class="flat-red">
                                                Membangun jejaring (network) sejak masih kuliah
                                                </label>
                                            </div>
                                            
                                            <div class="checkbox">
                                                <label>
                                                <input type="checkbox" class="flat-red">
                                                Melalui relasi (misalnya dosen, orang tua, saudara, teman, dll.)
                                                </label>
                                            </div>

                                            <div class="checkbox">
                                                <label>
                                                <input type="checkbox" class="flat-red">
                                                Membangun bisnis sendiri
                                                </label>
                                            </div>

                                            <div class="checkbox">
                                                <label>
                                                <input type="checkbox" class="flat-red">
                                                Melalui penempatan kerja atau magang
                                                </label>
                                            </div>

                                            <div class="checkbox">
                                                <label>
                                                <input type="checkbox" class="flat-red">
                                                Bekerja di tempat yang sama dengan tempat kerja semasa kuliah
                                                </label>
                                            </div>

                                            <div class="checkbox">
                                                <label>
                                                <input type="checkbox" class="flat-red">
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
                                        <div class="form-group">
                                            <div class="col-md-2"><input type="number" name="f5_input_text" class="form-control"></div>
                                            <div class="col-md-10">
                                                <select name="f5_select_input" id="f5_select_input" class="form-control">
                                                    <option value="" disabled selected>Pilih Opsi</option>
                                                    <option value="sebelum">Bulan Sebelum Lulus</option>
                                                    <option value="sesudah">Bulan Sesudah Lulus</option>
                                                </select>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-danger" style="vertical-align:top;" align="center" width="5%">F6</td>
                                    <td width="30%" style="vertical-align:top;">Berapa perusahaan/instansi/institusi yang sudah anda lamar (lewat surat atau e-mail) sebelum anda memeroleh pekerjaan pertama?</td>
                                    <td>
                                        <div class="form-group">
                                            <div class="col-md-2"><input type="number" name="f6_input_text" class="form-control"></div>
                                            <div class="col-md-10">
                                                <select name="f6_select_input" id="f6_select_input" class="form-control">
                                                    <option value="" disabled selected>Pilih Opsi</option>
                                                    <option value="perusahaan">Perusahaan</option>
                                                    <option value="instansi">Instansi</option>
                                                    <option value="institusi">Institusi</option>
                                                </select>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-danger" style="vertical-align:top;" align="center" width="5%">F7</td>
                                    <td width="30%" style="vertical-align:top;">Berapa banyak perusahaan/instansi/institusi yang merespons lamaran anda?</td>
                                    <td>
                                        <div class="form-group">
                                            <div class="col-md-2"><input type="number" name="f7_input_text" class="form-control"></div>
                                            <div class="col-md-10">
                                                <select name="f7_select_input" id="f7_select_input" class="form-control">
                                                    <option value="" disabled selected>Pilih Opsi</option>
                                                    <option value="perusahaan">Perusahaan</option>
                                                    <option value="instansi">Instansi</option>
                                                    <option value="institusi">Institusi</option>
                                                </select>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-danger" style="vertical-align:top;" align="center" width="5%">F7a</td>
                                    <td width="30%" style="vertical-align:top;">Berapa banyak perusahaan/instansi/institusi yang mengundang anda untuk wawancara?</td>
                                    <td>
                                        <div class="form-group">
                                            <div class="col-md-2"><input type="number" name="f7a_input_text" class="form-control"></div>
                                            <div class="col-md-10">
                                                <select name="f7a_select_input" id="f7a_select_input" class="form-control">
                                                    <option value="" disabled selected>Pilih Opsi</option>
                                                    <option value="perusahaan">Perusahaan</option>
                                                    <option value="instansi">Instansi</option>
                                                    <option value="institusi">Institusi</option>
                                                </select>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-danger" style="vertical-align:top;" align="center" width="5%">F8</td>
                                    <td width="30%" style="vertical-align:top;">Apakah anda bekerja saat ini (termasuk kerja sambilan dan wirausaha)?</td>
                                    <td>
                                        <div class="form-group">
                                            <div class="radio">
                                                <label>
                                                <input type="radio" name="optionsRadios" class="flat-red" id="optionsRadios1" value="option1" checked>
                                                Ya
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <label>
                                                <input type="radio" name="optionsRadios" class="flat-red" id="optionsRadios2" value="option2">
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
                                        <div class="form-group">
                                            <div class="checkbox">
                                                <label>
                                                <input type="checkbox" class="flat-red">
                                                Saya masih belajar/melanjutkan kuliah profesi atau pascasarjana
                                                </label>
                                            </div>

                                            <div class="checkbox">
                                                <label>
                                                <input type="checkbox" class="flat-red">
                                                Saya menikah
                                                </label>
                                            </div>

                                            <div class="checkbox">
                                                <label>
                                                <input type="checkbox" class="flat-red">
                                                Saya sibuk dengan keluarga dan anak-anak
                                                </label>
                                            </div>

                                            <div class="checkbox">
                                                <label>
                                                <input type="checkbox" class="flat-red">
                                                Saya sekarang sedang mencari pekerjaan
                                                </label>
                                            </div>

                                            <div class="checkbox">
                                                <label>
                                                <input type="checkbox" class="flat-red">
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
                                        <div class="form-group">
                                            
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
                                        <div class="form-group">
                                            
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
                                                    <input type="text" class="form-control" placeholder="Inputkan Jenis Perusahaan">
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-danger" style="vertical-align:top;" align="center" width="5%">F12</td>
                                    <td width="30%" style="vertical-align:top;">Tempat anda bekerja saat ini bergerak di bidang apa? <p><i>(Klasifikasi Baku Lapangan Usaha Indonesia, Kemnakertrans, 2009)</i></p></td>
                                    <td>
                                        <div class="form-group">
                                            
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
                                            <div class="col-md-6">
                                                <div class="input-lainnya-f11">
                                                    <input type="text" class="form-control" placeholder="Inputkan Jenis Perusahaan">
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </table>
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