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
      	
      <link href="main.css" rel="stylesheet" type="text/css"> 
      <link rel="shortcut icon" href="images/icon.png">
      <script src="https://code.jquery.com/jquery-3.5.0.js"></script>
      <script type="text/javascript" src="http://code.jquery.com/jquery-1.7.1.min.js"></script>
	</head>
	<body>
    <style type="text/css">
    <?php

        include 'main.css';

    ?>
    </style>
        <div align="center">
            <div id="container">

                <div id="top_of_the_container">
                    <a href="?page=startPage"><img class="logo" src="images/logo_gorne.png" alt="Piłka wodna logo" /></a>

                    <div id="contact_box">
                    <?php

                       // echo "<p>witaj: ".$_SESSION['user'];
                        if(isset($_SESSION['logged']) && $_SESSION['logged'] == true)
                        {                        
                            if($_SESSION['status'] == 1)
                                $role = "zawodnik";
                            if($_SESSION['status'] == 2)
                                $role = "trener";
                           echo 
                              "<table>
                                <tr><td>Zalogowany jako: {$_SESSION['user']}</td></tr>
                                <tr><td>Rola w zespole: {$role}</td></tr>
                                <tr><td><a href='?page=myProfile'>Mój profil</a></td></tr>
                                <tr><td><a href='logout.php'>Wyloguj</a></td></tr>
                           </table>"; 
                        }else
                        {
                            echo 
                            "<table>
                                <tr><th>Odwiedzasz stronę jako gość </th></tr>
                                <tr><td><a href='loginPage.php'>Zaloguj się</a></td></tr>
                            </table>";
                            
                        }
                    ?>
                    </div>
                </div>

                <div id="middle_menu">
                    <ul id="first_level">
                        <li><a href="main.php"><span class="link">Aktualności</span></a>
                        
                            <ul class="second_level">
                                <li class="first_element"><div id="polish_news"><a href="?page=polish_news">Polska</a></div></li>
                                <li><a href="http://www.fina.org/discipline/water-polo" target="_blank">Świat</a></li>
                            </ul>

                        </li>  
                        <li><span class="space">        </span></li> 
                        <li><a href="#"><span class="link">Rozgrywki</span></a>
                        
                            <ul class="second_level">
                                <li class="first_element"><a href="?page=table">Tabela</a></li>
                                <li><a href="?page=matches">Spotkania</a></li>
                                <li><a href="https://www.flashscore.com/water-polo/europe/champions-league/" target="_blank">Liga Mistrzów</a></li>
                                <li><a href="?page=simulator">Symulator sezonu</a></li>
                            </ul>

                        </li> 
                        <li><span class="space">        </span></li>  
                        <li><a href="#"><span class="link">Zespoły</span></a>

                            <ul class="second_level">
                                <li class="first_element"><div id="PoloniaBytom"><a href="?page=PoloniaBytom">Łukosz WTS Polonia Bytom</a></div></li>
                                <li><a href="?page=webInProgress">AZS Uniwersytet Warszawa</a></li>
                                <li><a href="?page=webInProgress">Box Logistics Waterpolo Poznań</a></li>
                                <li><a href="?page=webInProgress">ŁSTW OCMER Łódź</a></li>
                                <li><a href="?page=webInProgress">KSZO Ostrowiec Świętokrzyski</a></li>
                                <li><a href="?page=webInProgress">CHEĆKO Brukarstwo ALFA Gorzów Wlkp.</a></li>
                                <li><a href="?page=webInProgress">UKS NEPTUN Uniwersytet Łódzki</a></li>
                                <li><a href="?page=webInProgress">Arkonia Szczecin</a></li>
                                <li><a href="?page=webInProgress">ŁSTW Politechnika Łódzka</a></li>
                            </ul>

                        </li>
                        <li><span class="space">        </span></li>   
                        <li id="ABC"><a href="?page=rules"><span class="link">Przepisy</span></a></li>
                        <li><span class="space">        </span></li>   
                        <li id="hist"><a href="?page=history"><span class="link">Historia</span></a></li>
                        <li><span class="space">        </span></li>
                        <li id="hist"><a href="?page=myTeam"><span class="link">Moja drużyna</span></a></li>
                        <li><span class="space">        </span></li>    
                        <li><a href="#"><span class="link">Kursy</span></a>

                            <ul class="second_level">
                                <li class="first_element"><a href="downloads/kursSedziego.doc">Kurs sędziego piłki wodnej</a></li>
                                <li><a href="downloads/kursTrenera.doc">Kurs trenera piłki wodnej</a></li>
                            </ul>

                        </li>  

                    </ul>
                </div>

                <div id="content">
                    <div id="upper_part_of_content"></div>
                    <div id="middle_part_of_content">
                        <div id="text">
                            <?php

                                if(isset($_GET['page']))
                                {
                                    $allowed_pages = array("PoloniaBytom","polish_news","webInProgress","history","rules","startPage","table","matches");
                                    $limited_pages = array("PoloniaBytom","myProfile","rules","startPage", "myTeam","table","matches","simulator");

                                    $page = filter_var($_GET['page'], FILTER_SANITIZE_STRING);           

                                    if (!empty($page))
                                    {
                                        if (in_array($page, $allowed_pages))                       
                                        {
                                            if (is_file($page.".php"))
                                                include($page.".php");              
                                        }else if (in_array($page, $limited_pages) && isset($_SESSION['status']) && ($_SESSION['status']==1 || $_SESSION['status']==2))                       
                                        {
                                            if (is_file($page.".php"))
                                                include($page.".php");              
                                        }else
                                            echo '<p><h1>Nie masz uprawnień do tej strony jako gość. Zaloguj się.</h1></p>'; 
                                        
                                        
                                    }   
                                    else
                                    echo 'coś poszło nie tak';   
                                
                                }
                                else                
                                echo '<p><h1>Witaj w Internetowym Asystencie Zawodnika</h1></p>';                 

    

                            ?>
                        </div>



                    </div>
                    <div id="lower_part_of_content"></div>
                </div>
                <div id="lower_part_of_page">Designed and created by Patryk Cebo and Mateusz Grzegorczyk</div>
            </div>
        </div>
    </body>
</html>