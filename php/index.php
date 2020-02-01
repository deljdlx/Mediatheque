<?php
require('bootstrap.php');

$songs = null;
$artistes = null;

if(isset($_GET['search'])) {
    $search = $_GET['search'];
    $artistes = getArtists($search);
    $songs = getSongs($search);
}

?>
<!doctype html>
<html>
    <head>
        <title>Mediatheque - 00</title>
        <link rel="stylesheet" href="../css/reset.css"/>
        <link rel="stylesheet" href="../css/style.css"/>
        <meta charset="ut8-8"/>

    </head>

    <body>

    <header>
            <form mthod="get">
                <input name="search" placeholder="Chercher un artiste ou une chanson"/>
                <button>Chercher</button>
            </form>
    </header>

    <div class="container">

        <div id="results">

            <div class="songs">
                <?php
                if(!empty($songs)) {
                    foreach ($songs as $song) {
                        echo displaySong($song);
                    }
                }
                ?>
            </div>
        </div>

        <div id="info-panel">

        </div>

    </div>

    <script src="../js/app.js"></script>

    <script>
        <?php
                //ne vous souciez pas de ce bout de code
                echo 'app.songs  = '.json_encode($songs).';';
        ?>
    </script>


    <script>
        //initialisation de l'application
        app.init();
    </script>

    </body>



</html>