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
            if(isset($_POST['username']) && isset($_POST['password']))
            {
                if(!empty($_POST['username']) && !empty($_POST['password']))
                {
                    $login = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
                    $pass = $_POST['password'];

                    $login = htmlentities($login, ENT_QUOTES, "UTF-8");


                    if($result = @$connection->query(
                        sprintf("SELECT * FROM uzytkownicy WHERE user='%s'",
                        mysqli_real_escape_string($connection, $login))))
                    {
                        $number_of_users = $result->num_rows;
                        
                        if($number_of_users > 0)
                        {
                            $row = $result->fetch_assoc();

                            if(password_verify($pass, $row['pass']))
                            {
                                $_SESSION['logged'] = true;

                                
                                $_SESSION['user'] = $row['user'];
                                $_SESSION['userID'] = $row['id'];
                                $_SESSION['status'] = $row['status'];

                                unset($_SESSION['error']);
                                $result->free();

                                //echo "Jesteś zalogowany jako ".$user;
                                header('Location: main.php');
                            }
                            else{
                                $_SESSION['error'] = '<p><span style="color:red; font-size: 20px">Nieprawidłowy login lub hasło!</span></p>';
                                header('Location: loginPage.php');
                            }
                        }else{

                            $_SESSION['error'] = '<p><span style="color:red; font-size: 20px">Nieprawidłowy login lub hasło!</span></p>';
                            header('Location: loginPage.php');
                        }
                    }
                }   
                else
                $_SESSION['error'] = '<p><span style="color:red; font-size: 20px" style="text-align:center">Nie podałeś loginu lub hasła!</span></p>';
                header('Location: loginPage.php');
            } 

            $connection->close();
        }



        
    ?>