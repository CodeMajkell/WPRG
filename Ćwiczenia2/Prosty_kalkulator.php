<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kalkulator</title>
</head>
<body>
    <h1>Prosty kalkulator</h1>
    <form action="" method="post">
        <label for="liczba1">Pierwsza liczba:</label>
        <input type="number" name="liczba1" required><br><br>

        <label for="liczba2">Druga liczba:</label>
        <input type="number" name="liczba2" required><br><br>

        <label for="dzialanie">Wybierz działanie:</label>
        <select name="dzialanie">
            <option value="dodawanie">Dodawanie</option>
            <option value="odejmowanie">Odejmowanie</option>
            <option value="mnozenie">Mnożenie</option>
            <option value="dzielenie">Dzielenie</option>
        </select><br><br>

        <input type="submit" value="Oblicz">
    </form>
	
	
	<?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $liczba1 = $_POST['liczba1'];
        $liczba2 = $_POST['liczba2'];
        $dzialanie = $_POST['dzialanie'];
        
        switch ($dzialanie) {
            case 'dodawanie':
                $wynik = $liczba1 + $liczba2;
                break;
            case 'odejmowanie':
                $wynik = $liczba1 - $liczba2;
                break;
            case 'mnozenie':
                $wynik = $liczba1 * $liczba2;
                break;
            case 'dzielenie':
                if ($liczba2 == 0) {
                    $wynik = "Nie można dzielić przez zero!";
                } else {
                    $wynik = $liczba1 / $liczba2;
                }
                break;
        }

        echo "<h2>Wynik: $wynik</h2>";
    }
    ?>
	
	
</body>
</html>