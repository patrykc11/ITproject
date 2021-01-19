<?php
    session_start();
    //$winner = $_POST;
    //print_r($winner);
    require_once "DataBase.php";
    //print_r($_POST);
    $j=0;
    
        $connection = @new mysqli($host, $db_user, $db_password, $db_name);

        if($connection->connect_errno!=0)
        {
            echo "Error: ".$connection->connect_errno;
        }
        else
        {
            if(isset($_SESSION['logged']) && $_SESSION['logged'] == true && $_SESSION['status']==2)
            {
                       $sql1 = "DROP TABLE zespolyKopia";
                       $result = @$connection->query($sql1);

                        $sql = "CREATE TABLE zespolyKopia SELECT * FROM zespoly";
    
                        if($result = @$connection->query($sql))
                        {
                           
                            $tab = $_POST['winner'];
                            
                            $sql = "SELECT * FROM `mecze` WHERE Stat=0 ORDER BY DataMeczu";

                            if($result = @$connection->query($sql))
                            {
                                while($row = $result->fetch_assoc())
                                {
                                    $host = $row['Gospodarz'];
                                    $guest = $row['Gosc'];

                                    $win = $tab[$j];
                                    
                                    if($win==1)
                                    {
                                        $sql1 = "SELECT * FROM `zespoly` WHERE Nazwa='$host'";
                                        if($result1 = @$connection->query($sql1))
                                        {
                                            $row = $result1->fetch_assoc();
                                            $points1 = $row['Punkty'];
                                            
                                            $a = $points1+3;
                                            
                                            $sql2 = "UPDATE zespolyKopia SET Punkty='$a' WHERE Nazwa='$host'";
                                            $result3 = @$connection->query($sql2);
                                            

                                        }
                                    }else if($win==2)
                                    {
                                        
                                        $sql1 = "SELECT * FROM `zespoly` WHERE Nazwa='$guest'";
                                        if($result2 = @$connection->query($sql1))
                                        {
                                            $row = $result2->fetch_assoc();
                                            $points = $row['Punkty'];
                                            
                                            $b = $points+3;
                                            $sql2 = "UPDATE zespolyKopia SET Punkty='$b' WHERE Nazwa='$guest'";
                                            $result4 = @$connection->query($sql2);
                                            
                                        }
                                

                                    }
                                    
                                    $j++;
                                }
                                //header('Location: main.php?page=simulator');

                                $result->free();
                            }else
                                echo "kopiowanie tabeli nie powiodło się";
                        }   


            }else 
                echo "Tylko trener ma tutaj dostęp";

            $connection->close();
            header('Location: main.php?page=simulator');
        }
?>