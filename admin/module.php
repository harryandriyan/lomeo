<?php

defined ('gis') or die ();

$view = isset ($_GET['view']) ? $_GET['view']:null;
switch ($view) {
	
	//manajemen pariwisata
	case 'pariwisata':
	include_once "view/pariwisata.php";
		break;

	case 'delete_wisata':
	include_once "lib/wisata/del_wisata.php";
		break;

	case 'edit_wisata':
	include_once "lib/wisata/edit_wisata.php";
		break;

	case 'update_wisata':
	include_once "lib/wisata/update_wisata.php";
		break;

	case 'add_wisata':
	include_once "lib/wisata/add_wisata.php";
		break;

	case 'add_wisata_pros':
	include_once "lib/wisata/add_wisata_pros.php";
		break;

	//manajemen kategori
	case 'kategori':
	include_once "view/kategori.php";
		break;

	case 'delete_kat':
	include_once "lib/kategori/del_kat.php";
		break;

	case 'edit_kat':
	include_once "lib/kategori/edit_kat.php";
		break;

	case 'update_kat':
	include_once "lib/kategori/update_kat.php";
		break;

	case 'add_kat':
	include_once "lib/kategori/add_kat.php";
		break;

	case 'add_kat_pros':
	include_once "lib/kategori/add_kat_pros.php";
		break;


		//end

	case 'signout':
	include_once "lib/signout.php";
		break;

	case 'signin':
	include_once "lib/signin.php";
		break;

	//manajemen ADMIN
	case 'admin':
	include_once "view/admin.php";
		break;

	case 'update_admin':
	include_once "lib/admin/update_admin.php";
		break;

	case 'add_admin':
	include_once "lib/admin/add_admin.php";
		break;

	case 'add_admin_pros':
	include_once "lib/admin/add_admin_pros.php";
		break;

		

	//manajemen pesan
	case 'kontak':
	include_once "view/kontak.php";
		break;
		

	case 'delete_pesan':
	include_once "lib/pesan/del_pesan.php";
		break;

	case 'edit_pesan':
	include_once "lib/pesan/edit_pesan.php";
		break;
		
	case 'update_pesan':
	include_once "lib/pesan/update_pesan.php";
		break;
		
	//manajemen user

	case 'user':
	include_once "view/user.php";
		break;


	case 'delete_user':
	include_once "lib/user/del_user.php";
		break;

	case 'edit_user':
	include_once "lib/user/edit_user.php";
		break;
		
	case 'update_user':
	include_once "lib/user/update_user.php";
		break;
	
	//manajemen Kabupaten

	case 'kabupaten':
	include_once "view/kab.php";
		break;


	case 'delete_kabupaten':
	include_once "lib/kab/del_kab.php";
		break;

	case 'edit_kabupaten':
	include_once "lib/kab/edit_kab.php";
		break;
		
	case 'update_kabupaten':
	include_once "lib/kab/update_kab.php";
		break;

	case 'add_kab':
	include_once "lib/kab/add_kab.php";
		break;

	case 'add_kab_pros':
	include_once "lib/kab/add_kab_pros.php";
		break;	

	//manajemen Provinsi

	case 'provinsi':
	include_once "view/prov.php";
		break;


	case 'delete_provinsi':
	include_once "lib/prov/del_prov.php";
		break;

	case 'edit_provinsi':
	include_once "lib/prov/edit_prov.php";
		break;
		
	case 'update_provinsi':
	include_once "lib/prov/update_prov.php";
		break;

	case 'add_prov':
	include_once "lib/prov/add_prov.php";
		break;

	case 'add_prov_pros':
	include_once "lib/prov/add_prov_pros.php";
		break;

	//manajemen Status

	case 'status':
	include_once "view/status.php";
		break;


	case 'delete_status':
	include_once "lib/status/del_stat.php";
		break;

	//manajemen Komentar

	case 'komentar':
	include_once "view/komen.php";
		break;


	case 'delete_komentar':
	include_once "lib/komentar/del_komen.php";
		break;
		
	default:
	include_once "view/home.php";
		break;

}