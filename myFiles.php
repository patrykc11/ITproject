
    <p><h2>Pliki udostępnione dla Ciebie</h2></p>

    <?php
       
       

       $sciezka = "uploads/";
       
       $lista=array();
       
       $katalog = opendir($sciezka);
       
       while ($plik = strtolower(readdir($katalog))) {
       
         if (($plik<>".")&&($plik<>"..")) if(!is_dir($sciezka.$plik))
       
         $lista[]=$plik;
       
       }
       
       closedir($katalog);
       
       sort($lista);
       
       for ($i=0;$i<count($lista);$i++) {
       
         echo "<br><p><a class=\"file\" href=\"$sciezka/$lista[$i]\">plik[$i]</a></p><br>";
       
       }
       
       
















       if(isset($_SESSION['logged']) && $_SESSION['logged'] == true && $_SESSION['status']==2)
       {
           echo"
            <form action= \"upload.php\" method = \"POST\"  enctype=\"multipart/form-data\">
                <label for=\"myfile\">Wybierz plik:</label>
                <input  type=\"file\" id=\"myfile\" name=\"myfile\">
                <input class=\"button\" type=\"submit\" value=\"Prześlij\">
            </form>";
       }
        
    ?>




<style>
.file
{
    text-align: center;
    font-family: "Trebuchet MS", Helvetica, sans-serif;
    font-size: 20px;
    color: black;
    margin-bottom: 22px;
}

form
{
    
    margin-bottom: 22px;
    margin-top: 22px;
}
.file:hover
{
    text-align: center;
    font-family: "Trebuchet MS", Helvetica, sans-serif;
    font-size: 20px;
    margin-bottom: 22px;
}

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