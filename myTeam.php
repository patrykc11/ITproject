<div id="text">
    <div id="myTeamHeader">
        <h1>Moja Drużyna</h1>
    </div>

    <div id="myTeamMenu">
        <div id="players"><a href="#">Zawodnicy</a></div>
        <div id="trenings"><a href="#">Treningi</a></div>
        <div id="upcoming_events"><a href="#">Nadchodzące wydarzenia</a></div>
        <div id="files"><a href="#">Pliki do pobrania</a></div>
    </div>
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
    margin-bottom: 22px;
    font-family: Calibri, Tahoma, Arial;
    font-style: italic;
}
#myTeamMenu 
{
    padding-top: 20px;
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
        width:100px;
        height: 20px;
        margin-left: 170px;
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
</style>