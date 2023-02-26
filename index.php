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
    <!--jQuery-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <title>Arvontapeli</title>
</head>

<body>
    <!-- Pelin aloitussivu -->
    <div id="peli">
        <h1>Arvontapeli</h1>
        <h2>Valitse kuusi lukua ja kokeile onneasi!</h2>
        <img src="Kuvat/valitse.svg" alt="Ihminen tekee valintoja ruudukkoon">

        <!-- Lukujen valintaruudukko -->
        <form action="arvonta.php" method="post" id="valinnat">
            <div class="boksit">
                <?php
                /* Tehdään valintaruudut luvuille 1-30 */
                for ($x = 1; $x <= 30; $x++) {
                    echo '<div class="boksi"><input type="checkbox" id="valinta" name="luku[]" value="';
                    echo $x;
                    echo '"><div>';
                    echo $x;
                    echo '</div></div>';
                    }
                ?>
            </div>
        </form>
        <button form="valinnat" type="submit" name="suorita" class="button">Suorita arvonta</button>
    </div>
</body>

<footer>
    <!-- Käyttäjä saa valita vain 6 lukua -->
    <script>
        $("input:checkbox").click(function() {
            var raja = $("input:checkbox:checked").length >= 6;    
            $("input:checkbox").not(":checked").attr("disabled",raja); // loput checkboxit pois käytöstä
        });
    </script>
</footer>

</html>
