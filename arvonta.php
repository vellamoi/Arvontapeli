<!DOCTYPE html>
<html lang="fi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS -->
    <link rel="stylesheet" href="tyyli.css" type="text/css">
    <!-- Fontit -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans:wght@300;400;500;700&display=swap" rel="stylesheet">
    <!-- Otsikko -->
    <title>Tulokset</title>
</head>

<body> 

<?php
if (isset($_POST["suorita"])) { // onko painettu arvonta-buttonia

    if (isset($_POST["luku"][5])){ // onko valittu 6 lukua

        $arvausTaulukko = $_POST["luku"]; // otetaan käyttäjän antamat luvut talteen taulukkoon
      
        /* Arvotaan voittoluvut */

        $voittoTaulukko = array(); // tehdään voittoluvuille taulukko
                        
        for($n=0;$n<6;) { // taulukon kohdat 0-5
            $r = rand (1, 30); // random-lukujen muuttuja
            if(!in_array($r, $voittoTaulukko))  { // katsotaan onko sama luku jo arvottu
                $voittoTaulukko[$n] = $r; // sijoitetaan random-luku taulukon muuttujaan n
                $n++; // käydään kaikki taulukossa olevat n-muuttujat läpi
            }
        }        
        ?>
        
        <!-- Tulosten sivu -->

        <div id="tulokset">
            <?php

            /* Selvitetään onko käyttäjän antamissa luvuissa voittoja ja kuinka paljon */

            $erot = array_diff($voittoTaulukko,$arvausTaulukko); // verrataan taulukkoja
            $erojenMaara = count($erot); // lasketaan erot
            $tulos = 6 - $erojenMaara; // vähennetään erot täysistä pisteistä

            if ($tulos > 0) { // jos 1 tai enemmän oikein
                echo "<h1>Sait ";
                echo $tulos;
                echo " oikein!</h1>";
                echo '<img class="tuloskuva" src="Kuvat/voitto.svg" alt="Ihmiset ovat innoissaan">';
            }
            elseif ($tulos == 6) { // jos 6 oikein
                echo "<h1>Kaikki oikein!</h1>";
                echo '<img class="tuloskuva" src="Kuvat/jihuu.svg" alt="Kaksi ihmistä hyppää ilmapallojen kanssa">';
            }
            else { // jos ei yhtään oikein
                echo "<h1>Ei osumia</h1>";
                echo '<img class="tuloskuva" src="Kuvat/void.svg" alt="Ihminen katsoo tyhjyyttä">';
            }
            ?>
                    
            <!-- Tulostetaan valitut luvut ja voittoluvut -->

            <div class="tuloslaatikko">
                <h2>Valitsit luvut:</h2>
                <div class="voittoboksit">
                    <?php
                    sort($arvausTaulukko); // pienimmästä suurimpaan
                    foreach ($arvausTaulukko as $arvausLuku) { 
                        echo '<div class="voittoboksi" id="arvatut"><div>';
                        echo $arvausLuku;
                        echo '</div></div>';
                    }
                    ?>
                </div>        
                <h2>Voittoluvut olivat:</h2>
                <div class="voittoboksit">
                    <?php
                    sort($voittoTaulukko);
                    foreach($voittoTaulukko as $voittoLuku) {
                        echo '<div class="voittoboksi" id="voitot"><div>';
                        echo $voittoLuku;
                        echo '</div></div>';
                    } 
                    ?>
                </div>
            </div>
            <?php
            }

    else { // jos ei ole valittu yhtään lukua tai alle 6 kpl
        echo '<h2>Unohdit valita luvut!</h2><img src="Kuvat/kissa.svg" id="kissakuva" alt="Hämmentynyt kissa ilmassa">';
    }
}        
?>

<a class="button" href="index.php">Kokeile uudestaan</a>
</div>

</body>
</html>



