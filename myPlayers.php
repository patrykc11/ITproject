
    <?php
    echo "<center><table id=\"tab\">
    <tr><td class = \"head\">Imie</td><td class = \"head\">Nazwisko</td><td class = \"head\">Pozycja</td><td class = \"head\">Numer czepka</td><td class = \"head\">Zdobyte Bramki</td><td class = \"head\">Email</td></tr>";
 
            require_once "DataBase.php";

            $connection = @new mysqli($host, $db_user, $db_password, $db_name);

            if($connection->connect_errno!=0)
            {
                echo "Error: ".$connection->connect_errno;
            }
            else
            {
                $club = $_SESSION['club'];
                $sql = "SELECT * FROM `zawodnicy` WHERE Klub = '$club' ORDER BY NumerCzepka";
    
                        if($result = @$connection->query($sql))
                        {
                                while($row = $result->fetch_assoc() )
                                {
                                    $name = $row['Imie'];
                                    $surname = $row['Nazwisko'];
                                    $position = $row['Pozycja'];
                                    $number = $row['NumerCzepka'];
                                    $age = $row['Rocznik'];
                                    $email = $row['Email'];
                                    $goals = $row['ZdobyteBramki'];

                                    echo "<tr><td class = \"layout\">{$name}</td><td class = \"layout\">{$surname}</td><td class = \"layout\">{$position}</td><td class = \"layout\">{$number}</td><td class = \"layout\">{$goals}</td><td class = \"layout\"><a href = \"mailto:{$email}\">{$email}</a></td></tr>";
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
    font-size: 15px;
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


#players
{
    font-size: 40px; 
    text-align: center;
    font-weight: bold;
    margin-bottom: 22px;
    font-family: Calibri, Tahoma, Arial;
    font-style: italic;
}
</style>