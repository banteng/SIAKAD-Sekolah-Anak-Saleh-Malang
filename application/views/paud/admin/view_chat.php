<div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                             Pesan
                          </header>
                          <div class="panel-body">
                              <form class="form-horizontal tasi-form" method="POST" action="<?php echo base_url();?>paud/admin/home/tambahPesan" enctype="multipart/form-data">
                                  <div class="form-group">
                                      <label class="col-sm-2 col-sm-2 control-label">Untuk </label>
                                      <div class="col-sm-10">
                                      <input type="text" class="form-control" name="untuk" required="">
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="col-sm-2 col-sm-2 control-label">Isi Pesan </label>
                                      <div class="col-sm-10">
                                      <input type="text" class="form-control" name="isi" required=""> 
                                      </div>
                                  </div>

                                   <button action="action" onclick="window.history.go(-1); return false;" type="submit" class="btn btn-warning">Kembali</button>
                                  <button type="submit" class="btn btn-primary pull-right">Simpan</button>
                                    </form>
                  </div>
              </div>
