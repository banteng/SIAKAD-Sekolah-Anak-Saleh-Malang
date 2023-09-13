<?php
$tanggal = date("d-M-Y");
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Laporan_pembayaran_PAUD_".$tanggal.".xls");
?>

<h3>Data Pembayaran SPP PAUD</h3>
    
<table border="1" cellpadding="5">
  <tr>
    <th>No</th>
    <th>NIS</th>
    <th>Nama</th>
    <th>Kelas</th>
    <th>Bulan</th>
    <th>Tahun</th>
    <th>Total Bayar</th>
    <th>Status</th>
  </tr>
 
 <?php 
  $no = 1; 
  foreach($spp as $data){
    echo "<tr>";
    echo "<td>".$no."</td>";
    echo "<td>".$data->NIS."</td>";
    echo "<td>".$data->NAMA_SISWA."</td>";
    echo "<td>".$data->NAMA_KELAS."</td>";
    echo "<td>".$data->BULAN."</td>";
    echo "<td>".$data->TAHUN."</td>";
    echo "<td>".$data->NOMINAL."</td>";
    echo "<td>Lunas</td>";
    echo "</tr>";
    
    $no++;
  }
  ?>
</table>
<br>
<h3>Data Tagihan SPP PAUD</h3>
    
<table border="1" cellpadding="5">
  <tr>
    <th>No</th>
    <th>NIS</th>
    <th>Nama</th>
    <th>Kelas</th>
    <th>Bulan</th>
    <th>Tahun</th>
    <th>Nominal</th>
  </tr>
 
 <?php 
  $no = 1; 
  foreach($tagihan as $data){
    echo "<tr>";
    echo "<td>".$no."</td>";
    echo "<td>".$data->NIS."</td>";
    echo "<td>".$data->NAMA_SISWA."</td>";
    echo "<td>".$data->NAMA_KELAS."</td>";
    echo "<td>".$data->BULAN_TAGIHAN."</td>";
    echo "<td>".$data->TAHUN_TAGIHAN."</td>";
    echo "<td>".$data->NOMINAL_SPP."</td>";
    echo "</tr>";
    
    $no++;
  }
  ?>
</table>