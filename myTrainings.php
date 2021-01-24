
    <?php
 
 echo "<center><table id=\"tab\">
 <tr><td class = \"head\">Poniedziałek</td><td class = \"head\">Wtorek</td><td class = \"head\">Środa</td><td class = \"head\">Czwartek</td><td class = \"head\">Piątek</td><td class = \"head\">Sobota</td><td class = \"head\">Niedziela</td></tr>";

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
                $sql = "SELECT * FROM treningi WHERE Klub='$club'";
 
                     if($result = @$connection->query($sql))
                     {
                             while($row = $result->fetch_assoc() )
                             {
                                 $monday = $row['Poniedziałek'];
                                 $tuesday = $row['Wtorek'];
                                 $wednesday = $row['Środa'];
                                 $thursday = $row['Czwartek'];
                                 $friday = $row['Piątek'];
                                 $saturday = $row['Sobota'];
                                 $sunday = $row['Niedziela'];

                                 echo "<tr><td class = \"layout\">{$monday}</td><td class = \"layout\">{$tuesday}</td><td class = \"layout\">{$wednesday}</td><td class = \"layout\">{$thursday}</td><td class = \"layout\">{$friday}</td><td class = \"layout\">{$saturday}</td><td class = \"layout\">{$sunday}</td></tr>";
                             }
                             $result->free();
                             echo  "</table></center>";
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
 height:60px;
 width: 130px;
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
 height:80px;
 width: 130px;
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