<div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                             PEMBAYARAN LAINNYA
                          </header>
                          <div class="panel-body">
                              <form class="form-horizontal tasi-form" method="POST" action="<?php echo base_url();?>paud/admin/home/prosesBayarLain" enctype="multipart/form-data">
                                  <div class="form-group">
                                      <label class="col-sm-2 col-sm-2 control-label">Nama Biaya</label>
                                      <div class="col-sm-10">
                                      <input type="text" class="form-control" name="nama" required=""> 
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="col-sm-2 col-sm-2 control-label">Jumlah Biaya</label>
                                      <div class="col-sm-10">
                                      <input type="text" class="form-control" name="nominal" required=""> 
                                      </div>
                                  </div>
                                  <div class="form-group">
                                  <label class="col-sm-2 col-sm-2 control-label">Batas Bayar</label>
                                  <div class="col-md-3 col-xs-10">

                                      <div data-date-viewmode="years" data-date-format="yyyy-mm-dd" data-date=""  class="input-append date dpYears">
                                          <input type="text" name="batastgl" readonly="" value="" size="16" class="form-control">
                                              <span class="input-group-btn add-on">
                                                <button class="btn btn-danger" type="button"><i class="icon-calendar"></i></button>
                                              </span>
                                      </div>
                                        </div>
                                    </div>
                                  <div class="form-group">
                                      <label class="col-sm-2 col-sm-2 control-label">Keterangan</label>
                                      <div class="col-sm-10">
                                      <textarea type="text" class="form-control" name="keterangan" required=""></textarea>
                                      </div>
                                  </div>

                                  <button action="action" onclick="window.history.go(-1); return false;" type="submit" class="btn btn-warning">Kembali</button>
                                  <button type="submit" class="btn btn-primary pull-right">Simpan</button>
                                    </form>
                  </div>
              </div>