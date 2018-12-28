<!DOCTYPE html>
<html>
<head>
<meta http-equiv="refresh" content="0;url=media.html">
<title>SB Admin 2</title>
<script language="javascript">
    window.location.href = "media.php?p=home"
</script>
</head>

<body>

<?php
session_start();

if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='css/screen.css' rel='stylesheet' type='text/css'><link href='css/reset.css' rel='stylesheet' type='text/css'>


 <center><br><br><br><br><br><br>Maaf, untuk masuk <b>Halaman Administrator</b><br>
  <center>anda harus <b>Login</b> dahulu!<br><br>";
 echo "<div> <a href='index.php'><img src='/images/kunci.png'  height=176 width=143></a>
             </div>";
  echo "<input type=button class=simplebtn value='LOGIN DI SINI' onclick=location.href='index.php'></a></center>";
}
else{
?>
Go to <a href="../index.php">Login</a>
<?php
}
?>
</body>

</html>
