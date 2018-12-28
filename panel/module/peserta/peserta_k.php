<?php

session_start();
 if (empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else{
$aksi="media.php";
switch($_GET[aksi]){
default:
echo"
<div id='page-wrapper'>
            <div class='row'>
                <div class='col-lg-12'>
                    <h1 class='page-header'>Jadwal Seminar</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class='row'>
                <div class='col-lg-12'>
                    <div class='panel panel-default'>
                        <div class='panel-heading'>
							<div class='modal fade' id='myModal' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>
                                <div class='modal-dialog'>
                                    <div class='modal-content'>
                                        <div class='modal-header'>
                                            <button type='button' class='close' data-dismiss='modal' aria-hidden='true'>&times;</button>
                                            <h4 class='modal-title' id='myModalLabel'>Tambah User</h4>
                                        </div>
                                        <div class='modal-body'>
                                            <tr>
											<div class='panel-body'>
                            <div class='table-responsive'>
							<form method=POST action='$aksi?p=useradmin&act=tambah'>
                             
										<div class='form-group'>
							   <table width='100%'>
							   <tr>
							   <input type=hidden value=1234 name=user>
							    <input type=hidden value=admin name=level>
								<input type=hidden value=Y name=aktif>
                                          <td width='30%' >NIK</td>
                                          <td>  <input type=text name='nik' class='form-control' placeholder='Cth : 123456789' ></td>
											</tr>
											</table>
                                        </div>
										<div class='form-group'>
							   <table width='100%'>
							   <tr>
                                          <td width='30%' >Nama</td>
                                          <td>  <input type=text name='nama' class='form-control' placeholder='Cth : Terisman Zebua'></td>
											</tr>
											
											</table>
                                        </div>
										<div class='form-group'>
							   <table width='100%'>
							   <tr>
                                          <td width='30%' >Tempat Lahir</td>
                                          <td>  <input type=text name='tplahir' class='form-control' placeholder='Cth : Jakarta'></td>
											</tr>
											
											</table>
                                        </div>
										<div class='form-group'>
							   <table width='100%'>
							   <tr>
                                          <td width='30%' >Tanggal Lahir</td>
                                          <td>  <input type=text name='tglahir' type='date' class='form-control' placeholder='Cth : 12/12/2012'></td>
											</tr>
											
											</table>
                                        </div>
										<div class='form-group'>
							   <table width='100%'>
							   <tr>
                                          <td width='30%' >Alamat</td>
                                          <td>   <textarea name='alamat' class='form-control' rows='3'></textarea></td>
											</tr>
											
											</table>
                                        </div>
										<div class='form-group'>
							   <table width='100%'>
							   <tr>
                                          <td width='30%' >Agama</td>
                                          <td>  <input type=text name='agama' class='form-control' placeholder='Cth : Kristen'></td>
											</tr>
											
											</table>
                                        </div>
										<div class='form-group'>
							   <table width='100%'>
							   <tr>
                                          <td width='30%' >Pekerjaan</td>
                                          <td>  <input type=text name='pekerjaan' class='form-control' placeholder='Cth : Direktur Gerobak'></td>
											</tr>
											
											</table>
                                        </div>
										<div class='form-group'>
							   <table width='100%'>
							   <tr>
                                          <td width='30%' >No Telp</td>
                                          <td>  <input type=text name='telp' class='form-control' placeholder='Cth : 021xxxt'></td>
											</tr>
											
											</table>
                                        </div>
										<div class='form-group'>
							   <table width='100%'>
							   <tr>
                                          <td width='30%' >No Hp</td>
                                          <td>  <input type=text name='hp' class='form-control' placeholder='Cth : 0852xxx'></td>
											</tr>
											
											</table>
                                        </div>
										<div class='form-group'>
							   <table width='100%'>
							   <tr>
                                          <td width='30%' >Upload Foto</td>
                                          <td> <input type='file'></td>
											</tr>
											
											</table>
										
                                        </div>
										
                            </div>
                            <!-- /.table-responsive -->
                        </div>
											</tr>
										</div>
                                        <div class='modal-footer'>
                                            <button type='button' class='btn btn-default' data-dismiss='modal'><span class='glyphicon glyphicon-remove'></span>&nbsp CLOSE</button>
                                            <button type='submit' class='btn btn-primary'><span class='fa fa-save'></span>&nbsp SAVE</button>
                                        </div>
                                    </div>
									</form>
                                    <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                            </div>
                        </div>
                        <!-- /.panel-heading -->
                        <div class='panel-body'>
                            <div class='dataTable_wrapper'>
                                <table width='100%' class='table table-striped table-bordered table-hover' id='dataTables-example'>
                                    <thead>
                                        <tr>
                                            <th>NIK</th>
                                            <th>Nama Lengkap</th>
                                            <th>Email</th>
											  <th>No Hp</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>";
						
							$tp=mysql_query("SELECT * FROM registrasi WHERE status='PM' ORDER BY id_regist DESC");
							while($rs=mysql_fetch_array($tp)){
								
								$tz=(mysql_query("SELECT * FROM konfir_bayar WHERE nik='$rs[nik]'"));
							$r=mysql_fetch_array($tz);	
							
							$jum1= mysql_num_rows(mysql_query("SELECT * FROM konfir_bayar WHERE nik='$rs[nik]'"));
							$jum2= mysql_num_rows(mysql_query("SELECT * FROM konfir_hadir WHERE nik='$rs[nik]'"));
							$jum3= mysql_num_rows(mysql_query("SELECT * FROM tb_makalah WHERE nik='$rs[nik]'"));
						
                                       echo" <tr class='odd gradeX'>
                                            <td>$rs[nik]</td>
                                            <td>$rs[nama]</td>
											<td>$rs[email]</td>
                                            <td class='center'>$rs[handphone]</td>
                                            <td><form method=POST action='$aksi?p=ppk&aksi=detail&id=$rs[nik]'>
											
                            <button type='submit' class='btn btn-primary btn-xs' data-toggle='modal'>Detail</button>";
 if ($jum1==0)
{ 
echo"&nbsp|&nbsp<button type='button' class='btn btn-danger btn-xs'>Bayar</button>";
}
else
	{ 
echo"&nbsp|&nbsp<button type='button' class='btn btn-success btn-xs'>Bayar</button>";
}

if ($jum2==0)
{ 
echo"&nbsp|&nbsp<button type='button' class='btn btn-danger btn-xs'>Hadir</button>";
}
else
	{ 
echo"&nbsp|&nbsp<button type='button' class='btn btn-success btn-xs'>Hadir</button>";
}

if ($jum3==0)
{ 
echo"&nbsp|&nbsp<button type='button' class='btn btn-danger btn-xs'>Makalah</button>";
}
else
	{ 
echo"&nbsp|&nbsp<button type='button' class='btn btn-success btn-xs'>Makalah</button>";
}

 echo"							
                        		</form>
								
										</td>
                                        </tr>";
							}
                                   echo" </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                           
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
";
break;
case "detail":
echo"
    <div id='page-wrapper'>
            <div class='container-fluid'>
                <div class='row'>
                    <div class='col-lg-12'>
                        <h1 class='page-header'>Detail Registrasi</h1>
                    </div>
					
                    <!-- /.col-lg-12 -->";
					
					
					$tiz=(mysql_query("SELECT * FROM registrasi WHERE nik='$_GET[id]'"));
							$rs=mysql_fetch_array($tiz);
					

							  echo" 
										  <table width='100%'>
											<tr>
                                          <td width='30%'><p class='text-primary'>NIK</p></td>
                                          <td><p class='text-muted'>:&nbsp; $rs[nik]</p></td>
											</tr>
											<tr>
                                          <td><p class='text-primary'>Nama Lengkap</p></td>
                                          <td><p class='text-muted'>:&nbsp; $rs[nama]</p></td>
											</tr>
											
											
											<tr>
                                          <td><p class='text-primary'>Alamat</p></td>
                                          <td><p class='text-muted'>:&nbsp; $rs[alamat]</p></td>
											</tr>
											<tr>
											
                                          <td><p class='text-primary'>Email</p></td>
                                          <td><p class='text-muted'>:&nbsp; $rs[email]</p></td>
											</tr>
											<tr>
											
                                          <td><p class='text-primary'>No. Handphone</p></td>
                                          <td><p class='text-muted'>:&nbsp; $rs[handphone]</p></td>
											</tr>
											<tr>
											
                                          <td colspan='2'><p class='text-muted'><h4>Konfirmasi Pembayaran :</h4></p></td>";
                                         $tizs=(mysql_query("SELECT * FROM konfir_bayar WHERE nik='$_GET[id]'"));
							$rst=mysql_fetch_array($tizs);
											echo"</tr>";
											$jum6= mysql_num_rows(mysql_query("SELECT * FROM konfir_bayar WHERE nik='$_GET[id]'"));
											if ($jum6==0){
											echo "<tr>
											
                                          <td colspan='2'><p class='text-primary'>Belum Konfirmasi Pembayaran</p></td>
                                          
											</tr>
											<tr>";}
											else{
											echo"<tr>
											
                                          <td><p class='text-primary'>Nama Bank</p></td>
                                          <td><p class='text-muted'>:&nbsp; $rst[nbank]</p></td>
											</tr>
											<tr>
											
                                          <td><p class='text-primary'>No. Rekening</p></td>
                                          <td><p class='text-muted'>:&nbsp; $rst[norek]</p></td>
											</tr>
											<tr>
											
                                          <td><p class='text-primary'>Jumlah Transfer</p></td>
                                          <td><p class='text-muted'>:&nbsp; $rst[jum_tf]</p></td>
											</tr>
											<tr>
											
                                          <td><p class='text-primary'>Bukti Transfer</p></td>
                                          <td><p class='text-muted'>:&nbsp; <img src='../file/$rst[file]' class='img-polaroid' style='width:250px;border:4px solid #DCDCDC;'/></p></td>
											</tr>
											";
											if ($rst['status']=='V'){
												$sts='Valid';
											}
											elseif($rst['status']=='T'){
												$sts='Tidak Valid';
											}
											else{
												$sts='Sedang di Validasi';
											}
											echo"<tr>
											
                                          <td><p class='text-primary'>Status</p></td>
                                          <td><p class='text-primary'>:&nbsp; $sts</p></td>
											</tr>";
											}
											
											
											echo"<tr>
											
                                          <td colspan='2'><p class='text-muted'><h4>File Abstrak</h4></p></td>";
                                         $tizss=(mysql_query("SELECT * FROM tb_abstrak WHERE nik='$_GET[id]'"));
							$rsts=mysql_fetch_array($tizss);
											echo"</tr>";
											$jum7= mysql_num_rows(mysql_query("SELECT * FROM tb_abstrak WHERE nik='$_GET[id]'"));
											if ($jum7==0){
											echo "<tr>
											
                                          <td colspan='2'><p class='text-primary'>Belum Upload Abstrak</p></td>
                                          
											</tr>
											<tr>";}
											else{
											echo"<tr>
											
                                          <td><p class='text-primary'>Nama Penulis</p></td>
                                          <td><p class='text-muted'>:&nbsp; $rsts[nama]</p></td>
											</tr>
											<tr>
											
                                          <td><p class='text-primary'>Nama Perguruan Tinggi</p></td>
                                          <td><p class='text-muted'>:&nbsp; $rsts[npt]</p></td>
											</tr>
											<tr>
											
                                          <td><p class='text-primary'>Bidang Ilmu</p></td>
                                          <td><p class='text-muted'>:&nbsp; $rsts[b_ilmu]</p></td>
											</tr>
											<tr>
											
                                          <td><p class='text-primary'>Download File</p></td>
                                          <td><p class='text-muted'>:&nbsp; <a href='../file/$rsts[nm_file]'>$rsts[nm_file]</a></p></td>
											</tr>";}
											

											echo"<tr>
											
                                          <td colspan='2'><p class='text-muted'><h4>Konfirmasi Kehadiran</h4></p></td>";
                                         $tizs=(mysql_query("SELECT * FROM konfir_hadir WHERE nik='$_GET[id]'"));
							$rst=mysql_fetch_array($tizs);
											echo"</tr>";
											$jum6= mysql_num_rows(mysql_query("SELECT * FROM konfir_hadir WHERE nik='$_GET[id]'"));
											if ($jum6==0){
											echo "<tr>
											
                                          <td colspan='2'><p class='text-primary'>Belum Konfirmasi Kehadiran</p></td>
                                          
											</tr>
											<tr>";}
											else{
												if($rst['k_hadir']=='Y'){
												$ct='Hadir';	
												}
												else{
													$ct='Tidak Hadir';
												}
											echo"<tr>
											
                                          <td><p class='text-primary'>Kehadiran</p></td>
                                          <td><p class='text-muted'>:&nbsp; $ct</p></td>
											</tr>
											";
											}
											
											echo"<tr>
											
                                          <td colspan='2'><p class='text-muted'><h4>File Makalah :</h4></p></td>";
                                         $tizss=(mysql_query("SELECT * FROM tb_makalah WHERE nik='$_GET[id]'"));
							$rsts=mysql_fetch_array($tizss);
											echo"</tr>";
											$jum7= mysql_num_rows(mysql_query("SELECT * FROM tb_makalah WHERE nik='$_GET[id]'"));
											if ($jum7==0){
											echo "<tr>
											
                                          <td colspan='2'><p class='text-primary'>Belum Upload Makalah</p></td>
                                          
											</tr>
											<tr>";}
											else{
											echo"<tr>
											
                                          <td><p class='text-primary'>Nama Penulis</p></td>
                                          <td><p class='text-muted'>:&nbsp; $rsts[nama]</p></td>
											</tr>
											<tr>
											
                                          <td><p class='text-primary'>Nama Perguruan Tinggi</p></td>
                                          <td><p class='text-muted'>:&nbsp; $rsts[npt]</p></td>
											</tr>
											<tr>
											
                                          <td><p class='text-primary'>Bidang Ilmu</p></td>
                                          <td><p class='text-muted'>:&nbsp; $rsts[b_ilmu]</p></td>
											</tr>
											<tr>
											
                                          <td><p class='text-primary'>Download File</p></td>
                                          <td><p class='text-muted'>:&nbsp; <a href='../file/$rsts[nm_file]'>$rsts[nm_file]</a></p></td>
											</tr>";}
											
											echo"</table>
											</td>
											</tr>
											
											</table>
											
											
                                      
					
					
					
					
					
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>";
break;
}
}

?>