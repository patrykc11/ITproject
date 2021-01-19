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
                   if(!empty($_POST['fname']) && !empty($_POST['lname']) && !empty($_POST['number']) && !empty($_POST['exclusionX']) && !empty($_POST['exclusion']) && !empty($_POST['goals']) && !empty($_POST['height']) && !empty($_POST['weight']) && !empty($_POST['age']) && !empty($_POST['email']) && !empty($_POST['matches']))
                    {
                        $sql = "SELECT * FROM `zawodnicy` ORDER BY ID DESC";
    
                        if($result = @$connection->query($sql))
                        {
                            if($row = $result->fetch_assoc())
                            {
                                $id = $row['ID'];
                                $id = $id + 1;
                                $name = $_POST['fname'];
                                $surname = $_POST['lname'];
                                $number = $_POST['number'];
                                $matches = $_POST['matches'];
                                $exclusionX = $_POST['exclusionX'];
                                $exclusion = $_POST['exclusion'];
                                $position = $_POST['position'];
                                $goals = $_POST['goals'];
                                $height = $_POST['height'];
                                $weight = $_POST['weight'];
                                $age = $_POST['age'];
                                $email = $_POST['email'];
                                $club = $_SESSION['club'];
                                
                                $sql = "INSERT INTO `zawodnicy`(`ID`, `Imie`, `Nazwisko`, `Klub`, `Pozycja`, `NumerCzepka`, `Rocznik`, `Waga`, `Wzrost`, `ZdobyteBramki`, `Wykluczenia`, `WykluczeniaBezPrawa`, `IloscRozegranychSpotkan`, `IDuzytkownika`, `Email`) 
                                VALUES ('$id','$name','$surname','$club','$position','$number','$age','$weight','$height','$goals','$exclusion','$exclusionX','$matches','0','$email')";
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
                    header('Location: addPlayerForm.php');
                    }
               // } else 
                //echo "błąd";

            }else 
                echo "Tylko trener ma tutaj dostęp";

            $connection->close();
        }
?>