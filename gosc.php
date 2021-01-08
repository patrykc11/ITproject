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
      	
      <link href="gosc.css" rel="stylesheet" type="text/css"> 
      <link rel="shortcut icon" href="images/icon.png">
      <script src="https://code.jquery.com/jquery-3.5.0.js"></script>
      <script type="text/javascript" src="http://code.jquery.com/jquery-1.7.1.min.js"></script>
	</head>
	<body>
    <?php

        $zmienna = 4;

    ?>
        <div align="center">
            <div id="kontener">

                <div id="gorna_czesc_kontenera">
                    <a href="gosc.php"><img class="logo" src="images/logo_gorne.png" alt="Piłka wodna logo" /></a>

                    <div id="kontakt_box">
                    <?php
                       // echo "<p>witaj: ".$_SESSION['user'];
                        if(isset($_SESSION['zalogowany']) && $_SESSION['zalogowany'] == true)
                        {
                           echo 
                              "<table>
                                <tr><th>Zalogowano: </th></tr>
                                <tr><td>Nazwa:{$_SESSION['user']}</td></tr>
                                <tr><td>ID:{$_SESSION['userID']}</td></tr>
                                <tr><td><a href='wylogowanie.php'>Wyloguj</a></td></tr>
                           </table>"; 
                        }else
                        {
                            echo 
                            "<table>
                                <tr><th>Odwiedzasz stronę jako gość </th></tr>
                            </table>";
                            
                        }
                    ?>
                    </div>
                </div>

                <div id="srodkowe_menu">
                    <ul id="pierwszy_poziom">
                        <li><a href="gosc.php"><span class="link">Aktualności</span></a>
                        
                            <ul class="drugi_poziom">
                                <li class="pierwszy_element_menu"><div id="AktualnościPolska"><a href="?page=Aktualnosci_polska">Polska</a></div></li>
                                <li><a href="http://www.fina.org/discipline/water-polo">Świat</a></li>
                            </ul>

                        </li>  
                        <li><span class="odstep">        </span></li> 
                        <li><a href="#"><span class="link">Rozgrywki</span></a>
                        
                            <ul class="drugi_poziom">
                                <li class="pierwszy_element_menu"><a href="#">Tabela</a></li>
                                <li><a href="#">Spotkania</a></li>
                                <li><a href="#">Liga Mistrzów</a></li>
                            </ul>

                        </li> 
                        <li><span class="odstep">        </span></li>  
                        <li><a href="#"><span class="link">Zespoły</span></a>

                            <ul class="drugi_poziom">
                                <li class="pierwszy_element_menu"><div id="PoloniaBytom"><a href="?page=PoloniaBytom">Łukosz WTS Polonia Bytom</a></div></li>
                                <li><a href="?page=stronaWbudowie">AZS Uniwersytet Warszawa</a></li>
                                <li><a href="?page=stronaWbudowie">Box Logistics Waterpolo Poznań</a></li>
                                <li><a href="?page=stronaWbudowie">ŁSTW OCMER Łódź</a></li>
                                <li><a href="?page=stronaWbudowie">KSZO Ostrowiec Świętokrzyski</a></li>
                                <li><a href="?page=stronaWbudowie">CHEĆKO Brukarstwo ALFA Gorzów Wlkp.</a></li>
                                <li><a href="?page=stronaWbudowie">UKS NEPTUN Uniwersytet Łódzki</a></li>
                                <li><a href="?page=stronaWbudowie">Arkonia Szczecin</a></li>
                                <li><a href="?page=stronaWbudowie">ŁSTW Politechnika Łódzka</a></li>
                            </ul>

                        </li>
                        <li><span class="odstep">        </span></li>   
                        <li id="ABC"><a href="gif.html"><span class="link">Przepisy</span></a></li>
                        <li><span class="odstep">        </span></li>   
                        <li id="hist"><a href="?page=historia"><span class="link">Historia</span></a></li>
                        <li><span class="odstep">        </span></li>   
                        <li><a href="#"><span class="link">Kursy</span></a>

                            <ul class="drugi_poziom">
                                <li class="pierwszy_element_menu"><a href="http://www.pilkawodna.waw.pl/">Kurs sędziego piłki wodnej</a></li>
                                <li><a href="http://www.pilkawodna.waw.pl/">Kurs trenera piłki wodnej</a></li>
                            </ul>

                        </li>  

                    </ul>
                </div>

                <div id="zawartsc">
                    <div id="gorna_czesc_zawartosci"></div>
                    <div id="srodkowa_czesc_zawartosci">
                        <div id="tekst">
                            <?php

                                if(isset($_GET['page']))
                                {
                                    $allowed_pages = array("PoloniaBytom","Aktualnosci_polska","stronaWbudowie","historia");
                                    $permision_pages = array("PoloniaBytom","trener","zawodnik");

                                    $page = filter_var($_GET['page'], FILTER_SANITIZE_STRING);           

                                    if (!empty($page))
                                    {
                                        if (in_array($page, $allowed_pages))                       
                                        {
                                            if (is_file($page.".php"))
                                                include($page.".php");              
                                        }else if (in_array($page, $permision_pages) && $zmienna==4)                       
                                        {
                                            if (is_file($page.".php"))
                                                include($page.".php");              
                                        }else
                                            echo 'brak uprawnien'; 
                                        
                                        
                                    }   
                                    else
                                    echo 'coś poszło nie tak';   
                                
                                }
                                else                
                                    echo 'brak strony';                 

    

                            ?>
                        </div>



                    </div>
                    <div id="dolna_czesc_zawartosci"></div>
                </div>
            </div>
        </div>
    </body>
</html>