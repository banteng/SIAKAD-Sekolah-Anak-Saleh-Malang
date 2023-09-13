<div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                              TAGIHAN SPP
                          </header>
                          <div class="panel-body">
                          
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
                                          $this->load->helper('currency');
                                          foreach($spp as $data):
                                          ?>
                                          <tr>
                                            <td><?php echo $no++?></td>
                                            <td><?php echo $data->NIS;?></td>
                                            <td><?php echo $data->NAMA_SISWA;?></td>
                                            <td><?php echo $data->NAMA_KELAS;?></td>
                                            <td>Rp. <?php echo rupiah($data->NOMINAL_SPP);?></td>
                                            <td>
                                            <a href="<?php echo base_url();?>paud/keuangan/home/detailSPP/<?php echo $data->NIS;?>"><button type="button" class="btn btn-primary btn-sm"><i class="fa fa-eye "></i> Detail</button></a>
                                            </td>
                                          </tr>
                                        <?php endforeach;?>
                          </table>
                                </div>
                          </div>
                      </section>
                  </div>
                </div>