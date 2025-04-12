<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Fibonacci – rekurencja vs iteracja</title>
</head>
<body>
    <h2>Porównanie działania funkcji Fibonacciego</h2>

    <form method="GET">
        <label for="number">Podaj numer wyrazu ciągu Fibonacciego (np. 20):</label>
        <input type="number" name="number" min="0" required>
        <input type="submit" value="Oblicz">
    </form>

    <?php
    if (isset($_GET['number'])) {
        $n = (int)$_GET['number'];

        
        function fib_recursive($n) {
            if ($n <= 1) return $n;
            return fib_recursive($n - 1) + fib_recursive($n - 2);
        }

        
        function fib_iterative($n) {
            if ($n <= 1) return $n;
            $a = 0;
            $b = 1;
            for ($i = 2; $i <= $n; $i++) {
                $temp = $a + $b;
                $a = $b;
                $b = $temp;
            }
            return $b;
        }

        
        $startRecursive = microtime(true);
        $resultRecursive = fib_recursive($n);
        $endRecursive = microtime(true);
        $timeRecursive = $endRecursive - $startRecursive;

        
        $startIterative = microtime(true);
        $resultIterative = fib_iterative($n);
        $endIterative = microtime(true);
        $timeIterative = $endIterative - $startIterative;

        echo "<hr>";
        echo "<p><strong>Wynik F($n):</strong> $resultIterative</p>";
        echo "<p>Czas (rekurencja): " . number_format($timeRecursive, 6) . " sekundy</p>";
        echo "<p>Czas (iteracja): " . number_format($timeIterative, 6) . " sekundy</p>";

        
        if ($timeRecursive > $timeIterative) {
            $diff = $timeRecursive - $timeIterative;
            echo "<p><strong>Iteracyjna wersja była szybsza o: " . number_format($diff, 6) . " sekundy</strong></p>";
        } else {
            $diff = $timeIterative - $timeRecursive;
            echo "<p><strong>Rekurencyjna wersja była szybsza o: " . number_format($diff, 6) . " sekundy</strong></p>";
        }

        
        if ($n > 35) {
            echo "<p style='color: red;'>Uwaga: dla n > 35 funkcja rekurencyjna może działać bardzo wolno!</p>";
        }
    }
    ?>
</body>
</html>