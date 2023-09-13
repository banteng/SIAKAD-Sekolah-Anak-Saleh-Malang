<?php $this->load->helper('tglindo'); ?>
<div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                              DATA PENILAIAN
                          </header>
                          <div class="panel-body">
                                <div class="adv-table">
                                    <table  class="display table table-bordered table-striped" id="example">
                                      <thead>
                                      <tr>
                                        <th>No</th>
                                        <th>Nama File</th>
                                      </tr>
                                      </thead>
                                      <tbody>
                                      <?php 
                                        $no = 1;
                                        
                                        foreach($pengumuman as $data):
                                      ?>
                                        <?php if($data->LAMPIRAN1 != NULL){?>
                                        <tr>
                                          <td><?php echo $no++; ?></td> 
                                          <td>
                                          <a href="<?php echo base_url()?>upload/pengumuman/<?php echo $data->LAMPIRAN2;?>"><button type="button" class="btn btn-primary btn-sm"><i class="fa fa-eye "></i> Unduh Data</button></a>
                                          </td>
                                        </tr>
                                           <?php }?>
                                        <?php endforeach;?>
                          </table>
                                </div>
                          </div>
                      </section>
                  </div>
                </div>

  