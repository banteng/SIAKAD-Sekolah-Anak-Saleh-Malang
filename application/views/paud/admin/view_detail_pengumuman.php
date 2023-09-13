<div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                             DETAIL PENGUMUMAN
                          </header><br>
                          <div class="panel-body">
                            <!--<div class="btn-group pull-right">
                                <button type="submit" class="btn btn-danger" onclick="goBack()">KEMBALI</button>
                              </div>-->
                              <div class="form-group">
                                      <label class="col-sm-2 col-sm-2 control-label">Judul</label>
                                      <div class="col-sm-10">
                                      <p><?php echo $pengumuman->JUDUL;?></p> 
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="col-sm-2 col-sm-2 control-label">Isi Pengumuman</label>
                                      <div class="col-sm-10">
                                        <p><?php echo $pengumuman->PENGUMUMAN;?></p> 
                                      </div>
                                  </div>
                                  
                                  <div class="form-group">
                                      <label class="col-sm-2 control-label col-lg-2" for="inputSuccess">Untuk Kelas</label>
                                      <div class="col-lg-10">
                                        <p><?php if($pengumuman->KELAS == 0){echo " - ";}else{echo $pengumuman->KELAS;} ?></p> 
                                      </div>
                                  </div>
                                  
                                  <div class="form-group">
                                      <label class="col-sm-2 col-sm-2 control-label">Untuk Siswa</label>
                                      <div class="col-sm-10">
                                      <p><?php if($pengumuman->SISWA == 0){echo " - ";}else{echo $pengumuman->SISWA;} ?></p> 
                                      </div>
                                  </div>
                  </div>
              </div>

              <script>
                function goBack() {
                window.history.back();
                }
                </script>