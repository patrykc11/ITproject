<div>
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
    
                                unset($_SESSION['error']);
                                $result->free();

                        }else
                            echo "błędne zapytanie";
                    
                 
    
                $connection->close();
            }
        }
        echo $_SESSION['age'];;
        echo  $_SESSION['position'];
    ?>



</div>
<style>
#text
{
    text-align: justify;
    padding: 10px 50px;
    row-height: 140%;
    font-size: 14px;
    font-family: "Trebuchet MS", Helvetica, sans-serif;
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