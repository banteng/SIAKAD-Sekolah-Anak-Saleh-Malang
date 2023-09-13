<div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                            TAMBAH PEGAWAI
                          </header>
                          <div class="panel-body">
                              <form class="form-horizontal tasi-form"  method="POST" action="<?php echo base_url();?>sd/admin/home/prosesPegawai" enctype="multipart/form-data">
                
                                  <div class="form-group">
                                      <label class="col-sm-2 col-sm-2 control-label">NIP</label>
                                      <div class="col-sm-10">
                                      <input type="text" class="form-control" name="nip" required=""> 
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="col-sm-2 col-sm-2 control-label">NUPTK</label>
                                      <div class="col-sm-10">
                                      <input type="text" class="form-control" name="nuptk" required=""> 
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="col-sm-2 col-sm-2 control-label">Nama Lengkap</label>
                                      <div class="col-sm-10">
                                      <input type="text" class="form-control" name="nama" required=""> 
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="col-sm-2 col-sm-2 control-label">Jenis Kelamin</label>
                                      <div class="col-sm-10">
                                      <select class="form-control" name="jk">
                                        <option>-- Pilih Jenis Kelamin --</option>
                                        <option value="1">Laki - laki</option>
                                        <option value="2">Perempuan</option>
                                      </select>
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="col-sm-2 col-sm-2 control-label">Tempat Lahir</label>
                                      <div class="col-sm-10">
                                      <input type="text" class="form-control" name="tempat" required=""> 
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="col-sm-2 col-sm-2 control-label">Tanggal Lahir</label>
                                      <div class="col-sm-10">
                                      <div class="col-md-3 col-xs-10">
                                      <div data-date-viewmode="years" data-date-format="yyyy-mm-dd" data-date=""  class="input-append date dpYears">
                                          <input type="text" name="tanggal" readonly="" value="" size="16" class="form-control">
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
                                      <textarea type="text" class="form-control" name="alamat" required=""></textarea>
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="col-sm-2 col-sm-2 control-label">Nomor Telepon</label>
                                      <div class="col-sm-10">
                                      <input type="text" class="form-control" name="notelp" > 
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="col-sm-2 col-sm-2 control-label">Nomor Handphone</label>
                                      <div class="col-sm-10">
                                      <input type="text" class="form-control" name="nohp" required=""> 
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="col-sm-2 col-sm-2 control-label">Email</label>
                                      <div class="col-sm-10">
                                      <input type="text" class="form-control" name="email"> 
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="col-sm-2 col-sm-2 control-label">Status Kepegawaian</label>
                                      <div class="col-sm-10">
                                      <select class="form-control" name="status">
                                        <option value="0">-- Pilih Status Kepegawaian --</option>
                                            <?php
                                            foreach($status as $data){
                                                echo "<option value='".$data->STATUS_KEPEGAWAIAN."'>".$data->STATUS_KEPEGAWAIAN."</option>";
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
                                          <input type="text" name="mulaikerja" readonly="" value="" size="16" class="form-control">
                                              <span class="input-group-btn add-on">
                                                <button class="btn btn-danger" type="button"><i class="icon-calendar"></i></button>
                                              </span>
                                      </div>
                                  </div>
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