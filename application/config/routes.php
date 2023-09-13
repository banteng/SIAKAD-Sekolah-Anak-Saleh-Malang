<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/

$route['default_controller']           = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

//START ROUTES PAUD
$route['paud']                                  = 'paud/paud';

//START ROUTES ADMIN
$route['paud/admin/login']                      = 'paud/admin/login/do_login';
$route['paud/admin/logout']                     = 'paud/admin/login/logout';
$route['paud/admin/dashboard']                  = 'paud/admin/home/index';
$route['paud/admin/kelas']                      = 'paud/admin/home/dataKelas';
$route['paud/admin/siswa/(:any)']               = 'paud/admin/home/dataSiswa/$1';
$route['paud/admin/pegawai']                    = 'paud/admin/home/dataPegawai';
$route['paud/admin/siswa-kelas']                = 'paud/admin/home/dataSiswaKelas';
$route['paud/admin/tambah-data-kelas']          = 'paud/admin/home/tambahKelas';
$route['paud/admin/tambah-siswa']               = 'paud/admin/home/tambahSiswa';
$route['paud/admin/tambah-pegawai']             = 'paud/admin/home/tambahPegawai';
$route['paud/admin/status-pegawai']             = 'paud/admin/home/statusPegawai';
$route['paud/admin/tambah-status-pegawai']      = 'paud/admin/home/tambahStatusPegawai';
$route['paud/admin/presensi-siswa']             = 'paud/admin/home/dataPresensiSiswa';
$route['paud/admin/tambah-presensi-siswa']      = 'paud/admin/home/tambahPresensiSiswa';
$route['paud/admin/presensi-manual-siswa']      = 'paud/admin/home/dataPresensiManualSiswa';
$route['paud/admin/presensi-pegawai']           = 'paud/admin/home/dataPresensiPegawai';
$route['paud/admin/tambah-presensi-pegawai']    = 'paud/admin/home/tambahPresensiPegawai';
$route['paud/admin/cms']                        = 'paud/admin/home/cms';
$route['paud/admin/pengumuman']                 = 'paud/admin/home/pengumuman';
$route['paud/admin/tambah-pengumuman']          = 'paud/admin/home/setPengumuman';
$route['paud/admin/pesan']                      = 'paud/admin/home/Pesan';
$route['paud/admin/pengguna']                   = 'paud/admin/home/pengguna';
$route['paud/admin/pembayaran-lain']            = 'paud/admin/home/pembayaranLain';  
$route['paud/admin/tambah-pembayaran-lain']     = 'paud/admin/home/tambahPembayaranLain';
$route['paud/admin/buat-tagihan']               = 'paud/admin/home/tambahTagihan';
$route['paud/admin/tagihan-spp']                = 'paud/admin/home/tagihanSPP';
$route['paud/admin/kustom-spp']                 = 'paud/admin/home/kustomSPP';
$route['paud/admin/tahun-ajaran']               = 'paud/admin/home/tahunAjaran';
$route['paud/admin/mata-pelajaran']             = 'paud/admin/home/mataKuliah';
$route['paud/admin/import-siswa']               = 'paud/admin/home/importSiswa';
$route['paud/admin/import-pegawai']             = 'paud/admin/home/importPegawai';

$route['paud/admin/tambah-mata-pelajaran']      = 'paud/admin/home/tambahMataKuliah';
$route['paud/admin/edit-mata-pelajaran']        = 'paud/admin/home/editMataKuliah';
$route['paud/admin/hapus-mata-pelajaran']       = 'paud/admin/home/hapusMataKuliah';
$route['paud/admin/reset-password']             = 'paud/admin/home/showResetPassword';
$route['paud/admin/data-tagihan']               = 'paud/admin/home/dataTagihan';
$route['paud/admin/histori-tagihan']            = 'paud/admin/home/historiTagihan';
$route['paud/admin/laporan-keuangan']           = 'paud/admin/home/pilihLaporan';
$route['paud/admin/laporan']                    = 'paud/admin/home/laporan';
//END ROUTES ADMIN

//START ROUTES GURU
$route['paud/guru/login']                       = 'paud/guru/login/do_login';
$route['paud/guru/logout']                      = 'paud/guru/login/logout';
$route['paud/guru/dashboard']                   = 'paud/guru/home/index';
$route['paud/guru/penilaian']                   = 'paud/guru/home/penilaian';
$route['paud/guru/siswa']                       = 'paud/guru/home/siswa';
$route['paud/guru/pesan']                       = 'paud/guru/home/pesan';
$route['paud/guru/pengumuman']                  = 'paud/guru/home/pengumuman';
$route['paud/guru/tambah-pengumuman']           = 'paud/guru/home/setPengumuman';
$route['paud/guru/reset-password']              = 'paud/guru/home/showResetPassword';
//END ROUTES GURU

//START ROUTES SISWA
$route['paud/siswa/login']                      = 'paud/siswa/login/do_login';
$route['paud/siswa/logout']                     = 'paud/siswa/login/logout';
$route['paud/siswa/dashboard']                  = 'paud/siswa/home/index';
$route['paud/siswa/pengumuman']                 = 'paud/siswa/home/pengumuman';
$route['paud/siswa/pesan']                      = 'paud/siswa/home/pesan';
$route['paud/siswa/pembayaran']                 = 'paud/siswa/home/pembayaranSpp';
$route['paud/siswa/absensi']                    = 'paud/siswa/home/absensi';
//END ROUTES SISWA

//START ROUTES KESISWAAN
$route['paud/kesiswaan/login']                  = 'paud/kesiswaan/login/do_login';
$route['paud/kesiswaan/logout']                 = 'paud/kesiswaan/login/logout';
$route['paud/kesiswaan/dashboard']              = 'paud/kesiswaan/home/index';
$route['paud/kesiswaan/absensi']                = 'paud/kesiswaan/home/absensi';
$route['paud/kesiswaan/pengaduan-maslah']       = 'paud/kesiswaan/home/pengaduan';
//END ROUTES KESISWAAN

//START ROUTES KEUANGAN
$route['paud/keuangan/login']                   = 'paud/keuangan/login/do_login';
$route['paud/keuangan/logout']                  = 'paud/keuangan/login/logout';
$route['paud/keuangan/dashboard']               = 'paud/keuangan/home/index';
$route['paud/keuangan/pembayaran-lain']         = 'paud/keuangan/home/pembayaranLain';
$route['paud/keuangan/buat-tagihan']            = 'paud/keuangan/home/tambahTagihan';
$route['paud/keuangan/penggajian']              = 'paud/keuangan/home/penggajian';
$route['paud/keuangan/pilih-laporan']           = 'paud/keuangan/home/pilihLaporan';
$route['paud/keuangan/laporan']                 = 'paud/keuangan/home/laporan';
$route['paud/keuangan/tagihan-spp']             = 'paud/keuangan/home/tagihanSPP';
//END ROUTES KEUANGAN

//START ROUTES PERPUS
$route['paud/perpustakaan/login']                   = 'paud/perpustakaan/login/do_login';
$route['paud/perpustakaan/logout']                  = 'paud/perpustakaan/login/logout';
$route['paud/perpustakaan/dashboard']               = 'paud/keuangan/home/index';
$route['paud/perpustakaan/data-buku']               = 'paud/perpustakaan/home/dataBuku';
$route['paud/perpustakaan/data-peminjam']           = 'paud/perpustakaan/home/dataPeminjam';
//END ROUTES PERPUS




//END ROUTES PAUD



//START ROUTES SD

$route['sd']                                 = 'sd/sd/index';

//START ROUTES ADMIN
$route['sd/admin/login']                      = 'sd/admin/login/do_login';
$route['sd/admin/logout']                     = 'sd/admin/login/logout';
$route['sd/admin/dashboard']                  = 'sd/admin/home/index';
$route['sd/admin/kelas']                      = 'sd/admin/home/dataKelas';
$route['sd/admin/siswa/(:any)']               = 'sd/admin/home/dataSiswa/$1';
$route['sd/admin/pegawai']                    = 'sd/admin/home/dataPegawai';
$route['sd/admin/siswa-kelas']                = 'sd/admin/home/dataSiswaKelas';
$route['sd/admin/tambah-data-kelas']          = 'sd/admin/home/tambahKelas';
$route['sd/admin/tambah-siswa']               = 'sd/admin/home/tambahSiswa';
$route['sd/admin/tambah-pegawai']             = 'sd/admin/home/tambahPegawai';
$route['sd/admin/status-pegawai']             = 'sd/admin/home/statusPegawai';
$route['sd/admin/tambah-status-pegawai']      = 'sd/admin/home/tambahStatusPegawai';
$route['sd/admin/presensi-siswa']             = 'sd/admin/home/dataPresensiSiswa';
$route['sd/admin/tambah-presensi-siswa']      = 'sd/admin/home/tambahPresensiSiswa';
$route['sd/admin/presensi-manual-siswa']      = 'sd/admin/home/dataPresensiManualSiswa';
$route['sd/admin/presensi-pegawai']           = 'sd/admin/home/dataPresensiPegawai';
$route['sd/admin/tambah-presensi-pegawai']    = 'sd/admin/home/tambahPresensiPegawai';
$route['sd/admin/cms']                        = 'sd/admin/home/cms';
$route['sd/admin/pengumuman']                 = 'sd/admin/home/pengumuman';
$route['sd/admin/tambah-pengumuman']          = 'sd/admin/home/setPengumuman';
$route['sd/admin/pesan']                      = 'sd/admin/home/Pesan';
$route['sd/admin/pengguna']                   = 'sd/admin/home/pengguna';
$route['sd/admin/pembayaran-lain']            = 'sd/admin/home/pembayaranLain';  
$route['sd/admin/tambah-pembayaran-lain']     = 'sd/admin/home/tambahPembayaranLain';
$route['sd/admin/buat-tagihan']               = 'sd/admin/home/tambahTagihan';
$route['sd/admin/tagihan-spp']                = 'sd/admin/home/tagihanSPP';
$route['sd/admin/kustom-spp']                 = 'sd/admin/home/kustomSPP';
$route['sd/admin/tahun-ajaran']               = 'sd/admin/home/tahunAjaran';
$route['sd/admin/mata-pelajaran']             = 'sd/admin/home/mataKuliah';

$route['sd/admin/tambah-mata-pelajaran']      = 'sd/admin/home/tambahMataKuliah';
$route['sd/admin/edit-mata-pelajaran']        = 'sd/admin/home/editMataKuliah';
$route['sd/admin/hapus-mata-pelajaran']       = 'sd/admin/home/hapusMataKuliah';
$route['sd/admin/reset-password']             = 'sd/admin/home/showResetPassword';
$route['sd/admin/data-tagihan']               = 'sd/admin/home/dataTagihan';
$route['sd/admin/histori-tagihan']            = 'sd/admin/home/historiTagihan';

$route['sd/admin/laporan-keuangan']           = 'sd/admin/home/pilihLaporan';
$route['sd/admin/laporan']                    = 'sd/admin/home/laporan';
$route['sd/admin/import-siswa']               = 'sd/admin/home/importSiswa';
$route['sd/admin/import-pegawai']             = 'sd/admin/home/importPegawai';
//END ROUTES ADMIN

//START ROUTES GURU
$route['sd/guru/login']                       = 'sd/guru/login/do_login';
$route['sd/guru/logout']                      = 'sd/guru/login/logout';
$route['sd/guru/dashboard']                   = 'sd/guru/home/index';
$route['sd/guru/penilaian']                   = 'sd/guru/home/penilaian';
$route['sd/guru/siswa']                       = 'sd/guru/home/siswa';
$route['sd/guru/pesan']                       = 'sd/guru/home/pesan';
$route['sd/guru/pengumuman']                  = 'sd/guru/home/pengumuman';
$route['sd/guru/tambah-pengumuman']           = 'sd/guru/home/setPengumuman';
$route['sd/guru/reset-password']              = 'sd/guru/home/showResetPassword';
//END ROUTES GURU

//START ROUTES SISWA
$route['sd/siswa/login']                      = 'sd/siswa/login/do_login';
$route['sd/siswa/logout']                     = 'sd/siswa/login/logout';
$route['sd/siswa/dashboard']                  = 'sd/siswa/home/index';
$route['sd/siswa/pengumuman']                 = 'sd/siswa/home/pengumuman';
$route['sd/siswa/pesan']                      = 'sd/siswa/home/pesan';
$route['sd/siswa/pembayaran']                 = 'sd/siswa/home/pembayaranSpp';
$route['sd/siswa/absensi']                    = 'sd/siswa/home/absensi';
//END ROUTES SISWA

//START ROUTES KESISWAAN
$route['sd/kesiswaan/login']                  = 'sd/kesiswaan/login/do_login';
$route['sd/kesiswaan/logout']                 = 'sd/kesiswaan/login/logout';
$route['sd/kesiswaan/dashboard']              = 'sd/kesiswaan/home/index';
$route['sd/kesiswaan/absensi']                = 'sd/kesiswaan/home/absensi';
$route['sd/kesiswaan/pengaduan-maslah']       = 'sd/kesiswaan/home/pengaduan';
//END ROUTES KESISWAAN

//START ROUTES KEUANGAN
$route['sd/keuangan/login']                   = 'sd/keuangan/login/do_login';
$route['sd/keuangan/logout']                  = 'sd/keuangan/login/logout';
$route['sd/keuangan/dashboard']               = 'sd/keuangan/home/index';
$route['sd/keuangan/pembayaran-lain']         = 'sd/keuangan/home/pembayaranLain';
$route['sd/keuangan/penggajian']              = 'sd/keuangan/home/penggajian';
$route['sd/keuangan/buat-tagihan']            = 'sd/keuangan/home/tambahTagihan';
$route['sd/keuangan/pilih-laporan']           = 'sd/keuangan/home/pilihLaporan';
$route['sd/keuangan/laporan']                 = 'sd/keuangan/home/laporan';
$route['sd/keuangan/tagihan-spp']             = 'sd/keuangan/home/tagihanSPP';
//END ROUTES KEUANGAN

//START ROUTES PERPUS
$route['sd/perpustakaan/login']                   = 'sd/perpustakaan/login/do_login';
$route['sd/perpustakaan/logout']                  = 'sd/perpustakaan/login/logout';
$route['sd/perpustakaan/dashboard']               = 'sd/keuangan/home/index';
$route['sd/perpustakaan/data-buku']               = 'sd/perpustakaan/home/dataBuku';
$route['sd/perpustakaan/data-peminjam']           = 'sd/perpustakaan/home/dataPeminjam';
//END ROUTES PERPUS

//ROUTES TK


//START ROUTES SD

$route['tk']                                       = 'tk/tk/index';

//START ROUTES ADMIN
$route['tk/admin/login']                      = 'tk/admin/login/do_login';
$route['tk/admin/logout']                     = 'tk/admin/login/logout';
$route['tk/admin/dashboard']                  = 'tk/admin/home/index';
$route['tk/admin/kelas']                      = 'tk/admin/home/dataKelas';
$route['tk/admin/siswa/(:any)']               = 'tk/admin/home/dataSiswa/$1';
$route['tk/admin/pegawai']                    = 'tk/admin/home/dataPegawai';
$route['tk/admin/siswa-kelas']                = 'tk/admin/home/dataSiswaKelas';
$route['tk/admin/tambah-data-kelas']          = 'tk/admin/home/tambahKelas';
$route['tk/admin/tambah-siswa']               = 'tk/admin/home/tambahSiswa';
$route['tk/admin/tambah-pegawai']             = 'tk/admin/home/tambahPegawai';
$route['tk/admin/status-pegawai']             = 'tk/admin/home/statusPegawai';
$route['tk/admin/tambah-status-pegawai']      = 'tk/admin/home/tambahStatusPegawai';
$route['tk/admin/presensi-siswa']             = 'tk/admin/home/dataPresensiSiswa';
$route['tk/admin/tambah-presensi-siswa']      = 'tk/admin/home/tambahPresensiSiswa';
$route['tk/admin/presensi-manual-siswa']      = 'tk/admin/home/dataPresensiManualSiswa';
$route['tk/admin/presensi-pegawai']           = 'tk/admin/home/dataPresensiPegawai';
$route['tk/admin/tambah-presensi-pegawai']    = 'tk/admin/home/tambahPresensiPegawai';
$route['tk/admin/cms']                        = 'tk/admin/home/cms';
$route['tk/admin/pengumuman']                 = 'tk/admin/home/pengumuman';
$route['tk/admin/tambah-pengumuman']          = 'tk/admin/home/setPengumuman';
$route['tk/admin/pesan']                      = 'tk/admin/home/Pesan';
$route['tk/admin/pengguna']                   = 'tk/admin/home/pengguna';
$route['tk/admin/pembayaran-lain']            = 'tk/admin/home/pembayaranLain';  
$route['tk/admin/tambah-pembayaran-lain']     = 'tk/admin/home/tambahPembayaranLain';
$route['tk/admin/buat-tagihan']               = 'tk/admin/home/tambahTagihan';
$route['tk/admin/tagihan-spp']                = 'tk/admin/home/tagihanSPP';
$route['tk/admin/kustom-spp']                 = 'tk/admin/home/kustomSPP';
$route['tk/admin/tahun-ajaran']               = 'tk/admin/home/tahunAjaran';
$route['tk/admin/mata-pelajaran']             = 'tk/admin/home/mataKuliah';

$route['tk/admin/tambah-mata-pelajaran']      = 'tk/admin/home/tambahMataKuliah';
$route['tk/admin/edit-mata-pelajaran']        = 'tk/admin/home/editMataKuliah';
$route['tk/admin/hapus-mata-pelajaran']       = 'tk/admin/home/hapusMataKuliah';
$route['tk/admin/reset-password']             = 'tk/admin/home/showResetPassword';
$route['tk/admin/data-tagihan']               = 'tk/admin/home/dataTagihan';
$route['tk/admin/histori-tagihan']            = 'tk/admin/home/historiTagihan';
$route['tk/admin/laporan-keuangan']           = 'tk/admin/home/pilihLaporan';
$route['tk/admin/laporan']                    = 'tk/admin/home/laporan';
$route['tk/admin/import-siswa']               = 'tk/admin/home/importSiswa';
$route['tk/admin/import-pegawai']             = 'tk/admin/home/importPegawai';
//END ROUTES ADMIN

//START ROUTES GURU
$route['tk/guru/login']                       = 'tk/guru/login/do_login';
$route['tk/guru/logout']                      = 'tk/guru/login/logout';
$route['tk/guru/dashboard']                   = 'tk/guru/home/index';
$route['tk/guru/penilaian']                   = 'tk/guru/home/penilaian';
$route['tk/guru/siswa']                       = 'tk/guru/home/siswa';
$route['tk/guru/pesan']                       = 'tk/guru/home/pesan';
$route['tk/guru/pengumuman']                  = 'tk/guru/home/pengumuman';
$route['tk/guru/tambah-pengumuman']           = 'tk/guru/home/setPengumuman';
$route['tk/guru/reset-password']              = 'tk/guru/home/showResetPassword';
//END ROUTES GURU

//START ROUTES SISWA
$route['tk/siswa/login']                      = 'tk/siswa/login/do_login';
$route['tk/siswa/logout']                     = 'tk/siswa/login/logout';
$route['tk/siswa/dashboard']                  = 'tk/siswa/home/index';
$route['tk/siswa/pengumuman']                 = 'tk/siswa/home/pengumuman';
$route['tk/siswa/pesan']                      = 'tk/siswa/home/pesan';
$route['tk/siswa/pembayaran']                 = 'tk/siswa/home/pembayaranSpp';
$route['tk/siswa/absensi']                    = 'tk/siswa/home/absensi';
//END ROUTES SISWA

//START ROUTES KESISWAAN
$route['tk/kesiswaan/login']                  = 'tk/kesiswaan/login/do_login';
$route['tk/kesiswaan/logout']                 = 'tk/kesiswaan/login/logout';
$route['tk/kesiswaan/dashboard']              = 'tk/kesiswaan/home/index';
$route['tk/kesiswaan/absensi']                = 'tk/kesiswaan/home/absensi';
$route['tk/kesiswaan/pengaduan-maslah']       = 'tk/kesiswaan/home/pengaduan';
//END ROUTES KESISWAAN

//START ROUTES KEUANGAN
$route['tk/keuangan/login']                   = 'tk/keuangan/login/do_login';
$route['tk/keuangan/logout']                  = 'tk/keuangan/login/logout';
$route['tk/keuangan/dashboard']               = 'tk/keuangan/home/index';
$route['tk/keuangan/pembayaran-lain']         = 'tk/keuangan/home/pembayaranLain';
$route['tk/keuangan/buat-tagihan']            = 'tk/keuangan/home/tambahTagihan';
$route['tk/keuangan/penggajian']              = 'tk/keuangan/home/penggajian';
$route['tk/keuangan/pilih-laporan']           = 'tk/keuangan/home/pilihLaporan';
$route['tk/keuangan/laporan']                 = 'tk/keuangan/home/laporan';
$route['tk/admin/tagihan-spp']                = 'tk/admin/home/tagihanSPP';
$route['tk/keuangan/tagihan-spp']             = 'tk/keuangan/home/tagihanSPP';
//END ROUTES KEUANGAN


//START ROUTES PERPUS
$route['tk/perpustakaan/login']                   = 'tk/perpustakaan/login/do_login';
$route['tk/perpustakaan/logout']                  = 'tk/perpustakaan/login/logout';
$route['tk/perpustakaan/dashboard']               = 'tk/keuangan/home/index';
$route['tk/perpustakaan/data-buku']               = 'tk/perpustakaan/home/dataBuku';
$route['tk/perpustakaan/data-peminjam']           = 'tk/perpustakaan/home/dataPeminjam';
//END ROUTES PERPUS
