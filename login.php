<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Seminar Registration Aplication for Participant</title>
      <link rel="stylesheet" href="css/style.css">

  
</head>

<body>
  <div class="wrapper">

	<div class="container">
	 <h1><img src='img/logo-ipb.png' float='center' width='75px'/></p></h1>
		
		<form class='form' name='daftar' action='cek_login.php' method='POST' onSubmit='return validasi(this)'>
			<input type=text name='username' class='form-control' placeholder='Cth : danz.sasmita@gmail.com'>
			<input type=password name='password' class='form-control' placeholder='**********'>
			<button type='submit' class='btn btn-primary'>Sign In</button>
		</form>
		<form class='form' name='daftar' action='index.php' method='POST' onSubmit='return validasi(this)'>
			
			<button type='submit' class='btn btn-primary'>Lupa Password?</button>
		</form>
		
	</div>
	
	<ul class="bg-bubbles">
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
	</ul>
</div>
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

    <script src="js/index.js"></script>

</body>
</html>
