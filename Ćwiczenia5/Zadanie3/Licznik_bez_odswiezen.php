<?php
$limit_odwiedzin = 5;
$czas_blokady = 60;

if (isset($_COOKIE['licznik_odwiedzin'])) {
    $licznik = (int)$_COOKIE['licznik_odwiedzin'];
} else {
    $licznik = 0;
}

$moze_zwiekszyc = !isset($_COOKIE['ostatnia_wizyta']) || (time() - (int)$_COOKIE['ostatnia_wizyta'] > $czas_blokady);

if ($moze_zwiekszyc) {
    $licznik++;
    setcookie('licznik_odwiedzin', $licznik, time() + 30*24*60*60);
    setcookie('ostatnia_wizyta', time(), time() + 30*24*60*60);
} else {
    setcookie('ostatnia_wizyta', $_COOKIE['ostatnia_wizyta'], time() + 30*24*60*60);
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Licznik odwiedzin bez liczenia odświeżeń</title>
</head>
<body>
    <h2>Licznik odwiedzin strony</h2>
    <p>Odwiedziłeś tę stronę <?php echo $licznik; ?> razy.</p>

    <?php if ($licznik >= $limit_odwiedzin): ?>
        <p><strong>Osiągnąłeś limit odwiedzin (<?php echo $limit_odwiedzin; ?>)!</strong></p>
    <?php endif; ?>
</body>
</html>