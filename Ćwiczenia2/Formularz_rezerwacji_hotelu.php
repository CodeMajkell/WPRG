<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formularz rezerwacji hotelu</title>
</head>
<body>
    <h1>Formularz rezerwacji hotelu</h1>

    <?php
	
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Pobranie danych z formularza
        $ilosc_osob = $_POST['ilosc_osob'];
        $imie = [];
        $nazwisko = [];
        $adres = [];
        $email = [];
        $karta_cred = htmlspecialchars($_POST['karta_cred']);
        $data_pobytu = $_POST['data_pobytu'];
        $godzina_przyjazdu = $_POST['godzina_przyjazdu'];
        $lozko_dziecko = isset($_POST['lozko_dziecko']) ? 'Tak' : 'Nie';
        $klimatyzacja = isset($_POST['klimatyzacja']) ? 'Tak' : 'Nie';
        $popielniczka = isset($_POST['popielniczka']) ? 'Tak' : 'Nie';


        for ($i = 1; $i <= $ilosc_osob; $i++) {
            $imie[] = htmlspecialchars($_POST["imie_$i"]);
            $nazwisko[] = htmlspecialchars($_POST["nazwisko_$i"]);
            $email[] = htmlspecialchars($_POST["email_$i"]);
        }




        echo "<h1>Podsumowanie rezerwacji</h1>";
        echo "<p><strong>Ilość osób:</strong> $ilosc_osob</p>";
        for ($i = 1; $i <= $ilosc_osob; $i++) {
            echo "<p><strong>Imię osoby $i:</strong> " . $imie[$i-1] . "</p>";
            echo "<p><strong>Nazwisko osoby $i:</strong> " . $nazwisko[$i-1] . "</p>";
            echo "<p><strong>E-mail osoby $i:</strong> " . $email[$i-1] . "</p>";
        }
        echo "<p><strong>Numer karty kredytowej:</strong> $karta_cred</p>";
        echo "<p><strong>Data pobytu:</strong> $data_pobytu</p>";
        echo "<p><strong>Godzina przyjazdu:</strong> $godzina_przyjazdu</p>";
        echo "<p><strong>Potrzebujesz łóżka dla dziecka?</strong> $lozko_dziecko</p>";
        echo "<p><strong>Udogodnienia:</strong></p>";
        echo "<ul>";
        echo "<li><strong>Klimatyzacja:</strong> $klimatyzacja</li>";
        echo "<li><strong>Popielniczka dla palacza:</strong> $popielniczka</li>";
        echo "</ul>";
    } else {
    ?>
    
    <form action="" method="post">
	
        <label for="ilosc_osob">Ilość osób (1-4):</label>
        <select name="ilosc_osob" id="ilosc_osob" required onchange="showForm()">
            <option value="1">1 osoba</option>
            <option value="2">2 osoby</option>
            <option value="3">3 osoby</option>
            <option value="4">4 osoby</option>
        </select><br><br>


        <div id="formularz_osob"></div>


        <fieldset>
            <legend>Dane osoby rezerwującej</legend>
            <label for="karta_cred">Numer karty kredytowej:</label>
            <input type="text" name="karta_cred" id="karta_cred" pattern="\d{16}" required><br><br>
        </fieldset><br>


        <label for="data_pobytu">Data pobytu:</label>
        <input type="date" name="data_pobytu" id="data_pobytu" required><br><br>


        <label for="godzina_przyjazdu">Godzina przyjazdu:</label>
        <input type="time" name="godzina_przyjazdu" id="godzina_przyjazdu" required><br><br>


        <label for="lozko_dziecko">Potrzebujesz łóżka dla dziecka?</label>
        <input type="checkbox" name="lozko_dziecko" id="lozko_dziecko"><br><br>


        <fieldset>
            <legend>Wybierz udogodnienia</legend>
            <label for="klimatyzacja">Klimatyzacja:</label>
            <input type="checkbox" name="klimatyzacja" id="klimatyzacja"><br><br>

            <label for="popielniczka">Popielniczka dla palacza:</label>
            <input type="checkbox" name="popielniczka" id="popielniczka"><br><br>
        </fieldset><br>

        <input type="submit" value="Zatwierdź rezerwację">
    </form>

    <script>
	
        function showForm() {
            const iloscOsob = document.getElementById("ilosc_osob").value;
            const formularzOsob = document.getElementById("formularz_osob");
            let html = '';


            for (let i = 1; i <= iloscOsob; i++) {
                html += `
                    <fieldset>
                        <legend>Dane osoby ${i}</legend>
                        <label for="imie_${i}">Imię:</label>
                        <input type="text" name="imie_${i}" id="imie_${i}" required><br><br>

                        <label for="nazwisko_${i}">Nazwisko:</label>
                        <input type="text" name="nazwisko_${i}" id="nazwisko_${i}" required><br><br>

                        <label for="email_${i}">E-mail:</label>
                        <input type="email" name="email_${i}" id="email_${i}" required><br><br>
                    </fieldset><br>
                `;
            }
			
			
			
            formularzOsob.innerHTML = html;
        }
		
		document.addEventListener("DOMContentLoaded", function() {
            showForm();
        });
    </script>

    <?php
    }
    ?>
</body>
</html>