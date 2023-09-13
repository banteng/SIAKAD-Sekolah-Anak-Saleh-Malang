                <?php echo $this->session->flashdata('notif') ?>
                <div class="row">
                    <div class="col-lg-12">
                        <section class="panel">
                            <header class="panel-heading">
                                IMPORT DATA SISWA
                            </header>
                            <div class="panel-body">
                                <form class="form-horizontal form-bordered" action="<?php echo base_url("paud/admin/home/doImportSiswa"); ?>" method="post" enctype="multipart/form-data">

                                    <input type="file" name="userfile" class="form-control">

                                    <br /><button type="submit" class="btn btn-info">UPLOAD</button>
                                </form><br>
                                <a href="<?= base_url("upload/excel/excel-pegawai/template-siswa.xlsx");?>" target="_blank"><button type="submit" class="btn btn-default">UNDUH TEMPLATE</button></a>
                            </div>
                        </section>
                    </div>
                </div>
