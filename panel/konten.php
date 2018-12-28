<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<body>

<?php

if ($_GET['p']=='home')
{ 
include "module/home/home.php";
}
else
if ($_GET['p']=='useradmin')
{ 
include "module/useradmin/administrator.php";
}
else
	if ($_GET['p']=='ppk')
{ 
include "module/peserta/peserta_k.php";
}
else
	if ($_GET['p']=='pps')
{ 
include "module/peserta/peserta_s.php";
}
else
	if ($_GET['p']=='useradmin')
{ 
include "module/useradmin/administrator.php";
}
else
if ($_GET['p']=='profile')
{ 
include "module/profile/profile.php";
}
else
if ($lu == 'admin' AND $_GET['p']=='daftar')
{ 
include "module/daftar/daftar.php";
}

else
{
include "not_found.php";	
}

?>
</body>
</html>