<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| Hooks
| -------------------------------------------------------------------------
| This file lets you define "hooks" to extend CI without hacking the core
| files.  Please see the user guide for info:
|
|	https://codeigniter.com/user_guide/general/hooks.html
|
*/
$hook['pre_system']  = array(
	'class'     => 'Router',
	'function'  => 'route',
	'filename'  => 'router.php',
	'filepath'  => 'hooks'
);

// cek apakah database sudah sesuai dengan PDD
$hook['post_controller_constructor']  = array(
	'class'     => 'PDD_checker',
	'function'  => 'cek_migrasi',
	'filename'  => 'pdd_checker.php',
	'filepath'  => 'hooks'
);

// tracking desa
$hook['post_controller']  = array(
	'class'     => 'Track_model',
	'function'  => 'track_desa',
	'filename'  => 'Track_model.php',
	'filepath'  => 'models'
);


// $hook['post_controller_constructor'][] = array(
//     'function' => 'redirect_ssl',
//     'filename' => 'ssl.php',
//     'filepath' => 'hooks'
// );
