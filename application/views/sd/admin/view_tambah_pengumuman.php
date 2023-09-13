<div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                             TAMBAH PENGUMUMAN
                          </header>
                          <div class="panel-body">
                              <form class="form-horizontal tasi-form" method="POST" action="<?php echo base_url();?>sd/admin/home/prosesPengumuman" enctype="multipart/form-data">
                                  <div class="form-group">
                                      <label class="col-sm-2 col-sm-2 control-label">Judul</label>
                                      <div class="col-sm-10">
                                      <input type="text" class="form-control" name="judul" required=""> 
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="col-sm-2 col-sm-2 control-label">Isi Pengumuman</label>
                                      <div class="col-sm-10">
                                        <!--<textarea class="form-control ckeditor" name="isi" rows="6"></textarea>-->
                                          <textarea id="ckeditor" name="isi"></textarea>
                                          <!--<textarea id="summernote" class="form-control" name="isi" rows="6"></textarea>-->
                                      </div>
                                  </div>
                                    <div class="form-group">
                                      <label class="col-sm-2 col-sm-2 control-label">Lampiran File</label>
                                      <div class="col-sm-10">
                                        <input name="lampiran" type="file"/><br>
                                          <p style="color:red;">*ukuran file max 2 mb</p>
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="col-sm-2 control-label col-lg-2" for="inputSuccess">Untuk Kelas</label>
                                      <div class="col-lg-10">
                                          <?php foreach($kelas as $data):?>
                                          <label class="checkbox-inline">
                                              <input type="checkbox" name="kelas[]" value="<?php echo $data->ID;?>"><?php echo $data->GRADE;?> - <?php echo $data->NAMA_KELAS;?>
                                          </label>
                                         <?php endforeach;?>
                                      </div>
                                  </div>
                                  
                                  <div class="form-group">
                                      <label class="col-sm-2 col-sm-2 control-label">Untuk Siswa</label>
                                      <div class="col-sm-10">
                                          <select class="form-control m-bot15" name="siswa">
                                              <option value="0">-- Pilih Siswa --</option>
                                              <?php foreach($siswa as $data):?>
                                                <option value="<?php echo $data->NIS;?>"><?php echo $data->NIS;?> - <?php echo $data->NAMA_SISWA;?></option>
                                              <?php endforeach;?>
                                          </select>
                                      </div>
                                  </div>
                                  <button action="action" onclick="window.history.go(-1); return false;" type="submit" class="btn btn-warning">Kembali</button>
                                  <button type="submit" class="btn btn-primary">Kirim</button>
                                    </form>
                  </div> 
                      </section>
              </div>
    <script>
      $(document).ready(function() {
            $('#summernote').summernote();
      });
    </script>
                      