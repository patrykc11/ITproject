<?php
    session_start();

?>
<!DOCTYPE html>
<html>
<body>
<?php
if(isset($_SESSION['logged']) && $_SESSION['logged'] == true && $_SESSION['status']==2)
{
    echo "
        <h3>Wypełnij dane o wydarzeniu</h3>";

        if(isset($_SESSION['er']))
            echo $_SESSION['er'];
    echo "
        <div>
        <form action=\"myEventsProcess.php\" method=\"post\" enctype=\"multipart/form-data\">
            <label for=\"name\">Nazwa wydarzenia</label>
            <input type=\"text\" id=\"name\" name=\"name\" placeholder=\"Nazwa...\">

            <label for=\"data\">Data wydarzenia</label>
            <input type=\"date\" id=\"data\" name=\"data\" placeholder=\"Data...\">

            <p><label for=\"info\">Szczegóły wydarzenia</label></p>
            <input type=\"text\" id=\"info\" name=\"info\" placeholder=\"Szczegóły...\">

            <input type=\"submit\" value=\"Dodaj\">
        </form>
        </div>";
}else
    echo "Tylko trener ma tutaj dostęp";
?>
</body>
</html>


<style>
input[type=text], select {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

input[type=submit] {
  width: 100%;
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: #45a049;
}

div {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
}

h3
{
    font-size: 40px; 
    text-align: center;
    font-weight: bold;
    margin-bottom: 22px;
    font-family: Calibri, Tahoma, Arial;
    font-style: italic;
}
</style>
