
        
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
			
                    <ul class="nav" id="side-menu">
						
                        <li class="sidebar-search">
						<?php
						$teris=$_SESSION['iduser'];
						$tz1=(mysql_query("SELECT * FROM user WHERE id_user='$teris'"));
							$z1=mysql_fetch_array($tz1);	 
						?>   						
						<div class="panel panel-primary">
                        <div class="panel-heading btn-xs">
						<?php
							$tz=(mysql_query("SELECT * FROM tb_datauser WHERE nik='$z1[nik]'"));
							$z=mysql_fetch_array($tz);	 
							?> 
							<?php 
							$ws=ucwords ($z['level']);
							echo "<h7>Masuk sebagai <b>$z1[level]</b></h7>"; ?>							
                        </div>
                        <div class="panel-body">	
							<?php echo" <img src='foto_profil/$z[foto]' class='img-polaroid' style='width:55px;border:4px solid #DCDCDC;'/> <tb>";  
								echo "<h7><b>$z[nama]</b></h7></tb>"; 
							?>
							
                        </div>                        
						</div>                      
                            <!-- /input-group -->
                        </li>
                        <li>
                            <a href="?p=home"><i class="fa fa-home fa-fw"></i> Beranda</a>
                        </li>
						
						 <li>
                            <a href="#"><i class="fa fa-calendar fa-fw"></i> Jadwal Seminar<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="?p=ppk">Daftar Jadwal</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
						<li>
                            <a href="#"><i class="fa fa-university fa-fw"></i> Manajemen Registrasi<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="?p=">Daftar Registrasi</a>
                                </li>								 <li>                                    <a href="?p=">Manajemen Verifikasi</a>                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
						
						
						
					</ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>
