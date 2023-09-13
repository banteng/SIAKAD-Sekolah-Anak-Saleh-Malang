<?php
        $datetime = new DateTime();
		$timezone = new DateTimeZone('Asia/Jakarta');
		$datetime->setTimezone($timezone);
?>
<div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                             PRESENSI PEGAWAI
                          </header>
                          <div class="panel-body">
                              <form class="form-horizontal tasi-form" method="POST" action="<?php echo base_url();?>paud/admin/home/prosesPresensiSiswa" enctype="multipart/form-data">
                              <?php if($this->session->flashdata('status')): ?>
                                <div class="alert alert-<?php echo $this->session->flashdata('clr');?>" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        <?php echo $this->session->flashdata('status');?>
                                    </div>
                              <?php endif; ?>
                              <div class="form-group">
                                      <label class="col-sm-2 col-sm-2 control-label">Tanggal</label>
                                      <div class="col-md-3 col-xs-11">

                                      <div data-date-viewmode="years" data-date-format="yyyy-mm-dd" data-date="<?php echo $datetime->format("Y-m-d");?>"  class="input-append date dpYears">
                                          <input type="text" readonly="" value="<?php echo $datetime->format("Y-m-d");?>" size="16" name="tanggal" class="form-control">
                                              <span class="input-group-btn add-on">
                                                <button class="btn btn-danger" type="button"><i class="icon-calendar"></i></button>
                                              </span>
                                      </div>
                                  </div>
                                  </div>
                              <div class="form-group">
                                      <label class="col-sm-2 col-sm-2 control-label">Pegawai</label>
                                      <div class="col-sm-10">
                                      <select class="form-control" name="siswa" required="">
                                        <option>-- Pilih Pegawai --</option>
                                            <?php
                                            foreach($pegawai as $data){
                                                echo "<option value='".$data->NIP."'>".$data->NIP." - ".$data->NAMA_LENGKAP."</option>";
                                            }
                                            ?>
                                        </select>
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="col-sm-2 col-sm-2 control-label">Status Presensi</label>
                                      <div class="col-sm-10">
                                      <select class="form-control" name="status" required="">
                                        <option value="1">Hadir</option>
                                        <option value="2">Sakit</option>
                                        <option value="3">Izin</option>
                                        <option value="4">Terlambat</option>
                                        </select>
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="col-sm-2 col-sm-2 control-label">Keterangan</label>
                                      <div class="col-sm-10">
                                      <input type="text" class="form-control" name="keterangan" required=""> 
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="col-sm-2 col-sm-2 control-label">Jam Masuk</label>
                                      <div class="col-md-4">
                                          <div class="input-group bootstrap-timepicker">
                                              <input type="text" name="masuk" class="form-control timepicker-24">
                                                <span class="input-group-btn">
                                                <button class="btn btn-default" type="button"><i class="icon-time"></i></button>
                                                </span>
                                          </div>
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="col-sm-2 col-sm-2 control-label">Jam Keluar</label>
                                      <div class="col-md-4">
                                          <div class="input-group bootstrap-timepicker">
                                              <input type="text" name="keluar" class="form-control timepicker-24">
                                                <span class="input-group-btn">
                                                <button class="btn btn-default" type="button"><i class="icon-time"></i></button>
                                                </span>
                                          </div>
                                      </div>
                                  </div>

                                  <button action="action" onclick="window.history.go(-1); return false;" type="submit" class="btn btn-warning">Kembali</button>
                                  <button type="submit" class="btn btn-primary pull-right">Simpan</button>
                                    </form>
                  </div>
              </div>
