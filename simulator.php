<p><h1>Symulator sezonu</h1></p>
    <?php
    echo "<center><table id=\"tab\">
    <tr><td class = \"head\">Miejsce</td><td class = \"head\">Nazwa zespołu</td><td class = \"head\">Punkty</td><td class = \"head\">Zwycięstwa</td><td class = \"head\">Porażki</td><td class = \"head\">Ilość meczów</td></tr>";
        $i = 1;
        $j = 0;
            require_once "DataBase.php";

            $connection = @new mysqli($host, $db_user, $db_password, $db_name);

            if($connection->connect_errno!=0)
            {
                echo "Error: ".$connection->connect_errno;
            }
            else
            {
                $sql = "SELECT * FROM `zespolyKopia` ORDER BY Punkty DESC";
    
                        if($result = @$connection->query($sql))
                        {
                                while($row = $result->fetch_assoc())
                                {
                                    $name = $row['Nazwa'];
                                    $points = $row['Punkty'];
                                    $wins = $row['Zwyciestwa'];
                                    $failures = $row['Porazki'];
                                    $wins = $row['Zwyciestwa'];
                                    $all = $row['RozegraneMecze'];

                                    echo "<tr><td class = \"layout\">$i</td><td class = \"layout\">{$name}</td><td class = \"layout\">{$points}</td><td class = \"layout\">{$wins}</td><td class = \"layout\">{$failures}</td><td class = \"layout\">{$all}</td></tr>";
                                    $i++;
                                }
                                $result->free();
                                echo  "</table></center>";
                                $sql1 = "DROP TABLE zespolyKopia";
                                if($result = @$connection->query($sql1))
                                {
                                    echo  "Możesz przeprowadzić nową symulacje";  
                                }
                        
                        }else
                        {
                            $sql = "SELECT * FROM `zespoly` ORDER BY Punkty DESC";
    
                            if($result = @$connection->query($sql))
                            {
                                    while($row = $result->fetch_assoc())
                                    {
                                        $name = $row['Nazwa'];
                                        $points = $row['Punkty'];
                                        $wins = $row['Zwyciestwa'];
                                        $failures = $row['Porazki'];
                                        $wins = $row['Zwyciestwa'];
                                        $all = $row['RozegraneMecze'];
    
                                        echo "<tr><td class = \"layout\">$i</td><td class = \"layout\">{$name}</td><td class = \"layout\">{$points}</td><td class = \"layout\">{$wins}</td><td class = \"layout\">{$failures}</td><td class = \"layout\">{$all}</td></tr>";
                                        $i++;
                                    }
                                    $result->free();
                                    echo  "</table></center>";
                                }
                        }

                        echo "<center><table id=\"tab\">
                            <tr><td class = \"head\">Data</td><td class = \"head\">Gospodarze</td><td class = \"head\">Goście</td><td class = \"head\">Oczekiwany wynik</td></tr>";
                            
                            $sql = "SELECT * FROM `mecze` WHERE Stat=0 ORDER BY DataMeczu";
    
                            if($result = @$connection->query($sql))
                            {
                                echo "<form action=\"simulationProcess.php\" method=\"post\" enctype=\"multipart/form-data\">";
                                    while($row = $result->fetch_assoc())
                                    {
                                        $host = $row['Gospodarz'];
                                        $guest = $row['Gosc'];
                                        $date = $row['DataMeczu'];
                                        $referee = $row['Sedziowie'];
                                        $score = $row['Wynik'];
    
                                        echo "<tr><td class = \"layout\">{$date}</td><td class = \"layout\">{$host}</td><td class = \"layout\">{$guest}</td><td class = \"layout\"><input type=\"radio\" name=\"winner[$j]\" value=\"1\" />1<input type=\"radio\" name=\"winner[$j]\" value=\"2\" />2<input type=\"radio\" name=\"winner[$j]\" value=\"3\" />Brak</td></tr>";
                                        $j++;
                                    }

                                    $result->free();
                                    echo  "</table></center>";
                                    echo "<input type=\"submit\" value=\"Przeprowadź symulacje\">
                                    </form>";
                            }else
                                echo "błędne zapytanie";
                            //echo "błędne zapytanie";
    
                $connection->close();
            }
        
    ?>




<style>
#tab 
{

    width: 800px; 
    border-collapse: collapse;
}

.layout
{
    text-align: center;
    font-family: "Trebuchet MS", Helvetica, sans-serif;
    font-size: 15px;
    border: 1px solid black;
    border-left: none;
    border-top: none;
    border-right: none;
    height:40px;
}

.head
{
    text-align: center;
    font-family: "Trebuchet MS", Helvetica, sans-serif;
    font-size: 17px;
    border: 1px solid black;
    border-left: none;
    border-top: none;
    border-right: none;
    font-weight: bold;
    height:60px;
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

button{
 display: inline-block;
 border:1px solid #696969;
 color: black;
 border-radius: 3px 3px 3px 3px;
 /*-webkit-border-radius: 3px 3px 3px 3px;
 -moz-border-radius: 3px 3px 3px 3px;*/
 font-family: Verdana;
 width: auto;
 height: auto;
 font-size: 13px;
 padding: 4px 21px;
 margin-bottom: 10px;
 margin-top: 10px;
 /*box-shadow: inset 0 1px 0 0 #fff6ce,inset 0 -1px 0 0 #e3c852,inset 0 0 0 1px #fce88d,0 2px 4px 0 #D4D4D4;
 -moz-box-shadow: inset 0 1px 0 0 #fff6ce,inset 0 -1px 0 0 #e3c852,inset 0 0 0 1px #fce88d,0 2px 4px 0 #D4D4D4;
 -webkit-box-shadow: inset 0 1px 0 0 #fff6ce,inset 0 -1px 0 0 #e3c852,inset 0 0 0 1px #fce88d,0 2px 4px 0 #D4D4D4;
 text-shadow: 0 1px 0 #fff;*/
 background-image: linear-gradient(to top, #C0C0C0, #C0C0C0);
 background-color: #C0C0C0;
}
button:hover, button:active{
 border:1px solid #696969;
 color: black;
 box-shadow: inset 0 1px 0 0 #696969,inset 0 -1px 0 0 #696969,inset 0 0 0 1px #696969;
 -moz-box-shadow: inset 0 1px 0 0 #696969,inset 0 -1px 0 0 #696969,inset 0 0 0 1px #696969;
 -webkit-box-shadow: inset 0 1px 0 0 #696969,inset 0 -1px 0 0 #696969,inset 0 0 0 1px #696969;
 background-color:#C0C0C0;
}
</style>