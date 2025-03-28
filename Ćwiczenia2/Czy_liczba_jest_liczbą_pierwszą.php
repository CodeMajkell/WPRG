<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sprawdzenie liczby pierwszej</title>
</head>
<body>
    <h1>Sprawdzenie, czy liczba jest pierwsza</h1>

    <form method="post">
        <label for="liczba">Wprowadź liczbę:</label>
        <input type="number" name="liczba" id="liczba" required>
        <input type="submit" value="Sprawdź">
    </form>

    <?php
	
    function isPrime($number) {
        $iteracje = 0;
        
		
        if ($number <= 1) {
            return [false, $iteracje]; 
        }
		
        for ($i = 2; $i <= sqrt($number); $i++) {
            $iteracje++;
            if ($number % $i == 0) {
                return [false, $iteracje]; 
            }
        }

        return [true, $iteracje]; 
    }


    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		
        $liczba = (int)$_POST['liczba'];


        if ($liczba <= 0 || !is_int($liczba)) {
            echo "<p>Proszę podać liczbę całkowitą dodatnią.</p>";
        } else {
			
            list($isPrime, $iteracje) = isPrime($liczba);


            if ($isPrime) {
                echo "<p>$liczba jest liczbą pierwszą.</p>";
            } else {
                echo "<p>$liczba nie jest liczbą pierwszą.</p>";
            }
            echo "<p>Liczba iteracji pętli: $iteracje</p>";
        }
    }
    ?>

</body>
</html>