<div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                              KUSTOM SPP SISWA
                          </header>
                          <div class="panel-body">
                              <div class="btn-group pull-right">
                                  <button class="btn dropdown-toggle" data-toggle="dropdown">Tools <i class="icon-angle-down"></i>
                                  </button>
                                  <ul class="dropdown-menu pull-right">
                                      <li><a href="#">Print</a></li>
                                      <li><a href="#">Save as PDF</a></li>
                                      <li><a href="#">Export to Excel</a></li>
                                  </ul>
                              </div>
                                <div class="adv-table">
                                    <table  class="display table table-bordered table-striped" id="example">
                                      <thead>
                                      <tr>
                                        <th>No</th>
                                        <th>NIS</th>
                                        <th>Nama Lengkap</th>
                                        <th>Kelas</th>
                                        <th>Kustom SPP</th>
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
                                            <a href="#" data-toggle="modal" data-target="#modal_edit<?php echo $data->NIS;?>"><button type="button" class="btn btn-success btn-sm"><i class="fa fa-pencil-square-o "></i> Edit</button></a>
                                            </td>
                                        </tr>
                                        <div class="modal fade" id="modal_edit<?php echo $data->NIS;?>" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
                                          <div class="modal-dialog">
                                          <div class="modal-content">
                                          <div class="modal-header">
                                              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                                              <h3 class="modal-title" id="myModalLabel">EDIT KUSTOM SPP</h3>
                                          </div>
                                          <form class="form-horizontal" method="post" action="<?php echo base_url().'sd/admin/home/editSPP/'.$data->NIS?>">
                                              <div class="modal-body">
                                                    <div class="form-group">
                                                        <label >Nominal SPP:</label>
                                                        <input type="text" class="form-control" value="<?php echo $data->NOMINAL_SPP; ?>"  name="nominal" required="">
                                                    </div>
                                              </div>
                                              <div class="modal-footer">
                                                  <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                                                  <button class="btn btn-primary">Edit</button>
                                              </div>
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

              