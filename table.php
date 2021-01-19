<p><h1>Tabela</h1></p>
    <?php
    echo "<center><table id=\"tab\">
    <tr><td class = \"head\">Miejsce</td><td class = \"head\">Nazwa zespołu</td><td class = \"head\">Punkty</td><td class = \"head\">Zwycięstwa</td><td class = \"head\">Porażki</td><td class = \"head\">Ilość meczów</td></tr>";
        $i = 1;
            require_once "DataBase.php";

            $connection = @new mysqli($host, $db_user, $db_password, $db_name);

            if($connection->connect_errno!=0)
            {
                echo "Error: ".$connection->connect_errno;
            }
            else
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
                        }else
                            echo "błędne zapytanie";
    
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
</style>