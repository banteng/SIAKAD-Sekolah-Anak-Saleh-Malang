<div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                             TAMBAH DATA SISWA
                          </header>
                          <div class="panel-body">
                              <form class="form-horizontal tasi-form" method="POST" action="<?php echo base_url();?>sd/admin/home/prosesSiswa" enctype="multipart/form-data">
                                  <div class="form-group">
                                      <label class="col-sm-2 col-sm-2 control-label">NIS</label>
                                      <div class="col-sm-10">
                                      <input type="text" class="form-control" name="nis" required=""> 
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="col-sm-2 col-sm-2 control-label">NISN</label>
                                      <div class="col-sm-10">
                                      <input type="text" class="form-control" name="nisn"  required=""> 
                                      </div>
                                  </div>
                                  
                                  <div class="form-group">
                                      <label class="col-sm-2 col-sm-2 control-label">Nama Lengkap</label>
                                      <div class="col-sm-10">
                                      <input type="text" class="form-control" name="nama" required=""> 
                                      </div>
                                  </div>
                                  
                                  <div class="form-group">
                                      <label class="col-sm-2 col-sm-2 control-label">Nama Panggilan</label>
                                      <div class="col-sm-10">
                                      <input type="text" class="form-control" name="panggilan" required=""> 
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="col-sm-2 col-sm-2 control-label">Tahun Masuk</label>
                                      <div class="col-sm-10">
                                      <input type="text" class="form-control" name="tahunmasuk" required=""> 
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="col-sm-2 col-sm-2 control-label">Jenis Kelamin</label>
                                      <div class="col-sm-10">
                                      <select class="form-control" name="jk" required="">
                                            <option> -- Pilih Jenis Kelamin --</option>
                                            <option value="1">Laki - laki</option>
                                            <option value="2">Perempuan</option>
                                      </select> 
                                      </div>
                                  </div>                                  
                                  <div class="form-group">
                                      <label class="col-sm-2 col-sm-2 control-label">Alamat</label>
                                      <div class="col-sm-10">
                                      <input type="text" class="form-control" name="alamat" required=""> 
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="col-sm-2 col-sm-2 control-label">Kelas</label>
                                      <div class="col-sm-10">
                                        <select class="form-control" name="kelas">
                                            <option> -- Pilih Kelas --</option>
                                            <?php
                                                foreach($kelas as $data){
                                                    if($data->ID==$siswa->KELAS){
                                                        echo "<option value='".$data->ID."'selected>".$data->NAMA_KELAS."</option>";
                                                    }else{
                                                    echo "<option value='".$data->ID."'>".$data->NAMA_KELAS."</option>";
                                                    }
                                                }
                                            ?>
                                        </select> 
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="col-sm-2 col-sm-2 control-label">Tempat Lahir</label>
                                      <div class="col-sm-10">
                                      <input type="text" class="form-control" name="tempatlahir" required=""> 
                                      </div>
                                  </div>
                                  <div class="form-group">
                                  <label class="col-sm-2 col-sm-2 control-label">Tanggal Lahir</label>
                                  <div class="col-md-3 col-xs-10">

                                      <div data-date-viewmode="years" data-date-format="yyyy-mm-dd" data-date=""  class="input-append date dpYears">
                                          <input type="text" name="tanggallahir" readonly="" size="16" class="form-control">
                                              <span class="input-group-btn add-on">
                                                <button class="btn btn-danger" type="button"><i class="icon-calendar"></i></button>
                                              </span>
                                      </div>
                                  </div>
                              </div>
                              <div class="form-group">
                                      <label class="col-sm-2 col-sm-2 control-label">Golongan Darah</label>
                                      <div class="col-sm-10">
                                       <input type="text" class="form-control" name="golongandarah" required=""> 
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="col-sm-2 col-sm-2 control-label">Agama</label>
                                      <div class="col-sm-10">
                                      <select class="form-control" name="agama" required="">
                                            <option> -- Pilih Agama --</option>
                                            <option value="ISLAM">Islam</option>
                                            <option value="KRISTEN">Kristen</option>
                                            <option value="KATOLIK">Katolik</option>
                                            <option value="HINDU">Hindu</option>
                                            <option value="BUDHA">Budha</option>
                                      </select> 
                                      </div>
                                  </div> 
                                  <div class="form-group">
                                      <label class="col-sm-2 col-sm-2 control-label">Status Dalam Keluarga</label>
                                      <div class="col-sm-10">
                                      <select class="form-control" name="statuskeluarga" required="">
                                          <option> -- Pilih Status Dalam Keluarga --</option>
                                            <option value="ANAK KANDUNG">Anak Kandung</option>
                                            <option value="ANAK TIRI">Anak Tiri</option>
                                            <option value="ANAK ANGKAT">Anak Angkat</option>
                                            <option value="CUCU">Cucu</option>
                                      </select> 
                                      </div>
                                  </div> 
                                  <div class="form-group">
                                      <label class="col-sm-2 col-sm-2 control-label">Nomor Telepon Rumah</label>
                                      <div class="col-sm-10">
                                      <input type="text" class="form-control" name="norumah" required=""> 
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="col-sm-2 col-sm-2 control-label">Alamat</label>
                                      <div class="col-sm-10">
                                      <input type="text" class="form-control" name="alamat" required=""> 
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="col-sm-2 col-sm-2 control-label">RT</label>
                                      <div class="col-sm-10">
                                      <input type="text" class="form-control" name="rt" required=""> 
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="col-sm-2 col-sm-2 control-label">RW</label>
                                      <div class="col-sm-10">
                                      <input type="text" class="form-control" name="rw" required=""> 
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="col-sm-2 col-sm-2 control-label">Kelurahan</label>
                                      <div class="col-sm-10">
                                      <input type="text" class="form-control" name="kelurahan" required=""> 
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="col-sm-2 col-sm-2 control-label">Kecamatan</label>
                                      <div class="col-sm-10">
                                      <input type="text" class="form-control" name="kecamatan" required=""> 
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="col-sm-2 col-sm-2 control-label">Kota</label>
                                      <div class="col-sm-10">
                                      <input type="text" class="form-control" name="kota" required=""> 
                                      </div>
                                  </div>
                                  
                                  <div class="form-group">
                                      <label class="col-sm-2 col-sm-2 control-label">Provinsi</label>
                                      <div class="col-sm-10">
                                      <input type="text" class="form-control" name="provinsi" required=""> 
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="col-sm-2 col-sm-2 control-label">Kode Pos</label>
                                      <div class="col-sm-10">
                                      <input type="text" class="form-control" name="kodepos" required=""> 
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="col-sm-2 col-sm-2 control-label">Anak Ke</label>
                                      <div class="col-sm-10">
                                      <input type="text" class="form-control" name="anakke" required=""> 
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="col-sm-2 col-sm-2 control-label">Jumlah Saudara</label>
                                      <div class="col-sm-10">
                                      <input type="text" class="form-control" name="jmlsaudara" required=""> 
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="col-sm-2 col-sm-2 control-label">Berat Badan</label>
                                      <div class="col-sm-10">
                                      <input type="text" class="form-control" name="bb"  placeholder="Dalam Kilogram (Kg)" required=""> 
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="col-sm-2 col-sm-2 control-label">Tinggi Badan</label>
                                      <div class="col-sm-10">
                                      <input type="text" class="form-control" name="tb" placeholder="Dalam Centimeter (Cm)" required=""> 
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="col-sm-2 col-sm-2 control-label">Jarak Rumah</label>
                                      <div class="col-sm-10">
                                      <input type="text" class="form-control" name="jarak" placeholder="Dalam Kilometer (Km)" required=""> 
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="col-sm-2 col-sm-2 control-label">Waktu Tempuh</label>
                                      <div class="col-sm-10">
                                      <input type="text" class="form-control" name="waktu" placeholder="Dalam Menit" required=""> 
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="col-sm-2 col-sm-2 control-label">Nomor Akta</label>
                                      <div class="col-sm-10">
                                      <input type="text" class="form-control" name="noakta" required=""> 
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="col-sm-2 col-sm-2 control-label">NIK</label>
                                      <div class="col-sm-10">
                                      <input type="text" class="form-control" name="nik" required=""> 
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="col-sm-2 col-sm-2 control-label">Alamat Rumah KK</label>
                                      <div class="col-sm-10">
                                      <input type="text" class="form-control" name="alamatkk" required=""> 
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="col-sm-2 col-sm-2 control-label">RT KK</label>
                                      <div class="col-sm-10">
                                      <input type="text" class="form-control" name="rtkk" required=""> 
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="col-sm-2 col-sm-2 control-label">RW KK</label>
                                      <div class="col-sm-10">
                                      <input type="text" class="form-control" name="rwkk" required=""> 
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="col-sm-2 col-sm-2 control-label">Kelurahan KK</label>
                                      <div class="col-sm-10">
                                      <input type="text" class="form-control" name="kelurahankk" required=""> 
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="col-sm-2 col-sm-2 control-label">Kecamatan KK</label>
                                      <div class="col-sm-10">
                                      <input type="text" class="form-control" name="kecamatankk" required=""> 
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="col-sm-2 col-sm-2 control-label">Kota/Kabupaten KK</label>
                                      <div class="col-sm-10">
                                      <input type="text" class="form-control" name="kotakk" required=""> 
                                      </div>
                                  </div>
                                  
                                  <div class="form-group">
                                      <label class="col-sm-2 col-sm-2 control-label">Provinsi KK</label>
                                      <div class="col-sm-10">
                                      <input type="text" class="form-control" name="provinsikk" required=""> 
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="col-sm-2 col-sm-2 control-label">Kode Pos KK</label>
                                      <div class="col-sm-10">
                                      <input type="text" class="form-control" name="kodeposkk" required=""> 
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="col-sm-2 col-sm-2 control-label">Kewarganegaraan</label>
                                      <div class="col-sm-10">
                                      <input type="text" class="form-control" name="kewarganegaraan" required=""> 
                                      </div>
                                  </div>
                                  
                                  <div class="form-group">
                                      <h1><label class="col-sm-2 col-sm-2 control-label" style="color:red;">DATA PRIBADI AYAH</label></h1>
                                  </div>
                                  
                                  <div class="form-group">
                                      <label class="col-sm-2 col-sm-2 control-label">Nama Ayah</label>
                                      <div class="col-sm-10">
                                      <input type="text" class="form-control" name="namaayah" required=""> 
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="col-sm-2 col-sm-2 control-label">NIK Ayah</label>
                                      <div class="col-sm-10">
                                      <input type="text" class="form-control" name="nikayah" required=""> 
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="col-sm-2 col-sm-2 control-label">Tempat Lahir Ayah</label>
                                      <div class="col-sm-10">
                                      <input type="text" class="form-control" name="tmplahirayah" required=""> 
                                      </div>
                                  </div>
                                  <div class="form-group">
                                  <label class="col-sm-2 col-sm-2 control-label">Tanggal Lahir Ayah</label>
                                  <div class="col-md-3 col-xs-10">

                                      <div data-date-viewmode="years" data-date-format="yyyy-mm-dd" data-date=""  class="input-append date dpYears">
                                          <input type="text" name="tgllahirayah" readonly="" size="16" class="form-control">
                                              <span class="input-group-btn add-on">
                                                <button class="btn btn-danger" type="button"><i class="icon-calendar"></i></button>
                                              </span>
                                          </div>
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="col-sm-2 col-sm-2 control-label">No Telepon Ayah</label>
                                      <div class="col-sm-10">
                                      <input type="text" class="form-control" name="nohpayah" required=""> 
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="col-sm-2 col-sm-2 control-label">Pendidikan Ayah</label>
                                      <div class="col-sm-10">
                                      <input type="text" class="form-control" name="pendidikanayah" required=""> 
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="col-sm-2 col-sm-2 control-label">Pekerjaan Ayah</label>
                                      <div class="col-sm-10">
                                      <input type="text" class="form-control" name="pekerjaanayah" required=""> 
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="col-sm-2 col-sm-2 control-label">Instansi Ayah</label>
                                      <div class="col-sm-10">
                                      <input type="text" class="form-control" name="instansiayah" required=""> 
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="col-sm-2 col-sm-2 control-label">Alamat Instansi Ayah</label>
                                      <div class="col-sm-10">
                                      <input type="text" class="form-control" name="alamatinstansiayah" required=""> 
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="col-sm-2 col-sm-2 control-label">No. Telepon Instansi Ayah</label>
                                      <div class="col-sm-10">
                                      <input type="text" class="form-control" name="noinstansiayah" required=""> 
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="col-sm-2 col-sm-2 control-label">Penghasilan</label>
                                      <div class="col-sm-10">
                                      <input type="text" class="form-control" name="penghasilanayah" required=""> 
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="col-sm-2 col-sm-2 control-label">Email Ayah</label>
                                      <div class="col-sm-10">
                                      <input type="text" class="form-control" name="emailayah" required=""> 
                                      </div>
                                  </div>
                                  
                                  <div class="form-group">
                                      <h1><label class="col-sm-2 col-sm-2 control-label" style="color:red;">DATA PRIBADI IBU</label></h1>
                                  </div>
                                  
                                  <div class="form-group">
                                      <label class="col-sm-2 col-sm-2 control-label">Nama Ibu</label>
                                      <div class="col-sm-10">
                                      <input type="text" class="form-control" name="namaibu" required=""> 
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="col-sm-2 col-sm-2 control-label">NIK Ibu</label>
                                      <div class="col-sm-10">
                                      <input type="text" class="form-control" name="nikibu" required=""> 
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="col-sm-2 col-sm-2 control-label">Tempat Lahir Ibu</label>
                                      <div class="col-sm-10">
                                      <input type="text" class="form-control" name="tmplahiribu" required=""> 
                                      </div>
                                  </div>
                                  <div class="form-group">
                                  <label class="col-sm-2 col-sm-2 control-label">Tanggal Lahir Ibu</label>
                                  <div class="col-md-3 col-xs-10">

                                      <div data-date-viewmode="years" data-date-format="yyyy-mm-dd" data-date=""  class="input-append date dpYears">
                                          <input type="text" name="tgllahiribu" readonly="" size="16" class="form-control">
                                              <span class="input-group-btn add-on">
                                                <button class="btn btn-danger" type="button"><i class="icon-calendar"></i></button>
                                              </span>
                                          </div>
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="col-sm-2 col-sm-2 control-label">No Telepon Ibu</label>
                                      <div class="col-sm-10">
                                      <input type="text" class="form-control" name="nohpibu" required=""> 
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="col-sm-2 col-sm-2 control-label">Pendidikan Ibu</label>
                                      <div class="col-sm-10">
                                      <input type="text" class="form-control" name="pendidikanlibu" required=""> 
                                      </div>
                                  </div>
                                  
                                  <div class="form-group">
                                      <label class="col-sm-2 col-sm-2 control-label">Pekerjaan Ibu</label>
                                      <div class="col-sm-10">
                                      <input type="text" class="form-control" name="pekerjaanibu" required=""> 
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="col-sm-2 col-sm-2 control-label">Instansi Ibu</label>
                                      <div class="col-sm-10">
                                      <input type="text" class="form-control" name="instansiibu" required=""> 
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="col-sm-2 col-sm-2 control-label">Alamat Instansi Ibu</label>
                                      <div class="col-sm-10">
                                      <input type="text" class="form-control" name="alamatinstansiibu" required=""> 
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="col-sm-2 col-sm-2 control-label">No. Telepon Instansi Ibu</label>
                                      <div class="col-sm-10">
                                      <input type="text" class="form-control" name="noinstansiibu" required=""> 
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="col-sm-2 col-sm-2 control-label">Penghasilan</label>
                                      <div class="col-sm-10">
                                      <input type="text" class="form-control" name="penghasilanibu" required=""> 
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="col-sm-2 col-sm-2 control-label">Email Ibu</label>
                                      <div class="col-sm-10">
                                      <input type="text" class="form-control" name="emailibu" required=""> 
                                      </div>
                                  </div>
                                  
                                  <div class="form-group">
                                      <h1><label class="col-sm-2 col-sm-2 control-label" style="color:red;">DATA PRIBADI WALI</label></h1>
                                  </div>
                                  
                                  
                                  <div class="form-group">
                                      <label class="col-sm-2 col-sm-2 control-label">Nama Wali</label>
                                      <div class="col-sm-10">
                                      <input type="text" class="form-control" name="namawali"> 
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="col-sm-2 col-sm-2 control-label">NIK Wali</label>
                                      <div class="col-sm-10">
                                      <input type="text" class="form-control" name="nikwali" > 
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="col-sm-2 col-sm-2 control-label">Tempat Lahir Wali</label>
                                      <div class="col-sm-10">
                                      <input type="text" class="form-control" name="tmplahirwali"> 
                                      </div>
                                  </div>
                                  <div class="form-group">
                                  <label class="col-sm-2 col-sm-2 control-label">Tanggal Lahir Wali</label>
                                  <div class="col-md-3 col-xs-10">

                                      <div data-date-viewmode="years" data-date-format="yyyy-mm-dd" data-date=""  class="input-append date dpYears">
                                          <input type="text" name="tgllahirwali" readonly="" size="16" class="form-control">
                                              <span class="input-group-btn add-on">
                                                <button class="btn btn-danger" type="button"><i class="icon-calendar"></i></button>
                                              </span>
                                          </div>
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="col-sm-2 col-sm-2 control-label">No Telepon Wali</label>
                                      <div class="col-sm-10">
                                      <input type="text" class="form-control" name="nohpwali" > 
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="col-sm-2 col-sm-2 control-label">Pendidikan Wali</label>
                                      <div class="col-sm-10">
                                      <input type="text" class="form-control" name="pendidikanlwali" > 
                                      </div>
                                  </div>
                                  
                                  <div class="form-group">
                                      <label class="col-sm-2 col-sm-2 control-label">Pekerjaan Wali</label>
                                      <div class="col-sm-10">
                                      <input type="text" class="form-control" name="pekerjaanwali" > 
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="col-sm-2 col-sm-2 control-label">Instansi Wali</label>
                                      <div class="col-sm-10">
                                      <input type="text" class="form-control" name="instansiwali" > 
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="col-sm-2 col-sm-2 control-label">Email Wali</label>
                                      <div class="col-sm-10">
                                      <input type="text" class="form-control" name="emailwali" > 
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="col-sm-2 col-sm-2 control-label">Foto</label>
                                      <div class="col-sm-10">
                                      <input type="file" name="fotosiswa" size="40"> 
                                      </div>
                                  </div>

                                   <button action="action" onclick="window.history.go(-1); return false;" type="submit" class="btn btn-warning">Kembali</button>
                                  <button type="submit" class="btn btn-primary pull-right">Simpan</button>
                                  
                                    </form>
                  </div>
              </div>