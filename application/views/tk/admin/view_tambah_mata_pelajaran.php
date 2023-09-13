<div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                             TAMBAH DATA MATA PELAJARAN
                          </header>
                          <div class="panel-body">
                              <form class="form-horizontal tasi-form"  method="POST" action="<?php echo base_url();?>admin/home/prosesMatkul" enctype="multipart/form-data">
                
                                  <div class="form-group">
                                      <label class="col-sm-2 col-sm-2 control-label">ID Mata Pelajaran</label>
                                      <div class="col-sm-10">
                                      <input type="text" class="form-control" name="idmatpel" required=""> 
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="col-sm-2 col-sm-2 control-label">Nama Mata Pelajaran</label>
                                      <div class="col-sm-10">
                                      <input type="text" class="form-control" name="matpel" required=""> 
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="col-sm-2 col-sm-2 control-label">KKM</label>
                                      <div class="col-sm-10">
                                      <input type="text" class="form-control" name="kkm" required=""> 
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="col-sm-2 col-sm-2 control-label">Kelas</label>
                                      <div class="col-sm-10">
                                      <select class="form-control" name="kelas">
                                        <option>-- Pilih Kelas --</option>
                                            <?php
                                            foreach($kelas as $data){
                                                echo "<option value='".$data->ID."'>".$data->KELAS." - ".$data->NAMA_KELAS."</option>";
                                            }
                                            ?>
                                      </select> 
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="col-sm-2 col-sm-2 control-label">Pengajar</label>
                                      <div class="col-sm-10">
                                      <select class="form-control" name="pengajar">
                                        <option>-- Pilih Pengajar --</option>
                                            <?php
                                            foreach($guru as $data){
                                                echo "<option value='".$data->NIP."'>".$data->NIP." - ".$data->NAMA_LENGKAP."</option>";
                                            }
                                            ?>
                                      </select>
                                      </div>
                                  </div>

                                  <button type="submit" class="btn btn-primary">Submit</button>
                                    </form>
                  </div>
              </div>