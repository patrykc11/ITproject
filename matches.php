<p><h1>Spotkania</h1></p>
    <?php
    echo "<center><table id=\"tab\">
    <tr><td class = \"head\">Data</td><td class = \"head\">Gospodarze</td><td class = \"head\">Goście</td><td class = \"head\">Sędziowe</td><td class = \"head\">Wynik</td></tr>";
            require_once "DataBase.php";

            $connection = @new mysqli($host, $db_user, $db_password, $db_name);

            if($connection->connect_errno!=0)
            {
                echo "Error: ".$connection->connect_errno;
            }
            else
            {
                $sql = "SELECT * FROM `mecze` ORDER BY DataMeczu";
    
                        if($result = @$connection->query($sql))
                        {
                                while($row = $result->fetch_assoc())
                                {
                                    $host = $row['Gospodarz'];
                                    $guest = $row['Gosc'];
                                    $date = $row['DataMeczu'];
                                    $referee = $row['Sedziowie'];
                                    $score = $row['Wynik'];

                                    echo "<tr><td class = \"layout\">{$host}</td><td class = \"layout\">{$guest}</td><td class = \"layout\">{$date}</td><td class = \"layout\">{$referee}</td><td class = \"layout\">{$score}</td></tr>";
                                    
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