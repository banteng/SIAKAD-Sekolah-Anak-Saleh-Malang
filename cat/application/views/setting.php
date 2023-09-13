		<div class="row">
		<div class="col-sm-12">
				<div class="callout callout-info">
					<h4><i class="fa fa-info"></i> Info</h4>
					<p>Questions and answers that have been made are used to reset the login password.</p>
				</div>
			</div>

			<div class="col-sm-6">
				<div class="box box-solid">
					<div class="box-header bg-red">
						<h3 class="box-title">Change Password</h3>
					</div>
					<div class="box-body">
						<?php if ($ar['password'] == $this->session->nis): ?>
						<h4 class="text-center text-red">*Anda belum mengubah password !</h4>
						<?php endif ?>
						<?php if ($this->session->flashdata('repass')): ?>
							<script>
								Swal.fire('Ganti Password', '<?=$this->session->flashdata("repass");?>', 'info');
							</script>
						<?php endif ?>
						<form action="<?=base_url('user/gantipass');?>" method="POST">
							<div class="form-group">
								<label for="PasswordLama">Old Password :</label>
								<input class="form-control" type="password" name="passLama" placeholder="Old Password">
							</div>
							<div class="form-group">
								<label for="PasswordBaru">New Password :</label>
								<input type="password" name="passBaru" class="form-control" placeholder="Set New Password">
							</div>
							<div class="form-group">
								<label for="KonfirmasiPassword">Answer Password :</label>
								<input type="password" name="konfirPass" class="form-control" placeholder="Re-type Password">
							</div>
							<button type="submit" class="btn btn-success">Change Password</button>
						</form>
					</div>
				</div>
			</div>
			<div class="col-sm-6">
				<div class="box box-solid">
					<div class="box-header bg-red">
						<h3 class="box-title">Change Question</h3>
					</div>
					<div class="box-body">
						<?php if (empty($ar['pertanyaan']) && empty($ar['jawaban'])): ?>
						<h4 class="text-center text-red">*Anda belum membuat pertanyaan !</h4>
						<?php endif ?>
						<?php if ($this->session->flashdata('reper')): ?>
							<script>
								Swal.fire('Ganti Pertanyaan', '<?=$this->session->flashdata("reper");?>', 'info');
							</script>
						<?php endif ?>
						<form action="<?=base_url('user/gantiprtnyan');?>" method="POST">
							<div class="form-group">
								<label for="PasswordLama">Question :</label>
								<input type="text" name="pertanyaan" class="form-control" placeholder="Set Question" value="<?=$ar['pertanyaan'];?>">
							</div>
							<div class="form-group">
								<label for="PasswordBaru">Answer :</label>
								<input type="text" name="jawaban" class="form-control" placeholder="Set Answer">
							</div>
							<div class="form-group">
								<label for="KonfirmasiPassword">Answer Confirmation :</label>
								<input type="text" name="konfirJawaban" class="form-control" placeholder="Re-type Answer">
							</div>
							<button type="submit" class="btn btn-success">Change Question</button>
						</form>
					</div>
				</div>
			</div>

			<div class="col-sm-12">
				<div class="box box-solid">
					<div class="box-header bg-red">
						<h3 class="box-title">Log</h3>
					</div>
					<div class="box-body">
					<table class="table table-striped table-bordered table-hover" id="tabel-data">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Time</th>
                            <th>Browser</th>
                            <th>Ip Address</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        if (!empty($log)) {
                        foreach($log as $n){?>
                        <tr>
                            <td><?=$no++;?></td>
                            <td><?php $originalDate = $n->log_time;
								   echo $newDate = date("d M Y h:i:s A", strtotime($originalDate));?></td>
                            <td><?=$n->log_user_agent;?></td>
                            <td><?=$n->log_ip;?></td>
						<td><?php if($n->log_success == 1){?><button class="btn btn-xs btn-success">Login success</button><?php }else{?> <button class="btn btn-xs btn-danger">Login failed</button><?php }?></td>
								
                        </tr>
                        <?php }
                        } ?>
                    </tbody>
                </table>
            </div>
				</div>
			</div>

			
		</div>