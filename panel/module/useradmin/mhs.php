<?php

session_start();
 if (empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else{
$aksi="module/useradmin/aksi_administrator.php";
switch($_GET[aksi]){
default:
echo"
<div id='page-wrapper'>
            <div class='row'>
                <div class='col-lg-12'>
                    <h1 class='page-header'>Mahasiswa</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class='row'>
                <div class='col-lg-12'>
                    <div class='panel panel-default'>
                        <div class='panel-heading'>
							 <button class='btn btn-primary' data-toggle='modal' data-target='#myModal' ><span class='fa fa-plus-circle'></span>&nbspTambah Mahasiswa</button>
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
                                          <td>  <input type=text name='nama' class='form-control' placeholder='Cth : Dadan Sasmita'></td>
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
                                          <td>  <input type=text name='agama' class='form-control' placeholder='Cth : Islam'></td>
											</tr>
											
											</table>
                                        </div>
										<div class='form-group'>
							   <table width='100%'>
							   <tr>
                                          <td width='30%' >Pekerjaan</td>
                                          <td>  <input type=text name='pekerjaan' class='form-control' placeholder='Cth : Head IT'></td>
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
                                            <th>NRP</th>
                                            <th>Nama Lengkap - JK</th>
                                            <th>Departemen</th>
											  <th>No Hp</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>";
							$tp=mysql_query("SELECT * FROM user WHERE level='mhs' ORDER BY id_user  DESC");
							while($rs=mysql_fetch_array($tp)){
								
								$tz=(mysql_query("SELECT * FROM tb_mahasiswa WHERE id_mhs='$rs[nik]'"));
							$r=mysql_fetch_array($tz);															$tzr=(mysql_query("SELECT * FROM tb_departemen WHERE id_departemen='$r[id_departemen]'"));							$rsd=mysql_fetch_array($tzr);							$tm=(mysql_query("SELECT * FROM tb_datauser WHERE nik='$rs[nik]'"));							$rm=mysql_fetch_array($tm);
							
                                       echo" <tr class='odd gradeX'>
                                            <td>$r[nrp]</td>
                                            <td>$r[nama_lengkap] - $r[jenis_kelamin]</td>																						<td>$rsd[nama_departemen]</td>
                                            <td class='center'>$rm[no_hp]</td>
                                            <td><form method=POST action='$aksi?p=useradmin&act=hapus&id=$rs[id_user]'>
											
                            <button type='button' class='btn btn-primary btn-xs' onClick=\"dataitem = window.open('?p=useradmin&aksi=tambah_administrator',
 'dataitem','width=700px','height=700px'); dataitem.targetitem = targetitem\">Detail</button>&nbsp|&nbsp<button type='button' class='btn btn-primary btn-xs'>Edit</button>&nbsp|&nbsp
							
							
							<button type='submit' class='btn btn-primary btn-xs'>Delete</button>
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
case "tambah_administrator":
echo"
    <div id='page-wrapper'>
            <div class='container-fluid'>
                <div class='row'>
                    <div class='col-lg-12'>
                        <h1 class='page-header'>Tambah User</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>";
break;
}
}

?>