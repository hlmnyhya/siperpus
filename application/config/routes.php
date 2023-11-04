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
|	https://codeigniter.com/userguide3/general/routing.html
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
$route['default_controller'] = 'landing';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['login/auth'] = 'Login/process_login';
$route['logout'] = 'Login/logout';
// Dashboard
$route['dashboard_petugas'] = 'Petugas/Dashboard/index';
$route['petugas_data_anggota'] = 'Petugas/Anggota/index';
$route['petugas_data_anggota_kartu'] = 'Petugas/PrintKartu/cetak_anggota';
$route['petugas_data_kategori'] = 'Petugas/KategoriBuku/index';
$route['petugas_data_penerbit'] = 'Petugas/Penerbit/index';
$route['petugas_data_pengarang'] = 'Petugas/Pengarang/index';
$route['petugas_data_buku'] = 'Petugas/Buku/index';
$route['petugas_data_rak'] = 'Petugas/Rak/index';
$route['petugas_data_petugas'] = 'Petugas/Petugas/index';
$route['petugas_data_peminjaman'] = 'Petugas/Peminjaman/index';
$route['petugas_data_pengembalian'] = 'Petugas/Pengembalian/index';

// Tambah Data Master
$route['petugas_tambah_data_anggota']= 'Petugas/Anggota/tambah_data_aksi';
$route['petugas_tambah_data_petugas']= 'Petugas/Petugas/tambah_data_aksi';
$route['petugas_tambah_data_kategori']= 'Petugas/KategoriBuku/tambah_data_aksi';
$route['petugas_tambah_data_rak']= 'Petugas/Rak/tambah_data_aksi';
$route['petugas_tambah_data_penerbit']= 'Petugas/Penerbit/tambah_data_aksi';
$route['petugas_tambah_data_pengarang']= 'Petugas/Pengarang/tambah_data_aksi';
$route['petugas_tambah_data_buku']= 'Petugas/Buku/tambah_data_aksi';
$route['petugas_tambah_data_peminjaman']= 'Petugas/Peminjaman/tambah_data_aksi';
$route['petugas_tambah_data_pengembalian']= 'Petugas/Pengembalian/tambah_data_aksi';

$route['petugas_peminjaman/tambah_buku/(:any)']= 'Petugas/Peminjaman/Tambah_Buku/$1';
$route['tambah_perminjaman_buku']= 'Petugas/Peminjaman/tambah_data_aksi_buku';

$route['peminjaman_buku/detail/(:any)'] = 'Petugas/Peminjaman/Detail_Peminjaman/$1';
$route['pengembalian_buku/detail/(:any)'] = 'Petugas/Pengembalian/Detail_Pengembalian/$1';
$route['pengembalian_buku/hapus/(:any)'] = 'Petugas/Pengembalian/delete_data_aksi_buku/$1';

$route['anggota/detail/(:any)'] = 'Petugas/Anggota/detail_anggota/$1';
$route['anggota/ubah/(:any)'] = 'Petugas/Anggota/edit_anggota/$1';
$route['anggota/hapus/(:any)'] = 'Petugas/Anggota/delete_data_aksi/$1';
$route['cetak_kartu_anggota/(:any)'] = 'Petugas/PrintKartu/cetak_kartu/$1';

$route['petugas/ubah/(:any)'] = 'Petugas/Petugas/edit_petugas/$1';
$route['petugas/hapus/(:any)'] = 'Petugas/Petugas/delete_data_aksi/$1';

$route['kategori/ubah/(:any)'] = 'Petugas/KategoriBuku/edit_kategori/$1';
$route['kategori/hapus/(:any)'] = 'Petugas/KategoriBuku/delete_data_aksi/$1';

$route['pengarang/ubah/(:any)'] = 'Petugas/Pengarang/edit_pengarang/$1';
$route['pengarang/hapus/(:any)'] = 'Petugas/Pengarang/delete_data_aksi/$1';

$route['penerbit/ubah/(:any)'] = 'Petugas/Penerbit/edit_penerbit/$1';
$route['penerbit/hapus/(:any)'] = 'Petugas/Penerbit/delete_data_aksi/$1';

$route['rak/ubah/(:any)'] = 'Petugas/Rak/edit_rak/$1';
$route['rak/hapus/(:any)'] = 'Petugas/Rak/delete_data_aksi/$1';

$route['buku/ubah/(:any)'] = 'Petugas/Buku/edit_buku/$1';
$route['buku/hapus/(:any)'] = 'Petugas/Buku/delete_data_aksi/$1';

$route['peminjaman/ubah/(:any)'] = 'Petugas/Peminjaman/edit_peminjaman/$1';
$route['peminjaman/hapus/(:any)'] = 'Petugas/Peminjaman/delete_data_aksi/$1';

$route['peminjaman/ubah_buku/(:any)'] = 'Petugas/Peminjaman/edit_peminjaman_buku/$1';
$route['peminjaman/hapus_buku/(:any)'] = 'Petugas/Peminjaman/delete_data_aksi_buku/$1';


$route['petugas_ubah_data_anggota']= 'Petugas/Anggota/update_data_aksi';
$route['petugas_ubah_data_petugas']= 'Petugas/Petugas/update_data_aksi';
$route['petugas_ubah_data_kategori']= 'Petugas/KategoriBuku/update_data_aksi';
$route['petugas_ubah_data_pengarang']= 'Petugas/Pengarang/update_data_aksi';
$route['petugas_ubah_data_penerbit']= 'Petugas/Penerbit/update_data_aksi';
$route['petugas_ubah_data_rak']= 'Petugas/Rak/update_data_aksi';
$route['petugas_ubah_data_buku']= 'Petugas/Buku/update_data_aksi';
$route['petugas_ubah_data_peminjaman']= 'Petugas/Peminjaman/update_data_aksi';
$route['ubah_peminjaman_buku']= 'Petugas/Peminjaman/update_data_aksi_buku';