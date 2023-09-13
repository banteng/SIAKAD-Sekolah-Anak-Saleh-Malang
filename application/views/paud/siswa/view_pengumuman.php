<div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                              PENGUMUMAN
                          </header>
                          <div class="panel-body">
                         
                                <div class="adv-table">
                                    <table  class="display table table-bordered table-striped" id="example">
                                      <thead>
                                      <tr>
                                          <th>No</th>
                                          <th>Judul</th>
                                          <th>Tanggal Terbit</th>
                                        </tr>
                                      </thead>
                                      <tbody>
                                      <?php 
                                        $no = 1;
                                        foreach($pengumumansiswa as $data):
                                      ?>
                                        <tr>
                                          <td><?php echo $no++?></td>
                                          <td><?php echo $data->JUDUL;?></td>
                                          <td><?php echo $data->TANGGAL_TERBIT;?></td>
                                          <td>
                                              <a href="<?php echo base_url();?>siswa/lihat-pengumuman/<?php echo $data->ID;?>"><button type="button" class="btn btn-success btn-sm"><i class="fa fa-pencil-square-o "></i> Detail</button></a>
                                            </td>
                                        </tr>
                                        <?php endforeach;?>
                                        <?php 
                                        $no = 1;
                                        foreach($pengumumankelas as $data):
                                      ?>
                                        <tr>
                                          <td><?php echo $no++?></td>
                                          <td><?php echo $data->JUDUL;?></td>
                                          <td><?php echo $data->TANGGAL_TERBIT;?></td>
                                          <td>
                                              <a href="<?php echo base_url();?>siswa/lihat-pengumuman/<?php echo $data->ID;?>"><button type="button" class="btn btn-success btn-sm"><i class="fa fa-pencil-square-o "></i> Detail</button></a>
                                            </td>
                                        </tr>
                                        <?php endforeach;?>
                          </table>
                                </div>
                          </div>
                      </section>
                  </div>
                </div>