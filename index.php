<?php
    session_start();
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
      	
      <link href="style.css" rel="stylesheet" type="text/css"> 
	  <link rel="shortcut icon" href="images/igrzyska.jpg">
	</head>
	<body>
		<div align="center">
            <div id="kontener">
				<p id="tytul"><h1>Witaj w Internetowym Asystencie Zawodnika</h1></p>
				<p id="tytul2"><h2>Proszę wybrać sport, który Cię interesuje:</h2></p>
				
				<div class="sporty">
					<a href="logowanie.php">
						<div class = "button">
							<p>Piłka wodna</p>
							<img class="logo" src="images/logo_gorne.png" alt="Piłka wodna logo" />
						</div>
					</a>	
				</div>	

				<div class="sporty">
					<a href="praceTechniczne.php">
						<div class = "button">
							<p>Piłka nożna</p>
							<img class="logo" src="images/800px-Football_pictogram.svg.png" alt="Piłka nożna logo" />
						</div>
					</a>	
				</div>

				<div class="sporty">
					<a href="praceTechniczne.php">
						<div class = "button">
							<p>Siatkówka</p>
							<img class="logo" src="images/800px-Volleyball_(indoor)_pictogram.svg.png" alt="Siatkówka logo" />
						</div>
					</a>	
				</div>

				<div class="sporty">
					<a href="praceTechniczne.php">
						<div class = "button">
							<p>Koszykówka</p>
							<img class="logo" src="images/800px-Basketball_pictogram.svg.png" alt="Koszykówka logo" />
						</div>
					</a>	
				</div>
			</div>
		</div>
	</body>
</html>