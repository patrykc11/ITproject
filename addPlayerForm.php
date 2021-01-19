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
        <h3>Wypełnij dane o zawodniku</h3>";

        if(isset($_SESSION['er']))
            echo $_SESSION['er'];
    echo "
        <div>
        <form action=\"addPlayerProcess.php\" method=\"post\" enctype=\"multipart/form-data\">
            <label for=\"fname\">Imię</label>
            <input type=\"text\" id=\"fname\" name=\"fname\" placeholder=\"Imię\">

            <label for=\"lname\">Nazwisko</label>
            <input type=\"text\" id=\"lname\" name=\"lname\" placeholder=\"Nazwisko\">

            <label for=\"position\">Pozycja</label>
            <select id=\"position\" name=\"position\">
            <option value=\"Bramkarz\">Bramkarz</option>
            <option value=\"Skrzydłowy\">Skrzydłowy</option>
            <option value=\"Obrońca\">Obrońca</option>
            <option value=\"Rozgrywający\">Rozgrywający</option>
            <option value=\"Center\">Center</option>
            </select>

            <label for=\"number\">Numer czepka</label>
            <input type=\"text\" id=\"number\" name=\"number\" placeholder=\"Numer czepka\">

            <label for=\"age\">Rocznik</label>
            <input type=\"text\" id=\"age\" name=\"age\" placeholder=\"Rocznik\">

            <label for=\"weight\">Waga</label>
            <input type=\"text\" id=\"weight\" name=\"weight\" placeholder=\"Waga\">

            <label for=\"height\">Wzrost</label>
            <input type=\"text\" id=\"height\" name=\"height\" placeholder=\"Wzrost\">

            <label for=\"goals\">Zdobyte bramki</label>
            <input type=\"text\" id=\"goals\" name=\"goals\" placeholder=\"Zdobyte bramki\">

            <label for=\"exclusion\">Wykluczenia</label>
            <input type=\"text\" id=\"exclusion\" name=\"exclusion\" placeholder=\"Wykluczenia\">
        
            <label for=\"exclusionX\">Wykluczenia bez prawa zamiany</label>
            <input type=\"text\" id=\"exclusionX\" name=\"exclusionX\" placeholder=\"Wykluczenia bez prawa zamiany\">

            <label for=\"matches\">Ilość rozegranych meczów</label>
            <input type=\"text\" id=\"matches\" name=\"matches\" placeholder=\"Ilość rozegranych meczów\">

            <label for=\"email\">Email</label>
            <input type=\"text\" id=\"email\" name=\"email\" placeholder=\"Email\">

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
