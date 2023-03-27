    <!-- Contrôles audio -->
    <div id="audio-controls">
        <!-- Bouton play/pause -->
        <button type="button" id="play-pause-button" class="btn btn-lg"><i id="play-pause-icon"></i></button>

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
    // Bouton play/pause
    let playPauseButton = document.getElementById("play-pause-button");
      // Icône du bouton play/pause
    let playPauseIcon = document.getElementById("play-pause-icon");
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
        if (audio.paused === true) {
            audio.currentTime = currentAudioTime;
            audio.play();
            playPauseIcon.className = "bi bi-pause-btn";
        } else {
            audio.pause();
            playPauseIcon.className = "bi bi-play-btn";
        }
    }

    // Add event listeners for the play/pause button and volume control// Ajout d'écouteurs d'événements pour le bouton play/pause et le contrôle du volume
    playPauseButton.addEventListener("click", function() {
        let currentAudio = null;
        audioList.forEach(audio => {
            if (audio.paused === false) {
                currentAudio = audio;
                currentAudioTime = audio.currentTime;
                // Met en pause tous les éléments audio qui jouent
                audio.pause();
                // Change l'icône
                playPauseIcon.className = "bi bi-play-btn";
            } else {
                audio.currentTime = currentAudioTime;
                audio.play();
                playPauseIcon.className = "bi bi-pause-btn";
            }
        });
        if (currentAudio === null) {
        // Aucun élément audio n'est en cours de lecture, jouer le premier élément audio
            audioList[0].play();
            playPauseIcon.className = "bi bi-pause-btn";
        } else {
            // L'élément audio actuellement en lecture a été mis en pause, le reprendre
            currentAudio.currentTime = currentAudioTime;
            currentAudio.play();
            playPauseIcon.className = "bi bi-pause-btn";
        }
    });
    volumeControl.addEventListener("input", function() {
        audioList.forEach(audio => {
            audio.volume = volumeControl.value / 100;
        });
    });
</script>
