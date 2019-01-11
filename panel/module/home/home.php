<?php
$jum= mysql_num_rows(mysql_query("SELECT * FROM tb_booking WHERE verifikasi != 'B'"));
$jum1= mysql_num_rows(mysql_query("SELECT * FROM tb_booking WHERE verifikasi='Y'"));
$jum2= mysql_num_rows(mysql_query("SELECT * FROM tb_booking WHERE verifikasi='N'"));
$jum3= mysql_num_rows(mysql_query("SELECT * FROM tb_booking WHERE verifikasi='B'"));

$id_mhss=$_SESSION['nikuser'];
$jum4= mysql_num_rows(mysql_query("SELECT * FROM tb_booking WHERE id_mhs = '$id_mhss' AND verifikasi != 'B'"));
$jum5= mysql_num_rows(mysql_query("SELECT * FROM tb_booking WHERE id_mhs = '$id_mhss' AND verifikasi='Y'"));
$jum6= mysql_num_rows(mysql_query("SELECT * FROM tb_booking WHERE id_mhs = '$id_mhss' AND verifikasi='N'"));
$jum7= mysql_num_rows(mysql_query("SELECT * FROM tb_booking WHERE id_mhs = '$id_mhss' AND verifikasi='B'"));

$lvusers=$_SESSION['leveluser'];
if($lvusers == "mhs") {
echo"
<div id='page-wrapper'>
            <div class='row'>
                <div class='col-lg-12'>
                    <h1 class='page-header'>Beranda</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>

<div class='row'>
 <div class='col-lg-3 col-md-6'>
                    <div class='panel panel-primary'>
                        <div class='panel-heading'>
                            <div class='row'>
                                <div class='col-xs-3'>
                                    <i class='fa fa-users fa-5x'></i>
                                </div>
                                <div class='col-xs-9 text-right'>
                                    <div class='huge'>$jum4</div>
                                    <div>Booking/Registrasi!</div>
                                </div>
                            </div>
                        </div>
                        <a href='#'>
                            <div class='panel-footer'>
                                <span class='pull-left'>Lihat Detail Data</span>
                                <span class='pull-right'><i class='fa fa-arrow-circle-right'></i></span>
                                <div class='clearfix'></div>
                            </div>
                        </a>
                    </div>
                </div>
                
                <div class='col-lg-3 col-md-6'>
                    <div class='panel panel-green'>
                        <div class='panel-heading'>
                            <div class='row'>
                                <div class='col-xs-3'>
                                    <i class='fa fa-check-square-o fa-5x'></i>
                                </div>
                                <div class='col-xs-9 text-right'>
                                    <div class='huge'>$jum5</div>
                                    <div>Terkonfirmasi!</div>
                                </div>
                            </div>
                        </div>
                        <a href='#'>
                            <div class='panel-footer'>
                                <span class='pull-left'>Lihat Detail Data</span>
                                <span class='pull-right'><i class='fa fa-arrow-circle-right'></i></span>
                                <div class='clearfix'></div>
                            </div>
                        </a>
                    </div>
                </div>
				
				<div class='col-lg-3 col-md-6'>
                    <div class='panel panel-yellow'>
                        <div class='panel-heading'>
                            <div class='row'>
                                <div class='col-xs-3'>
                                    <i class='fa fa-minus-circle fa-5x'></i>
                                </div>
                                <div class='col-xs-9 text-right'>
                                    <div class='huge'>$jum6</div>
                                    <div>Belum Terkonfirmasi!</div>
                                </div>
                            </div>
                        </div>
                        <a href='#'>
                            <div class='panel-footer'>
                                <span class='pull-left'>Lihat Detail Data</span>
                                <span class='pull-right'><i class='fa fa-arrow-circle-right'></i></span>
                                <div class='clearfix'></div>
                            </div>
                        </a>
                    </div>
                </div>
				
				<div class='col-lg-3 col-md-6'>
                    <div class='panel panel-red'>
                        <div class='panel-heading'>
                            <div class='row'>
                                <div class='col-xs-3'>
                                    <i class='fa fa-times-circle-o fa-5x'></i>
                                </div>
                                <div class='col-xs-9 text-right'>
                                    <div class='huge'>$jum7</div>
                                    <div>Dibatalkan!</div>
                                </div>
                            </div>
                        </div>
                        <a href='#'>
                            <div class='panel-footer'>
                                <span class='pull-left'>Lihat Detail Data</span>
                                <span class='pull-right'><i class='fa fa-arrow-circle-right'></i></span>
                                <div class='clearfix'></div>
                            </div>
                        </a>
                    </div>
                </div>
				
            </div>
			
			<div class='col-lg-12'>
                    <div class='panel panel-primary'>
                        <div class='panel-heading'>
                            Keterangan
                        </div>
                        <div class='panel-body'>
                            <p>
							1. Booking/Registrasi - Merupakan peserta seminar yang telah melakukan booking di jadwal yang akan datang (Termasuk peserta yang belum dan sudah melakukan verifikasi. </br>
							2. Verifikasi Kehadiran - Merupakan peserta seminar yang telah melakukan verifikasi pada tanggal pelaksanaan seminar, mulai jam 00:00 sampai 1 jam sebelum seminar dimulai. </br>
							3. Belum Konfirmasi - Merupakan peserta seminar yang telah melakukan booking/registrasi tetapi belum melakukan verifikasi kehadiran. </br>
							4. Dibatalkan - Merupakan peserta seminar yang telah melakukan booking/registrasi tetapi tidak melakukan verifikasi kehadiran pada tanggal pelaksanaan.
							</p>
                        </div>
                        <div class='panel-footer'>
                            Keterangan lebih lanjut ada di Buku Panduan User.
                        </div>
                    </div>
                </div>
			
			
			
</div>";}
else {

echo"
<div id='page-wrapper'>
            <div class='row'>
                <div class='col-lg-12'>
                    <h1 class='page-header'>Beranda</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>

<div class='row'>
 <div class='col-lg-3 col-md-6'>
                    <div class='panel panel-primary'>
                        <div class='panel-heading'>
                            <div class='row'>
                                <div class='col-xs-3'>
                                    <i class='fa fa-users fa-5x'></i>
                                </div>
                                <div class='col-xs-9 text-right'>
                                    <div class='huge'>$jum</div>
                                    <div>Booking/Registrasi!</div>
                                </div>
                            </div>
                        </div>
                        <a href='#'>
                            <div class='panel-footer'>
                                <span class='pull-left'>Lihat Detail Data</span>
                                <span class='pull-right'><i class='fa fa-arrow-circle-right'></i></span>
                                <div class='clearfix'></div>
                            </div>
                        </a>
                    </div>
                </div>
                
                <div class='col-lg-3 col-md-6'>
                    <div class='panel panel-green'>
                        <div class='panel-heading'>
                            <div class='row'>
                                <div class='col-xs-3'>
                                    <i class='fa fa-check-square-o fa-5x'></i>
                                </div>
                                <div class='col-xs-9 text-right'>
                                    <div class='huge'>$jum1</div>
                                    <div>Verifikasi Kehadiran!</div>
                                </div>
                            </div>
                        </div>
                        <a href='#'>
                            <div class='panel-footer'>
                                <span class='pull-left'>Lihat Detail Data</span>
                                <span class='pull-right'><i class='fa fa-arrow-circle-right'></i></span>
                                <div class='clearfix'></div>
                            </div>
                        </a>
                    </div>
                </div>
				
				<div class='col-lg-3 col-md-6'>
                    <div class='panel panel-yellow'>
                        <div class='panel-heading'>
                            <div class='row'>
                                <div class='col-xs-3'>
                                    <i class='fa fa-minus-circle fa-5x'></i>
                                </div>
                                <div class='col-xs-9 text-right'>
                                    <div class='huge'>$jum2</div>
                                    <div>Belum Konfirmasi!</div>
                                </div>
                            </div>
                        </div>
                        <a href='#'>
                            <div class='panel-footer'>
                                <span class='pull-left'>Lihat Detail Data</span>
                                <span class='pull-right'><i class='fa fa-arrow-circle-right'></i></span>
                                <div class='clearfix'></div>
                            </div>
                        </a>
                    </div>
                </div>
				
				<div class='col-lg-3 col-md-6'>
                    <div class='panel panel-red'>
                        <div class='panel-heading'>
                            <div class='row'>
                                <div class='col-xs-3'>
                                    <i class='fa fa-times-circle-o fa-5x'></i>
                                </div>
                                <div class='col-xs-9 text-right'>
                                    <div class='huge'>$jum3</div>
                                    <div>Dibatalkan!</div>
                                </div>
                            </div>
                        </div>
                        <a href='#'>
                            <div class='panel-footer'>
                                <span class='pull-left'>Lihat Detail Data</span>
                                <span class='pull-right'><i class='fa fa-arrow-circle-right'></i></span>
                                <div class='clearfix'></div>
                            </div>
                        </a>
                    </div>
                </div>
				
            </div>
			
			<div class='col-lg-12'>
                    <div class='panel panel-primary'>
                        <div class='panel-heading'>
                            Keterangan
                        </div>
                        <div class='panel-body'>
                            <p>
							1. Booking/Registrasi - Merupakan peserta seminar yang telah melakukan booking di jadwal yang akan datang (Termasuk peserta yang belum dan sudah melakukan verifikasi. </br>
							2. Verifikasi Kehadiran - Merupakan peserta seminar yang telah melakukan verifikasi pada tanggal pelaksanaan seminar, mulai jam 00:00 sampai 1 jam sebelum seminar dimulai. </br>
							3. Belum Konfirmasi - Merupakan peserta seminar yang telah melakukan booking/registrasi tetapi belum melakukan verifikasi kehadiran. </br>
							4. Dibatalkan - Merupakan peserta seminar yang telah melakukan booking/registrasi tetapi tidak melakukan verifikasi kehadiran pada tanggal pelaksanaan.
							</p>
                        </div>
                        <div class='panel-footer'>
                            Keterangan lebih lanjut ada di Buku Panduan User.
                        </div>
                    </div>
                </div>
			
			
			
</div>";
	
}
?>