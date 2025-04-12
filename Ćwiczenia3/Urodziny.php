<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Data urodzenia</title>
</head>
<body>
    <h2>Sprawdź informacje o swojej dacie urodzenia</h2>
    
    <form method="GET">
        <label for="birthdate">Wybierz datę urodzenia:</label>
        <input type="date" name="birthdate" required>
        <input type="submit" value="Sprawdź">
    </form>

    <?php
    if (isset($_GET['birthdate'])) {
        $birthdate = $_GET['birthdate'];
        $birthDateTime = new DateTime($birthdate);
        $today = new DateTime();

        
        function getDayOfWeek(DateTime $date) {
            $days = ['niedziela', 'poniedziałek', 'wtorek', 'środa', 'czwartek', 'piątek', 'sobota'];
            return $days[(int)$date->format('w')];
        }

        
        function getAge(DateTime $birth, DateTime $today) {
            return $today->diff($birth)->y;
        }

        
        function daysUntilNextBirthday(DateTime $birth, DateTime $today) {
            $nextBirthday = DateTime::createFromFormat('Y-m-d', $today->format('Y') . '-' . $birth->format('m-d'));
            
            if ($nextBirthday < $today) {
                $nextBirthday->modify('+1 year');
            }

            return $today->diff($nextBirthday)->days;
        }

        echo "<hr>";
        echo "<p><strong>Data urodzenia:</strong> " . $birthDateTime->format('d.m.Y') . "</p>";
        echo "<p>Urodziłeś/aś się w: <strong>" . getDayOfWeek($birthDateTime) . "</strong></p>";
        echo "<p>Masz: <strong>" . getAge($birthDateTime, $today) . "</strong> lat</p>";
        echo "<p>Do Twoich najbliższych urodzin zostało: <strong>" . daysUntilNextBirthday($birthDateTime, $today) . "</strong> dni</p>";
    }
    ?>
</body>
</html>