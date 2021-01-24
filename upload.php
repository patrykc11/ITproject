<?php
    //if(isset($_POST['submit']))
    //{
        session_start();
        $club = $_SESSION['club'];
        $file = $_FILES['myfile'];

        $fileName = $_FILES['myfile']['name'];
        $fileTmpName = $_FILES['myfile']['tmp_name'];
        $fileSize = $_FILES['myfile']['size'];
        $fileError = $_FILES['myfile']['error'];
        $fileType = $_FILES['myfile']['type'];

        $fileExt = explode('.', $fileName);
        $fileActualExt = strtolower(end($fileExt));

        $allowed = array('jpg','pjeg','png','pdf','doc','docx','txt');
       // echo "tutaj";
        if(in_array($fileActualExt, $allowed))
        {
            if($fileError === 0)
            {
                if($fileSize < 500000)
                {
                    //echo "tutaj";
                    $fileNameNew = uniqid('', true).".".$fileActualExt;
                    $fileDestination = 'uploads/'.$fileNameNew;
                    move_uploaded_file($fileTmpName, $fileDestination);

                    header("Location: main.php?page=myTeam&page1=myFiles");
                }else
                {
                    echo "Twój plik jest za duży";
                }
            }else{
                echo "Podaczas ładowania pliku wystąpił błąd";
            }
        }else
        {
            echo "Nie możesz umieścić plików na stronie";
        }
    //}


?>