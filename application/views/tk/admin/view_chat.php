<div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                              PESAN
                          </header>
                          <div class="panel-body">
                                <div class="adv-table">
                                    <table  class="display table table-bordered table-striped" id="example">
                                      <thead>
                                      <tr>
                                        <th>No</th>
                                        <th>Nama Pengguna</th>
                                        <th>Level</th>
                                        <th>Aksi</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                    <?php 
                                      $no = 1;
                                      foreach($teman as $data):
                                    ?>
                                      <tr>
                                        <td><?php echo $no++?></td>
                                        <td><?php echo $data->NAMA_LENGKAP;?></td>
                                        <td><?php echo $data->LEVEL;?></td>
                                        <td>
                                          <a href="<?php echo base_url();?>admin/home/pesan/<?php echo $data->ID; ?>"><button type="button" class="btn btn-primary btn-sm"><i class="fa fa-check "></i> Kirim Pesan</button></a>
                                      </td>
                                      </tr>
                                      <?php endforeach;?>
                                    </tbody>
                          </table>
                                </div> 
                          </div>
                      </section>
                  </div>
                </div>