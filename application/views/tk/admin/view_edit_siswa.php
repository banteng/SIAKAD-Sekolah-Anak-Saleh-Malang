<div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                             EDIT DATA SISWA
                          </header>
                          <div class="panel-body">
                              <form class="form-horizontal tasi-form" method="POST" action="<?php echo base_url();?>tk/admin/home/updateSiswa/<?php echo $siswa->NIS;?>" enctype="multipart/form-data">
                                  <div class="form-group">
                                      <label class="col-sm-2 col-sm-2 control-label">NIS</label>
                                      <div class="col-sm-10">
                                      <input type="text" class="form-control" name="nis" value="<?php echo $siswa->NIS; ?>" required=""> 
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="col-sm-2 col-sm-2 control-label">NISN</label>
                                      <div class="col-sm-10">
                                      <input type="text" class="form-control" name="nisn" value="<?php echo $siswa->NISN; ?>" required=""> 
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="col-sm-2 col-sm-2 control-label">Nama Lengkap</label>
                                      <div class="col-sm-10">
                                      <input type="text" class="form-control" name="nama" value="<?php echo $siswa->NAMA_SISWA; ?>" required=""> 
                                      </div>
                                  </div>
                                  
                                  <div class="form-group">
                                      <label class="col-sm-2 col-sm-2 control-label">Nama Panggilan</label>
                                      <div class="col-sm-10">
                                      <input type="text" class="form-control" name="panggilan" value="<?php echo $siswa->PANGGILAN; ?>" required=""> 
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="col-sm-2 col-sm-2 control-label">Jenis Kelamin</label>
                                      <div class="col-sm-10">
                                      <select class="form-control" name="jk" required="">
                                      <?php  if($data->JENIS_KELAMIN=="1"){
                                            echo "<option value='1' selected>Laki - laki</option>";
                                        }else if($data->JENIS_KELAMIN=="2"){
                                            echo "<option value='2' selected>Perempuan</option>";
                                        }else{?>
                                            <option value="1">Laki - laki</option>
                                            <option value="2">Perempuan</option>
                                        <?php }?>
                                      </select> 
                                      </div>
                                  </div>                                  
                                  <div class="form-group">
                                      <label class="col-sm-2 col-sm-2 control-label">Alamat</label>
                                      <div class="col-sm-10">
                                      <input type="text" class="form-control" name="alamat" value="<?php echo $siswa->ALAMAT_RUMAH; ?>" required=""> 
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="col-sm-2 col-sm-2 control-label">Kelas</label>
                                      <div class="col-sm-10">
                                        <select class="form-control" name="kelas">
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
                                      <input type="text" class="form-control" name="tempatlahir" value="<?php echo $siswa->TEMPAT_LAHIR; ?>" required=""> 
                                      </div>
                                  </div>
                                  <div class="form-group">
                                  <label class="col-sm-2 col-sm-2 control-label">Tanggal Lahir</label>
                                  <div class="col-md-3 col-xs-10">

                                      <div data-date-viewmode="years" data-date-format="yyyy-mm-dd" data-date=""  class="input-append date dpYears">
                                          <input type="text" name="tanggallahir" readonly="" value="<?php echo $siswa->TANGGAL_LAHIR; ?>" size="16" class="form-control">
                                              <span class="input-group-btn add-on">
                                                <button class="btn btn-danger" type="button"><i class="icon-calendar"></i></button>
                                              </span>
                                      </div>
                                  </div>
                              </div>
                              <div class="form-group">
                                      <label class="col-sm-2 col-sm-2 control-label">Golongan Darah</label>
                                      <div class="col-sm-10">
                                       <input type="text" class="form-control" name="panggilan" value="<?php echo $siswa->GOLONGAN_DARAH; ?>" required=""> 
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="col-sm-2 col-sm-2 control-label">Agama</label>
                                      <div class="col-sm-10">
                                      <select class="form-control" name="agama" required="">
                                      <?php  if($data->AGAMA=="ISLAM"){
                                            echo "<option value='ISLAM' selected>ISLAM</option>";
                                        }else if($data->AGAMA=="KRISTEN"){
                                            echo "<option value='KRISTEN' selected>KRISTEN</option>";
                                        }else if($data->AGAMA=="KATOLIK"){
                                            echo "<option value='KATOLIK' selected>KATOLIK</option>";
                                        }else if($data->AGAMA=="HINDU"){
                                            echo "<option value='HINDU' selected>HINDU</option>";
                                        }else if($data->AGAMA=="BUDHA"){
                                            echo "<option value='BUDHA' selected>BUDHA</option>";?>
                                        <?php }?>
                                      </select> 
                                      </div>
                                  </div> 
                                  <div class="form-group">
                                      <label class="col-sm-2 col-sm-2 control-label">Status Dalam Keluarga</label>
                                      <div class="col-sm-10">
                                      <select class="form-control" name="agama" required="">
                                      <?php  
                                        if($data->STATUS_DALAM_KELUARGA=="ANAK KANDUNG"){
                                            echo "<option value='ANAK KANDUNG' selected>ANAK KANDUNG</option>";
                                        }else if($data->STATUS_DALAM_KELUARGA=="ANAK TIRI"){
                                            echo "<option value='ANAK TIRI' selected>ANAK TIRI</option>";
                                        }else if($data->STATUS_DALAM_KELUARGA=="ANAK ANGKAT"){
                                            echo "<option value='ANAK ANGKAT' selected>ANAK ANGKAT</option>";
                                        }else if($data->STATUS_DALAM_KELUARGA=="CUCU"){
                                            echo "<option value='CUCU' selected>CUCU</option>"; ?>
                                      <?php  }
                                      ?>
                                      </select> 
                                      </div>
                                  </div> 
                                  <div class="form-group">
                                      <label class="col-sm-2 col-sm-2 control-label">Nomor Telepon Rumah</label>
                                      <div class="col-sm-10">
                                      <input type="text" class="form-control" name="norumah" value="<?php echo $siswa->NOMOR_TELEPON_RUMAH; ?>" required=""> 
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="col-sm-2 col-sm-2 control-label">Alamat</label>
                                      <div class="col-sm-10">
                                      <input type="text" class="form-control" name="alamat" value="<?php echo $siswa->ALAMAT_RUMAH; ?>" required=""> 
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="col-sm-2 col-sm-2 control-label">RT</label>
                                      <div class="col-sm-10">
                                      <input type="text" class="form-control" name="rt" value="<?php echo $siswa->RT; ?>" required=""> 
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="col-sm-2 col-sm-2 control-label">RW</label>
                                      <div class="col-sm-10">
                                      <input type="text" class="form-control" name="rw" value="<?php echo $siswa->RW; ?>" required=""> 
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="col-sm-2 col-sm-2 control-label">Kelurahan</label>
                                      <div class="col-sm-10">
                                      <input type="text" class="form-control" name="kelurahan" value="<?php echo $siswa->KELURAHAN; ?>" required=""> 
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="col-sm-2 col-sm-2 control-label">Kecamatan</label>
                                      <div class="col-sm-10">
                                      <input type="text" class="form-control" name="kecamatan" value="<?php echo $siswa->KECAMATAN; ?>" required=""> 
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="col-sm-2 col-sm-2 control-label">Kota</label>
                                      <div class="col-sm-10">
                                      <input type="text" class="form-control" name="kota" value="<?php echo $siswa->KOTA; ?>" required=""> 
                                      </div>
                                  </div>
                                  
                                  <div class="form-group">
                                      <label class="col-sm-2 col-sm-2 control-label">Provinsi</label>
                                      <div class="col-sm-10">
                                      <input type="text" class="form-control" name="provinsi" value="<?php echo $siswa->PROVINSI; ?>" required=""> 
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="col-sm-2 col-sm-2 control-label">Kode Pos</label>
                                      <div class="col-sm-10">
                                      <input type="text" class="form-control" name="kodepos" value="<?php echo $siswa->KODE_POS; ?>" required=""> 
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="col-sm-2 col-sm-2 control-label">Anak Ke</label>
                                      <div class="col-sm-10">
                                      <input type="text" class="form-control" name="anakke" value="<?php echo $siswa->ANAK_KE; ?>" required=""> 
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="col-sm-2 col-sm-2 control-label">Jumlah Saudara</label>
                                      <div class="col-sm-10">
                                      <input type="text" class="form-control" name="jmlsaudara" value="<?php echo $siswa->JUMLAH_SAUDARA; ?>" required=""> 
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="col-sm-2 col-sm-2 control-label">Berat Badan</label>
                                      <div class="col-sm-10">
                                      <input type="text" class="form-control" name="bb" value="<?php echo $siswa->BERAT_BADAN; ?>" required=""> 
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="col-sm-2 col-sm-2 control-label">Tinggi Badan</label>
                                      <div class="col-sm-10">
                                      <input type="text" class="form-control" name="tb" value="<?php echo $siswa->TINGGI_BADAN; ?>" required=""> 
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="col-sm-2 col-sm-2 control-label">Jarak Rumah</label>
                                      <div class="col-sm-10">
                                      <input type="text" class="form-control" name="jarak" value="<?php echo $siswa->JARAK_RUMAH; ?>" required=""> 
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="col-sm-2 col-sm-2 control-label">Waktu Tempuh</label>
                                      <div class="col-sm-10">
                                      <input type="text" class="form-control" name="waktu" value="<?php echo $siswa->WAKTU_TEMPUH; ?>" required=""> 
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="col-sm-2 col-sm-2 control-label">Nomor Akta</label>
                                      <div class="col-sm-10">
                                      <input type="text" class="form-control" name="noakta" value="<?php echo $siswa->NO_AKTA; ?>" required=""> 
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="col-sm-2 col-sm-2 control-label">NIK</label>
                                      <div class="col-sm-10">
                                      <input type="text" class="form-control" name="nik" value="<?php echo $siswa->NIK; ?>" required=""> 
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="col-sm-2 col-sm-2 control-label">Alamat Rumah KK</label>
                                      <div class="col-sm-10">
                                      <input type="text" class="form-control" name="alamatkk" value="<?php echo $siswa->ALAMAT_RUMAH_KK; ?>" required=""> 
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="col-sm-2 col-sm-2 control-label">RT KK</label>
                                      <div class="col-sm-10">
                                      <input type="text" class="form-control" name="rtkk" value="<?php echo $siswa->RT_KK; ?>" required=""> 
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="col-sm-2 col-sm-2 control-label">RW KK</label>
                                      <div class="col-sm-10">
                                      <input type="text" class="form-control" name="rwkk" value="<?php echo $siswa->RW_KK; ?>" required=""> 
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="col-sm-2 col-sm-2 control-label">Kelurahan KK</label>
                                      <div class="col-sm-10">
                                      <input type="text" class="form-control" name="kelurahankk" value="<?php echo $siswa->KELURAHAN_KK; ?>" required=""> 
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="col-sm-2 col-sm-2 control-label">Kecamatan KK</label>
                                      <div class="col-sm-10">
                                      <input type="text" class="form-control" name="kecamatankk" value="<?php echo $siswa->KECAMATAN_KK; ?>" required=""> 
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="col-sm-2 col-sm-2 control-label">Kota/Kabupaten KK</label>
                                      <div class="col-sm-10">
                                      <input type="text" class="form-control" name="kotakk" value="<?php echo $siswa->KOTA_KK; ?>" required=""> 
                                      </div>
                                  </div>
                                  
                                  <div class="form-group">
                                      <label class="col-sm-2 col-sm-2 control-label">Provinsi KK</label>
                                      <div class="col-sm-10">
                                      <input type="text" class="form-control" name="provinsikk" value="<?php echo $siswa->PROVINSI_KK; ?>" required=""> 
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="col-sm-2 col-sm-2 control-label">Kode Pos KK</label>
                                      <div class="col-sm-10">
                                      <input type="text" class="form-control" name="kodeposkk" value="<?php echo $siswa->KODE_POS_KK; ?>" required=""> 
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="col-sm-2 col-sm-2 control-label">Kewarganegaraan</label>
                                      <div class="col-sm-10">
                                      <input type="text" class="form-control" name="kewarganegaraan" value="<?php echo $siswa->KEWARGANEGARAAN; ?>" required=""> 
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="col-sm-2 col-sm-2 control-label">Nama Ayah</label>
                                      <div class="col-sm-10">
                                      <input type="text" class="form-control" name="namaayah" value="<?php echo $siswa->NAMA_AYAH; ?>" required=""> 
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="col-sm-2 col-sm-2 control-label">NIK Ayah</label>
                                      <div class="col-sm-10">
                                      <input type="text" class="form-control" name="nikayah" value="<?php echo $siswa->NIK_AYAH; ?>" required=""> 
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="col-sm-2 col-sm-2 control-label">Tempat Lahir Ayah</label>
                                      <div class="col-sm-10">
                                      <input type="text" class="form-control" name="tmplahirayah" value="<?php echo $siswa->TEMPAT_LAHIR_AYAH; ?>" required=""> 
                                      </div>
                                  </div>
                                  <div class="form-group">
                                  <label class="col-sm-2 col-sm-2 control-label">Tanggal Lahir Ayah</label>
                                  <div class="col-md-3 col-xs-10">

                                      <div data-date-viewmode="years" data-date-format="yyyy-mm-dd" data-date=""  class="input-append date dpYears">
                                          <input type="text" name="tgllahirayah" readonly="" value="<?php echo $siswa->TANGGAL_LAHIR_AYAH; ?>" size="16" class="form-control">
                                              <span class="input-group-btn add-on">
                                                <button class="btn btn-danger" type="button"><i class="icon-calendar"></i></button>
                                              </span>
                                          </div>
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="col-sm-2 col-sm-2 control-label">No Telepon Ayah</label>
                                      <div class="col-sm-10">
                                      <input type="text" class="form-control" name="nohpayah" value="<?php echo $siswa->NOMOR_HANDPHONE_AYAH; ?>" required=""> 
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="col-sm-2 col-sm-2 control-label">Pendidikan Ayah</label>
                                      <div class="col-sm-10">
                                      <input type="text" class="form-control" name="pendidikanlayah" value="<?php echo $siswa->PENDIDIKAN_AYAH; ?>" required=""> 
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="col-sm-2 col-sm-2 control-label">Pekerjaan Ayah</label>
                                      <div class="col-sm-10">
                                      <input type="text" class="form-control" name="pekerjaanayah" value="<?php echo $siswa->PEKERJAAN_AYAH; ?>" required=""> 
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="col-sm-2 col-sm-2 control-label">Instansi Ayah</label>
                                      <div class="col-sm-10">
                                      <input type="text" class="form-control" name="instansiayah" value="<?php echo $siswa->INSTANSI_AYAH; ?>" required=""> 
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="col-sm-2 col-sm-2 control-label">Alamat Instansi Ayah</label>
                                      <div class="col-sm-10">
                                      <input type="text" class="form-control" name="alamatinstansiayah" value="<?php echo $siswa->ALAMAT_INSTANSI_AYAH; ?>" required=""> 
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="col-sm-2 col-sm-2 control-label">No. Telepon Instansi Ayah</label>
                                      <div class="col-sm-10">
                                      <input type="text" class="form-control" name="noinstansiayah" value="<?php echo $siswa->NOMOR_TELEPON_INSTANSI_AYAH; ?>" required=""> 
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="col-sm-2 col-sm-2 control-label">Penghasilan</label>
                                      <div class="col-sm-10">
                                      <input type="text" class="form-control" name="penghasilanayah" value="<?php echo $siswa->PENGHASILAN_AYAH; ?>" required=""> 
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="col-sm-2 col-sm-2 control-label">Email Ayah</label>
                                      <div class="col-sm-10">
                                      <input type="text" class="form-control" name="emailayah" value="<?php echo $siswa->EMAIL_AYAH; ?>" required=""> 
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="col-sm-2 col-sm-2 control-label">Nama Ibu</label>
                                      <div class="col-sm-10">
                                      <input type="text" class="form-control" name="namaibu" value="<?php echo $siswa->NAMA_IBU; ?>" required=""> 
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="col-sm-2 col-sm-2 control-label">NIK Ibu</label>
                                      <div class="col-sm-10">
                                      <input type="text" class="form-control" name="nikibu" value="<?php echo $siswa->NIK_IBU; ?>" required=""> 
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="col-sm-2 col-sm-2 control-label">Tempat Lahir Ayah</label>
                                      <div class="col-sm-10">
                                      <input type="text" class="form-control" name="tmplahiribu" value="<?php echo $siswa->TEMPAT_IBU; ?>" required=""> 
                                      </div>
                                  </div>
                                  <div class="form-group">
                                  <label class="col-sm-2 col-sm-2 control-label">Tanggal Lahir Ibu</label>
                                  <div class="col-md-3 col-xs-10">

                                      <div data-date-viewmode="years" data-date-format="yyyy-mm-dd" data-date=""  class="input-append date dpYears">
                                          <input type="text" name="tgllahiribu" readonly="" value="<?php echo $siswa->TANGGAL_IBU; ?>" size="16" class="form-control">
                                              <span class="input-group-btn add-on">
                                                <button class="btn btn-danger" type="button"><i class="icon-calendar"></i></button>
                                              </span>
                                          </div>
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="col-sm-2 col-sm-2 control-label">No Telepon Ibu</label>
                                      <div class="col-sm-10">
                                      <input type="text" class="form-control" name="nohpibu" value="<?php echo $siswa->NOMOR_HANDPHONE_IBU; ?>" required=""> 
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="col-sm-2 col-sm-2 control-label">Pendidikan Ibu</label>
                                      <div class="col-sm-10">
                                      <input type="text" class="form-control" name="pendidikanlibu" value="<?php echo $siswa->PENDIDIKAN_IBU; ?>" required=""> 
                                      </div>
                                  </div>
                                  
                                  <div class="form-group">
                                      <label class="col-sm-2 col-sm-2 control-label">Pekerjaan Ibu</label>
                                      <div class="col-sm-10">
                                      <input type="text" class="form-control" name="pekerjaanibu" value="<?php echo $siswa->PEKERJAAN_IBU; ?>" required=""> 
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="col-sm-2 col-sm-2 control-label">Instansi Ibu</label>
                                      <div class="col-sm-10">
                                      <input type="text" class="form-control" name="instansiibu" value="<?php echo $siswa->INSTANSI_IBU; ?>" required=""> 
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="col-sm-2 col-sm-2 control-label">Alamat Instansi Ibu</label>
                                      <div class="col-sm-10">
                                      <input type="text" class="form-control" name="alamatinstansiibu" value="<?php echo $siswa->ALAMAT_INSTANSI_IBU; ?>" required=""> 
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="col-sm-2 col-sm-2 control-label">No. Telepon Instansi Ibu</label>
                                      <div class="col-sm-10">
                                      <input type="text" class="form-control" name="noinstansiibu" value="<?php echo $siswa->NOMOR_TELEPON_INSTANSI_IBU; ?>" required=""> 
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="col-sm-2 col-sm-2 control-label">Penghasilan</label>
                                      <div class="col-sm-10">
                                      <input type="text" class="form-control" name="penghasilanibu" value="<?php echo $siswa->PENGHASILAN_IBU; ?>" required=""> 
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="col-sm-2 col-sm-2 control-label">Email Ibu</label>
                                      <div class="col-sm-10">
                                      <input type="text" class="form-control" name="emailibu" value="<?php echo $siswa->EMAIL_IBU; ?>" required=""> 
                                      </div>
                                  </div>
                                  
                                  <div class="form-group">
                                      <label class="col-sm-2 col-sm-2 control-label">Nama Wali</label>
                                      <div class="col-sm-10">
                                      <input type="text" class="form-control" name="namawali" value="<?php echo $siswa->NAMA_WALI; ?>" required=""> 
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="col-sm-2 col-sm-2 control-label">NIK Wali</label>
                                      <div class="col-sm-10">
                                      <input type="text" class="form-control" name="nikwali" value="<?php echo $siswa->NIK_WALI; ?>" required=""> 
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="col-sm-2 col-sm-2 control-label">Tempat Lahir Ayah</label>
                                      <div class="col-sm-10">
                                      <input type="text" class="form-control" name="tmplahirwali" value="<?php echo $siswa->TEMPAT_WALI; ?>" required=""> 
                                      </div>
                                  </div>
                                  <div class="form-group">
                                  <label class="col-sm-2 col-sm-2 control-label">Tanggal Lahir Wali</label>
                                  <div class="col-md-3 col-xs-10">

                                      <div data-date-viewmode="years" data-date-format="yyyy-mm-dd" data-date=""  class="input-append date dpYears">
                                          <input type="text" name="tgllahirwali" readonly="" value="<?php echo $siswa->TANGGAL_WALI; ?>" size="16" class="form-control">
                                              <span class="input-group-btn add-on">
                                                <button class="btn btn-danger" type="button"><i class="icon-calendar"></i></button>
                                              </span>
                                          </div>
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="col-sm-2 col-sm-2 control-label">No Telepon Wali</label>
                                      <div class="col-sm-10">
                                      <input type="text" class="form-control" name="nohpwali" value="<?php echo $siswa->NOMOR_HANDPHONE_WALI; ?>" required=""> 
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="col-sm-2 col-sm-2 control-label">Pendidikan Wali</label>
                                      <div class="col-sm-10">
                                      <input type="text" class="form-control" name="pendidikanlwali" value="<?php echo $siswa->PENDIDIKAN_WALI; ?>" required=""> 
                                      </div>
                                  </div>
                                  
                                  <div class="form-group">
                                      <label class="col-sm-2 col-sm-2 control-label">Pekerjaan Wali</label>
                                      <div class="col-sm-10">
                                      <input type="text" class="form-control" name="pekerjaanwali" value="<?php echo $siswa->PEKERJAAN_WALI; ?>" required=""> 
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="col-sm-2 col-sm-2 control-label">Instansi Wali</label>
                                      <div class="col-sm-10">
                                      <input type="text" class="form-control" name="instansiwali" value="<?php echo $siswa->INSTANSI_WALI; ?>" required=""> 
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="col-sm-2 col-sm-2 control-label">Email Wali</label>
                                      <div class="col-sm-10">
                                      <input type="text" class="form-control" name="emailwali" value="<?php echo $siswa->EMAIL_WALI; ?>" required=""> 
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="col-sm-2 col-sm-2 control-label">Alamat</label>
                                      <div class="col-sm-10">
                                      <input type="text" class="form-control" name="alamat" value="<?php echo $siswa->ALAMAT_RUMAH; ?>" required=""> 
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