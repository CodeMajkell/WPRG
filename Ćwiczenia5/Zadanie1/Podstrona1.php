<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
    <title>Podstrona1 – Dane ogólne</title>
</head>
<body>
<h2>Formularz – Dane ogólne</h2>
<form method="post" action="Podstrona2.php">
    Nr karty: <input type="text" name="karta" required><br>
    Imię i nazwisko zamawiającego: <input type="text" name="zamawiajacy" required><br>
    Ilość osób: <input type="number" name="ilosc_osob" min="1" required><br>
    <input type="submit" value="Dalej">
</form>
</body>
</html>