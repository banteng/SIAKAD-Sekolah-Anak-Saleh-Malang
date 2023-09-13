<div class="alert alert-success" role="alert">
    <h3>Selamat Datang, <b><?php echo $this->session->userdata('nama');?></b></h3>
    <h5>Setelah menggunakan aplikasi jangan lupa untuk melakukan <b>logout</b></h5>
</div>
<div class="row state-overview">
    <div class="col-lg-3 col-sm-6">
        <section class="panel">
            <div class="symbol terques">
                <i class="icon-mail-forward"></i>
            </div>
            <div class="value">
                <h1 class="count">
                    0
                </h1>
                <p>Jumlah Kehadiran</p>
            </div>
        </section>
    </div>
    <div class="col-lg-3 col-sm-6">
        <section class="panel">
            <div class="symbol red">
                <i class="icon-archive"></i>
            </div>
            <div class="value">
                <h1 class=" count2">
                    0
                </h1>
                <p>Data Tagihan</p>
            </div>
        </section>
    </div>
    <div class="col-lg-3 col-sm-6">
        <section class="panel">
            <div class="symbol yellow">
                <i class="icon-user"></i>
            </div>
            <div class="value">
                <h1 class=" count3">
                    0
                </h1>
                <p>Pengumuman</p>
            </div>
        </section>
    </div>
    <div class="col-lg-3 col-sm-6">
        <section class="panel">
            <div class="symbol blue">
                <i class="icon-tags"></i>
            </div>
            <div class="value">
                <h1 class=" count4">
                    0
                </h1>
                <p>Pesan</p>
            </div>
        </section>
    </div>
</div>

<div class="col-lg-12 hidden">
    <section class="panel">
        <header class="panel-heading">
            Jadwal Ujian
        </header>
        <table class="table table-advance table-hover">
            <thead>
                <tr>
                    <th>Nama Ujian</th>
                    <th>Mata Pelajaran</th>
                    <th>Waktu</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><a href="#">Vector Ltd</a></td>
                    <td>Lorem Ipsum dorolo imit</td>
                    <td>12120.00$ </td>
                    <td>
                        <button class="btn btn-primary btn-xs"><i class="icon-pencil"></i> Kerjakan</button>
                        <button class="btn btn-primary btn-xs disabled"> Ujian Belum Aktif</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </section>
</div>

<div class="col-lg-12 hidden">
    <section class="panel">
        <header class="panel-heading">
            Hasil Ujian
        </header>
        <table class="table table-advance table-hover">
            <thead>
                <tr>
                    <th>Nama Ujian</th>
                    <th>Mata Pelajaran</th>
                    <th>Waktu</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><a href="#">Vector Ltd</a></td>
                    <td>Lorem Ipsum dorolo imit</td>
                    <td>12120.00$ </td>
                    <td>
                        <button class="btn btn-primary btn-xs"><i class="icon-pencil"></i> Selesai</button>
                        <button class="btn btn-primary btn-xs disabled"> Kerjakan</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </section>
</div>
