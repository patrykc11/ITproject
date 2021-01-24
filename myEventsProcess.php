<?php
    session_start();

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
                //if(isset($_POST['fname']) && isset($_POST['lname']) && isset($_POST['number']) && isset($_POST['exclusionX']) && isset($_POST['exclusion']) && isset($_POST['goals']) && isset($_POST['height']) && isset($_POST['weight']) && isset($_POST['age']) && isset($_POST['email']) && isset($_POST['matches']))
               // {
                   if(!empty($_POST['name']) && !empty($_POST['data']) && !empty($_POST['info']))
                    {
                        $sql = "SELECT * FROM `wydarzenia` ORDER BY ID DESC";
    
                        if($result = @$connection->query($sql))
                        {
                            if($row = $result->fetch_assoc())
                            {
                                $id = $row['ID'];
                                $id = $id + 1;
                                $name = $_POST['name'];
                                $dateConv = strtotime($_POST['data']);
                                $date = date('Y-m-d H:i:s', $dateConv);
                                $info = $_POST['info'];
                                $club = $_SESSION['club'];
                                
                                $sql = "INSERT INTO `wydarzenia`(`ID`, `Nazwa`, `DataWyd`, `Klub`, `Info`) 
                                VALUES ('$id','$name','$date','$club','$info')";
                                $result->free();
                                if($result = @$connection->query($sql))
                                {
                                    unset($_SESSION['er']);
                                    echo "<script>window.close();</script>";
                                }else
                                    echo "błędne zapytanie";
                            }
                            //header('Location: main.php?page=myTeam&page1=myPlayers');
                        }else
                            echo "błędne zapytanie";
                    }   
                    else{
                    $_SESSION['er'] = '<p><span style="color:red; font-size: 20px" style="text-align:center">Zostawiłeś puste pola!</span></p>';
                    header('Location: myEventsForm.php');
                    }
               // } else 
                //echo "błąd";

            }else 
                echo "Tylko trener ma tutaj dostęp";

            $connection->close();
        }
?>