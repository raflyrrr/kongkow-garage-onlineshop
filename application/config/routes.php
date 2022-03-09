<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$route['logout'] = 'Auth/logout';
// admin kontrol produk
$route['admin/produk'] = 'admin/Produk';
$route['admin/produk/tambah_produk'] = 'admin/Produk/tambah';
$route['admin/produk/proses_tambah_produk'] = 'admin/Produk/proses_tambah';
$route['admin/produk/edit_produk/(:num)'] = 'admin/Produk/edit/$1';
$route['admin/produk/proses_edit_produk/(:num)'] = 'admin/Produk/proses_edit/$1';
$route['admin/produk/hapus_produk/(:num)'] = 'admin/Produk/proses_hapus/$1';
$route['admin/produk/unpublish'] = 'admin/Produk/unpublish';
$route['admin/produk/unpublish/edit_status/(:num)'] = 'admin/Produk/edit_status/$1';
$route['admin/produk/unpublish/proses_edit_status/(:num)'] = 'admin/Produk/edit_status_produk/$1';


//admin kontrol stok
$route['admin/produk/tambah_stok'] = 'admin/Produk/tambah_stok';
$route['admin/produk/proses_tambah_stok'] = 'admin/Produk/proses_tambah_stok';


// admin kontrol kategori
$route['admin/kategori'] = 'admin/Kategori';
$route['admin/kategori/tambah_kategori'] = 'admin/Kategori/tambah';
$route['admin/kategori/proses_tambah_kategori'] = 'admin/Kategori/proses_tambah';
$route['admin/kategori/edit_kategori/(:num)'] = 'admin/Kategori/edit/$1';
$route['admin/kategori/proses_edit_kategori/(:num)'] = 'admin/Kategori/proses_edit/$1';
$route['admin/kategori/hapus_kategori/(:num)'] = 'admin/Kategori/proses_hapus/$1';

//admin kontrol kategori gambar
$route['admin/kategori/gambar'] = 'admin/Kategori/gambar_kategori';
$route['admin/kategori/tambah_kategori_gambar'] = 'admin/Kategori/tambah_gambar_kategori';
$route['admin/kategori/proses_tambah_kategori_gambar'] = 'admin/Kategori/proses_tambah_gambar_kategori';
$route['admin/kategori/edit_kategori_gambar/(:num)'] = 'admin/Kategori/edit_gambar_kategori/$1';
$route['admin/kategori/proses_update_kategori_gambar/(:num)'] = 'admin/Kategori/proses_edit_gambar_kategori/$1';
$route['admin/kategori/hapus_kategori_gambar/(:num)'] = 'admin/Kategori/hapus_gambar_kategori/$1';

//admin kontrol pelanggan
$route['admin/pelanggan'] = 'admin/Pelanggan';
$route['admin/pelanggan/tambah_pelanggan'] = 'admin/Pelanggan/tambah';
$route['admin/pelanggan/proses_tambah_pelanggan'] = 'admin/Pelanggan/proses_tambah';
$route['admin/pelanggan/edit_pelanggan/(:num)'] = 'admin/Pelanggan/edit/$1';
$route['admin/pelanggan/proses_edit_pelanggan/(:num)'] = 'admin/Pelanggan/proses_edit/$1';
$route['admin/pelanggan/hapus_pelanggan/(:num)'] = 'admin/Pelanggan/proses_hapus/$1';

//admin kontrol pelanggan baru dan nonaktif
$route['admin/pelanggan/baru'] = 'admin/Pelanggan/pelanggan_baru';
$route['admin/pelanggan/edit_pelanggan_nonaktif/(:num)'] = 'admin/Pelanggan/edit_pelanggan_nonaktif/$1';
$route['admin/pelanggan/proses_edit_pelanggan_nonaktif/(:num)'] = 'admin/Pelanggan/edit_status_pelanggan_nonaktif/$1';
//admin kontrol banner dan footer
$route['admin/pengaturan/banner'] = 'admin/Pengaturan/banner';
$route['admin/pengaturan/tambah_banner'] = 'admin/Pengaturan/tambah_banner';
$route['admin/pengaturan/proses_tambah_banner'] = 'admin/Pengaturan/proses_tambah_banner';

$route['admin/pengaturan/banner/footer'] = 'admin/Pengaturan/banner_footer';
$route['admin/pengaturan/tambah_banner_footer'] = 'admin/Pengaturan/tambah_banner_footer';

$route['admin/pengaturan/proses_tambah_banner_footer'] = 'admin/Pengaturan/proses_tambah_banner_footer';

//admin kontrol pembayaran masuk atau konfirmasi
$route['admin/konfirmasi/pembayaran/lunas/(:any)'] = 'admin/Transaksi/pembayaran_pesanan/$1';

$route['admin/konfirmasi/pembayaran/lunas/update/status_pesanan/(:any)'] = 'admin/Transaksi/update_status_pesanan/$1';

//kontrol frontend
$route['detail/p/produk/(:any)'] = 'Produk/detail/$1';


$route['produk/p/kategori/(:any)'] = 'Produk/produk_kategori/$1';

$route['riwayat/p/pesanan'] = 'Cart/riwayat';
$route['pesanan/p/konfirmasi/(:any)'] = 'Transaksi/konfirmasi/$1';
$route['konfirmasi/p/cara-konfirmasi-pembayaran'] = 'Transaksi/cara_bayar';
$route['konfirmasi/proses-konfirmasi'] = 'Transaksi/proses_konfirmasi';

$route['tentang/p/deskripsi'] = 'Home/tentang';
$route['tentang/p/kontak'] = 'Home/kontak';
$route['signup/p/buat-akun'] = 'Home/register';
$route['auth/proses_signup'] = 'Auth/signup';

$route['default_controller'] = 'home';
$route['404_override'] = 'notfound';
$route['translate_uri_dashes'] = FALSE;
