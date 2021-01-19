
    <div id="myTeamHeader">
        <h1>Moja Drużyna</h1>
    </div>

    <div id="myTeamMenu">
        <div id="players"><a href="?page=myTeam&page1=myPlayers">Zawodnicy</a></div>
        <div id="trenings"><a href="#">Treningi</a></div>
        <div id="upcoming_events"><a href="#">Nadchodzące wydarzenia</a></div>
        <div id="files"><a href="#">Pliki do pobrania</a></div>
    </div>
    <div id="subpageContent">
        <?php

            if(isset($_GET['page1']))
            {
                $limited_pages1 = array("myPlayers");

                $page1 = filter_var($_GET['page1'], FILTER_SANITIZE_STRING);           

                if (!empty($page1))
                {
                    if (in_array($page1, $allowed_pages))                       
                    {
                        if (is_file($page1.".php"))
                             include($page1.".php");              
                    }else if (in_array($page1, $limited_pages1) && isset($_SESSION['status']) && ($_SESSION['status']==1 || $_SESSION['status']==2))                       
                    {
                        if (is_file($page1.".php"))
                            include($page1.".php");              
                    }else
                        echo '<p><h1>Nie masz uprawnień do tej strony jako gość. Zaloguj się.</h1></p>'; 
                                        
                                        
                }   
                else
                    echo 'coś poszło nie tak';   
                                
            }
            else                
                //echo '<p><h1>nie ma takiej strony</h1></p>';                 

    

                            ?>
    </div>


<style>
#myTeamHeader
{
    
    width:990px;
    height: 100px;
}
#wtsLogo
{
    float: left;
    width: 160px;
    height: 100px;
    
    padding-left: 25px;
    top: 0px;
}
p
{
    text-align: center;
}
h1
{
    font-size: 40px; 
    text-align: center;
    font-weight: bold;
    padding-top: 30px;
    margin-bottom: 22px;
    font-family: Calibri, Tahoma, Arial;
    font-style: italic;
}
#myTeamMenu 
{
    width:800px;
    padding-top: 20px;
    padding-bottom: 10px;
    border-style: solid;
    border-width: 0px 0px 3px 0px;
    border: bottom;
}
#myTeamMenu a
{
    border-bottom: none;
    color: #515151;
    font-size: 15px;
    font-family: "Trebuchet MS", Helvetica, sans-serif;
    font-weight: bold;
    font-style: italic; 
}
#myTeamMenu a:hover
{
    color: black;
}
#myTeamMenu:after 
{
        content:'';
        display:block;
        clear:both;
}
#players
{
        float:left;
        width:90px;
        height: 20px;
        margin-left: 100px;
        border-radius: 10px;
}
#trenings
{
        float:left;
        width:200px;
        height: 20px;
        border-radius: 10px;
        
}
#upcoming_events
{
        float:left;
        width:200px;
        height: 20px;
        border-radius: 10px;
        
}
#files
{
        float:left;
        width:200px;
        height: 20px;
        border-radius: 10px;
        
}

#subpageContent
{
    width:990px;

    display: inline-block;
}
#cont
{
    width: 990px;
    margin: 0 auto;
}
</style>