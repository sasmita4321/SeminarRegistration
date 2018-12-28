<?php
session_start();
error_reporting(0);
if ($_SESSION['leveluser']!='admin'){
 include "403.php";
}
else{
include "../config/koneksi.php";
include "../config/library.php";
include "../config/fungsi_indotgl.php";
include "../config/fungsi_combobox.php";
include "../config/class_paging.php";
include "../config/fungsi_rupiah.php";

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Seminar Registration Aplication for Participant</title>

    <!-- Bootstrap Core CSS -->
    <link href="bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- DataTables CSS -->
    <link href="bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="bower_components/datatables-responsive/css/dataTables.responsive.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<?php
 $id	= $_SESSION['iduser'];
			
			$sq=mysql_query("SELECT * FROM tb_data_user WHERE id_user='$id'");
							$y=mysql_fetch_array($sq);	

?>
<body>

    <div id="wrapper">
	<!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <div class="navbar-brand">			
				<?php
				date_default_timezone_set("Asia/Jakarta");
				$b = time();
				$hour = date("G",$b);
				if ($hour>=0 && $hour<=11)
				{
				echo "Selamat Pagi ";
				}
				elseif ($hour >=12 && $hour<=14)
				{
				echo "Selamat Siang ";
				}
				elseif ($hour >=15 && $hour<=17)
				{
				echo "Selamat Sore ";
				}
				elseif ($hour >=17 && $hour<=18)
				{
				echo "Selamat Petang ";
				}
				elseif ($hour >=19 && $hour<=23)
				{
				echo "Selamat Malam ";
				}
				$danz=$_SESSION['nikuser'];
				$tz=(mysql_query("SELECT * FROM tb_datauser WHERE nik='$danz'"));
				$z=mysql_fetch_array($tz);	 
				
					echo "<b>$z[nama]</b>"; 					
				?>
				</div>
            </div>
            <!-- /.navbar-header -->
            <ul class="nav navbar-top-links navbar-right">
               
                <!-- /.dropdown -->
                
               
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#" data-toggle='modal' data-target='#myModal1'><i class="fa fa-user fa-fw"></i> <?php echo" $z[nama]  ";?></a>
                        </li>
                        <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="../logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
<?php
						$teris=$_SESSION['iduser'];
						$tz1=(mysql_query("SELECT * FROM tb_user WHERE id_user='$teris'"));
						$z1=mysql_fetch_array($tz1);	 
						$tz=(mysql_query("SELECT * FROM tb_data_user WHERE id_user='$teris'"));
						$z=mysql_fetch_array($tz);	
?>
<?php
include "menu_admin.php";
include "konten.php";  
echo"
<div class='panel-body'>
                            
                            <div class='modal fade' id='myModal1' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>
                                <div class='modal-dialog'>
                                    <div class='modal-content'>
                                        <div class='modal-header'>
                                            <button type='button' class='close' data-dismiss='modal' aria-hidden='true'>&times;</button>
                                            <h4 class='modal-title' id='myModalLabel'>Profile Anda</h4>
                                        </div>
                                        <div class='modal-body'>
                                           <div class='form-group'>
							   <table width='100%'>
							   <tr>
                                          <td width='22%'>
									
                     
                        <img src='foto_profil/$z[foto]' class='img-polaroid' style='width:90px;border:4px solid #DCDCDC;'/>
                   
										  </td>
                                          <td> 
										  <table width='100%'>
											<tr>
                                          <td width='30%'><p class='text-primary'>NIK</p></td>
                                          <td><p class='text-muted'>:&nbsp; $z[nik]</p></td>
											</tr>
											<tr>
                                          <td><p class='text-primary'>Nama Lengkap</p></td>
                                          <td><p class='text-muted'>:&nbsp; $z[nama]</p></td>
											</tr>
											<tr>
                                          <td><p class='text-primary'>Tempat, Tgl. Lahir</p></td>";
										  $tgl=tgl_indo($z['tg_lahir']);
                                          echo"<td><p class='text-muted'>:&nbsp; $z[tp_lahir] , $tgl</p></td>
											</tr>
											<tr>
                                          <td><p class='text-primary'>Jenis Kelamin</p></td>";
										  if ($z[gender]==L) {
											  $jk="Pria";
										  }
										  else {
											  $jk="Wanita";
										  }
										  
										  if ($z[status_kw]==BN) {
											  $sk="Belum Nikah";
										  }
										  elseif ($z[status_kw]==N) {
											  $sk="Nikah";
										  }
										  elseif ($z[status_kw]==J) {
											  $sk="Janda";
										  }
										  elseif ($z[status_kw]==D) {
											  $sk="Duda";
										  }
										  else {
											  $sk="-";
										  }
										  
                                          echo" <td><p class='text-muted'>:&nbsp; $jk</p></td>
											</tr>
											<tr>
                                          <td><p class='text-primary'>Status Perkawinan</p></td>
                                          <td><p class='text-muted'>:&nbsp; $sk</p></td>
											</tr>
											<tr>
											
                                          <td><p class='text-primary'>Alamat</p></td>
                                          <td><p class='text-muted'>:&nbsp; $z[alamat]</p></td>
											</tr>
											</table>
											</td>
											</tr>
											
											</table>
											<table width='100%'>
							   <tr>
                                          <td width='22%'>&nbsp;<tb>
										  </td>
                                          <td> 
										  <table width='100%'>
											<tr>
                                          <td width='30%'><p class='text-primary'>Agama</p></td>
                                          <td><p class='text-muted'>:&nbsp; $z[agama]</p></td>
											</tr>
											
											<tr>
                                          <td><p class='text-primary'>No Telpon</p></td>
                                          <td><p class='text-muted'>:&nbsp; $z[no_telp]</p></td>
											</tr>
											<tr>
                                          <td><p class='text-primary'>No Handphone</p></td>
                                          <td><p class='text-muted'>:&nbsp; $z[no_hp]</p></td>
											</tr>
											</table>
											</td>
											</tr>
											</table>
                                        </div> 
                                        </div>
                                        <div class='modal-footer'>
                                            <button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>
                                            <button type='button' class='btn btn-primary' data-toggle='modal' data-target='#myModal2'>Edit Profil</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
						  <div class='modal fade' id='myModal2' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>
                                <div class='modal-dialog'>
                                    <div class='modal-content'>
                                        <div class='modal-header'>
                                            <button type='button' class='close' data-dismiss='modal' aria-hidden='true'>&times;</button>
                                            <h4 class='modal-title' id='myModalLabel'>Edit Profil</h4>
                                        </div>
                                        <div class='modal-body'>
                                           <div class='form-group'>
							   <table width='100%'>
							   <tr>
                                          <td width='22%'>
                        <img src='foto_profil/$z[foto]' class='img-polaroid' style='width:90px;border:4px solid #DCDCDC;'/>
										  </td>
                                          <td> 
										  <table width='100%'>
											<tr>
                                          <td width='30%'><p class='text-primary'>NIK</p></td>
                                          <td><input type=text name='' class='form-control' value=$z[nik]></td>
											</tr>
											<tr>
                                          <td><p class='text-primary'>Nama Lengkap</p></td>
                                          <td><input type=text name='' class='form-control' value=$z[nama]></td>
											</tr>
											<tr>
                                          <td><p class='text-primary'>Tempat, Tgl. Lahir</p></td>";
										  $tgl=tgl_indo($z['tg_lahir']);
                                          echo"<td>
										  
										  <table width='100%'>
										  <tr>
										  <td width='35%'>
										  <input type=text name='' type='text' class='form-control' value=$z[tp_lahir]>
										  </td>
										  <td>
										  <input type=text name='' type='date' class='form-control' value=$z[tg_lahir]>
										  </td>
										  </tr>
										  </table>
										  
										  </td>
										  
											</tr>
											<tr>
                                          <td width='30%'><p class='text-primary'>Jenis Kelamin</p></td>
                                          <td> 
                                                    <input type='radio' name='optionsRadios' id='optionsRadios1' value='option1' checked>Pria
												<input type='radio' name='optionsRadios' id='optionsRadios2' value='option2'>Wanita
											</tr>
											<tr>
                                          <td width='30%'><p class='text-primary'>Status Perkawinan</p></td>
                                          <td><input type=text name='' class='form-control' value=$z[agama]></td>
											</tr>
											<tr>
                                          <td><p class='text-primary'>Alamat</p></td>
                                          <td><textarea class='form-control' rows='1'>$z[alamat]</textarea></td>
											</tr>
											</table>
											</td>
											</tr>
											</table>
											
											<table width='100%'>
							   <tr>
                                          <td width='22%'>&nbsp;<tb>
										  </td>
                                          <td> 
										  <table width='100%'>
											<tr>
                                          <td width='30%'><p class='text-primary'>Agama</p></td>
                                          <td><input type=text name='' class='form-control' value=$z[agama]></td>
											</tr>
											<tr>
                                          <td width='30%'><p class='text-primary'>No. Telepon</p></td>
                                          <td><input type=text name='' class='form-control' value=$z[no_telp]></td>
											</tr>
											<tr>
                                          <td width='30%'><p class='text-primary'>No. Handphone</p></td>
                                          <td><input type=text name=''  class='form-control' value=$z[no_hp]></td>
											</tr>
											<tr>
                                          <td width='30%'><p class='text-primary'>E-Mail</p></td>
                                          <td><input type=text name=''  class='form-control' value=$z[email]></td>
											</tr>
											<tr>
                                          <td width='30%'><p class='text-primary'>Password</p></td>
                                          <td><input type=text name=''  class='form-control' placeholder='Diisi jika ingin merubah password'></td>
											</tr>
											</table>
											</td>
											</tr>
											</table>
                                        </div> 
                                        </div>
                                        <div class='modal-footer'>
                                            <button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>
                                            <button type='button' class='btn btn-primary'>Save changes</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
</div>
";
}
?>

        
  
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- DataTables JavaScript -->
    <script src="bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
    <script src="bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>
    <script src="bower_components/datatables-responsive/js/dataTables.responsive.js"></script>
    
    <!-- Custom Theme JavaScript -->
    <script src="dist/js/sb-admin-2.js"></script>

    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
                responsive: true
        });
    });
    </script>

</body>

</html>
