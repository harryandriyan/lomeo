<?php

defined ('gis') or die ();

$view = isset ($_GET['view']) ? $_GET['view']:null;
switch ($view) {
	//mapview
	case 'wisata':
	include_once "view/wisata.php";
		break;

	case 'wisata_tampil':
	include_once "view/wisata_tampil.php";
		break;

	case 'wisata_pilih':
	include_once "view/wisata_pilih.php";
		break;

	case 'wisata_kategori':
	include_once "view/wisata_tampil_kat.php";
		break;

	case 'cari_wisata':
	include_once "lib/search/search_hasil_map.php";
		break;

	

	//chat
	case 'chat':
	include_once "view/chat.php";
		break;

		
	//user

	case 'user':
	include_once "view/user.php";
		break;

	case 'kontak':
	include_once "view/kontak.php";
		break;

	case 'edit_user':
	include_once "view/user/edit_user.php";
		break;
	case 'update_user':
	include_once "view/user/update_user.php";
		break;

	//status
	case 'up_status':
	include_once "lib/status/update_status.php";
		break;

	case 'del_status':
	include_once "lib/status/status_hapus.php";
		break;

	//tambahan
	case 'tentang':
	include_once "view/about.php";
		break;
	
	case 'kebijakan':
	include_once "view/kebijakan.php";
		break;
		
	case 'ketentuan':
	include_once "view/tos.php";
		break;
	
	case 'signout':
	include_once "lib/signout.php";
		break;

	case 'kirim_pesan':
	include_once "lib/kirim.php";
		break;

	case 'home':
	include_once "view/home.php";
		break;

	case 'view_user':
	include_once "view/lihat_user.php";
		break;
	
	
	default:
	include_once "view/home.php";
		break;

}