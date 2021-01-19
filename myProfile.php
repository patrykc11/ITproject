
    <p><h1>Mój profil</h1></p>
    <?php
        if(isset($_SESSION['logged']) && $_SESSION['logged']==true)
        {
            require_once "DataBase.php";

            $connection = @new mysqli($host, $db_user, $db_password, $db_name);

            if($connection->connect_errno!=0)
            {
                echo "Error: ".$connection->connect_errno;
            }
            else
            {
                $userid = $_SESSION['userID'];
                $sql = "SELECT * FROM zawodnicy WHERE IDuzytkownika='$userid'";
    
                        if($result = @$connection->query($sql))
                        {
                                $row = $result->fetch_assoc();
                                $_SESSION['name'] = $row['Imie'];
                                $_SESSION['surname'] = $row['Nazwisko'];
                                $_SESSION['age'] = $row['Rocznik'];
                                $_SESSION['position'] = $row['Pozycja'];
                                $_SESSION['number'] = $row['NumerCzepka'];
                                $_SESSION['club'] = $row['Klub'];
                                $_SESSION['weight'] = $row['Waga'];
                                $_SESSION['height'] = $row['Wzrost'];
                                $_SESSION['goals'] = $row['ZdobyteBramki'];
    
                                unset($_SESSION['error']);
                                $result->free();

                                echo  
                                    "<center><table id=\"tab\">
                                        <tr><td class=\"left\">Imię:  </td><td class=\"middle\">{$_SESSION['name']}</td></tr>
                                        <tr><td class=\"left\">Nazwisko: </td><td class=\"middle\">{$_SESSION['surname']}</td></tr>
                                        <tr><td class=\"left\">Rocznik:  </td><td class=\"middle\">{$_SESSION['age']}</td></tr>
                                        <tr><td class=\"left\">Klub:   </td><td class=\"middle\">{$_SESSION['club']}</td></tr>
                                        <tr><td class=\"left\">Pozycja:  </td><td class=\"middle\">{$_SESSION['position']}</td></tr>
                                        <tr><td class=\"left\">Numer czepka:   </td><td class=\"middle\">{$_SESSION['number']}</td></tr>
                                        <tr><td class=\"left\">Waga:   </td><td class=\"middle\">{$_SESSION['weight']} kg</td></tr>
                                        <tr><td class=\"left\">Wzrost:  </td><td class=\"middle\">{$_SESSION['height']} cm</td></tr>
                                        <tr><td class=\"left\">Zdobyte bramki:  </td><td class=\"middle\">{$_SESSION['goals']}</td></tr>
                                    </table></center>
                                    ";
                        }else
                            echo "błędne zapytanie";
                    
                 
    
                $connection->close();
            }
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