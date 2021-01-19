<?php
          require_once "DataBase.php";

            $connection = @new mysqli($host, $db_user, $db_password, $db_name);

            if($connection->connect_errno!=0)
            {
                echo "Error: ".$connection->connect_errno;
            }
            else
            {
                $sql = "SELECT * FROM `zespoly` WHERE Nazwa='Łukosz WTS Polonia Bytom'";
    
                        if($result = @$connection->query($sql))
                        {
                                while($row = $result->fetch_assoc())
                                {
                                    $name = $row['Nazwa'];
                                    $city = $row['Miejscowosc'];
                                    $date = $row['DataZal'];
                                    $points = $row['Punkty'];
                                    $champions = $row['IloscMistrzostwa'];
                                    $matches = $row['RozegraneMecze'];
                                    $wins = $row['Zwyciestwa'];
                                    $failures = $row['Porazki'];
                                
                                    echo  
                                    "<center><table id=\"tab\">
                                        <tr><td class=\"left\">Nazwa:  </td><td class=\"middle\">{$name}</td></tr>
                                        <tr><td class=\"left\">Miejscowość: </td><td class=\"middle\">{$city}</td></tr>
                                        <tr><td class=\"left\">Data założenia:  </td><td class=\"middle\">{$date}</td></tr>
                                        <tr><td class=\"left\">Ilość mistrzostw Polski:   </td><td class=\"middle\">{$champions}</td></tr>
                                        <tr><td class=\"left\">Punkty w sezonie:  </td><td class=\"middle\">{$points}</td></tr>
                                        <tr><td class=\"left\">Rozegrane spotkania:   </td><td class=\"middle\">{$matches}</td></tr>
                                        <tr><td class=\"left\">Zwycięstwa:   </td><td class=\"middle\">{$wins}</td></tr>
                                        <tr><td class=\"left\">Porażki:  </td><td class=\"middle\">{$failures}</td></tr>
                                    </table></center>
                                    ";
                                }
                                $result->free();
                        }else
                            echo "błędne zapytanie";
    
                $connection->close();
            }
        
    ?>




<style>
#tab 
{

    width: 800px; 
    height:400px;
    border-collapse: collapse;
}

.middle
{
    text-align: center;
    font-family: "Trebuchet MS", Helvetica, sans-serif;
    font-size: 17px;
    border: 1px solid black;
    border-left: none;
    border-top: none;
    border-right: none;
}

.left
{

    font-family: "Trebuchet MS", Helvetica, sans-serif;
    font-size: 20px;
    font-weight: bold;
    border: 1px solid black;
    border-top: none;
    border-right: none;
    border-left: none;
    width: 400px;
}


h1
{
    font-size: 40px; 
    text-align: center;
    font-weight: bold;
    margin-bottom: 22px;
    font-family: Calibri, Tahoma, Arial;
    font-style: italic;
}
</style>