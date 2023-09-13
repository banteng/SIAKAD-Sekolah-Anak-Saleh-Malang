<div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                             TAMBAH DATA TAGIHAN
                          </header>
                          <div class="panel-body">
                              <form class="form-horizontal tasi-form" method="POST" action="<?php echo base_url();?>paud/admin/home/setTagihan" enctype="multipart/form-data">
                                 
                                  <div class="form-group">
                                      <label class="col-sm-2 col-sm-2 control-label">Siswa</label>
                                      <div class="col-sm-10">
                                      <select class="form-control" name="siswa" required="">
                                        <option>-- Pilih Siswa --</option>
                                            <?php
                                            foreach($siswa as $data){
                                                echo "<option value='".$data->NIS."'>".$data->NIS." - ".$data->NAMA_SISWA."</option>";
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
                                  <div class="form-group">
                                      <label class="col-sm-2 col-sm-2 control-label">Kode Tagihan</label>
                                      <div class="col-sm-10">
                                      <select class="form-control" name="tagihan" required="">
                                        <option>-- Pilih Tagihan --</option>
                                        <option value="SYA">SYA</option>
                                        </select>
                                      </div>
                                  </div>
                                   <div class="form-group">
                                      <label class="col-sm-2 col-sm-2 control-label">Bulan Tagihan</label>
                                      <div class="col-sm-10">
                                      <select class="form-control" name="bulan" required="">
                                        <option>-- Pilih Bulan Tagihan --</option>
                                        <option value="1">Januari</option>
                                        <option value="2">Februari</option>
                                        <option value="3">Maret</option>
                                        <option value="4">April</option>
                                        <option value="5">Mei</option>
                                        <option value="6">Juni</option>
                                        <option value="7">Juli</option>
                                        <option value="8">Agustus</option>
                                        <option value="9">September</option>
                                        <option value="10">Oktober</option>
                                        <option value="11">November</option>
                                        <option value="12">Desember</option>
                                        </select>
                                      </div>
                                  </div>

                                   <button action="action" onclick="window.history.go(-1); return false;" type="submit" class="btn btn-warning">Kembali</button>
                                  <button type="submit" class="btn btn-primary pull-right">Simpan</button>
                                    </form>
                  </div>
              </div>
