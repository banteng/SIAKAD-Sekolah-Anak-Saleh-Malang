<div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                             TAMBAH DATA SISWA
                          </header>
                          <div class="panel-body">
                              <form class="form-horizontal tasi-form"  method="POST" action="<?php echo base_url();?>admin/home/updateKelas" enctype="multipart/form-data">
                                  <div class="form-group">
                                      <label class="col-sm-2 col-sm-2 control-label">Nama Kelas</label>
                                      <div class="col-sm-10">
                                      <input type="text" class="form-control" name="namakelas" value="<?php echo $kelas->NAMA_KELAS; ?>" required=""> 
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="col-sm-2 col-sm-2 control-label">Wali Kelas</label>
                                      <div class="col-sm-10">
                                        <select class="form-control" name="walikelas">
                                            <option> -- Pilih Wali Kelas --</option>
                                            <?php
                                                foreach($wali as $data){
                                                    if($data->NIP==$kelas->WALI_KELAS){
                                                        echo "<option value='".$data->NIP."'selected>".$data->NIP." - ".$data->NAMA_LENGKAP."</option>";
                                                    }else{
                                                        echo "<option value='".$data->NIP."'>".$data->NIP." - ".$data->NAMA_LENGKAP."</option>";
                                                    }
                                                }
                                            ?>
                                        </select> 
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="col-sm-2 col-sm-2 control-label">Nominal SPP</label>
                                      <div class="col-sm-10">
                                      <input type="text" class="form-control"name="nominal" value="<?php echo $kelas->NOMINAL_SPP; ?>" required=""> 
                                      </div>
                                  </div>

                                   <button action="action" onclick="window.history.go(-1); return false;" type="submit" class="btn btn-warning">Kembali</button>
                                  <button type="submit" class="btn btn-primary pull-right">Simpan</button>
                                  
                                    </form>
                  </div>
              </div>