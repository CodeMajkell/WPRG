<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $_SESSION['karta'] = $_POST['karta'];
    $_SESSION['zamawiajacy'] = $_POST['zamawiajacy'];
    $_SESSION['ilosc_osob'] = $_POST['ilosc_osob'];
}

$ilosc_osob = $_SESSION['ilosc_osob'] ?? 0;
?>

<!DOCTYPE html>
<html>
<head>
    <title>Podstrona2 – Dane osób</title>
</head>
<body>
<h2>Formularz – Dane osób (<?php echo $ilosc_osob; ?>)</h2>
<form method="post" action="Podstrona3.php">
    <?php for ($i = 1; $i <= $ilosc_osob; $i++): ?>
        <fieldset>
            <legend>Osoba <?php echo $i; ?></legend>
            Imię: <input type="text" name="osoba[<?php echo $i; ?>][imie]" required><br>
            Nazwisko: <input type="text" name="osoba[<?php echo $i; ?>][nazwisko]" required><br>
        </fieldset>
    <?php endfor; ?>
    <input type="submit" name="zapisz" value="Zapisz i przejdź dalej">
</form>
</body>
</html>