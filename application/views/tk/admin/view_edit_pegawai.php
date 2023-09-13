<div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                             EDIT DATA PEGAWAI
                          </header>
                          <div class="panel-body">
                              <form class="form-horizontal tasi-form" method="POST" action="<?php echo base_url();?>tk/admin/home/updatePegawai/<?php echo $pegawai->NIP; ?>" enctype="multipart/form-data">
                                  <div class="form-group">
                                      <label class="col-sm-2 col-sm-2 control-label">NIP</label>
                                      <div class="col-sm-10">
                                      <input type="text" class="form-control" value="<?php echo $pegawai->NIP; ?>" name="nip" required="">
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="col-sm-2 col-sm-2 control-label">NUPTK</label>
                                      <div class="col-sm-10">
                                      <input type="text" class="form-control" value="<?php echo $pegawai->NUPTK; ?>" name="nuptk" required="">
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="col-sm-2 col-sm-2 control-label">Nama Lengkap</label>
                                      <div class="col-sm-10">
                                      <input type="text" class="form-control" name="nama" value="<?php echo $pegawai->NAMA_LENGKAP; ?>" required=""> 
                                      </div>
                                  </div> 
                                  <div class="form-group">
                                      <label class="col-sm-2 col-sm-2 control-label">Jenis Kelamin</label>
                                      <div class="col-sm-10">
                                      <select class="form-control" name="jk" required="">
                                      <?php 
                                          
                                          if($pegawai->JENIS_KELAMIN=="L"){
                                                echo "<option value='1' selected>Laki - laki</option>";
                                          }else if($pegawai->JENIS_KELAMIN=="P"){
                                                echo "<option value='2' selected>Perempuan</option>";
                                          }else{?>
                                                <option value="1">Laki - laki</option>
                                                <option value="2">Perempuan</option>
                                        <?php 
                                          }
                                         ?>
                                      </select> 
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="col-sm-2 col-sm-2 control-label">Tempat Lahir</label>
                                      <div class="col-sm-10">
                                      <input type="text" class="form-control" name="tempat" value="<?php echo $pegawai->TEMPAT_LAHIR; ?>" required=""> 
                                      </div>
                                  </div> 
                                  <div class="form-group">
                                      <label class="col-sm-2 col-sm-2 control-label">Tanggal Lahir</label>
                                      <div class="col-sm-10">
                                      <div class="col-md-3 col-xs-10">
                                      <div data-date-viewmode="years" data-date-format="yyyy-mm-dd" data-date=""  class="input-append date dpYears">
                                          <input type="text" name="tanggal" readonly="" value="<?php echo $pegawai->TANGGAL_LAHIR; ?>" size="16" class="form-control">
                                              <span class="input-group-btn add-on">
                                                <button class="btn btn-danger" type="button"><i class="icon-calendar"></i></button>
                                              </span>
                                      </div>
                                  </div>
                                      </div>
                                  </div> 
                                  <div class="form-group">
                                      <label class="col-sm-2 col-sm-2 control-label">Alamat</label>
                                      <div class="col-sm-10">
                                      <textarea type="text" class="form-control" name="alamat" value="<?php echo $pegawai->ALAMAT; ?>"> </textarea>
                                      </div>
                                  </div> 
                                  
                                  <div class="form-group">
                                      <label class="col-sm-2 col-sm-2 control-label">Nomor Telepon</label>
                                      <div class="col-sm-10">
                                      <input type="text" class="form-control" name="notelp" value="<?php echo $pegawai->NOMOR_TELEPON; ?>" required=""> 
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="col-sm-2 col-sm-2 control-label">Nomor Handphone</label>
                                      <div class="col-sm-10">
                                      <input type="text" class="form-control" name="nohp" value="<?php echo $pegawai->NOMOR_HANDPHONE; ?>" required=""> 
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="col-sm-2 col-sm-2 control-label">Email</label>
                                      <div class="col-sm-10">
                                      <input type="text" class="form-control" name="email" value="<?php echo $pegawai->EMAIL; ?>" > 
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="col-sm-2 col-sm-2 control-label">Status Kepegawaian</label>
                                      <div class="col-sm-10">
                                      <select class="form-control" name="status">
                                            <option>-- Pilih Status Pegawai --</option>
                                                <?php
                                                foreach($status as $data){
                                                    if($data->ID==$pegawai->STATUS_PEGAWAI){
                                                        echo "<option value='".$data->ID."'selected>".$data->STATUS_KEPEGAWAIAN."</option>";
                                                    }else{
                                                    echo "<option value='".$data->ID."'>".$data->STATUS_KEPEGAWAIAN."</option>";
                                                    }
                                                }
                                                ?>
                                        </select>
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="col-sm-2 col-sm-2 control-label">Mulai Bekerja</label>
                                      <div class="col-sm-10">
                                      <div class="col-md-3 col-xs-10">
                                      <div data-date-viewmode="years" data-date-format="yyyy-mm-dd" data-date=""  class="input-append date dpYears">
                                          <input type="text" name="mulaikerja" readonly="" value="<?php echo $pegawai->MULAI_BEKERJA; ?>" size="16" class="form-control">
                                              <span class="input-group-btn add-on">
                                                <button class="btn btn-danger" type="button"><i class="icon-calendar"></i></button>
                                              </span>
                                      </div>
                                  </div>
                                      </div>
                                  </div> 
                                  <div class="form-group">
                                      <label class="col-sm-2 col-sm-2 control-label">Nomor Fingerprint</label>
                                      <div class="col-sm-10">
                                      <input type="text" class="form-control" name="fingerprint" value="<?php echo $pegawai->NO_FINGERPRINT; ?>" required=""> 
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="col-sm-2 col-sm-2 control-label">Foto</label>
                                      <div class="col-sm-10">
                                      <input type="file" name="fotopegawai" size="40"> 
                                      </div>
                                  </div>
                                     <button action="action" onclick="window.history.go(-1); return false;" type="submit" class="btn btn-warning">Kembali</button>
                                     <button type="submit" class="btn btn-primary pull-right">Simpan</button>
                                    </form>
                  </div>
              </div>