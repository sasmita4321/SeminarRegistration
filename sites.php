<!DOCTYPE html>
<html lang="en">
<?php
session_start();
error_reporting(0);

include "config/koneksi.php";
include "config/library.php";
include "config/fungsi_indotgl.php";
include "config/fungsi_combobox.php";
include "config/class_paging.php";
include "config/fungsi_rupiah.php";

?>
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
	
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
<meta http-equiv="content-type" content="text/html;charset=UTF-8">

<meta name="keywords" content=""/>
<meta name="robots" content="ALL,FOLLOW"/>
<meta http-equiv="imagetoolbar" content="no"/>


    <title>Seminar Nasional | LPPM - STIE Kesatuan Bogor</title>
	<link rel="shortcut icon" type="image/x-icon" href="images/favicon.gif">
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/cufon.js"></script>
<script type="text/javascript" src="js/Geometr231_Hv_BT_400.font.js"></script>
<script type="text/javascript" src="js/script.js"></script>
<!-- Bootstrap Core CSS -->
    <link href="panel/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="panel/bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">
    <link href="panel/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css" rel="stylesheet">
    <link href="panel/bower_components/datatables-responsive/css/dataTables.responsive.css" rel="stylesheet">
    <link href="panel/dist/css/sb-admin-2.css" rel="stylesheet">
    <link href="panel/bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="panel/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/modern-business.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
<?php
include 'inc.php';
include 'config/koneksi.php';
$sesi=$_SESSION['leveluser'];
$id=$_SESSION['nikuser'];
if ($sesi==pm){
	include 'men_pm.php';
}
else
if ($sesi==ps){
	include 'men_ps.php';
}
else {
	include 'men_umum.php';
}
$get=base64_decode($_GET['pg']);

if ($get=='home.html'){
if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
 echo"<!-- Header Carousel -->
    <header id='myCarousel' class='carousel slide'>
        <!-- Indicators -->
        <ol class='carousel-indicators'>
            <li data-target='#myCarousel' data-slide-to='0' class='active'></li>
            <li data-target='#myCarousel' data-slide-to='1'></li>
            <li data-target='#myCarousel' data-slide-to='2'></li>
        </ol>

        <!-- Wrapper for slides -->
        <div class='carousel-inner'>
            <div class='item active'>
			<div class='fill' style='background-image:url(img/slides2.gif);'>

				</div>
                <div class='carousel-caption'>

                </div>
            </div>
            <div class='item'>
                <div class='fill' style='background-image:url(img/slide4.gif);'></div>
                <div class='carousel-caption'>

                </div>
            </div>
           <!-- <div class='item'>
                <div class='fill' style='background-image:url(img/slides2.gif);'></div>
                <div class='carousel-caption'>

                </div>
            </div>-->
        </div>

        <!-- Controls -->
        <a class='left carousel-control' href='#myCarousel' data-slide='prev'>
            <span class='icon-prev'></span>
        </a>
        <a class='right carousel-control' href='#myCarousel' data-slide='next'>
            <span class='icon-next'></span>
        </a>
</header>";
}  
else{
	echo"";
}
}
else{
	echo"";
}
	echo"<!-- Page Content -->
    <div class='container'>
	 <div class='row'>
            <div class='col-lg-12'>
                <h1 class='page-header'>
                </h1>
                <ol class='breadcrumb'>
                    <li><a href='index.html'></a>
                    </li>
                </ol>
            </div>
        </div>
        <div class='row'>
            <!-- Blog Entries Column -->
            <div class='col-md-8'>
";
include 'list.php';
   echo" </div>
            <!-- Blog Sidebar Widgets Column -->
            <div class='col-md-4'>
                <!-- Blog Categories Well -->
                <div class='well'>
                    <h4>Waktu dan Tempat</h4>
                    <div class='row'>
                        <div class='col-lg-12'>
                            <ul class='list-unstyled'>
                                <li><i class='fa fa-clock-o'></i> &nbsp;Kamis, 30 November 2017
                                </li>
                                <li><i class='fa fa-university'></i> Aula Lantai 6 - STIE Kesatuan Bogor
                                </li>
                                <li><i class='fa fa-arrow-right'></i> &nbsp;Jalan Ranggagading No. 1 Bogor 16123
                                </li>
                            </ul>
                        </div>
                      
                        <!-- /.col-lg-6 -->
                    </div>
                    <!-- /.row -->
                </div>
				 <!-- Blog Categories Well -->
                <div class='well'>
                    <h4>Tanggal Penting</h4>
                    <div class='row'>
                        <div class='col-lg-12'>
                            <ul class='list-unstyled'>
							 <p><i class='fa fa-list'></i><strong> &nbsp;Registrasi : </strong></p>
			   <ul>                                        
			   <li>10 April s.d 15 Agustus 2017</li>
			   </ul>	
			   <p><i class='fa fa-file-o'></i><strong> &nbsp;Pengiriman Abstrak : </strong></p>
			   <ul>                                        
			   <li>10 April s.d 10 Juli 2017</li>
			   </ul>	
                              <p><i class='fa fa-bullhorn'></i><strong> &nbsp;Pengumuman Abstrak yang Diterima : </strong></p>
			   <ul>                                        
			   <li>12 Juli 2017</li>
			   </ul>	
			   <p><i class='fa fa-file-pdf-o'></i><strong> &nbsp;Pengiriman Makalah : </strong></p>
			   <ul>                                        
			   <li>12 Juli s.d 14 Oktober 2017</li>
			   </ul>	
                                
                            </ul>
                        </div>
                      
                        <!-- /.col-lg-6 -->
                    </div>
                    <!-- /.row -->
                </div>

                <!-- Side Widget Well -->
                <div class='well'>
                    <h4>Call For Paper</h4>
                    <p>Kami menerima bahan paper dengan topik :</p>
					<ul>
                    
                    <li>Ilmu Ekonomi / Ekonomi Islam</li>
                    <li>Manajemen / Bisnis / Pemasaran / Kewirausahaan</li>
                    <li>Akuntansi</li>
                    <li>Keuangan dan Perbankan</li>
                    <li>Administrasi Bisnis</li>
					 <li>Bidang lainnya yang relevan</li>
					
                </ul>
				<p><i class='fa fa-star'></i><strong> 5 (Lima) Paper terbaik akan mendapatkan uang tunai jutaan rupiah</strong></p>
                </div>

            </div>

        </div>
		
		
       

        <!-- Footer -->
        <footer>
            <div class='row'>
                <div class='col-lg-12'>
                    <p>Copyright &copy; Team IT STIE KESATUAN 2017</p>
                </div>
            </div>
        </footer>";
?>
    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Script to Activate the Carousel -->
    <script>
    $('.carousel').carousel({
        interval: 5000 //changes the speed
    })
    </script>

</body>

</html>
