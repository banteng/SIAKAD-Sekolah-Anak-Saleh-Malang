<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                             LAPORAN KEUANGAN
                          </header>
                          <div class="panel-body">
                              <form method="POST" action="<?php echo base_url();?>paud/admin/laporan" enctype="multipart/form-data">
                                  <div class="form-group">
                                      <label class="col-sm-2 col-sm-2 control-label">Tahun</label>
                                      <div class="col-sm-10">
                                       <select class="form-control" name="tahun" required="">
                                           <option> -- Pilih Tahun -- </option> 
                                           <?php $date= date('Y'); for($x=2018;$x<=2030;$x++){
                                            echo "<option value='$x'> $x </option>";
                                            } ?>
                                      </select> 
                                      </div>
                                  </div><br><br>
                                  
                                  <div class="form-group">
                                      <label class="col-sm-2 col-sm-2 control-label">Semester</label>
                                      <div class="col-sm-10">
                                      <select class="form-control" name="semester" required="">
                                            <option> -- Pilih Semester -- </option> 
                                            <option value='1'>Ganjil</option> 
                                            <option value='2'>Genap</option>
                                      </select> 
                                      </div>
                                  </div><br><br>
                                  <button action="action" onclick="window.history.go(-1); return false;" type="submit" class="btn btn-warning">Kembali</button>
                                  <button type="submit" class="btn btn-primary pull-right">Cari</button>
                                    </form>
                  </div>
              </div>