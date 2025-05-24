<?php
$limit_odwiedzin = 5;

if (isset($_COOKIE['licznik_odwiedzin'])) {
    $licznik = (int)$_COOKIE['licznik_odwiedzin'];
    $licznik++;
} else {
    $licznik = 1;
}

setcookie('licznik_odwiedzin', $licznik, time() + 30*24*60*60);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Licznik odwiedzin</title>
</head>
<body>
    <h2>Licznik odwiedzin strony</h2>
    <p>Odwiedziłeś tę stronę <?php echo $licznik; ?> razy.</p>

    <?php if ($licznik >= $limit_odwiedzin): ?>
        <p><strong>Osiągnąłeś limit odwiedzin (<?php echo $limit_odwiedzin; ?>)!</strong></p>
    <?php endif; ?>
</body>
</html>