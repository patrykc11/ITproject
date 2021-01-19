<div id="text">
    <div id="teamHeader">
        <h1><a href="https://www.waterpolo.bytom.pl/" target="_blank">
        <img id="wtsLogo" src="images/WTSlogo.jpg" alt="WTS logo" /></a>Łukosz WTS Polonia Bytom</h1>
    </div>

    <div id="teamMenu">
        <div id="aboutTeam"><a href="?page=PoloniaBytom&page2=aboutBytom">O klubie</a></div>
        <div id="Match"><a href="?page=PoloniaBytom&page2=bytomMatches">Mecze</a></div>
        <div id="Players"><a href="?page=PoloniaBytom&page2=bytomTeam">Skład</a></div>
        <div id="Statistics"><a href="?page=PoloniaBytom&page2=bytomStats">Statystyki</a></div>
    </div>

    <div id="subCont">
        <?php

            if(isset($_GET['page2']))
            {
                $allowed_pages2 = array("aboutBytom","bytomTeam","bytomMatches","bytomStats");

                $page2 = filter_var($_GET['page2'], FILTER_SANITIZE_STRING);           

                if (!empty($page2))
                {
                    if (in_array($page2, $allowed_pages2))                       
                    {
                        if (is_file($page2.".php"))
                             include($page2.".php");                        
                    }else
                        echo '<p><h1>Nie masz uprawnień do tej strony jako gość. Zaloguj się.</h1></p>'; 
                                        
                                        
                }   
                else
                    echo 'coś poszło nie tak';   
                                
            }
            else                
                //echo '<p><h1></h1></p>';                 

    

                            ?>
    </div>
</div>

<style>
#teamHeader
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
#teamMenu 
{
    width:800px;
    padding-top: 20px;
    padding-bottom: 10px;
    border-style: solid;
    border-width: 0px 0px 3px 0px;
    border: bottom;
}
#teamMenu a
{
    border-bottom: none;
    color: #515151;
    font-size: 15px;
    font-family: "Trebuchet MS", Helvetica, sans-serif;
    font-weight: bold;
    font-style: italic; 
}

#teamMenu a:hover
{
    color: black;
}
#teamMenu:after 
{
        content:'';
        display:block;
        clear:both;
}


#aboutTeam
{
        float:left;
        width:100px;
        height: 20px;
        margin-left: 170px;
        border-radius: 10px;
}

#Match
{
        float:left;
        width:100px;
        height: 20px;
        border-radius: 10px;
        
}
#Players
{
        float:left;
        width:100px;
        height: 20px;
        border-radius: 10px;
        
}
#Statistics
{
        float:left;
        width:100px;
        height: 20px;
        border-radius: 10px;
        
}
</style>