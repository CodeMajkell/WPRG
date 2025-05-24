<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['osoba'])) {
    $_SESSION['osoby'] = $_POST['osoba'];
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Podstrona3 – Podsumowanie</title>
</head>
<body>
<h2>Podsumowanie danych</h2>
<p><strong>Nr karty:</strong> <?php echo $_SESSION['karta']; ?></p>
<p><strong>Zamawiający:</strong> <?php echo $_SESSION['zamawiajacy']; ?></p>
<p><strong>Ilość osób:</strong> <?php echo $_SESSION['ilosc_osob']; ?></p>

<h3>Dane osób:</h3>
<ol>
    <?php foreach ($_SESSION['osoby'] as $osoba): ?>
        <li><?php echo $osoba['imie'] . " " . $osoba['nazwisko']; ?></li>
    <?php endforeach; ?>
</ol>
</body>
</html>