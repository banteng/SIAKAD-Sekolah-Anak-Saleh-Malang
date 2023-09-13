<div class="page-wrapper">
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-7 align-self-center">
                        <h3 class="page-title text-truncate text-dark font-weight-medium mb-1">Welcome back, <?php echo $this->session->userdata('nama');?>!</h3>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb m-0 p-0">
                                    <li class="breadcrumb-item"><a href="<?=base_url('');?>">Dashboard</a>
                                    </li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                    <div class="col-5 align-self-center">
                        <div class="customize-input float-right">
                            <select class="custom-select custom-select-set form-control bg-white border-0 custom-shadow custom-radius" disabled>
                                <option selected><?=strftime('%A, %d %B %Y')?></option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>

                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Exam Scedule</h4>
                        </div>
                            
						<?php if(count($jdwlujian) > 0) { ?>
                            <div class="table-responsive"> 
                                <table class="table">
                                    <thead class="thead-light">
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Exam</th>
                                            <th scope="col">Subject</th>
                                            <th scope="col">Approximately Time</th>
                                            <th scope="col">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $this->load->library('encrypt');
								$no = 1; 
								foreach($jdwlujian as $ju){ 
									if ($ju->sudah_ikut < 1) { ?>
								<tr>
									<td><?=$no++;?>.</td>
									<td><?=$ju->nama_ujian;?></td>
									<td><?=$ju->mapel;?></td>
                                    <td><?=$ju->waktu;?> Minute</td>
									    <td><button class="btn btn-xs btn-info" data-toggle="modal" data-target="#modalUjian<?=$ju->id_ujian;?>"><i class="fa fa-send"></i> Start Exam</button></td>
                                   
                                </tr>
                                <div id="modalUjian<?=$ju->id_ujian;?>" class="modal fade" tabindex="-1" role="dialog"
                                    aria-hidden="true">
                                    <div class="modal-dialog modal-sm">
                                        <div class="modal-content">
                                            <div class="modal-body p-4">
                                                <div class="text-center">
                                                    <i class="dripicons-information h1 text-info"></i>
                                                    <h4 class="mt-2">Warning!</h4>
                                                    <p class="mt-3">You will do the <b><?=$ju->nama_ujian;?> <?=$ju->mapel;?></b></p>
                                                    <a href="<?php echo base_url($ju->id_ujian);?>" class="btn btn-info my-2">Start Exam</a>
                                                </div>
                                            </div>
                                        </div><!-- /.modal-content -->
                                    </div><!-- /.modal-dialog -->
                                </div><!-- /.modal -->

							
								<?php }									
								} ?>
							</tbody>
						</table>
						<?php }else{ ?>
						<div>
							<h1 class="text-center text-red"><i class="fa fa-warning"></i></h1>
							<h4 class="text-center">Exam not available !</h4>
						</div>
							<?php } ?>
                            </div>
                        </div>
                    </div>  
                </div>

                <!-- UJIAN SELESAI -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Exam History</h4>
                            </div>
                            
						<?php if(count($jdwlujian) > 0) { ?>
                            <div class="table-responsive"> 
                                <table class="table">
                                    <thead class="thead-light">
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Exam</th>
                                            <th scope="col">Subject</th>
                                            <th scope="col">Approximately Time</th>
                                            <th scope="col">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
								$no = 1; 
								foreach($jdwlujian as $ju){ 
								if ($ju->sudah_ikut > 0) { ?>
								<tr>
									<td><?=$no++;?>.</td>
									<td><?=$ju->nama_ujian;?></td>
									<td><?=$ju->mapel;?></td>
									<td><?=$ju->waktu;?> Minute</td>
                                <?php if ($ju->status == 'Y') { ?>
                                    <td><a href="<?=base_url($ju->id_ujian);?>">
                                        <button class="btn btn-primary" type="button">
                                            <span class="spinner-grow spinner-grow-sm" role="status"></span>
                                            Progress...
                                        </button></a></td>
								<?php }
									if ($ju->status == 'N') { ?>
									<td><a href="<?=base_url($ju->id_ujian);?>" class="btn btn-xs btn-danger"><i class="fa fa-check"></i> Finish</a></td>
								<?php } ?>
								<?php }									
								} ?>
							</tbody>
						</table>
						<?php }else{ ?>
						<div>
							<h1 class="text-center text-red"><i class="fa fa-warning"></i></h1>
							<h4 class="text-center">Exam not available !</h4>
						</div>
							<?php } ?>
                            </div>
                        </div>
                    </div>  
                </div>
            </div>
                    
