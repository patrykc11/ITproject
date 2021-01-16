<?php
	session_start();
	if(isset($_SESSION['logged']) && $_SESSION['logged']==true)
	{
		header('Location: main.php');
		exit();
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" 
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">
	<head>
	  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
	  <meta http-equiv="content-language" content="pl" />
	     
      <meta name="author" content="Patryk Cebo i Mateusz Grzegorczyk" />
	  <meta name="robots" content="index, follow" />
		<title>Internetowy Asystent Zawodnika</title>
	  <meta name="description" content="Internetowy Asystent Zawodnika" />
      <meta name="keywords" content="waterpolo, piłka wodna, piłka wodna mecze, piłka wodna w polsce" />
      	
	  <link href="loginPage.css" rel="stylesheet" type="text/css"> 
	  
	  <link rel="shortcut icon" href="images/icon.png">
	</head>
	<body>
		<!--<div id="panel">
		<form action="loginProcess.php" method="post" enctype="multipart/form-data">
		<label for="username">Nazwa użytkownika:</label>
			<input type="text" id="username" name="username">
		<label for="password">Hasło:</label>
			<input type="password" id="password" name="password">
			<?php
				if(isset($_SESSION['error']))
					echo $_SESSION['error'];
			?>
		<div id="lower">
			<input type="checkbox"><label class="check" for="checkbox">Zapamiętaj mnie!</label>
			<input type="submit" value="Login">
		</div>
		</form>
		</div>-->
		
		<div id="signin">
		<form action="loginProcess.php" method="post" enctype="multipart/form-data">
			<div class="form-title">Logowanie</div>
			<div class="input-field">
				<input type="text" id="username" name="username">
				<i class="material-icons"></i>
				<label for="username">Login</label>
			</div>
			<div class="input-field">
			<input type="password" id="password" name="password">
			<i class="material-icons"></i>
			<label for="password">Hasło</label>
		</div>
		
		<?php
				if(isset($_SESSION['error']))
					echo $_SESSION['error'];
		?>
			<button class="login">Zaloguj</button>

		</div>
		</form>
</div>

		<p><h1><a href="main.php">Nie posiadam konta, chcę wejść jako gość</a></h1></p>

		
	</body>
</html>