<div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                             Tambah Data Kelas
                          </header>
                          <div class="panel-body">
                              <form class="form-horizontal tasi-form" method="POST" action="<?php echo base_url();?>paud/admin/home/prosesKelas" enctype="multipart/form-data">
                                  <div class="form-group">
                                      <label class="col-sm-2 col-sm-2 control-label">Nama Kelas</label>
                                      <div class="col-sm-10">
                                      <input type="text" class="form-control" name="namakelas" required=""> 
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="col-sm-2 col-sm-2 control-label">Wali Kelas</label>
                                      <div class="col-sm-10">
                                      <select class="form-control" name="walikelas" required="">
                                        <option>-- Pilih Wali Kelas --</option>
                                            <?php
                                            foreach($wali as $data){
                                                echo "<option value='".$data->NIP."'>".$data->NIP." - ".$data->NAMA_LENGKAP."</option>";
                                            }
                                            ?>
                                        </select>
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="col-sm-2 col-sm-2 control-label">Nominal SPP</label>
                                      <div class="col-sm-10">
                                      <input type="text" class="form-control" name="nominal" required=""> 
                                      </div>
                                  </div>

                                   <button action="action" onclick="window.history.go(-1); return false;" type="submit" class="btn btn-warning">Kembali</button>
                                  <button type="submit" class="btn btn-primary pull-right">Simpan</button>
                                    </form>
                  </div>
              </div>
