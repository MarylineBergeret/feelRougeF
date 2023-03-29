    <!-- Contrôles audio -->
    <div id="audio-controls">
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
        <script>
    // Liste de tous les éléments audio sur la page
let audioList = document.querySelectorAll("audio");

let volumeControl = document.getElementById("volume-control");
let currentAudioTime = 0;
function playMusic(index) {
    // Pause all other audio elements - Pause tous les autres éléments audio
    audioList.forEach(audio => {
        if (audio.paused === false && audio.id !== "audio" + index) {
            audio.pause();
            audio.currentTime = 0;
        }
    });

    // Play or pause the selected audio element - Joue ou met en pause l'élément audio sélectionné
    let audio = document.getElementById("audio" + index);
    let currentAudio = null;
        if (audio.paused === true) {
            audio.currentTime = currentAudioTime;
            audio.play();
            
        } else {
            audio.pause();           
            currentAudio = audio;
            currentAudioTime = audio.currentTime;          
        }
}

    volumeControl.addEventListener("input", function() {
        audioList.forEach(audio => {
            audio.volume = volumeControl.value / 100;
        });
    });
    </script>