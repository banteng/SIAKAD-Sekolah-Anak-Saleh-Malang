                
               <?php echo $this->session->flashdata('notif') ?>
                <div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                              IMPORT DATA PEGAWAI
                          </header>
                          <div class="panel-body">
                                <!-- Buat sebuah tag form dan arahkan action nya ke controller ini lagi -->
                               <form class="form-horizontal form-bordered" action="<?php echo base_url("paud/admin/home/doImportPegawai"); ?>" method="post" enctype="multipart/form-data">
                                    
                                    <input type="file" name="file">

                                    <br>
                                    <button type="submit" class="btn btn-info">UPLOAD</button>
                                </form><br>
                                    <a href="<?= base_url("upload/excel/excel-pegawai/template-pegawai.xlsx");?>" target="_blank"><button type="submit" class="btn btn-default">UNDUH TEMPLATE</button></a>
                            </div>
                      </section>
                  </div>
                </div>

               