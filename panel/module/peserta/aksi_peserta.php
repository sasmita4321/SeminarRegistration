<?php
session_start();
if (empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else{
include "../../../config/koneksi.php";
include "../../../config/library.php";
include "../../../config/fungsi_thumb.php";
include "../../../config/fungsi_seo.php";

$p=$_GET['p'];
$act=$_GET['act'];
$pass=md5($_POST['user']);

if ($p=='useradmin' AND $act=='hapus'){
  $query="DELETE FROM tb_data_user WHERE id_user='$_GET[id]'";
  $query2="DELETE FROM tb_user WHERE id_user='$_GET[id]'";
  mysql_query($query) or die("Gagal menghapus data");
  mysql_query($query2) or die("Gagal menghapus data");
  header('location:../../media.php?p=useradmin');
}
elseif ($p=='useradmin' AND $act=='tambah'){
  $query="INSERT INTO tb_user(id_user,
								username,
								password,
								level,
								aktif)
								VALUES ('$_POST[nik]',
								'$_POST[nik]',
								'$pass',
								'$_POST[level]',
								'$_POST[aktif]')";
  $query2="INSERT INTO tb_data_user(
									id_user,
									nik,
									nama,
									tp_lahir,
									tg_lahir,
									alamat,
									agama,
									pekerjaan,
									no_telp,
									no_hp) 
						VALUES(
						'$_POST[nik]',
						'$_POST[nik]',
						'$_POST[nama]',
						'$_POST[tplahir]',
						'$_POST[tglahir]',
						'$_POST[alamat]',
						'$_POST[agama]',
						'$_POST[pekerjaan]',
						'$_POST[telp]',
						'$_POST[hp]')";
  
  mysql_query($query) or die("Gagal tambah tb user");
  mysql_query($query2) or die("Gagal tambah tb data user");
  header('location:../../media.php?p=useradmin');
}
}
?>