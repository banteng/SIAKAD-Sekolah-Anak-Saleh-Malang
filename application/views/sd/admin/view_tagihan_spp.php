<div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                              TAGIHAN SPP
                          </header>
                          <div class="panel-body">
                          <div class="btn-group pull-right">
                                <a href="<?php echo base_url();?>sd/admin/home/LaporanPembayaran" target="_blank"><button class="btn">Export Excel</button></a>
                              </div>
                                <div class="adv-table">
                                    <table  class="display table table-bordered table-striped" id="example">
                                      <thead>
                                      <tr>
                                        <th>No</th>
                                        <th>NIS</th>
                                        <th>Nama Lengkap</th>
                                        <th>Kelas</th>
                                        <th>Nominal SPP</th>
                                        <th>Aksi</th>
                                      </tr>
                                      </thead>
                                      <tbody>
                                      <?php 
                                          $no = 1;
                                          foreach($spp as $data):
                                          $this->load->helper('currency');
                                          ?>
                                          <tr>
                                            <td><?php echo $no++?></td>
                                            <td><?php echo $data->NIS;?></td>
                                            <td><?php echo $data->NAMA_SISWA;?></td>
                                            <td><?php echo $data->GRADE;?> <?php echo $data->NAMA_KELAS;?></td>
                                            <td>Rp. <?php echo rupiah($data->NOMINAL_SPP);?></td>
                                            <td>
                                            <a href="<?php echo base_url();?>sd/admin/home/detailSPP/<?php echo $data->NIS;?>"><button type="button" class="btn btn-primary btn-sm"><i class="fa fa-eye "></i> Detail</button></a>
                                            </td>
                                          </tr>
                                        <?php endforeach;?>
                          </table>
                                </div>
                          </div>
                      </section>
                  </div>
                </div>