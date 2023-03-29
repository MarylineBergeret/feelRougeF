    <!-- Contrôles audio -->
    <div id="audio-controls">
        <!-- Bouton play/pause -->
        <!-- <button type="button" id="play-pause-button" class="btn btn-lg"><i id="play-pause-icon"></i></button> -->

        <label for="volume-control">Volume:</label>
        <input id="volume-control" type="range" min="0" max="100" value="100" step="1">
    </div>
    <div class="image-container">
        <img src="..\assets\image\1637.jpg" alt="salon d'écoute" id="listen">

        <?php


    // Pour chaque musique, on affiche un bouton pour la jouer
    // et on ajoute un élément audio pour pouvoir la jouer
        foreach ($music_list as $index => $music) {
            echo '<div id="point' . $index . '" class="pointing-div"><button onclick="playMusic(' . $index . ')">Play ' . $music['name'] . '</button>';
            echo '<audio id="audio' . $index . '" src="' . $music['src'] . '"></audio></div>';
        }
        ?>
    </div>    

