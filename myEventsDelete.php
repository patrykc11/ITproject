<?php
session_start();
    //session_start();
    //print_r($_POST);
    require_once "DataBase.php";

        $connection = @new mysqli($host, $db_user, $db_password, $db_name);

        if($connection->connect_errno!=0)
        {
            echo "Error: ".$connection->connect_errno;
        }
        else
        {
            if(isset($_SESSION['logged']) && $_SESSION['logged'] == true && $_SESSION['status']==2)
            {
                        $id = $_POST['id'];
                        $sql = "DELETE FROM wydarzenia WHERE ID = '$id'";
    
                        if($result = @$connection->query($sql))
                        {

                            header('Location: main.php?page=myTeam&page1=myEvents');
                        }else
                            echo "błędne zapytanie";
                       

            }else 
                echo "Tylko trener ma tutaj dostęp";

            $connection->close();
        }
?>