<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                             TAHUN AJARAN
                          </header>
                          <div class="panel-body">
                              <form method="POST" action="<?php echo base_url();?>paud/admin/home/prosesTahunAjaran" enctype="multipart/form-data">
                                <?php if($this->session->flashdata('success')){ ?>
                                    <div class="alert alert-success">
                                        <a href="#" class="close" data-dismiss="alert">&times;</a>
                                        <strong>Success!</strong> <?php echo $this->session->flashdata('success'); ?>
                                    </div>

                                <?php } else if($this->session->flashdata('error')){  ?>

                                    <div class="alert alert-danger">
                                        <a href="#" class="close" data-dismiss="alert">&times;</a>
                                        <strong>Error!</strong> <?php echo $this->session->flashdata('error'); ?>
                                    </div>

                                <?php } else if($this->session->flashdata('warning')){  ?>

                                    <div class="alert alert-warning">
                                        <a href="#" class="close" data-dismiss="alert">&times;</a>
                                        <strong>Warning!</strong> <?php echo $this->session->flashdata('warning'); ?>
                                    </div>

                                <?php } else if($this->session->flashdata('info')){  ?>

                                    <div class="alert alert-info">
                                        <a href="#" class="close" data-dismiss="alert">&times;</a>
                                        <strong>Info!</strong> <?php echo $this->session->flashdata('info'); ?>
                                    </div>
                                <?php }?>
                                  <div class="form-group">
                                      <label class="col-sm-2 col-sm-2 control-label">Tahun Ajaran</label>
                                      <div class="col-sm-10">
                                      <input type="text" class="form-control" name="tahun" value="<?php echo $tahun->TAHUN;?>" required=""><br>
                                      </div>
                                  </div>

                                  <div class="form-group">
                                      <label class="col-sm-2 col-sm-2 control-label">Semester</label>
                                      <div class="col-sm-10">
                                      <select class="form-control" name="semester" required="">
                                      <?php  if($tahun->SEMESTER=="1"){
                                            echo "<option value='1' selected>Ganjil</option> <option value='2'>Genap</option>";
                                        }else if($tahun->SEMESTER=="2"){
                                            echo "<option value='1'>Ganjil</option> <option value='2' selected>Genap</option>";
                                        }else{?>
                                            <option value="">-- PIIH SEMSTER --</option>
                                            <option value="1">Ganjil</option>
                                            <option value="2">Genap</option>
                                        <?php }?>
                                      </select> 
                                      </div>
                                  </div>
                                  <br>
                                  <button action="action" onclick="window.history.go(-1); return false;" type="submit" class="btn btn-warning">Kembali</button>
                                  <button type="submit" class="btn btn-primary pull-right">Simpan</button>
                                    </form>
                  </div>
              </div>