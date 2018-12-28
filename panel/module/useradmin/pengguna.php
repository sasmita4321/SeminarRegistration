<?php
session_start();
 if (empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else{
$aksi="modul/pengguna/aksi_pengguna.php";
switch($_GET[aksi]){
default:
$users=$_GET['id'];
if($users == 'admin') 				
	{
echo "<div class='content'>
	   <div class='workplace'>
		  <p align='right'><a href='?p=pengguna&aksi=tambah_admin' role='button' class='btn'>Tambahkan Administrator</a></p>
            <div class='row-fluid'>
                <div class='span12'>                    
                    <div class='head clearfix'>
                        <div class='isw-grid'></div>
                        <h1>Data Administrator</h1>                               
                    </div>
                    <div class='block-fluid table-sorting clearfix'>
                        <table cellpadding='0' cellspacing='0' width='100%' class='table' id='tSortable'>
                            <thead>
                                <tr>
                                    <th><input type='checkbox' name='checkbox'/></th>
                                    <th width='25%'>Nama Admin</th>
                                    <th width='25%'>Email</th>
                                    <th width='25%'>No. Telpon</th>
                                    <th width='25%'>Aksi</th>                                   
                                </tr>
                            </thead>
                            <tbody>";
							$tp=mysql_query('SELECT * FROM administrator ORDER BY id_a');
							while($r=mysql_fetch_array($tp)){
                             echo"<tr>
                                    <td><input type='checkbox' name='checkbox'/></td>
                                    <td>$r[nama]</td>
                                    <td>$r[email]</td>
                                    <td>$r[no_telp]</td>
                                    <td><a href='?p=pengguna&aksi=editadmin&id=$r[id_a]'>EDIT</a>|
									    <a href='$aksi?p=pengguna&act=hapusadmin&id=$r[nik]' onClick=\"return confirm('Apakah Anda benar-benar mau menghapusnya?')\">HAPUS</td>
                                </tr>";
							}    
                        echo"</tbody>
                        </table>
                    </div>
                </div>                                
            </div>            
            <div class='dr'><span></span></div>            
        </div>
    </div>";   
}
else if($users == 'guru')			
						{
echo "<div class='content'>
	   <div class='workplace'>
            <div class='row-fluid'>
                <div class='span12'>                    
                    <div class='head clearfix'>
                        <div class='isw-grid'></div>
                        <h1>Data Pengguna Guru</h1>                               
                    </div>
                    <div class='block-fluid table-sorting clearfix'>
                        <table cellpadding='0' cellspacing='0' width='100%' class='table' id='tSortable'>
                            <thead>
                                <tr>
                                    <th><input type='checkbox' name='checkbox'/></th>
                                    <th width='25%'>Nama Guru</th>
                                    <th width='25%'>NUPTK</th>
                                    <th width='25%'>Hak Akses</th>
                                    <th width='25%'>Aksi</th>                                   
                                </tr>
                            </thead>
                            <tbody>";
							$tp=mysql_query("SELECT * FROM guru");
							while($r=mysql_fetch_array($tp)){
							$tampil1 = mysql_query("SELECT * FROM users WHERE id_g_a='$r[nik]'");
$r1=mysql_fetch_array($tampil1);
                             echo"<tr>
                                    <td><input type='checkbox' name='checkbox'/></td>
                                    <td>$r[nama]</td>
                                    <td>$r[nuptk]</td>";
									if ($r[nik]==$r1[id_g_a]){
                                    echo"<td>Hak Akses</td>
                                    <td>
									    <a href='$aksi?p=pengguna&act=hapusakses&id=$r1[id_users]' onClick=\"return confirm('Apakah Anda benar-benar ingin menhapus hak akses guru ini?')\">HAPUS HAK AKSES</a></td>
                                </tr>";}
								else{ echo"<td>No Akses</td>
                                    <td>
									    <a href='?p=pengguna&aksi=beriakses&id=$r[id_guru]'>BERI HAK AKSES</a></td>
                                </tr>";
								}
							}          
                        echo"</tbody>
                        </table>
                    </div>
                </div>                                
            </div>            
        </div>
    </div>";   
	}
	else if($users == 'staff')
	{
echo "<div class='content'>
	   <div class='workplace'>
		  <p align='right'><a href='?p=pengguna&aksi=tambah_staff' role='button' class='btn'>Tambahkan Staff</a></p>
            <div class='row-fluid'>
                <div class='span12'>                    
                    <div class='head clearfix'>
                        <div class='isw-grid'></div>
                        <h1>Data Pengguna Staff</h1>                               
                    </div>
                    <div class='block-fluid table-sorting clearfix'>
                        <table cellpadding='0' cellspacing='0' width='100%' class='table' id='tSortable'>
                            <thead>
                                <tr>
									<th><input type='checkbox' name='checkbox'/></th>
                                    <th width='25%'>Nama Staff</th>
                                    <th width='25%'>Email</th>
                                    <th width='25%'>No. Telpon</th>
                                    <th width='25%'>Aksi</th>                                   
                                </tr>
                            </thead>
                            <tbody>";
							$tp=mysql_query('SELECT * FROM staff ORDER BY id_staff');
							while($r=mysql_fetch_array($tp)){
                             echo"<tr>
                                    <td><input type='checkbox' name='checkbox'/></td>
                                    <td>$r[nama]</td>
                                    <td>$r[email]</td>
                                    <td>$r[no_telp]</td>
                                    <td><a href='?p=pengguna&aksi=edit_staff&id=$r[id_staff]'>EDIT</a>|
									    <a href='$aksi?p=pengguna&act=hapusstaff&id=$r[nik]' onClick=\"return confirm('Apakah Anda benar-benar mau menghapusnya?')\">HAPUS</td>
                                </tr>";
							}
                        echo"</tbody>
                        </table>
                    </div>
                </div>                                
            </div>            
            <div class='dr'><span></span></div>            
        </div>
    </div>";   
}
else {
include "not_found.php";
}
break;
case "tambah_admin":
echo "<form method='POST' action='$aksi?p=pengguna&act=tambahadmin' enctype='multipart/form-data' onSubmit='return validasi(this)'>";
echo "<div class='content'>
		<div class='workplace'>
            <div class='row-fluid'>
                  <div class='block-fluid'>                        
                     <div class='head clearfix'>
                        <h1>Tambah User Administrator</h1>
                    </div>    
					<input type=hidden name=level value='admin'>
					<input type=hidden name=blokir value='N'>

					 <table class='list'>
		  <tr>
					<td >
					<div class='row-form clearfix'>
                            <div class='span3'>Pass Photo</div>
                            <div class='span9'><input type=file name='fupload' size=40/> </div>
                        </div>
						</td>
						<td class='span7'>
						<div class='row-form clearfix'>
                            <div class='span3'>Tempat Lahir</div>
                            <div class='span9'><input type='text' name='t_lahir' placeholder='example : Bogor'/></div>
                    </div>
						</td>
						</tr>
						<tr>
						<td>
                      <div class='row-form clearfix'>
                            <div class='span3'>Nama Lengkap</div>
                            <div class='span9'><input type='text' name='nama' placeholder='nama depan dan belakang'/></div>
                        </div>
						</td>
						<td>
						<div class='row-form clearfix'>
                            <div class='span3'>Tanggal Lahir</div>
                            <div class='span9'><input type='date' name='tg_lahir' placeholder='example: 24/12/1992'/></div>
                    </div>
						</td>
						</tr>
						<tr>
						<td>
					 <div class='row-form clearfix'>
                            <div class='span3'>NIK</div>
                            <div class='span9'><input type='text' name='nik' placeholder='masukkan nomor KTP'/></div>
                    </div>
					</td>
					<td>
					<div class='row-form clearfix'>
                            <div class='span3'>Pendidikan Terakhir</div>
                            <div class='span9'><input type='text' name='pendidikan' placeholder='example: S1'/></div>
                    </div>
					</td>
					</tr>
					<tr>
						<td>
					 <div class='row-form clearfix'>
                            <div class='span3'>NUPTK</div>
                            <div class='span9'><input type='text' name='nuptk' placeholder='masukkan NUPTK'/></div>
                    </div>
					</td>
					<td>
					<div class='row-form clearfix'>
                            <div class='span3'>Jurusan Pendidikan</div>
                            <div class='span9'><input type='text' name='jurusan' placeholder='masukkan jurusan pendidikan'/></div>
                    </div>
					</td>
					</tr>
					<tr>
						<td>
					 <div class='row-form clearfix'>
                            <div class='span3'>Nama Ibu Kandung</div>
                            <div class='span9'><input type='text' name='nama_ibu' placeholder='masukkan nama ibu kandung'/></div>
                    </div>
					</td>
					<td>
					<div class='row-form clearfix'>
                            <div class='span3'>Status Kepegawaian</div>
                            <div class='span9'><input type='text' name='status_kpg' placeholder='masukkan status kepegawaian'/></div>
                    </div>
					</td>
					</tr>
					<tr>
						<td>
					 <div class='row-form clearfix'>
                            <div class='span3'>Jenis Kelamin</div>
                            <div class='span9'><select name='gender' id='s2_1' style='width: 100%;'>";
							
								 echo" <option  selected>- Pilih -</option>";
										
										  echo "<option value=L>Laki-laki</option>
										  <option value=P>Perempuan</option>
										  ";
										          
                       echo"</select></div>
                    </div>
					</td>
					<td>
					<div class='row-form clearfix'>
                            <div class='span3'>Tanggal Tugas</div>
                            <div class='span9'><input type='date' name='tgl_tugas' placeholder='masukkan tanggal tugas disekolah'/></div>
                    </div>
					</td>
					</tr>
					<tr>
					<td>
					 <div class='row-form clearfix'>
                            <div class='span3'>Username</div>
                            <div class='span9'><input type='text' name='username' placeholder='kosongkan' disabled/></div>
                    </div>
					</td>
					<td>
					<div class='row-form clearfix'>
                            <div class='span3'>Email</div>
                            <div class='span9'><input type='text' name='email' placeholder='example: contoh@email.com'/></div>
                    </div>
					</td>
					</tr>
					<tr>
					<td>
					 <div class='row-form clearfix'>
                            <div class='span3'>Password</div>
                            <div class='span9'><input type='password' name='password' placeholder='masukkan kombinasi huruf dan angka'/></div>
                    </div>
					</td>
					<td>
					<div class='row-form clearfix'>
                            <div class='span3'>No. Telpon</div>
                            <div class='span9'><input type='text' name='no_telp' placeholder='example: 08123456789'/></div>
                    </div>
					</td>
					</tr>
					<tr>
					<td rowspan='2'>
					<div class='row-form clearfix'>
                            <div class='span3'>Alamat</div>
                            <div class='span9'><textarea name='alamat' cols='42' rows='10' tabindex='4'></textarea></div>
                    </div>
					</td>
					<td>
					<div class='row-form clearfix'>
                            <div class='span3'>Status Perkawinan</div>
                        <div class='span9'><select name='status_kawin' id='s2_2' style='width: 100%;'>";

								 echo" <option selected>- Pilih -</option>";
										
										  echo "<option value=K>Menikah</option>
										  <option value=BK>Belum Menikah</option>
										  <option value=J>Janda</option>
										  <option value=D>Duda</option>
										  <option value=P>Poligami</option>
										  
										  ";
										          
                       echo"</select></div>
						</div>
</td>
</tr>
<tr>
<td>
<div class='row-form clearfix'>
                            <div class='span3'>Level User</div>
                        <div class='span9'><input type='text' name='level' disabled placeholder='Administrator'/></div>
						</div>
</td>
</tr>
";
	echo" </div>
                </div>
            </div>
		  
          </table>
			<div>&nbsp; <input type='submit' class='btn' value='Simpan'> <input type=button class='btn' value='&nbsp Batal &nbsp' onclick=self.history.back()></div>
		  </form>
		</div>
<div class='dr'><span></span></div>";
break;
case "editadmin":
echo "<form method='POST' action='$aksi?p=pengguna&act=editadmin' enctype='multipart/form-data' onSubmit='return validasi(this)'>";
$tampil = mysql_query("SELECT * FROM administrator WHERE id_a='$_GET[id]'");
$r=mysql_fetch_array($tampil);
$tampil1 = mysql_query("SELECT * FROM users WHERE id_g_a='$r[nik]'");
$r1=mysql_fetch_array($tampil1);

echo "<div class='content'>
		<div class='workplace'>
            <div class='row-fluid'>
                  <div class='block-fluid'>                        
                     <div class='head clearfix'>
                        <h1>Edit User Administrator</h1>
                    </div>    
					<input type=hidden name=id1 value='$r1[id_users]'>
					<input type=hidden name=id2 value='$r[id_a]'>

					 <table class='list'>
		  <tr>
					<td >
					<div class='row-form clearfix'>
                            <div class='span3'>Ganti Foto</div>
                            <div class='span9'><input type=file name='fupload' size=40/> </div>
                        </div>
						</td>
						<td class='span7'>
						<div class='row-form clearfix'>
                            <div class='span3'>Tempat Lahir</div>
                            <div class='span9'><input type='text' name='t_lahir' value='$r[tempat_lahir]' placeholder='example : Bogor'/></div>
                    </div>
						</td>
						</tr>
						<tr>
						<td>
                      <div class='row-form clearfix'>
                            <div class='span3'>Nama Lengkap</div>
                            <div class='span9'><input type='text' name='nama' value='$r[nama]' placeholder='nama depan dan belakang'/></div>
                        </div>
						</td>
						<td>
						<div class='row-form clearfix'>
                            <div class='span3'>Tanggal Lahir</div>
                            <div class='span9'><input type='date' name='tg_lahir' value='$r[tgl_lahir]' placeholder='example: 24/12/1992'/></div>
                    </div>
						</td>
						</tr>
						<tr>
						<td>
					 <div class='row-form clearfix'>
                            <div class='span3'>NIK</div>
                            <div class='span9'><input type='text' name='nik' value='$r[nik]' placeholder='masukkan nomor KTP'/></div>
                    </div>
					</td>
					<td>
					<div class='row-form clearfix'>
                            <div class='span3'>Pendidikan Terakhir</div>
                            <div class='span9'><input type='text' name='pendidikan' value='$r[pendidikan]' placeholder='example: S1'/></div>
                    </div>
					</td>
					</tr>
					<tr>
						<td>
					 <div class='row-form clearfix'>
                            <div class='span3'>NUPTK</div>
                            <div class='span9'><input type='text' name='nuptk' value='$r[nuptk]' placeholder='masukkan NUPTK'/></div>
                    </div>
					</td>
					<td>
					<div class='row-form clearfix'>
                            <div class='span3'>Jurusan Pendidikan</div>
                            <div class='span9'><input type='text' name='jurusan' value='$r[jurusan_p]' placeholder='masukkan jurusan pendidikan'/></div>
                    </div>
					</td>
					</tr>
					<tr>
						<td>
					 <div class='row-form clearfix'>
                            <div class='span3'>Nama Ibu Kandung</div>
                            <div class='span9'><input type='text' name='nama_ibu' value='$r[nama_ibu]' placeholder='masukkan nama ibu kandung'/></div>
                    </div>
					</td>
					<td>
					<div class='row-form clearfix'>
                            <div class='span3'>Status Kepegawaian</div>
                            <div class='span9'><input type='text' name='status_kpg' value='$r[status_kpg]' placeholder='masukkan status kepegawaian'/></div>
                    </div>
					</td>
					</tr>
					<tr>
						<td>
					 <div class='row-form clearfix'>
                            <div class='span3'>Jenis Kelamin</div>
                            <div class='span9'><select name='gender' id='s2_1'  style='width: 100%;'>";
							if ($r[gender]=='L'){
$jk="Laki-laki";
}
else {
$jk="Perempuan";
}
								 echo" <option value=$r[gender] selected>- $jk -</option>";
										
										  echo "<option value=L>Laki-laki</option>
										  <option value=P>Perempuan</option>
										  ";
										          
                       echo"</select></div>
                    </div>
					</td>
					<td>
					<div class='row-form clearfix'>
                            <div class='span3'>Tanggal Tugas</div>
                    <div class='span9'><input type='date' name='tgl_tugas' value='$r[tgl_tugas]' placeholder='masukkan tanggal tugas disekolah'/></div>
                    </div>
					</td>
					</tr>
					<tr>
					<td>
					 <div class='row-form clearfix'>
                            <div class='span3'>Username</div>
                            <div class='span9'><input type='text' name='username' value='$r1[username]' placeholder='kosongkan' disabled/></div>
                    </div>
					</td>
					<td>
					<div class='row-form clearfix'>
                            <div class='span3'>Email</div>
                            <div class='span9'><input type='text' name='email' value='$r[email]' placeholder='example: contoh@email.com'/></div>
                    </div>
					</td>
					</tr>
					<tr>
					<td>
					 <div class='row-form clearfix'>
                            <div class='span3'>Password</div>
                            <div class='span9'><input type='password' name='password' placeholder='kosongkan jika tidak merubah password'/></div>
                    </div>
					</td>
					<td>
					<div class='row-form clearfix'>
                            <div class='span3'>No. Telpon</div>
                            <div class='span9'><input type='text' name='no_telp' value='$r[no_telp]' placeholder='example: 08123456789'/></div>
                    </div>
					</td>
					</tr>
					<tr>
					<td rowspan='2'>
					<div class='row-form clearfix'>
                            <div class='span3'>Alamat</div>
                            <div class='span9'><textarea name='alamat' cols='42' rows='10'  tabindex='4'>$r[alamat]</textarea></div>
                    </div>
					</td>
					<td>
					<div class='row-form clearfix'>
                            <div class='span3'>Status Perkawinan</div>
                        <div class='span9'><select name='status_kawin' id='s2_2' style='width: 100%;'>";
if ($r[status_kawin]=='BK'){
$sk="Belum Menikah";
}
elseif ($r[status_kawin]=='K'){
$sk="Menikah";
}
elseif ($r[status_kawin]=='J'){
$sk="Janda";
}
elseif ($r[status_kawin]=='D'){
$sk="Duda";
}
elseif ($r[status_kawin]=='P'){
$sk="Poligami";
}
else {
$sk="--";
}

								 echo" <option value=$r[status_kawin] selected>- $sk -</option>";
										
										  echo "<option value=K>Menikah</option>
										  <option value=BK>Belum Menikah</option>
										  <option value=J>Janda</option>
										  <option value=D>Duda</option>
										  <option value=P>Poligami</option>
										  
										  ";
										          
                       echo"</select></div>
						</div>
</td>
</tr>
<tr>
<td>
<div class='row-form clearfix'>
                            <div class='span3'>Level User</div>
                        <div class='span9'><input type='text' name='level' disabled placeholder='Administrator'/></div>
						</div>
</td>
</tr>
";
	echo" </div>
                </div>
            </div>
		  
          </table>
			<div>&nbsp; <input type='submit' class='btn' value='Simpan'> <input type=button class='btn' value='&nbsp Batal &nbsp' onclick=self.history.back()></div>
		  </form>
		</div>
<div class='dr'><span></span></div>";
break;

case "tambah_staff":
echo "<form method='POST' action='$aksi?p=pengguna&act=tambahstaff' enctype='multipart/form-data' onSubmit='return validasi(this)'>";
echo "<div class='content'>
		<div class='workplace'>
            <div class='row-fluid'>
                  <div class='block-fluid'>                        
                     <div class='head clearfix'>
                        <h1>Tambah User Staff Kurikulum</h1>
                    </div>    
					<input type=hidden name=level value='staff'>
					<input type=hidden name=blokir value='N'>

					 <table class='list'>
		  <tr>
					<td >
					<div class='row-form clearfix'>
                            <div class='span3'>Pass Photo</div>
                            <div class='span9'><input type=file name='fupload' size=40/> </div>
                        </div>
						</td>
						<td class='span7'>
						<div class='row-form clearfix'>
                            <div class='span3'>Tempat Lahir</div>
                            <div class='span9'><input type='text' name='t_lahir' placeholder='example : Bogor'/></div>
                    </div>
						</td>
						</tr>
						<tr>
						<td>
                      <div class='row-form clearfix'>
                            <div class='span3'>Nama Lengkap</div>
                            <div class='span9'><input type='text' name='nama' placeholder='nama depan dan belakang'/></div>
                        </div>
						</td>
						<td>
						<div class='row-form clearfix'>
                            <div class='span3'>Tanggal Lahir</div>
                            <div class='span9'><input type='date' name='tg_lahir' placeholder='example: 24/12/1992'/></div>
                    </div>
						</td>
						</tr>
						<tr>
						<td>
					 <div class='row-form clearfix'>
                            <div class='span3'>NIK</div>
                            <div class='span9'><input type='text' name='nik' placeholder='masukkan nomor KTP'/></div>
                    </div>
					</td>
					<td>
					<div class='row-form clearfix'>
                            <div class='span3'>Pendidikan Terakhir</div>
                            <div class='span9'><input type='text' name='pendidikan' placeholder='example: S1'/></div>
                    </div>
					</td>
					</tr>
					<tr>
						<td>
					 <div class='row-form clearfix'>
                            <div class='span3'>NUPTK</div>
                            <div class='span9'><input type='text' name='nuptk' placeholder='masukkan NUPTK'/></div>
                    </div>
					</td>
					<td>
					<div class='row-form clearfix'>
                            <div class='span3'>Jurusan Pendidikan</div>
                            <div class='span9'><input type='text' name='jurusan' placeholder='masukkan jurusan pendidikan'/></div>
                    </div>
					</td>
					</tr>
					<tr>
						<td>
					 <div class='row-form clearfix'>
                            <div class='span3'>Nama Ibu Kandung</div>
                            <div class='span9'><input type='text' name='nama_ibu' placeholder='masukkan nama ibu kandung'/></div>
                    </div>
					</td>
					<td>
					<div class='row-form clearfix'>
                            <div class='span3'>Status Kepegawaian</div>
                            <div class='span9'><input type='text' name='status_kpg' placeholder='masukkan status kepegawaian'/></div>
                    </div>
					</td>
					</tr>
					<tr>
						<td>
					 <div class='row-form clearfix'>
                            <div class='span3'>Jenis Kelamin</div>
                            <div class='span9'><select name='gender' id='s2_1' style='width: 100%;'>";
							
								 echo" <option  selected>- Pilih -</option>";
										
										  echo "<option value=L>Laki-laki</option>
										  <option value=P>Perempuan</option>
										  ";
										          
                       echo"</select></div>
                    </div>
					</td>
					<td>
					<div class='row-form clearfix'>
                            <div class='span3'>Tanggal Tugas</div>
                            <div class='span9'><input type='date' name='tgl_tugas' placeholder='masukkan tanggal tugas disekolah'/></div>
                    </div>
					</td>
					</tr>
					<tr>
					<td>
					 <div class='row-form clearfix'>
                            <div class='span3'>Username</div>
                            <div class='span9'><input type='text' name='username' placeholder='kosongkan' disabled/></div>
                    </div>
					</td>
					<td>
					<div class='row-form clearfix'>
                            <div class='span3'>Email</div>
                            <div class='span9'><input type='text' name='email' placeholder='example: contoh@email.com'/></div>
                    </div>
					</td>
					</tr>
					<tr>
					<td>
					 <div class='row-form clearfix'>
                            <div class='span3'>Password</div>
                            <div class='span9'><input type='password' name='password' placeholder='masukkan kombinasi huruf dan angka'/></div>
                    </div>
					</td>
					<td>
					<div class='row-form clearfix'>
                            <div class='span3'>No. Telpon</div>
                            <div class='span9'><input type='text' name='no_telp' placeholder='example: 08123456789'/></div>
                    </div>
					</td>
					</tr>
					<tr>
					<td rowspan='2'>
					<div class='row-form clearfix'>
                            <div class='span3'>Alamat</div>
                            <div class='span9'><textarea name='alamat' cols='42' rows='10' tabindex='4'></textarea></div>
                    </div>
					</td>
					<td>
					<div class='row-form clearfix'>
                            <div class='span3'>Status Perkawinan</div>
                        <div class='span9'><select name='status_kawin' id='s2_2' style='width: 100%;'>";

								 echo" <option selected>- Pilih -</option>";
										
										  echo "<option value=K>Menikah</option>
										  <option value=BK>Belum Menikah</option>
										  <option value=J>Janda</option>
										  <option value=D>Duda</option>
										  <option value=P>Poligami</option>
										  
										  ";
										          
                       echo"</select></div>
						</div>
</td>
</tr>
<tr>
<td>
<div class='row-form clearfix'>
                            <div class='span3'>Level User</div>
                        <div class='span9'><input type='text' name='level' disabled placeholder='Staff Kurikulum'/></div>
						</div>
</td>
</tr>
";
	echo" </div>
                </div>
            </div>
		  
          </table>
			<div>&nbsp; <input type='submit' class='btn' value='Simpan'> <input type=button class='btn' value='&nbsp Batal &nbsp' onclick=self.history.back()></div>
		  </form>
		</div>
<div class='dr'><span></span></div>";
break;
case "edit_staff":
echo "<form method='POST' action='$aksi?p=pengguna&act=editstaff' enctype='multipart/form-data' onSubmit='return validasi(this)'>";
$tampil = mysql_query("SELECT * FROM staff WHERE id_staff='$_GET[id]'");
$r=mysql_fetch_array($tampil);
$tampil1 = mysql_query("SELECT * FROM users WHERE id_g_a='$r[nik]'");
$r1=mysql_fetch_array($tampil1);

echo "<div class='content'>
		<div class='workplace'>
            <div class='row-fluid'>
                  <div class='block-fluid'>                        
                     <div class='head clearfix'>
                        <h1>Edit User Staff Kurikulum</h1>
                    </div>    
					<input type=hidden name=id1 value='$r1[id_users]'>
					<input type=hidden name=id2 value='$r[id_staff]'>

					 <table class='list'>
		  <tr>
					<td >
					<div class='row-form clearfix'>
                            <div class='span3'>Ganti Foto</div>
                            <div class='span9'><input type=file name='fupload' size=40/> </div>
                        </div>
						</td>
						<td class='span7'>
						<div class='row-form clearfix'>
                            <div class='span3'>Tempat Lahir</div>
                            <div class='span9'><input type='text' name='t_lahir' value='$r[tempat_lahir]' placeholder='example : Bogor'/></div>
                    </div>
						</td>
						</tr>
						<tr>
						<td>
                      <div class='row-form clearfix'>
                            <div class='span3'>Nama Lengkap</div>
                            <div class='span9'><input type='text' name='nama' value='$r[nama]' placeholder='nama depan dan belakang'/></div>
                        </div>
						</td>
						<td>
						<div class='row-form clearfix'>
                            <div class='span3'>Tanggal Lahir</div>
                            <div class='span9'><input type='date' name='tg_lahir' value='$r[tgl_lahir]' placeholder='example: 24/12/1992'/></div>
                    </div>
						</td>
						</tr>
						<tr>
						<td>
					 <div class='row-form clearfix'>
                            <div class='span3'>NIK</div>
                            <div class='span9'><input type='text' name='nik' value='$r[nik]' placeholder='masukkan nomor KTP'/></div>
                    </div>
					</td>
					<td>
					<div class='row-form clearfix'>
                            <div class='span3'>Pendidikan Terakhir</div>
                            <div class='span9'><input type='text' name='pendidikan' value='$r[pendidikan]' placeholder='example: S1'/></div>
                    </div>
					</td>
					</tr>
					<tr>
						<td>
					 <div class='row-form clearfix'>
                            <div class='span3'>NUPTK</div>
                            <div class='span9'><input type='text' name='nuptk' value='$r[nuptk]' placeholder='masukkan NUPTK'/></div>
                    </div>
					</td>
					<td>
					<div class='row-form clearfix'>
                            <div class='span3'>Jurusan Pendidikan</div>
                            <div class='span9'><input type='text' name='jurusan' value='$r[jurusan_p]' placeholder='masukkan jurusan pendidikan'/></div>
                    </div>
					</td>
					</tr>
					<tr>
						<td>
					 <div class='row-form clearfix'>
                            <div class='span3'>Nama Ibu Kandung</div>
                            <div class='span9'><input type='text' name='nama_ibu' value='$r[nama_ibu]' placeholder='masukkan nama ibu kandung'/></div>
                    </div>
					</td>
					<td>
					<div class='row-form clearfix'>
                            <div class='span3'>Status Kepegawaian</div>
                            <div class='span9'><input type='text' name='status_kpg' value='$r[status_kpg]' placeholder='masukkan status kepegawaian'/></div>
                    </div>
					</td>
					</tr>
					<tr>
						<td>
					 <div class='row-form clearfix'>
                            <div class='span3'>Jenis Kelamin</div>
                            <div class='span9'><select name='gender' id='s2_1'  style='width: 100%;'>";
							if ($r[gender]=='L'){
$jk="Laki-laki";
}
else {
$jk="Perempuan";
}
								 echo" <option value=$r[gender] selected>- $jk -</option>";
										
										  echo "<option value=L>Laki-laki</option>
										  <option value=P>Perempuan</option>
										  ";
										          
                       echo"</select></div>
                    </div>
					</td>
					<td>
					<div class='row-form clearfix'>
                            <div class='span3'>Tanggal Tugas</div>
                    <div class='span9'><input type='date' name='tgl_tugas' value='$r[tgl_tugas]' placeholder='masukkan tanggal tugas disekolah'/></div>
                    </div>
					</td>
					</tr>
					<tr>
					<td>
					 <div class='row-form clearfix'>
                            <div class='span3'>Username</div>
                            <div class='span9'><input type='text' name='username' value='$r1[username]' placeholder='kosongkan' disabled/></div>
                    </div>
					</td>
					<td>
					<div class='row-form clearfix'>
                            <div class='span3'>Email</div>
                            <div class='span9'><input type='text' name='email' value='$r[email]' placeholder='example: contoh@email.com'/></div>
                    </div>
					</td>
					</tr>
					<tr>
					<td>
					 <div class='row-form clearfix'>
                            <div class='span3'>Password</div>
                            <div class='span9'><input type='password' name='password' placeholder='kosongkan jika tidak merubah password'/></div>
                    </div>
					</td>
					<td>
					<div class='row-form clearfix'>
                            <div class='span3'>No. Telpon</div>
                            <div class='span9'><input type='text' name='no_telp' value='$r[no_telp]' placeholder='example: 08123456789'/></div>
                    </div>
					</td>
					</tr>
					<tr>
					<td rowspan='2'>
					<div class='row-form clearfix'>
                            <div class='span3'>Alamat</div>
                            <div class='span9'><textarea name='alamat' cols='42' rows='10'  tabindex='4'>$r[alamat]</textarea></div>
                    </div>
					</td>
					<td>
					<div class='row-form clearfix'>
                            <div class='span3'>Status Perkawinan</div>
                        <div class='span9'><select name='status_kawin' id='s2_2' style='width: 100%;'>";
if ($r[status_kawin]=='BK'){
$sk="Belum Menikah";
}
elseif ($r[status_kawin]=='K'){
$sk="Menikah";
}
elseif ($r[status_kawin]=='J'){
$sk="Janda";
}
elseif ($r[status_kawin]=='D'){
$sk="Duda";
}
elseif ($r[status_kawin]=='P'){
$sk="Poligami";
}
else {
$sk="--";
}

								 echo" <option value=$r[status_kawin] selected>- $sk -</option>";
										
										  echo "<option value=K>Menikah</option>
										  <option value=BK>Belum Menikah</option>
										  <option value=J>Janda</option>
										  <option value=D>Duda</option>
										  <option value=P>Poligami</option>
										  
										  ";
										          
                       echo"</select></div>
						</div>
</td>
</tr>
<tr>
<td>
<div class='row-form clearfix'>
                            <div class='span3'>Level User</div>
                        <div class='span9'><input type='text' name='level' disabled placeholder='Staff Kurikulum'/></div>
						</div>
</td>
</tr>
";
	echo" </div>
                </div>
            </div>
		  
          </table>
			<div>&nbsp; <input type='submit' class='btn' value='Simpan'> <input type=button class='btn' value='&nbsp Batal &nbsp' onclick=self.history.back()></div>
		  </form>
		</div>
<div class='dr'><span></span></div>";
break;
case "beriakses":
echo "<form method='POST' action='$aksi?p=pengguna&act=beriakses' enctype='multipart/form-data' onSubmit='return validasi(this)'>";
$tampil = mysql_query("SELECT * FROM guru WHERE id_guru='$_GET[id]'");
$r=mysql_fetch_array($tampil);

echo "<div class='content'>
		<div class='workplace'>
            <div class='row-fluid'>
                  <div class='block-fluid'>                        
                     <div class='head clearfix'>
                        <h1>Beri Akses $r[nama]</h1>
                    </div>    
					<input type=hidden name=username value='$r[email]'>
					<input type=hidden name=id_g_a value='$r[nik]'>
					<input type=hidden name=level value='guru'>
					<input type=hidden name=blokir value='N'>

					 <table class='list'>
		 		<tr>
					<td class='span7'>
					 <div class='row-form clearfix'>
                            <div class='span3'>Password</div>
                            <div class='span9'><input type='password' name='password' placeholder='kosongkan jika tidak merubah password'/></div>
                    </div>
					</td>
					<td class='span7'>
					<div class='row-form clearfix'>
                            <div class='span3'>Level User</div>
                            <div class='span9'><input type='text' name='level' disabled placeholder='Guru'/></div>
                    </div>
					</td>
					</tr>
";
	echo" </div>
                </div>
            </div>
		  
          </table>
			<div>&nbsp; <input type='submit' class='btn' value='Simpan'> <input type=button class='btn' value='&nbsp Batal &nbsp' onclick=self.history.back()></div>
		  </form>
		</div>
<div class='dr'><span></span></div>";
break;

			}//penutup switch
}//penutup session
?>    
</body>
</html>