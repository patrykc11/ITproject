<?php
        session_start();

        require_once "BazaDanych.php";

        $polaczenie = @new mysqli($host, $db_user, $db_password, $db_name);

        if($polaczenie->connect_errno!=0)
        {
            echo "Error: ".$polaczenie->connect_errno;
        }
        else
        {
            if(isset($_POST['username']) && isset($_POST['password']))
            {
                if(!empty($_POST['username']) && !empty($_POST['password']))
                {
                    $login = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
                    $haslo = filter_var($_POST['password'], FILTER_SANITIZE_STRING);
                    
                    $sql = "SELECT * FROM uzytkownicy WHERE user='$login' AND pass='$haslo'";

                    if($rezultat = @$polaczenie->query($sql))
                    {
                        $ilu_userow = $rezultat->num_rows;
                        
                        if($ilu_userow > 0)
                        {
                            $_SESSION['zalogowany'] = true;

                            $wiersz = $rezultat->fetch_assoc();
                            $_SESSION['user'] = $wiersz['user'];
                            $_SESSION['userID'] = $wiersz['id'];
                            $pass = $wiersz['pass'];
                            $_SESSION['status'] = $wiersz['status'];

                            unset($_SESSION['blad']);
                            $rezultat->free();

                            //echo "Jesteś zalogowany jako ".$user;
                            header('Location: gosc.php');
                        }else{

                            $_SESSION['blad'] = '<p><span style="color:red" style="text-align:center">Nieprawidłowy login lub hasło!</span></p>';
                            header('Location: logowanie.php');
                        }
                    }
                }   
                else
                    echo "Nie podałeś loginu lub hasła.";
                
            } 

            $polaczenie->close();
        }



        
    ?>