
    <?php
     
    echo "<center><table id=\"tab\">
    <tr><td class = \"head\">Data</td><td class = \"head\">Nazwa</td><td class = \"headInf\">Szczegóły</td><td class = \"head\"></td></tr>";
    $j = 0;
            require_once "DataBase.php";

            $connection = @new mysqli($host, $db_user, $db_password, $db_name);

            if($connection->connect_errno!=0)
            {
                echo "Error: ".$connection->connect_errno;
            }
            else
            {
                if(isset($_SESSION['logged']) && $_SESSION['logged'] == true && ($_SESSION['status']==2 || $_SESSION['status']==1))
                {
                    $club = $_SESSION['club'];
                    $sql = "SELECT *  FROM `wydarzenia` WHERE Klub = '$club' ORDER BY DataWyd";
        
                            if($result = @$connection->query($sql))
                            {
                                    while($row = $result->fetch_assoc() )
                                    {
                                        $id[$j] = $row['ID'];
                                        $name = $row['Nazwa'];
                                        $date = $row['DataWyd'];
                                        $inf = $row['Info'];
                                        echo "<tr><td class = \"layout\">{$date}</td><td class = \"layout\">{$name}</td><td class = \"inf\">{$inf}</td><td class = \"layout\">";if(isset($_SESSION['status']) && $_SESSION['status']==2)echo"<form action=\"myEventsDelete.php\" method=\"post\" enctype=\"multipart/form-data\"><input type=\"hidden\" id=\"id\" name=\"id\" value = $id[$j]> <input class=\"button\" type=\"submit\" value=\"Usuń\"></form></td></tr>";
                                        $j++;
                                    }
                                    $result->free();
                                    echo  "</table></center>";
                                // print_r($_SESSION);
                                    if(isset($_SESSION['status']) && $_SESSION['status']==2)
                                    {
                                        echo "
                                        <a class=\"button\" href='myEventsForm.php' target=\"_blank\">
                                        
                                            Dodaj wydarzenie
                                        
                                        </a>";
                                    }
                            }else
                                echo "błędne zapytanie";
                    }
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
}

.inf
{
    text-align: justify;
    font-family: "Trebuchet MS", Helvetica, sans-serif;
    font-size: 15px;
    border: 1px solid black;
    border-left: none;
    border-top: none;
    border-right: none;
    width: 400px;
}

.headInf
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
    width: 400px;
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

.button{
 display: inline-block;
 border:1px solid #696969;
 color: black;
 border-radius: 3px 3px 3px 3px;
 /*-webkit-border-radius: 3px 3px 3px 3px;
 -moz-border-radius: 3px 3px 3px 3px;*/
 font-family: Verdana;
 width: auto;
 height: auto;
 font-size: 13px;
 padding: 4px 21px;
 margin-bottom: 10px;
 margin-top: 10px;
 /*box-shadow: inset 0 1px 0 0 #fff6ce,inset 0 -1px 0 0 #e3c852,inset 0 0 0 1px #fce88d,0 2px 4px 0 #D4D4D4;
 -moz-box-shadow: inset 0 1px 0 0 #fff6ce,inset 0 -1px 0 0 #e3c852,inset 0 0 0 1px #fce88d,0 2px 4px 0 #D4D4D4;
 -webkit-box-shadow: inset 0 1px 0 0 #fff6ce,inset 0 -1px 0 0 #e3c852,inset 0 0 0 1px #fce88d,0 2px 4px 0 #D4D4D4;
 text-shadow: 0 1px 0 #fff;*/
 background-image: linear-gradient(to top, #C0C0C0, #C0C0C0);
 background-color: #C0C0C0;
}
.button:hover, .button:active{
 border:1px solid #696969;
 color: black;
 box-shadow: inset 0 1px 0 0 #696969,inset 0 -1px 0 0 #696969,inset 0 0 0 1px #696969;
 -moz-box-shadow: inset 0 1px 0 0 #696969,inset 0 -1px 0 0 #696969,inset 0 0 0 1px #696969;
 -webkit-box-shadow: inset 0 1px 0 0 #696969,inset 0 -1px 0 0 #696969,inset 0 0 0 1px #696969;
 background-color:#C0C0C0;
}
</style>