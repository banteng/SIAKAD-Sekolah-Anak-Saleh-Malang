<div class="page-wrapper">
            <div class="page-breadcrumb">
            <div class="alert alert-info alert-dismissible fade show" role="alert">
                                    <strong>Info! </strong> Questions and answers that have been made are used to reset the login password.
            </div>
                <div class="row">
                    <div class="col-sm-12 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <?php if ($ar['password'] == $this->session->nis): ?>
                                <h4 class="text-center text-red">*Anda belum mengubah password !</h4>
                                <?php endif ?>
                                <?php if ($this->session->flashdata('repass')): ?>
                                    <script>
                                        Swal.fire('Ganti Password', '<?=$this->session->flashdata("repass");?>', 'info');
                                    </script>
                                <?php endif ?>

                                <h4 class="card-title">Change Password</h4>
                                <form class="mt-3" action="<?=base_url('user/gantipass');?>" method="POST">
                                    <label class="form-control-label">Old Password</label>
                                    <input type="text" class="form-control" name="passLama"><br>
                                    <label class="form-control-label">New Password</label>
                                    <input type="text" class="form-control" name="passBaru"><br>
                                    <label class="form-control-label">Re-type New Password</label>
                                    <input type="text" class="form-control" name="konfirPass"><br>
                                    <div class="form-actions">
                                        <div class="text-right">
                                            <button type="submit" class="btn btn-info">Submit</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <?php if (empty($ar['pertanyaan']) && empty($ar['jawaban'])): ?>
                                <h4 class="text-center text-red">*Anda belum membuat pertanyaan !</h4>
                                <?php endif ?>
                                <?php if ($this->session->flashdata('reper')): ?>
                                    <script>
                                        Swal.fire('Ganti Pertanyaan', '<?=$this->session->flashdata("reper");?>', 'info');
                                    </script>
                                <?php endif ?>
                                <h4 class="card-title">Change Question</h4>
                                <form class="mt-3" action="<?=base_url('user/gantiprtnyan');?>" method="POST">
                                    <label class="form-control-label">Old Password</label>
                                    <input type="text" class="form-control" name="pertanyaan"><br>
                                    <label class="form-control-label">New Password</label>
                                    <input type="text" class="form-control" name="jawaban"><br>
                                    <label class="form-control-label">Re-type New Password</label>
                                    <input type="text" class="form-control" name="konfirJawaban"><br>
                                    <div class="form-actions">
                                        <div class="text-right">
                                            <button type="submit" class="btn btn-info">Submit</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div> 
                </div>
            </div>

            <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Log</h4>
                            </div>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead class="thead-light">
                                        <tr>
                                            <th scope="col">No</th>
                                            <th scope="col">Time</th>
                                            <th scope="col">Browser</th>
                                            <th scope="col">Ip Address</th>
                                            <th scope="col">#</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                        $no = 1;
                                        if (!empty($log)) {
                                        foreach($log as $n){?>
                                       <tr>
                                            <td scope="row"><?=$no++;?></td>
                                            <td><?php $originalDate = $n->log_time;
                                                echo $newDate = date("d M Y h:i:s A", strtotime($originalDate));?></td>
                                            <td><?=$n->log_user_agent;?></td>
                                            <td><?=$n->log_ip;?></td>
                                        <td><?php if($n->log_success == 1){?><button class="btn btn-xs btn-success">Login success</button><?php }else{?> <button class="btn btn-xs btn-danger">Login failed</button><?php }?></td>
                                                
                                        </tr>
                                        <?php } }?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    
