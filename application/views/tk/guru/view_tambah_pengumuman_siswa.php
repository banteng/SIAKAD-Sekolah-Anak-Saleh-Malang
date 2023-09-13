<div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                             TAMBAH PENGUMUMAN
                          </header>
                          <div class="panel-body">
                              <form class="form-horizontal tasi-form" method="POST" action="<?php echo base_url();?>guru/home/prosesPengumuman" enctype="multipart/form-data">
                                   <div class="form-group">
                                      <label class="col-sm-2 col-sm-2 control-label">Untuk Siswa</label>
                                      <div class="col-sm-10">
                                        <input read-only="true" type="hidden" class="form-control" name="siswa" value="<?php echo $siswa->NIS;?>"> 
                                        <input type="text" class="form-control" value="<?php echo $siswa->NIS;?> - <?php echo $siswa->NAMA_SISWA;?>" required=""> 
                                         
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="col-sm-2 col-sm-2 control-label">Judul</label>
                                      <div class="col-sm-10">
                                      <input type="text" class="form-control" name="judul" required=""> 
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="col-sm-2 col-sm-2 control-label">Isi Pengumuman</label>
                                      <div class="col-sm-10">
                                        <textarea class="form-control ckeditor" name="isi" rows="6"></textarea>
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="col-sm-2 col-sm-2 control-label">Lampiran File</label>
                                      <div class="col-sm-10">
                                        
                                        <input name="file" type="file" id="image-source"/><br>
                                      </div>
                                  </div>
                                  <button type="submit" class="btn btn-primary">Submit</button>
                                    </form>
                  </div> 
              </div>