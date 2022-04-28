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

|	https://codeigniter.com/user_guide/general/routing.html

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

$route['default_controller'] = 'home';


/* KONTAK */

$route['kontak'] = 'home/kontak';

$route['kontak/store'] = 'home/kontak/store';
$route['kontak/periksa/(:any)'] = 'home/kontak/periksa/$1';
$route['kontak/balas/(:any)'] = 'home/kontak/balas/$1';


/* LAYANAN MANDIRI */

$route['layanan_mandiri'] = 'layanan_mandiri/layanan/profil';

$route['layanan_mandiri/login'] = 'layanan_mandiri/auth';

$route['layanan_mandiri/logout'] = 'layanan_mandiri/auth/logout';

$route['layanan_mandiri/profil'] = 'layanan_mandiri/layanan/profil';

$route['layanan_mandiri/ubah_biodata'] = 'layanan_mandiri/layanan/ubah_biodata';

$route['layanan_mandiri/ubah_biodata/(:any)'] = 'layanan_mandiri/layanan/ubah_biodata/$1';

$route['layanan_mandiri/cetak_biodata/(:num)'] = 'layanan_mandiri/layanan/cetak_biodata/$1';

$route['layanan_mandiri/cetak_kk/(:num)'] = 'layanan_mandiri/layanan/cetak_kk/$1';

$route['layanan_mandiri/kartu_peserta/(:num)'] = 'layanan_mandiri/layanan/kartu_peserta/$1';

$route['layanan_mandiri/lapor'] = 'layanan_mandiri/layanan/lapor';

$route['layanan_mandiri/simpan_laporan'] = 'layanan_mandiri/layanan/simpan_laporan';

$route['layanan_mandiri/bantuan'] = 'layanan_mandiri/layanan/bantuan';

$route['layanan_mandiri/artikel'] = 'layanan_mandiri/layanan/artikel';



/* BERITA */
$route['berita/(:any)'] = 'home/berita/$1';


/* OTHERS */

$route['kades/(:any)'] = 'home/kades/$1';

$route['kades'] = 'home/kades';

$route['video/(:any)'] = 'home/video/$1';

$route['video'] = 'home/video';

$route['pembangunan/(:any)'] = 'home/pembangunan/$1';

$route['pembangunan'] = 'home/pembangunan';

$route['layanan/(:any)'] = 'home/layanan/$1';

$route['layanan'] = 'home/layanan';

$route['potensi/(:any)'] = 'home/potensi/$1';

$route['potensi'] = 'home/potensi';

$route['kegiatan/(:any)'] = 'home/kegiatan/$1';

$route['kegiatan'] = 'home/kegiatan';

$route['kegiatan/(:any)'] = 'home/kegiatan/$1';

$route['kegiatan'] = 'home/kegiatan';

$route['agenda/(:any)'] = 'home/agenda/$1';

$route['agenda'] = 'home/agenda';

$route['page/(:any)'] = 'home/page/$1';

$route['page'] = 'home/page';

$route['statistik/list'] = 'home/statistik/list';

$route['statistik/(:any)'] = 'home/statistik/$1';

$route['statistik/(:num)/(:num)'] = 'home/statistik/$1/$2';

$route['wilayah'] = 'home/wilayah';

$route['data-dpt'] = 'home/dpt';

$route['analisis'] = 'home/data_analisis';

$route['analisis/(:num)/(:num)/(:num)'] = 'home/data_analisis/$1/$2/$3';

$route['data-apbdes'] = 'home/apbdes';

$route['data-apbdes/(:num)'] = 'home/apbdes/$1';



/* GALERI */

$route['albums'] = 'home/albums';

$route['galeri/(:num)/(:any)'] = 'home/galeri/$1/$2';

$route['vote'] = 'home/vote';

$route['pemerintah'] = 'home/pemerintah'; 

$route['inventaris'] = 'home/inventaris';

$route['downloads'] = 'home/downloads';



$route['404_override'] = '';

$route['translate_uri_dashes'] = FALSE;

