<div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                              PEMBAYARAN SPP
                          </header>
                          <div class="panel-body">
                          
                                <div class="adv-table">
                                    <table  class="display table table-bordered table-striped" id="example">
                                      <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Bulan</th>
                                            <th>Nominal SPP</th>
                                            <th>Aksi</th>
                                        </tr>
                                      </thead>
                                      <tbody>
                                      <?php 
                                          //ini_set('display_errors',0); 
                                          $no = 1;
                                          foreach ($mon as $bulan): 
                                      ?>
                                          <tr>
                                            <td><?php echo $no++; ?></td>
                                            <td><?php echo $bulan->BULAN;?></td>  
                                            <td><?php echo $spp->NOMINAL_SPP;?></td>
                                              <?php $cek = $this->model_all->cekSPP($spp->NIS, $bulan->ID);?>
                                              <?php //echo $this->db->last_query();die; ?>
                                              <?php if($cek->STATUS == "1"){ ?>
                                             <td><button type="button" class="btn btn-success btn-sm"><i class="fa fa-trash"></i> LUNAS</button></td>
                                        </tr>
                                        <?php 
                                              }else{ ?>
                                           <td><button type="button" class="btn btn-warning btn-sm"><i class="fa fa-trash"></i> BELUM DIBAYAR</button></td>
                                             
                                        <?php 
                                              }
                                        endforeach;?>
                          </table>
                                </div>
                                
                          </div>
                      </section>
                  </div>
                </div>