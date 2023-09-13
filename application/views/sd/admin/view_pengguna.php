<div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                              PENGGUNA
                          </header>
                          <div class="panel-body">
                          <div class="btn-group">
                                 <a href="<?php echo base_url('sd/admin/tambah-data-siswa');?>"> <button class="btn green">Tambah Data <i class="icon-plus"></i>
                                  </button></a>
                              </div>
                                <div class="adv-table">
                                    <table  class="display table table-bordered table-striped" id="example">
                                      <thead>
                                      <tr>
                                        <th>No</th>
                                        <th>Nama Lengkap</th>
                                        <th>Level</th>
                                        <th>Aksi</th>
                                      </tr>
                                      </thead>
                                      <tbody>
                                      <?php 
                                        $no = 1;
                                        foreach($user as $data):
                                      ?>
                                         <tr>
                                              <td><?php echo $no++?></td>
                                              <td><?php echo $data->NAMA_LENGKAP;?></td>
                                              <td><?php echo $data->LEVEL;?></td>
                                              <td><a href="<?php echo base_url('sd/home/admin/chatNow/');?><?php echo $data->ID;?>">Kirim Pesan</a></td>
                                            </tr>
                                          </form>
                                          </div>
                                          </div>
                                      </div>
                                  <?php endforeach;?>
                          </table>
                                </div>
                                
                          </div>
                      </section>
                  </div>
                </div>

              